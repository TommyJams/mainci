<!DOCTYPE html>
<html>
<head>
<title>TommyJams - Payment Portal</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="favicon.ico" rel="shortcut icon">
<!-- Bootstrap -->
<link href='http://fonts.googleapis.com/css?family=Dosis' rel='stylesheet' type='text/css'>
<link href="/stylecf/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="/stylecf/tj.css" rel="stylesheet" media="screen">
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="/stylecf/jquery.fancybox.css" type="text/css" media="screen" />

<!--<link rel="stylesheet" href="/stylecf/supersized.css" type="text/css" media="screen" />-->

<style>

.d-tj-black-ticket-box {
  background:#000;
  color:#fff; 
  min-height: 160px;
  padding: 30px 30px 30px 30px;
}

.d-tj-ticket-box {
  background:#FFCC00;
  padding:10px;
  margin-top:5px;
}

.d-tj-tour-right-edit input {
  color: #000;
}

.d-tj-tour-right-edit input:hover {
  color: #FFFFFF;
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
    <html>
    <body>
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
  </body>
  </html>
<? } ?>
<!--/venue modal-->

</head>
<body>
<? $campaign = (json_decode($campaign));
    foreach($campaign as $row)
    { 
      $campaign_id = $row->campaign_id;
      $artist_name = $row->artist_name;
      $pledges = $row->pledges;
      $venues = $row->venues;
    } 
?>
<div class="d-tj-bg-overlay">
  	<div class="container d-tj-container"> <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="/img/tj.jpg" height="64" alt=""/></a>
  	<div class="d-tj-box " >
      <div class="row d-tj-tour">
        <div class="col-sm-12 col-xs-12 col-md-4">
          <div class="row" style="margin:0;">
              <h3 style="font-size:20px">The Kanchan Daniel Band</h3>
          </div>
          <div class="row text-center">
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
            <div class="col-md-5 col-sm-6  d-tj-tour-left" >  
            <div style="">
              <a href="javascript:;" onclick="venueBox(<? print($venue_id); ?>);" data-toggle="modal" >
                <img src="/img/temp/<? print($image); ?>" style="height:100px;width:100px" alt="">
              </a>
            </div>
              <h4 style="font-size:15px">
                <span ><? print($venue_name); ?><br></span> <? print($city); ?><br><? print($tour_date); ?>
              </h4> 
            </div>
            <? 
              } 
            ?>
          </div>   
        </div>

        <div class="col-sm-12 col-md-8 d-tj-black-ticket-box" style="margin-left:-25px" >
          <h3 style="font-weight:400;font-size:30px;margin-bottom:15px">Ticket Summary</h3>
          <?$fan = (json_decode($fanData['fan'])); 
            foreach($fan as $fanRow)
            { 
              $fan_name = $fanRow->name;
              $fan_location = $fanRow->location;
            }
            
            $ticket = (json_decode($fanData['ticket'])); 
            foreach($ticket as $ticketRow)
            { 
              
              $ticket_type = $ticketRow->ticket_type;
              $ticket_amount = $ticketRow->ticket_amount;
              $ticket_quantity = $ticketRow->ticket_quantity;
              $pledge_desc = $ticketRow->pledge_desc;
          ?>
            <h4 style="margin-top:5px;margin-left:5px;margin-bottom:5px">
              <? print($ticket_type); ?> : &#8377 <? print($ticket_amount); ?> : <? print($ticket_quantity); ?>
            </h4>
            <h4 style="margin-top:5px;margin-left:5px;margin-bottom:5px"><? print($pledge_desc); ?></h4>
            <div class="seperator" ></div>   
          <? } ?>
            <div class="text-center" >
              <input style="" onclick="window.open('/campaign/<? print($campaign_id); ?>');" type="button" value="EDIT TICKETS">
            </div>
        </div>
        
      </div>
    </div>

    <div class="d-tj-black-box d-tj-offset-top-30" style="height:300px">
      <h3 style="margin-top: 0px;">SOCIAL SHARE</h3>
      <div class="">
      </div>
    </div> 

    <div class="d-tj-offset-top-30 d-tj-col-2">
      <div class="row">
        <div class="col-md-6 d-tj-col-1" >
          <div class="col-md-12 d-tj-col-1-bg" >
            <div class="d-tj-events" >
              <h3>PERSONAL DETAILS</h3>
              <div class="row d-tj-black-box d-tj-tour-right-edit"> 
                <input class="form-control input-lg pull-left" type="text" id="phone" name="phone" value="<? print($fan_name); ?>" placeholder=""></input>
                <input class="form-control input-lg pull-left" type="text" id="phone" name="phone" placeholder="ENTER EMAIL"></input>
                <input class="form-control input-lg pull-left" type="text" id="phone" name="phone" placeholder="ENTER PHONE NUMBER [10-DIGIT]"></input>
                <input class="form-control input-lg pull-left" type="text" id="phone" name="phone" value="<? print($fan_location); ?>" placeholder=""></input>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-6 d-tj-col-1 d-tj-network" >
          <div class="col-md-12 d-tj-col-1-bg" >
            <div class="d-tj-events" >
              <h3>PAYMENT DETAILS</h3> 
              <div class="row d-tj-black-box d-tj-tour-right-edit"> 
                <input class="form-control input-lg pull-left" type="text" id="phone" name="phone" placeholder="ENTER NAME"></input>
                <input class="form-control input-lg pull-left" type="text" id="phone" name="phone" placeholder="ENTER EMAIL"></input>
                <input class="form-control input-lg pull-left" type="text" id="phone" name="phone" placeholder="ENTER PHONE NUMBER [10-DIGIT]"></input>
                <input class="form-control input-lg pull-left" type="text" id="phone" name="phone" placeholder="ENTER LOCATION"></input>
              </div> 
            </div>
          </div>
        </div>
      </div>
    </div>     

    <div class="col-sm-12 col-xs-12 col-md-12" style="">
      <div class="row">
        <div class="text-center" >
          <input style="margin-top: 30px;width: 400px" onclick="window.open('/tours');" type="button" value="PAY NOW">
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

<script>

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

<script src="/script/jquery.js"></script> 
<script src="/script/bootstrap.min.js"></script>
<script type="text/javascript" src="/script/jquery.fancybox.js"></script>
</body>
</html>  
    
