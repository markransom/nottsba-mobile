<?php
	$title="Stringer Details";
	$back="Stringers";
	include("head.php");

	if (isset($_GET['snm'])) {
		$snm=$_GET['snm'];
	} else {
		header("location: stringers.php");
	}

	if (strlen($snm) < 1 ) {
		header("location: stringers.php");
	}

		$get_sql ="SELECT * FROM tbl_stringers WHERE stringer_name = $snm";

		$get_results = mysql_query($get_sql,$cn) or die(mysql_error());
		$get_row = mysql_fetch_array($get_results);

		$area = $get_row['stringer_area'];
		$name = $get_row['stringer_name'];
		$contact = $get_row['stringer_contact'];
		$email = $get_row['stringer_email'];
		$strings = $get_row['stringer_strings'];
		$price = $get_row['stringer_price'];
		$time = $get_row['stringer_time'];
		$website = $get_row['stringer_website'];
		$background = $get_row['stringer_background'];

		print '<ul class="rounded"><li>'.$name.'</li></ul>';
		print '<ul class="rounded"><li>'.$area.'</li>';
		print '<li>'.str_replace(" or ","</li><li>",$contact).'</li>';

		if (strlen($email) > 0) {
			print '<li>'.$email.'</li>';
		}
		if (strlen($strings) > 0) {
			print '<li>'.$strings.'</li>';
		}
		if (strlen($price) > 0) {
			print '<li>'.$price.'</li>';
		}
		if (strlen($time) > 0) {
			print '<li>'.$time.'</li>';
		}
		if (strlen($website) > 0) {
			print '<li>'.$website.'</li>';
		}
		if (strlen($background) > 0) {
			print '<li>'.$background.'</li>';
		}
			print '</ul>';


include("foot.php");
?>