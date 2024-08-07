<?php 
session_start();
include "dbconfigure.php";

if(verifyuser())
{
$u = $_SESSION['semail'];
$query = "select * from siteuser where emailid='$u'";
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
header("location:login.php");
}
?>
<html>
<head>
<?php include "header.php"; ?>



</head>
<body>
<?php include "nav2.php";
echo "<br>Welcome <b style = 'text-transform : capitalize ; color : blue'>$username</b>";
 ?>

<div class="container" style = "margin-top:20px">
<h2 class="text-center" style = "font-family : Monotype Corsiva ; color : red">All Product Categories</h2>
<br>
<center><img src="myimages/line1.jpg" style ="height:20px ; width : 500px" ></center>
<br>
<?php 
$query = "select * from category";
$rs = my_select($query);
?>
<div class = "row">
<?php 
while($row=mysqli_fetch_array($rs))
{
?>
<div class="col-sm-4 mydivstyleone text-center">
<h4 class = "text-center headingfour" style = "font-family : Monotype Corsiva ; color : red"><?= $row[1]?></h4> 
<a href = "giftbycategory1.php?categoryid=<?=$row[0]?>&categoryname=<?=$row[1]?>"><img src="admin/<?=$row[2]?>" class="img-thumbnail" style = "width:304px; height : 236px"> </a> 
</div>
<?php 
}
?>

</div>
</div>
<br><br><br><br>

<!--scrolltop start-->
<div class="scrolltop float-right">
  <i class="fa fa-arrow-up" onclick="topFunction()" id="scrollbtn"></i>
  </div>
  <script>
  scrollbutton = document.getElementById("scrollbtn"); 
  window.onscroll = function(){scrollFunction()};
  
  function scrollFunction()
  {
  if(document.body.scrollTop>20 || document.documentElement.scrollTop>20)
  {
  scrollbutton.style.display="block";
  }
  else
  {
  scrollbutton.style.display="none";
  }
  }
  
  function topFunction()
  {
  document.body.scrollTop = 0;//safari
  document.documentElement.scrollTop = 0;//for chrome
  }
  </script>
  
 <!--scrolltop end--> 
</body>
</html>