<?php
	class Database{
	function connect()
	{
		 $servername = "localhost";
    	 $username = "root";
    	 $password = "";
    	 $dbname = "little_worm";

    try {
    	 $conn = new PDO("mysql:host=localhost;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     		$conn->exec("set names utf8");
    }catch(PDOException $e){
    		echo "Can not connection : " . $e->getMessage();
    }
    	return $conn;
	}

}



?>
