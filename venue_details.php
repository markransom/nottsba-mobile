<?php
	$title="Venue Details";
	$back="Venues";
	include("head.php");


	$vnm = $_GET['vnm'];

	if (strlen($vnm) < 1 ) {
		header("location: venues.php");
	}

	$get_sql ="SELECT * FROM tbl_venues WHERE venue =$vnm";

	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

	$get_row = mysql_fetch_array($get_results);

	$name = $get_row['venue'];
	$add1 = $get_row['venue_address_1'];
	$phone = $get_row['venue_telephone'];
	$website = $get_row['venue_website'];
	$map = $get_row['venue_map'];
	$venue_id = $get_row['venue_id'];

	$get_sql ="SELECT * FROM tbl_club_venues WHERE venue_id =$venue_id";

	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());
	$num_clubs = mysql_num_rows($get_results);


	print '<ul class="rounded"><li>'.$name.'</li></ul>';

	print '<ul class="rounded">';
	if (strlen($add1) > 0) {
		print '<li>'.str_replace(", ","<br />",$add1).'</li>';
	}

	if (strlen($phone) > 0) {
		print '<li><a href="tel:'.$phone.'">Tel. '.$phone.'</a></li>';
	}
	print '</ul>';

	if (strlen($website) > 0) {
		print '<ul class="rounded"><li class="forward"><a href="'.$website.'" target="_blank">Venue Website</a></li></ul>';
	}

	$quoted_venue="'".$name."'";
	print '<ul class="rounded"><li><a href="clubs.php?vnm='.$quoted_venue.'" target="_webapp">Associated Clubs</a><small class="counter">'.$num_clubs.'</small></li></ul>';

	print '</ul>';


include("foot.php");
?>