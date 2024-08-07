<?php 
session_start();
include "dbconfigure.php";
if(verifyuser())
{
$name = $_SESSION['sun'];

}
else
{
header("location:index.php");
}
?>

<html>
<head>
  <?php include "header.php"; ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "nav2.php"; 
echo " Welcome <b style = 'color : green ; text-transform:capitalize'>$name</b>";
?>

<style>
.glow {
  font-size: 80px;
  color: #fff;
  text-align: center;
  -webkit-animation: glow 1s ease-in-out infinite alternate;

}

@-webkit-keyframes glow {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #e60073, 0 0 40px #e60073, 0 0 50px #e60073, 0 0 60px #e60073, 0 0 70px #e60073;
  }

  to {
    text-shadow: 0 0 20px #fff, 0 0 30px #ff4da6, 0 0 40px #ff4da6, 0 0 50px #ff4da6, 0 0 60px #ff4da6, 0 0 70px #ff4da6, 0 0 80px #ff4da6;
  }
}



.prjdiv:hover{
transform:translateY(-10px)
}
div .container1{


background-color:lightgrey;
border-radius:8px;
}
h2, h4{
 padding:10Px;
}

</style>


<div class="container" style="margin-top:10%;">
    <div class="row text-center">
        <div class="col-md-4 prjdiv">
            <div class="container1">
            <h2 style="color:blue"><?php echo totalbookings();?></h2>
            <a href="viewbooking.php"><h4 style="color:black">Total Bookings</h4>

        </a>
            </div>
        </div>
        <div  class="col-md-4 prjdiv">
            <div class="container1">
            <h2 style="color:blue"><?php echo totalcustomers();?></h2>
            <a href="viewcustomer.php"><h4 style="color:black">Total Customers</h4>

            </a>
       </div>
        </div>
        <div  class="col-md-4 prjdiv">
             <div class="container1">
            <h2 style="color:blue"><?php echo totalproducts();?></h2>
            <a href="viewproduct.php"><h4 style="color:black">Total Products</h4>
        </a>
             </div>
        </div>
         
    </div>
</div>




	
</body>
</html>

<?php 
function totalbookings()
{
$query = "select * from booking";
$rs = my_select($query);
$n = mysqli_num_rows($rs);
return $n;
}

function totalcustomers()
{
$query = "select * from siteuser";
$rs = my_select($query);
$n = mysqli_num_rows($rs);
return $n;
}

function totalproducts()
{
$query = "select * from product";
$rs = my_select($query);
$n = mysqli_num_rows($rs);
return $n;
}
?>

