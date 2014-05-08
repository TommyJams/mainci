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
                            height: 100%; "/>
    <div id="profil" style="display:none;">
		<a id="loginBoxClose" href="javascript:;" onClick="popup('profil')">
		</a>
        <center>
            <h2><? echo lang('str_profile_title');?></h2>
        </center>
        <form action="" method="post" id="profilePicForm" enctype="multipart/form-data">
            <table id="uploadTable" style="margin-top: 30px; width: 100%;">
                <tbody>
                    <tr>
                        <td align="center" style="width: 100%;">
                            <input name="userfile" id="userfile" type="file" size="50" />
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="width: 100%;">
                            <span class="hint" style="line-height:10px;">
                            <? echo lang('str_profile_image');?> (.jpg, .png, .bmp)
                            <br>
                            <? echo lang('str_profile_max_size');?>: 150KB
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="width: 100%;">
                            <input name="submit" id="upload" type="submit" value="<? echo lang('str_profile_call1');?>"/>
                        </td>
                    </tr>
					<tr>
						<td align="center" style="width: 100%; padding: 20px;">
                            <? echo lang('str_profile_or');?>
						</td>
					</tr>
                </tbody>
            </table>
        </form>
        <form action="" method="post" id="facebookPicForm" enctype="multipart/form-data">
            <table id="uploadTable" style="margin-top: 30px; width: 100%;">
                <tbody>            
					<tr>
						<td align="center" style="width: 100%;">
							<img src="<? echo'https://graph.facebook.com/'.$fb_id.'/picture'; ?>" style="vertical-align:bottom">
							<input name="submit" id="upload" type="submit" value="<? echo lang('str_profile_call2');?>"/>
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>

    <? $userpic = $users; ?>
    <section id="left">
        <div id="userStats">
			<div id="userPic" class="pic"> 
                <?
                if(isset($loggedIn) && $loggedIn)
                {print("<a href='javascript:;' onclick=bindnpopup()>");}
				else {print("<a href='javascript:;'>");}
				print ("<img class='userStatsPic' src='$userpic'/>"); ?></a>
			</div>
			<div class="data">
                <div style="width:35%; height:100%; float:left;">
                    <div id="userName">
                        <h1 style="display:inline-block;"><? print ($name); ?></h1>
                    </div>
                    <h2 style='padding-top:0px;'>
                        <?print ($username);?>
						<br>
                        <?print ($designation);?>
                        <?
						/*print ("$usernam");
                        if($organization!="")
                        {
							print ("$job ");
                        }*/
                        ?>
                    </h2>
                    <h2 style='padding-top:0px;'>
                        <?
                        if($city!="")
                        {
                            print($city);
                        }
                        if($state!="")
                        {
                            if($city!="")
                                print(", ");
                            print($state);
                        }
                        if($country!="")
                        {
                            if($city!="" || $state!="")
                                print(", ");
                            print($country);
                        }
                        ?>
                    </h2>
                </div>
				<div class="socialInfo">
					<div class="userType">
						<h1>
                        <?
                            if($type=="Promoter"){ echo lang("str_profile_call12"); }
                            else if($type=="Artist"){ echo lang("str_profile_call9"); }
                        ?>
                        </h1>
					</div>
					<div class="userGenre">
						<h2 style="padding-top:0px;">
						  <?print($genre);?>
						</h2>
					</div>
					<div class="socialMediaLinks">
						<? 
							if($fb!="")
							{
								print("<a href='$fb' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/facebook.png' /></a>");
                            }
						?>
						<?
							if($twitter!="")
							{ 
								print("<a href='$twitter' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/twitter.png' /></a>"); 
							}
						?>
						<? 
                            $rever = $reverbnation;
							if($rever!="")
							{
								print("<a href='$rever' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/reverbnation.png' /></a>"); 
							}
						?>
						<? 
							if($youtube!="")
							{ 
								print("<a href='$youtube' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/youtube.png' /></a>"); 
							}
						?>
						<? 
							if($soundcloud!="")
							{
								print("<a href='$soundcloud' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/soundcloud.png' /></a>"); 
							}
						?>
						<? 
							if($otherl!="")
							{ 
								print("<a href='$otherl' rel='me' target='_blank' style='float:left; width:auto; height:auto;'><img src='img/otherl.png' /></a>"); 
							}
						?>
					</div>
				</div>
				<div class="medals" style="width:35%; height: auto; float:right; position:relative; top:50%; margin-top:-25px;">
                    <center>
                        <?                                                         
                        print("<a alt='".lang('str_profile_call5')."' title='".lang('str_profile_call5')."'><div style='background:#007888; color: #FFF; height:50px; width:50px; '><h1>$userRating</h1></div></a>");
                        /*print("<a alt='User Rating' title='User Rating'><div style='background:#606060; color:#FFF; height:50px; width:50px; margin-top:5px;'><h1>$silver</h1></div></a>");*/
                        ?>
                    </center>
                </div>
				<!--<div class="sep" style="width:98%;">                    </div>-->
			</div> <!--data-->            
		</div> <!-- userstats -->
        <div id = "blank" style = "display: block; height: 4%; width: 100%" />
        <div id = "userDetails">
            <div style="height: 100%; width:48%; float:left;">
                <div class="head" style="height:10%; margin-bottom:1%;">
                    <h1><? echo lang('str_profile_call6');?></h1>
                </div>
                <div class="about" style = "height: 88%; background: #000; overflow-y:auto;">
                    <p>
						<? 
							/*convert to URL*/
							$aboutStr = preg_replace('!(((f|ht)tp(s)?://)[-a-zA-Zа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a href="$1" target="_blank">$1</a>', $about);
							/*format newlines*/
							$aboutStr = nl2br("$aboutStr");
							print ($aboutStr); 
						?>
					</p>
                </div>
            </div> <!--AboutMe-->
            <div style="height: 100%; width:48%; float:left; margin-left:4%;">  <!--gigs list-->
                <div class="gcontent">
                    <div class="head" style="height:10%; margin-bottom:1%;">
                        <h1><? echo lang('str_profile_call7');?></h1>
                        <? /*if($type=="promoter"){print("Previous GIGs");}else{print("Previous DIBs");}*/ ?>
                    </div>
                    <div class="boxy">
                        <div class="giglist clearfix">
                            <div id="pgig" style="top:2px;">
								<table>
									<tr>
										<td style="background: #ffcc00; width: 30%;"><h1><? echo lang('str_profile_call8');?></h1></td>
										<td style="background: #ffcc00; width: 30%;">
                                            <h1>
                                                <?if($type=="Promoter"){ echo lang("str_profile_call9"); }
                                                else if($type=="Artist"){ echo lang("str_profile_call11"); }?>
                                            </h1>
                                        </td>
										<td style="background: #ffcc00; width: 40%;"><h1><? echo lang('str_profile_call10');?></h1></td>
									</tr>
								</table>
                                <div class="gig" style="">
                                    <span class="gigs" >
                                    <?php 
                                    if($error == 0){
                                    foreach($gigHistory as $row){ ?>
                                    <?
                                    $gig_name=$row[0];
                                    $pr_id=$row[1];
                                    $pr_name=$row[2];
                                    $ar_id=$row[3];
                                    $ar_name=$row[4];
                                    $date=$row[5];
                                    $city=$row[6];
                                    $gig_id=$row[7];
                                    if($type=="Promoter") 
									{ print("<table><tr><td id='gigNameColumn' width='30%'><a href='javascript:;' onClick=gigProfile('$gig_id'); class='highlightRef' >$gig_name</a></td><td id='nameColumn' width='30%'><a href='javascript:;' onClick=showProfile('$ar_id'); class='greenRef' >$ar_name</a></td>"); }
                                    else if($type=="Artist")
                                    { print("<table><tr><td id='gigNameColumn' width='30%'><a href='javascript:;' onClick=gigProfile('$gig_id'); class='highlightRef' >$gig_name</a></td><td id='nameColumn' width='30%'><a href='javascript:;' onClick=showProfile('$pr_id'); class='greenRef' >$pr_name</a></td>"); }
									
									print("<td width='40%'>$date<br>$city</td></tr></table>");
                                    ?><?php } }?>
									</span>
                                    <!--<span class="gigs"><? /*print("<td width='40%'>$formattedDate<br>$v_city</td></tr></table>");*/?></span>-->
                                    <!--<span class="gigs" style="color:#999; font-size:9px; line-height:3px; padding-top:10px;"></span>-->
                                </div>
                                                 
                            </div> <!--pgig-->
                        </div> <!--gigslist-->
                    </div> <!--boxy-->
                </div> <!--gcontent-->
            </div> <!--gigs list-->
        </div> <!--userDetails-->        
    </section>
</body>

</html>