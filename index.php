<?php require 'connect.php'; 
	  require 'builder.php';
	  require 'phonetic.php';
$db = new db_mysqli('localhost', 'root', '', 'wordsru');
?>

<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="css/main.css">
<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.js"></script>


<?php

	
	
	
	
	//makes sure the query interprets what it gets as utf elsewise Russian characters aren't read correctly.
	$db->query("SET NAMES 'utf8'");
	
	if($db->connect_errno){	
		printf("Connect failed: %s\n", $db->connect_error);
	}
?>


    <!-- JQUERY FROM GOOGLE API -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>

    <script type="text/javascript">
      $(function() {
        $("#lets_search").bind('submit',function() {
          var value = $('#str').val();
           $.post('db_query.php',{value:value}, function(data){
             $("#search_results").html(data);
           });
           return false;
        });
      });
    </script>

 
    
      <form id="lets_search" action="">
        Search:<input type="text" name="str" id="str">
        <input type="submit" value="send" name="send" id="send">
      </form>
      <div id="search_results"></div>
    </div>

  </body>
<table id="table_id" class="display" cellspacing="40" align="center">
    <thead>
        <tr>
            <th>Russian</th>
            <th>English</th>
			<th>Phonetics</th>
			<th>Transliteration</th>
			<th>Audio</th>
		
        </tr>
    </thead>
 <tbody>

 <?php
//if(isset )
if($result = execute($db->sql_select(),$db, "mysqli")){
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




$db->close();

?>
</tbody>
</table>

<a href="database.php">Database Tools</a>