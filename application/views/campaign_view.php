<!DOCTYPE html>
<html>
<head>
<title>TommyJams - Campaign Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/favicon.ico" rel="shortcut icon">
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

<style>

.d-tj-tour-right h2 a
{
  color:#FFFFFF;
  text-decoration: none;
}

</style>

<!--venue modal-->
<? $tourDetail = (json_decode($campaign));
  foreach($tourDetail as $tourDetail) 
  { 
    $venuesDetail = $tourDetail->venues; 
  } 
  
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
              <h4>Location: <? print($city); ?></h4>
              <h4>Contact: <? print($contact); ?></h4>
              <a target="_blank" href="http://<? print($link);?>"><h4>Link</h4></a> 
            </div> 
          </div>

      </div>
        <div class="modal-footer">
          <a href="javascript:;" onclick="$.fancybox.close();" class="btn blk-btn" data-dismiss="modal">Close</a> 
        </div>
      </div>
    </div>  
<? } ?>
<!--/venue modal-->    

<?
  $campaign = (json_decode($campaign));
  foreach($campaign as $row)
  {
    $raised = $row->raised;
    $totalPledges = $row->totalPledges;
    $target = $row->target;
    $days_to_go = $row->days_to_go;
    $tourDate = $row->tourDate;
    $venues = $row->venues;
    $pledges = $row->pledges;
    $contributors = $row->contributes;
    $campaign_desc = $row->campaign_desc;
    $ticket_widget = $row->ticket_widget;
    $widget_height = $row->widget_height;
    $vlink = $row->videoId;
    $fb = $row->fb;
    $twitter = $row->twitter;
    $scloud = $row->scloud;
    $bandcamp = $row->bandcamp;
    $ytube = $row->ytube;
    $website = $row->website; 
    $artist_name = $row->artist_name;
    $backimg = $row->image1;
    $fbEventName = $row->fbEventName;
    $fbEventPic = $row->fbEventPic;
    $fbEventURL = $row->fbEventURL;
    $fbEventStatus = $row->fbEventStatus;
    $fbEventJoinees = $row->fbEventJoinees;
    $fbLoginURL = $row->fbLoginURL;
    //$login_url = $row->$login_url;

    $date = strtotime($tourDate);
    $tourDate = date('jS F Y', $date);
  }
?>

<meta property="og:title" content="Tour with TommyJams" />
<meta property="og:image" content="<? print(base_url().'images/artist/campaign/'.$backimg); ?>"/>
<meta property="og:description" content="<?print($artist_name);?> is touring with TommyJams and coming to a venue near you. Pre-book your tickets now! \nTarget Sales: <? print($target); ?>" />

</head>

<body>
<div class="d-tj-bg-overlay">
  <div class="container d-tj-container"> <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="/img/tj.jpg" height="64" alt=""/></a>
    <div class="d-tj-box " >
      <div class="row d-tj-tour">
        <div class="col-sm-12 col-xs-12 col-md-7"> 
          <iframe title="YouTube video player" class="d-tj-video" style="min-height: 363px; width: 100%;" 
          src="http://www.youtube.com/embed/<? print($vlink); ?>" frameborder="0" allowfullscreen></iframe>
        </div>  
        <div class="col-sm-12 col-md-5 d-tj-black-box-container" >
          <div class="d-tj-black-box d-tj-tour-right" > 
            <h2 style="margin-bottom: 20px;margin-top:-10px;text-transform:none;font-weight:400;font-size:40px"><? print($artist_name); ?></h2>
            <h2 class="raise" style="font-size:40px">&#8377 <? print($raised); ?><a style="font-size:18px"> funded of &#8377 <? print($target); ?></a></h2>     
            <h2 class="tgt" style="font-size:40px"><? print($totalPledges); ?><a style="font-size:18px"> contributors</a></h2> 
            <!--<h4 class="tgt" >TARGET : INR <? //print($target); ?></h4>-->
            <h2 style="font-size:40px"><? print($days_to_go); ?><a style="font-size:18px"> days to go</a></h2> 
            <!--<h4 style="line-height:0.5px"> days to go </h4>-->
            <div class="text-center d-tj-offset-top-20 pledge-btn-top" style="margin-bottom:0px">
              <input type="button" value="BUY NOW" onclick="" >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div  class="d-tj-artist-container d-tj-offset-top-40">
      <div> 
        <!--Artist-->
        <div class="col-md-7 " >
        <div class="row"> 
        <div class="d-tj-artist">    
          <h3 style="margin-top: 5px; margin-bottom: 20px; text-transform:none;"><? print($artist_name); ?></h3>
          <? foreach($venues as $venue){ ?>
            <?
              $venue_name = $venue->venue_name;
              $venue_id = $venue->venue_id;
              $city = $venue->city;
              $image = $venue->image;
              $tour_date = $venue->tour_date;

              $date = strtotime($tour_date);
              $tour_date = date('jS F Y', $date);

            ?>
          <div class="col-md-12 col-sm-12 col-xs-7 d-tj-venue-box">
            <div class="col-md-4 col-xs-12 col-sm-5 d-tj-p0"> 
              <a href="javascript:;" onclick="venueBox(<? print($venue_id); ?>);" data-toggle="modal" >
                <img src="/img/temp/<? print($image); ?>" alt="" style="max-height: 150px; margin-bottom: 10px">
              </a>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-7 col-xs-12 col-sm-6 d-tj-p0" >
              <h4 >
                <span ><? print($venue_name); ?> <br>
                </span> <? print($city); ?><br><? print($tour_date); ?>
              </h4>
            </div>
          </div>
          <? 
            } 
          ?>
          <div class="clearfix"></div>
          <!--date-->
          <!--<div class="d-tj-offset-top-30">
            <h4>TOUR DATE: <? print($tourDate); ?></h4>
          </div>-->
          <!--/date--> 
          <!-- social-->
          <div class="d-tj-offset-top-10">
            <ul class=" list-unstyled social-list clear-fix">
            <?           
              if($fb!="")
              {
                print("<li ><a style='margin-right:2px;' href='$fb' title='Facebook' alt='Facebook' target='_blank' class='social-list-facebook'></a></li >");
              }
              if($twitter!="")
              { 
                print("<li ><a style='margin-right:2px;' href='$twitter' title='Twitter' alt='Twitter' target='_blank' class='social-list-twitter'></a></li >"); 
              }
              if($scloud!="")
              {
                print("<li ><a style='margin-right:2px;' href='$scloud' title='SoundCloud' alt='SoundCloud' target='_blank' class='social-list-scloud'></a></li >"); 
              }
              if($bandcamp!="")
              {
                print("<li ><a style='margin-right:2px;' href='$bandcamp' title='BandCamp' alt='BandCamp' target='_blank' class='social-list-bandcamp'></a></li >"); 
              }
              if($ytube!="")
              {
                print("<li ><a style='margin-right:2px;' href='$ytube' title='YouTube' alt='YouTube' target='_blank' class='social-list-youtube'></a></li >"); 
              }
              if($website!="")
              {
                print("<li ><a style='margin-right:2px;' href='$website' title='Website' alt='Website' target='_blank' class='social-list-website'></a></li >"); 
              }
            ?>
            </ul>
          </div>
          <div class="clearfix"></div>
          <!-- /social-->
          
          <div class="d-tj-offset-top-30">
            <h4>DESCRIPTION</h4>
            <h5><? print($campaign_desc); ?></h5>
          </div>

        </div>  

        <!-- Social Share -->
        <div class="d-tj-offset-top-30 d-tj-artist" >
          <div>
            <h3 style="margin-top: 5px;">SHARE ON SOCIAL MEDIA</h3>
          </div>
          <div>
            <ul class=" list-unstyled social-list-share clear-fix">
              <li><a style="margin-right: 5px;" href="#" title="Share on Facebook" class='social-list-facebook-share' onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;"></a></li>
              <li><a title="Share on Twitter" class='social-list-twitter-share' href="https://twitter.com/share?text=<?print($artist_name);?>%20is%20touring%20with%20TommyJams%20and%20coming%20to%20a%20venue%20near%20you.%20Pre-book%20your%20tickets%20now!" target="_blank" data-lang="en"></a>

              <!--  <a href="#" title="Share on Twitter"  class='social-list-twitter-share'  onclick="window.open('https://twitter.com/share?u='+encodeURIComponent(location.href), 'width=626,height=436'); return false;" data-related="jasoncosta" data-lang="en" data-text="<?print($artist_name);?> is touring with TommyJams and coming to a venue near you. Pre-book your tickets now! \nTarget Sales: <? print($target); ?>" data-size="large" data-count="none"></a></li>-->
            </ul>
            <div class="clearfix"></div>
            <?
            if($fbEventURL && $fbEventName)
            {
            ?>
              <div class="seperator" ></div>
              <div class='social-list-fb-event'>
                <a class='social-list-fb-event-title' href='<? print($fbEventURL); ?>' target='_blank'>
                  <div class='social-list-fb-event-icon pull-left'></div>
                  <div class='social-list-fb-event-name pull-left'><? print($artist_name); ?> tours with TommyJams</div>
                </a>
                <img src='<? print($fbEventPic); ?>' class='social-list-fb-event-pic pull-left'/>
                <div class='pull-left' style='max-width: 65%;'>
                  <a href='<? print($fbLoginURL); ?>' class='social-list-fb-event-link'><? print($fbEventStatus); ?></a>
                  <div class='pull-left' style='clear:left;'>
                    <?
                    $countFaces = 0;
                    $facesToShow = 3;
                    foreach($fbEventJoinees as $row)
                    {
                      if($countFaces < $facesToShow)
                        print("<a href='https://facebook.com/$row' class='social-list-fb-event-href' target='_blank'><img src='https://graph.facebook.com/$row/picture?type=square' class='social-list-fb-event-img'></a>");
                      $countFaces++;
                    }
                    if($countFaces > $facesToShow)
                    {
                      $countFaces -= $facesToShow;
                      print("<a href='' class='social-list-fb-event-href' style='padding: 10px;'> and $countFaces others</a>");
                    }
                    ?>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
            <?
            }
            ?>
          </div>
        </div>   
        <!-- /Social Share -->
        </div>
        </div>
        <!--/Artist--> 

        <!-- Pledge-->
        <div class="col-md-5 ">
          <div class="row">

            <!--Tabs -->
            <div class="d-tj-tab">
              <ul id="myTab" class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">Tickets</a></li>
                <li class=""><a href="#profile" data-toggle="tab">Contributors</a></li>
              </ul>
            </div>
            <div id="myTabContent" class="tab-content">
              <div class="tab-pane fade active in" id="home">
                <div class="d-tj-pledge">
                  <? if(!isset($ticket_widget)) { ?>
                  <h4>NOTE: Tickets will be enabled after verification.</h4><br>
                  <? foreach($pledges as $pledge){ ?>
                  <?
                    $amount = $pledge->amount;
                    $pledge_desc = $pledge->desc;
                    $ticket_type = $pledge->ticket_type;
                  ?>
                  <div style="">
                    <h4 style="font-size:25px">
                      <? print($ticket_type); ?> : &#8377 <? print($amount); ?>
                      <div onclick="ticketCount('<? print($ticket_type); ?>','plus');" class="btn-plus-count pull-right" style="margin-top:2px"><a class="btn-plus-count-hover"></a></div>
                      <input class="text-center pull-right" type="text" id="<? print($ticket_type); ?>count" name="<? print($ticket_type); ?>count" placeholder="0" value="0" disabled="disabled" style="width:25px;height:25px;margin-left:5px;margin-right:5px;border:1px dashed #000000;font-size:20px;color:white;" />
                      <div onclick="ticketCount('<? print($ticket_type); ?>','minus');" class="btn-minus-count pull-right" style="margin-top:2px"><a class="btn-minus-count-hover"></a></div> 
                    </h4>
                    <h5><? print($pledge_desc); ?> </h5>
                  </div>
                  <div class="seperator" ></div>
                  <? 
                    } }
                  ?>
                  <? if(isset($ticket_widget)) { ?>
                    <iframe frameborder="0" src="<? print($ticket_widget); ?>" width="315" height="<? print($widget_height); ?>"></iframe>
                    <div class="d-tj-overlay" style="width:105%; z-index:1000; position:relative; background-color:black;"> 
                    </div>
                  <? } ?>
                </div>
              </div>
              <div class="tab-pane fade" id="profile">
                <div class="d-tj-pledge">
                  <? if(isset($contributors)) { ?> 
                    <table class="table" >
                    <tbody> 
                  <? foreach($contributors as $contributor){ ?>
                  <?
                    $fans_name = $contributor->name;
                    $fans_contribution = $contributor->amount;
                    $fans_email = $contributor->email;
                    $fans_contact = $contributor->contact;
                    $fans_location = $contributor->location;
                  ?>
                  
                      <tr>
                        <td style="font-size:18px"><? print($fans_name); ?></td>
                        <td style="font-size:18px">&#8377 <? print($fans_contribution); ?></td>
                        <td style="font-size:18px"><? print($fans_location); ?></td>
                      </tr>
                      
                    <!--  <h4><? //print($fans_name); ?></h4>
                      <h5>INR <? //print($fans_contribution); ?></h5>
                      <h5><? //print($fans_location); ?></h5> 
                          
                  <div class="seperator" ></div>  -->
                  <? } ?> </tbody>  
                  </table>
                  <? } ?>
                  <? if(!isset($contributors)) { $contributors = "";?>
                  <h4>Be the first fan to buy a ticket and contribute to the <b><?print($artist_name);?></b> tour.</h4>
                  <? } ?>
                </div>
              </div>
            </div>
            <!--/Tabs -->

            <div class=" d-tj-offset-top-30 pledge-btn" >
              <input type="button" value="BUY NOW" style="" onclick="">
            </div>
          </div>
        </div>
        <!--  /Pledge-->  
    </div>
      <div class="clearfix"></div>
    </div>
    <!--  <div  class="d-tj-artist-container d-tj-offset-top-40">-->
        
  </div>
  
  <!-- Footer  -->      
  <?
    include("include/footer.php");
  ?>
  <!-- /Footer  -->

</div>

<img src="/images/artist/campaign/<? print($backimg); ?>" id="supersized">

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
  });

  function ticketCount(type,use)
  {
    if(use == "plus")
    {
      var id = type + 'count';
      var pluscount = $('#'+id).val();
      console.log(pluscount);
      var pluscount = pluscount++;
      console.log(pluscount);
      $('#'+id).val(pluscount);
    }
    if(use == "minus")
    {
      var id = type + 'count';
      var minuscount = $('#'+id).val();
      console.log(minuscount);
      var minuscount = minuscount--;
      console.log(minuscount);
      $('#'+id).val(minuscount);
    }
  }

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
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
<!--<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>-->
<!--<script type="text/javascript" src="/script/jquery.supersized.min.js"></script>-->
<!--<script type="text/javascript" src="/script/jquery.supersized.shutter.min.js"></script>
<script type="text/javascript" language="javascript" src="/script/jquery.carouFredSel.packed.js"></script> 
<script type="text/javascript" src="/script/jquery.easing.js"></script> --> 
<!--<script src="/script/tj1.js"></script>-->
<script type="text/javascript" src="/script/jquery.fancybox.js"></script>
</body>
</html>