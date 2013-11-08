<?php

if (is_readable(FCPATH . 'config.local.php'))
{
    include_once(FCPATH . 'config.local.php');
}


 $config['appId'] = FACEBOOK_ROADSHOWS_APP_ID;
 $config['secret'] = FACEBOOK_ROADSHOWS_APP_SECRET;
?>