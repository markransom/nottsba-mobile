<?php
	$title="Venues";
	$back="Index";
	include("head.php");


        print '<ul class="rounded">';

		$get_sql ="SELECT * FROM tbl_venues ORDER BY venue";

		$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

		while ($get_row = mysql_fetch_array($get_results)) {

			$area = $get_row['venue_area'];
			$name = $get_row['venue'];
			$vid = $get_row['venue_id'];

			print '<li><a href="venue_details.php?vid='.$vid.'" target="_webapp">'.$name.'</a></li>';

		}

		print "</ul>";


include("foot.php");
?>