<?php
$file = fopen("all decks.html","rw");
$newFile = fopen("edit.txt", "a");

   
$regex = '/\<(.*)\>/';
$regex2= '/\ frequency index: \b\d+ [[]sound:\b/';
$replace = array('"', ']','/\s+/');

while(! feof($file))
  {
	$line = fgets($file);
	
	$newLine = preg_replace($regex, " ", $line);
	$newLine2 = preg_replace($regex2, " ", $newLine);
	$newLine3 = str_replace($replace,  "",$newLine2);
	$newLine4 = preg_replace('/\s+/', " ", $newLine3);
	echo str_replace($replace,  "",$newLine2).'</br>';
		//$lines[] = str_replace($replace,  "", $newLine2);
	fwrite($newFile, trim($newLine4) . PHP_EOL);
  }
//fwrite($newFile, implode(PHP_EOL, $lines));
fclose($file);
fclose($newFile);
?> 
