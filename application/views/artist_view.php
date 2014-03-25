<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>TommyJams</title>
    <link href="<?php echo base_url();?>style/profile.css" rel="stylesheet" type="text/css" />    
	<link href="<?php echo base_url();?>style/style.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/styler.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>style/supersized/supersized.css" rel="stylesheet" type="text/css" />    
	<link href="<?php echo base_url();?>style/style_footer.css" rel="stylesheet" type="text/css" />
	<link href="http://fonts.googleapis.com/css?family=Voces" rel="stylesheet" type="text/css" />		
	<link href="http://fonts.googleapis.com/css?family=Dosis:300,400" rel="stylesheet" type="text/css" />    
	<!--
    <style type="text/css">
        #pscroller2{
            width: 800px;
            height: 15px;
        }
        #pscroller2 a{
            text-decoration: none;
        }
        .someclass{ //class to apply to your scroller(s) if desired
        }
    </style>    -->
	
    <script type="text/javascript" src="<?php echo base_url();?>script/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/motionpack.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/jquery.supersized.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/main.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/h5f.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/functions.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>script/csspopup.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>script/ajaxfileupload.js"></script>
	<!--contains document ready function-->
    <script language="javascript">
	
    function bindnpopup()
    {
        popup('profil');

        $('#profilePicForm').bind('submit',function(e) {
            e.preventDefault();
            uploadProfilePic('upload');
            popup('profil');
        });

        $('#facebookPicForm').bind('submit',function(e) {
            e.preventDefault();
            uploadProfilePic('facebook');
            popup('profil');
        });
    }

    function bindnpopupgigspic()
    {
        popup('profil');

        $('#gigsPicForm').bind('submit',function(e) {
            e.preventDefault();
            var link = document.getElementById('gigLink').value;
            uploadGigPic(link);
            popup('profil');
        });
    }

    function confirmDibsSubmit(link)
    {
        var agree=confirm("Are you sure you wish to call dibs for this gig? The host will receive the dibs and choose an artist. Please note, these dibs are not cancellable.");
        if (agree)
            dibAction(link);
        else
            return false ;
    }

    function showEditFrame(d)
    { 
      document.getElementById('frameprofessional').style.display="none";
      document.getElementById('frameabout').style.display="none";
      document.getElementById('framecontact').style.display="none";
      document.getElementById('framesocial').style.display="none";  
      document.getElementById(d).style.display="block"; 
    }

    function gigProfileCallback(a) 
    {
      $("#loading-indicator").hide();
    }
    function gigProfile(user_id) 
    {
      $("#loading-indicator").show();
      $("#lefty").load('artist/gigProfilePage', {id: user_id} , gigProfileCallback);
    }

    function artistDibsCallback(a)
    {
		$("#lefty").load("include/dib.php", {json: JSON.stringify(a)});
    }
    function artistDibs()
    {
    	$("#loading-indicator").show();
      	$.post('artist/mydibs','',artistDibsCallback,'json');
    }

  /*  function artistProfileCallback(a)
    {
      	$("#lefty").load("include/profile.php", {json: JSON.stringify(a)});
    }
    function artistProfile()
    {
      	$("#loading-indicator").show();
      	$.post('artist/profilepage','',artistProfileCallback,'json');
    }*/

    function showProfileCallback(a)
    {
        $("#loading-indicator").hide();
    }
	function showProfile(user_id)
    {
    	$("#loading-indicator").show();
        $("#lefty").load("artist/profilepage", {id: user_id}, showProfileCallback);
    }

    function showEditProfileCallback(a)
    {
		$('#professionalForm').bind('submit',function(e) 
        {
            e.preventDefault();

            var obj = {
                    designation:    document.getElementById('full-name').value,
                    organization:   document.getElementById('username').value,
                    genre:          document.getElementById('genrename').value
                };

            editProfile("professionalForm",obj);
        });


        $('#socialForm').bind('submit',function(e) 
        {
            e.preventDefault();

            var obj = {
                    fb:             document.getElementById('fb').value,
                    twitter:        document.getElementById('twitter').value,
                    reverbnation:   document.getElementById('reverbnation').value,
                    youtube:        document.getElementById('youtube').value,
                    myspace:        document.getElementById('myspace').value,
                    gplus:          document.getElementById('gplus').value
                };

            editProfile("socialForm",obj);
        });

        $('#contactForm').bind('submit',function(e) 
        {
            e.preventDefault();

            var obj = {
                    phone:      document.getElementById('phone').value,
                    email:      document.getElementById('email').value,
                    add:        document.getElementById('add').value,
                    city:       document.getElementById('city').value,
                    state:      document.getElementById('state').value,
                    country:    document.getElementById('country').value,
                    pincode:    document.getElementById('pincode').value
                };

            editProfile("contactForm",obj);
        });

        $('#aboutForm').bind('submit',function(e) 
        {
            e.preventDefault();

            var obj = {
                    about:    document.getElementById('about').value
                };

            editProfile("aboutForm",obj);
        });

        $("#loading-indicator").hide();
    }
    function showEditProfile()
    {
    	$("#loading-indicator").show();
        $("#lefty").load('artist/editProfilePage','',showEditProfileCallback);
    }

    function editProfileCallback(a)
    {
		if(a.error != '1')
    	{
    		alert('Your changes have been submitted successfully.');
    	}
    	else
    	{
    		alert('Sorry! There was some error while processing your request. Please try again.');
    	}
    	showEditProfile();
    }
    function editProfile(type,obj)
    {
    	$("#loading-indicator").show();
    	if(type == "professionalForm")
			$.post('artist/editProfile',{'type': type, 'designation': obj.designation, 'organization': obj.organization, 'genre': obj.genre},editProfileCallback,'json');
		else if(type == "socialForm")
			$.post('artist/editProfile',{'type': type, 'fb': obj.fb, 'twitter': obj.twitter, 'rever': obj.reverbnation, 'youtube': obj.youtube, 'myspace': obj.myspace, 'gplus': obj.gplus},editProfileCallback,'json');
		else if(type == "contactForm")
			$.post('artist/editProfile',{'type': type, 'phone': obj.phone, 'email': obj.email, 'add': obj.add, 'city': obj.city, 'state': obj.state, 'country': obj.country, 'pincode': obj.pincode},editProfileCallback,'json');
		else if(type == "aboutForm")
			$.post('artist/editProfile',{'type': type, 'about': obj.about},editProfileCallback,'json');
    }

    function findGigsPageCallback(a)
    {
    	$("#lefty").load("include/artist_gigs.php", {json: JSON.stringify(a)});	
    }
	function findGigsPage(searchString,page,city,date,category,budget_min)
    {
    	$("#loading-indicator").show();
		$.post('artist/findGigs',{'searchString': searchString,'nPage': page,'sCity': city,'sDate': date,'sCat': category,'sBudget': budget_min},findGigsPageCallback,'json');
    }

    function searchProfilesPageCallback(a)
    {
        $('#profileSearchForm').bind('submit',function(e) 
        {
            e.preventDefault();

            searchProfilesPage(document.getElementById('search').value,1);
        });
        $("#loading-indicator").hide();
    }
    function searchProfilesPage(searchString,page)
    {
        $("#loading-indicator").show();
        $("#lefty").load('artist/searchProfiles',{'searchString': searchString,'nPage': page},searchProfilesPageCallback);
    }

    function dibActionCallback(a)
    {
    	if(a.status != '0')
    	{
    		alert('Congratulations! You have successfully applied for the gig. Please monitor your status from the dibs status section.');
    		findGigsPage();
    	}
    	else
    	{
    		alert('Sorry! There was some error while processing your request. Please try again.');
    	}    	
    }
    function dibAction(link)
    {
    	$("#loading-indicator").show();
		$.post('artist/dibAction',{'gigLink': link},dibActionCallback,'json');
    }

    function uploadProfilePicCallback(a)
    {
        console.log("Data: ", JSON.stringify(a));
        showProfile();
    }
    function uploadProfilePic(type)
    {
      console.log('type: ',type);

      if(type == 'facebook')
      {
        $.post('/artist/setProfilePicture',{'type': type},uploadProfilePicCallback,'json');      
      }
      else
      {
        $.ajaxFileUpload({
          url            : '/artist/setProfilePicture/',
          secureuri      : false,
          fileElementId  : 'userfile',
          dataType       : 'json',
          data           : {'type': type},
          success        : function (data, status)
                           {
                              console.log(data.msg);
                              showProfile();
                           }
        });
      }
    }

    function showGigFeedbackCallback(a)
    {
        /*$('#ratingForm').bind('submit',function(e) 
        {
          e.preventDefault();

          var gigRateElem = document.getElementById("gigRating");
          var rateElem  = document.getElementById("rateElem");

          var obj = {
            gigLink:    document.getElementById('gigLink').value;,
            gigRate:    gigRateElem.options[gigRateElem.selectedIndex].value,
            gigComment: document.getElementById('gigComment').value,
            rate:     rateElem.options[rateElem.selectedIndex].value,
            comment:    document.getElementById('comment').value,
            future:     document.getElementById('future').checked
          };

          enterGigFeedback(obj);
        });*/

        $("#lefty").load("/include/feed.php", {json: JSON.stringify(a)});
    }
    function showGigFeedback(link)
    {
        $("#loading-indicator").show();
        $.post('/artist/showGigFeedback',{'gigLink': link},showGigFeedbackCallback,'json');      
    }

    function enterGigFeedbackCallback(a)
    {
        console.log("Data: ", JSON.stringify(a));
        $("#loading-indicator").hide();
        if(!a.error)
            alert('Thank you for taking the time out to rate the host');
        else
            alert('Sorry, there has been some error!');
    }
    function enterGigFeedback(obj)
    {
        $("#loading-indicator").show();   
        console.log('gigLink',obj.gigLink,'arate',obj.rate,'acomment',obj.comment,'gig',obj.gigRate,'gigc',obj.gigComment,'future',obj.future);
        $.post('/artist/enterGigFeedback',{'gigLink': obj.gigLink, 'arate': obj.rate, 'acomment': obj.comment, 'gig': obj.gigRate, 'gigc': obj.gigComment, 'future': obj.future},enterGigFeedbackCallback,'json');
    }

    </script>

	<script type="text/javascript">
          var _gaq = _gaq || [];
		  var pluginUrl = '//www.google-analytics.com/plugins/ga/inpage_linkid.js'; 
		  _gaq.push(['_require', 'inpage_linkid', pluginUrl]);
          _gaq.push(['_setAccount', 'UA-34924795-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();
    </script>
</head>
<body>

	<?	include("include/leftCommon.php");	?>

	<div id="main-container">
		<div id="lefty" style="display:block;">
		</div>
		<div id="lefty1" style="display:none;  overflow-y:hidden;">
			<iframe name="leftframe" id="leftframe1" width="100%" height="100%" frameborder="0"></iframe>
		</div>
		<script>
			<? 
            /*
            if(isset($_GET["gigs"]) && $_GET["gigs"]=="search")
			{ 
				if(isset($_GET["page"])){$_SESSION["page"]=$_GET["page"];}
				else{
				$_SESSION["page"]=1;
				if(isset($_POST["search"])){$_SESSION["searchGigs"]=$_POST["search"];}
				if(isset($_POST["city"])){$_SESSION["scity"]=$_POST["city"];}else{$_SESSION["scity"]="all";}
				if(isset($_POST["date"])){$_SESSION["sdate"]=$_POST["date"];}else{$_SESSION["sdate"]="all";}
				if(isset($_POST["cat"])){$_SESSION["scat"]=$_POST["cat"];}else{$_SESSION["scat"]="all";}
				if(isset($_POST["budget_min"])){$_SESSION["sbudget"]=$_POST["budget_min"];}else{$_SESSION["sbudget"]="all";}
				}
				print("$('#lefty').load('include/artist_gigs.php');");
			}
			elseif(isset($_GET["profile"]) && $_GET["profile"]=="search")
			{ 
				if(isset($_GET["pages"])){$_SESSION["pages"]=$_GET["pages"];}
				else{$_SESSION["pages"]=1;}
				if(isset($_POST["profile"])){$_SESSION["profile"]=$_POST["profile"];}
				print("
				$('#lefty').load('include/profile_search.php?page=$_SESSION[pages]');"                                );
			}
			else if(isset($_GET["feed"])){ print("$('#lefty').load('include/feed.php?feed=$_GET[feed]');");}
			else if(isset($_GET["thank"])){ print("$('#lefty').load('include/thank.php?rate=1');");}
			else {
				if(!isset($_GET["id"]) && !isset($_GET["gig"])){ 
					//print("$('#lefty').load('include/profile.php');");
					print("$.post('artist/profilepage','',showProfileCallback,'json');");
				}
				else if(isset($_GET["id"])){ print("$('#lefty').load('include/profile.php?id=$_GET[id]');");}
				else if(isset($_GET["gig"])){ print("$('#lefty').load('include/gigs.php?gig=$_GET[gig]');");}
			}*/
                if(isset($gig_id))
                    print("showGigFeedback($gig_id);");
                else
                    print("showProfile();");
			?>
		</script>
		<!--
			<div id="righty">
				<div class="scroll" style=" background:url('images/scrollup.png') no-repeat; background-position:center;">
					<a href="javascript:;" onClick="scroll('down');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>                            </div>
				<div id="rightyframe" >
				</div>
				<div class="scroll" style=" background:url('images/scrolldown.png') no-repeat; background-position:center;"><a href="javascript:;" onClick="scroll('up');">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>                        </div>
			</div>
		-->

		<!-- start menu -->
		<div id="menuFooter" style="background:#000;">
			<ul>
			  <li>
				<a  href="javascript:;" onClick="findGigsPage()"><h3><? echo lang('btn_find_gigs');?></h3></a>
			  </li>
			  <li>
				<a  href="javascript:;" onClick="artistDibs()"><h3><? echo lang('btn_dibs_status');?></h3></a>
			  </li>
			  <li>
				<a href="javascript:;" onClick="showProfile()"><h3><? echo lang('btn_artist_my_profile');?></h3></a>
			  </li>
			  <li>
				<a href="javascript:;" onClick="showEditProfile();"><h3><? echo lang('btn_artist_edit_profile');?></h3></a>
			  </li>
			</ul>
		</div>
		<!-- end menu --> 

	</div> <!--main-container-->
	
    <?	include("include/rightCommon.php");	?>

</body>
</html>
<?
ob_end_flush();
?>