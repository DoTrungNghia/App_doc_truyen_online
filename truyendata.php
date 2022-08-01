<?php 
/**
 * 
 */
class truyen
{
	
	function truyen($truyen_id,$truyen_ma,$truyen_ten,$truyen_loai,$truyen_theloai,$truyen_tacgia,$truyen_mota,$truyen_ngaydang,$truyen_hinhdaidien,$truyen_background)

	{
		$this ->truyen_iD = $truyen_id;
		$this ->truyen_Ma = $truyen_ma;
		$this ->truyen_Ten = $truyen_ten;
		$this ->truyen_Loai = $truyen_loai;
		$this ->truyen_Theloai = $truyen_theloai;
		$this ->truyen_Tacgia = $truyen_tacgia;
		$this ->truyen_Mota = $truyen_mota;
		$this ->truyen_Ngaydang = $truyen_ngaydang;
		$this ->truyen_Hinhdaidien = $truyen_hinhdaidien;
		$this ->truyen_Background = $truyen_background;

		
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

$sql = "SELECT * FROM truyen";
$result = mysqli_query($conn, $sql);
$arrTruyen = [];

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    //echo "id: " . $row["id"]. " - Họ : " . $row["ten"]. "- Email: " . $row["email"]."- Tài khoản: " . $row["tk"]."- Mật khẩu: " . $row["mk"]."- Ngày sinh: " . $row["ngaysinh"]."- Ảnh " . $row["anh"]."- Background " . $row["background"]."- Comment " . $row["comment"]. "<br>";

    $tr = new truyen($row["truyen_id"], $row["truyen_ma"], $row["truyen_ten"], $row["truyen_loai"], $row["truyen_theloai"], $row["truyen_tacgia"], $row["truyen_mota"], $row["truyen_ngaydang"], $row["truyen_hinhdaidien"], $row["truyen_background"]);
    array_push($arrTruyen, $tr);
  }

   echo json_encode($arrTruyen);//Định dạng xuất ra json

  // echo '<pre>';
  // var_dump($arrND);
  // echo '</pre>';

} else {
  echo "0 results";
}

mysqli_close($conn);

 ?>