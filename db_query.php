
<?php require 'connect.php'; 
	  require 'builder.php';
	  require 'phonetic.php';
$db = new db_mysqli('localhost', 'root', '', 'wordsru');
//makes sure the query interprets what it gets as utf elsewise Russian characters aren't read correctly.
	$db->query("SET NAMES 'utf8'");
	
	if($db->connect_errno){	
		printf("Connect failed: %s\n", $db->connect_error);
	}

//$query = $_POST['value'];


if($result = execute($db->sql_search($_POST['value']),$db, "mysqli")){
	$i = 1;
	while($row = $result->fetch_assoc()){
		
		echo "<tr>
				<td>" . $row['Russian'] . "</td>
				<td>" . $row['English']  . "</td>
				<td>" . phonetics($row['Russian'], 0).  " </td>
				<td>". phonetics($row['Russian'], 1). "</td>
				
				<td>  <A HREF=Media\\collection.media\\" 
				. $row['Audio'] .  ">Listen</a>   </td>
        </tr>"
		;
		
	}

mysqli_free_result($result);
} 

?>