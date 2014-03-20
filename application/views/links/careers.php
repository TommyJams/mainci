<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <title>TommyJams - <? echo lang('str_careers_title');?></title>

    <link href="/style/style.css" rel="stylesheet" type="text/css" />
    
    <link href="/style/edit.css" rel="stylesheet" type="text/css" />

    <link href="/style/supersized/supersized.css" rel="stylesheet" type="text/css" />
	
    <script type="text/javascript" src="/script/jquery.min.js" ></script>

    <script type="text/javascript" src="/script/jquery.supersized.min.js"></script>

    <script type="text/javascript" src="/script/main.js"></script> <!--contains document ready function-->

    <script type="text/javascript">
    
    function careersCallback(a) 
    {
        $("#loading-indicator").show();      
        if(a == 1)
        {
            alert('<? echo lang("str_careers_call6");?>');
            window.location = "/careers"; 
        }
        else
        {
           alert('<? echo lang("str_careers_call7");?>');
           window.location = "/careers";       
        }
    }
    
    function careers() 
    {
        $("#loading-indicator").show();      
        $.post('links/contactFunc',$('#careers-form').serialize(),careersCallback,'json');
    }

    </script>
</head>

<body>

    <?
	include("include/leftCommon.php");
	?>

	<div id="main-container">

        <div id="inner-container">

            <div class="head">

                <h1><? echo lang('str_careers_title');?></h1>

            </div>

            <div id="textContainer">
                
                <p><? echo lang('str_careers_call1');?></p>
                
                <form action="" id="careers-form" name="careers-form" method="post" style="width:50%; margin-top:20px; left:50%; margin-left:25%;">
                    <table style="border:0px; width:100%;">
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <!--Your name-->
                                <input type="text" value="<? echo lang('str_careers_call2');?>" name="cf_name" style="width:50%; margin-top:10px;">
                            </td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <!--Your e-mail-->
                                <input type="text" value="<? echo lang('str_careers_call3');?>" name="cf_email" style="width:50%; margin-top:10px;">
                            </td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <!--Your introduction-->
                                <textarea name="cf_message" style="height:200px; width:100%; margin-top:10px; font-family: Arial; font-size: 14px;"><? echo lang('str_careers_call4');?></textarea>
                            </td>
                        </tr>
                        <tr style="width:100%;">
                            <td style="width:100%;">
                                <input type="submit" value="<? echo lang('str_careers_call5');?>" style="width:auto; margin: 10px auto;">
                            </td>
                        </tr>
                    </table>
                </form>

            </div>
        
        </div>

    </div> <!--main-container-->

	<?
	include("include/rightCommon.php");
	?>

</body>

<script> 
    $("#careers-form").bind("submit", function(e)
    {
        e.preventDefault();
        careers();
    });

</script>

</html>