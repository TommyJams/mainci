<html>
<head>
	<link rel='stylesheet' href='style/edit.css'>
	<!-- Include the JS files -->
</head>
 <body>
    <div id="blanket" style="display:none;
                            background-color:#111;
                            opacity: 0.65;
                            position:absolute;
                            z-index: 9001;
                            top:0px;
                            left:0px;
                            width:100%;
                            height:100%;
                            "/>

	<div id="profil" style="display:none; ">
        <a id="loginBoxClose" href="javascript:;" onClick="popup('profil')">
		</a>
        <center><h2><? echo lang('str_gigs_title');?></h2></center>
        
        <form action="" method="post" id="gigsPicForm" enctype="multipart/form-data">
            <table style="margin-top: 30px; width: 100%;">
                <tbody>
                    <tr>
                        <td>
                            <input name="gigLink"  id="gigLink"  type="hidden" value="<? print($link);?>"/>
                            <input name="userfile" id="userfile" type="file" size="50" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <span class="hint" style="line-height:10px;">
                                    <? echo lang('str_gigs_image');?> (.jpg, .png, .bmp)
                                    <br>
                                    <? echo lang('str_gigs_max_size');?>: 150KB
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center">
                            <input name="submit" id="upload" type="submit" value="<? echo lang('str_gigs_call1');?>" style="background: #000; color: #ffcc00; margin: 10px auto;"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <div id="box" style="display:block; height:100%;">	
        <section id="left" style="width:100%; height:100%;">
			<div id="userStats" class="clearfix">
                <div id="userPic" class="pic">

					<? 
                        if($gigStatus == 2)
                        {
                            print("<a href='javascript:;'  onclick=bindnpopupgigspic()>");
                        }
					    else 
                        { 
                            print("<a href='javascript:;'>");
                        }
                        print ("<img src='$gigs' class='userStatsPic' />"); 
                    ?>
					
                    </a>
				</div>
				<div class="data">
                    <div style=" width:35%; height:100%; float:left;">
                        <div id="userName">
							<h1 style="display:inline-block;"><? print ("$gig"); ?></h1>
						</div>
                        <h2 id='gigHostName'><? echo lang('str_gigs_call2');?>: <? print ("<a href='javascript:;' onClick=showProfile('$promoter');>$promoter_name</a>"); ?></h2>
                        <h2><?
                            if($city!="")
                            {
                                print("$city");
                            }
                            if($state!="")
                            {
                                if($city!="")
                                print(", ");

                                print("$state");
                            }
                            if($country!="")
                            {
                                if($city!="" || $state!="")
                                print(", ");

                                print("$country");
                            }
                            ?>
                        </h2>
                    </div>
					<div class="socialInfo">
						<div class="socialMediaLinks">
                            <? if($fb!="")
                                { print("<a href='$fb' rel='me' target='_blank'><img src='img/facebook.png' /></a>"); }?>						
							<? if($twitter!="")
                                { print("<a href='$twitter' rel='me' target='_blank'><img src='img/twitter.png' /></a>"); }?>						
							<? if($web!="")
                                { print("<a href='$web' rel='me' target='_blank'><img src='img/web.png' /></a>"); }?>
						</div>
					</div>
                    <div class="medals" style="width:35%; height: auto; float:right; position:relative; top:30%; margin-top:-35px;">
                        <div id="gigStatus" style="width:auto; height:auto; margin:20px auto; position:relative;">
						<center>
                        <?	
                        if ($gigStatus == 1) // Gig is booked
                        {
							print("<h2></h2>".lang('str_gigs_call3'));
                            print("<a href='javascript:;' onClick=showProfile('$artist_booked_id'); class='whiteHoverRef'>$artist_booked_name</a>");
                        }
						elseif($gigStatus == 2)
						{    
							print("<a  href='javascript:;' onClick=showUpdateGig('$link'); class='whiteHoverRef'></a>".lang('str_gigs_call4'));
						}
                        elseif($gigSession == 1)
                        { 
                            $statuss=$found["status"];
                            if($gigStatus == 3){print("<a href='javascript:;' id='addnew' style='background: #0a0;'></a>".lang('str_gigs_status1'));}
                            elseif($gigStatus == 4){print("<a href='javascript:;' id='addnew' style='background: #a00'></a>".lang('str_gigs_status2'));}
                            elseif($gigStatus == 5){print("<a href='javascript:;' id='addnew' style='background: #282828;'></a>".lang('str_gigs_status3'));}
                        
					        elseif($gigStatus == 6)
						    {
							    print("<a href='javascript:;' class='dibStatusRef' style='background:#666;'></a>".lang('str_gigs_status4'));
						    }
                            elseif($gigStatus == 7)
                            {                       
                            ?>
                                <a href='javascript:;' name="dib" id="dibStatusButton" onClick="confirmDibsSubmit('<?print("$link");?>');">DIB</a>                               
                            <?
                            }
                        }
                        
                        elseif($gigStatus == 8)
                        {
                            print("<a href='javascript:;' class='dibStatusRef' style='background:#666;'></a>".lang('str_gigs_status4'));
                        }
                    
                        /*
                        print("<p"); if(isset($_SESSION["username_artist"])){ print(" style='margin-top:25px;' ");}
                        print("><b>Description:-</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  $desc</p>");
                        */
                        ?>
						</center>
                        </div>
                    </div>
				</div> <!--data-->
			</div> <!--userStats-->
            <div id = "blank" style = "display: block; height: 4%; width: 100%" />
			<div class="about">
                <div class="gcontent" style="height:100%; background: #000; padding: 0px 20px; overflow-y:auto;">                    
                    <div class="boxy" style = "height:auto; margin:20px 0px;">
                        <table width="100%" style="text-align:left;">
                            <tr>
                                <td style="width:10%; background: #ffcc00;"><h2><? echo lang('str_gigs_call5');?><h2></td>
                                <td style="color: #000; background: #fff; padding:5px;"><?  print ("$formattedDate"); ?><td>
                            </tr>
                            <tr style="color: #000; width:10%" >
                                <td style="width:10%; background: #ffcc00;"><h2><? echo lang('str_gigs_call6');?><h2></td>
                                <td style="color: #000; background: #fff; padding:5px;"><?  print ("$vtime"); ?></td>
                            </tr>
							<tr style="color: #000; width:10%" >
                                <td style="width:10%; background: #ffcc00;"><h2><? echo lang('str_gigs_call7');?><h2></td>
                                <td style="color: #000; background: #fff; padding:5px;"><?  print ("$duration"); ?> hours</td>
                            </tr>
                            <tr style="color: #000; width:10%" >
                                <td style="width:10%; background: #ffcc00;"><h2><? echo lang('str_gigs_call8');?><h2></td>
                                <td style="color: #000; background: #fff; padding:5px;"><?  print ("$cat"); ?></td>
                            </tr>
                            <tr style="color: #000; width:10%" >
                                <td style="width:10%; background: #ffcc00;"><h2><? echo lang('str_gigs_call9');?><h2></td>
                                <td style="color: #000; background: #fff; padding:5px;">
                                    <?  
                                        if($budget_min == -1)
                                            {print("Undefined");}
                                        elseif($budget_max == $budget_min)
                                            {print("INR $budget_min");}
                                        else
                                            {print("INR $budget_min - $budget_max");} 
                                    ?>
                                </td>
                            </tr>
                            <tr style="color: #000; width:10%" >
                                <td style="width:10%; background: #ffcc00;"><h2><? echo lang('str_gigs_call10');?></h2></td>
                                <td style="color: #000; background: #fff; padding:5px;"><?  print ("$add, $city, $state, $country, $pincode"); ?></td>
                            </tr>
                            <tr style="color: #000; width:10%" >
                                <td style="width:10%; background: #ffcc00;"><h2><? echo lang('str_gigs_call11');?></h2></td>
                                <td style="color: #000; background: #fff; padding:5px;">
                                    <?
                                        /*convert to URL*/
                                        $descStr = preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1" target="_blank" style="color:#000;">$1</a>', $desc);
										/*format newlines*/
										$descStr = nl2br("$descStr");
										print ("$descStr"); 
									?>
								</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>