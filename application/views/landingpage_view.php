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
<script type="text/javascript" src="<?php echo base_url();?>script/linkify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>script/script.js"></script>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
<style>
#latest-tweets
{
  margin-bottom:20px;
  background-repeat:no-repeat;
  background-position:center left;
  background-image:url('../image/icon_tweet.png');
}

  #latest-tweets ul
  {
    margin:0px;
    padding:0px;
    margin-left:70px;
    list-style-type:none;
  }

  #latest-tweets,
  #latest-tweets ul li,
  #latest-tweets ul li p
  {
    display:block;
  }
  
  #latest-tweets ul li
  {
    clear:both;
    display:table-row;
  }
    
  #latest-tweets ul li p
  {
    margin:0px;
    padding:0px;
    display:table-cell;
    vertical-align:middle;
  }
      
  #latest-tweets ul li p a:hover
  {
    text-decoration:underline;
  }
  
  #latest-tweets ul li p a
  {
    color:#FFCC00;
  }

  #latest-tweets ul li p
  {
    background-color:#000000;
  }

</style>    

</head>
<body>
<div class="d-tj-bg-overlay">
  <div class="container d-tj-container"> <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="/img/tj.jpg" height="64" alt=""/></a> 
    <!--top 2 col-->
    <div class=" d-tj-offset-top-40  d-tj-2-col-y-bg">
      <div class="row">
        <div class="col-md-6 d-tj-book-events" >
          <div class="col-md-12 d-tj-book-events-bg" >
            <div class="d-tj-book-events-top"  > 
              <h4 style="font-size:22px" class="text-center">
                Looking to book events immediately ?
              </h4>
              <h4 class="text-center">
                <img src="/img/book_events.png" alt="" >
              </h4>
            </div>
            <div class="text-center d-tj-offset-top-20">
              <input onClick="window.location.href='/index'" type="button" value="BOOK EVENTS">
            </div>
          </div>
        </div>
        <div class="col-md-6 d-tj-c-tour" >
          <div class="col-md-12 d-tj-c-tour-bg" >
            <div class="d-tj-c-tour-top"  > 
              <h4 style="font-size:22px" class="text-center">
                Looking to campaign for cross-city tours ?
              </h4>
              <h4 class="text-center">
                <img src="/img/grab_tours.png" alt="" >
              </h4>
            </div>
            <div class="text-center d-tj-offset-top-20">
              <input onClick="window.location.href='/tours'" type="button" value="GRAB TOURS" >
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/top 2 col--> 
    <!-- tour-->
    <div class="d-tj-3-c-campaign d-tj-offset-top-40" >
      <h3>ARTIST TOURS</h3>
      <div class="d-tj-campaign-slide">
        <div class="list_carousel responsive" style="position:relative">
          <ul id="d-tj-c-slide">
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
              <div>
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
      <div class="who-campaigns">
        <h5>All the campaigns are initiated by the artists directly for the tours that they want to venture on. Every time you pledge your support, an artist gets one step closer to his dream tour across various cities in the country. Not only that, you get exclusive access to all the shows which are part of that tour, and even get extra freebies from the band on-the-day to make the event really special for you.
            <b>Start pledging now!</b><br><br>
            In case you are an artist and want to start a campaign of your own, learn how to do it by simply visiting our available tours page.
        </h5>
      </div>
        <div class="text-center" >
          <input class="apply-btn" onClick="window.location.href='/fans'" type="button" value="ALL CAMPAIGNS">
          <input class="apply-btn" onClick="window.location.href='/tours'" type="button" value="START CAMPAIGN">
      </div>
      <div class="clearfix"></div>
    </div>
    <!-- /tour--> 
    
    <!--bottom 2 col-->
    
    <div class="d-tj-offset-top-40  d-tj-col-2">
      <div class="row">
        <div class="col-md-6 d-tj-col-1" >
          <div class="col-md-12 d-tj-col-1-bg" >
            <div class="d-tj-events" >
              <h3>EVENTS</h3>
              <div class="event-ticker">
                <ul>
                  <li>
                    <div class="col-md-12 col-sm-12 col-xs-12 d-tj-offset-top-10 ">
                      <div class="col-md-2 col-xs-3 col-sm-2 d-tj-p0"> <img src="/image/eventTiles/phoenixmall.jpg" alt=""></div>
                      <div class="col-md-10 col-xs-9 col-sm-10 d-tj-p0">
                        <div class="col-md-9 col-sm-9 col-xs-12 d-tj-p0" >
                          <h5>Suraj Mani and The Tattva Trippers @ Phoenix Marketcity</h5>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 event-date" >
                          <h5>5-Oct</h5>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="col-md-12 col-sm-12 col-xs-12 d-tj-offset-top-10 ">
                      <div class="col-md-2 col-xs-3 col-sm-2 d-tj-p0"> <img src="/image/eventTiles/phoenixmall.jpg" alt=""></div>
                      <div class="col-md-10 col-xs-9 col-sm-10 d-tj-p0">
                        <div class="col-md-9 col-sm-9 col-xs-12 d-tj-p0" >
                          <h5>Mind Map @ Phoenix Marketcity</h5>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 event-date" >
                          <h5>5-Oct</h5>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                  <li>
                    <div class="col-md-12 col-sm-12 col-xs-12 d-tj-offset-top-10 ">
                      <div class="col-md-2 col-xs-3 col-sm-2 d-tj-p0"> <img src="/image/eventTiles/greenhaat.jpg" alt=""></div>
                      <div class="col-md-10 col-xs-9 col-sm-10 d-tj-p0">
                        <div class="col-md-9 col-sm-9 col-xs-12 d-tj-p0" >
                          <h5>Yogi, Shubham Roy and The Ways of the World @ Green Haat</h5>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 event-date" >
                          <h5>20-Sep</h5>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-tj-col-1 d-tj-network" >
          <div class="col-md-12 d-tj-col-1-bg" >
            <div class="d-tj-network-content" >
              <h3>NETWORK WITH US</h3>
              <div class="col-md-12 col-sm-12 col-xs-12 d-tj-offset-top-20 d-tj-pr10">
                <div class="col-md-2 col-xs-2 col-sm-2 d-tj-p0 d-tj-offset-top-10" > <img src="img/icon_tweet.png" alt=""> </div>
                <div class="col-md-10 col-xs-10 col-sm-10 d-tj-p0" >
                  <div class="network-ticker">
                  </div>
                </div>
              </div>

              <div class="clearfix"></div>
              <div class="col-md-12 d-tj-offset-top-20 d-tj-pr10" >
                <ul class=" list-unstyled social-list clear-fix">
                  <li><a style="margin-right:2px;" href="http://www.facebook.com/tommyjams.live" title="" alt="Facebook" target="_blank" class="social-list-facebook" data-original-title="Facebook"></a></li>
                  <li><a style="margin-right:2px;" href="http://twitter.com/TommyJams" title="" alt="Twitter" target="_blank" class="social-list-twitter" data-original-title="Twitter"></a></li>
                  <li><a style="margin-right:2px;" href="http://www.tommyjams.com/blog" title="" alt="Blog" target="_blank" class="social-list-blog" data-original-title="Blog"></a></li>
                </ul>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/bottom 2 col--> 
    
    <!--bottom 1 col-->
    <div class="col-md-12 d-tj-offset-top-40" style="background:#000;padding:10px;">
      <div >
      <h3 style="color:white;margin-left:20px;margin-top:20px;margin-bottom:20px;">AS SEEN IN</h3>
      <div class="footer layout-10 clear-fix" style="margin-bottom:20px;">   
          <a href="https://www.facebook.com/photo.php?fbid=538074186281265&set=a.387715207983831.97464.330212257067460&type=1&theater" target="_blank">                  
            <img src="image/icon/icon-partner/icon8.png" alt="" style="margin-left: 10px;"/>                
          </a> 
          <a href="http://timesofindia.indiatimes.com/tech/enterprise-it/strategy/A-website-that-helps-in-event-management/articleshow/20646626.cms" target="_blank">
            <img src="image/icon/icon-partner/icon6.png" alt="" style="margin-left: 10px;"/>                
          </a> 
          <a href="http://www.microsoft.com/en-in/accelerator/Blog.aspx" target="_blank">                  
            <img src="image/icon/icon-partner/icon4.png" alt="" style="margin-left: 10px;"/>                
          </a> 
          <a href="http://blog.venture-lab.org/index.php/133/venture-lab-is-music-to-tommyjams-ears/" target="_blank">
            <img src="image/icon/icon-partner/icon5.png" alt="" style="margin-left: 10px;"/>                     
          </a>
          <a href="http://startupfestival.in/startups" target="_blank">                  
            <img src="image/icon/icon-partner/icon3.png" alt="" style="margin-left: 10px;"/>                
          </a> 
          <a href="/radioone" target="_blank">                  
            <img src="image/icon/icon-partner/icon1.png" alt="" style="margin-left: 10px;"/>                
          </a>              
          <a href="http://mewsic.in" target="_blank">
              <img src="image/icon/icon-partner/icon2.png" alt="" style="margin-left: 10px;"/>                            
          </a>                     
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

      var options=
      {
        twitter:
        {
          name    : 'tommyjams',
          count   : 10
        }
      }
  
  /**************************************************************************/
  /*  Twitter                                 */
  /**************************************************************************/

  $.getJSON('twitterproxy/twitterhandle', function(data)
    {
      if(data.length)
      {
        var list=$('<ul style="height: 50px">');

        $(data).each(function(index,value)
        {
          list.append($('<li style="height: 50px">').append($('<h5>').html(linkify(value.text))));
        });

        $('.network-ticker').append(list);
      }

      $(".network-ticker").jCarouselLite({
        vertical: true,
        hoverPause:true,
        visible: 1,
        auto:2000,
        speed:1000
      });
  });
  
  /**************************************************************************/
			
	$(".d-tj-campaign-slide-img").hover(
           function () {
		   
            $(this).find('.d-tj-campaign-slide-hover-img').removeClass('hide');
            },
			function () {
				$(this).find('.d-tj-campaign-slide-hover-img').addClass('hide');
		 });	

	$('#d-tj-c-slide').carouFredSel({
			width:null,
			prev: '#prev5',
			next: '#next5',
			scroll: 1
		});

	$(".event-ticker").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 3,
		auto:2000,
		speed:1000
	});
});

</script> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> 
<script type="text/javascript" language="javascript" src="/script/jquery.carouFredSel-6.2.1-packed.js"></script> 
<script type="text/javascript" src="/script/jquery.easing.min.js"></script> 
<script type="text/javascript" src="/script/jquery.supersized.min.js"></script> 
<script type="text/javascript" src="/script/jquery.supersized.shutter.min.js"></script> 
<script type="text/javascript" src="/script/jcarousellite_1.0.1c4.js"></script> 
<script src="/script/tj.js"></script>
</body>
</html>