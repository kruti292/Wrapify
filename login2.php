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
<?php include "nav1.php"; ?>

<div class="container" style = "margin-top : 100px">
<h1 class="text-center" style = "font-family : 'Monotype Corsiva' ; color:#E6120E">User Login</h1>
<form method=post>
<div class="form-group">
<label><b>Email ID</b></label>
<input type = email name="emailid" class="form-control" placeholder="Enter Your Email ID">
<label><b>Password</b></label>
<input type = password name="pwd" class="form-control" placeholder="Enter Your Password">
<br>
<input type = checkbox name="rem"><b>Remember Me</b>
<br>
<input type = submit name = submit value="Login" class="btn btn-primary">
<a href = "registration.php" class="btn btn-primary">SignUp</a>
</div>
</form>
</div>

</body>
</html>
<?php
session_start();
include "dbconfigure.php";
if(isset($_POST['submit']))
{
$emailid = $_POST['emailid'];
$password = $_POST['pwd'];
if(isset($_POST['rem']))
{
$remember = "yes";
}
else
{
$remember = "no";
}
$query = "select count(*) from siteuser where emailid='$emailid' and pwd='$password'";

$ans = my_one($query);
if($ans==1)
{
$_SESSION['semail'] = $emailid;
$_SESSION['spwd'] = $password;

if($remember=='yes')
{
setcookie('cemail',$emailid,time()+60*60*24*7);
setcookie('cpwd',$password,time()+60*60*24*7);
}


if(isset($_GET['id']))
{
header("location:booking.php?id=".$_GET['id']);
}
else
{
header("location:userhome.php");
}


}
else{
echo '<script>alert("Invalid Login credentials,Try Again")</script>';
}
}
?>