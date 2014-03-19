<?
	$this->load->helper('language');

	$numTiles = (json_decode($_POST['json'])->numTiles);
	$thisYear = (json_decode($_POST['json'])->year);
	$thisMonth = (json_decode($_POST['json'])->month);

	if($numTiles > 0 )
		$streams = (json_decode($_POST['json'])->streams);

	switch($thisMonth) {
			case '01': $thisMonthName = "Jan"; break;
			case '02': $thisMonthName = "Feb"; break;
			case '03': $thisMonthName = "Mar"; break;
			case '04': $thisMonthName = "Apr"; break;
			case '05': $thisMonthName = "May"; break;
			case '06': $thisMonthName = "Jun"; break;
			case '07': $thisMonthName = "Jul"; break;
			case '08': $thisMonthName = "Aug"; break;
			case '09': $thisMonthName = "Sep"; break;
			case '10': $thisMonthName = "Oct"; break;
			case '11': $thisMonthName = "Nov"; break;
			case '12': $thisMonthName = "Dec"; break;
			default  : $thisMonthName = "Jan"; break;
	}

?>

<!-- Month -->
<div id="monthWidgetBox">
	<?print("<h1>$thisMonthName</h1>");?>
</div>

<div id="monthWidgetContainer">
	<ul>
		<li><h1><? $jan = lang('btn_month_jan'); if(isset($jan)) echo $jan; else echo "Jan";?></h1></li>
		<li><h1>February</h1></li>
		<li><h1>March</h1></li>
		<li><h1>April</h1></li>
		<li><h1>May</h1></li>
        <li><h1>June</h1></li>
        <li><h1>July</h1></li>
        <li><h1>August</h1></li>
        <li><h1>September</h1></li>
        <li><h1>October</h1></li>
        <li><h1>November</h1></li>
        <li><h1>December</h1></li>
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
