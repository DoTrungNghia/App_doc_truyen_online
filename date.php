<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "doctruyen_online";

	$conn = mysqli_connect($servername, $username, $password, $dbname);
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	// $tk = $_POST['tk'];
	$tk = isset($_POST['tk']) ? $_POST['tk'] : ''; 


	// $tk = 'trung';

	$sql="select * from nguoidung where tk = '$tk'";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$text = ($row["date"]);
		echo $text;
	}else{
		 echo json_encode("Lỗi");
	}
	mysqli_close($conn);
?>