<html>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
<?php 
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




//product info
$id = $_GET['id'];
$query = "select * from product where id=$id";
$rs = my_select($query);
if($row = mysqli_fetch_array($rs))
{
$productname = $row[1];
$price = $row[4];

}
}
else
{
header("location:index.php");
}
?>
<html>
<head>
<?php include "header.php"; ?>

<script>
    function calc()
    {
        
     var quantity1 = document.getElementById("quantity").value;
     
     var price1 = document.getElementById("price").value;
     var totalprice = parseInt(quantity1)*parseInt(price1);
     
     document.getElementById("total").value = totalprice;
    }
</script>


</head>
<body>
<?php include "nav2.php";
echo "<br>Welcome <b style = 'text-transform : capitalize ; color : blue'>$username</b>";
 ?>


<div class="container" style = "margin-top:50px">
<h2 class="text-center" style = "font-family : Monotype Corsiva ; color : red">Add to Cart Page</h2>

<div class="form-group">
<form method = "post">
<label><b>Customer Name</b></label>
<input type = text name = username value = "<?php echo $username;?>" class="form-control" readonly>

<label><b>EmailID</b></label>
<input type = text name = emailid value = "<?php echo $emailid;?>" class="form-control" readonly>

<label><b>Contact</b></label>
<input type = text name = contact value = "<?php echo $contact;?>" class="form-control">

<label><b>City</b></label>
<input type = text name = city value = "<?php echo $city;?>" class="form-control">

<label><b>Address</b></label>
<input type = text name = address value = "<?php echo $address;?>" class="form-control">

<label><b>Product Name</b></label>
<input type = text name = productname value = "<?php echo $productname;?>" class="form-control" readonly>

<label><b>Price</b></label>
<input type = text name = price id = price value = "<?php echo $price;?>" class="form-control" readonly>

<label><b>Quantity</b></label>
<input type ="number" name = "quantity" id = "quantity" min="1" onkeyup = calc() class="form-control">

<label><b>Total</b></label>
<input type = text name = total id = total class="form-control" readonly>
<br>
<input type = submit name = submit value = "Add" class="btn btn-primary form-control" >
</form>
</div>

</div>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
    $emailid = $_POST['emailid'];
    $contact = $_POST['contact'];
    $city = $_POST['city'];
    $address = $_POST['address'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $total = $_POST['total'];
    $customername = $_POST['username'];


$query = "insert into addtocart(emailid,contact,city,address,productname,price,quantity,total,customername) values('$emailid','$contact','$city','$address','$productname','$price','$quantity','$total','$customername')";

$n = my_iud($query);
if($n==1)
{
echo '<script>
swal({
  text: "Product Added To cart!",
  icon: "success",
}).then(function() {
  window.location.href = "userhome.php";
  });
</script>';
}
else
{
echo '<script>alert("Something went wrong,Try Again");
</script>';
}
}
?>