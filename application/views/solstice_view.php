<!DOCTYPE html>
<html>
<head>
  <title>TommyJams: Solstice Bangalore</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta property="og:title" content="TommyJams: Solstice Bangalore" />
  <link href="/favicon.ico" rel="shortcut icon">
  <link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
  <link href="/stylecf/bootstrap.min.css" rel="stylesheet" media="screen">
  <link href="/stylecf/tj.css" rel="stylesheet" media="screen">
  <link rel="stylesheet" href="/stylecf/supersized.css" type="text/css" media="screen" />
  <link rel="stylesheet" href="/stylecf/jquery.fancybox.css" type="text/css" media="screen" />
</head>
<body>
  <div class="d-tj-bg-overlay">
    <div class="container d-tj-container"> <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="/img/tj.jpg" height="64" alt=""/></a> 
      <!--top 2 col-->
      <div class=" d-tj-offset-top-40  d-tj-2-col-y-bg">  
        <div class="row">
          <div class="col-md-6 d-tj-book-events" >
            <div class="col-md-12 d-tj-book-events-bg" >
              <div class="d-tj-book-events-top" > 
                <h4 style="font-size:22px" class="text-center">
                  <? echo lang('str_book_events');?>
                </h4>
                <h4 class="text-center">
                  <img src="/img/book_events.png" alt="" >
                </h4>
              </div>
              <div class="text-center d-tj-offset-top-20">
                <!--<input class="watchdemo" data-toggle="modal" href="#watchdemoModal" target="_blank" type="button" value="WATCH DEMO">-->
                <input onclick="window.open('/index', '_blank');" type="button" value="<? echo lang('btn_book_events');?>">
              </div>
            </div>
          </div>
          <div class="col-md-6 d-tj-c-tour" >
            <div class="col-md-12 d-tj-c-tour-bg" >
              <div class="d-tj-c-tour-top"  > 
                <h4 style="font-size:22px" class="text-center">
                  <? echo lang('str_book_tours');?>
                </h4>
                <h4 class="text-center">
                  <img src="/img/grab_tours.png" alt="" >
                </h4>
              </div>
              <div class="text-center d-tj-offset-top-20">
                <input onclick="window.open('/tours', '_blank');" type="button" value="<? echo lang('btn_book_tours');?>" >
              </div>
            </div>
          </div>
        </div>   
      </div>
      <!--/top 2 col--> 

      <!--Demo tile -->
      <div class="d-tj-box d-tj-offset-top-40" >
        <div class="row d-tj-tour">
          <div class="col-sm-12 col-xs-12 col-md-7"> 
            <iframe title="YouTube video player" class="d-tj-video" style="min-height: 300px; width: 100%;" 
            src="http://www.youtube.com/embed/kcOo3ge5URE" frameborder="0" allowfullscreen></iframe>
          </div>  
          <div class="col-sm-12 col-md-5 d-tj-black-box-container" >
            <h2><? echo lang('str_title_roadshows');?></h2>
            <div class="who-campaigns">
              <img align="left" src="/img/roadshows_logo.png" style="margin-right:5px;width:120px">
              <h5>
                <? echo lang('str_desc_roadshows');?>
                <b>
                  <? echo lang('str_book_roadshows');?>
                </b>
              </h5>
            </div>
              <div class="text-center" >
                <input style="margin-top:10px" class="apply-btn" onclick="window.open('/roadshows', '_blank');" type="button" value="<? echo lang('btn_all_campaigns'); ?>">
                <input style="margin-top:10px" class="apply-btn" onclick="window.open('/tours', '_blank');" type="button" value="<? echo lang('btn_start_campaign');?>">
            </div> 
          </div>
        </div>
      </div>
      <!--/Demo tile -->

      <!-- tour-->
      <div class="d-tj-3-col d-tj-offset-top-30" >
        <div class="d-tj-slide">
          <div class="list_carousel responsive" style="position:relative">
            <ul id="foo5">            
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
                            <p>funded</p>
                          </li>
                          <li >
                            <p >str_tours_15</p>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
               </li>
            </ul>
            <div class="clearfix"></div>
            <a id="prev5" class="prev" href="#" ></a> <a id="next5" class="next" href="#"  ></a> </div>
        </div>
      </div>
      <!-- /tour--> 

    </div>
    <!-- Footer  -->
    <?
      include("include/footer.php");
    ?>
    <!-- /Footer  -->  
  </div>

  <img src="/images/background/BotanicalGarden.jpg" id="supersized">
  <script src="/script/jquery.js"></script> 
  <script src="/script/bootstrap.min.js"></script>
  <script type="text/javascript" src="/script/jquery.fancybox.js"></script> 

</body>
</html>