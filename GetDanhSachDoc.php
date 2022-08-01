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
	// class Truyen{
	// 	function __construct($tk, $truyen_hinhdaidien, $truyen_ten, $truyen_mota, $so_chuong, $luot_doc, $luot_binh_chon){
	// 		$this -> TK = $tk;
	// 		$this -> AnhTruyen = $truyen_hinhdaidien;
	// 		$this -> TenTruyen = $truyen_ten;
	// 		$this -> MoTa = $truyen_mota;
	// 		$this -> SoChuong = $so_chuong;
	// 		$this -> LuotDoc = $luot_doc;
	// 		$this -> LuotBinhChon = $luot_binh_chon;
	// 	}
	// }
		class Truyen{
		function __construct($tk, $truyen_ma, $truyen_tacgia, $truyen_hinhdaidien, $truyen_ten,  $luot_doc, $luot_binh_chon, $so_chuong, $truyen_mota, $luot_binh_luan){
			$this -> TK = $tk;
			$this -> Id = $truyen_ma;
			$this -> TacGia = $truyen_tacgia;
			$this -> AnhTruyen = $truyen_hinhdaidien;
			$this -> TenTruyen = $truyen_ten;
			$this -> LuotDoc = $luot_doc;
			$this -> LuotBinhChon = $luot_binh_chon;
			$this -> SoChuong = $so_chuong;
			$this -> MoTa = $truyen_mota;
			$this -> LuotBinhLuan = $luot_binh_luan;
		}
	}

	//2. Tạo mảng
	$mangTruyen = array();
	$sql = "SELECT tk, truyen.truyen_ma, truyen_tacgia, truyen_hinhdaidien, truyen_ten, SUM(luot_doc) as luot_doc, SUM(luot_binh_chon) as luot_binh_chon, COUNT(chuong_id) as so_chuong, truyen_mota, SUM(luot_binh_luan) as luot_binh_luan FROM truyen, chuong, nguoidung, danhsachdoc WHERE truyen.truyen_ma = chuong.truyen_ma and truyen.truyen_ma = danhsachdoc.maTruyen and nguoidung.tk = danhsachdoc.tkNguoiDung GROUP BY tk";
	$data = mysqli_query($conn, $sql);
	while($row = mysqli_fetch_assoc($data)){
			//3. đưa dữ liệu vào mảng.
		 	array_push($mangTruyen, new Truyen(
		 		$row['tk'],
		 		$row['truyen_ma'],
		 		$row['truyen_tacgia'],
		 		$row['truyen_hinhdaidien'], 
		 		$row['truyen_ten'],
		 		$row['luot_doc'],
		 		$row['luot_binh_chon'], 
		 		$row['so_chuong'],
		 		$row['truyen_mota'], 
		 		$row['luot_binh_luan']
		 	));
				// array_push($mangTruyen, array(
		 	// 	"Name" => $row['truyen_hinhdaidien'], 
		 	// 	"Name" =>$row['truyen_ten'],
		 	// 	"Name" =>$row['truyen_mota'],
		 	// 	"Name" =>$row['so_chuong'], 
		 	// 	"Name" =>$row['luot_doc'], 
		 	// 	"Name" =>$row['luot_binh_chon']));
	}
	echo json_encode($mangTruyen);
