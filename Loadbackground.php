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
	class Background{
		function __construct($anhnen){
			$this->Background = $anhnen;
		}
	}
	$anhnen = array();
	// $tk = $_POST['tk'];
	// $tk = isset($_POST['tk']) ? $_POST['tk'] : ''; 
	 // $tk = 'nghia';
	 $tk = 'trung';

	$sql="select background from nguoidung where tk = '$tk'";

	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0)
	{
		$row = mysqli_fetch_assoc($result);
		array_push($anhnen, new Background($row["background"]));
		echo json_encode($anhnen, JSON_UNESCAPED_UNICODE);
	}else{
		 echo ("Lỗi");
	}
	mysqli_close($conn);
?>
