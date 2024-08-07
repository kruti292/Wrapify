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
<style>
  .content{
        margin: 5px;
        padding : 4rem -10rem 2rem 3rem;
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
    .form-group{
        margin-left:100px;
    }
    .btn-primary{
        background-color:white;
        border-color:#00ac96;
        color:#00ac96;
    }
    .btn-primary:hover{
        background-color:#00ac96;
        color:#fff;
    }
</style>
</head>
<style>
    .error 
    {
        color: #FF0000;
    }
</style>
<body>
<?php include "nav1.php"; ?>
<?php
$username = $emailid =  $pwd = $city = $contact = $address = "";
$userErr = $emailErr = $pwdErr = $cityErr = $conErr = $addErr = "";
function test_input($data) 
{
    $data = trim($data);    //remove space
    $data = stripslashes($data);   //removes backslashes 
    $data = htmlspecialchars($data);  //remove special characters
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["username"])) 
  {
    $userErr ="User name is required";
  } 
  else
  {
    $username=test_input($_POST["username"]);
  }
  if (empty($_POST["pwd"])) 
  {
    $pwdErr ="Password is required";
  } 
  else
  {
    $pwd=test_input($_POST["pwd"]);
  }
  if (empty($_POST["city"])) 
  {
    $cityErr ="City is required";
  } 
  else
  {
    $city=test_input($_POST["city"]);
  }
  if (empty($_POST["address"])) 
  {
    $addErr ="Address is required";
  } 
  else
  {
    $address=test_input($_POST["address"]);
  }
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
  if(empty($_POST["contact"]))
  {
    $conErr="Contact number is required";
  }
  else
  {
    $contact=test_input($_POST["contact"]);
    if(!preg_match("/^[0-9]{10}+$/",$contact))
    {
        $conErr="Contact number should be in digits and only 10 digits";
    }
  }
}
?>
<div class="container" style = "margin-top : 70px">
<div class ="row content">
<div class ="col-md-6 mb-3">
<img src = "myimages2/registration1.jpg" width="550" height="550" style="margin-top:70px">
</div>
<div clas="col-md-6">
<h2 class="signin-text mb-3" style = "font-family : 'Monotype Corsiva' ; color:#E6120E">Registration</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-group">
<label><b>UserName</b></label><span class="error">* <?php echo $userErr;?></span>
<input type = text name="username" class="form-control" placeholder="Enter your name here" value="<?php echo $username;?>">
</div>
<div class="form-group">
<label><b>Password</b></label><span class="error">* <?php echo $pwdErr;?></span>
<input type = password name="pwd" class="form-control" placeholder="Enter Password" value="<?php echo $pwd;?>">
</div>
<div class="form-group">
<label><b>City</b></label><span class="error">* <?php echo $cityErr;?></span>
<input type = text name="city" class="form-control" placeholder="Enter City" value="<?php echo $city?>">
</div>
<div class="form-group">
<label><b>Address</b></label><span class="error">* <?php echo $addErr;?></span>
<textarea name="address" class="form-control" placeholder="Enter your address" value="<?php echo $address;?>"></textarea>
</div>
<div class="form-group">
<label><b>Email ID</b></label><span class="error">* <?php echo $emailErr;?></span>
<input type = text name="emailid" class="form-control" placeholder="Enter your email" value="<?php echo $emailid;?>">
</div>
<div class="form-group">
<label><b>Contact</b></label><span class="error">* <?php echo $conErr;?></span>
<input type = text name="contact" class="form-control" placeholder="Enter Your Contact Number" value="<?php echo $contact;?>">
<br></div>
<div class="form-group">
<input type = submit name = submit value = Submit class="btn btn-primary">
</div>
</form>
</div>
</div>
</div>
</body>
</html>
<?php 
include "dbconfigure.php";
if(isset($_POST['submit']))
{
if($userErr=="" && $pwdErr=="" && $cityErr=="" && $addErr=="" && $emailErr=="" && $conErr=="") 
{
$username = $_POST['username'];
$pwd = $_POST['pwd'];
$city = $_POST['city'];
$address = $_POST['address'];
$emailid = $_POST['emailid'];
$contact = $_POST['contact'];
$query = "insert into siteuser (username,pwd,city,address,emailid,contact) values('$username','$pwd','$city','$address','$emailid','$contact')";
$n = my_iud($query);
if($n==1)
{
echo 
'<script>
  swal({
    text: "Registration successfull!",
    icon: "success",
  }).then(function() {
    window.location.href = "login.php";
    });
  </script>';
}
else
{
echo '<script>alert("Something went wrong");
</script>';
}
}
}
?>