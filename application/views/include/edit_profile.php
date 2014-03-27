<html>
    <head>
        <link rel='stylesheet' href='style/edit.css'>
        <!-- Include the JS files -->
    </head>
    <body>
        <section id="left" >
            <div id="pageContainer" style = "width:100%; height:100%;">
                <?                                 
                /*if(isset($_GET['success']) && $_GET['success']==1)
                {
                    print("Change Done Successfullly");
                }
                else
                {
                    if(isset($_GET['error']) && $_GET['error']==1)
                    {print("Error!!! Fields left blank");}
                    elseif(isset($_GET['error']) && $_GET['error']==2)
                    {print("Error!!! Username or email already exist");}*/
                ?>
                    <table id="framemenu" >
                            <tr>
                            <td width="25%"><center><a href="javascript:;" onClick="showEditFrame('frameprofessional');"><h1><? echo lang('str_edit_profile_call1');?></h1></a></td>
                            <td width="25%"><center><a href="javascript:;" onClick="showEditFrame('framesocial');"><h1><? echo lang('str_edit_profile_call2');?></h1></a></center></td>
                            <td width="25%"><center><a href="javascript:;" onClick="showEditFrame('framecontact');"><h1><? echo lang('str_edit_profile_call3');?></h1></a></center></td>
                            <td width="25%"><center><a href="javascript:;" onClick="showEditFrame('frameabout');"><h1><? echo lang('str_edit_profile_call4');?></h1></a></center></td>
                            <tr>
                    </table>
                    <div id="frameprofessional">
                        <form action="" method="POST" class="cleanForm" id="professionalForm" >
                            <fieldset>
                                <p>
                                    <? if($type == 'Artist') { print("<label for='designation'></label>".lang('str_edit_profile_call5'));}
                                       elseif($type == 'Promoter')    { print("<label for='designation'></label>".lang('str_edit_profile_call6'));}
                                    ?>
                                    
                                    <input type="text" id="full-name" name="designation" value="<? print($designation); ?>"  pattern="^[a-zA-Z0-9/ ,-_.:;?]{3,50}$" autofocus />
                                    <br>
                                    <? if($type == 'Artist') { print("<em></em>".lang('str_edit_profile_call7'));}
                                       elseif($type == 'Promoter')    { print("<em></em>".lang('str_edit_profile_call8'));}
                                    ?>
                                </p>
                                <p>
                                    <? if($type == 'Artist') { print("<label for='organization'>".lang('str_edit_profile_call9')."<span class='requiredField'>*</span></label>");}
                                       elseif($type == 'Promoter')    { print("<label for='organization'></label>".lang('str_edit_profile_call10')."<span class='requiredField'>*</span>");}
                                    ?>
                                    <input type="text" id="username" name="organization" pattern="^[a-zA-Z0-9/ ,-_.:;?]{3,50}$" value="<? print ($name); ?>" required />
                                    <br>
                                    <em></em>
                                </p>
                                <p>
                                    <? if($type == 'Artist') { print("<label for='genre'></label>".lang('str_edit_profile_call11'));}
                                       elseif($type == 'Promoter')    { print("<label for='genre'></label>".lang('str_edit_profile_call12'));}
                                    ?>
                                    <input type="text" id="genrename" name="genre" pattern="^[a-zA-Z0-9/ ,-_.:;?]{3,50}$" value="<? print ($genre); ?>"/>
                                    <br>
                                    <? if($type == 'Artist') { print("<em></em>".lang('str_edit_profile_call13'));}
                                       elseif($type == 'Promoter')    { print("<em></em>".lang('str_edit_profile_call14'));}
                                    ?>
                                </p>
                                <center>
                                    <div class="centera" style=" width:500px; position:relative; margin-top:10px; ">
                                        <input type="submit" value="<? echo lang('str_edit_profile_call26');?>" style = "height: 45px; width: auto padding: 5px 5px;"/>
                                    </div>
                                    <div class="formExtra" style="margin-left:60px; margin-right:60px;">
                                        <p><strong><? echo lang('str_edit_profile_call15');?> </strong> <? echo lang('str_edit_profile_call16');?> <span class="requiredField">*</span> <? echo lang('str_edit_profile_call17');?>.</p>
                                    </div>
                                </center>
                            </fieldset>
                        </form>
                    </div>
                    <div id="framesocial">
                        <form action="" method="POST" class="cleanForm" id="socialForm">
                            <fieldset>
                                <p>
                                    <label for="social">Facebook: <span class="requiredField">*</span></label>
                                    <input type="text" id="fb" name="fb" value="<? print ($fb); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" required />
                                    <br>                                <em><? echo lang('str_edit_profile_call18');?> on Facebook.</em>
                                </p>
                                <p>
                                    <label for="social">Twitter: </label>
                                    <input type="text" id="twitter" name="twitter" value="<? print ($twitter); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <br>                                <em><? echo lang('str_edit_profile_call18');?> on Twitter.</em>
                                </p>
                                <p>
                                    <label for="social">Reverbnation:</label>
                                    <input type="text" id="reverbnation" name="rever" value="<? print ($reverbnation); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <br>                                <em><? echo lang('str_edit_profile_call18');?> on Reverbnation.</em>
                                </p>
                                <p>
                                    <label for="social">Youtube:</label>
                                    <input type="text" id="youtube" name="youtube" value="<? print ($youtube); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <br>                                <em><? echo lang('str_edit_profile_call18');?> on youtube.</em>
                                </p>
                                <p>
                                    <label for="social">MySpace:</label>
                                    <input type="text" id="myspace" name="myspace" value="<? print ($myspace); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <br>                                <em><? echo lang('str_edit_profile_call18');?> on MySpace.</em>
                                </p>
                                <p>
                                    <label for="social">Google plus:</label>
                                    <input type="text" id="gplus" name="gplus" value="<? print ($gplus); ?>" pattern="^[a-zA-Z0-9/ ,-_.:;&?]{20,150}$" />
                                    <br>                                <em><? echo lang('str_edit_profile_call18');?> on Google+.</em>
                                </p>
                                <center>
                                    <div class="centera" style=" width:500px; position:relative; margin-top:20px;">
                                        <input type="submit" value="<? echo lang('str_edit_profile_call26');?>" style = "height: 45px; width: auto padding: 5px 5px;"/>
                                    </div>
                                    <div class="formExtra" style="margin-left:60px; margin-right:60px;">
                                        <p><strong><? echo lang('str_edit_profile_call15');?> </strong> <? echo lang('str_edit_profile_call16');?> <span class="requiredField">*</span> <? echo lang('str_edit_profile_call17');?>.</p>
                                    </div>
                                </center>
                            </fieldset>
                        </form>
                    </div>
                    <div id="framecontact">
                        <form action="" method="POST" class="cleanForm" id="contactForm">
                            <fieldset>
                                <p>
                                    <label for="phone"><? echo lang('str_edit_profile_call19');?> <span class="requiredField">*</span></label>
                                    <input type="tel" id="phone" name="mobile" value="<? print ($mobile); ?>" pattern="^[0-9]{10,10}$" required/>
                                    <br>
                                    <em>10 <? echo lang('str_edit_profile_call20');?></em>
                                </p>

                                <p>
                                    <label for="email">Email: <span class="requiredField">*</span></label>
                                    <input type="email" id="email" name="email" value="<? print ($email); ?>" pattern="^[0-9a-zA-Z-,/@_.: ]{3,100}$" required/>
                                    <br>
                                    <em></em>
                                </p>

                                <p>
                                    <label for="add"><? echo lang('str_edit_profile_call21');?></label>
                                    <input type="text" id="add" name="add" value="<? print ($add); ?>" pattern="^[0-9a-zA-Z-,/ ]{3,100}$"/>
                                    <br>                                <em><? echo lang('str_edit_profile_call22');?></em>
                                </p>
                                
                                <p>
                                    <label for="city"><? echo lang('str_edit_profile_call23');?> <span class="requiredField">*</span></label>
                                    <input type="text" id="city" name="city" value="<? print ($city); ?>" pattern="^[a-zA-Z ]{3,20}$" required/>
                                    <br>                                <em></em>
                                </p>
                                <p>
                                    <label for="state"><? echo lang('str_edit_profile_call24');?></label>
                                    <input type="text" id="state" name="state" value="<? print ($state); ?>" pattern="^[a-zA-Z ]{3,20}$"/>
                                    <br>                                <em></em>
                                </p>
                                
                                <p>
                                    <label for="Country"><? echo lang('str_edit_profile_call25');?> <span class="requiredField">*</span></label>
                                    <input type="text" id="country" name="country" value="<? print ($country); ?>" pattern="^[a-zA-Z ]{3,20}$" required/>
                                    <input type="text" id="pincode" name="pincode" value="<? if($pincode!=0){print ($pincode);} ?>" pattern="^[0-9]{6,6}$"/>
                                    <br>                                <em><? echo lang('str_edit_profile_call25');?> & PinCode</em>
                                </p>
                                <center>
                                    <div class="centera" style=" width:500px; position:relative; margin-top:20px;">
                                        <input type="submit" value="<? echo lang('str_edit_profile_call26');?>" style = "height: 45px; width: auto padding: 5px 5px;"/>
                                    </div>
                                    <div class="formExtra" style="margin-left:60px; margin-right:60px;">
                                        <p><strong><? echo lang('str_edit_profile_call15');?> </strong> <? echo lang('str_edit_profile_call16');?> <span class="requiredField">*</span> <? echo lang('str_edit_profile_call17');?>.</p>
                                    </div>
                                <center>
                            </fieldset>
                        </form>
                    </div>
                    <div id="frameabout">
                        <form action="" method="POST" class="cleanForm" id="aboutForm">
                            <fieldset>
                                <p>
                                    <label for="fb"><? echo lang('str_edit_profile_call27');?> <span class="requiredField">*</span></label>
                                    <textarea cols="60" rows="14"  id="about" name="about"  pattern="^[a-zA-Z0-9/ ,-_.:;&?']{25,20000}$"  required><? print ($about); ?></textarea>
                                    <br>
                                    <em><? echo lang('str_edit_profile_call28');?></em>
                                </p>
                                <center>
                                    <div class="centera" style=" width:500px; position:relative; margin-top:20px;">
                                        <input type="submit" value="<? echo lang('str_edit_profile_call26');?>" style = "height: 45px; width: auto padding: 5px 5px;"/>
                                    </div>
                                    <div class="formExtra" style="margin-left:60px; margin-right:60px;">
                                        <p><strong><? echo lang('str_edit_profile_call15');?> </strong> <? echo lang('str_edit_profile_call16');?> <span class="requiredField">*</span> <? echo lang('str_edit_profile_call17');?>.</p>
                                    </div>
                                </center>
                            </fieldset>
                        </form>
                    </div>
                <? /*}*/ ?>
            </div> <!-- end pageContainer -->
        </section> 
    </body>
</html>