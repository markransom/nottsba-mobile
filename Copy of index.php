<?php include("../include/toplogin.php"); ?>


<!doctype html>
<html manifest="manifest.php?include=index.php">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>NottsBA MobileWeb</title>
        <link rel="apple-touch-icon" href="lib/apple-touch-icon.png" />
   		<link rel="apple-touch-startup-image" href="lib/startup-icon.png" />

        <style type="text/css" media="screen">@import "lib/jqtouch/jqtouch.css";</style>
        <style type="text/css" media="screen">@import "lib/themes/jqt/theme.css";</style>
        <style type="text/css" media="screen">@import "lib/scorecard.css";</style>

        <script src="lib/jqtouch/jquery-1.4.2.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="lib/jqtouch/jqtouch.js" type="application/x-javascript" charset="utf-8"></script>
        <script src="lib/scorecard2.js" type="application/x-javascript" charset="utf-8"></script>

       <style type="text/css" media="screen">
            body.fullscreen #main .info {
                display: none;
            }
            #about {
                padding: 10px 10px 10px;
                text-shadow: rgba(255, 255, 255, 0.3) 0px -1px 0;
                font-size: 13px;
                text-align: center;
                background: #161618;
            }
            #about p {
                margin-bottom: 8px;
            }
            #about a {
                color: #fff;
                font-weight: bold;
                text-decoration: none;
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

<div id="main" class="current">
        <div class="toolbar">
              <h1>NottsBA</h1>
                <a class="button slideup" id="infoButton" href="#about">About</a>
        </div>

	<ul class="rounded">
	      <li><a href="leagues.php" target="_webapp">Leagues</a></li>
	</ul>
	<ul class="rounded">
	      <li><a href="venues.php" target="_webapp">Venues</a></li>
	</ul>
	<ul class="rounded">
	      <li><a href="stringers.php" target="_webapp">Stringers</a></li>
	</ul>
	<ul class="rounded">
	      <li><a href="coaches.php" target="_webapp">Coaches</a></li>
	</ul>
	<ul class="rounded">
	      <li><a href="news.php" target="_webapp">News</a></li>
	</ul>
	<ul class="rounded">
	      <li><a href="calendar.php" target="_webapp">Calendar</a></li>
	</ul>
	    <div id="loader">
	    	<div class="loader">
			<img src="lib/loader.gif" alt="Loading cache..." width="31" height="31" />
			<br />Updating Cache...<br /><br />
		</div>
</div>

</body>
</html>