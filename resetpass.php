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
	$Tk = $_POST['tk'];
	$mkcu = $_POST['mk'];
	$mkmoi = $_POST['mkmoi'];
	$nhaplaimk = $_POST['nhaplaimk'];

	$sql="select * from nguoidung where tk = '$Tk' and mk = '$mkcu'"; 

	$result = mysqli_query($conn, $sql);
	if($mkmoi == $nhaplaimk)
	{
		if(mysqli_num_rows($result) <= 0)
		{
			echo json_encode("Mat khau cu khong khop!");
		}else{
			$sql_update = "update nguoidung set mk = '$mkmoi' where tk = '$Tk'";
			$res = mysqli_query($conn, $sql_update);
			if($res)
			{
				echo json_encode("Doi thanh cong!");
			}else{
				echo "Lỗi";
			}
		}
	}else{
		echo json_encode("Mat khau khong khop!");
	}
	mysqli_close($conn);
?>