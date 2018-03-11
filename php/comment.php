<?php

    function showComment($con){
    	if( isset($_POST['eventid'])){
		    	$eventid = $_POST['eventid'];
		    	$sql = "SELECT * FROM comment WHERE eventid = '$eventid'";
		    	$result = $con->query($sql);
		    	while ($row = $result->fetch(PDO::FETCH_ASSOC)){
						echo "<div id='com'>";
				    echo $row['user']."<br>";
				    echo substr($row['datetime'],8,2)."-".substr($row['datetime'],5,2)."-".substr($row['datetime'],0,4)." ".substr($row['datetime'],11,5)." น."."<br>";
				    echo nl2br($row['message'])."<br>";
				echo "</div>";
				}
   		 }
	}


?>
