<?
	switch($thisMonth) {
			case '01': $thisMonthName = lang('btn_month_jan'); break;
			case '02': $thisMonthName = lang('btn_month_feb'); break;
			case '03': $thisMonthName = lang('btn_month_mar'); break;
			case '04': $thisMonthName = lang('btn_month_apr'); break;
			case '05': $thisMonthName = lang('btn_month_may'); break;
			case '06': $thisMonthName = lang('btn_month_jun'); break;
			case '07': $thisMonthName = lang('btn_month_jul'); break;
			case '08': $thisMonthName = lang('btn_month_aug'); break;
			case '09': $thisMonthName = lang('btn_month_sep'); break;
			case '10': $thisMonthName = lang('btn_month_oct'); break;
			case '11': $thisMonthName = lang('btn_month_nov'); break;
			case '12': $thisMonthName = lang('btn_month_dec'); break;
			default:   $thisMonthName = lang('btn_month_jan'); break;
	}
?>

<!-- Month -->
<div id="monthWidgetBox">
	<?print("<h1>$thisMonthName</h1>");?>
</div>

<div id="monthWidgetContainer">
	<ul>
		<li><h1><? echo lang('btn_month_jan'); ?></h1></li>
		<li><h1><? echo lang('btn_month_feb'); ?></h1></li>
		<li><h1><? echo lang('btn_month_mar'); ?></h1></li>
		<li><h1><? echo lang('btn_month_apr'); ?></h1></li>
		<li><h1><? echo lang('btn_month_may'); ?></h1></li>
		<li><h1><? echo lang('btn_month_jun'); ?></h1></li>
		<li><h1><? echo lang('btn_month_jul'); ?></h1></li>
		<li><h1><? echo lang('btn_month_aug'); ?></h1></li>
		<li><h1><? echo lang('btn_month_sep'); ?></h1></li>
		<li><h1><? echo lang('btn_month_oct'); ?></h1></li>
		<li><h1><? echo lang('btn_month_nov'); ?></h1></li>
		<li><h1><? echo lang('btn_month_dec'); ?></h1></li>
	</ul>
</div>

<!-- Year -->
<div id="yearWidgetBox">
	<?print("<h1>$thisYear</h1>");?>
</div>

<div id="yearWidgetContainer">
	<ul>
		<li><h1>2013</h1></li>
		<li><h1>2014</h1></li>
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