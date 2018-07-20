<meta charset="utf-8">
<?php
	if(isset($_GET['masp']))
	{
		if(isset($_POST['txtGia']) && isset($_POST['ddlTT']) && isset($_POST['txtTen']) && isset($_FILES['file']))
		{
			$ma=$_GET['masp'];
			$gia=$_POST['txtGia'];
			$tt=$_POST['ddlTT'];
			$ten=$_POST['txtTen'];
			$result=mysqli_query($con,"select * from tblsanpham where masp='$ma'");
			$row=mysqli_fetch_array($result);
			$path = "../Images/hanghoa/"; 
			$valid_formats = array("jpg", "png", "gif", "bmp","PNG",'JPG','GIF'); 
			$valid_type = array('image/gif','image/jpeg','image/png','image/bmp');
			$name = $_FILES['file']['name'];
			$size = $_FILES['file']['size'];
			$type = $_FILES['file']['type']; 
			if (strlen($name)) { 	
				list($txt, $ext) = explode(".", $name); 
				if (in_array($ext, $valid_formats)) { 
					if(in_array($type, $valid_type)){ 
						if ($size < (1024 * 1024)) { 
							$actual_image_name = $ma . "." . $ext; 
							$tmp = $_FILES['file']['tmp_name'];
							if (move_uploaded_file($tmp, $path . $actual_image_name)) { 
								mysqli_query($con,"update tblsanpham set tensp='$ten',gia='$gia', tinhtrang='$tt', anh='Images/hanghoa/$actual_image_name' where masp='$ma'");
							   ?>
								<meta http-equiv="refresh" content="0,giaodien.php?page=2&success=3" />
								<?php
							}
						}
					}
				} 
			} 
			else
			{
				mysqli_query($con,"update tblsanpham set tensp='$ten',gia='$gia', tinhtrang='$tt' where masp='$ma'");
				?>
				<meta http-equiv="refresh" content="0,giaodien.php?page=2&success=3" />
				<?php
			}
		}
	}else header("Location: ../../giaodien.php?page=2");
?>