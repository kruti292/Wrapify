<html>
<head>
 <?php include "header.php"; ?>
  
</head>
<body>
<?php include "nav1.php"; ?>
<!-- carousel start-->
<div id="demo" class="carousel slide" data-ride="carousel" style="margin-top:2px">

	<ul class="carousel-indicators">
	<li data-target="#demo" data-slide-to="0" class="active"></li>
	<li data-target="#demo" data-slide-to="1"></li>
	<li data-target="#demo" data-slide-to="2"></li>
	</ul>

<div class="carousel-inner">
	<div class="carousel-item active">
	<img src = "myimages/3_1.webp" width="100%" height=400px>
	</div>
	<div class="carousel-item">
	<img src = "myimages/3_2.webp" width="100%" height=400px>
	</div>
	<div class="carousel-item">
	<img src = "myimages/3_3.webp" width="100%" height=400px>
	</div>
<div>	
	
	<a class="carousel-control-prev" href="#demo" data-slide="prev">
	<span class="carousel-control-prev-icon"></span>
	</a>
	
	<a class="carousel-control-next" href="#demo" data-slide="next">
	<span class="carousel-control-next-icon"></span>
	</a>
		
</div>
</div>
</div>
<!-- carousel end-->
<div class="container" style = "margin-top : 50px">
<h2 class="text-center" style = "font-family:Monotype Corsiva ; color : red">Our Product categories</h2>
<center><img src="myimages2/line1.jpg" style = "height:20px;width:500px"></center>

<?php 
include "dbconfigure.php";
$query = "select * from category";
$rs = my_select($query);
echo "<div class='row'>";
while($row = mysqli_fetch_array($rs))
{
echo "<div class='col-sm-4'>";
echo "<br>";
echo "<h2 class='text-center' style='font-family:Forte ; color:#E0033A'>$row[1]</h2>";
$loc = "admin/".$row[2];
echo "<a href = 'giftbycategory.php?category=$row[0]&categoryname=$row[1]'><img class='zoom' src='$loc' style='width:340px ; height:236px ; margin-top:20px;'></a>";
echo "</div>";
}
echo "</div>";
?>
<br><br>
<footer class="text-center" style="font-family:Forte ; color:#E0033A;font-size:25">
	Come be the part of wrapify family
</footer>
</body>
</html>