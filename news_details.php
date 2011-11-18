<?php
	$title="News Details";
	$back="News";
	include("head.php");


	$id = $_GET['id'];

	if (strlen($id) < 1 ) {
		header("location: news.php");
	}


    $get_sql ="SELECT * FROM tbl_news WHERE news_id='".$id."'";
	$get_results = mysql_query($get_sql,$cn) or die(mysql_error());

	$get_row = mysql_fetch_array($get_results);
	$news_title = $get_row['news_title'];
	$news_text = $get_row['news_text'];
	$news_date = $get_row['news_date'];
	$news_photo = $get_row['news_photo'];
    print '<ul class="rounded"><li>'.$news_title.'<small>'.$news_date.'</small></li></ul>';
	if (strlen($news_photo) > 0) {
		print '<img src="../'.$news_photo.'">';
	}
    print '<ul class="edgetoedge"><li>'.$news_text.'</li></ul>';


include("foot.php");
?>
