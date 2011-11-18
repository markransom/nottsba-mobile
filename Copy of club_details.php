<?php
	include("../include/toplogin.php");
	if (isset($_GET['snm'])) {
		$snm=strtolower($_GET['snm']);
	} else {
		header("location: clubs.php");
	}

	if (strlen($snm) < 1 ) {
		header("location: clubs.php");
	}


	$get_sql ="SELECT * FROM tbl_clubs WHERE summary_name = '".$snm."'";

	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

	$get_row = mysql_fetch_array($get_results);

	$name = $get_row['club_name'];
	$cid= $get_row['club_reference'];

	if (strlen($name) < 1 ) {

		$name ="Could not find club ".$snm;

	} else {

			$clubcode = $get_row['club_reference'];
			$website = $get_row['club_website'];
			$ladies = $get_row['club_teams_ladies'];
			$mens = $get_row['club_teams_mens'];
			$mixed = $get_row['club_teams_mixed'];
			$league = $get_row['club_league'];
	        $summary = $get_row['summary_name'];
	        $assoc = $get_row['associated_club'];
	        $url = str_replace("http://","",$website);
	        if (substr($url, -1) == "/") {
	        	$url=substr($url, 0, strlen($url)-1);
	        }

	}

?>


<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="format-detection" content="telephone=no" />

<title>Club Details</title>
   		<link rel="apple-touch-startup-image" href="lib/startup-icon.png" />

        <style type="text/css" media="screen">@import "lib/jqtouch/jqtouch.css";</style>
        <style type="text/css" media="screen">@import "lib/themes/jqt/theme.css";</style>
        <style type="text/css" media="screen">@import "lib/scorecard.css";</style>

        <script src="lib/jqtouch/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="lib/jqtouch/jqtouch.js" type="application/x-javascript" charset="utf-8"></script>
        <script src="lib/scorecard2.js" type="application/x-javascript" charset="utf-8"></script>

       <style type="text/css" media="screen">
            body.fullscreen #clubs .info {
                display: none;
            }
        </style>
</head>

<body>


        <div id="club_details">
            <div class="toolbar">
                <h1>Club Details</h1>
                <a href="clubs.php?lid='<?php print $league; ?>'" target="_webapp" class="back">Clubs</a>
            </div>

<?php
		print '<ul class="rounded"><li>'.$name.'<small>'.$clubcode.'</small></li></ul>';
		print '<ul class="rounded"><li>'.$league.'</li></ul>';
?>
            <ul class="individual">
                <li><a href="club_venues.php?cnm=<?php print $summary;?>" target="_webapp">Venues</a></li>
                <li><a href="club_contacts.php?cnm=<?php print $summary;?>" target="_webapp">Contacts</a></li>
            </ul>

<?php
		if (strlen($website) > 0) {
			print '<ul class="rounded"><li class="forward"><a href='.$website.' target="_blank">Club Website</a></li></ul>';
		}

		if ($league == "Nottinghamshire League") {
			print '<ul class="rounded"><li class="forward"><a href="../club_tables/'.$summary.'.php" target="_blank">League Tables</a></li>';
		$teamsummary="";
		if ($ladies > 0) {
			$teamsummary=$teamsummary.$ladies.' Ladies, ';
		}
		if ($mens > 0) {
			$teamsummary=$teamsummary.$mens.' Mens, ';
		}
		if ($mixed > 0) {
			$teamsummary=$teamsummary.$mixed.' Mixed, ';
		}
			print '<li><em>'.substr($teamsummary,0, -2).'</em></li></ul>';
		}

        if (strlen($assoc) > 0) {
            $get_sql_ass ="SELECT * FROM tbl_clubs WHERE club_reference ='".$assoc."'";
            $get_results_ass = mysql_query($get_sql_ass,$cn);
            $get_row_ass = mysql_fetch_array($get_results_ass);
            $name_ass = $get_row_ass['club_name'];
	        $cid_ass = $get_row_ass['club_reference'];
            $summary_ass = $get_row_ass['summary_name'];
            print '<ul class="rounded"><li><a href="club_details.php?cnm='.$summary_ass.'" target="_webapp">';
            print 'Associated Club<small>'.$name_ass.'</small></a></li></ul>';
		}


include("foot.php");
?>