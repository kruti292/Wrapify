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
<style>
    .error 
    {
        color: #FF0000;
    }
    <style>
    .content
    {
        margin: 5px;
        padding : 4rem -5rem 4rem 3rem;
        box-shadow:0 0 5px 10px rgba(0,0,0, .05);
    }
    .form-control
    {
        display: block;
        width:300px;
        font-size:1rem;
        font-weight:400;
        line-height:1.5;
        border-color:#00ac96;
        border-style:solid;
        border-width:0 0 1px 0;
        padding : 0;
        color:#495057;
        height:auto;
        border-radius:0;
        background-color: #fff;
        background-clip: padding-box;
    }
</style>
<body>
<?php include "nav1.php"; 
$emailid = $password = "";
$emailErr = $passErr = "";
function test_input($data) 
{
    $data = trim($data);    //remove space
    $data = stripslashes($data);   //removes backslashes 
    $data = htmlspecialchars($data);  //remove special characters
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["emailid"])) 
  {
    $emailErr = "Email is required";
  } 
  else 
  {
    $emailid = test_input($_POST["emailid"]);
    if (!filter_var($emailid,FILTER_VALIDATE_EMAIL)) 
    {
      $emailErr = "Invalid email format";
    }
  }
  if (empty($_POST["pwd"])) 
  {
    $passErr = "Password is required";
  }
  else
  {
    $password=test_input($_POST["pwd"]);
  }
}
?>
<div class="container" style = "margin-top : 100px">
<div class ="row content">
<div class ="col-md-6 mb-3">
<img src = "myimages2/login1.webp" width="500" height="350" style="margin-top:30px">
</div>
<div clas="col-md-6">
<h2 class="signin-text mb-3" style = "font-family : 'Monotype Corsiva' ; color:#E6120E">User Login</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-group">
<label><b>Email ID</b></label><span class="error">* <?php echo $emailErr;?></span>
<input type = text name="emailid" class="form-control" placeholder="Enter Your Email ID" value="<?php echo $emailid;?>">
</div>
<div class="form-group">
<label><b>Password</b></label><span class="error">* <?php echo $passErr;?></span>
<input type = password name="pwd" class="form-control" placeholder="Enter Your Password" value="<?php echo $password?>">
</div>
<br>
<div class="form-group">
<input type = checkbox name="rem"><b>Remember Me</b>
<br>
<input type = submit name = submit value="Login" class="btn btn-primary">
<a href = "registration.php" class="btn btn-primary">SignUp</a>
</div>
</form>
</div>
</div>
</div>

</body>
</html>
<?php
session_start();
include "dbconfigure.php";
if($emailErr=="" && $passErr=="")
{
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
}
?>