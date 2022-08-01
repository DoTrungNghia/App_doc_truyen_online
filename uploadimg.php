<?php
 	$taget_dir = "/upload/images";
 	$image = $_POST['anh'];
 	if(!file_exists($taget_dir))
 	{
 		//tạo upload/images folder
 		mkdir($taget_dir, 0777, true);
 	}
 	//đặt tên tệp hình ảnh ngẫu nhiên theo thời gian
 	$taget_dir = $taget_dir ."/".rand()."_".time()."jpeg";
 	if(file_put_contents($taget_dir, base64_decode($image))){
 		echo json_encode([
 			"Message" => "Tập tin đã được tải lên!",
 			"Status" => "Ok"]);
 	}else{
 		 echo json_encode([
 			"Message" => "Xin lỗi, đã xảy ra lỗi khi tải tệp của bạn lên!",
 			"Status" => "Error"]);
 	}

?>