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
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<body>
<?php include "nav2.php"; 
echo "<br>&nbsp;&nbsp;Welcome <b style = 'color : green ; text-transform:capitalize'>$username</b>";
?>
<div class="container" >
<h1 class="text-center" style = "font-family : Monotype Corsiva ; color : red">Edit Profile</h1>
<br>
<br>
<form method="post">
<table class="table">
<tr>
<th>UserName</th>
<td><input type = text name=username1 class="form-control" value="<?php echo $username; ?>"></td>
</tr>
<tr>
<th>City</th>
<td><input type = text name=city1 class="form-control" value="<?php echo $city; ?>"></td>
</tr>
<tr>
<th>Address</th>
<td><textarea name=address1 class="form-control" ><?php echo $address; ?></textarea></td>
</tr>
<tr>
<th>EmailID</th>
<td><input type = text readonly name=emailid1 class="form-control" value="<?php echo $u; ?>"></td>
</tr>
<tr>
<th>Contact</th>
<td><input type = text name=contact1 class="form-control" value="<?php echo $contact; ?>"></td>
</tr>
</table>
<br>
<input type = submit value="Submit" name="edit" class="btn btn-primary">
</form>
</div>
</body>
</html>
<?php 
if(isset($_POST['edit']))
{
	$username1 = $_POST['username1'];
	$city1 = $_POST['city1'];
	$address1 = $_POST['address1'];
	$contact1 = $_POST['contact1'];
    $query = "update siteuser set username='$username1',city='$city1',address='$address1',contact='$contact1' where emailid='$u'";

$n = my_iud($query);	
if($n==1)
{
	echo '<script>
	swal({
		text: "Profile updated!",
		icon: "success",
	}).then(function() {
		window.location.href = "userhome.php";
		});
	</script>';
}
else{
	echo '<script>
	swal({
		text: "Try again!",
		icon: "warning",
	}).then(function() {
		window.location.href = "editprofile.php";
		});
	</script>';
}
}

?>