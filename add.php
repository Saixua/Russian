<?php 
  session_start(); 
 require 'connect.php';

$file = fopen("edit.txt", "r");
$i = 0;
$words = array();

$db = new db_mysqli('localhost', 'root', '', 'wordsru');
$db->query("SET NAMES 'utf8'");
while (!feof($file)) {

$line = fgets($file);
$words = array_unique($words);
$words  = explode(' ', $line);
//echo $line . "<br />";

//echo count($words);
if(count($words) ===3)
	{
			$sql = $db->sql_add($words[0],$words[1] ,$words[2] );
	}



if (!mysqli_query($db,$sql))
	{
		die('Error: ' . mysqli_error($db));
	}

if(count($words) ===4)
	{$sql = $db->sql_add($words[0] . " ",$words[1] . " " . $words[2] . " ", $words[3] );}

$i++;

}

fclose($file);
$db->close();
 $_SESSION['command'] = $i . ' Entries Added to the Database.';
header( 'Location: database.php' );
?>
 