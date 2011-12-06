<?php
	$cnm = strtolower($_GET['cnm']);

	if (strlen($cnm) < 1 ) {
		header("location: clubs.php");
	}

	$title="Club Tables";
	include("head.php");


	$get_sql ="SELECT * FROM tbl_clubs WHERE summary_name ='".$cnm."'";

	$get_results = mysql_query($get_sql,$cn);

	$get_row = mysql_fetch_array($get_results);

	$name = $get_row['club_name'];
        $summary = $get_row['summary_name'];
	$cid= $get_row['club_reference'];

	$file="../".$season."/summaries/".$summary.".php";

        if (file_exists($file)) {
		$include=file_get_contents($file);
		print str_replace('">','" target="_webapp">',$include);
        	print "<p>Last updated " . date ("d F Y", filemtime($file))."</p>";
        }

include("foot.php");
?>

