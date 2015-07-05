<iframe src="https://www.facebook.com/plugins/registration?
		client_id=<?php echo $appId;?>&
        locale=<?php echo $localeId;?>&
		redirect_uri=<? print(base_url()); ?>fbconnect/registerMethod/fbregistered&
		fb_only=true&fb_register=true&fields=<?php echo $fb_fields;?>"
	scrolling="auto"
	frameborder="no"
	style="border:none"
	allowTransparency="true"
	width="100%"
	height="330">

</iframe>


<input type="text" id="fbname" name="fbname" style="width:200px;" value=""/>

<a href="<? print(base_url()); ?>fbconnect/registerMethod/fbregistered&fb_register=true&fields=<?php echo $fb_fields;?>">SUBMIT</a>