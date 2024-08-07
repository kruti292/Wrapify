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

<style>
td{color : brown}
</style>

</head>
<body>
<?php include "nav2.php"; 
echo "<br>&nbsp;&nbsp;Welcome <b style = 'color : green ; text-transform:capitalize'>$username</b>";
?>

<div class="container" >
<h1 class="text-center" style = "font-family : Monotype Corsiva ; color : red">User Profile</h1>
<br>
<br>
<table class="table">
<tr>
<th>UserName</th>
<td><?php echo $username; ?></td>
</tr>
<tr>
<th>City</th>
<td><?php echo $city; ?></td>
</tr>
<tr>
<th>Address</th>
<td><?php echo $address; ?></td>
</tr>
<tr>
<th>EmailID</th>
<td><?php echo $u; ?></td>
</tr>
<tr>
<th>Contact</th>
<td><?php echo $contact; ?></td>
</tr>
</table>
<br>
<a href="editprofile.php" class="btn btn-success">Edit Profile</a> 
</div>
</body>
</html>