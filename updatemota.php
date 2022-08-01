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
	$Mota = isset($_POST['mota']) ? $_POST['mota'] : '';

	// $Tk = 'nhat';
	// $Mota = 'Ninh Bình';

	$sql="update nguoidung set mota = '$Mota' where tk = '$Tk'";


	if($conn->query($sql) === TRUE)
	{
		echo json_encode("Update thành công", JSON_UNESCAPED_UNICODE);//response sẽ là chuỗi này
	}else{
		 echo json_encode("Lỗi", JSON_UNESCAPED_UNICODE);
	}
	mysqli_close($conn);
?>