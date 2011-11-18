<?php
	$title="Event Details";
	$back="Calendar";
	include("head.php");


	$id = $_GET['id'];

	if (strlen($id) < 1 ) {
		header("location: calendar.php");
	}


    $get_sql ="SELECT * FROM tbl_calendar WHERE calendar_id='".$id."'";
	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

	$get_row = mysql_fetch_array($get_results);
	$calendar_event = $get_row['calendar_event'];
	$calendar_venue = $get_row['calendar_venue'];
	$calendar_venue_url = $get_row['calendar_venue_url'];
	$calendar_date = $get_row['calendar_date'];
	$calendar_time = $get_row['calendar_time'];
	$calendar_contact= $get_row['calendar_contact'];
	$calendar_contact_email= $get_row['calendar_contact_email'];

    print '<ul class="rounded"><li>'.$calendar_event.'</small></li></ul>';
    print '<ul class="rounded"><li>'.$calendar_date.'<small>'.$calendar_time.'</small></li></ul>';

	if (strlen($calendar_venue) > 0) {
	if (strlen($calendar_venue_url) > 0) {
	    print '<ul class="rounded"><li><a href="'.$calendar_venue_url.'" target="_webapp">'.$calendar_venue.'</a></li></ul>';
	} else {
	    print '<ul class="rounded"><li>'.$calendar_venue.'</li></ul>';
	}
	}

	if (strlen($calendar_contact) > 0) {
	if (strlen($calendar_contact_email) > 0) {
	    print '<ul class="rounded"><li><a href="mailto:'.$calendar_contact_email.'" target="_webapp">'.$calendar_contact.'</a></li></ul>';
	} else {
	    print '<ul class="rounded"><li>'.$calendar_contact.'</li></ul>';
	}
	}


include("foot.php");
?>