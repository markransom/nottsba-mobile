<?php 
	$title="Snr Divisions";
	$back="index.php";
	include("head.php");

  $dir = new RecursiveDirectoryIterator("../".$season);
  $filename_array = array();
  foreach(new RecursiveIteratorIterator($dir) as $file) {
  	$file_desc=ucwords(str_replace("_", " ",substr($file->getFilename(), 0, -4)));
  	$file_desc=str_replace("Div", "Division ",$file_desc);
    if ($file->IsFile() &&
    	(strpos($file, "mens") || strpos($file, "mixed") || strpos($file, "ladies")))
    {
		$temp=str_replace("_", " ",substr($file->getFilename(), 0, -4));
		$temp=str_replace(" all", "  all",$temp);
		$filename_array[]=ucwords(str_replace(" prem", "  prem",$temp));

    }
  }

  $last="";
  sort($filename_array);
  echo '<ul class="rounded">';

  foreach($filename_array as $file) {

	$name=str_replace("  Prem", " Premier",$file);
	$file=str_replace("  Prem", " Prem",$file);

	$check=str_replace("  All", " Skip",$file);


    	if ($check==$file)
	{

    	if ((substr(strtolower($file), 0, 6) == "ladies") && $last <> "ladies")
    	{
		$last="ladies";
	}
    	if ((substr(strtolower($file), 0, 4) == "mens") && $last <> "mens")
    	{
		$last="mens";
        	echo '</ul><ul class="rounded">';
	}
    	if ((substr(strtolower($file), 0, 5) == "mixed") && $last <> "mixed")
    	{
		$last="mixed";
        	echo '</ul><ul class="rounded">';
	}
	
	echo '<li><a href="division_tables.php?dnm=';
      	echo str_replace(" ", "_",strtolower($file));
      	echo '" target="_webapp">';
      	echo str_replace("Div", "Division ",$name);
      	echo '</a></li>';
      	echo "\n";

	}
  }
  echo '</ul>';


include("foot.php");
?>