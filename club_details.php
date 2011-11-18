<?php
	if (isset($_GET['snm'])) {
		$snm=strtolower($_GET['snm']);
	} else {
		header("location: clubs.php");
	}

	if (strlen($snm) < 1 ) {
		header("location: clubs.php");
	}

	$title="Club Details";
	include("head.php");

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


<?php
		print '<ul class="rounded"><li>'.$name.'<small>'.$clubcode.'</small></li></ul>';
		print '<ul class="rounded"><li>'.$league.'</li></ul>';
?>
            <ul class="individual">
                <li><a href="club_venues.php?snm=<?php print $summary;?>" target="_webapp">Venues</a></li>
                <li><a href="club_contacts.php?snm=<?php print $summary;?>" target="_webapp">Contacts</a></li>
            </ul>

<?php
		if (strlen($website) > 0) {
			print '<ul class="rounded"><li class="forward"><a href='.$website.' target="_blank">Club Website</a></li></ul>';
		}

		if ($league == "Nottinghamshire League") {
			print '<ul class="rounded"><li class="forward"><a href="club_tables.php?snm='.$summary.'" target="_webapp">League Tables</a></li>';
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
            print '<ul class="rounded"><li><a href="club_details.php?snm='.$summary_ass.'" target="_webapp">';
            print 'Associated Club<small>'.$name_ass.'</small></a></li></ul>';
		}


include("foot.php");
?>