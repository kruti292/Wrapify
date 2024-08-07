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
<div class="container" style = "margin-top : 70px">
<h1 class="text-center" style = "font-family : 'Monotype Corsiva' ; color:#E6120E">User Registration</h1>
<form method=post>
<div class="form-group">
<label><b>UserName</b></label>
<input type = text name="username" class="form-control" placeholder="Enter your name here">
<label><b>Password</b></label>
<input type = password name="pwd" class="form-control" placeholder="Enter Password">
<label><b>City</b></label>
<input type = text name="city" class="form-control" placeholder="Enter City">
<label><b>Address</b></label>
<textarea name="address" class="form-control" placeholder="Enter your address"></textarea>
<label><b>Email ID</b></label>
<input type = email name="emailid" class="form-control" placeholder="Enter your email">
<label><b>Contact</b></label>
<input type = text name="contact" class="form-control" placeholder="Enter Your Contact Number">
<br>
<input type = submit name = submit value = Submit class="form-control btn btn-primary">
</div>
</form>
</div>
</body>
</html>
<?php 
include "dbconfigure.php";
if(isset($_POST['submit']))
{
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$city = $_POST['city'];
$address = $_POST['address'];
$emailid = $_POST['emailid'];
$contact = $_POST['contact'];
$query = "insert into siteuser values('$username','$pwd','$city','$address','$emailid','$contact')";
$n = my_iud($query);
if($n==1)
{
echo '<script>alert("Signup Successful...");
window.location="login.php";
</script>';
}
else
{
echo '<script>alert("Something went wrong");
</script>';
}
}
?>