<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta property="og:title" content="<?print('One Bengaluru One Music: '.$name);?>"/>
  <meta property="og:type" content="website" />
  <meta property="og:image" content="<?print('http://tommyjams.com/image/radioone/artists/'.$image);?>"/>
  <meta property="og:url" content="http://tommyjams.com/radioone" />
  <meta property="og:site_name" content="TommyJams" />
  <meta property="og:description" content="TommyJams & Radio One 94.3: One Bengaluru One Music" />
  <meta property="fb:app_id" content="566516890030362" />
  <title>TommyJams & Radio One 94.3: One Bengaluru One Music</title>
  <link href="/style/style.css" rel="stylesheet" type="text/css" />
  <link href="/style/supersized/supersized.css" rel="stylesheet" type="text/css" />
  <link href="/stylecf/jquery.fancybox.css" rel="stylesheet" type="text/css"/>
  <link href="/style/videoTiles.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="/script/jquery.min.js" ></script>
  <script type="text/javascript" src="/script/jquery.supersized.min.js"></script>
  <script type="text/javascript" src="/script/jquery.fancybox.js"></script>
  <script type="text/javascript" src="/script/main.js"></script> <!--contains document ready function-->
  <script type="text/javascript" src="/script/videoTiles.js"></script> <!--contains document ready function-->
  <script language="javascript"> 

    function loadTilesCallback(a) 
    {
      console.log(JSON.stringify(a));
      $('#videoTilesContainer').load("/include/videoTiles.php", {json: JSON.stringify(a)});
    }

    function loadTiles(year,month,day) 
    {
      $("#loading-indicator").show();
      $.post('/radioone/loadTiles', {'year': year, 'month': month, 'day': day}, loadTilesCallback, 'json');
    }

  </script>
</head>
<body>
  <div class="d-tj-bg-overlay">
  <div class="container d-tj-container"> 
    <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="/img/tj.jpg" height="64" alt=""/></a>
    <div>
      <select id='Month'>
      <option value='1'>Janaury</option>
      <option value='2'>February</option>
      <option value='3'>March</option>
      <option value='4'>April</option>
      <option value='5'>May</option>
      <option value='6'>June</option>
      <option value='7'>July</option>
      <option value='8'>August</option>
      <option value='9'>September</option>
      <option value='10'>October</option>
      <option value='11'>November</option>
      <option value='12'>December</option>
      </select> 
    </div> 
    <div>
      <select id='Year'>
      <option value='1'>2014</option>
      <option value='2'>2013</option>
      </select> 
    </div>
    <!--top 2 col-->
    <div class=" d-tj-offset-top-40  d-tj-2-col-y-bg">  
      <div class="row">
        <div class="col-md-6 d-tj-book-events" >
          <div class="col-md-12 d-tj-book-events-bg" >

            <div class="d-tj-book-events-top"  > 
              <div id="videoTilesContainer" style="height: 100%; width: 100%; overflow-y: auto; position:relative;"></div>
            </div>
            
          </div>
        </div>  
        <div class="col-md-6 d-tj-c-tour" >
          <div class="col-md-12 d-tj-c-tour-bg" >
            <div class="d-tj-c-tour-top"  >
              <?  
                  $name = (json_decode($name));
                  $image = (json_decode($image));
                  $date = (json_decode($date));
                  $desc = (json_decode($desc));

                  $date = strtotime($date);
                  $date = date('jS F Y', $date);
              ?> 
              <h4><? print($name); ?> </h4>  
              <h4><? print($date); ?> </h4>  
              <h4><? print($desc); ?> </h4>  
            </div>
          </div>
        </div>
      </div>   
    </div>
    <!--/top 2 col--> 


</body>

<script language="javascript"> 
  <?
    if($urlyear && $urlmonth && $urlday)
      print("loadTiles($urlyear,$urlmonth,$urlday);");
    else
      print("loadTiles();");
  ?>
</script>
</html>