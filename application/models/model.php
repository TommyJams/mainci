<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model extends CI_Model{

       function __construct()
       {
            // Call the Model constructor
            parent::__construct();

            // Load facebook sdk
            $CI = & get_instance();
            $CI->config->load("facebook",TRUE);
            $config = $CI->config->item('facebook');
            $this->load->library('fbphpsdk/Facebook', $config);

            //!!!!!Hack!!!!!
            //Need to have this here since without this the app timesout and getuser during campaign creation fails.
            $uid = $this->facebook->getUser();
            //error_log('Facebook User constructor: '.$uid);
       }

	public function tourDetails(){

		$query = $this->db->query("SELECT * FROM toursCF;");
		if ($query->num_rows() > 0)
		{
            $qresult = $query->result();
			foreach ($qresult as $row)
			{
   				$tour_id = $row->tour_id;
   				$tour_name = $row->tour_name;
   				$applyBy = $row->applyBy;
   				$startCamp = $row->startCamp;
   				$endCamp = $row->endCamp;
   				$tourDate = $row->tourDate;
   				$target = $row->target;

   				// 3D array formation; Getting venue details
                            $venues = null;
   				$query1 = $this->db->query("SELECT * FROM venueCF WHERE tour_id = '$tour_id';");
   				if ($query1->num_rows() > 0)
				{	
                                   $q1result = $query1->result();
					foreach ($q1result as $rowInner)
					{
						$venue_name = $rowInner->venue_name;
						$venue_id = $rowInner->venue_id;
						$image = $rowInner->image;
						$desc = $rowInner->desc;
						$link = $rowInner->link;
						$city = $rowInner->city;
						$contact = $rowInner->contact;

                                          $venues[] = $rowInner;
					}
				}

                            $login_url = $this->facebook->getLoginUrl( array(
                                  'scope' => 'create_event',
                                  'redirect_uri' => base_url().'editcampaign/'.$tour_id
                            ));

			//	$tourRow = array($tour_id, $tour_name, $applyBy, $startCamp, $endCamp, $tourDate, $target, $venues);
                            $tourRow = array(
                                    'tour_id' 	=> $tour_id, 
                                    'tour_name'  => $tour_name,
                                    'applyBy' 	=> $applyBy, 
                                    'startCamp'  => $startCamp, 
                                    'endCamp' 	=> $endCamp, 
                                    'tourDate' 	=> $tourDate, 
                                    'target' 	=> $target,
                                    'venues' 	=> $venues,
                                    'login_url'  => $login_url
                                );

                            $response[] = $tourRow;
			}

			//Return values to controller
			return $response; 
		}       
	}

	public function getFeaturedCampaign(){

		$days_to_go = 0;
		$query = $this->db->query("SELECT * FROM campaignCF WHERE status=1;");
		if ($query->num_rows() > 0)
		{
			$qresult = $query->result();
			foreach ($qresult as $row)
			{
				$campaign_id = $row->campaign_id;
   				$tour_id = $row->tour_id;
   				$tour_name = $row->tour_name;
   				$artist_id = $row->artist_id;
   				$artist_name = $row->artist_name;
   				$target = $row->target;
   				$raised = $row->raised;
   				$endCamp = $row->endCamp;
   				$image = $row->image1;


		   		$todayDate = date("Y-m-d");	

		   		if($endCamp > $todayDate)
		   		{	
   					$diff = abs(strtotime($endCamp) - strtotime($todayDate));
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
					$days_to_go = $days;
				}

				$funded = intval(( $raised/$target ) * 100);
				$campaignRow = array(
										'campaign_id' => $campaign_id,
										'artist_id'   => $artist_id,
										'artist_name' => $artist_name,
										'funded'      => $funded,
										'days_to_go'  => $days_to_go,
										'image'      => $image
									);
							
				$response[] = $campaignRow;
   			}

   			//Return values to controller
			return $response;
   		}
	}

	public function campaignDetails($camp_id){

		//error_log($camp_id);
		$days_to_go = 0;
		$query = $this->db->query("SELECT * FROM campaignCF WHERE campaign_id='$camp_id';");
		if ($query->num_rows() > 0)
		{
			$qresult = $query->result();
			foreach ($qresult as $row)
			{
				$campaign_id = $row->campaign_id;$tour_id = $row->tour_id;$tour_name = $row->tour_name;
   				$artist_id = $row->artist_id;$artist_name = $row->artist_name;
                                $phone = $row->phone; $email = $row->email; $fbEvent = $row->event_id;
                                $deadline = $row->deadline;
   				$target = $row->target;$raised = $row->raised;$totalPledges = $row->totalPledges;
   				$startCamp = $row->startCamp;$endCamp = $row->endCamp;$videoLink = $row->videoLink;
   				$fb = $row->fb;$twitter = $row->twitter;$website = $row->website;
   				$scloud = $row->soundcloud;$bandcamp = $row->bandcamp;$ytube = $row->youtube;
   				$image1 = $row->image1;$ticket_widget = $row->ticket_widget;$widget_height = $row->widget_height;
   				$status = $row->status;$tourDate = $row->tourDate;$desc = $row->desc;
   				$tourDate = $row->tourDate;$campaign_desc = htmlspecialchars_decode($row->desc);

   				// Get youtube video ID
   				$url = $videoLink;
				$query_string = array();
				parse_str(parse_url($url, PHP_URL_QUERY), $query_string);
				$videoId = $query_string["v"];

				$this->load->helper('functions');
   				if(isEmpty($raised))
          		{
            		$raised = 0;
          		}
          		if(isEmpty($totalPledges))
          		{
            		$totalPledges = 0;
          		}

   				// 3D array formation; Getting amount details
   				$pledges = null;
   				$query1 = $this->db->query("SELECT * FROM pledgeCF WHERE campaign_id = '$campaign_id' ORDER BY amount ASC;");
				if ($query1->num_rows() > 0)
				{
					$q1result = $query1->result();
					foreach ($q1result as $rowPledge)
					{
						$pledges[] = $rowPledge;
					}
				}

				// 3D array formation; Getting venue details
				$venues = null;
				$query2 = $this->db->query("SELECT * FROM venueCF WHERE tour_id = '$tour_id';");
				if ($query2->num_rows() > 0)
				{
					$q2result = $query2->result();
					foreach ($q2result as $rowVenue)
					{
						$venue_name = $rowVenue->venue_name;
						$image = $rowVenue->image;
						$venue_desc = $rowVenue->desc;
						$link = $rowVenue->link;	
						$city = $rowVenue->city;
						$contact = $rowVenue->contact;

						$venues[] = $rowVenue;

					}
				}

				// 3D array formation; Getting fans contrinutors details
   				$contributes = null;
   				$query3 = $this->db->query("SELECT * FROM fansCF WHERE campaign_id = '$campaign_id' ORDER BY amount DESC;");
				if ($query3->num_rows() > 0)
				{
					$q3result = $query3->result();
					foreach ($q3result as $rowFans)
					{
						$contributes[] = $rowFans;
					}
				}

				$query4 = $this->db->query("SELECT * FROM fansCF WHERE campaign_id='$campaign_id';");
				if ($query4->num_rows() > 0)
				{
					$raised = "";
					$totalPledges = "";
					$qresult4 = $query4->result();
					foreach ($qresult4 as $row)
					{
						$amount = $row->amount;

						// Calculaing values of raised and totalPledges
						if(!isEmpty($amount))
						{
							$raised = $raised + $amount;
							$totalPledges = $totalPledges + 1;
						}	
					}

					$query4 = $this->db->query("UPDATE `campaignCF` SET `raised`='$raised', `totalPledges`='$totalPledges' WHERE campaign_id='$campaign_id';");
				}
   				
   				$todayDate = date("Y-m-d");	

   				if($endCamp > $todayDate)
		   		{	
   					$diff = abs(strtotime($endCamp) - strtotime($todayDate));
					$years = floor($diff / (365*60*60*24));
					$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
					$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
					$days_to_go = $days;
				}

                            $fbEventName = "";
                            $fbEventPic = "";
                            $fbEventURL = "";
                            $fbEventStatus = "JOIN NOW";
                            $fbEventJoinees = array();
                            $fbLoginURL = "";
                            $fanLoginURL = "";

                            if($fbEvent)
                            {
                                   $fql = "SELECT name, pic FROM event WHERE eid = ".$fbEvent;
                                   $fqlStatus = "SELECT rsvp_status FROM event_member WHERE eid = $fbEvent AND uid=me()";
                                   $fqlJoinees = "SELECT uid FROM event_member WHERE eid = $fbEvent AND rsvp_status='attending'";

                                   $param  =  array(
                                          'method'    => 'fql.query',
                                          'query'     => $fql,
                                          'callback'  => ''
                                   );
                                   $paramStatus  =  array(
                                          'method'    => 'fql.query',
                                          'query'     => $fqlStatus,
                                          'callback'  => ''
                                   );
                                   $paramJoinees  =  array(
                                          'method'    => 'fql.query',
                                          'query'     => $fqlJoinees,
                                          'callback'  => ''
                                   );

                                   $fqlResult = $this->facebook->api($param);
                                   $fqlStatusResult = $this->facebook->api($paramStatus);
                                   $fqlJoineesResult = $this->facebook->api($paramJoinees);

                                   //looping through retrieved data
                                   foreach( $fqlResult as $keys => $values ){
                                       $fbEventName = $values['name'];
                                       $fbEventPic = $values['pic'];
                                   }

                                   //getting response status for current user
                                   foreach( $fqlStatusResult as $keys => $values ){
                                       $fbEventStatus = $values['rsvp_status'];
                                   }

                                   //getting list of all attendees
                                   foreach( $fqlJoineesResult as $keys => $values ){
                                       $fbEventJoinees[] = $values['uid'];
                                   }

                                   $fbEventURL = 'https://www.facebook.com/events/'.$fbEvent;
                                   $fbLoginURL = $this->facebook->getLoginUrl( array(
                                                                                   'scope' => 'rsvp_event',
                                                                                   'redirect_uri' => base_url().'campaign/'.$campaign_id
                                                                            ));
                                   //error_log('Fb Status:'.$fbEventStatus);
                            }

                $fanLoginURL = $this->facebook->getLoginUrl( array(
                                  'scope' => 'user_about_me, user_location, user_interests, read_friendlists, email, publish_actions, user_actions.music, friends_actions.music, friends_location, friends_likes',
                                  'redirect_uri' => base_url().'payment/'.$campaign_id
                            ));            

				$campaignDetails = array(
								'campaign_id' 	=> $campaign_id,
								'videoId'		=> $videoId,
								'raised' 		=> $raised,
								'target' 		=> $target,
								'totalPledges' 	=> $totalPledges,
								'artist_id'   	=> $artist_id,
								'artist_name' 	=> $artist_name,
								'campaign_desc' => $campaign_desc,
								'ticket_widget'	=> $ticket_widget,
								'widget_height' => $widget_height,
								'venues' 		=> $venues,
								'pledges' 		=> $pledges,
								'contributes' 	=> $contributes,
								'fb' 			=> $fb,
								'twitter' 		=> $twitter,
								'bandcamp' 		=> $bandcamp,
								'scloud' 		=> $scloud,
								'ytube' 		=> $ytube,
								'website' 		=> $website,
								'image1' 		=> $image1,
								'status' 		=> $status,
								'tourDate' 		=> $tourDate,
								'days_to_go'  	=> $days_to_go,
								'image1'		=> $image1,
                                                                'fbEventName'           => $fbEventName,
                                                                'fbEventPic'            => $fbEventPic,
                                                                'fbEventURL'            => $fbEventURL,
                                                                'fbEventStatus'         => $fbEventStatus,
                                                                'fbEventJoinees'        => $fbEventJoinees,
                                                                'fbLoginURL'            => $fbLoginURL,
                                                                'fanLoginURL'			=> $fanLoginURL

							);

				$response[] = $campaignDetails;
   			}

   			$this->load->library('session');

   			$query5 = $this->db->query("SELECT * FROM pledgeCF WHERE campaign_id = '$campaign_id'");
			if ($query5->num_rows() > 0)
			{
				$q5result = $query5->result();
				foreach ($q5result as $row)
				{
					$ticket_type = $row->ticket_type;

					$typecount = $ticket_type.'count';
					$typetotal = $ticket_type.'total';

					//Creating session
					$this->session->set_userdata(''.$typecount, 0);
					$this->session->set_userdata(''.$typetotal, 0);
				}
			}
   		
   			//Return values to controller
			return $response;
   		}	

   		else
   		{
   			redirect(base_url().'roadshows');
   		}	
	}

	public function formDetails(){

		// Initiating variables
        $fb = "";
        $twitter = "";
        $soundcloud = "";
        $bandcamp = "";
        $ytube = "";
        $website = "";
        $filename = "";
        $eventID = "";

		// Loading helper functions
        $this->load->helper('functions');
        $this->load->helper('modelFunctions');

        // Get posted data
	    $tour_id = $this->input->post("tour_id");
		$artist_name = $this->input->post("artistName");
		$phone = $this->input->post("phone");
		$email = $this->input->post("email");
		$backimg = $this->input->post("backimg");
		$target = $this->input->post("target");
		$min_target = $this->input->post("min_target");
		$maxIndex = $this->input->post("maxIndex");
        $editorContent = htmlspecialchars($this->input->post("editorContent"));
        $vlink = $this->input->post("v-link");
        $sociallink1 = $this->input->post("sociallink-1");
        $sociallink2 = $this->input->post("sociallink-2");
        $sociallink3 = $this->input->post("sociallink-3");

        $form_data = json_encode($this->input->post());
		//error_log("Form Data: ".$form_data);
		//error_log("Image: ".$backimg);

		$response=array('error'=>0,'info'=>null);

		$values=array
		(
			'artistName'	=> $artist_name,
			'target'		=> $target,
			'min_target'	=> $min_target,
			'phone'			=> $phone,
			'email'			=> $email,
			'video-link'	=> $vlink,
			'sociallink1'	=> $sociallink1,
			'sociallink2'	=> $sociallink2,
			'sociallink3'	=> $sociallink3,
			'backimg'		=> $backimg
		);

		// Pledge check (Atleast one pledgeamount should be filled) 
		$pledgei = 0;
		$pledgecount = $maxIndex;
		while($pledgecount)
		{
			$pledgeAmount = 'pledgeAmount'.$pledgecount;

			//error_log($pledgeAmount);

			$amount = $this->input->post("$pledgeAmount");

			//error_log("Pledge Amount: ".$amount);

			if(isEmpty($amount))
			{
				$pledgei++;
				//error_log("Pledge i: ".$pledgei);
			}

			$pledgecount--;
		}

		if($pledgei == $maxIndex)
		{
			//error_log("Pledge check");
			$response['error']=1;
			$response['info'][]=array('fieldId'=>'pledgeAmount1','message'=>CONTACT_FORM_MSG_INVALID_PLEDGE_AMOUNT);
		}

		// Campaign form fields check
		if(isGPC()) $values=array_map('stripslashes',$values);
	
		if(isEmpty($values['artistName']))
		{
			$response['error']=1;
			$response['info'][]=array('fieldId'=>'artistName','message'=>CONTACT_FORM_MSG_INVALID_DATA_NAME);
		}

		if( (isEmpty($values['target'])) || ($target < $min_target) )
		{
			$response['error']=1;
			$response['info'][]=array('fieldId'=>'target','message'=>CONTACT_FORM_MSG_INVALID_TARGET);
		}
	
		if(!IsYoutubeUrl($values['video-link']))
		{
 			$response['error']=1;	
			$response['info'][]=array('fieldId'=>'vd-link','message'=>CONTACT_FORM_MSG_INVALID_VIDEO_LINK);
		}

		if(!validateEmail($values['email']))
		{
 			$response['error']=1;	
			$response['info'][]=array('fieldId'=>'email','message'=>CONTACT_FORM_MSG_INVALID_DATA_MAIL);
		}

		if(strlen($phone) != 10)
		{
			$response['error']=1;	
			$response['info'][]=array('fieldId'=>'phone','message'=>CAMPAIGN_FORM_MSG_INVALID_PHONE);
		}

		//Background Image Check 
		if(isEmpty($values['backimg']))
		{
			$response['error'] = 1;
			$response['info'][]=array('fieldId'=>'userfile','message'=>CAMPAIGN_FORM_MSG_INVALID_IMAGE);
		}
		else
		{
			$filename = $backimg;
			//error_log("In BackImage Check: ".$filename);
		}

		// Social Links Check
		$count = 3;
		while($count)
		{
			$sociallink = 'sociallink'.$count;
			$value = $values["$sociallink"];

			if(!isEmpty($value))
			{
				$i = IsSocialUrl($values["$sociallink"]);

				//error_log($i);
			
				if($i == 1)
					$fb = $values["$sociallink"];
				elseif($i == 2)
					$twitter = $values["$sociallink"];
				elseif($i == 3)
					$soundcloud = $values["$sociallink"];
				elseif($i == 4)
					$bandcamp = $values["$sociallink"];
				elseif($i == 5)
					$website = $values["$sociallink"];
				elseif($i == 6)
					$ytube = $values["$sociallink"];
				
				// Website link is broken
				elseif($i == 0)
				{
					$response['error']=1;	
					$response['info'][]=array('fieldId'=>'socialLink1','message'=>CONTACT_FORM_MSG_INVALID_SOCIAL_LINK);
				}	
			}
				 
			$count--;
		} 
	
		// Returning and triggering callback to show qtip(s)
		if($response['error']==1)
		{
			$response['id'] = 0;
			return $response;
		} 
			

   		// --------------------Storing data into database----------------------//

		$query = $this->db->query("SELECT * FROM toursCF WHERE tour_id='$tour_id';");
		if ($query->num_rows() > 0)
		{
			$qresult = $query->result();
			foreach ($qresult as $row)
			{
				$tour_name = $row->tour_name;
				$applyBy = $row->applyBy;
				$startCamp = $row->startCamp;
				$endCamp = $row->endCamp;
				$tourDate = $row->tourDate;
			}
		}

        try {
            $uid = $this->facebook->getUser();
            //error_log('Facebook User: '.$uid);
            if($uid)
            {
                $ret_obj = $this->facebook->api('/me/events', 'POST',
                                                array(
                                                       'name' => $artist_name.' tours with TommyJams',
                                                       'start_time' => $tourDate,
                                                       'description' => $artist_name.' tours with TommyJams'
                                                )
                                         );
                if(isset($ret_obj['id']))
                {
                    $eventID = $ret_obj['id'];

                    $cover['cover_url'] = base_url().'images/artist/campaign/'.$backimg;
                    //error_log("Event Pic: ".$cover['cover_url']);

					$eventUpdate = $this->facebook->api( "/".$eventID, 'post', $cover );

					//error_log("Event Val: ".$eventUpdate);
                }
            }
            else
            {
                //error_log('Facebook User not authenticated');
            }
        }
        catch(FacebookApiException $e) {
             // If the user is logged out, you can have a 
             // user ID even though the access token is invalid.
             // In this case, we'll get an exception, so we'll
             // just ask the user to login again here.
             //error_log($e->getType());
             //error_log($e->getMessage());
        }

		$query1 = $this->db->query("INSERT INTO `campaignCF` (`tour_id`, `tour_name`, `artist_name`, `phone`, `email`, `target`, `startCamp`, `endCamp`, `tourDate`, `desc`, `fb`, `twitter`, `soundcloud`, `bandcamp`, `youtube`, `website`, `videoLink`, `image1`, `event_id`  ) 
					VALUES('".$this->db->escape_str($tour_id)."', '".$this->db->escape_str($tour_name)."', '".$this->db->escape_str($artist_name)."', '".$this->db->escape_str($phone)."', '".$this->db->escape_str($email)."', '".$this->db->escape_str($target)."', '".$this->db->escape_str($startCamp)."', '".$this->db->escape_str($endCamp)."', '".$this->db->escape_str($tourDate)."', '".$this->db->escape_str($editorContent)."', '".$this->db->escape_str($fb)."', '".$this->db->escape_str($twitter)."', '".$this->db->escape_str($soundcloud)."', '".$this->db->escape_str($bandcamp)."', '".$this->db->escape_str($ytube)."', '".$this->db->escape_str($website)."', '".$this->db->escape_str($vlink)."', '".$this->db->escape_str($filename)."', '".$this->db->escape_str($eventID)."')");

		$query2 = $this->db->query("SELECT * FROM campaignCF ORDER BY campaign_id DESC LIMIT 1");
		if ($query2->num_rows() > 0)
		{
			$q2result = $query2->result();
			foreach ($q2result as $row)
			{
				$campaign_id = $row->campaign_id;
			}

			//error_log("Max Index Value: ".$maxIndex);

			while($maxIndex)
			{
				$pledgeAmount = 'pledgeAmount'.$maxIndex;
				$desc = 'desc'.$maxIndex;

				$amount = $this->input->post("$pledgeAmount");
				//error_log("Amount: ".$amount);

				$desc = $this->input->post("$desc");
				//error_log("Benefit: ".$desc);

				if(!isEmpty($amount))
				{
					$amount = intval($amount);
					$query2 = $this->db->query("INSERT INTO `pledgeCF` (`campaign_id`, `amount`, `desc`) 
								VALUES('".$this->db->escape_str($campaign_id)."', '".$this->db->escape_str($amount)."', '".$this->db->escape_str($desc)."')");
				}
				
				$maxIndex--;
			}

			$campaign_url = base_url().'campaign/'.$campaign_id;
			$to = $email;
			$sender = "alerts@tommyjams.com";
			$subject = "Campaign Launched";
			$mess="<p style='text-align:left;'> Dear $artist_name,<br><br>Congratulations!<br>Your campaign has been launched successfully on TommyJams.
						<br>Kindly wait for one business day for us to verify your event and activate the payment gateway.
						<br>You can monitor your campaign by going to '$campaign_url'.
						<br>We wish you all the very best for the campaign.<br><br>Happy Jamming,<br>Team TommyJams<br><br></p>";
				
			$this->Model->send_email($to, $sender, $subject, $mess);

			$to = "alerts@tommyjams.com";
			$this->Model->send_email($to, $sender, $subject, $mess);

			$response['id'] = $campaign_id;
			return $response;
		}
	}

	public function getTourDetail($tour_id){

		//error_log("message: ".$tour_id);

		$query = $this->db->query("SELECT * FROM toursCF WHERE tour_id = '$tour_id';");
		if ($query->num_rows() > 0)
		{
            $qresult = $query->result();
			foreach ($qresult as $row)
			{
   				$tour_id = $row->tour_id;
   				$tour_name = $row->tour_name;
   				$applyBy = $row->applyBy;
   				$startCamp = $row->startCamp;
   				$endCamp = $row->endCamp;
   				$tourDate = $row->tourDate;
   				$target = $row->target;

   				// 3D array formation; Getting venue details
                $venues = null;
   				$query1 = $this->db->query("SELECT * FROM venueCF WHERE tour_id = '$tour_id';");
   				if ($query1->num_rows() > 0)
				{	
                    $q1result = $query1->result();
					foreach ($q1result as $rowInner)
					{
                        $venues[] = $rowInner;
					}
				}

			//	$tourRow = array($tour_id, $tour_name, $applyBy, $startCamp, $endCamp, $tourDate, $target, $venues);
                $tourRow = array(
                                    'tour_id' 	=> $tour_id, 
                                    'tour_name' => $tour_name,
                                    'applyBy' 	=> $applyBy, 
                                    'startCamp' => $startCamp, 
                                    'endCamp' 	=> $endCamp, 
                                    'tourDate' 	=> $tourDate, 
                                    'target' 	=> $target,
                                    'venues' 	=> $venues
                                );

                $response[] = $tourRow;
			}

			//Return values to controller
			return $response; 
		}       
	}

        public function validateFBCode($code){
                //Do not know how to exchange the code for token here
                //Will figure out later.
                return true;
        }

        public function joinFBEvent($code, $campaign_id){
                
                // Get Campaign Details
                $query = $this->db->query("SELECT * FROM campaignCF WHERE campaign_id='$campaign_id';");
                if ($query->num_rows() > 0)
                {
                        $qresult = $query->result();
                        foreach ($qresult as $row)
                        {
                                $fbEvent = $row->event_id;
                        }
                }

                $appId = '248776888603319';
                $secret = '50f31c2706d846826bead008392e8969';
                $my_url = base_url().'campaign/'.$campaign_id;

                //Get Access Token
                $this->facebook->api('oauth/access_token', array(
                    'client_id'     => $appId,
                    'client_secret' => $secret,
                    'type'          => 'client_cred',
                    'code'          => $code
                ));
                $access_token = $this->facebook->getAccessToken();

                // Call the Graph API to RSVP to the event
                try
                {
                        $event_rsvp = $this->facebook->api($fbEvent.'/attending', 'POST', array(
                                        'access_token'  => $access_token
                                ));
                        //error_log('RSVP to '.$fbEvent.':'.$event_rsvp);
                }
                catch(FacebookApiException $e)
                {
                        //error_log('Exception!');
                }

                return true;
        }

        public function ticketCount()
        {
        	// Load session lib and helper func
        	$this->load->library('session');
        	$this->load->helper('functions');

        	// Get posted data
        	$type = $this->input->post("type");
        	$use = $this->input->post("use");
        	$amount = $this->input->post("amount");
        	$campaign_id = $this->input->post("campaign_id");

        	// Get $typecount value from stored session
        	$typecount = $type.'count';
        	$count = $this->session->userdata(''.$typecount);

		    // Get ticket_type amount value from pledgeCF
		    $query = $this->db->query("SELECT amount FROM pledgeCF WHERE campaign_id = '$campaign_id' and ticket_type = '$type'");
		  	if ($query->num_rows() > 0)
			{
				$qresult = $query->result();
				foreach ($qresult as $row)
				{
					$amount = $row->amount;
				}
			}

			// Calculating grandTotal
        	if($use == "plus" && $count < 9)
		    {
		      	$count++;
		      	$this->session->set_userdata(''.$typecount, $count);

				$total = $amount * $count;

				$typetotal = $type.'total';
				$this->session->set_userdata(''.$typetotal, $total);	
		    }

		    if($use == "minus" && $count > 0)
		    {
		      	$count--;
		      	$this->session->set_userdata(''.$typecount, $count);

		      	$total = $amount * $count;

				$typetotal = $type.'total';
				$this->session->set_userdata(''.$typetotal, $total);
    		}

    		$i = 0;
    		$query = $this->db->query("SELECT * FROM pledgeCF WHERE campaign_id = '$campaign_id'");
		  	if ($query->num_rows() > 0)
			{
				$qresult = $query->result();
				foreach ($qresult as $row)
				{
					$ticketType = $row->ticket_type;
					$typetotal = $ticketType.'total';

					$endTotal[$i] = $this->session->userdata(''.$typetotal);
					error_log("End Total: ".$endTotal[$i]);
					$i++;
				}
			}
			
			$grandTotal = array_sum($endTotal);

			$response['tickettype'] = $type;
    		$response['typecount'] = $count;  
    		$response['typetotal'] = $total;
    		$response['grandTotal'] = $grandTotal;

    		createResponse($response);
        }

        public function storeFanData()
        {
        	// Loading session library and helper function
        	$this->load->helper('functions');
        	$this->load->library('session');

        	// Get posted data
	    	$copper = $this->input->post("copper");
	    	$bronze = $this->input->post("bronze");
	    	$silver = $this->input->post("silver");
	    	$gold = $this->input->post("gold");
	    	$diamond = $this->input->post("diamond");
	    	$platinum = $this->input->post("platinum");
	    	$grandTotal = $this->input->post("grandTotal");

	    	$newdata = array(
	                          'copper'  	=> $copper,
	                          'bronze'  	=> $bronze,
	                          'silver'  	=> $silver,
	                          'gold'  		=> $gold,
	                          'diamond'  	=> $diamond,
	                          'platinum'  	=> $platinum,
	                          'grandTotal'  => $grandTotal, 
	                        );

	    	error_log($newdata['bronze']);
	    	error_log($newdata['grandTotal']);
            
            $this->session->set_userdata($newdata);

        	$response = 1;
        	createResponse($response);
        }

        public function fanDetails($camp_id,$code)
        {
        	// Loading lib and helper function
        	$this->load->helper('functions');
        	$this->load->library('session');

        	// Storing Code in session
			$this->session->set_userdata('FbCode', $code);

        	// Defining appId and secret
        	$appId = '248776888603319';
            $secret = '50f31c2706d846826bead008392e8969';

        	//Get Access Token
            $this->facebook->api('oauth/access_token', array(
                'client_id'     => $appId,
                'client_secret' => $secret,
                'type'          => 'client_cred',
                'code'          => $code
            ));
            
            $access_token = $this->facebook->getAccessToken();

            //$this->facebook->setAccessToken($access_token);

            $fan = $this->facebook->api('/me');
            $fan_id = $fan['id'];
            $fan_location = $fan['location']['name'];
            $split=explode(",", $fan_location); //Eg. Split "Bangalore, India" into "Bangalore" and "India"
            if (isset($split[2])) //Eg. "Bankok, Krung Thep, Thailand"
            {
            	$city=addslashes($split[0]);
            	$state=trim($split[1]);
            	$state=addslashes($state);
            	$country=trim($split[2]);
            	$country=addslashes($country);
          	}
            else //Eg. "Bangalore, India"
            {
                $city=addslashes($split[0]);
                $state="";
                $country=trim($split[1]);
                $country=addslashes($country);
            }

            //$graph_url = "https://graph.facebook.com/me?access_token=".$access_token;
     		//$fan = json_decode(file_get_contents($graph_url));
     		//$fan = (array) $fan;

     		$fql = "SELECT name,email,about_me FROM user where uid =".$fan_id;

     		$fan_param  =  array(
	                          'method'    => 'fql.query',
	                          'query'     => $fql,
	                          'access_token' => $access_token,
	                          'callback'  => ''
                            );

     		$fqlResult = $this->facebook->api($fan_param);

     		foreach ($fqlResult as $keys => $fanData) 
     		{
     			$fan_name = mysql_real_escape_string($fanData['name']);	
			  	$fan_email = $fanData['email'];
			  	$fan_about = $fanData['about_me'];
			}

			error_log("Name: ".$fan_name);
			error_log("Email: ".$fan_email);
			error_log("About: ".$fan_about);
			
            //$fan_interests = $fan['interests'];

            if(isEmpty($fan_email))
            	$fan_email = "";
            if(isEmpty($fan_about))
            	$fan_about = "";

	    	// Storing fan data into database
	    	$query = $this->db->query("SELECT fb_id FROM fansCF WHERE campaign_id = '$camp_id' and `fb_id`='$fan_id'");
			if ($query->num_rows() == 0)
			{
	    		$query1 = $this->db->query("INSERT INTO `fansCF` (`fb_id`, `name`, `email`, `about`, `location`, `campaign_id`) 
						VALUES('".$this->db->escape_str($fan_id)."', '".$this->db->escape_str($fan_name)."', '".$this->db->escape_str($fan_email)."', '".$this->db->escape_str($fan_about)."', '".$this->db->escape_str($city)."', '".$this->db->escape_str($camp_id)."')");
	    	}
	    	if ($query->num_rows() > 0)
	    	{
	    		$query = $this->db->query("UPDATE `fansCF` SET `name`='$fan_name', `email`='$fan_email', `about`='$fan_about', `location`='$city' WHERE campaign_id = '$camp_id' and `fb_id`='$fan_id'");
	    	}

			// Fan friends data
			$query = $this->db->query("SELECT * FROM fansCF WHERE campaign_id = '$camp_id'");
			if ($query->num_rows() > 0)
			{
				$qresult = $query->result();
				foreach ($qresult as $row)
				{
					$payedId = $row->fb_id;
					$ticket_amount = $row->ticket_amount;

					$fan_friends = $this->facebook->api('/me/friends?uid='.$payedId, 'GET', array('access_token'=>$access_token));

					if(isset($fan_friends['data']))
					{
						foreach ($fan_friends["data"] as $value) 
						{
							if($ticket_amount > 0)
							{
								$friend_payed_id = $value["id"];
								$friend_payed_name = $value["name"];

								$fanFriendsPayed[] = array(
														'id' 			=> $friend_payed_id,
														'name' 			=> $friend_payed_name,
													);
							}
						}
					}
				}
			}

			/*$fan_friends = $this->facebook->api('/me/friends', 'GET', array('access_token'=>$access_token));

			foreach ($fan_friends["data"] as $value) 
			{
				$fan_friend_id = $value["id"];

				$query = $this->db->query("SELECT * FROM `fansCF` WHERE `campaign_id` = '$camp_id' and `fb_id`='$fan_friend_id'");
				if ($query->num_rows() > 0)
				{
		            $qresult = $query->result();
					foreach ($qresult as $row)
					{
						$ticket_amount = $row->ticket_amount;

						if($ticket_amount > 0)
						{
							$friend_payed_id = $fan_friend_id;
							$friend_payed_name = $value["name"];

							$fanFriendsPayed[] = array(
													'id' 			=> $friend_payed_id,
													'name' 			=> $friend_payed_name,
												);
						}
					}
				}
			}*/

			// Fans who payed
			$query = $this->db->query("SELECT * FROM `fansCF` WHERE `campaign_id` = '$camp_id'");
			if ($query->num_rows() > 0)
			{
	            $qresult = $query->result();
				foreach ($qresult as $row)
				{
					$fan_payed_id = $row->fb_id;
					$fan_payed_name = $row->name; 

					if($ticket_amount > 0)
					{
						$fanPayed[] = array(
												'id' 			=> $fan_payed_id,
												'name' 			=> $fan_payed_name
											);
					}	
				}
			}

			// Event Joinees
			$query = $this->db->query("SELECT * FROM `campaignCF` WHERE `campaign_id` = '$camp_id'");
			if ($query->num_rows() > 0)
			{
	            $qresult = $query->result();
				foreach ($qresult as $row)
				{
					$fb_event_id = $row->event_id;
				}
			}

			$fqlJoinees = "SELECT uid FROM event_member WHERE eid = $fb_event_id AND rsvp_status='attending'";

           	$paramJoinees  =  array(
                  'method'    => 'fql.query',
                  'query'     => $fqlJoinees,
                  'callback'  => ''
           	);

           	$fqlJoineesResult = $this->facebook->api($paramJoinees);

           	//getting list of all attendees
           	foreach( $fqlJoineesResult as $keys => $values ){
               	$fbEventJoinees[] = $values['uid'];
           	}

	    	// Getting fan data from fansCF datatable
	    	$query = $this->db->query("SELECT * FROM fansCF WHERE `campaign_id` = '$camp_id' and `fb_id`='$fan_id'");
			if ($query->num_rows() > 0)
			{
	            $qresult = $query->result();
				foreach ($qresult as $row)
				{
	   				$name = $row->name;
	   				$email = $row->email;
	   				$contact = $row->contact;
	   				$location = $row->location;
	
					$query1 = $this->db->query("SELECT * FROM pledgeCF WHERE `campaign_id` = '$camp_id' ORDER BY amount DESC;");
	   				if ($query1->num_rows() > 0)
					{
			            $qresult1 = $query1->result();
						foreach ($qresult1 as $row)
						{
							$ticket_type = $row->ticket_type;

							$typecount = $ticket_type.'count';
							$typetotal = $ticket_type.'total';

        					$ticketTotal = $this->session->userdata(''.$typetotal);
        					$ticketQuantity = $this->session->userdata(''.$typecount);

        					if($ticketTotal > 0)
        					{
        						$pledge_desc = $row->desc;
        						$ticket[] = array(
        												'ticket_type' 		=> $ticket_type,
	                                    				'ticket_amount' 	=> $ticketTotal,
	                                    				'ticket_quantity'	=> $ticketQuantity,
	                                    				'pledge_desc' 		=> $pledge_desc
        											);
        					}
						}
					}	

	                $fanDetails = array(
	                						'name' 					=> $name, 
	                						'email' 				=> $email, 
	                						'location' 				=> $location, 
	                						'ticket' 				=> $ticket,
	                						'fanFriendsPayed'		=> $fanFriendsPayed,
	                						'fanPayed'				=> $fanPayed,
	                						'fbEventJoinees' 		=> $fbEventJoinees
	                					);

	                $response[] = $fanDetails;
				}

				// Destroying session
				//$this->session->unset_userdata($sessionArray);
				//$this->session->sess_destroy();

				// Storing fan_id to session created
				$this->session->set_userdata('fan_id', $fan_id);

				//Return values to controller
				return $response; 
			}    
		}	

		public function ticketDetails($camp_id)
		{
			// Loading lib and helper function
        	$this->load->helper('functions');
        	$this->load->library('session');

        	$fan_id = $this->session->userdata('fan_id');

            // Access Token
			$access_token = $this->facebook->getAccessToken();

			// Ticket details
			$query = $this->db->query("SELECT * FROM campaignCF WHERE `campaign_id` = '$camp_id'");
			if ($query->num_rows() > 0)
			{
	            $qresult = $query->result();
				foreach ($qresult as $row)
				{
					$tour_id = $row->tour_id;
					$tour_name = $row->tour_name;
					$artist_name = $row->artist_name;
					$image = $row->image1;

					$ticketCampaign[] = $row;
				}
			}

			$query = $this->db->query("SELECT * FROM venueCF WHERE `tour_id` = '$tour_id'");
			if ($query->num_rows() > 0)
			{
	            $qresult = $query->result();
				foreach ($qresult as $row)
				{
					$ticketVenue[] = $row;
				}
			}

			$query = $this->db->query("SELECT * FROM fansCF WHERE `campaign_id` = '$camp_id' and `fb_id` = '$fan_id'");
			if ($query->num_rows() > 0)
			{
	            $qresult = $query->result();
				foreach ($qresult as $row)
				{
					$ticketFans[] = $row;
				}
			}

            // Fan friends data based on Music list
			$friends_music = $this->facebook->api('/me/friends?fields=music','GET',array('access_token'=>$access_token));

			foreach ($friends_music["data"] as $value) 
			{
				$friend_id_music = $value["id"];
				
				if(isset($value['music']))
				{
					$fanFriendsMusic[] = array('id' => $friend_id_music);
				}	
			}

			// Fan friends data based on location
			$friends_location_data = $this->facebook->api('/me/friends?fields=location','GET',array('access_token'=>$access_token));

			foreach ($friends_location_data["data"] as $value) 
			{
				if(isset($value['location']))
				{
					$friend_city_location = json_encode($value["location"]["name"]);
					$location_name = json_decode($friend_city_location);

					$friend_id_location = $value["id"];

					error_log("Location ID: ".$friend_id_location);

					$split=explode(",", $location_name); //Eg. Split "Bangalore, India" into "Bangalore" and "India"
		            if (isset($split[2])) //Eg. "Bankok, Krung Thep, Thailand"
		            {
		            	$city=addslashes($split[0]);
		            	$state=trim($split[1]);
		            	$state=addslashes($state);
		            	$country=trim($split[2]);
		            	$country=addslashes($country);
		          	}
		            else //Eg. "Bangalore, India"
		            {
		                $city=addslashes($split[0]);
		                $state="";
		                $country=trim($split[1]);
		                $country=addslashes($country);
		            }	
					
					// Query to get tour_id
					$query = $this->db->query("SELECT * FROM campaignCF WHERE `campaign_id` = '$camp_id'");
	   				if ($query->num_rows() > 0)
					{
			            $qresult = $query->result();
						foreach ($qresult as $row)
						{
							$tour_id = $row->tour_id;
						}
					}

					// Query to get tour locations
					$query1 = $this->db->query("SELECT * FROM venueCF WHERE `tour_id` = '$tour_id'");
	   				if ($query1->num_rows() > 0)
					{
			            $qresult1 = $query1->result();
						foreach ($qresult1 as $row)
						{
							$venue_city = $row->city;

							if($venue_city == $city)
							{
								$fanFriendsLocation[] = array('id' => $friend_id_location);
							}
						}
					}
				}
			}

			$ticketDetails = array(
	                					'fanFriendsLocation'		=> $fanFriendsLocation,
	                					'fanFriendsMusic'			=> $fanFriendsMusic,
	                					'ticketCampaign'			=> $ticketCampaign,
	                					'ticketVenue'				=> $ticketVenue,
	                					'ticketFans'				=> $ticketFans
	                				);	
			

			$response[] = $ticketDetails;

	        //Return values to controller
			return $response;
		}

		public function sendRequest()
		{
			$this->load->helper('functions');

			// Get posted data
	    	$ids = json_encode($this->input->post("ids"));

	    	$ids = json_decode($ids);

			// Access Token
			$app_access_token = $this->facebook->getAccessToken();
			
			for($a = 0; $a < sizeof($ids); $a++)
			{
				$user_id = json_encode($ids[$a][""]);
				error_log("User ID: ".$user_id);
				$apprequest_url ="https://graph.facebook.com/" . $user_id . "/apprequests?message='INSERT_UT8_STRING_MSG'" . "&data='INSERT_STRING_DATA'&" . $app_access_token . "&method=post";
				
				$result = file_get_contents($apprequest_url);
				error_log("Result: ".$result);
			}


			$response = 1;
			createResponse($response);
		}

		public function create_image() 
		{ 
			$this->load->helper('functions');

		    //Let's generate a totally random string using md5 
		    $md5 = md5(rand(0,999)); 
		    //We don't need a 32 character long string so we trim it down to 5 
		    $pass = substr($md5, 10, 5); 

		    //Set the image width and height 
		    $width = 100; 
		    $height = 20;  

		    //Create the image resource 
		    $image = ImageCreate($width, $height);  

		    //We are making three colors, white, black and gray 
		    $white = ImageColorAllocate($image, 255, 255, 255); 
		    $black = ImageColorAllocate($image, 0, 0, 0); 
		    $grey = ImageColorAllocate($image, 204, 204, 204); 

		    //Make the background black 
		    ImageFill($image, 0, 0, $black); 

		    //Add randomly generated string in white to the image
		    ImageString($image, 3, 30, 3, $pass, $white); 

		    //Throw in some lines to make it a little bit harder for any bots to break 
		    ImageRectangle($image,0,0,$width-1,$height-1,$grey); 
		    imageline($image, 0, $height/2, $width, $height/2, $grey); 
		    imageline($image, $width/2, 0, $width/2, $height, $grey); 
		 
		    //Tell the browser what kind of file is come in 
		    header("Content-Type: image/jpeg"); 

		    //Output the newly created image in jpeg format 
		    $response = ImageJpeg($image); 
		    
		    //Free up resources
		    //ImageDestroy($image); 
			
			return $response; 
		} 

        public function send_email($to, $sender, $subject, $mess)
		{
			$body = "
				<html>
				<head>
				<title>$subject</title>
				</head>
				<body>
				<div style='background:#000; padding:10px;'>
					<table style='text-align:center; width: 100%; padding:50px; padding-top:20px;'>
						<tr style='margin-top:20px;'>
							<img src='http://www.tommyjams.com/images/tjlogo_small.png'>
						</tr>
						<tr style='margin-top:50px; background:#ffcc00; padding:10px;'>
							$mess
						</tr>
					</table>
				</div>
				</body>
				</html>
			";

			//Using codeigniter mail library
			$this->email->from(SMTP_USERNAME, SMTP_SENDER);
			$this->email->to($to); 
			$this->email->subject($subject);
			$this->email->message($body);

			$this->email->send();
		}
}
?>