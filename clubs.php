<?php

		$where="";
		$header="";
		if (isset($_GET['lid'])) {
			$lid=$_GET['lid'];
			$where=$where." tbl_clubs.club_league = ".$lid." and ";
			$subset="league";
			$header='<ul class="rounded"><li>'.str_replace("'","",$lid).'</li></ul>';
			$back="leagues";
		}
		if (isset($_GET['vnm'])) {
			$vnm=$_GET['vnm'];
			$where=$where." tbl_venues.venue = ".$vnm." and ";
			$subset="venue_name";
			$header='<ul class="rounded"><li>'.str_replace("'","",$vnm).'</li></ul>';
			$back="venue_details.php?vnm='".$vnm."'";
		}
		if (isset($_GET['vid'])) {
			$vid=$_GET['vid'];
			$back="venue_details.php?vid='".$vid."'";
		}

	$title="Clubs";
	include("head.php");

		if (isset($_GET['vid'])) {
			$get_sql = "SELECT * FROM tbl_venues where venue_id = $vid";
			$get_results = mysql_query($get_sql,$cn) or die(mysql_error());
			$get_row = mysql_fetch_array($get_results);
			$vnm = "'".$get_row['venue']."'";

			$where=$where." tbl_venues.venue = $vnm and ";
			$subset="venue_name";
			$header='<ul class="rounded"><li>'.str_replace("'","",$vnm).'</li></ul>';
		}
		if (strlen($where)>0) {
			$where=" WHERE ".substr($where, 0, -5);
		}



		print $header;
		print '<ul class="rounded">';

		$get_sql = "SELECT distinct tbl_clubs.club_name, tbl_clubs.summary_name FROM tbl_clubs
				INNER JOIN tbl_club_venues ON tbl_club_venues.club_reference = tbl_clubs.club_reference
				INNER JOIN tbl_venues ON tbl_club_venues.venue_id = tbl_venues.venue_id
				INNER JOIN tbl_week_days ON tbl_club_venues.day_id = tbl_week_days.day_id"
		.$where." ORDER BY tbl_clubs.club_name";

		$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

		while ($get_row = mysql_fetch_array($get_results)) {

			$name = $get_row['club_name'];
			$summary_name = $get_row['summary_name'];
			$link = "club_details.php?snm=".$summary_name;
			print '<li><a href="'.$link.'" target="_webapp">'.$name.'</a></li>';

		}

		print '</ul>';


include("foot.php");
?>