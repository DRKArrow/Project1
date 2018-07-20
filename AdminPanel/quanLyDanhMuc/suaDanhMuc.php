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
<style>
	td:hover{background:lightgrey;}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
</head>

<?php
	if(isset($_GET["madm"]))
	{
		$ma=$_GET["madm"];
		$result=mysqli_query($con,"select * from tbldanhmuc where madm='$ma'");
		$row=mysqli_fetch_array($result);
	?>
	<form method="post" action="?page=61&madm=<?php echo $ma;?>" id="frmsuadm">
		<table cellspacing="0" align="center" class="table table-hover" style="width: 50%;margin-top: 50px">
		<caption>Sửa nhà sản xuất<div style="float:right"><a href="?page=6">Back</a></div></caption>
		<thead style="background-color: rgba(188,188,188,1.00)">
		<tr>
			<th scope="col">Mã danh mục</th>
			<th scope="col">Tên danh mục</th>
		</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $row["madm"]; ?></td>
				<td><input type="text" name="txtTen" value="<?php echo $row["tendanhmuc"]; ?>" /></td>
			</tr>
		</tbody>
		<tfoot>
			<tr>
				<td colspan="2" align="center"><button class="btn btn-dark" type="submit">Sửa danh mục</button></td>
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
            $("#frmsuadm").validate({
                        rules: {
							txtTen: "required",
                        },
                        messages: {
							txtTen: "Không được để trống !",
                        }
                    });
        });
        </script>
	<?php
		if(isset($_POST["txtTen"]))
		{
			$tendm=$_POST["txtTen"];
			mysqli_query($con,"update tbldanhmuc set tendanhmuc='$tendm' where madm='$ma'");
			?>
			<meta http-equiv="refresh" content="0,giaodien.php?page=6&success=3" />
			<?php
		}
	}else header("Location: ../../giaodien.php");
?>