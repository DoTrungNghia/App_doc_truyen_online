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
	$tk = isset($_POST['tk']) ? $_POST['tk'] : '';
	$mk = isset($_POST['mk']) ? $_POST['mk'] : '';

	$sql="select * from nguoidung where tk = '$tk' and mk = '$mk'";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0)
	{
		// $row = mysqli_fetch_assoc($result);
		// echo json_encode($row['tk']);
		echo "Thành công";
	}else{
		 echo "Lỗi";
	}
	mysqli_close($conn);
?>