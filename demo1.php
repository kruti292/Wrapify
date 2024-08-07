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
<h1 class="text-center" style = "font-family : Monotype Corsiva ; color : red">Change Password</h1>
<br>
<br>
<form method=post>
<label><b>Old Password</b></label>
<input type = password name = "oldpassword" class="form-control">
<label><b>New Password</b></label>
<input type = password name = "newpassword" class="form-control">
<label><b>Confirm New Password</b></label>
<input type = password name = "cpassword" class="form-control">
<br>
<input type = submit value="Submit" name="submit" class="form-control btn btn-primary">
</form>
</div>
</body>
</html>
<?php 
if(isset($_POST['submit']))
{
	$oldpassword = $_POST['oldpassword'];
	$newpassword = $_POST['newpassword'];
	$cpassword = $_POST['cpassword'];
	
	if($newpassword==$cpassword)
	{
		$query = "update siteuser set pwd='$newpassword' where emailid='$u' and pwd='$oldpassword'";
		$n = my_iud($query);
		if($n==1)
		{
			echo '<script>alert("Password Updated Successfully");window.location="login.php";</script>';
		}
		else{
			echo '<script>alert("Something Went Wrong,Try Again");</script>';
		}
	}
	else{
		echo '<script>alert("New Password And Confirm New Password Not Match");</script>';
	}
}
?>