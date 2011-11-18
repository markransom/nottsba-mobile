<?php
	$title="Leagues";
	$back="Index";
	include("head.php");


	print '<ul class="rounded">';

	$query = "SELECT club_league, COUNT(club_id) FROM tbl_clubs GROUP BY club_league";

	$result = mysql_query($query, $cn) or die(mysql_error());

	while($row = mysql_fetch_array($result)){
		$clubs=$row['COUNT(club_id)'];
		$league=$row['club_league'];
		$quoted="'".$league."'";
		$league=str_replace('Badminton Association','',$league);
		$league=str_replace('Badminton League','',$league);

		print '<li><a href="clubs.php?lid='.$quoted.'" target="_webapp">'.$league.'</a><small class="counter">'.$clubs.'</small></li>';
	}

	print '</ul>';


include("foot.php");
?>