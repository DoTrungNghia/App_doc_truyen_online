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
	$Background = isset($_POST['background']) ? $_POST['background'] : '';

	// $Tk = 'nhat';

	$sql="update nguoidung set background = '$Background' where tk = '$Tk'";


	if($conn->query($sql) === TRUE)
	{
		echo "Update thành công";
	}else{
		 echo "Lỗi";
	}
	mysqli_close($conn);
?>
