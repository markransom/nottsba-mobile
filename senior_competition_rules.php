<?php 
	$rnum = strtolower($_GET['rnum']);

	if (strlen($rnum) < 1 ) {
		header("location: clubs.php");
	}

	$title="League Rules";
	$back="clubs.php";
	include("head.php");

		
	$get_sql ="SELECT * FROM tbl_senior_league_competition WHERE senior_league_number ='".$rnum."'";
		
	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());
	
	$get_row = mysql_fetch_array($get_results);
			
	$number = $get_row['senior_league_number'];
	$rule = $get_row['senior_league_rule'];			
	$rule = nl2br($rule); 
			
	print "<ul class='rounded'><li>Rule ".$number."</li></ul>";
	print "<ul class='edgetoedge'><li>".$rule."</li></ul>";
	print "<br />";
			
			
include("foot.php");
?>