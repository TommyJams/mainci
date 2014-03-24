<html>
<head>
	<link rel='stylesheet' href='style/edit.css'>
	<!-- Include the JS files -->
</head>
 <body>
 	<?php $ok="Update Gig"; ?>
    <div class="head">
		<h1><? echo lang('str_update_gig'); ?></h1>
	</div>
    <div id="box" style="display:block;">
        <div id="content" class="clearfix">
            <section id="left" style=" width:100%;">
                <div class="gcontent">
                    <div id="signUp" class="sign" style="overflow-y:auto">
                        <form action="" name="UpdateGigForm" method="POST" class="cleanForm" id="UpdateGigForm" style="height:100%; margin-top:10px; min-width:800px;">
						<div id="launchContainer">
                            <fieldset id="details" style = "height:auto; float:left">
                                <p>
                                    <label for="gig"><? echo lang('str_update_gig'); ?><span class="requiredField">*</span></label>
                                    <input type="text" id="gig" name="gig" style="width:200px;" 
                                    value="<? print("$gig"); ?>" pattern="^[a-zA-Z0-9. /()-_:@]{3,50}$" autofocus required />
                                    <em><? echo lang('lbl_update_name'); ?></em>
                                </p> 
                                <p>
                                    <label for="gig"><? echo lang('str_update_time'); ?></label>
                                    <select id="select"  disabled="disabled" style="width:60px; float:left;" name="hours">
                                    <?
                                        for($i=01;$i<=12;$i++){ if( ($hourSaved==$i) || $i==8 ) print("<option value='$i' selected='selected'>$i</option>"); else print("<option value='$i'>$i</option>"); }
                                    ?>      
                                    </select>
                                    <select id="select" disabled="disabled" style="width:80px; margin-left: 5px; float:left;" name="minute">
										<option value='00' <? if($minSaved=='00') print("selected='selected'"); ?> >00</option>
										<option value='30' <? if($minSaved=='30') print("selected='selected'"); ?> >30</option>
                                    </select>                            
                                    <select id="select" disabled="disabled" style="width:60px; margin-left: 5px; float:left;" name="am">
                                        <option value='PM' <? if($amSaved=='PM') print("selected='selected'"); ?> >PM</option>
										<option value='AM' <? if($amSaved=='AM') print("selected='selected'"); ?> >AM</option>
                                    </select>
                                    <em><? echo lang('str_update_time'); ?></em>
                                </p>
								<p>
									<label for="gig"><? echo lang('str_update_duration'); ?></label>
                                    <select id="select"  disabled="disabled" style="width:60px; float:left;" name="duration">
                                    <?
                                        for($i=0.5;$i<=24;$i = $i + 0.5){ if($i == $durationSaved) print("<option value='$i' selected='selected'>$i</option>"); else print("<option value='$i'>$i</option>"); }
                                    ?>
                                    </select>
									<em><? echo lang('lbl_update_duration'); ?></em>
								</p>
                                <p>
                                    <label for="Website"><? echo lang('str_update_website'); ?></label>
                                    <input type="text" id="website" name="web" style="width:200px;" value="<? print("$web"); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <em><? echo lang('lbl_update_website'); ?></em>
                                </p>
                                <p>
                                    <label for="social"><? echo lang('str_update_fb'); ?></label>
                                    <input type="text" id="fb" name="fb" style="width:200px;" value="<? print("$fb"); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <em><? echo lang('lbl_update_fb'); ?></em>
                                </p>
                                <p>
                                    <label for="social"><? echo lang('str_update_twitter'); ?></label>
                                    <input type="text" id="twitter" name="twitter" style="width:200px;" value="<? print("$twitter"); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <em><? echo lang('lbl_update_twitter'); ?></em>
                                </p>
                            </fieldset>
                            <fieldset id="venue">
                                <p>
                                    <label for="add"><? echo lang('str_update_venue'); ?><span class="requiredField">*</span></label>
                                    <input type="text" id="add" name="add" value="<? print("$add"); ?>" pattern="^[0-9a-zA-Z !@#$%^&*()_,.\\/{}|:<>?-]{3,100}$" required/>
                                    <em><? echo lang('lbl_update_venue'); ?></em>
                                </p>
                                <p>
                                    <label for="fb"><? echo lang('str_update_desc'); ?><span class="requiredField">*</span></label>
                                    <textarea cols="25" rows="14"  id="about" name="desc"  pattern="^[a-zA-Z0-9:/.-_?]{25,2000}$"  required><? print("$desc"); ?></textarea>
                                    <em><? echo lang('lbl_update_desc'); ?></em>
                                </p>
                            </fieldset>                                                        
                            <div class="centera" style="width:500px; position:relative; margin: 0 auto; display:block;">
                                <!--I don't know why margin-left, right set to auto does not work here, hence the -50 :(-->
                                <input type="submit" value="<? echo $ok; ?>" style="height:45px; width: 100px; left:50%; margin-left:-50px; position:relative; padding: 5px 5px;"/>
                            </div>
                            <div>
                                <input type="hidden" name="gigLink" id="gigLink" value="<? print($link);?>">
                            </div>    
							<div class="formExtra" style=" width:60%; position:relative; margin-top:20px; margin-left:auto; margin-right: auto;">
                                <p><strong>Note: </strong> Fields marked with <span class="requiredField">*</span> are required.</p>
                            </div>
                        </form>
                    </div>
                </div>
        </section>
	</div>
</div>
</body>
</html>