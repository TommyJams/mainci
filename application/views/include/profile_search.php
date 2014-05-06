<html>

<head>

    <link rel='stylesheet' href='style/edit.css'>

    <!-- Include the JS files -->

</head>

<body>

    <div id="searchbox" style="height:8%;">

        <form method="post" style="height:100%;" action="" id="profileSearchForm">

            <input type="text" id="search" name="profile" value="<? print($searchProfiles); ?>"   style="height:100%; width:65%; border:0px;">

            <input type="submit" value="<? echo lang('str_search_profile');?>"  style="width: 30%; height:100%; border: 0px; margin-left:1%;"> 

        </form>

    </div>

    <div id="box" style="display:block; height:85%;">

        <div id="content" class="clearfix">

            <section id="left" style="width:100%; background:#000;">

                <div class="gcontent" style="margin-bottom:6px; margin-top:5px; overflow-y:auto;">

                        <table class="searchResultsTable" width="100%" style="padding: 10px 10px; text-align: center;">

                            <tr bgcolor="#ffcc00" height="30px">

                                <td width="10%"><h1><? echo lang('str_search_profile_image');?></h1></td>

                                <td width="20%"><h1><? echo lang('str_search_profile_name');?></h1></td>

								<td width="20%"><h1><? echo lang('str_search_profile_user');?></h1></td>

                                <td width="10%"><h1><? echo lang('str_search_profile_type');?></h1></td>

                                <td width="15%"><h1><? echo lang('str_search_profile_city');?></h1></td>

                                <td width="25%"><h1><? echo lang('str_search_profile_social');?></h1></td>

                            </tr>

							<?
							if(isset($foundProfiles))
                            foreach($foundProfiles as $row){
                                $users=$row[0];
                                $goto=$row[1];
                                $name=$row[2];
                                $usernam=$row[3];
                                $type=$row[4];
                                $city=$row[5];
                                $fb=$row[6];
                                $twitter=$row[7];
                                $rever=$row[8];
                                $youtube=$row[9];
                                $soundcloud=$row[10];
                                $otherl=$row[11];
                            ?>

								<tr height='20px' bgcolor='#000'>

									<td width=10%><img src='<? print($users); ?>' width=50px height=50px></td>

									<td width=20%><a href='javascript:;' onClick=verify_login('<? print($goto); ?>');><? print($name); ?></a></td>
									
									<td width=20%><a href='javascript:;' onClick=verify_login('<? print($goto); ?>');><? print($usernam); ?></a></td>

									<td width=10%><? print($type); ?></td>

									<td width=15%><? print($city); ?></td>

									<td width=25%>

									<?

										if($fb!=""){ print("<a href='$fb' rel='me' target='_blank'><img src='img/facebook.png' /></a>"); }

										if($twitter!=""){ print("<a href='$twitter' rel='me' target='_blank'><img src='img/twitter.png' /></a>"); }					

										if($rever!=""){ print("<a href='$rever' rel='me' target='_blank'><img src='img/reverbnation.png' /></a>"); }				

										if($youtube!=""){ print("<a href='$youtube' rel='me' target='_blank'><img src='img/youtube.png' /></a>"); }						

										if($soundcloud!=""){ print("<a href='$soundcloud' rel='me' target='_blank'><img src='img/soundcloud.png' /></a>"); }					

										if($otherl!=""){ print("<a href='$otherl' rel='me' target='_blank'><img src='img/otherl.png' /></a>"); }

                            		?>

                            		</td>

                            	</tr>

                            <?}?> 
                            
                        </table>

                        <table class="searchResultsTable" style="padding: 0px 10px; ">
                            <tr>

                            <?
                            
                            if($total_pages>20){$total_pages=20;}

                            for($i=1;$i<=$total_pages;$i++)
							{
								if($nPage == $i)
									print("<td><a href='javascript:;' onClick=searchProfilesPage(undefined,$i); style='background: #ffcc00; padding: 2px 12px; line-height: 30px;'>$i</a></td>");
								else
									print("<td><a href='javascript:;' onClick=searchProfilesPage(undefined,$i); style='padding: 2px 12px; line-height: 30px;'>$i</a></td>");
							}

                            ?>

                            </tr>

                        </table>

                </div>

            </section>

        </div>

    </div>

</body>

</html>