<?php
	include("../include/toplogin.php");
	if (isset($_GET['page'])) {
		$page=$_GET['page'];
	}

	$title="homepage";

	$get_sql = "SELECT * from tbl_page_layout WHERE page_id = '".$page."' ORDER BY element_sequence";

	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

	while ($get_row = mysql_fetch_array($get_results)) {
		$type = $get_row['element_type'];
		$text = $get_row['element_text'];
		$link = $get_row['element_link'];
		switch($type) {
		case "titlebar":
			$title=$text;
			break;
		case "about":
			$back=$link;
			include("head4.php");
			break;
		case "back":
			$back=$link;
			include("head4.php");
			break;
		case "roundedlist":
			print '<ul class="rounded"><li><a href="'.$link.'" target="_webapp">'.$text.'</a></li></ul>';
			break;
		}
	}

?>

<?php
include("foot.php");
?>