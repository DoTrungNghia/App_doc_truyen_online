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
	$Anh = isset($_POST['anh']) ? $_POST['anh'] : '';

	// $Tk = 'nhat';

	$sql="update nguoidung set anh = '$Anh' where tk = '$Tk'";


	if($conn->query($sql) === TRUE)
	{
		echo "Update thành công";
	}else{
		 echo "Lỗi";
	}
	mysqli_close($conn);
?>
