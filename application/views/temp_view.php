<!DOCTYPE html>
<html>
<head>
<title>TommyJams - Revolutionizing Live Entertainment</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="Description" CONTENT="TommyJams is a vision, an initiative, a spark, which shall illuminate the budding music talent in India. Born in a Stanford University program, our aim is to develop a transparent, hassle-free and inexpensive community of Artists, Venues and Fans.">
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
<!-- Bootstrap -->
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href="/stylecf/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/stylecf/tj.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="/stylecf/supersized.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="/style/jquery.qtip.css"/>
<link rel="stylesheet" href="/stylecf/jquery.fancybox.css" type="text/css" media="screen" />
<script type="text/javascript" src="<?php echo base_url();?>script/linkify.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>script/script.js"></script>

  <div class="watchdemo-form" style="display: none;" >
    <div class="modal-content socialModal">
      <div class="modal-body modal-link">
        hi
      </div>
      <div class="modal-footer">
          <a href="javascript:;" onclick="$.fancybox.close();" class="btn blk-btn" data-dismiss="modal">Close</a> 
      </div>
    </div>
  </div>

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

  #newsletter-form 
  {
    margin-top:0px;
    margin-bottom:0px;
    margin-left:10px;
  }
    
  #newsletter-form input[type="text"]
  {
    border:10px solid #FFFFFF;
    height:39px;
    width:180px; 
    vertical-align: top;
  }

  #newsletter-form input[type="submit"]
  {
    width:80px;
    height:39px;
    cursor:pointer;
    text-align:center;
    font-size:15px;
    padding:10px 0px 10px 0px;
    border-color:#FFCC00;
    background-color:#FFCC00;
    color:#000000; 
  }

  #newsletter-form input[type="submit"]:hover
  {
    border-color:#FFFFFF;
    background-color:#FFFFFF;
    color:#000000; 
  }

  .event-ticker ul li a, .event-ticker ul li a:hover
  {
    color:#FFFFFF;
  }

  .d-tj-book-events a
  {
    text-decoration: none;
  }

  .d-tj-black-box-container input[type="button"]
  {
    font-size: 20px;
  }

  .who-campaigns h5
  {
    padding:0px 0px;
  }

  .d-tj-black-box-container h2
  {
    margin-top: 0px;
    margin-bottom: 15px;
    color:black;
  }

  .d-tj-offset-top-5 
  {
    margin-top: 5px;
  }

  /*p.subtitle-paragraph
  {
    font-family:'Dosis';
    margin-bottom:10px;
  }

  p.subtitle-paragraph,
  p.subtitle-paragraph span.bold
  {
    padding:0px;
    font-size:24px;
    font-weight:400;
    line-height:120%;
  }

  p.subtitle-paragraph span.bold
  {
    clear:both;
    display:block;
    font-weight:700;
  }*/

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
              <!--<input class="watchdemo" data-toggle="modal" href="#watchdemoModal" target="_blank" type="button" value="WATCH DEMO">-->
              <input onclick="window.open('/index', '_blank');" type="button" value="BOOK EVENTS">
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
              <input onclick="window.open('/tours', '_blank');" type="button" value="BOOK TOURS" >
            </div>
          </div>
        </div>
      </div>   
    </div>
    <!--/top 2 col--> 

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

    <!--Demo tile -->
    <div class="d-tj-box d-tj-offset-top-5" >
      <div class="row d-tj-tour">
        <div class="col-sm-12 col-xs-12 col-md-7"> 
          <iframe title="YouTube video player" class="d-tj-video" style="min-height: 300px; width: 100%;" 
          src="http://www.youtube.com/embed/kcOo3ge5URE" frameborder="0" allowfullscreen></iframe>
        </div>  
        <div class="col-sm-12 col-md-5 d-tj-black-box-container" >
          <h2>TOMMYJAMS ROADSHOWS </h2>
          <div class="who-campaigns">
            <img align="left" src="/img/roadshows_logo.png" style="margin-right:5px;width:120px">
            <h5>The RoadShows&#39 campaigns are initiated by the artists for the tours that they want to venture on. Every time you buy a ticket, an artist gets one step closer to his dream tour across various cities in the country. Not only that, you get exclusive access to all the shows which are part of that tour, and even get extra freebies from the band on-the-day to make the event really special for you.
              <b>Book a ticket now!</b>
            </h5>
          </div>
            <div class="text-center" >
              <input style="margin-top:10px" class="apply-btn" onclick="window.open('/roadshows', '_blank');" type="button" value="ALL CAMPAIGNS">
              <input style="margin-top:10px" class="apply-btn" onclick="window.open('/tours', '_blank');" type="button" value="START CAMPAIGN">
          </div> 
        </div>
      </div>
    </div>
    <!--/Demo tile -->

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
                  <a href="http://tommyjams.com/roadshows" target="_blank" class="" style="width: 100%">
                    <div class="col-md-12 col-sm-12 col-xs-12 d-tj-offset-top-10 ">
                      <div class="col-md-2 col-xs-3 col-sm-2 d-tj-p0"> <img src="/image/eventTiles/dbell.jpg" alt=""></div>
                      <div class="col-md-10 col-xs-9 col-sm-10 d-tj-p0">
                        <div class="col-md-9 col-sm-9 col-xs-12 d-tj-p0" >
                          <h5>TommyJams RoadShows @ D'Bell</h5>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 event-date" >
                          <h5>28-Dec</h5>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                  </li>
                  <li>
                  <a href="http://tommyjams.com/roadshows" target="_blank" class="" style="width: 100%">
                    <div class="col-md-12 col-sm-12 col-xs-12 d-tj-offset-top-10 ">
                      <div class="col-md-2 col-xs-3 col-sm-2 d-tj-p0"> <img src="/image/eventTiles/bflat.jpg" alt=""></div>
                      <div class="col-md-10 col-xs-9 col-sm-10 d-tj-p0">
                        <div class="col-md-9 col-sm-9 col-xs-12 d-tj-p0" >
                          <h5>TommyJams RoadShows @ bFlat</h5>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 event-date" >
                          <h5>21-Dec</h5>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </a>
                  </li>
                  <li>
                  <a href="http://tommyjams.com/blog/events/event/refuge-phoenix-bangalore/" target="_blank" class="" style="width: 100%">  
                    <div class="col-md-12 col-sm-12 col-xs-12 d-tj-offset-top-10 ">
                      <div class="col-md-2 col-xs-3 col-sm-2 d-tj-p0"> <img src="/image/eventTiles/phoenixmall.jpg" alt=""></div>
                      <div class="col-md-10 col-xs-9 col-sm-10 d-tj-p0">
                        <div class="col-md-9 col-sm-9 col-xs-12 d-tj-p0" >
                          <h5>Refuge @ Phoenix Marketcity</h5>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 event-date" >
                          <h5>15-Dec</h5>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </a>  
                  </li>
                  <li>
                  <a href="http://tommyjams.com/blog/events/event/shubham-roy-green-haat" target="_blank" class="" style="width: 100%">  
                    <div class="col-md-12 col-sm-12 col-xs-12 d-tj-offset-top-10 ">
                      <div class="col-md-2 col-xs-3 col-sm-2 d-tj-p0"> <img src="/image/eventTiles/phoenixmall.jpg" alt=""></div>
                      <div class="col-md-10 col-xs-9 col-sm-10 d-tj-p0">
                        <div class="col-md-9 col-sm-9 col-xs-12 d-tj-p0" >
                          <h5>Shubham Roy @ Green Haat</h5>
                        </div>
                        <div class="col-md-3 col-sm-3 col-xs-12 event-date" >
                          <h5>13-Dec</h5>
                        </div>
                      </div>
                      <div class="clearfix"></div>
                    </div>
                  </a>  
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
                  <li>
                    <!-- Newsletter form -->
                    <form name="newsletter-form" id="newsletter-form" action="" method="post" class="clear-fix">
                    <div class="block">  
                      <input type="text" name="newsletter-form-mail" id="newsletter-form-mail" placeholder="Your e-mail address" value=""/>
                      <input type="submit" id="newsletter-form-send" name="newsletter-form-send" class="button" value="Subscribe"/>
                    </div>
                    </form>
                    <!-- /Newsletter form -->
                  </li>
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
            <img src="image/icon/icon-partner/icon14.png" alt="" style="margin-left: 10px;"/>                
          </a> 
          <a href="http://timesofindia.indiatimes.com/tech/enterprise-it/strategy/A-website-that-helps-in-event-management/articleshow/20646626.cms" target="_blank">
            <img src="image/icon/icon-partner/icon12.png" alt="" style="margin-left: 10px;"/>                
          </a> 
          <a href="http://www.youtube.com/watch?v=RgMRdAkCJ_Q" target="_blank">
              <img src="image/icon/icon-partner/icon15.png" alt="" style="margin-left: 10px;"/>                            
          </a>
          <a href="http://www.microsoft.com/en-in/accelerator/Blog.aspx" target="_blank">                  
            <img src="image/icon/icon-partner/icon4.png" alt="" style="margin-left: 10px;"/>                
          </a> 
          <a href="http://blog.venture-lab.org/index.php/133/venture-lab-is-music-to-tommyjams-ears/" target="_blank">
            <img src="image/icon/icon-partner/icon5.png" alt="" style="margin-left: 10px;"/>                     
          </a>
          <a href="http://startupfestival.in" target="_blank">                  
            <img src="image/icon/icon-partner/icon9.png" alt="" style="margin-left: 10px;"/>                
          </a> 
          <a href="/radioone" target="_blank">                  
            <img src="image/icon/icon-partner/icon10.png" alt="" style="margin-left: 10px;"/>                
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
<script type="text/javascript" src="/script/jquery.fancybox.js"></script> 
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
      
  /*$(".d-tj-campaign-slide-img").hover(
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
    });*/

	$(".event-ticker").jCarouselLite({
		vertical: true,
		hoverPause:true,
		visible: 3,
		auto:2000,
		speed:1000
	});

  $('#newsletter-form').bind('submit',function(e) 
  {
    e.preventDefault();
    submitNewsletterForm();
  });

  /*$('body').on('click', '.watchdemo', function(){
        $.fancybox(
                $('.watchdemo-form').html(),
                {
                    'width'             : 950,
                    'height'            : 1100,
                    'autoScale'         : false,
                    'transitionIn'      : 'none',
                    'transitionOut'     : 'none',
                    'hideOnContentClick': false,
                 }
            );  
  });*/
});
  
</script> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> 
<script type="text/javascript" language="javascript" src="/script/jquery.carouFredSel-6.2.1-packed.js"></script> 
<script type="text/javascript" src="/script/jquery.easing.min.js"></script> 
<script type="text/javascript" src="/script/jquery.supersized.min.js"></script> 
<script type="text/javascript" src="/script/jquery.supersized.shutter.min.js"></script> 
<script type="text/javascript" src="/script/jcarousellite_1.0.1c4.js"></script> 
<script type="text/javascript" src="/script/jquery.blockUI.js"></script>
<script type="text/javascript" src="/script/jquery.qtip.min.js"></script>
<script type="text/javascript" src="/script/newsletter-form.js"></script>
<script src="/script/tj.js"></script>
</body>
</html>