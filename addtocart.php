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
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  
  <script src = https://code.jquery.com/jquery-3.3.1.js></script>
<script src = https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js></script>
<script src = https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js></script>
<script src = https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js></script>
<script src = https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js></script>
<script src = https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js></script>
<script src = https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js></script>
  
</head>
<body>
<?php include "nav2.php";
//echo "Welcome <b style = 'text-transform : capitalize ; color : green'>$name</b>";
 ?>


<div  class= "container" style = "margin-top:10px">
<h2 class="text-center" style = "font-family : Monotype Corsiva ; color : red">Cart Items</h2>
<div class="table-responsive">
<?php 
$query = "select * from addtocart where emailid='$emailid'";
$rs = my_select($query);
echo "<table class='table table-hover' id = example>";
echo "<thead style = 'background-color : green ; color : white'>";
echo "<tr>";
echo "<th>Product Name</th>";
echo "<th>Price</th>";
echo "<th>Quantity</th>";
echo "<th>Total Price</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "</thead>";

echo "<tbody>";
while($row = mysqli_fetch_array($rs))
{
echo "<tr>";

echo "<td>$row[5]</td>";
echo "<td>$row[6]</td>";
echo "<td>$row[7]</td>";
echo "<td>$row[8]</td>";
echo "<td><a href = 'deletecartitem.php?id=$row[0]' class='btn btn-danger'>Delete</a></td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
<?php
$total=0;
$query = "select * from addtocart where emailid='$emailid'";
$rs = my_select($query);
while($row = mysqli_fetch_array($rs))
{
$total=$total+$row[8];
}
?>
<form method="post">
<label><b>Total amount</b></label>
<input type = text name = total value="<?php echo $total;?>" class="form-control" readonly>
<br>
<input type = submit name = submit value = "Buy" class="btn btn-primary form-control" >
</form>
</div>
</div>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
  if($total==0)
  {
    echo 
            '<script>
                swal({
                    text: "No item added to cart!",
                    icon: "warning",
                }).then(function() {
                    window.location.href = "addtocart.php";
                    });
                </script>';
  }
  else
  {
    echo 
            '<script>
                    window.location.href = "payment1.php";
                </script>';
  }
}
?>