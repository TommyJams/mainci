<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Reaction</title>
<link href="style/profile.css" rel="stylesheet" type="text/css" />
<link href="style/edit.css" rel="stylesheet" type="text/css" />
</head>

<body>
	<span class="dibsList" style="width:96% padding-left:2% padding-right:2%">
		<?
        if($dibs_exist == 1)
        foreach($dibList as $row){ ?>
    	<?
    		$artist_name=$row[0];
           	$artist_id=$row[1]; 
			print("<div style='width:50%; margin-top: 10px; height:18px; text-align: center; float:left;'><a href='javascript:;' onClick=showProfile('$artist_id'); target='_top' class='whiteHoverRef' style='font-size: 16px;'>$artist_name</a></div>"); 
		?>
				<div style="width:45%; float:left; padding-top:10px; padding-right:5px; height:33px;">
					<a href='javascript:;' name="accept" id="accept" style="width: 45%; background:#B4F62F; float:left;"  onClick="showDibReaction('<?print("$linker");?>', '<?print("$artist_id");?>', 1);"><? echo lang('btn_dib_accept'); ?></a>
					<a href='javascript:;' name="reject" id="reject" style="width: 45%; background:#FF3C35; float:right;" onClick="showDibReaction('<?print("$linker");?>', '<?print("$artist_id");?>', 0);"><? echo lang('btn_dib_reject'); ?></a>
				</div>           
		<?
		} 

		if($dibs_exist == 1)
		{
		?>
			<div style="width:100%; height: 40px; margin-top: 10px; text-align: center; float:left;">
				<input type="submit" value="<?echo lang('btn_recommend_artist');?>" name="recommendartist" style="width: 200px; color:#fff; background:#000; float:center;" onClick="recommendArtist('<? print("$linker"); ?>')">
			</div>
		<?
		}
		?>
    </span>
</body>
</html>