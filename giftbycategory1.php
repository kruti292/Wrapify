<html>
<head>
<?php include "header.php";
session_start();
include "dbconfigure.php";

if(verifyuser())
{
$emailid = $_SESSION['semail'];
$query = "select * from siteuser where emailid='$emailid'";
$rs = my_select($query);
if($row=mysqli_fetch_array($rs))
{
$username = $row[0];
$city = $row[2];
$address = $row[3];
$contact = $row[5];
}
} 
else
{
header("location:index.php");
}
?>
<style>
.zoom:hover {
  -ms-transform: scale(1.8); /* IE 9 */
  -webkit-transform: scale(1.8); /* Safari 3-8 */
  transform: scale(1.8); 
}
</style>
</head>
<body>
<?php include "nav2.php";
$categoryid = $_GET['categoryid'];
$categoryname = $_GET['categoryname'];
$query = "select * from product where category='$categoryid'";
$rs = my_select($query);
?>


<div class="container" style = "margin-top:70px">
<h2 class="text-center" style = "font-family : Monotype Corsiva ; color : red"><?php echo strtoupper($categoryname); ?> <span style = "color : blue">Products</span></h2>

<?php 
while($row = mysqli_fetch_array($rs))
{
echo "<div class = container style = 'margin-top:50px'>";
echo "<div class = row>";
echo "<div class = col-sm-4>";
$loc = 'admin/'.$row[2];
echo "<center><img class='zoom' src = '$loc' width=150 height=150></center>"; 
echo "</div>";
echo "<div class = col-sm-8>";
echo "<h2 style = 'text-align : left ; color : red ; text-transform : capitalize'>$row[1]</h2>";
echo "<p><span style = 'color : blue ; font-weight : bold'>Price : </span>$row[4] Rs.</p>";
echo "<p><span style = 'color : blue ; font-weight : bold'>Description : </span> $row[5] </p>";
echo "<a class = 'btn btn-outline-success' href = 'booking1.php?id=$row[0]'>ADD TO CART</a>  ";
echo "<a class = 'btn btn-outline-success' href = 'booking.php?id=$row[0]'>BOOK NOW</a>";
echo "</div>";
echo "</div>";
echo "</div>";
}
?>
</div>
<br><br><br>
</body>
</html>
