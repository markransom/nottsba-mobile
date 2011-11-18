<?php
	$title="Calendar";
	include("head.php");


    $get_sql ="SELECT * FROM tbl_calendar ORDER BY calendar_date DESC";
	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

	for ($i=1; $i<5; $i++) {
		$get_row = mysql_fetch_array($get_results);
		$calendar_event = $get_row['calendar_event'];
		$calendar_date = $get_row['calendar_date'];
		$calendar_id = $get_row['calendar_id'];
	    print '<ul class="rounded"><li><a href="calendar_details.php?id='.$calendar_id.'" target="_webapp">'.$calendar_event.'<small>'.$calendar_date.'</small></a></li></ul>';
    }


include("foot.php");
?>
