<?php
session_start();
 $_SESSION['command'] = 'Created Table Successfully';
require ('connect.php');
$db = new db_mysqli('localhost', 'root', '', 'wordsru');
$sql = $db->sql_create();
echo 'Success... ' . $db->host_info . "\n" ;
echo "</br>";
if (mysqli_query($db, $sql)){echo "Table created";}

$db->close();

header( 'Location: database.php' ) 
?>
