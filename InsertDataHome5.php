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
	class Truyen{
		function __construct($truyen_ma, $truyen_ten, $truyen_loai, $truyen_theloai, $truyen_tacgia, $truyen_mota, $truyen_ngaydang, $truyen_hinhdaidien, $truyen_background, $so_chuong, $luot_doc, $luot_binh_chon, $luot_binh_luan){
			$this -> Id = $truyen_ma;
			$this -> TenTruyen = $truyen_ten;
			$this -> LoaiTruyen = $truyen_loai;
			$this -> TheLoai = $truyen_theloai;
			$this -> TacGia = $truyen_tacgia;
			$this -> MoTa = $truyen_mota;
			$this -> NgayDang = $truyen_ngaydang;
			$this -> AnhTruyen = $truyen_hinhdaidien;
			$this -> HinhNen = $truyen_background;
			$this -> SoChuong = $so_chuong;
			$this -> LuotDoc = $luot_doc;
			$this -> LuotBinhChon = $luot_binh_chon;
			$this -> LuotBinhLuan = $luot_binh_luan;
		}
	}

	//2. Tạo mảng
	$mangTruyen = array();

	$sql = "SELECT truyen.truyen_ma, truyen_ten, truyen_loai, truyen_theloai, truyen_tacgia, truyen_mota, truyen_ngaydang,truyen_hinhdaidien, truyen_background, COUNT(chuong_id) as so_chuong, SUM(luot_doc) as luot_doc, SUM(luot_binh_chon) as luot_binh_chon, SUM(luot_binh_luan) as luot_binh_luan from chuong, truyen where truyen.truyen_ma = chuong.truyen_ma
		and truyen_loai = 1
		GROUP by truyen_ma";
	$data = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_assoc($data)) {
	//3. đưa dữ liệu vào mảng.
	 array_push($mangTruyen, new Truyen($row['truyen_ma'], $row['truyen_ten'], $row['truyen_loai'], $row['truyen_theloai'], $row['truyen_tacgia'], $row['truyen_mota'], $row['truyen_ngaydang'], $row['truyen_hinhdaidien'], $row['truyen_background'], $row['so_chuong'], $row['luot_doc'], $row['luot_binh_chon'], $row['luot_binh_luan']));
	}

	echo json_encode($mangTruyen);

?>