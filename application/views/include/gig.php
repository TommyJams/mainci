<html>
<head>
	<link rel='stylesheet' href='style/edit.css'>
</head>
 <body>
 	<?php 
		$do="add";
		$show=1;
		$ok="Launch Gig";
							
		$todayDate = intval(date("d"));
		$todayMonth = intval(date("m"));
		$todayYear = intval(date("Y"));
 	?>
    <div class="head">
		<h1><? echo lang('str_launch_gig'); ?></h1>
	</div>
    <div id="box" style="display:block;">
        <div id="content" class="clearfix">
            <section id="left" style=" width:100%;">
                <div class="gcontent">
                    <div id="signUp" class="sign" style="overflow-y:auto">
                        <form action="" name="signUpForm" method="POST" class="cleanForm" id="signUpForm" style="height:100%; margin-top:10px; min-width:800px;">
						<div id="launchContainer">
                            <fieldset id="details" style = "height:auto; float:left">
                                <p>
                                    <label for="gig"><? echo lang('str_label_name'); ?><span class="requiredField">*</span></label>
                                    <input type="text" id="gig" name="gig" style="width:200px;" value="" pattern="^[a-zA-Z0-9. /()-_:@]{3,50}$" autofocus required />
                                    <em><? echo lang('str_desc_name'); ?></em>
                                </p>
								<? if($show==1){ ?>
									<p>
									  <label for="Select"><? echo lang('str_label_genre'); ?><span class="requiredField">*</span></label>
										<select id="select" name="cat"  style="width:200px; padding-right:0px;" required >
											<option value="Acoustic"><? echo lang('str_genre_acoustic'); ?></option>
											<option value="Blues"><? echo lang('str_genre_blues'); ?></option>
											<option value="Classic Rock"><? echo lang('str_genre_classic'); ?></option>
											<option value="Classical"><? echo lang('str_genre_classical'); ?></option>
											<option value="Comedy"><? echo lang('str_genre_comedy'); ?></option>
											<option value="Contemporary"><? echo lang('str_genre_contemporary'); ?></option>
											<option value="Cover Band"><? echo lang('str_genre_cover'); ?></option>
											<option value="Dance/DJ"><? echo lang('str_genre_dance'); ?></option>
											<option value="Dubstep"><? echo lang('str_genre_dubstep'); ?></option>
											<option value="Electronic"><? echo lang('str_genre_electronic'); ?></option>
											<option value="Folk"><? echo lang('str_genre_folk'); ?></option>
											<option value="Funk"><? echo lang('str_genre_funk'); ?></option>
											<option value="Goth"><? echo lang('str_genre_goth'); ?></option>
											<option value="Jazz"><? echo lang('str_genre_jazz'); ?></option>
											<option value="Metal"><? echo lang('str_genre_metal'); ?></option>
											<option value="Pop"><? echo lang('str_genre_pop'); ?></option>
											<option value="Punk"><? echo lang('str_genre_punk'); ?></option>
											<option value="Reggae"><? echo lang('str_genre_reggae'); ?></option>
											<option value="Rock"><? echo lang('str_genre_rock'); ?></option>
											<option value="Solo"><? echo lang('str_genre_solo'); ?></option>
											<option value="Soul"><? echo lang('str_genre_soul'); ?></option>
											<option value="Other"><? echo lang('str_genre_other'); ?></option>
										</select>
										<em>&nbsp;</em>
									</p>
									<p>
									<label for="Budget"><? echo lang('str_label_budget'); ?><span class="requiredField">*</span></label>
										<select id="select" name="budget_min" style="width:145px; float:left;" required >
											<option value="0"   ><? echo lang('str_budget_free'); ?></option>
											<option value="1000"><? echo lang('str_budget_opt1'); ?></option>
											<option value="2000"><? echo lang('str_budget_opt2'); ?></option>
											<option value="5000"><? echo lang('str_budget_opt3'); ?></option>
											<option value="10000"><? echo lang('str_budget_opt4'); ?></option>
											<option value="20000"><? echo lang('str_budget_opt5'); ?></option>
											<option value="40000"><? echo lang('str_budget_opt6'); ?></option>
											<option value="100000"><? echo lang('str_budget_opt7'); ?></option>
										</select>
										<select id="select"  style="width:60px; margin-left:5px; float:left;" name="budget_max">
											<option value="0"><? echo lang('str_nego_0'); ?></option>
											<option value="10"><? echo lang('str_nego_10'); ?></option>
											<option value="20"><? echo lang('str_nego_20'); ?></option>
											<option value="30"><? echo lang('str_nego_30'); ?></option>
											<option value="40"><? echo lang('str_nego_40'); ?></option>
											<option value="50"><? echo lang('str_nego_50'); ?></option>
											<option value="60"><? echo lang('str_nego_60'); ?></option>
											<option value="70"><? echo lang('str_nego_70'); ?></option>
											<option value="80"><? echo lang('str_nego_80'); ?></option>
											<option value="90"><? echo lang('str_nego_90'); ?></option>
											<option value="100"><? echo lang('str_nego_100'); ?></option>
										</select>
										<em><? echo lang('str_desc_budget'); ?></em>
									</p>
									<p>
										<label for="gig"><? echo lang('str_label_date'); ?><span class="requiredField">*</span></label>
										<select id="select"  style="width:60px; float:left;" name="date">
											<?
												for($i=1;$i<=31;$i++){if($i == $todayDate) print("<option value='$i' selected='selected'>$i</option>"); else print("<option value='$i'>$i</option>");}
											?>
										</select>
										<select id="select"  style="width:80px; margin-left: 5px; float:left;" name="month">
										   <option value='1' <? if($todayMonth == '1') print("selected='selected'"); ?> ><? echo lang('str_month_jan'); ?></option>
										   <option value='2' <? if($todayMonth == '2') print("selected='selected'"); ?> ><? echo lang('str_month_feb'); ?></option>
										   <option value='3' <? if($todayMonth == '3') print("selected='selected'"); ?> ><? echo lang('str_month_mar'); ?></option>
										   <option value='4' <? if($todayMonth == '4') print("selected='selected'"); ?> ><? echo lang('str_month_apr'); ?></option>
										   <option value='5' <? if($todayMonth == '5') print("selected='selected'"); ?> ><? echo lang('str_month_may'); ?></option>
										   <option value='6' <? if($todayMonth == '6') print("selected='selected'"); ?> ><? echo lang('str_month_jun'); ?></option>
										   <option value='7' <? if($todayMonth == '7') print("selected='selected'"); ?> ><? echo lang('str_month_jul'); ?></option>
										   <option value='8' <? if($todayMonth == '8') print("selected='selected'"); ?> ><? echo lang('str_month_aug'); ?></option>
										   <option value='9' <? if($todayMonth == '9') print("selected='selected'"); ?> ><? echo lang('str_month_sep'); ?></option>
										   <option value='10' <? if($todayMonth == '10') print("selected='selected'"); ?> ><? echo lang('str_month_oct'); ?></option>
										   <option value='11' <? if($todayMonth == '11') print("selected='selected'"); ?> ><? echo lang('str_month_nov'); ?></option>
										   <option value='12' <? if($todayMonth == '12') print("selected='selected'"); ?> ><? echo lang('str_month_dec'); ?></option>
										</select>
										<select id="select"  style="width:60px; margin-left: 5px; float:left;" name="year">
										<?
											for($i=2014;$i<=2015;$i++){ if($i == $todayYear) print("<option value='$i' selected='selected'>$i</option>"); else print("<option value='$i'>$i</option>"); }
										?>                  
										</select>
										<em><? echo lang('str_desc_date'); ?></em>
									</p>
								<? } ?>
                                <p>
                                    <label for="gig"><? echo lang('str_label_time'); ?><span class="requiredField">*</span></label>
                                    <select id="select"  style="width:60px; float:left;" name="hours">
                                    <?
                                        for($i=01;$i<=12;$i++){ if( (isset($a) && $hourSaved==$i) || $i==8 ) print("<option value='$i' selected='selected'>$i</option>"); else print("<option value='$i'>$i</option>"); }
                                    ?>      
                                    </select>
                                    <select id="select"  style="width:80px; margin-left: 5px; float:left;" name="minute">
										<option value='00' <? if(isset($a) && $minSaved=='00') print("selected='selected'"); ?> >00</option>
										<option value='30' <? if(isset($a) && $minSaved=='30') print("selected='selected'"); ?> >30</option>
                                    </select>                            
                                    <select id="select" style="width:60px; margin-left: 5px; float:left;" name="am">
                                        <option value='PM' <? if(isset($a) && $amSaved=='PM') print("selected='selected'"); ?> ><? echo lang('str_time_am'); ?></option>
										<option value='AM' <? if(isset($a) && $amSaved=='AM') print("selected='selected'"); ?> ><? echo lang('str_time_pm'); ?></option>
                                    </select>
                                    <em><? echo lang('str_desc_time'); ?></em>
                                </p>
								<p>
									<label for="gig"><? echo lang('str_label_duration'); ?><span class="requiredField">*</span></label>
                                    <select id="select"  style="width:60px; float:left;" name="duration">
                                    <?
                                        for($i=0.5;$i<=24;$i = $i + 0.5){ if(isset($a) && $i == $durationSaved) print("<option value='$i' selected='selected'>$i</option>"); else print("<option value='$i'>$i</option>"); }
                                    ?>
                                    </select>
									<em><? echo lang('str_desc_duration'); ?></em>
								</p>
								<? if($show==1){ ?>
									<p>
										<label for="gig"><? echo lang('str_label_slots'); ?></label>
										<select id="select"  style="width:60px; float:left;" name="slotNum">
										<?
											for($i=1;$i<=10;$i++){print("<option value='$i'>$i</option>");}
										?>      
										</select>
										<em><? echo lang('str_desc_slots'); ?></em>
									</p>
								<? } ?>
                                <p>
                                    <label for="Website"><? echo lang('str_label_website'); ?></label>
                                    <input type="text" id="website" name="web" style="width:200px;" value="<? if(isset($a)) echo $a['web']; ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <em><? echo lang('str_desc_website'); ?></em>
                                </p>
                                <p>
                                    <label for="social"><? echo lang('str_label_facebook'); ?></label>
                                    <input type="text" id="fb" name="fb" style="width:200px;" value="<? if(isset($a)) echo $a['fb']; ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <em><? echo lang('str_desc_facebook'); ?></em>
                                </p>
                                <p>
                                    <label for="social"><? echo lang('str_label_twitter'); ?></label>
                                    <input type="text" id="twiter" name="twitter" style="width:200px;" value="<? if(isset($a)) echo $a['twitter']; ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <em><? echo lang('str_desc_twitter'); ?></em>
                                </p>
                            </fieldset>
                            <fieldset id="venue">
                                <p>
                                    <label for="add"><? echo lang('str_label_address'); ?><span class="requiredField">*</span></label>
                                    <input type="text" id="add" name="add" value="<? if(isset($a)) echo $a['venue_add']; ?>" pattern="^[0-9a-zA-Z !@#$%^&*()_,.\\/{}|:<>?-]{3,100}$" required/>
                                    <em><? echo lang('str_desc_address'); ?></em>
                                </p>
								<? if($show==1){ ?>
									<p>
										<label for="city"><? echo lang('str_label_city'); ?><span class="requiredField">*</span></label>
										<input type="text" id="city" name="city" value="" pattern="^[a-zA-Z ]{3,20}$" required/>
										<em><? echo lang('str_desc_city'); ?></em>
									</p>
									<p>
										<label for="state"><? echo lang('str_label_state'); ?></label>
										<input type="text" id="state" name="state" value="" pattern="^[a-zA-Z ]{3,20}$"/>
										<em><? echo lang('str_desc_state'); ?></em>
									</p>
									
									<p>
										<label for="Country"><? echo lang('str_label_country'); ?><span class="requiredField">*</span></label>
										<input type="text" id="country" name="country" value="India" pattern="^[a-zA-Z ]{3,20}$" required/>
										<em><? echo lang('str_desc_country'); ?></em>
									</p>
									<p>
										<label for="Pincode"><? echo lang('str_label_pincode'); ?></label>
										<input type="text" id="pincode" name="pincode" value="" pattern="^[0-9]{6,6}$"/>
										<em><? echo lang('str_desc_pincode'); ?></em>
									</p>
								<? } ?>
                                <p>
                                    <label for="fb"><? echo lang('str_label_desc'); ?><span class="requiredField">*</span></label>
                                    <textarea cols="25" rows="14"  id="about" name="desc"  pattern="^[a-zA-Z0-9:/.-_?]{25,2000}$"  required><? if(isset($a)) echo $a['desc']; ?></textarea>
                                    <em><? echo lang('str_desc_desc'); ?></em>
                                </p>
                            </fieldset>                                                        
                            <div class="centera" style="width:500px; position:relative; margin: 0 auto; display:block;">
                                <!--I don't know why margin-left, right set to auto does not work here, hence the -50 :(-->
                                <input type="submit" value="<? echo $ok; ?>" style="height:45px; width: 100px; left:50%; margin-left:-50px; position:relative; padding: 5px 5px;"/>
                            </div>
							<div class="formExtra" style=" width:60%; position:relative; margin-top:20px; margin-left:auto; margin-right: auto;">
                                <p><? echo lang('str_footer_note1'); ?><span class="requiredField">*</span><? echo lang('str_footer_note2'); ?></p>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
	</div>
</div>
</body>
</html>