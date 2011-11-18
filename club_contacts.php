<?php
	if (isset($_GET['snm'])) {
		$snm=strtolower($_GET['snm']);
	} else {
		header("location: clubs.php");
	}

	if (strlen($snm) < 1 ) {
		header("location: clubs.php");
	}

	$title="Club Contacts";
	include("head.php");


	$get_sql ="SELECT * FROM tbl_clubs WHERE summary_name ='".$snm."'";

	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

	$get_row = mysql_fetch_array($get_results);

	$name = $get_row['club_name'];
	$cid= $get_row['club_reference'];
	$summary= $get_row['summary_name'];

	$sec = $get_row['club_secretary'];
	$sec_email = $get_row['club_secretary_email'];
	$sec_mobile = $get_row['club_secretary_mobile'];
	$sec_phone = $get_row['club_secretary_phone'];

	$add_name =  $get_row['club_add_name'];
 	$add_phone = $get_row['club_add_phone'];
 	$add_mobile = $get_row['club_add_mobile'];
	$add_email = $get_row['club_add_email'];


		print '<ul class="rounded"><li>'.$name.'</li></ul>';

		print '<ul class="rounded"><li>Club Secretary </li>';
		print '<li>'.$sec.'</li>';

		if (strlen($sec_phone) > 0) {
			$sec_line = '<a rel="external" href="tel:'.$sec_phone.'">Tel. '.$sec_phone.'</a>';
			print "<li>".$sec_line."</li>";
		}

		if (strlen($sec_mobile) > 0) {
			$sec_line = '<a rel="external" href="tel:'.$sec_mobile.'">Mob. '.$sec_mobile.'</a>';
			print "<li>".$sec_line."</li>";
		}

		if (strlen($sec_email) > 0) {
			$sec_line = '<a rel="external" href="mailto:'.$sec_email.'">'.$sec_email.'</a>';
			print "<li>".$sec_line."</li>";
		}
		print "</ul>";


		$get_sql_sec = "SELECT * FROM tbl_club_match_secs WHERE club_reference ='".$cid."' ORDER BY club_match_secs_team";

		$get_results_sec = mysql_query($get_sql_sec,$cn) or die(mysql_error());

		$sec_cnt = 1;

		while ($get_row_sec = mysql_fetch_array($get_results_sec)) {

			$sec_line = "";

			$team = $get_row_sec['club_match_secs_team'];
			$secname = $get_row_sec['club_match_secs_name'];
			$phone = $get_row_sec['club_match_secs_phone'];
			$mobile = $get_row_sec['club_match_secs_mobile'];
			$email = $get_row_sec['club_match_secs_email'];

			print '<ul class="rounded"><li>Match Secretary';
			if (strlen($team) > 0) {
				print "<small>".$team."</small>";
			}
			print "</li>";

			print "<li>".$secname."</li>";

			if (strlen($phone) > 0) {
				print '<li><a rel="external" href="tel:'.$phone.'">Tel. '.$phone.'</a></li>';
			}

			if (strlen($mobile) > 0) {
				print '<li><a rel="external" href="tel:'.$mobile.'">Mob. '.$mobile.'</a></li>';
			}

			if (strlen($email) > 0) {
				print '<li><a rel="external" href="mailto:'.$email.'">'.$email.'</a></li>';
			}

			print "</ul>";

			$sec_cnt = $sec_cnt + 1;

		}

		$add_line = "";

		if (strlen($add_name) > 0) {
			$add_line = $add_line.$add_name."<br />";
		}

		if (strlen($add_phone) > 0) {
			$add_line = $add_line.'<a rel="external" href="tel:'.$add_phone.'">Tel. '.$add_phone.'</a>';
		}

		if (strlen($add_mobile) > 0) {
			$add_line = $add_line.'<a rel="external" href="tel:'.$add_mobile.'">Mob. '.$add_mobile.'</a>';
		}

        	if (strlen($add_email) > 0) {
			$add_line = $add_line.'<a rel="external" href="mailto:'.$add_email.'">'.$add_email.'</a>';
		}

		if (strlen($add_line) > 0) {
			print '<ul class="rounded"><li>Additional Contact</li>';
			print "<li>".$add_line."</li></ul>";
		}


include("foot.php");
?>