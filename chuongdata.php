<?php 
/**
 * 
 */
class chuong
{
	
	function chuong($chuong_id,$chuong_so,$chuong_ten,$chuong_noidung,$truyen_id)
	{
		$this ->chuong_iD = $chuong_id;
		$this ->chuong_So = $chuong_so;
		$this ->chuong_Ten = $chuong_ten;
		$this ->chuong_Noidung = $chuong_noidung;
		$this ->truyen_iD = $truyen_id;
		
		
	}
}
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

$sql = "SELECT * FROM chuong";
$result = mysqli_query($conn, $sql);
$arrChuong = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Họ : " . $row["ten"]. "- Email: " . $row["email"]."- Tài khoản: " . $row["tk"]."- Mật khẩu: " . $row["mk"]."- Ngày sinh: " . $row["ngaysinh"]."- Ảnh " . $row["anh"]."- Background " . $row["background"]."- Comment " . $row["comment"]. "<br>";

    $ch = new chuong($row["chuong_id"], $row["chuong_so"], $row["chuong_ten"], $row["chuong_noidung"], $row["truyen_id"]);
    array_push($arrChuong, $ch);
  }

   echo json_encode($arrChuong);

  // echo '<pre>';
  // var_dump($arrND);
  // echo '</pre>';

} else {
  echo "0 results";
}

mysqli_close($conn);

 ?>