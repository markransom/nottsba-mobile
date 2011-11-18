<?php
	include("../include/toplogin.php");
	$backto="index";
	if  (isset($back)) {
		$backto=strtolower($back);
	}
	$backtext=ucwords($backto);
	if (strlen($backto)>8) {
		$backtext="Back";
	}
?>


<!doctype html>
<!-- html manifest="manifest.php?include=<?php print strtolower(str_replace(' ','_',$title));?>";-->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php print $title; ?></title>
   		<link rel="apple-touch-startup-image" href="lib/startup-icon.png" />

        <style type="text/css" media="screen">@import "lib/jqtouch/jqtouch.min.css";</style>
        <style type="text/css" media="screen">@import "lib/themes/jqt/theme.min.css";</style>
        <style type="text/css" media="screen">@import "lib/scorecard.css";</style>

        <script src="lib/jqtouch/jquery.1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="lib/jqtouch/jqtouch.min.js" type="application/x-javascript" charset="utf-8"></script>
        <script src="lib/scorecard.js" type="application/x-javascript" charset="utf-8"></script>

        <style type="text/css" media="screen">
            body.fullscreen #<?php print $title; ?> .info {
                display: none;
            }
        </style>
</head>

<body>

<div id="<?php print str_replace(' ','_',$title);?>" class="current">
        <div class="toolbar">
        	<h1><?php print $title;?></h1>
        	<a class="back" href="<?php print $backto;?>.php" target="_webapp"><?php print $backtext;?></a>
        </div>
