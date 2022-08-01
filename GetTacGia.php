<?php 
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "doctruyen_online";
	// $servername = "localhost";
	// $username = "qrnbpzdj_nhat";
	// $password = "nhat0364949901";
	// $dbname = "qrnbpzdj_doctruyen_online";
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	mysqli_query($conn, "SET NAMES 'utf8'");
	// Check connection
	if (!$conn) {
	  die("Connection failed: " . mysqli_connect_error());
	}

	// 1: Tạo class
	class TacGia{
		function __construct($truyen_ma, $truyen_tac_gia, $anh){
			$this -> Id = $truyen_ma;
			$this -> TenTacGia = $truyen_tac_gia;
			$this -> Background = $anh;
		}
	}

	//2. Tạo mảng
	$mangTacGia = array();

	$sql = "SELECT truyen_ma, truyen_tacgia, anh from truyen, nguoidung WHERE truyen.truyen_tacgia = nguoidung.tk";
	$data = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($data)) {
	//3. đưa dữ liệu vào mảng.
	 array_push($mangTacGia, new TacGia($row['truyen_ma'], $row['truyen_tacgia'], $row['anh']));
	}

	echo json_encode($mangTacGia);

?>