<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<?php
	if(isset($_POST["ddlDM"]) &&  isset($_POST["txtTensp"]) && isset($_POST["txtGia"]) && isset($_POST["ddlTT"]) && isset($_POST["txtMota"]) && isset($_POST["ddlNsx"]) && isset($_FILES["file"]))
	{
		include ("../../../ConnectDb/open.php");
		$ten=$_POST["txtTensp"];
		$checktensp=mysqli_query($con,"select * from tblsanpham where tensp='$ten'");
		if(mysqli_num_rows($checktensp)!=0)
		{
			header("Location: ../../giaodien.php?page=2&err=1");
		}
		else
		{
			$maDM=$_POST["ddlDM"];
			$gia=$_POST["txtGia"];
			$tinhtrang=$_POST["ddlTT"];
			$mota=$_POST["txtMota"];
			$nsx=$_POST["ddlNsx"];
			$ma1=$nsx . "-";
					$resultmax=mysqli_query($con,"select count(*) as maxMa from tblsanpham where mansx='$nsx'"); //Lấy về max mã để ghép chuỗi
					$rowmax=mysqli_fetch_array($resultmax);		
					$maxma=$rowmax["maxMa"];
					$masp=$maxma+1; //Cộng thêm 1 vào max mã để ra mã mới
			if(strlen($masp) ==1)
			{
				$ma2="00" . $masp ;
			}else if(strlen($masp) ==2)
			{
				$ma2="0" . $masp ;
			}
			$ma3="-" . $maDM;
			$ma=$ma1 . $ma2 . $ma3;
			$path = "../../../Images/hanghoa/"; // Thư mục upload
			$valid_formats = array("jpg", "png", "gif", "bmp","PNG",'JPG','GIF'); // Các đuôi file cho phép
			$valid_type = array('image/gif','image/jpeg','image/png','image/bmp'); //Các định dạng cho phép
			$name = $_FILES['file']['name']; // Lấy tên
			$size = $_FILES['file']['size']; // Lấy kích thước
			$type = $_FILES['file']['type']; // Lấy kiểu file
			if (strlen($name)) { // Kiểm tra xem đã có file nào được chọn
				list($txt, $ext) = explode(".", $name); // Lấy đuôi file sau dấu . vào biến $ext
				if (in_array($ext, $valid_formats)) { // Kiểm tra đúng với các đuôi file cho phép
					if(in_array($type, $valid_type)){ // Kiển tra định dạng (Content-Type) của file cho phép
						if ($size < (1024 * 1024)) { // Kiểm tra dung lượng file. Nếu nhỏ hơn 1 Mb = 1024 * 1024 thì tiếp tục
							$actual_image_name = $ma . "." . $ext; // Đổi tên file upload
							$tmp = $_FILES['file']['tmp_name']; // Lấy thư mục lưu tạm upload file
							if (move_uploaded_file($tmp, $path . $actual_image_name)) { // Di chuyển vào thư mục $path
								mysqli_query($con,"insert into tblsanpham values ('$ma','$ten',$gia,'Images/hanghoa/$actual_image_name',$tinhtrang,'$mota','$nsx','$maDM')");
							   header("Location: ../../giaodien.php?page=2&success=2");
							} else
								echo "Lỗi không xác đinh"; // Nếu di chuyển không thành công
						} else
							echo "Tối đa upload 1 MB"; // Nếu file upload lớn hơn 1 MB
					} else
					echo "Không đúng định dạng"; // Nếu Content-Type không nằm trong danh sách cho phép
				} else
					echo "Không đúng định dạng"; // Nếu đuôi file không nằm trong danh sách cho phép
			} else
				echo "Hãy chọn một hình ảnh !"; // Nếu chưa có file gì được gửi đên
			include ("../../../ConnectDb/close.php");
			}
		
	}else header("Location: ../../giaodien.php");

?>