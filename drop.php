<?php
session_start();
 $_SESSION['command'] = 'Dropped Table Successfully';
require ('connect.php');
$db = new db_mysqli('localhost', 'root', '', 'wordsru');
$sql = $db->sql_drop();
echo 'Success... ' . $db->host_info . "\n" ;

if (mysqli_query($db, $sql)){echo "Table Dropped";}

$db->close();
header( 'Location: database.php' ) 
?>
