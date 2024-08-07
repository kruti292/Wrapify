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
echo "Welcome <b style = 'color : green ; text-transform:capitalize'>$name</b>";
?>

<div class="container" style = "margin-top : 50px">
<h1 class= "text-center" style = "font-family : 'Monotype Corsiva' ; color : #e6120e">View Customer</h1>
<?php 
$query = "select * from siteuser";
$rs = my_select($query);

echo "<br><table class='table table-hover' id=example>";
echo "<thead style = 'background-color : green ; color : white'>";
echo "<tr>";
echo "<th>UserName</th>";
echo "<th>City</th>";
echo "<th>Address</th>";
echo "<th>Email ID</th>";
echo "<th>Contact</th>";
echo "<th>Action</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while($row = mysqli_fetch_array($rs))
{
echo "<tr>";
echo "<td>$row[0]</td>";

echo "<td>$row[2]</td>";
echo "<td>$row[3]</td>";
echo "<td>$row[4]</td>";
echo "<td>$row[5]</td>";
echo "<td><a href='deletecustomer.php?id=$row[4]' class='btn btn-danger'>Delete</a></td>";
echo "</tr>";
}
echo "</tbody>";
echo "</table>";
?>
<script>
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
</div>
</body>
</html>
