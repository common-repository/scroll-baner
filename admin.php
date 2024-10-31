<?php

/* LANGUAGE VERSION */
switch (WPLANG) {
	case "pl_PL": $sLngFile="pl_pl.lng"; break;
	default: $sLngFile="en_us.lng"; break;
}
require_once dirname(__FILE__)."/".$sLngFile;


/* SUBMENU PLUGINS */
function scrollbaner_load_menu() { add_submenu_page("plugins.php",__(SCRBAN_SUBTITLE),__(SCRBAN_SUBNAME),"manage_options","scrollbaner-config","scrollbaner_conf"); }
function scrollbaner_admin_menu() { scrollbaner_load_menu(); }
add_action("admin_menu","scrollbaner_admin_menu");


/* CONFIG FORM */
function scrollbaner_conf() {
	function FileDelete($file) { return ($file && file_exists("../".$file))? unlink("../".$file) : false; }
	
	$sGlobHost=get_option("siteurl");

/* ACTIONS */
	if ($_POST["act"]=="edy") {
		update_option("scrollbaner_idcont",$_POST["scrollbaner_idcont"]);
		update_option("scrollbaner_height",$_POST["scrollbaner_height"]);
		update_option("scrollbaner_delay",$_POST["scrollbaner_delay"]);
		
		for($i=1;$i<=SCROLLBANER_MAX_LAYERS;$i++) {
			$name="scrollbaner_scrfile".$i;
			$src_nam=$_FILES[$name]["name"];
			$src_tmp=$_FILES[$name]["tmp_name"];
			$x=explode(".",$src_nam);
			$ext=$x[count($x)-1];
			$filename=SCROLLBANER_PATH."/scrollbaner".$i.".".$ext;
			$delay="scrollbaner_delay".$i;
			$bDel=$_POST["scrollbaner_delete".$i];

			if (!$bDel && is_uploaded_file($src_tmp)) {
				FileDelete(get_option($name));
				move_uploaded_file($src_tmp,"../".$filename);
				update_option($name,$filename);
			}

			if ($bDel) {
				FileDelete(get_option($name));
				update_option($name,"");
			}

			update_option($delay,$_POST[$delay]);
		}

		echo "<div class=\"updated below-h2\" id=\"message\"><p><strong>".SCRBAN_MESSAGE."</strong></p></div>";
	}

	echo "<h1>".SCRBAN_SUBTITLE."</h1><form action=\"\" method=\"post\" enctype=\"multipart/form-data\"><input type=\"hidden\" name=\"act\" value=\"edy\" /><table>";

// NAME, HEIGHT & DELAY OF CONTAINER
	echo "<tr><td>".SCRBAN_NAME1."</td><td><input type=\"text\" name=\"scrollbaner_idcont\" size=\"50\" value=\"".get_option("scrollbaner_idcont")."\" />".SCRBAN_DESC1."</td></tr>".
		"<tr><td>".SCRBAN_NAME2."</td><td><input type=\"text\" name=\"scrollbaner_height\" size=\"20\" value=\"".get_option("scrollbaner_height")."\" />".SCRBAN_DESC2."</td></tr>".
		"<tr><td>".SCRBAN_NAME3."</td><td><input type=\"text\" name=\"scrollbaner_delay\" size=\"20\" value=\"".get_option("scrollbaner_delay")."\" />".SCRBAN_DESC3."</td></tr>";

// LAYERS - FILES & SPEED
	echo "<tr><td colspan=2><h3>".SCRBAN_NAME4."</h3>".SCRBAN_DESC4."</td></tr>";
	for($i=1;$i<=SCROLLBANER_MAX_LAYERS;$i++) {
		$name=get_option("scrollbaner_scrfile".$i);
		$prev=""; $dele="";
		if ($name && file_exists("../".$name)) {
			$prev="<a href=\"#\" onclick=\"document.getElementById('ScrollBanerTest').src='".$sGlobHost."/".$name."'; return false;\"><img src=\"".SCROLLBANER_PLUGIN_URL."prev.png\" alt=\"".SCRBAN_PREV."\" title=\"".SCRBAN_PREV."\" /></a>";
			$dele="<tr><td></td><td><label><input type=\"checkbox\" name=\"scrollbaner_delete".$i."\">".SCRBAN_NAME7."</label></td><tr>";
		}

		echo "<tr><td>".SCRBAN_NAME5.$i.":</td><td><input type=\"file\" name=\"scrollbaner_scrfile".$i."\" size=\"50\" /> ".$prev."</td></tr>".
			"<tr><td>".SCRBAN_NAME6."</td><td><input type=\"text\" name=\"scrollbaner_delay".$i."\" size=\"20\" value=\"".get_option("scrollbaner_delay".$i)."\" />".SCRBAN_DESC6."</td></tr>".$dele.
			"<tr><td><br /></td></tr>";
	}

	echo "</table><p class=\"submit\"><input type=\"submit\" name=\"submit\" value=\"".SCRBAN_SUBMIT."\" /></p></form>".
		"<div style=\"width:100%; overflow:auto;\"><img id=\"ScrollBanerTest\" alt=\"\" style=\"border:#aaa 1px solid;\" /></div>";

?>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="P63S8VY4Q3JMS">
<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - Donate!">
<img alt="" border="0" src="https://www.paypalobjects.com/pl_PL/i/scr/pixel.gif" width="1" height="1">
</form>

<?php
}