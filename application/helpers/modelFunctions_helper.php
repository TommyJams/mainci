<?php

    /**************************************************************/
    /**************************************************************/

 	function IsYoutubeUrl($url)
    {
        if(!preg_match("#^https?://(?:www\.)?youtube.com.*watch\?v=([a-zA-Z0-9\-_]+)#", $url)) return(false);
        else return(true);
    }

    /**************************************************************/
    /**************************************************************/

    function IsSocialUrl($url)
    {
        if(preg_match("#^https?://(?:www\.)?facebook.com#", $url))
            $i=1;
        else if(preg_match("#^https?://(?:www\.)?twitter.com#", $url))
            $i=2;
        else if(preg_match("#^https?://(?:www\.)?soundcloud.com#", $url))
            $i=3;
        else if(preg_match("#^https?://(?:www\.)?bandcamp.com#", $url))
            $i=4;
        else if(filter_var($url, FILTER_VALIDATE_URL))
            $i=5;
        else if(!filter_var($url, FILTER_VALIDATE_URL))
            $i=0;

        return($i);
    }

    /**************************************************************/
    /**************************************************************/

    /*  function checkURL($value) 
    {
        $urlregex = new RegExp("^(http|https|ftp)\://([a-zA-Z0-9\.\-]+(\:[a-zA-Z0-9\.&amp;%\$\-]+)*@)*((25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9])\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[1-9]|0)\.(25[0-5]|2[0-4][0-9]|[0-1]{1}[0-9]{2}|[1-9]{1}[0-9]{1}|[0-9])|([a-zA-Z0-9\-]+\.)*[a-zA-Z0-9\-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(\:[0-9]+)*(/($|[a-zA-Z0-9\.\,\?\'\\\+&amp;%\$#\=~_\-]+))*$");
        if ($urlregex.test($value)) {
            return (true);
        }
        return (false);
    }*/

    /**************************************************************/
    /**************************************************************/

?>