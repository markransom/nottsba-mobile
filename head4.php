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
        <script src="lib/scorecard2.js" type="application/x-javascript" charset="utf-8"></script>

        <style type="text/css" media="screen">
            body.fullscreen #main .info {
                display: none;
            }
        </style>
</head>

<body id="jqt">

<div id="alternative">
        <div class="toolbar">
        	<h1><?php print $title;?></h1>
		<a id="altback" class="back" href="javascript:history.go(-2)" target="_webapp">Ajax Title</a>
        </div>
</div>

<div id="main" class="current">
        <div class="toolbar">
        	<h1><?php print $title;?></h1>
		<a id="back" class="back" href="javascript:history.go(-2)" target="_webapp">Back</a>
        </div>
