<?php include("../include/toplogin.php");

	if (isset($_GET['cnm'])) {
		$cnm=strtolower($_GET['cnm']);
	} else {
		header("location: clubs.php");
	}

	if (strlen($cnm) < 1 ) {
		header("location: clubs.php");
	}

	$title="Club Venues";
	$back="club_details.php?cnm=".$cnm;
	include("head.php");


	$get_sql ="SELECT * FROM tbl_clubs WHERE summary_name ='".$cnm."'";

	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

	$get_row = mysql_fetch_array($get_results);

	$name = $get_row['club_name'];
	$cid= $get_row['club_reference'];

		$get_sql_ven = "SELECT distinct tbl_venues.venue, tbl_venues.venue_id,tbl_club_venues.club_night_type,tbl_week_days.day, tbl_club_venues.club_night_time
				FROM tbl_club_venues
				INNER JOIN tbl_venues ON tbl_club_venues.venue_id = tbl_venues.venue_id
				INNER JOIN tbl_week_days ON tbl_club_venues.day_id = tbl_week_days.day_id
				WHERE club_reference ='".$cid."'
                ORDER BY tbl_club_venues.club_night_type";

		$get_results_ven = mysql_query($get_sql_ven,$cn) or die(mysql_error());

			print '<ul class="rounded"><li>'.$name.'</li></ul>';

		while ($get_row_ven = mysql_fetch_array($get_results_ven)) {
			$ven_name = $get_row_ven['venue'];
			$ven_type = $get_row_ven['club_night_type'];
			$ven_night = $get_row_ven['day'];
			$ven_time = $get_row_ven['club_night_time'];
			$quoted_name = "'".$ven_name."'";

			print '<ul class="rounded"><li>'.$ven_type.'</li>';
			print '<li><a href="venue_details.php?vnm='.$quoted_name.'" target="_webapp">'.$ven_name.'</a></li>';
			print '<li>'.$ven_night.'<small>'.str_replace(" ","",$ven_time).'</small></li></ul>';

		}


include("foot.php");
?>