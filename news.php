<?php
	$title="News";
	$back="Index";
	include("head.php");

	$where="";
	if (isset($_GET['section'])) {
		$section=$_GET['section'];
		$where=" WHERE county_levels_id = '".$section."'";
	}


    	$get_sql ="SELECT * FROM tbl_news ".$where." ORDER BY news_date DESC";

	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

	for ($i=1; $i<5; $i++) {
		$get_row = mysql_fetch_array($get_results);
		$news_title = $get_row['news_title'];
		$news_text = $get_row['news_text'];
		$news_date = $get_row['news_date'];
		$news_id = $get_row['news_id'];
	    print '<ul class="rounded"><li><a href="news_details.php?id='.$news_id.'" target="_webapp">'.$news_title.'<small>'.$news_date.'</a></small></li></ul>';
    }


include("foot.php");
?>
