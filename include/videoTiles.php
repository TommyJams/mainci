<?
	$numTiles = (json_decode($_POST['json'])->numTiles);
	$thisYear = (json_decode($_POST['json'])->year);
	$thisMonth = (json_decode($_POST['json'])->month);

	if($numTiles > 0 )
		$streams = (json_decode($_POST['json'])->streams);

	$monthNamesObject = (json_decode($_POST['json'])->langStrings);
	foreach ($monthNamesObject as $row) {
		$monthNames[] = $row;
	}

	switch($thisMonth) {
			case '01': $thisMonthName = $monthNames[0]; break;
			case '02': $thisMonthName = $monthNames[1]; break;
			case '03': $thisMonthName = $monthNames[2]; break;
			case '04': $thisMonthName = $monthNames[3]; break;
			case '05': $thisMonthName = $monthNames[4]; break;
			case '06': $thisMonthName = $monthNames[5]; break;
			case '07': $thisMonthName = $monthNames[6]; break;
			case '08': $thisMonthName = $monthNames[7]; break;
			case '09': $thisMonthName = $monthNames[8]; break;
			case '10': $thisMonthName = $monthNames[9]; break;
			case '11': $thisMonthName = $monthNames[10]; break;
			case '12': $thisMonthName = $monthNames[11]; break;
			default  : $thisMonthName = $monthNames[12]; break;
	}
?>

<!-- Month -->
<div id="monthWidgetBox">
	<?print("<h1>$thisMonthName</h1>");?>
</div>

<div id="monthWidgetContainer">
	<ul>
		<li><h1><? echo $monthNames[0];?></h1></li>
		<li><h1><? echo $monthNames[1];?></h1></li>
		<li><h1><? echo $monthNames[2];?></h1></li>
		<li><h1><? echo $monthNames[3];?></h1></li>
		<li><h1><? echo $monthNames[4];?></h1></li>
        <li><h1><? echo $monthNames[5];?></h1></li>
        <li><h1><? echo $monthNames[6];?></h1></li>
        <li><h1><? echo $monthNames[7];?></h1></li>
        <li><h1><? echo $monthNames[8];?></h1></li>
        <li><h1><? echo $monthNames[9];?></h1></li>
        <li><h1><? echo $monthNames[10];?></h1></li>
        <li><h1><? echo $monthNames[11];?></h1></li>
	</ul>
</div>

<!-- Video list -->
<div id="imageBoxContainer">

	<ul class="no-list image-list image-list-carousel">

	<?	
		if($numTiles)
		{
			foreach($streams as $row)
			{
				$epName = $row[0]; $epImage = $row[1]; $epAudio = $row[2]; $epDate = $row[3]; $epDesc = $row[4];
				if($numTiles <= 4)
				{
					print("
					<li class='bigListSize'>
						<div id='imageBox'>
							<a href='$epAudio' class='preloader overlay-video fancybox-audio-mixcloud'>
								<img src='/image/radioone/artists/$epImage' alt=''/>
								<span></span>
							</a>
							<p class='imageBoxCaption'>$epName</p>
							<div class='imageDetails'>$epDate<br>$epDesc</div>
						</div>
					</li>");
				}
				else
				{
					print("
					<li class='smallListSize'>
						<div id='imageBox'>
							<a href='$epAudio' class='preloader overlay-video fancybox-audio-mixcloud'>
								<img src='/image/radioone/artists/$epImage' alt=''/>
								<span></span>
							</a>
							<p class='imageBoxCaption'>$epName</p>
							<div class='imageDetails'>$epDate<br>$epDesc</div>
						</div>
					</li>");
				}
			}
		}
		else
		{
			print("
			<li class='bigListSize'>
				<div id='imageBox' style='padding-bottom: 10px'>Sorry, no listing found!</div>
			</li>");
		}

	?>

	</ul>

</div>

<!-- Radio One Logo-->
<a href="http://www.facebook.com/pages/ONE-Bengaluru-ONE-Music/128804727178554" target="_blank" id="radioOneLogo">

	<img src="/image/icon/radioonelogo.png" width="100%">

</a>

<script type="text/javascript">

	initMonthWidget();
	initCaptions();
	initFancyBox();
	$("#loading-indicator").hide();
	
</script>
