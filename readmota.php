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

	$Tk = isset($_POST['tk']) ? $_POST['tk'] : '';
	
	// $Tk = 'nhat';

	$sql="Select mota from nguoidung where tk = '$Tk'"; 
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0)
	{	
		$row = mysqli_fetch_assoc($result);
		$text = ($row["mota"]);//response sẽ chính là chuỗi "mota"
		echo $text;
	}else{
		echo json_encode("Lỗi.", JSON_UNESCAPED_UNICODE);//response khi báo lỗi
	}
	mysqli_close($conn);
?>