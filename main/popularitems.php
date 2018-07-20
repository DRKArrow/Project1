<?php
	if(!isset($activepage))
	{
		header("Location: ../index.php");
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<!-- include jQuery + carouFredSel plugin -->
<script type="text/javascript" language="javascript" src="jquery.carouFredSel-6.2.1-packed.js"></script>


<!-- fire plugin onDocumentReady -->
<script type="text/javascript" language="javascript">
			$(function() {

				$('#foo7').carouFredSel({
					responsive: true,
					width: '100%',
					scroll: 1,
					items: {
						width: 230,
					//	height: 200,	//	optionally resize item-height
						visible: {
							min: 2,
							max: 6
						}
					}
				});

				$('#foo8').carouFredSel({
					width: '100%',
					scroll: 1
				});

			});
		</script>
<style>
.containercar1{width:100%;margin: auto}
.list_carousel1 {
background-color: black;
margin: 0 0 30px 60px;
border-left:3px solid white;
border-right:3px solid white;
border-bottom:3px solid white;
}
.list_carousel1 ul {
margin: 0;
padding: 0;
list-style: none;
display: block;
}
.list_carousel1 li {
width: 200px;
height:300px;
padding: 0;
margin: 10px;
display: block;
float: left;
}
.list_carousel1.responsive1 {
width: auto;
margin-left: 0;
}

.list_carousel1.responsive1 ul li img{height:300px;}

.box1{    
max-height: 300px;
max-width: 200px;
text-align: center;    
position: relative;    
overflow: hidden;
}
 
.box1 img{    
height: 100%;
width: 100%;
max-height:300px;
max-width:200px;
}
 
.box1 .heading1{  
width: 100%;    
position: absolute; 
bottom: 0;  
left: 0;    
background: rgba(12, 12, 12,0.6);    
color: #ffffff; 
text-align: center; 
padding: 20px 0;    
transition: all 0.5s ease 0s;   
font-family: Arial, Helvetica, sans-serif;
}

.box1 .heading1 h3{   
margin: 0;  
font-size: 12px;    
font-weight: 800;   
font-family: Verdana, Arial, Helvetica, sans-serif;
}



@media only screen and (max-width: 990px){    
.box1{ 
margin-bottom: 20px; 
}
}
   
}
</style>
</head>

<body>
<?php
	include("ConnectDb/open.php");
	$sql="select masp,sum(soluong) as soLuongsanpham from tblhoadonchitiet group BY masp order by soLuongsanpham desc limit 10";
	$resultBanChay=mysqli_query($con,$sql);
	?>
<div class="containercar1">
<div class="list_carousel1 responsive1">
<ul id="foo7">
<?php
	while($rowBanChay=mysqli_fetch_array($resultBanChay))
	{
		$masp=$rowBanChay['masp'];
		$result=mysqli_query($con,"select * from tblsanpham where masp='$masp'");
		$row=mysqli_fetch_array($result);
		?>
		<li><div class="box1"><a href="sanPhamChiTiet.php?masp=<?=$masp?>"><img src="<?php echo $row['anh'];?>"></a>            
                            <div class="heading1"> 
                             <h3><?php echo $row['tensp'];?></h3> 
                            </div> 
                           </div> </a></li>
        				
        
		<?php
	}	
	include("ConnectDb/close.php");
?>
</ul>
</div>
</div>
</body>
</html>