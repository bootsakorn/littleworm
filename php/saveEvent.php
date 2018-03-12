<<<<<<< HEAD
<?php
		session_start();

	function saveImg($con){
		 $statement = $con->query('SELECT id FROM event ORDER BY id DESC LIMIT 1');
	while($row = $statement->fetch(PDO::FETCH_BOTH)) {
		$id = $row['id'];
	}

	$file_count = count($_FILES['img']['name']);

    for ($i=0; $i<$file_count; $i++) {
		$type = strtolower(pathinfo($_FILES['img']['name'][$i],PATHINFO_EXTENSION));
		$image_path = "../img_event/";
		$name = uniqid();
		$upload_path = $image_path.$name.".".$type;
		if($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
             exit();
         }else{
             $suc = move_uploaded_file($_FILES['img']['tmp_name'][$i], $upload_path);
             try {
     		$sql = "INSERT INTO event_image(event_id, image, pathImage) VALUES('$id', '$name', '$upload_path')";
			    $con->exec($sql);
			    }catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			    }
          };
	}
	return $id;
	}


	function saveVideo($con, $lo_name){
		$eventname = $_POST['nameEvent'];
	    $price = $_POST['price'];
	    $seatmax = $_POST['max'];
	    $date = $_POST['evdate'];
	    $st_time = $_POST['sttime'];
	    $en_time = $_POST['entime'];
	    $types = $_POST['type'];
	    $detail = $_POST['detail'];
	    $precon = $_POST['precon'];
	    $evaluation = $_POST['googleform'];
   		$organitzer = "noey@gmail.com";

    if(($_FILES["video"]["size"] != 0) && (strtolower(pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION)) == "mp4") ){
    	$type = strtolower(pathinfo($_FILES['video']['name'],PATHINFO_EXTENSION));
    	$vdo_path = "../vdo_event/";
        $upload_path = $vdo_path.uniqid().".".$type;
        $success = move_uploaded_file($_FILES['video']['tmp_name'], $upload_path);

          try {
     		$sql = "INSERT INTO event(place, name, date_start, max, TYPE,   organizer_email, price, precondition, start_time, end_time, detail, evaluation, seat, status, 	vdo) VALUES('$lo_name', '$eventname', '$date', '$seatmax', '$types', '$organitzer',
     			'$price', '$precon', '$st_time', '$en_time', '$detail', '$evaluation', 0, 'coming soon', '$upload_path')";
			    $con->exec($sql);
			    }catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			    }

    }else{
    	try {
     		$sql = "INSERT INTO event(place, name, date_start, max, TYPE,   organizer_email, price, precondition, start_time, end_time, detail, evaluation, seat, status) VALUES('$lo_name', '$eventname', '$date', '$seatmax', '$types', '$organitzer',
     			'$price', '$precon', '$st_time', '$en_time', '$detail', '$evaluation', 0, 'coming soon')";
			    $con->exec($sql);
			    }catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			    }
    }
 	}


 	function saveLocation($con, $id){
 		$name =  $_POST['namelocation'];
	    $location =  $_POST['location'];
	    $lat =  $_POST['lat'];
	    $lng =  $_POST['lng'];

	    try {
     		$sql = "INSERT INTO googlemap(id, place_Name, place_Location, place_Lat, place_Lng) VALUES('$id', '$name', '$location', '$lat', '$lng')";
			    $con->exec($sql);
			    }catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			    }
					return $name;
          }


 		include "connectDB.php";
	 if(isset($_POST['submit'])){
	 	$openDB = new Database();
    	$con = $openDB->connect();
		$id = saveImg($con);
		$lo_name = saveLocation($con, $id);
		saveVideo($con, $lo_name);

		$_SESSION['id_event'] = $id;
		$_SESSION['email'] = "noey@gmail.com";
    	header('location:detailEvent.php');
}


?>
=======
<?php
		session_start();

	function saveImg($con){
		 $statement = $con->query('SELECT id FROM event ORDER BY id DESC LIMIT 1');
	while($row = $statement->fetch(PDO::FETCH_BOTH)) {
		$id = $row['id'];
	}

	$file_count = count($_FILES['img']['name']);

    for ($i=0; $i<$file_count; $i++) {
		$type = strtolower(pathinfo($_FILES['img']['name'][$i],PATHINFO_EXTENSION));
		$image_path = "../img_event/";
		$name = uniqid();
		$upload_path = $image_path.$name.".".$type;
		if($type != "jpg" && $type != "png" && $type != "jpeg" && $type != "gif" ) {
             exit();
         }else{
             $suc = move_uploaded_file($_FILES['img']['tmp_name'][$i], $upload_path);
             try {
     		$sql = "INSERT INTO event_image(event_id, image, pathImage) VALUES('$id', '$name', '$upload_path')";
			    $con->exec($sql);
			    }catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			    }
          };
	}
	return $id;
	}


	function saveVideo($con){
		$eventname = $_POST['nameEvent'];
	    $price = $_POST['price'];
	    $seatmax = $_POST['max'];
	    $date = $_POST['evdate'];
	    $st_time = $_POST['sttime'];
	    $en_time = $_POST['entime'];
	    $types = $_POST['type'];
	    $detail = $_POST['detail'];
	    $precon = $_POST['precon'];
	    $evaluation = $_POST['googleform'];
   		$organitzer = "noey@gmail.com";

    if(($_FILES["video"]["size"] != 0) && (strtolower(pathinfo($_FILES["video"]["name"], PATHINFO_EXTENSION)) == "mp4") ){
    	$type = strtolower(pathinfo($_FILES['video']['name'],PATHINFO_EXTENSION));
    	$vdo_path = "../vdo_event/";
        $upload_path = $vdo_path.uniqid().".".$type;
        $success = move_uploaded_file($_FILES['video']['tmp_name'], $upload_path);

          try {
     		$sql = "INSERT INTO event(name, date_start, max, TYPE,   organizer_email, price, precondition, start_time, end_time, detail, evaluation, seat, status, 	vdo) VALUES('$eventname', '$date', '$seatmax', '$types', '$organitzer',
     			'$price', '$precon', '$st_time', '$en_time', '$detail', '$evaluation', 0, 'coming soon', '$upload_path')";
			    $con->exec($sql);
			    }catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			    }

    }else{
    	try {
     		$sql = "INSERT INTO event(name, date_start, max, TYPE,   organizer_email, price, precondition, start_time, end_time, detail, evaluation, seat, status) VALUES('$eventname', '$date', '$seatmax', '$types', '$organitzer',
     			'$price', '$precon', '$st_time', '$en_time', '$detail', '$evaluation', 0, 'coming soon')";
			    $con->exec($sql);
			    }catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			    }
    }
 	}


 	function saveLocation($con, $id){
 		$name =  $_POST['namelocation'];
	    $location =  $_POST['location'];
	    $lat =  $_POST['lat'];
	    $lng =  $_POST['lng'];

	    try {
     		$sql = "INSERT INTO googlemap(id, place_Name, place_Location, place_Lat, place_Lng) VALUES('$id', '$name', '$location', '$lat', '$lng')";
			    $con->exec($sql);
			    }catch(PDOException $e){
			    echo "Connection failed: " . $e->getMessage();
			    }
					try {
		     		$sql = "UPDATE `event` SET `place`=$name WHERE id= $id";
					    $con->exec($sql);
					    }catch(PDOException $e){
					    echo "Connection failed: " . $e->getMessage();
					    }
          }



 		include "connectDB.php";
	 if(isset($_POST['submit'])){
	 	$openDB = new Database();
    	$con = $openDB->connect();
			saveVideo($con);
		$id = saveImg($con);
		saveLocation($con, $id);


		$_SESSION['id_event'] = $id;
		$_SESSION['email'] = "noey@gmail.com";
    	header('location:detailEvent.php');
}


?>
>>>>>>> 7cb67a5019ba1129ee731f285c852d1fcac9f0e7
