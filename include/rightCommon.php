<!-- -------------------------------------------------------------- -->
<!-- Header		 											   	    -->
<!-- -------------------------------------------------------------- -->

<div id="headerBox" class="box">
	<div class="boxTop">
		<ul id="tabMenu">
		<!--
		  <li class="posts selected"></li>
		  <li class="comments"></li>
		  <li class="category"></li>
		  <li class="famous"></li>
		  <li class="random"></li>
		-->
		  <li class="region" title="<? echo lang('btn_icon_region');?>" alt="<? echo lang('btn_icon_region');?>"></li>
		  <li class="blog" title="<? echo lang('btn_icon_blog');?>" alt="<? echo lang('btn_icon_blog');?>"></li>
		  <li class="search" title="<? echo lang('btn_icon_search');?>" alt="<? echo lang('btn_icon_search');?>"></li>
		  <li class="login" title="<? echo lang('btn_icon_login');?>" alt="<? echo lang('btn_icon_login');?>"></li>
		</ul>
	</div>

	<div class="boxBody">

		<div id="regionBox" class="parent">
			<ul id="enclosingRegions">
				<li><a class="regionIndia" title="India" alt="India" href="http://en.tommyjams.com/index"></a></li>
				<li><a class="regionChile" title="Chile" alt="Chile" href="http://es.tommyjams.com/index"></a></li>
			</ul>
		</div>

		<div id="blogBox" class="parent">
			<div id="enclosingBlogButton">
				<a href="/blog" target="_blank"><? echo lang('btn_txt_blog');?></a>
			</div>
		</div>

		<div id="searchBox" class="parent">
			<form action='' method='post' id='searchProfilesForm'>
				<input type='text1' name='profile' value='<? echo lang('btn_search_profiles');?>' id='searchTextBox' onfocus='blank(this)' onblur='unblank(this)'  />
				<input type='submit' value='<? echo lang('btn_search_go');?>'>
			<form/>
		</div>

		<div id="loginBox" class="parent">
			<div id="enclosingLoginButton">
			<!-- <table id = "loginTable">
				<tr>
					<td>
						<div class="menu" id="signupmenu">
							<a href="fbconnect.php?what=1">
								<div style="height:25px; font-size:0px; width:90px;  cursor:pointer; background:url(images/fbpro.png) no-repeat;" onClick="fbstuff('Promoter')">
								Promoter
								</div>
							</a>
						</div>
					</td>    
					<td>
						<div class="menu" id="signupmenu">
							<a href="fbconnect.php?what=2">
								<div style="height:25px;  font-size:0px; width:70px; cursor:pointer; background:url(images/fbart.png) no-repeat;" onClick="fbstuff('Artist')">
								Artist
								</div>
							</a>
						</div>
					</td>
				</tr>
			</table> -->
			<!-- Code for the new Facebook Login widget
			<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>
			-->
			<?
			/*$sessionArray = $this->session->all_userdata();
			if(isset($sessionArray['username']))
			{
				print( "<a class='loginWidgetRef' href='promoter/sessionlogout'>
							<img src='images/icons/fb_logout.jpg'/>
						</a>");
			}
			elseif(isset($sessionArray['username_artist'])) 
			{
				print( "<a class='loginWidgetRef' href='artist/sessionlogout'>
							<img src='images/icons/fb_logout.jpg'/>
						</a>");
			}
			else*/{
				/*old facebook login system
				<table>
					<tr>
						<td>
							<a class='loginWidgetRef' href='fbconnect.php?what=2'>
								<table>
									<tr>
									<td><img src='images/icons/facebook_icon_small.png'></img></td>
									<td style='background:#ffcc00;'><h3>Login</h3></td>
									</tr>
								</table>
							</a>
						</td>
					</tr>
					<tr><td><hr></td></tr>
					<tr>
						<td>
							<form id='radioButton'>
							<input name='group1' type='radio' value='artist' checked onClick='radioClicked(2)'/> Artist<br>
							<input name='group1' type='radio' value='promoter' onClick='radioClicked(1)'/> Promoter<br>
							<input name='group1' type='radio' value='venue' onClick='radioClicked(1)'/> Venue
							</form>
						</td>
					</tr>
					<tr>
						<td>
							<a class='loginWidgetRef' href='fbconnect.php?what=2'>
								<table>
									<tr>
									<td><img src='images/icons/facebook_icon_small.png'></img></td>
									<td style='background:#ffcc00;'><h3>Register</h3></td>
									</tr>
								</table>
							</a>
						</td>
					</tr>
				</table>*/ ?>
			<div class='fb-login-button' size='large' onlogin=facebookLoginCallback(); registration-url='<? print(base_url()); ?>fbconnect/registerMethod/noregister'></div>
			<?	
			}
			?>
			</div> <!--enclosingLoginButton-->
		</div>	<!--loginBox-->
	</div> <!--boxBody-->

	<!-- <div class="boxBottom"></div> -->
</div> <!--headerBox-->

<!-- -------------------------------------------------------------- -->
<!-- Right Sidebar 											   	    -->
<!-- -------------------------------------------------------------- -->
<div id="rightSidebarSmall">
    <!--<img src="images/icons/sidebar/icon_left_arrow.png">-->
</div>

<div id="rightSidebarBox">
    <ul>
        <li><a href="http://twitter.com/TommyJams" target="_blank" class="social-media-twitter"></a></li>
		<li><a href="http://www.facebook.com/tommyjams.live" target="_blank" class="social-media-facebook"></a></li>
		<li><a href="http://plus.google.com/117792283320356907836" target="_blank" class="social-media-googleplus"></a></li>
    </ul>
</div>

<div id="copyrightContainer">
	<p><? echo lang('str_copyright_2014');?></p>
</div>