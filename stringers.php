<?php
	$title="Stringers";
	$back="Index";
	include("head.php");


		$get_sql ="SELECT * FROM tbl_stringers ORDER BY stringer_name";

		$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

		while ($get_row = mysql_fetch_array($get_results)) {

			$area = $get_row['stringer_area'];
			$name = $get_row['stringer_name'];
			$contact = $get_row['stringer_contact'];
			$email = $get_row['stringer_email'];
			$strings = $get_row['stringer_strings'];
			$price = $get_row['stringer_price'];
			$time = $get_row['stringer_time'];
			$website = $get_row['stringer_website'];
			$background = $get_row['stringer_background'];
			$quoted_name = "'".$name."'";

			print '<ul class="rounded"><li><a href="stringer_details.php?snm='.$quoted_name.'" target="_webapp">'.$name.'</a></li>';
			print '<li>'.$area.'</li></ul>';

			}


include("foot.php");
?>

