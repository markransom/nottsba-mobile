<?php
	isset($_SERVER['HTTP_REFERER']) ? $backurl=$_SERVER['HTTP_REFERER'] : $backurl="index.php";

	$dotpos=strpos($backurl,'.');
	if ($dotpos==0) {
		$backurl=$backurl.".php";
		$dotpos=strpos($backurl,'.');
	}
	$underscorepos=strpos($backurl,'_');	
	$expos=strpos($backurl,'!');	
	$stripto=$dotpos;
	if ($underscorepos>0) $stripto=$underscorepos;
	$backtext=ucwords(substr($backurl,0,$stripto));
	if ($expos>0) {
		$backtext=substr($back,$expos+1);
		$backurl=substr($backurl,0,$expos);
	}
	if (strlen($backtext)>7) $backtext="Back";
	if ($backurl=="index.php") $backtext="NottsBA";

?>


<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php print $title; ?></title>
   		<link rel="apple-touch-startup-image" href="lib/startup-icon.png" />

        <style type="text/css" media="screen">@import "lib/jqtouch/jqtouch.css";</style>
        <style type="text/css" media="screen">@import "lib/themes/jqt/theme.css";</style>
        <style type="text/css" media="screen">@import "lib/scorecard.css";</style>
        <style type="text/css" media="screen">@import "lib/results.css";</style>

        <script src="lib/jqtouch/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="lib/jqtouch/jqtouch.js" type="application/x-javascript" charset="utf-8"></script>
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
        	<a class="button back" onclick="window.history.back();window.history.back();" target="_webapp"><?php print $backtext;?></a>
        </div>
