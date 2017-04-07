  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <?php
session_start();

echo 'What would you like to do?';


?>

<form action="add.php" method="post">
 
 <p><input type="submit" value ="Add"/></p>
</form><form action="drop.php" method="post">
 
 <p><input type="submit" value ="Drop Table"/></p>
</form>
<form action="create.php" method="post">
 
 <p><input type="submit" value ="Create Table"/></p>
</form>

<form action="clean.php" method="post">
 
 <p><input type="submit" value ="Clean Table"/></p>
</form>

<br />
<a href= "index.php">Main</a>
<?php if(isset( $_SESSION['command'])){echo $_SESSION['command'];

}


?>