<?php
class db_mysqli extends mysqli {
    public function __construct($host, $user, $pass, $db) {
        parent::__construct($host, $user, $pass, $db);

        if (mysqli_connect_error()) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }
    }






 public static function sql_create()
	{
		return "CREATE TABLE russian( `Russian` VARCHAR(255)CHARACTER SET utf8 COLLATE utf8_general_ci NULL , `English` VARCHAR(255)CHARACTER SET utf8 COLLATE utf8_general_ci  NULL, `Audio` VARCHAR(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL ) ENGINE = MyISAM"; //query

	}
	
	public static function sql_clean()
	{
		return "CREATE TABLE `NoDupeTable` LIKE `russian`";
		
	}
	
	public static function sql_clean_insert()
	{
		return "INSERT `NoDupeTable` SELECT * FROM `russian` group by russian, english, audio;";
	}
	
	public static function sql_clean_rename()
	{
		return "ALTER TABLE NoDupeTable
		RENAME TO russian;";
	}
 public static function sql_drop()
	{
		return "DROP TABLE russian";

	}

public static function sql_add($russian, $english, $audio){

 $query = '
  
    INSERT INTO russian 
    
    VALUES (
      "' . $russian . '",
      "' . $english . '",
      "' . $audio . '"
    )
  ';
  
  return $query;

}
	
	
	
 public static function sql_select()
	{
		$query = "SELECT * FROM `russian`";
		
		return $query;

	}
	
	 public static function sql_search($eng)
	{
		return "SELECT * FROM `russian` where Russian='" . $eng . "'";
		//return $query;

	}
}


?> 