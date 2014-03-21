<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>TommyJams - <? echo lang('str_help_title');?></title>

    <link href="/style/style.css" rel="stylesheet" type="text/css" />

    <link href="/style/edit.css" rel="stylesheet" type="text/css" />

    <link href="/style/supersized/supersized.css" rel="stylesheet" type="text/css" />

    <script type="text/javascript" src="/script/jquery.min.js" ></script>

    <script type="text/javascript" src="/script/jquery.supersized.min.js"></script>

    <script type="text/javascript" src="/script/main.js"></script> <!--contains document ready function-->

    <script> 

    function contactHelpCallback(a) 
    {
        $("#loading-indicator").show();      
        if(a == 1)
        {
            alert('<? echo lang("str_help_call1");?>');
            window.location = "/help"; 
        }
        else
        {
	   	   alert('<? echo lang("str_help_call2");?>');
		   window.location = "/help";  	
  	    }
    }
    
    function contactHelp() 
    {
      	$("#loading-indicator").show();      
        $.post('links/contactFunc',$('#help-form').serialize(),contactHelpCallback,'json');
    }

	</script>
</head>

<body>
 
    <?
	include("include/leftCommon.php");
	?>

	<div id="main-container">
<div id="lefty" style="display:none;">
        </div>
        <div id="inner-container">

            <div class="head">

                <h1><? echo lang('str_help_title');?></h1>

            </div>

            <div id="textContainer">
				<p><? echo lang('str_help_call3');?> </p>
                <form action="" method="POST" id="help-form" name="help-form" style="width:50%; margin-top:20px; left:50%; margin-left:25%;">
                    <table style="border:0px; width:100%;">
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <!--Your name-->
                                <input type="text" id="cf_name" value="<? echo lang('str_help_call4');?>" name="cf_name" style="width:50%; margin-top:10px;"/>
                            </td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <!--Your e-mail-->
                                <input type="text" id="cf_email" value="<? echo lang('str_help_call5');?>" name="cf_email" style="width:50%; margin-top:10px;"/>
                            </td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <!--Your Requirement-->
                                <textarea name="cf_message" style="height:200px; width:100%; margin-top:10px; font-family: Arial; font-size: 14px;"><? echo lang('str_help_call6');?></textarea>
                            </td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <input type="submit" value="<? echo lang('str_help_call7');?>" id="help-send" name="help-send" class="button" style="width:auto; margin: 10px auto;"/>
                            </td>
                        </tr>
                    </table>
                </form>

                <p>
					<br>
                    <h1><? echo lang('str_help_call8');?></h1>
					<br>
					<b><? echo lang('str_help_call9');?></b>
					<br>
					   <b>TommyJams:</b> <? echo lang('str_help_call10');?> 
					<br>
					<br>
					<b><? echo lang('str_help_call11');?></b>
					<br>
					   <b>TommyJams:</b> <? echo lang('str_help_call12');?>
					<br>
					<br>
					<b><? echo lang('str_help_call13');?></b>
					<br>
					   <b>TommyJams:</b> <? echo lang('str_help_call14');?> 
					<br>
					<br>
					<b><? echo lang('str_help_call15');?></b>
					<br>
					   <b>TommyJams:</b> <? echo lang('str_help_call16');?> 
					<br>
					<br>
					<b><? echo lang('str_help_call17');?></b>
					<br>
					   <b>TommyJams:</b> <? echo lang('str_help_call18');?>
					<br>
					<br>
					<br>
				</p>
            </div>
        
        </div>

    </div> <!--main-container-->

	<?
	include("include/rightCommon.php");
	?>    

</body>

<script> 
    $("#help-form").bind("submit", function(e)
    {
        e.preventDefault();
        contactHelp();
    });

</script>

</html>