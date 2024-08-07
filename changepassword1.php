<?php include 'change_password_process.php' ?>
<!DOCTYPE html>
<head>
<?php include "header.php"; ?>

<style>
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
?>

<div class="container" style = "margin-top : 50px">
<div class ="row content">
<div class ="col-md-6 mb-3">
<img src = "myimages2/forgetpass.jpg" width="400" height="350" style="margin-top:20px">
</div>
<div clas="col-md-6">
<h2 class="signin-text mb-3" style = "font-family : 'Monotype Corsiva' ; color:#E6120E">Change Password</h2>
<br>
<form method=post>
<div class="form-group">
<label><b>Email</b></label>
<input type="email" name="email" placeholder="Email address" class="form-control">
</div>
<div class="form-group">
<label><b>New Password</b></label>
<input type = password name = "newpassword" class="form-control">
</div>
<br>
<div class="form-group">
<input type = submit value="Submit" name="submit" class="btn btn-primary">
</div>
</form>
</div>
</body>
</html>