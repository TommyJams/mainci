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
<!--<link rel="stylesheet" href="/stylecf/supersized.css" type="text/css" media="screen" />-->

<style>

.d-tj-black-box-container .d-tj-black-box
{
  min-height:200px;
}

</style>

</head>
<body>
<? $campaign = (json_decode($campaign));
    foreach($campaign as $row)
    { 
      $artist_name = $row->artist_name;
      $pledges = $row->pledges;
    } 
?>
<div class="d-tj-bg-overlay">
  	<div class="container d-tj-container"> <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="/img/tj.jpg" height="64" alt=""/></a>
  	<div class="d-tj-box " >
      <div class="row d-tj-tour">
        <div class="col-sm-12 col-xs-12 col-md-4"> 
        	<img src="/img/temp/31.jpg" alt="" style="min-width:250px;min-height:200px">
        </div>
        <div class="col-sm-12 col-md-8 d-tj-black-box-container" >
          <div class="d-tj-black-box d-tj-tour-right" > 
            <h3 class="raise">Contribution Summary</h3> 
              <div class="col-sm-12 col-md-3 " >
  	           	<h4 class="tgt" >Fan Name</h4>
  	        		<h4 class="tgt" >Selected Perk</h4>
  	        		<h4 class="tgt" >Fan Contribution</h4>
	            </div>
              <div class="col-sm-12 col-md-9 " >
	           		<h4 class="tgt" >John</h4>
	        		  <h4 class="tgt" >Copper Ticket</h4>
	        		  <h4 class="tgt" >200</h4>
              </div>	
          </div>
        </div>
      </div>
    </div>

    <div class="d-tj-box d-tj-offset-top-30" >
      <div class="row d-tj-tour">
        <div class="d-tj-pledge">
          <? foreach($pledges as $pledge)
            { 
              $amount = $pledge->amount;
              $pledge_desc = $pledge->desc;
          ?>
          <div style="">$amount</div>
          <div style="">$pledge_desc</div>
          <div class="seperator" ></div>
          <? } ?>
        </div>
      </div>
    </div>

  </div>
</div>   


<script src="/script/jquery.js"></script> 
<script src="/script/bootstrap.min.js"></script>
</body>
</html>  
    
