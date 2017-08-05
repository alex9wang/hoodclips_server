<?php
 //footer logo
		  $get_footer_logo = mysql_fetch_array(mysql_query("select value from pm_config where id = '120' "));
		 $footer_logo = $get_footer_logo['value'];
		 $smarty->assign('footer_logo', $footer_logo);

?>