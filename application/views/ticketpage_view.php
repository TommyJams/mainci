<!DOCTYPE html>
<html>
<head>
<title>TommyJams - Tickets</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="favicon.ico" rel="shortcut icon">
<!-- Bootstrap -->
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href="/stylecf/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/stylecf/tj.css" rel="stylesheet" media="screen">
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="/stylecf/jquery.fancybox.css" type="text/css" media="screen" />

<meta property="og:title" content="Tour with TommyJams" />
<meta property="og:description" content="I have bought tickets!" />

</head>
<body>
<? $ticket_data = (json_decode($ticket_data));
    foreach($ticket_data as $row)
    { 
      $locationId = $row->fanFriendsLocation;
      $musicId = $row->fanFriendsMusic;
      $campaignData = $row->ticketCampaign;
      $venueData = $row->ticketVenue;
      $fansData = $row->ticketFans;
    } 
?>
<div class="d-tj-bg-overlay">
  	<div class="container d-tj-container"> <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="/img/tj.jpg" height="64" alt=""/></a>
  		<div class="d-tj-box">
  			<h3>TICKET </h3>
      		<div class="row">
      			<div class="col-sm-12 col-xs-12 col-md-12 d-tj-black-box" style="margin-top:20px;margin-left:0px">
      			</div>
      		</div>
      		<div class="row">
      			<div class="col-sm-12 col-xs-12 col-md-12 d-tj-black-box" style="margin-top:20px;margin-left:0px">
      			</div>
      		</div>
      	</div>

      	<div class="d-tj-offset-top-30 d-tj-col-2">
	      <div class="row">
	        <div class="col-md-6 d-tj-col-1" >
	          <div class="col-md-12 d-tj-col-1-bg" >
	            <div class="d-tj-events" >
	              <h3>SOCIAL SHARE</h3>
	            	<ul class=" list-unstyled social-list-share clear-fix">
              			<li><a style="margin-right: 5px;" href="#" title="Share on Facebook" class='social-list-facebook-share' onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;"></a></li>
              			<li><a title="Share on Twitter" class='social-list-twitter-share' href="https://twitter.com/share?text=I%20have%20bought%20tickets!" target="_blank" data-lang="en" style="margin-top:15px"></a>
              		</ul>
	            </div>
	          </div>
	        </div>
	        <div class="col-md-6 d-tj-col-1 d-tj-network" >
	          <div class="col-md-12 d-tj-col-1-bg" >
	            <div class="d-tj-events" >
	              <h3>INVITE FRIENDS</h3> 
	               <? 	
	               		if(isset($locationId))
				        {
				        	$countFaces = 0;
				            $facesToShow = 5;
				            $ids = array();

	               			$locationId = (json_encode($locationId)); 
              		  		foreach(json_decode($locationId) as $row)
              				{ 
              					$id = $row->id;
                				if($countFaces < $facesToShow)
                				print("<a href='https://facebook.com/$id' class='social-list-fb-event-href' target='_blank'><img src='https://graph.facebook.com/$id/picture?type=square' class='social-list-fb-event-img'></a>");
              					
              					$ids[] = $id;

              					$countFaces++;
              				}

              				error_log("Fan IDs are: ".json_encode($ids));
              			}
          			?>
          			<div class="text-center d-tj-offset-top-30" onclick='sendRequest(<?php echo  json_encode($ids); ?>)' >
              			<input style="" type="button" value="INVITE">
            		</div>
	            </div>
	          </div>
	        </div>
	      </div>
    	</div>

    	<!-- tour-->
	    <div class="d-tj-3-col d-tj-offset-top-30" >
	      <div class="d-tj-slide">
	        <div class="list_carousel responsive" style="position:relative">
	          <ul id="foo5">            
	              <?
	                $featuredCampaigns = (json_decode($featuredCampaigns)); 
	                foreach($featuredCampaigns as $campaign){ ?>
	              <?
	                $campaign_id = $campaign->campaign_id;
	                $artist_id = $campaign->artist_id;
	                $artist_name = $campaign->artist_name;
	                $funded = $campaign->funded;
	                $days_to_go = $campaign->days_to_go;
	                $image = $campaign->image;

	                if(!isset($image))
	                  $image = "defaultcampaign.jpg";
	              ?>
	              <li>
	              <div class=" col-md-12" style="padding: 5px;">
	                <h4 class="d-tj-slide-head" ><? print($artist_name); ?></h4>
	                <div class="d-tj-slide-body " style="">
	                  <div class="d-tj-slide-img" onclick="window.open('<?print(base_url().'campaign/'.$campaign_id);?>', '_blank');" style="background-image:url(<? print(base_url().'images/artist/campaign/'.$image); ?>)">  
	                    <div class="d-tj-slide-overlay-img"> <img src="/image/radioone/icon/image_overlay_grey.png" alt=""/> </div>
	                  </div>
	                  <div class="d-tj-progress">
	                    <div class="d-tj-progress-g" style="width:<? print($funded); ?>%;"> </div>
	                  </div>
	                  <div>
	                    <div class="col-md-6 d-tj-slide-btm col-sm-6 col-xs-6">
	                      <ul class="list-unstyled  " >
	                        <li>
	                          <p><? print($funded); ?>% </p>
	                        </li>
	                        <li >
	                          <p >FUNDED </p>
	                        </li>
	                      </ul>
	                    </div>
	                    <div class="col-md-6 d-tj-slide-btm col-sm-6 col-xs-6" >
	                      <ul class="list-unstyled ">
	                        <li>
	                          <p><? print($days_to_go); ?> </p>
	                        </li>
	                        <li>
	                          <p>DAYS TO GO </p>
	                        </li>
	                      </ul>
	                    </div>
	                  </div>
	                </div>
	              </div>
	             </li> 
	            <? } ?>
	          </ul>
	          <div class="clearfix"></div>
	          <a id="prev5" class="prev" href="#" ></a> <a id="next5" class="next" href="#"  ></a> </div>
	      </div>
	      <div class="clearfix"></div>
	    </div>
	    <!-- /tour-->

	    </div>

		  <!-- Footer  -->      
		  <?
		    include("include/footer.php");
		  ?>
		  <!-- /Footer  -->

		</div>  

<script>
		$(document).ready(function(){

			$(".d-tj-slide-img").hover(
               function () {
                $(this).find('.d-tj-slide-hover-img').removeClass('hide');
                },
	          function () {
	          $(this).find('.d-tj-slide-hover-img').addClass('hide');
	         }	
  			);  

		  $('#foo5').carouFredSel({
		  
		          width: '100%',
		          prev: '#prev5',
		          next: '#next5',
		          scroll: 1
		  });
		});

		function sendRequestCallback(val)
		{
			if(val == 1)
			{
				alert('Notifications task completed.');
			}
		}

		function sendRequest(ids)
  		{
  			console.log(ids);

    		$.post('/CFfans/sendRequest',{ids: ids},sendRequestCallback,'json');  
  		}

</script>
<script src="/script/jquery.js"></script> 
<script src="/script/bootstrap.min.js"></script>
<script type="text/javascript" src="/script/jquery.fancybox.js"></script>
</body>
</html>  

