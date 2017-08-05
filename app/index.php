<?php

$ua = strtolower($_SERVER['HTTP_USER_AGENT']);
if(stripos($ua,'android') !== false)
{
  header("Location: https://play.google.com/store/apps/details?id=com.hoodclips.urban");
  die();
}

if(stripos($ua,'iPhone') !== false )
{
  header("Location: https://itunes.apple.com/lc/app/hoodclips/id1013596666?mt=8");
  die();
}
if(stripos($ua,'iPad') !== false )
{
  header("Location: https://itunes.apple.com/lc/app/hoodclips/id1013596666?mt=8");
  die();
}

header("Location: http://www.hoodclips.com");

 ?>
