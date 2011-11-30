<?php
	include("../include/toplogin.php");
?>


<!doctype html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php print $title; ?></title>
        <link rel="apple-touch-icon" href="lib/apple-touch-icon.png" />
   		<link rel="apple-touch-startup-image" href="lib/startup-icon.png" />

        <style type="text/css" media="screen">@import "lib/jqtouch_old/jqtouch.css";</style>
        <style type="text/css" media="screen">@import "lib/themes_old/jqt/theme.css";</style>
        <style type="text/css" media="screen">@import "lib/scorecard.css";</style>
        <style type="text/css" media="screen">@import "lib/results.css";</style>

        <script src="lib/jqtouch_old/jquery.1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="lib/jqtouch_old/jqtouch.min.js" type="application/x-javascript" charset="utf-8"></script>
        <script src="lib/scorecard.js" type="application/x-javascript" charset="utf-8"></script>

        <style type="text/css" media="screen">
            body.fullscreen #<?php print $title; ?> .info {
                display: none;
            }
        </style>
</head>

<body>

<div id="about" class="selectable">
        <p><img src="lib/shuttle.png" /></p>
        <p><strong>NottsBA Mobile Website</strong><br /></p>
        <br /><p>
        <em>club details, contacts, venues</em><br />
        <em>league reports, league tables</em><br />
        <em>events, news, coaches, stringers</em></p><br />

        <p><a href="&#109;&#097;&#105;&#108;&#116;&#111;:&#109;&#097;&#114;&#107;&#046;&#114;&#097;&#110;&#115;&#111;&#109;&#064;&#121;&#097;&#104;&#111;&#111;&#046;&#099;&#111;&#046;&#117;&#107;" target="_blank"> &#109;&#097;&#114;&#107;&#046;&#114;&#097;&#110;&#115;&#111;&#109;&#064;&#121;&#097;&#104;&#111;&#111;&#046;&#099;&#111;&#046;&#117;&#107;</a>
        </p>
        <p><a href="#" class="grayButton goback">Close</a></p>
</div>

<div id="<?php print str_replace(' ','_',$title);?>" class="current">
		<div class="toolbar">
        	<h1><?php print $title;?></h1>
        	<a target="_webapp" class="back"  href="javascript:history.go(-2)">Back</a>
        </div>
