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
            error_log('Facebook User constructor: '.$uid);
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

		error_log($camp_id);
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
   				$scloud = $row->soundcloud;$bandcamp = $row->bandcamp;
   				$image1 = $row->image1;
   				$status = $row->status;$tourDate = $row->tourDate;$desc = $row->desc;
   				$tourDate = $row->tourDate;$campaign_desc = htmlspecialchars_decode($row->desc);

   				// Get youtube video ID
   				$url = $videoLink;
				$query_string = array();
				parse_str(parse_url($url, PHP_URL_QUERY), $query_string);
				$videoId = $query_string["v"];

   				if(!isset($raised))
                  		{
                    		$raised = 0;
                  		}
                  		if(!isset($totalPledges))
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
                                   error_log('Fb Status:'.$fbEventStatus);
                            }

				$campaignDetails = array(
								'campaign_id' 	=> $campaign_id,
								'videoId'		=> $videoId,
								'raised' 		=> $raised,
								'target' 		=> $target,
								'totalPledges' 	=> $totalPledges,
								'artist_id'   	=> $artist_id,
								'artist_name' 	=> $artist_name,
								'campaign_desc'      => $campaign_desc,
								'venues' 		=> $venues,
								'pledges' 		=> $pledges,
								'contributes' 	=> $contributes,
								'fb' 			=> $fb,
								'twitter' 		=> $twitter,
								'bandcamp' 		=> $bandcamp,
								'scloud' 		=> $scloud,
								'website' 		=> $website,
								'image1' 		=> $image1,
								'status' 		=> $status,
								'tourDate' 		=> $tourDate,
								'days_to_go'  	        => $days_to_go,
								'image1'		=> $image1,
                                                                'fbEventName'           => $fbEventName,
                                                                'fbEventPic'            => $fbEventPic,
                                                                'fbEventURL'            => $fbEventURL,
                                                                'fbEventStatus'         => $fbEventStatus,
                                                                'fbEventJoinees'        => $fbEventJoinees,
                                                                'fbLoginURL'            => $fbLoginURL
							);

				$response[] = $campaignDetails;
   			}
   		
   			//Return values to controller
			return $response;
   		}	

   		else
   		{
   			redirect(base_url().'fans');
   		}	
	}

	public function formDetails(){

		// Initiating variables
        $fb = "";
        $twitter = "";
        $soundcloud = "";
        $bandcamp = "";
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
		error_log("Form Data: ".$form_data);
		error_log("Image: ".$backimg);

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

			error_log($pledgeAmount);

			$amount = $this->input->post("$pledgeAmount");

			error_log("Pledge Amount: ".$amount);

			if(isEmpty($amount))
			{
				$pledgei++;
				error_log("Pledge i: ".$pledgei);
			}

			$pledgecount--;
		}

		if($pledgei == $maxIndex)
		{
			error_log("Pledge check");
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
			error_log("In BackImage Check: ".$filename);
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

				error_log($i);
			
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
            error_log('Facebook User: '.$uid);
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
                    error_log("Event Pic: ".$cover['cover_url']);

					$eventUpdate = $this->facebook->api( "/".$eventID, 'post', $cover );

					error_log("Event Val: ".$eventUpdate);
                }
            }
            else
            {
                error_log('Facebook User not authenticated');
            }
        }
        catch(FacebookApiException $e) {
             // If the user is logged out, you can have a 
             // user ID even though the access token is invalid.
             // In this case, we'll get an exception, so we'll
             // just ask the user to login again here.
             error_log($e->getType());
             error_log($e->getMessage());
        }

		$query1 = $this->db->query("INSERT INTO `campaignCF` (`tour_id`, `tour_name`, `artist_name`, `phone`, `email`, `target`, `startCamp`, `endCamp`, `tourDate`, `desc`, `fb`, `twitter`, `soundcloud`, `bandcamp`, `website`, `videoLink`, `image1`, `event_id`  ) 
					VALUES('".$this->db->escape_str($tour_id)."', '".$this->db->escape_str($tour_name)."', '".$this->db->escape_str($artist_name)."', '".$this->db->escape_str($phone)."', '".$this->db->escape_str($email)."', '".$this->db->escape_str($target)."', '".$this->db->escape_str($startCamp)."', '".$this->db->escape_str($endCamp)."', '".$this->db->escape_str($tourDate)."', '".$this->db->escape_str($editorContent)."', '".$this->db->escape_str($fb)."', '".$this->db->escape_str($twitter)."', '".$this->db->escape_str($soundcloud)."', '".$this->db->escape_str($bandcamp)."', '".$this->db->escape_str($website)."', '".$this->db->escape_str($vlink)."', '".$this->db->escape_str($filename)."', '".$this->db->escape_str($eventID)."')");

		$query2 = $this->db->query("SELECT * FROM campaignCF ORDER BY campaign_id DESC LIMIT 1");
		if ($query2->num_rows() > 0)
		{
			$q2result = $query2->result();
			foreach ($q2result as $row)
			{
				$campaign_id = $row->campaign_id;
			}

			error_log("Max Index Value: ".$maxIndex);

			while($maxIndex)
			{
				$pledgeAmount = 'pledgeAmount'.$maxIndex;
				$desc = 'desc'.$maxIndex;

				$amount = $this->input->post("$pledgeAmount");
				error_log("Amount: ".$amount);

				$desc = $this->input->post("$desc");
				error_log("Benefit: ".$desc);

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
				
			$this->send_email($to, $sender, $subject, $mess);

			$to = "alerts@tommyjams.com";
			$this->send_email($to, $sender, $subject, $mess);

			$response['id'] = $campaign_id;
			return $response;
		}
	}

	public function getTourDetail($tour_id){

		error_log("message: ".$tour_id);

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
                        error_log('RSVP to '.$fbEvent.':'.$event_rsvp);
                }
                catch(FacebookApiException $e)
                {
                        error_log('Exception!');
                }

                return true;
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
							<img src='http://www.tommyjams.com/beta/images/tjlogo_small.png'>
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