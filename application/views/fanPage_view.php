<!DOCTYPE html>
<html>
<head>
<title>TommyJams - Apply Now</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="favicon.ico" rel="shortcut icon">
<!-- Bootstrap -->
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href="/stylecf/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/stylecf/tj.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="/stylecf/supersized.css" type="text/css" media="screen" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="d-tj-bg-overlay">
  <div class="container d-tj-container"> <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="img/tj.jpg" height="64" alt=""/></a> 
    <!--top 2 col-->
   <div class="d-tj-black-box d-tj-offset-top-40 d-tj-why">
      <h3 style="margin-top: 0px;">WHY PRE-BUY TICKETS ?</h3>
      <div class="row d-tj-offset-top-40">
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/up/1.png)"></div>
          <h5 ><b>Decrease Costs</b><br>
            No more paying for entry tickets at the venue. Pledge any amount you feel like, and get entry into all the shows in the tour. If the campaign fails, you get your money back!.</h5>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/up/5.png)"></div>
          <h5 ><b>Freebies</b><br>
            Get freebies every time you pledge. It is your chance to directly interact with that favorite guitarist of yours.</h5>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/up/3.png)"></div>
          <h5><b>Pay for the Music</b><br>
            Pay for what you came for and support your favorite artists directly.</h5>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/up/4.png)"></div>
          <h5 ><b>Revolution</b><br>
            Be part of a new age in music, where the fans connect directly with the artists.</h5>
        </div>
      </div>
    </div>
    <!--/top 2 col--> 
    <!-- tour-->
    <div class="d-tj-3-c-campaign campaign-tiles-box">
    <div class="row">
      <div class="col-md-12 campaign-tiles" >
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
              $image = "defaultcampaign2.jpg";
          ?>
        <div class="col-md-3 col-sm-4 col-xs-6 d-tj-offset-top-30 c-tile">
                <h4 class="d-tj-slide-head" ><? print($artist_name); ?></h4>
                <div class="d-tj-slide-body " >
                  <div class="d-tj-campaign-slide-img" onclick="window.open('<?print(base_url().'campaign/'.$campaign_id);?>', '_blank');" style="background-image:url(<? print(base_url().'images/artist/campaign/'.$image); ?>)">
                    <div class="d-tj-campaign-slide-hover-img hide">  </div>
                  </div>
                  <div class="d-tj-progress">
                    <div class="d-tj-progress-g" style="width:<? print($funded); ?>%;"> </div>
                  </div>
                  <div>
                    <div class="col-md-6 d-tj-slide-btm col-sm-6 col-xs-6">
                      <ul class="list-unstyled">
                        <li>
                          <p><? print($funded); ?>% </p>
                        </li>
                        <li>
                          <p >FUNDED </p>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-6 d-tj-slide-btm col-sm-6 col-xs-6" >
                      <ul class="list-unstyled">
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
              <? } ?>
      </div> <div class="clearfix"></div>
      </div>
    </div>
    <!-- /tour--> 
<!--bottom 1 col-->
    <div class="col-md-12 d-tj-offset-top-40 who-campaigns-box">
      <div class="who-campaigns">
        <h3>WHO CAMPAIGNS ?</h3> 
        <h5>All the campaigns are initiated by the artists directly for the tours that they want to venture on. Every time you pledge your support, an artist gets one step closer to his dream tour across various cities in the country. Not only that, you get exclusive access to all the shows which are part of that tour, and even get extra freebies from the band on-the-day to make the event really special for you.
            <b>Start pledging now!</b><br><br>
            In case you are an artist and want to start a campaign of your own, learn how to do it by simply visiting our available tours page.
        </h5>
        <div class="text-center ">
        <input class="apply-btn" style="" onClick="window.location.href='/tours'" type="button" value="LEARN MORE">
      </div>   
      </div>
    </div>
    <!--/bottom 1 col--> 
    
  </div>
  
  <!-- Footer  -->      
  <?
    include("include/footer.php");
  ?>
  <!-- /Footer  -->

</div>
<script src="/script/jquery.js"></script> 
<script src="/script/bootstrap.min.js"></script> 

<script>
		$(document).ready(function(){
			
			$(".d-tj-campaign-slide-img").hover(
               function () {
				   
                $(this).find('.d-tj-campaign-slide-hover-img').removeClass('hide');
                },
  				function () {
   				$(this).find('.d-tj-campaign-slide-hover-img').addClass('hide');
				 }
);	
 
	});
</script> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> 

<script type="text/javascript" src="/script/jquery.easing.js"></script> 
<script type="text/javascript" src="/script/jquery.supersized.min.js"></script> 
<script type="text/javascript" src="/script/jquery.supersized.shutter.min.js"></script> 



<script src="/script/tj.js"></script>
</body>
</html>