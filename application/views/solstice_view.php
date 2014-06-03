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
      <div class="d-tj-box " >
        <div class="row d-tj-tour">
          <div class="col-sm-12 col-xs-12 col-md-7"> 
            <iframe title="YouTube video player" class="d-tj-video" style="min-height: 363px; width: 100%;" 
            src="http://www.youtube.com/embed/<? print($vlink); ?>" frameborder="0" allowfullscreen></iframe>
          </div>
          <div class="col-sm-12 col-md-5 d-tj-black-box-container" >
            <div class="d-tj-black-box d-tj-tour-right" > 
              <div class="text-center d-tj-offset-top-20 pledge-btn-top" style="margin-bottom:0px">
              </div>
            </div>
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

  <script src="/script/bootstrap.min.js"></script>
  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script> 
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script type="text/javascript" src="/script/jquery.supersized.min.js"></script>
  <!--<script type="text/javascript" src="/script/jquery.supersized.shutter.min.js"></script>
  <script type="text/javascript" language="javascript" src="/script/jquery.carouFredSel.packed.js"></script> 
  <script type="text/javascript" src="/script/jquery.easing.js"></script> --> 
  <script src="/script/tj1.js"></script>
  <script type="text/javascript" src="/script/jquery.fancybox.js"></script>
</body>
</html>