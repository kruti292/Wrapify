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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php include "nav1.php"; 
$bookingid = $_GET['id'];
?>


<div class="container" style = "margin-top:70px">
<h2 class="text-center" style = "font-family : Monotype Corsiva ; color : red">Assign Status</h2>
<div class="form-group">
<form method = post>
<label><b>Booking ID</b></label>
<input type = text value = <?php echo $bookingid;?> readonly name = adminname class="form-control">

<label><b>Status</b></label>
<select name = status class = "form-control">
<option value = "Ordered Placed">Ordered Placed</option>
 <option value = "In Delivery">In Delivery</option>
 <option value = "Delivered">Delivered</option>
</select>
<br>
<br>
<input type = submit name = submit value = "Submit" class="btn btn-primary form-control" >
</form>
</div>
</div>
</body>
</html>
<?php 


if(isset($_POST['submit']))
{

$status = $_POST['status'];

$query = "update booking set status='$status' where id=$bookingid";
$n = my_iud($query);
if($n == 1)
{
echo '<script>
swal({
    text: "Status changed!",
    icon: "success",
}).then(function() {
    window.location.href = "viewbooking.php";
    });
</script>';
}
else
{
echo '<script>alert("Something Went Wrong!")</script>' ;
}
}
?>