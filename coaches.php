<?php
	$title="Coaches";
	$back="Index";
	include("head.php");


		$get_sql ="SELECT * FROM tbl_coaches ORDER BY coach_area";

		$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

		while ($get_row = mysql_fetch_array($get_results)) {

			$area = $get_row['coach_area'];
			$name = $get_row['coach_name'];
			$contact = $get_row['coach_contact'];

			print '<ul class="rounded"><li>'.$area.' - '.$name.'<br />'.$contact.'</li></ul>';

		}


include("foot.php");
?>