<?php
	if(!isset($_SESSION["user"]) || ($_SESSION["mapq"]==3) )
	{
		header("Location: ../../../index.php");
	}
	if(!isset($_GET["page"]))
	{
		header("Location:../../giaodien.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
<style>
	td:hover{background:lightgrey;}
	.box{    
	max-height: 300px;
	text-align: center;    
	position: relative;    
	overflow: hidden;
	}
 
	.box .box-content{    
	width: 100%;    
	height: 100%;
	position: absolute;    
	top: 0;    
	left: 0;    
	background: rgba(255, 255, 255, 0.6);    
	color: #f9eee8;    
	padding: 30px 20px;    
	transform: scale(0);    
	transition: all 0.5s ease 0s;
	}
	 
	.box:hover .box-content{    
	transform: scale(1);
	}
	 
	.box .title{  
	font-size: 30px;    
	font-weight: 900;  
	vertical-align:middle;
	text-align: center; 
	font-family:"Courier New", Courier, monospace;
	color:rgba(50,50,50,1.00);
	}


</style>
	
</head>

<body>
<?php
	if(isset($_GET["masp"]))
	{
		$ma=$_GET["masp"];
		$result=mysqli_query($con,"select * from tblsanpham inner join tblnsx on tblsanpham.mansx=tblnsx.mansx inner join tbldanhmuc on tblsanpham.madm=tbldanhmuc.madm where masp='$ma'");
		$resultdm=mysqli_query($con,"select * from tbldanhmuc");
		$row=mysqli_fetch_array($result);
	?>
	<form method="post" action="?page=22&masp=<?php echo $ma;?>" enctype="multipart/form-data" id="frmsuasp">
		<table cellspacing="0" align="center" class="table table-hover" style="width: 80%">
		<caption>Sửa sản phẩm<div style="float:right;"><a href="giaodien.php?page=2">Back</a></div></caption>
		<thead style="background-color: rgba(165,165,165,1.00)">
		<tr>
			<th>Ảnh sản phẩm</th>
			<th>Mã sản phẩm</th>
			<th>Tên sản phẩm</th>
			<th>Giá</th>
			<th>Tình trạng</th>
			<th>Nhà sản xuất</th>
			<th>Danh mục</th>
		</tr>
		</thead>
			<tr height="300px">
				<td align="center" id="imghover">
				<div class="box"><img src="../<?php echo $row['anh'];?>" height="300px" id="imgchange" alt=""> 
				<div class="box-content"> 
				 <h4 class="title">Sửa ảnh
				 </h4> 
					<div align="center" style="margin:10px">
						<input type="file" name="file" id="imgInp"/>
							<script>
						function readURL(input) {
								if (input.files && input.files[0]) {
									var reader = new FileReader();
									
									reader.onload = function (e) {
										$('#imgchange').attr('src', e.target.result);
									}
									
									reader.readAsDataURL(input.files[0]);
								}
							}
							
							$("#imgInp").change(function(){
								readURL(this);
							});
						</script>
					</div>
					<div align="center">
						<button class="btn" style="color:black" type="reset" onclick="toDefault()">Về mặc định</button>
						<script>
							function toDefault()
							{
								$('#imgchange').attr('src', '../<?php echo $row['anh'];?>');
							}
						</script>
						
					</div> 
				  </div>
				</div>
				</td>
				<td><?php echo $row["masp"]; ?></td>
				<td><input type="text" name="txtTen" value="<?php echo $row["tensp"]; ?>" style="width:400px" required></td>
				<td><input type="text" value="<?php echo $row["gia"]; ?>" name="txtGia" required/></td>
				<td>
				<select name="ddlTT">
					<option value="1" <?php if($row['tinhtrang']==1) { ?> selected="selected" <?php }?>>Còn hàng</option>
                    <option value="2" <?php if($row['tinhtrang']==2) { ?> selected="selected" <?php }?>>Hết hàng</option>
                </select></td>
				<td><?php echo $row["tennsx"]; ?></td>
				<td><?php echo $row['tendanhmuc'];?></td>
			</tr>
         <tfoot>
         	<tr>
            	<td colspan="7" align="center"><button class="btn btn-dark" type="submit">Sửa sản phẩm</button></td>
            </tr>
         </tfoot>
	</table>
	</form>
	<!-- Validate SCRIPT-->
		<script type="text/javascript">
            
            
        $(document).ready(function() {

            jQuery.validator.addMethod("noSpace", function(value, element) { 
              return value.indexOf(" ") < 0 && value != ""; 
            });
            //Khi bàn phím được nhấn và thả ra thì sẽ chạy phương thức này
            $("#frmsuasp").validate({
                        rules: {
							txtTen: "required",
                            txtGia: {
								required: true,
								noSpace: true,
								digits: true,
								range: [100000,100000000]
							}
                        },
                        messages: {
							txtTen: "Không được để trống !",
                            txtGia: {
								required: "Không được để trống !",
								noSpace: "Không nhập khoảng trắng !",
								digits: "Giá bạn vừa nhập không có thật !",
								range: "Giá bạn vừa nhập không có thật !"
							},
                        }
                    });
        });
        </script>
	<?php
		if(isset($_POST["txtTen"]))
		{
			$tennsx=$_POST["txtTen"];
			mysqli_query($con,"update tblnsx set tennsx='$tennsx' where mansx='$ma'");
			?>
			<meta http-equiv="refresh" content="0,giaodien.php?page=1" />
			<?php
		}
	}else header("Location: ../../giaodien.php");
?>
</body>
</html>