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
	class Anh{
		function __construct($tk,$anh,$background){
			$this->Tk = $tk;
			$this->Anh = $anh;
			$this->BackGround = $background;
		}
	}
	$anh = array();


	$sql="select tk,anh,background from nguoidung";

	$result = mysqli_query($conn, $sql);

	while($row = mysqli_fetch_assoc($result))
	{
		array_push($anh, new Anh($row["tk"],$row["anh"],$row["background"]));
	}
	echo json_encode($anh);
	mysqli_close($conn);
?>