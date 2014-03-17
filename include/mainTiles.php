<div style="height: 30%; width:100%; top:55%; position:relative;">

	<!--uncomment these for headers for the boxes
		<div style="margin-left:4%; margin-right:4%; height:100%; width:28%; float:left;">
		<div class="head">
			<h1>Artists</h1>
		</div>-->
		<div class="boxgrid captionfull">
			<img src="images/artist_tile.png"/ style="width:100%; height:100%;">
			<div class="titleSlider">
				<h1 style="text-align:center;"><? echo lang('str_artist_title');?></h1>
			</div>
			<div class="cover boxcaption" style="top:100%;">
				<a href="#" onClick="popup('loginPopupBox')">
					<!--<h1 style="text-align:center;">Artists</h1>-->
					<p style="padding: 3px 10px; text-align:center; font-size:16px;">
						<? echo lang('str_artist_call1');?>
						<br/>
						<? echo lang('str_artist_call2');?>
					</p>
				</a>
			</div>		
		</div>
	<!--</div>-->

	<!--<div style="margin-right:4%; height:100%; width:28%; float:left;">
		<div class="head">
			<h1>Venues</h1>
		</div>-->
		<div class="boxgrid captionfull" style="margin:0px;">
			<img src="images/venue_tile.png" style="width:100%; height:100%;"/>
			<div class="titleSlider">
				<h1 style="text-align:center;"><? echo lang('str_venue_title');?></h1>
			</div>
			<div class="cover boxcaption" style="top:100%">
				<a href="#" onClick="popup('loginPopupBox')">
					<!--<h1 style="text-align:center;">Venues</h1>-->
					<p style="padding: 3px 10px; text-align:center; font-size:16px;">
						<? echo lang('str_venue_call1');?>
						<br/>
						<? echo lang('str_venue_call2');?>
					</p>
				</a>
			</div>
		</div>
	<!--</div>-->

	<!--<div style="margin-right:4%; height:100%; width:28%; float:left;">
		<div class="head">
			<h1>Fans</h1>
		</div>-->
		<div class="boxgrid captionfull">
			<img src="images/fan_tile.png" style="width:100%; height:100%;"/>
			<div class="titleSlider">
				<h1 style="text-align:center;"><? echo lang('str_fans_title');?></h1>
			</div>
			<div class="cover boxcaption" style="top:100%;">
				<a href="/blog">
					<!--<h1 style="text-align:center;">Fans</h1>-->
					<p style="padding: 3px 10px; text-align:center; font-size:16px;">
						<? echo lang('str_fans_call1');?>
						<br/>
						<? echo lang('str_fans_call2');?>
					</p>
				</a>
			</div>
		</div>
	<!--</div>-->

</div>