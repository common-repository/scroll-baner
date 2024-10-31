<?php
/**
 * @package scrollbaner
 */
/*
Plugin Name: Scroll Baner
Plugin URI: http://blog.ad3.eu/scroll_baner.html
Description: Sleek, multi-layered, animated banner for use in the page header.
Version: 1.0
Author: Andrzej 'andy' Kidaj
Author URI: http://ad3.eu
License: GPLv2 or later
*/

define("SCROLLBANER_VERSION","1.0");
define("SCROLLBANER_PLUGIN_URL",plugin_dir_url(__FILE__));
define("SCROLLBANER_MAX_LAYERS",5);
define("SCROLLBANER_PATH","wp-content");

/* BACKEND */
if (is_admin()) require_once dirname(__FILE__)."/admin.php";


/* FRONTEND */
function ScrollBaner() { wp_enqueue_script("scrollbaner",plugins_url("/scrollbaner.js",__FILE__)); }
add_action("wp_footer","ScrollBaner");


/* HEADER */
function ScrollBanerHeader() {
	$sID=get_option("scrollbaner_idcont");
	$sHeight=get_option("scrollbaner_height");
	$sDelay=get_option("scrollbaner_delay");
	
	$sStyl="#".$sID." {position:relative; width:100%; height:".$sHeight."px;}\n";
	$sJS="";
	for($i=1;$i<=SCROLLBANER_MAX_LAYERS;$i++) {	
		$sName=get_option("scrollbaner_scrfile".$i);
		$sDel=get_option("scrollbaner_delay".$i);

		if ($sName && file_exists($sName)) {
			$file=imagecreatefrompng($sName);
			$sWidth=(isset($file))? imagesx($file) : 0;
			$sStyl.="#".$sID.$i." {position:absolute; left:0; top:0; width:100%; height:100%; background:transparent url(".$sName.");}\n";
			if ($sJS) $sJS.=",";
			$sJS.="new Array(\"".$sID.$i."\",0,".$sWidth.",".($sDel/100).")";
		}
	}
	echo "<style type=\"text/css\">\n".$sStyl."</style>\n".
		"<script type=\"text/javascript\">\nvar aScrBanTab=new Array(".$sJS.");\nvar cScrBanDel=".$sDelay.";\nvar cScrBanNam=\"".$sID."\";\n</script>\n";
}

add_action("wp_head","ScrollBanerHeader");