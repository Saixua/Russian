<?php	
  $numrowsperpage = 10;
	$str_previous = "Previous page";
	$str_next = "Next page";

	// These two variables are used internally 
	// by the class' functions
	 $file;
	 $total_records;
  function execute($sql, $db, $type){
	
	
	
    // global variables needed by the function
    global $total_records, $row, $numtoshow;

    // number of records to show at a time
    $numtoshow = 10; //$this->numrowsperpage;
    // $row is actually the number of the row of 
    // records (the page number)
    if (!isset($row)) $row = 0;
    // the record start number for the SQL query
    $start = $row * $numtoshow;
    // check the database type
    if ($type == "mysqli") {
      $result = mysqli_query($db, $sql);
      $total_records = mysqli_num_rows($result);
      	$last = ceil($total_records/$numtoshow);
// This makes sure $last cannot be less than 1
if($last < 1){
	$last = 1;
}
// Establish the $pagenum variable
$pagenum = 1;
	
	if(isset($_GET['pn'])){
	$pagenum = preg_replace('#[^0-9]#', '', $_GET['pn']);
}
// This makes sure the page number isn't below 1, or more than our $last page
if ($pagenum < 1) { 
    $pagenum = 1; 
} else if ($pagenum > $last) { 
    $pagenum = $last; 
}
// This sets the range of rows to query for the chosen $pagenum
$limit = 'LIMIT ' .($pagenum - 1) * $numtoshow .',' .$numtoshow;
	  //$sql .= " LIMIT $start, $numtoshow";
	  $sql .= $limit = 'LIMIT ' .($pagenum - 1) * $numtoshow .',' .$numtoshow;
      $result = mysqli_query( $db,$sql);
    
} elseif ($type == "pgsql") {
      $result = pg_Exec($db, $sql);
      $total_records = pg_NumRows($result);
      $sql .= " LIMIT $numtoshow, $start";
      $result = pg_Exec($db, $sql);
    }
    // returns the result set so the user 
    // can handle the data


$sql = "SELECT * FROM `russian`  $limit";
$query = mysqli_query($db, $sql);
// This shows the user what page they are on, and the total number of pages
$textline1 = "Russian Words";
$textline2 = "Page <b>$pagenum</b> of <b>$last</b>";
// Establish the $paginationCtrls variable
$paginationCtrls = '';
// If there is more than 1 page worth of results
$paginationCtrls .= '&nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn="1"> <</a> ';
if($last != 1){
	
	/* First we check if we are on page one. If we are then we don't need a link to 
	   the previous page or the first page so we do nothing. If we aren't then we
	   generate links to the first page, and to the previous page. */
	if ($pagenum > 1) {
        $previous = $pagenum - 1;
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$previous.'">Previous</a> &nbsp; &nbsp; ';
		// Render clickable number links that should appear on the left of the target page number
		for($i = $pagenum-4; $i < $pagenum; $i++){
			if($i > 0){
		        $paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
			}
	    }
    }
	// Render the target page number, but without it being a link
	$paginationCtrls .= ''.$pagenum.' &nbsp; ';
	// Render clickable number links that should appear on the right of the target page number
	for($i = $pagenum+1; $i <= $last; $i++){
		$paginationCtrls .= '<a href="'.$_SERVER['PHP_SELF'].'?pn='.$i.'">'.$i.'</a> &nbsp; ';
		if($i >= $pagenum+4){
			break;
		}
	}
	// This does the same as above, only checking if we are on the last page, and then generating the "Next"
    if ($pagenum != $last) {
        $next = $pagenum + 1;
        $paginationCtrls .= ' &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$next.'">Next</a> ';
		$paginationCtrls .= ' &nbsp; <a href="'.$_SERVER['PHP_SELF'].'?pn='.$last.'">>></a> ';
    }
	
}

echo "<div>
  <h2 align= 'center'>" . $textline1 ."</h2>
  </div><div align ='center'>" . $textline2 ."</div><p>
  
  <div id=" . "'pagination_controls' align='center'>" .  $paginationCtrls . "</div>
</div>";
    return $result;
  }
?>