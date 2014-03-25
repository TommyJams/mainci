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
    <script src="<?php echo base_url();?>script/motionpack.js"></script>

    <!--
    <script type="text/javascript" src="http://i3indya.com/js/jquery.aviaSlider.js"></script>
    <script type="text/javascript" src="http://i3indya.com/js/aviaInit.js"></script>
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
    </style>
    -->

    <script type="text/javascript" src="<?php echo base_url();?>script/jquery.min.js" ></script>
    <script type="text/javascript" src="<?php echo base_url();?>script/jquery.supersized.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>script/main.js"></script> <!--contains document ready function-->
	  <script type="text/javascript" src="<?php echo base_url();?>script/h5f.js"></script>
	  <script type="text/javascript" src="<?php echo base_url();?>script/functions.js"></script>
	  <script type="text/javascript" src="<?php echo base_url();?>script/csspopup.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>script/ajaxfileupload.js"></script>
    <script language="javascript"> 

    function loadblog(a) 
    {
       /*document.getElementById('lefty').style.display="none";
       document.getElementById('lefty1').style.display="block";  
	     link = 'include/blog/wp-login.php';
	     parent.leftframe.location.href=link; */
    }

    function loadslide(a)
    {
        toggleSlide(a);
        showDib(a);
    }

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

    function confirmSubmit()
    {
        var agree=confirm("Are you sure you wish to accept this Artist's Dib? The gig will be booked and all other artists will automatically get rejected for this gig.");
        if (agree)
            return true ;
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

    function promoterGigsCallback(a)
    {
      $("#loading-indicator").hide();
    }
    function promoterGigs()
    {
      $("#loading-indicator").show();
      $("#lefty").load("promoter/mygigs", {}, promoterGigsCallback);
    }

  /*  function promoterProfileCallback(a)
    {
      console.log("Profile Data: ", JSON.stringify(a));
      $("#lefty").load("include/profile.php", {json: JSON.stringify(a)});
    }
    function promoterProfile()
    {
      $("#loading-indicator").show();
      $.post('promoter/profilepage','',promoterProfileCallback,'json');
    }    */

	  function showProfileCallback(a)
    {
      $("#loading-indicator").hide();
    }
    function showProfile(user_id)
    {
      $("#loading-indicator").show();
      $("#lefty").load("promoter/profilepage", {id: user_id}, showProfileCallback);
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
        $("#lefty").load('promoter/searchProfiles',{'searchString': searchString,'nPage': page},searchProfilesPageCallback);
    }

    function gigProfileCallback(a) 
    {
      $("#loading-indicator").hide();
    }
    function gigProfile(user_id) 
    {
      $("#loading-indicator").show();
      $("#lefty").load('promoter/gigProfilePage', {id: user_id} , gigProfileCallback);
    }

    function launchGigCallback(a) 
    {
		  alert('Gig Launched, Please visit the My Gigs section to see updates on the gig. You can also change the gig logo by clicking on the gig profile picture.');
      gigProfile(a.ida);
    }
    function launchGig() 
    {
      $("#loading-indicator").show();      
      $.post('promoter/launchGigFunc',$('#signUpForm').serialize(),launchGigCallback,'json');
    }
    
    function showLaunchGigCallback()
    {
      $('#signUpForm').bind('submit',function(e) 
      {
        e.preventDefault();
        launchGig();
      });

      $("#loading-indicator").hide();
    }
    function showLaunchGig() 
    {
      $("#loading-indicator").show();      
      $('#lefty').load("promoter/showLaunchGig", {}, showLaunchGigCallback);
    }

    function showDibCallback(a) 
    {
      $("#loading-indicator").hide();
    }
    function showDib(linker) 
    {
      $("#loading-indicator").show();
      $('#' + linker).load("promoter/showDibs", {link: linker}, showDibCallback);
    }

    function showDibReactionCallback(a)
    {
      if(a.error == '0')
      {
        if(a.accept == '1')
        {
          alert('Gig has been booked. Please contact artist against the mentioned contact number.');
          console.log("Linker Value: ", a.linker);
          promoterGigs();
        }
        else if(a.accept == '0')
        {
          alert('Artist has been rejected for this gig.');
          console.log("Linker Value: ", a.linker);
          showDib(a.linker);
        }
      }
      else if(a.error == '1')
      {
        alert('Sorry! There was some error while processing your request. Please try again.');
        promoterGigs();
      }
    }
    function showDibReaction(linker, artist_id, accepted)
    {
      $("#loading-indicator").show();

      if(accepted == '1')
      {
        alert("Are you sure you wish to accept this Artist's Dib? The gig will be booked and all other artists will automatically get rejected for this gig.");
        $.post('promoter/reactionDib',{'link': linker, 'artist_id': artist_id, 'accepted': accepted}, showDibReactionCallback,'json');          
      }
      else if(accepted == '0')
      {
        alert("Are you sure you wish to reject this Artist's Dib?");
        $.post('promoter/reactionDib',{'link': linker, 'artist_id': artist_id, 'accepted': accepted}, showDibReactionCallback,'json');
      }
    }

    function recommendArtistCallback(a)
    {
      console.log("Alert Message: ", JSON.stringify(a));
      $("#loading-indicator").hide();
      alert(a);
    }
    function recommendArtist(id)
    {
      $("#loading-indicator").show();
      console.log("Link Value: ", JSON.stringify(id));
      $.post('promoter/recommendArtist',{link: id},recommendArtistCallback,'json');
    }

    function showUpdateGigCallback(a) 
    {
      $('#UpdateGigForm').bind('submit',function(e) 
      {
          e.preventDefault();

          var obj = {
                  gig:      document.getElementById('gig').value,
                  web:      document.getElementById('website').value,
                  fb:       document.getElementById('fb').value,
                  twitter:    document.getElementById('twitter').value,
                  add:      document.getElementById('add').value,
                  desc:     document.getElementById('about').value,
                  gigLink:       document.getElementById('gigLink').value
              };

          updateGigProfile(obj);
      });
      $("#loading-indicator").hide();
    }
    function showUpdateGig(link) 
    {
      $("#loading-indicator").show();      
      $("#lefty").load("promoter/updateGigPage", {link: link}, showUpdateGigCallback);
    }

    function updateGigProfileCallback(a)
    {
    if(a.error != '1')
      {
        alert('Gig Updated, Your changes have been submitted successfully.');
      }
      else
      {
        alert('Sorry! There was some error while processing your request. Please try again.');
      }
      gigProfile(a.id);
    }
    function updateGigProfile(obj)
    {
      $("#loading-indicator").show();
      $.post('promoter/updateGigProfile',
        {'gig': obj.gig, 'web': obj.web, 'fb': obj.fb, 'twitter': obj.twitter, 'add': obj.add, 'desc': obj.desc, 'gigLink': obj.gigLink},
        updateGigProfileCallback,'json');
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
      $("#lefty").load('promoter/editProfilePage','',showEditProfileCallback);
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
      $.post('promoter/editProfile',{'type': type, 'designation': obj.designation, 'organization': obj.organization, 'genre': obj.genre},editProfileCallback,'json');
    else if(type == "socialForm")
      $.post('promoter/editProfile',{'type': type, 'fb': obj.fb, 'twitter': obj.twitter, 'rever': obj.reverbnation, 'youtube': obj.youtube, 'myspace': obj.myspace, 'gplus': obj.gplus},editProfileCallback,'json');
    else if(type == "contactForm")
      $.post('promoter/editProfile',{'type': type, 'phone': obj.phone, 'email': obj.email, 'add': obj.add, 'city': obj.city, 'state': obj.state, 'country': obj.country, 'pincode': obj.pincode},editProfileCallback,'json');
    else if(type == "aboutForm")
      $.post('promoter/editProfile',{'type': type, 'about': obj.about},editProfileCallback,'json');
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
        $.post('/promoter/setProfilePicture',{'type': type},uploadProfilePicCallback,'json');      
      }
      else
      {
        $.ajaxFileUpload({
          url            : '/promoter/setProfilePicture/',
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

    function uploadGigPic(link)
    {
      console.log('link: ',link);

      $.ajaxFileUpload({
        url            : '/promoter/setGigPicture/',
        secureuri      : false,
        fileElementId  : 'userfile',
        dataType       : 'json',
        data           : {'link': link},
        success        : function (data, status)
                         {
                            console.log(data.msg);
                            gigProfile(link);
                         }
      });
    }

    function showGigFeedbackCallback(a)
    {
        $('#ratingForm').bind('submit',function(e) 
        {
          e.preventDefault();

          var gigRateElem = document.getElementById("gigRating");
          var rateElem  = document.getElementById("rateElem");

          var obj = {
            gigLink:    document.getElementById('gigFeedbackLink').value;,
            gigRate:    gigRateElem.options[gigRateElem.selectedIndex].value,
            gigComment: document.getElementById('gigComment').value,
            rate:     rateElem.options[rateElem.selectedIndex].value,
            comment:    document.getElementById('comment').value,
            future:     document.getElementById('future').checked
          };

          /*enterGigFeedback(obj);*/
        });

        $("#loading-indicator").hide();
    }
    function showGigFeedback(link)
    {
        $("#loading-indicator").show();
        $("#lefty").load('/promoter/showGigFeedback',{'gigLink': link},showGigFeedbackCallback);
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
        console.log('gigLink',obj.gigLink,'prate',obj.rate,'pcomment',obj.comment,'gig',obj.gigRate,'gigc',obj.gigComment,'future',obj.future);
        $.post('/promoter/enterGigFeedback',{'gigLink': obj.gigLink, 'prate': obj.rate, 'pcomment': obj.comment, 'gig': obj.gigRate, 'gigc': obj.gigComment, 'future': obj.future},enterGigFeedbackCallback,'json');
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
    
    <? include("include/leftCommon.php"); ?>
	  
    <div id="main-container">
    <div id="lefty">
      </div>
        <div id="lefty1" style="display:none;  overflow-y:hidden;">
            <iframe name="leftframe" id="leftframe1" width="100%" height="100%" frameborder="0"></iframe>
        </div>

        <script>
        <?
          /*if(isset($_GET["profile"]) && $_GET["profile"]=="search")
          { 
            if(isset($_GET["pages"])){$_SESSION["pages"]=$_GET["pages"];}
            else{$_SESSION["pages"]=1;}
            if(isset($_POST["profile"])){$_SESSION["profile"]=$_POST["profile"];}
            print("$('#lefty').load('include/profile_search.php?page=$_SESSION[pages]');");
          }
          else if(isset($_GET["feed"])){ print("$('#lefty').load('include/feed.php?feed=$_GET[feed]');");}
          else if(isset($_GET["thank"])){ print("$('#lefty').load('include/thank.php?rate=1');");}
          else{ 
                if(!isset($_GET["id"]) && !isset($_GET["gig"]))
                { 
                  //print("$('#lefty').load('include/profile.php');");
                  print("$.post('promoter/profilepage','',showProfileCallback,'json');");
                }
                else if(isset($_GET["id"])){ print("$('#lefty').load('include/profile.php?id=$_GET[id]');");}
                else if(isset($_GET["gig"]) && isset($_GET["added"])){ 
                  print("$('#lefty').load('include/gigs.php?gig=$_GET[gig]&added=new');");}
				        else if(isset($_GET["gig"]) && isset($_GET["edited"])){ 
                  print("$('#lefty').load('include/gigs.php?gig=$_GET[gig]&edited=new');");}
                else if(isset($_GET["gig"])){ print("$('#lefty').load('include/gigs.php?gig=$_GET[gig]');");}
              } */
              if(isset($gig_id))
                    print("showGigFeedback($gig_id);");
                else
                    print("showProfile();");
        ?>
        </script>
		
		    <!-- start menu -->
        <div id="menuFooter" style="background:#000;">
          <ul>
            <li>
              <a  href="javascript:;" onClick="showLaunchGig()"><h3><? echo lang('btn_launch_gig');?></h3></a>
            </li>
            <li>
              <!--<a  href="javascript:;" onClick="loadframe('gigs');"><h3>My Gigs</h3></a> -->
              <a  href="javascript:;" onClick="promoterGigs()"><h3><? echo lang('btn_my_gigs');?></h3></a>
            </li>
            <li>
              <a href="javascript:;" onClick="showProfile()"><h3><? echo lang('btn_my_profile');?></h3></a>
            </li>
            <li>
              <a href="javascript:;" onClick="showEditProfile();"><h3><? echo lang('btn_edit_profile');?></h3></a>
            </li>
          </ul>
        </div>
        <!-- end menu -->     
      </div>

    </div> <!--main-container-->
    <? include("include/rightCommon.php");  ?>
</body>
</html>
<?
ob_end_flush();
?>