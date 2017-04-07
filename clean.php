<?php
session_start();
 $_SESSION['command'] = 'Cleaned Table Successfully';
require ('connect.php');
$db = new db_mysqli('localhost', 'root', '', 'wordsru');
$sql = $db->sql_clean();
echo 'Success... ' . $db->host_info . "\n" ;
echo "</br>";
$sql2 = $db->sql_clean_insert();
$sql3 = $db->sql_clean_rename();
if (mysqli_query($db, $sql)){echo "Table created";}
if (mysqli_query($db, $sql2)){echo "Table created";}
if (mysqli_query($db, $db->sql_drop())){echo "Table created";}
if (mysqli_query($db, $sql3)){echo "Table created";}

$db->close();

header( 'Location: database.php' ) 
?>
