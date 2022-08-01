<?php 

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "doctruyen_online";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


		$date = date("Y-m-d");
		$tk = isset($_POST['tk']) ? $_POST['tk'] : '';
		$mk = isset($_POST['mk']) ? $_POST['mk'] : '';
		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$ngaysinh = isset($_POST['ngaysinh']) ? $_POST['ngaysinh'] : '';
		
		// $tk = $_POST["tk"];
		// $mk = $_POST["mk"];
		// $email = $_POST["email"];
		// $ngaysinh = $_POST["ngaysinh"];

		// $date = '2022-10-06';
		// $tk = 'hung';
		// $mk = '123';
		// $email = 'hung@gmail.com';
		// $ngaysinh = '2001-01-30';

//bắt lỗi tk, email tồn tại
	$sql = "SELECT * FROM nguoidung WHERE tk = '$tk'";
	$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
			$row = mysqli_fetch_assoc($result);
			if($tk == $row['tk'])
			{
				echo "Tài khoản này đã được sử dụng.";
			}
			// if($email == $row['email'])
			// {
			// 	echo "Địa chỉ email này đã được đăng ký rồi.";
			// }
} 
else {
	$insert = "INSERT INTO nguoidung VALUES('$email', '$tk', '$mk', '$ngaysinh', '', '', '', '', '$date')";
	$response = mysqli_query($conn, $insert);

	if(mysqli_num_rows($response) === TRUE){

		$row = mysqli_fetch_assoc($response);
		$text = ($row["Y-m-d"]);
		echo $text;
		// echo json_encode("Thành công");
	}else{
		  echo "Lỗi";
	}
}

mysqli_close($conn);

?>