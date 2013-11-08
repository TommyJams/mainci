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
<link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
<link rel="stylesheet" href="/stylecf/supersized.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/stylecf/jquery.fancybox.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="/style/jquery.qtip.css"/>

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

<style>
.video-link{display:none}
.help-form{display:none}
.d-tj-video-edit-bdr{min-height: 240px;}
.d-tj-video-edit-bdr a{color:white;text-decoration:none}
</style>
<!--Video modal-->
<div class="video-link" >
  <div class="modal-content socialModal">
    <div class="modal-header">
      <h4>Add  Video Link</h4>
    </div>
    <div class="modal-body modal-link">
      <input type="text" value="http://" id="videolink" name="videolink" class="input-lg" onkeypress="handleKeyPress(event)">
    </div>
    <div class="modal-footer">
      <a href="javascript:;" onclick="$.fancybox.close();" class="btn blk-btn" data-dismiss="modal">Submit</a> 
    </div>
  </div>
</div>
<!--/Video modal--> 

<!--venue modal-->
<? $tourDetail = (json_decode($getTourDetail));
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

<!--Help modal-->
<div class="help-form" >
  <div class="modal-content socialModal">
  <div class="modal-header">
    <h4>Help</h4>
  </div>

  <div class="modal-body modal-link">
          <table class="table table-hover" >
            <thead>
              <tr >
                <th>PLEDGE AMOUNT (INR.)</th>
                <th>BENEFIT</th>
              </tr>
            </thead>
            <tbody>
            <tr style="background-color: #000000;" title="Click to use this value" onclick="usePledgeVal('PledgeVal1');">
              <td id="pledgeAmnt1">500 </td>
              <td id="benefit1">Get a free band mug</td>
            </tr>
    
            <tr style="background-color: #000000;" title="Click to use this value" onclick="usePledgeVal('PledgeVal2');">
              <td id="pledgeAmnt2">1000 </td>
              <td id="benefit2">Get a free signed t-shirt</td>
            </tr>

            <tr style="background-color: #000000;" title="Click to use this value" onclick="usePledgeVal('PledgeVal3');">
              <td id="pledgeAmnt3">2500 </td>
              <td id="benefit3">Have dinner with the band</td>
            </tr>
          </tbody>  
          </table>
  </div>   
    
  <div class="modal-footer">
      <a href="javascript:;" onclick="$.fancybox.close();" class="btn blk-btn" data-dismiss="modal">Close Help</a> 
  </div>

  </div>
</div>
<!--/Help modal-->   

<!--Social modal 1-->
<div class="form1" style="display: none;">
  <div class="modal-content socialModal">
    <div class="modal-header">
      <h4>Add  Link</h4>
    </div>
    <div class="modal-body modal-link">
      <input type="text" value="http://" id="SocialLink1" name="SocialLink" class="input-lg" onkeypress="handleKeyPress(event)">
    </div>
    <div class="modal-footer"><a href="javascript:;" onclick="$.fancybox.close();" class="btn blk-btn" data-dismiss="modal">Submit</a></div>
  </div>
</div>
<!--/Social modal 1-->

<!--Social modal 2-->
<div class="form2" style="display: none;">
  <div class="modal-content socialModal">
    <div class="modal-header">
      <h4>Add  Link</h4>
    </div>
    <div class="modal-body modal-link">
      <input type="text" value="http://" id="SocialLink2" name="SocialLink" class="input-lg" onkeypress="handleKeyPress(event)">
    </div>
    <div class="modal-footer"><a href="javascript:;" onclick="$.fancybox.close();" class="btn blk-btn" data-dismiss="modal">Submit</a></div>
  </div>
</div>
<!--/Social modal 2-->

<!--Social modal 3-->
<div class="form3" style="display: none;">
  <div class="modal-content socialModal">
    <div class="modal-header">
      <h4>Add  Link</h4>
    </div>
    <div class="modal-body modal-link">
      <input type="text" value="http://" id="SocialLink3" name="SocialLink" class="input-lg" onkeypress="handleKeyPress(event)">
    </div>
    <div class="modal-footer"><a href="javascript:;" onclick="$.fancybox.close();" class="btn blk-btn" data-dismiss="modal">Submit</a></div>
  </div>
</div>
<!--/Social modal 3-->

</head>
<body>
<div class="d-tj-bg-overlay">
  <div class="container d-tj-container"> <a title="Revolutionizing Live Entertainment" href="http://www.tommyjams.com/" class="d-tj-logo"><img src="/img/tj.jpg" height="64" alt=""/></a>
    <form name="editcampaign" id="editcampaign" method="post" enctype="multipart/form-data">
      <?  $getTourDetail = (json_decode($getTourDetail));
        foreach($getTourDetail as $getTourDetail) { ?>
        <?
          $tour_id = $getTourDetail->tour_id;
          $tour_name = $getTourDetail->tour_name;
          $applyBy = $getTourDetail->applyBy;
          $startCamp = $getTourDetail->startCamp;
          $endCamp = $getTourDetail->endCamp; 
          $tourDate = $getTourDetail->tourDate;
          $min_target = $getTourDetail->target;
          $venues = $getTourDetail->venues;
        ?> 
      <div class="d-tj-box " >
        <div class="row d-tj-tour">
          <div class="col-sm-12 col-xs-12 col-md-7 d-tj-video-edit">
            <div class="d-tj-video-edit-bdr">
              <div class="vd-link-selected">
              </div>
              <h2>
                <a  data-toggle="modal" id="vd-link" href="#videoModal" title="Video Link" alt="" target="_blank" 
                    class="social-list-facebook-edit open-video-link"><font color="grey">UPLOAD<br>VIDEO LINK</font></a>
              </h2>
            </div>
          </div>
          <div class="col-sm-12 col-md-5 d-tj-black-box-container" >
            <div class="d-tj-black-box d-tj-tour-right-edit" >
              <input class="form-control input-lg pull-left" type="text" id="target" name="target" placeholder="ENTER TARGET AMOUNT [MIN: Rs <? print($min_target); ?>]"></input>
              <input class="form-control input-lg pull-left" type="text" id="phone" name="phone" placeholder="ENTER PHONE NUMBER [10-DIGIT]"></input>
              <input class="form-control input-lg pull-left" type="text" id="email" name="email" placeholder="ENTER EMAIL ADDRESS"></input>
              <div class="clearfix"></div>
              <div class="background-images">
                UPLOAD BACKGROUND IMAGE
                <input type="file" id="userfile" name="userfile"></input>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div  class="d-tj-artist-container d-tj-offset-top-40">
      <div>
      <!--Artist-->
      <div class="col-md-7 d-tj-artist" >
        <h3 style="margin-top: 5px;">
          <input class="form-control input-lg" type="text" id="artistName" name="artistName" placeholder="ARTIST NAME">
        </h3>
        <? foreach($venues as $venue){ ?>
          <?
            $venue_name = $venue->venue_name;
            $venue_id = $venue->venue_id;
            $city = $venue->city;
            $image = $venue->image;
          ?>
        <div class="col-md-12 col-sm-12 col-xs-6 d-tj-venue-box">
          <div class="col-md-4 col-xs-12 col-sm-5 d-tj-p0"> 
            <a href="javascript:;" onclick="venueBox(<? print($venue_id); ?>);" data-toggle="modal" >
            <img src="/img/temp/<? print($image); ?>" alt="" style="max-height: 150px;"></a>
          </div>
          <div class="col-md-1"></div>
          <div class="col-md-7 col-xs-12 col-sm-6 d-tj-p0" >
            <h4 ><? print($venue_name); ?> <br>
              <? print($city); ?>
            </h4>
          </div>
        </div>
        <? 
          } 
        ?>
        <div class="clearfix"></div>
        <!--date-->
        <div class="d-tj-offset-top-30">
          <h4>TOUR DATE: <? print($tourDate); ?></h4>
        </div>
        <!--/date--> 
        <!-- social-->
        <div class="social-links" >
          <h4 >UPLOAD SOCIAL LINKS</h4>
          <ul class=" list-unstyled social-list ">
            <li ><a  data-toggle="modal" href="#" title="" alt="" id="socialLink1" name="socialLink1" target="_blank" class="social-list-facebook-edit openform1"></a></li>
            <li ><a  data-toggle="modal" href="#" title="" alt="" id="socialLink2" name="socialLink2" target="_blank" class="social-list-twitter-edit openform2"></a></li>
            <li ><a  data-toggle="modal" href="#" title="" alt="" id="socialLink3" name="socialLink3" target="_blank" class="social-list-blog-edit openform3"></a></li>
          </ul>
          <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        
        <!-- /social--> 
        <!--  Description text editor-->
        <div class="d-tj-offset-top-20 d-tj-description">
          <div class="hero-unit">
            <div id="alerts"></div>
            <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
              <div class="btn-group"> <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
                <ul class="dropdown-menu">
                </ul>
              </div>
              <div class="btn-group"> <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
                  <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
                  <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
                </ul>
              </div>
              <div class="btn-group btn-icon-bold"> <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a> <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a> <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a> <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a> </div>
              <div class="btn-group btn-icon-indent"> <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="icon-list-ul"></i></a> <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="icon-list-ol"></i></a> <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="icon-indent-left"></i></a> <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="icon-indent-right"></i></a> </div>
              <div class="btn-group btn-icon-align" style=""> <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a> <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a> <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a> <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a> </div>
              <div class="btn-group btn-hyper-link" > <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
                <div class="dropdown-menu input-append">
                  <input class="col-md-8 "  placeholder="URL" type="text" data-edit="createLink" style="width: 65%;height: 35px;margin-left: 5px;"/>
                  <button class="btn" type="button">Add</button>
                </div>
                <!-- <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a> --></div>
              <div class="btn-group btn-undo"> <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a> <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a> </div>
              <div class="btn-group btn-pic" > <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
                <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
              </div>
              
              <!-- <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">--> 
            </div>
            <div id="editor" name="campaignDesc">
            </div>
          </div>
        </div>
        <!--  /Description text editor--> 
      </div>
      <!--/Artist--> 
      <!-- Pledge-->
      <div class="col-md-5 ">
      <div class="row">
      <div class="d-tj-pledge">
        <div class="pledge">
          <h4>
            <input class="form-control input-lg pull-left" type="text" id="pledgeAmount1" name="pledgeAmount1" placeholder="PLEDGE AMT 1">
            <div class=" btn-delete-pledge pull-right"><a class="btn-delete-pledge-hover"></a></div>
            <div class="open-help-form pull-right"><a class="open-help-form-hover" class="social-list-facebook-edit open-help-form" data-toggle="modal" href="#helpModal" target="_blank" ></a></div>
          </h4> 
          <div class="clearfix"></div>
          <h5>
            <textarea class="form-control" id="desc1" name="desc1" placeholder="Please write description" rows="4"></textarea>
          </h5>
          <div class="seperator" ></div>
        </div>

        <div id="add-option" ></div>

        <div class="pledge">
          <h4>
            <input class="form-control input-lg pull-left" type="text" id="pledgeAmount2" name="pledgeAmount2" placeholder="PLEDGE AMT 2">
            <div class=" btn-delete-pledge pull-right"><a class="btn-delete-pledge-hover"></a></div>
            <div class="open-help-form pull-right"><a class="open-help-form-hover" class="social-list-facebook-edit open-help-form" data-toggle="modal" href="#helpModal" target="_blank" ></a></div>
          </h4>
          <div class="clearfix"></div>
          <h5>
            <textarea class="form-control" id="desc2" name="desc2" placeholder="Please write description" rows="4" ></textarea>
          </h5>
          <div class="seperator" ></div>
        </div>

        <div id="add-option" ></div>

        <div class="pledge">
          <h4>
            <input class="form-control input-lg pull-left" type="text" id="pledgeAmount3" name="pledgeAmount3" placeholder="PLEDGE AMT 3">
            <div class=" btn-delete-pledge pull-right"><a class="btn-delete-pledge-hover"></a></div>
            <div class="open-help-form pull-right"><a class="open-help-form-hover" class="social-list-facebook-edit open-help-form" data-toggle="modal" href="#helpModal" target="_blank" ></a></div>
          </h4>
          <div class="clearfix"></div>
          <h5>
            <textarea class="form-control" id="desc3" name="desc3" placeholder="Please write description" rows="4" ></textarea>
          </h5>
          <div class="seperator" ></div>
        </div>
        <div id="add-option" ></div>

        <div id="add-option-new" ></div>
        <div class="add-option-new pull-left"><a class="add-option-new-hover"></a></div>

        <div class="clearfix"></div>
      </div>
      <div class=" d-tj-offset-top-30 pledge-btn" >
      <input type="hidden" id="tour_id"     name="tour_id"    value="<? print($tour_id); ?>" /> 
      <input type="hidden" id="maxIndex"    name="maxIndex"   value="" />
      <input type="hidden" id="min_target"  name="min_target" value="<? print($min_target); ?>" />
      <input type="hidden" id="v-link"      name="v-link"     value="" />
      <input type="hidden" id="sociallink-1" name="sociallink-1" value="" />
      <input type="hidden" id="sociallink-2" name="sociallink-2" value="" />
      <input type="hidden" id="sociallink-3" name="sociallink-3" value="" />
      <input type="hidden" id="editorContent" name="editorContent" value="" />
      <input type="hidden" id="backimg" name="backimg" value="" />
      <input type="submit" value="SUBMIT" >
      <? 
        } 
      ?>
    </form>
  </div>
</div>
</div>
<!--  /Pledge-->

</div>
<div class="clearfix"></div>
</div>
</div>

<!-- Footer  -->      
<?
  include("include/footer.php");
?>
<!-- /Footer  -->

</div>

<img src="" id="supersized">
<!--
style="-webkit-backface-visibility: hidden; -webkit-transform: translateZ(-999);"
was a hack to prevent position fixed of background to be made redundant by the iframe of youtube. This seems to be a webkit bug.

We have removed it now because keeping it causes issues with fancybox not showing up on chrome. So in essence
campaignedit_view -> no hack
campaign_view -> hack
-->

<script src="/script/jquery.min.js"></script>
<script src="/script/external/jquery.hotkeys.js"></script>  
<script src="/script/bootstrap.min.js"></script>
<script src="/script/external/google-code-prettify/prettify.js"></script> 
<script src="/script/bootstrap-wysiwyg.js"></script> 
<!--<script type="text/javascript" src="/script/jquery.supersized.min.js"></script> 
<script type="text/javascript" src="/script/jquery.supersized.shutter.min.js"></script> -->
<script type="text/javascript" src="/script/jquery.easing.min.js"></script> 
<script type="text/javascript" src="/script/jquery.fancybox.js"></script> 
<script src="/script/tj1.js"></script> 
<script type="text/javascript" src="/script/jquery.qtip.min.js"></script>
<script type="text/javascript" src="/script/ajaxfileupload.js"></script>
<script>

  var maxIndex = 3;

  $(document).ready(function(){
    
    console.log(maxIndex);
    $('#maxIndex').val(maxIndex);

    $(".add-option-new").click(function(){

      maxIndex++;

      var a = 'pledgeAmount' + maxIndex;
      var b = 'PLEDGE AMT ' + maxIndex;
      var desc = 'desc' + maxIndex;

      var addoption = '<div class="pledge"><h4><input class="form-control input-lg pull-left" type="text" id="'+ a +'" name="'+ a +'" placeholder="'+ b +'"><div class=" btn-delete-pledge pull-right"><a class="btn-delete-pledge-hover"></a></div><div class="open-help-form pull-right"><a class="open-help-form-hover" class="social-list-facebook-edit open-help-form" data-toggle="modal" href="#helpModal" target="_blank" ></a></div></h4><div class="clearfix"></div>';
      addoption +='<h5> <textarea class="form-control" id="'+ desc +'" name="'+ desc +'" placeholder="Please write description" rows="4" ></textarea></h5>';
      addoption +=' <div class="seperator" ></div></div></div>';

      $('#maxIndex').val(maxIndex);

      $("#add-option-new").append($(addoption).fadeIn('slow'));
    });

    $('body').on('click', '.btn-delete-pledge', function(){
      var $this = $(this);
      //$this.closest('.pledge').fadeOut("slow");
      $this.closest('.pledge').remove();
    });

    $("a.openform1").click(function () {
        $.fancybox(
                $('.form1').html(),
                {
                    'width'             : 950,
                    'height'            : 1100,
                    'autoScale'         : false,
                    'transitionIn'      : 'none',
                    'transitionOut'     : 'none',
                    'hideOnContentClick': false,
                    'keys'              : {
                                            close : [13, 27]  //enter, escape key
                                          },
                    'beforeClose': function(){ 
                        var x = $('.fancybox-inner').contents().find('#SocialLink1').val();
                        insertLinks(x, 'sociallink1');
                    }
                 }
            ); 
    });  

    $("a.openform2").click(function () {
        $.fancybox(
                 $('.form2').html(),
                 { 
                    'width'             : 950,
                    'height'            : 1100,
                    'autoScale'         : false,
                    'transitionIn'      : 'none',
                    'transitionOut'     : 'none',
                    'hideOnContentClick': false,
                    'keys'              : {
                                            close : [13, 27]  //enter, escape key
                                          },
                    'beforeClose': function(){ 
                        var x = $('.fancybox-inner').contents().find('#SocialLink2').val();
                        insertLinks(x, 'sociallink2');
                    }
                 }
            );
    });        

    $("a.openform3").click(function () {
        $.fancybox(     
                 $('.form3').html(),
                 { 
                    'width'             : 950,
                    'height'            : 1100,
                    'autoScale'         : false,
                    'transitionIn'      : 'none',
                    'transitionOut'     : 'none',
                    'hideOnContentClick': false,
                    'keys'              : {
                                            close : [13, 27]  //enter, escape key
                                          },
                    'beforeClose': function(){ 
                        var x = $('.fancybox-inner').contents().find('#SocialLink3').val();
                        insertLinks(x, 'sociallink3');
                    }
                 }
            );
    });

    $("a.open-video-link").click(function () {
        $.fancybox(
                $('.video-link').html(),
                {
                    'width'             : 950,
                    'height'            : 1100,
                    'autoScale'         : false,
                    'transitionIn'      : 'none',
                    'transitionOut'     : 'none',
                    'hideOnContentClick': false,
                    'keys'              : {
                                            close : [13, 27]  //enter, escape key
                                          },
                    'beforeClose'       : function(){ 
                                            var x = $('.fancybox-inner').contents().find('#videolink').val();
                                            insertLinks(x, 'video');

                                            $('#vd-link').html("<p><font color='grey'>CHANGE<br>VIDEO LINK</font></p>");
                                            $('.vd-link-selected').html("Link: " + x);
                                          }
                 }
            );
    });

    $('body').on('click', '.open-help-form', function(){
        $.fancybox(
                $('.help-form').html(),
                {
                    'width'             : 950,
                    'height'            : 1100,
                    'autoScale'         : false,
                    'transitionIn'      : 'none',
                    'transitionOut'     : 'none',
                    'hideOnContentClick': false,
                 }
            );  
    });

    $('body').on('change','#userfile', function() {
      //get the file path
      var file = $("#userfile").val();

      console.log(file);

      $.ajaxFileUpload({
          url            : '/CFtour/validateFile/',
          secureuri      : false,
          fileElementId  : 'userfile',
          dataType       : 'json',
          success        : function (data, status)
                           {
                              console.log(data.filename);
                              $('#backimg').val(data.filename);
                              $('#supersized').attr('src','/images/artist/campaign/' + data.filename);
                           }
          
        });
    });

    $('#editcampaign').bind('submit',function(e) 
    {
      e.preventDefault();

      var editorContent = $('#editor').html();
      $('#editorContent').val(editorContent);

      submitCampaignForm();

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

  function usePledgeVal(type)
  {
    if(type == "PledgeVal1")
    {
        maxIndex++;
        console.log(maxIndex);

        //var pledgeamnt = $("#pledgeAmnt1").val();
        //var benefit = $("#benefit1").val();

        var pledgeamnt = $("#pledgeAmnt1").text();
        var benefit = $("#benefit1").text();
        var a = 'pledgeAmount' + maxIndex;
        var desc = 'desc' + maxIndex;

        var addoption = '<div class="pledge"><h4><input class="form-control input-lg pull-left" type="text" id="'+ a +'" name="'+ a +'" value="'+ pledgeamnt +'" placeholder=""><div class=" btn-delete-pledge pull-right"><a class="btn-delete-pledge-hover"></a></div><div class="open-help-form pull-right"><a class="open-help-form-hover" class="social-list-facebook-edit open-help-form" data-toggle="modal" href="#helpModal" target="_blank" ></a></div></h4><div class="clearfix"></div>';
        addoption +='<h5> <textarea class="form-control" id="'+ desc +'" name="'+ desc +'" placeholder="" rows="4" >'+ benefit +'</textarea></h5>';
        addoption +=' <div class="seperator" ></div></div></div>';

        /*var pledgevalue = $(this).parent().first(".form-control").attr("id");
        console.log(pledgevalue);

        var  str = pledgevalue.replace ( /[^\d.]/g, '' );
        var index = parseInt(str);
        console.log(pledgeid);

        var a = 'pledgeAmount' + index;
        console.log(a);*/

        $("#add-option").append($(addoption).fadeIn('slow'));
        $.fancybox.close();
    }
    else if(type == "PledgeVal2")
    {
        maxIndex++;
        console.log(maxIndex);

        var pledgeamnt = $("#pledgeAmnt2").text();
        var benefit = $("#benefit2").text();
        var a = 'pledgeAmount' + maxIndex;
        var desc = 'desc' + maxIndex;

        var addoption = '<div class="pledge"><h4><input class="form-control input-lg pull-left" type="text" id="'+ a +'" name="'+ a +'" value="'+ pledgeamnt +'" placeholder=""><div class=" btn-delete-pledge pull-right"><a class="btn-delete-pledge-hover"></a></div><div class="open-help-form pull-right"><a class="open-help-form-hover" class="social-list-facebook-edit open-help-form" data-toggle="modal" href="#helpModal" target="_blank" ></a></div></h4><div class="clearfix"></div>';
        addoption +='<h5> <textarea class="form-control" id="'+ desc +'" name="'+ desc +'" placeholder="" rows="4" >'+ benefit +'</textarea></h5>';
        addoption +=' <div class="seperator" ></div></div></div>';

        $("#add-option").append($(addoption).fadeIn('slow'));
        $.fancybox.close();
    }
    else if(type == "PledgeVal3")
    {
        maxIndex++;
        console.log(maxIndex);

        var pledgeamnt = $("#pledgeAmnt3").text();
        var benefit = $("#benefit3").text();
        var a = 'pledgeAmount' + maxIndex;
        var desc = 'desc' + maxIndex;

        var addoption = '<div class="pledge"><h4><input class="form-control input-lg pull-left" type="text" id="'+ a +'" name="'+ a +'" value="'+ pledgeamnt +'" placeholder=""><div class=" btn-delete-pledge pull-right"><a class="btn-delete-pledge-hover"></a></div><div class="open-help-form pull-right"><a class="open-help-form-hover" class="social-list-facebook-edit open-help-form" data-toggle="modal" href="#helpModal" target="_blank" ></a></div></h4><div class="clearfix"></div>';
        addoption +='<h5> <textarea class="form-control" id="'+ desc +'" name="'+ desc +'" placeholder="" rows="4" >'+ benefit +'</textarea></h5>';
        addoption +=' <div class="seperator" ></div></div></div>';

        $("#add-option").append($(addoption).fadeIn('slow'));
        $.fancybox.close();
    }
    $('#maxIndex').val(maxIndex);
  }

  function handleKeyPress(e)
    {
      if(e.keyCode == 13)
        $.fancybox.close();
    }

  function submitCampaignForm()
  {
      //blockForm('editcampaign','block');
      $.post('/CFtour/validateDetails',$('#editcampaign').serialize(),submitCampaignFormResponse,'json');
  }

  function submitCampaignFormResponse(response)
  {
      //blockForm('editcampaign','unblock');
      //$('#videolink, #target, #artistName, #SocialLink1, #pledgeAmount1, #desc1, #editcampaign-send').qtip('destroy');
      $('#artistName, #target, #vd-link, #socialLink1, #pledgeAmount1, #userfile, #phone, #email').qtip('destroy');

    /*  var tPosition =
      {
          'editcampaign-send'   : {'my':'right center','at':'left center'},
          'videolink'           : {'my':'bottom center','at':'top center'},
          'SocialLink1'         : {'my':'bottom center','at':'top center'},
          'target'              : {'my':'bottom center','at':'top center'},
          'artistName'          : {'my':'top center','at':'bottom center'},
          'pledgeAmount1'       : {'my':'top center','at':'bottom center'},
          'desc1'               : {'my':'top center','at':'bottom center'}
      };*/

      var tPosition =
      {
        'target'              : {'my':'bottom center','at':'top center'},
        'artistName'          : {'my':'top center','at':'bottom center'},
        'vd-link'             : {'my':'top center','at':'bottom center'},
        'socialLink1'         : {'my':'top center','at':'bottom center'},
        'pledgeAmount1'       : {'my':'top center','at':'bottom center'},
        'userfile'             : {'my':'bottom center','at':'top center'},
        'phone'               : {'my':'bottom center','at':'top center'},
        'email'               : {'my':'bottom center','at':'top center'}
      };

      if(response.error==1 && typeof(response.info)!='undefined')
      { 
          if(response.info.length)
          { 
              var qtipExists = false;
              var offset = $('.d-tj-footer').offset();
              for(var key in response.info)
              {
                  var id=response.info[key].fieldId;
                  
                  if($('#'+id).offset().top < offset.top)
                    offset = $('#'+id).offset();

                  qtipExists = true;

                  $('#'+response.info[key].fieldId).qtip(
                  {
                          style:      { classes:(response.error==1 ? 'ui-tooltip-error' : 'ui-tooltip-success')},
                          content:  { text:response.info[key].message },
                          position:   { my:tPosition[id]['my'],at:tPosition[id]['at'] }
                  }).qtip('show');
              }

              if(qtipExists)
              {
                offset.top -= 100;
                $('html, body').animate({
                  scrollTop: offset.top
                });
              }
          }
      }
      else if(response.error == 0)
      {
        console.log(response.id);
        window.location = "/campaign/" + response.id;
      }
  }

  function insertLinks(link, linkType){

    if(linkType == 'video')
    {
      $('input[name=v-link]').val(link);
    }
    if(linkType == 'sociallink1')
    {
      $('input[name=sociallink-1]').val(link);
    }
    if(linkType == 'sociallink2')
    {
      $('input[name=sociallink-2]').val(link);
    }
    if(linkType == 'sociallink3')
    {
      $('input[name=sociallink-3]').val(link);
    }
  }

</script>
</body>
</html>