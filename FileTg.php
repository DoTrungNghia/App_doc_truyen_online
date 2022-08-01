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
	
	class Chuong
	{
		
		function __construct($chuong_id, $truyen_ma, $chuong_so, $chuong_ten, $chuong_noidung, $luot_doc, $luot_binh_chon, $luot_binh_luan)
		{
			$this -> IdChuong = $chuong_id;
			$this -> Id = $truyen_ma;
			$this -> ChuongSo = $chuong_so;
			$this -> ChuongTen = $chuong_ten;
			$this -> ChuongNoiDung = $chuong_noidung;
			$this -> ChuongLuotDoc = $luot_doc;
			$this -> ChuongLuotBinhChon = $luot_binh_chon;
			$this -> ChuongLuotBinhLuan = $luot_binh_luan;
		}
	}

	$mangTruyen = array();

	$query = "Select * from chuong ";
	if ($data = mysqli_query($conn, $query)) {
		while ($row = mysqli_fetch_assoc($data)){
		array_push($mangTruyen, new Chuong($row['chuong_id'], $row['truyen_ma'], $row['chuong_so'], $row['chuong_ten'], $row['chuong_noidung'], $row['luot_doc'], $row['luot_binh_chon'], $row['luot_binh_luan']));
		}
		echo json_encode($mangTruyen);

	}
	else
		echo "Lỗi";

	mysqli_close($conn);

?>