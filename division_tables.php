<?php
	$dnm = strtolower($_GET['dnm']);

	if (strlen($dnm) < 1 ) {
		header("location: division_menu.php");
	}

	$title="Division Tables";
	include("head.php");

	$upos=strpos($dnm,'_');
	$len=strlen($dnm);
	$type=ucwords(substr($dnm,0,$upos));
	$test=ucwords(substr($dnm,$upos+1,4));
        if ($test=="Prem") {
		$title="Premier ".$type;
	} else {
		$title=$type." Division ".substr($dnm,$upos+4,$len-$upos-4);
        }
	$path="../".$season."/".strtolower($type)."/".$dnm.".php";

	print '<div id="mainblock">';
        if (file_exists($path)) {
		$include=file_get_contents($path);
		$include=str_replace("a href","a target='_webapp' href",$include);
		$include=str_replace("rule ","*",$include);
		$include=str_replace("../","./",$include);
		$include=str_replace("#rule_","?rnum=",$include);
		print $include;
        	print "<br /><p>Last updated " . date ("d F Y", filemtime($path))."</p>";
        }
	print "</div>";

include("foot.php");
?>

