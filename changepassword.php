<html>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>
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
<?php
$passwordErr ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["oldpassword"])) 
  {
    $passwordErr = "Password is required";
  } 
  else if (empty($_POST["newpassword"])) 
  {
    $passwordErr = "Password is required";
  } 
  else if (empty($_POST["cpassword"])) 
  {
    $passwordErr = "Password is required";
  } 
  else
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
			echo 
            '<script>
                swal({
                    text: "Password updated!",
                    icon: "success",
                }).then(function() {
                    window.location.href = "login.php";
                    });
                </script>';
		}
		else{
			echo '<script>
      swal({
          text: "Invalid credentials!",
          icon: "warning",
      }).then(function() {
          window.location.href = "changepassword.php";
          });
      </script>';
		}
	}
	else{
		echo 
        '<script>
  swal({
    text: "New password and success password must match!",
    icon: "warning",
  });
  </script>';
	}
}
}
?>
<style>
    .error 
    {
        color: #FF0000;
    }
td{color : brown}
.content{
        margin: 10px;
        padding : 4rem -5rem 4rem 3rem;
        box-shadow:0 0 5px 5px rgba(0,0,0, .05);
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
<body>
<?php include "nav2.php"; 
echo "<br>&nbsp;&nbsp;Welcome <b style = 'color : green ; text-transform:capitalize'>$username</b>";
?>

<div class="container" style = "margin-top : 50px">
<div class ="row content">
<div class ="col-md-6 mb-3">
<img src = "myimages2/reset.jpg" width="400" height="350" style="margin-top:20px">
</div>
<div clas="col-md-6">
<h2 class="signin-text mb-3" style = "font-family : 'Monotype Corsiva' ; color:#E6120E">Change Password</h2>
<br>
<form method=post>
<div class="form-group">
<label><b>Old Password</b></label><span class="error">* <?php echo $passwordErr;?></span>
<input type = password name = "oldpassword" class="form-control">
</div>
<div class="form-group">
<label><b>New Password</b></label><span class="error">* <?php echo $passwordErr;?></span>
<input type = password name = "newpassword" class="form-control">
</div>
<div class="form-group">
<label><b>Confirm Password</b></label><span class="error">* <?php echo $passwordErr;?></span>
<input type = password name = "cpassword" class="form-control">
</div>
<br>
<div class="form-group">
<input type = submit value="Submit" name="submit" class="btn btn-primary">
</div>
</form>
</div>
</body>
</html>