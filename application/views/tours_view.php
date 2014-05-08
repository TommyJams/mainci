<!DOCTYPE html>
<html>
<head>
<title>TommyJams - Tours</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">
<!-- Bootstrap -->
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href="/stylecf/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/stylecf/tj.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="/stylecf/supersized.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/stylecf/jquery.fancybox.css" type="text/css" media="screen" />

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

<!--venue modal-->
<? $tourDetail = (json_decode($tours));
  
  if($tourDetail)
  foreach($tourDetail as $tourDetail) 
  { 
    $venuesDetail = $tourDetail->venues; 
  } 
  
  if(isset($venuesDetail) && $venuesDetail)
  foreach($venuesDetail as $venue)
  { 
    $venue_name = $venue->venue_name;
    $venue_id = $venue->venue_id;
    $city = $venue->city;
    $image = $venue->image;
    $desc = $venue->desc;
    $link = $venue->link;
    $contact = $venue->contact;
  ?>
    <div class="venue-form<? print($venue_id); ?>" style="display: none;" >
      <div class="modal-content socialModal">
        <div class="modal-header">
          <h4><? print($venue_name); ?></h4>
        </div>
        <div class="modal-body modal-link">

          <div class="row">
            <div class="col-md-12">
                  <img src="/img/temp/<? print($image); ?>" style="margin-right:10px" align="left" alt="" height="150" width="150">
                  <h4><? print($desc); ?></h4>  
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <h4><? print(lang('str_tours_1').": ".$city); ?></h4>
              <h4><? print(lang('str_tours_2').": ".$contact); ?></h4>
              <a target="_blank" href="<? print($link);?>"><h4>Facebook</h4></a> 
            </div> 
          </div>

      </div>
        <div class="modal-footer">
          <a href="javascript:;" onclick="$.fancybox.close();" class="btn blk-btn" data-dismiss="modal"><? echo lang('str_tours_3');?></a> 
        </div>
      </div>
    </div>  
<? } ?>
<!--/venue modal-->

</head>
<body>   
<div class="d-tj-bg-overlay">
  <div class="container d-tj-container"> <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="img/tj.jpg" height="64" alt=""/></a>
    
    <? $tours = (json_decode($tours));
    
    if($tours)
    foreach($tours as $tour){ ?>
    <?
      $tour_id = $tour->tour_id;
      $tour_name = $tour->tour_name;
      $applyBy = $tour->applyBy;
      $startCamp = $tour->startCamp;
      $endCamp = $tour->endCamp;
      $tourDate = $tour->tourDate;
      $target = $tour->target;
      $venues = $tour->venues;
      $login_url = $tour->login_url;

      $date1 = strtotime($applyBy);
      $applyBy = date('jS F Y', $date1);

      $date2 = strtotime($startCamp);
      $startCamp = date('jS F Y', $date2);

    ?>
    
    <? 
    } 
    ?>
    
    <!--cirle connect-->
    <div class="d-tj-black-box d-tj-offset-top-40 d-tj-circle" >
      <h3><? echo lang('str_tours_4');?></h3>
      <div class="visible-lg visible-md d-tj-bg-strip" ></div>
      <div class="row d-tj-offset-top-40" >
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/down/a.png)"></div>
          <h5 style="color: #000000;">
           <b><? echo lang('str_tours_5');?></b><br>
          <? echo lang('str_tours_6');?>
          </h5>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/down/b.png)"></div>
          <h5 style="color: #000000;">
            <b><? echo lang('str_tours_7');?></b><br>
            <? echo lang('str_tours_8');?>
          </h5>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/down/c_1.png)"></div>
          <h5 style="color: #000000;">
          <b><? echo lang('str_tours_9');?></b><br>
          <? echo lang('str_tours_10');?>
          </h5>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/down/d.png)"></div>
          <h5 style="color: #000000;">
          <b><? echo lang('str_tours_11');?></b><br>
          <? echo lang('str_tours_12');?>
          </h5>
        </div>
      </div>
      <div class="text-center d-tj-offset-top-10 " >
        <?if(isset($login_url) && $login_url){?>
            <input class="apply-btn" style="" onclick="window.location.href='<?print($login_url);?>'" type="button" value="<? echo lang('str_tours_13');?>">
        <?}else{?>
            <input class="apply-btn" style="" type="button" value="<? echo lang('str_tours_14');?>">
        <?}?>
      </div>
    </div>
    <!-- /circle-connect-->

    <!-- tour-->
    <div class="d-tj-3-col d-tj-offset-top-30" >
      <div class="d-tj-slide">
        <div class="list_carousel responsive" style="position:relative">
          <ul id="foo5">            
              <?
                $featuredCampaigns = (json_decode($featuredCampaigns)); 
                if($featuredCampaigns)
                {
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
                          <p ><? echo lang('str_tours_15');?></p>
                        </li>
                      </ul>
                    </div>
                    <div class="col-md-6 d-tj-slide-btm col-sm-6 col-xs-6" >
                      <ul class="list-unstyled ">
                        <li>
                          <p><? print($days_to_go); ?> </p>
                        </li>
                        <li>
                          <p><? echo lang('str_tours_16');?></p>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
             </li> 
            <? } } ?>
          </ul>
          <div class="clearfix"></div>
          <a id="prev5" class="prev" href="#" ></a> <a id="next5" class="next" href="#"  ></a> </div>
      </div>
    </div>
    <!-- /tour--> 

    <div class="d-tj-black-box d-tj-offset-top-30 d-tj-why">
      <h3 style="margin-top: 0px;"><? echo lang('str_tours_17');?></h3>
      <div class="row d-tj-offset-top-40">
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/up/1.png)"></div>
          <h5 ><b><? echo lang('str_tours_18');?></b><br>
            <? echo lang('str_tours_19');?>
          </h5>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/up/2.png)"></div>
          <h5 ><b><? echo lang('str_tours_20');?></b><br>
            <? echo lang('str_tours_21');?>
          </h5>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/up/3.png)"></div>
          <h5><b><? echo lang('str_tours_22');?></b><br>
            <? echo lang('str_tours_23');?>
          </h5>
        </div>
        <div class="col-md-3 col-sm-6 text-center">
          <div class="d-tj-thumb img-circle" style="background-image:url(img/up/4.png)"></div>
          <h5 ><b><? echo lang('str_tours_24');?></b><br>
            <? echo lang('str_tours_25');?>
          </h5>
        </div>
      </div>
    </div>
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

  function venueBox(id)
  {
    var a = 'venue-form' + id;

    $.fancybox(
        $('.'+a).html(),
        {
            'width'             : 950,
            'height'            : 1100,
            'autoScale'         : false,
            'transitionIn'      : 'none',
            'transitionOut'     : 'none',
            'hideOnContentClick': false,
         }
    );  
  }   
</script> 
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script> 
<script type="text/javascript" language="javascript" src="/script/jquery.carouFredSel.packed.js"></script> 
<script type="text/javascript" src="/script/jquery.fancybox.js"></script>
<script type="text/javascript" src="/script/jquery.easing.js"></script> 
<script type="text/javascript" src="/script/jquery.supersized.min.js"></script> 
<script type="text/javascript" src="/script/jquery.supersized.shutter.min.js"></script> 
<script src="/script/tj.js"></script>
</body>
</html>