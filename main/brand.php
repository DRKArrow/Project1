<?php
if(!isset($activepage))
{
header("Location: ../index.php");
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<style>
	.outside{width:100%;background:black}
	.brand {width:55%;height:20vh;margin:auto;position:relative;display: table;vertical-align:middle;padding-bottom:3vh}
	.brand ul li {
    list-style: none;
	}
	.brand h1{color:white;font-weight:800}
	.brandcontent {width:85%;height:100%;float:left;padding-left:1vh;}
	.brand p {
    margin: 0 0 1em 0;
	}
	span{
		color:darkgrey;
		text-align:justify
	}
	.brand ul li:first-child {
    width: 15%;
    float: left;
	}
</style>
</head>

<body>
<?php 
if(isset($_GET['brand']))
	{
		$brand=$_GET['brand'];
		$sql="select * from tblnsx";
		$sqlb="select * from tblnsx where mansx='$brand'";
		$result=mysqli_query($con,$sql);
		$resultb=mysqli_query($con,$sqlb);
		$sqlgt="select * from tblnsx";
		$resultgt=mysqli_query($con,$sqlgt);
		$rowb=mysqli_fetch_array($resultb)
	?>
   <div class="outside">
	<div class="brand">
    	<h1 align="center">
		<?php
		 echo $rowb['tennsx'];
		?></h1>
    	<ul>
        	<li>
        	<?php
			while($row=mysqli_fetch_array($result))
				{
					if($row['mansx']==$brand)
					{
				?>
                		<img src="Images/giaodien/<?php echo $row['mansx'];?>logo.jpg" style="max-height:20vh;vertical-align:middle" align="right">
               	<?php
					}
				}
			?>
            </li>
        	<li class="brandcontent">
            	<span>
                	<p></p>
                    <p>
	<?php
			while($rowgt=mysqli_fetch_array($resultgt))
				{
					if($rowgt['mansx']==$brand)
					{
				?>
                		<span style="vertical-align:middle;font-family:'lucida sans unicode', 'lucida grande', sans-serif;font-size:13px;">&nbsp;<?php echo $rowgt['gioithieunsx'];?></span>
               	<?php
					}
				}
	?>
   					</p>
    			</span>
    		</li>
        </ul>
	</div>
 </div>
    <?php
	}
	?>
</body>
</html>