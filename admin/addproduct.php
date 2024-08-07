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
<?php
$proname = $image =  $price = "";
$proErr = $imgErr = $priceErr = "";
function test_input($data) 
{
    $data = trim($data);    //remove space
    $data = stripslashes($data);   //removes backslashes 
    $data = htmlspecialchars($data);  //remove special characters
    return $data;
}
if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
  if (empty($_POST["name"])) 
  {
    $proErr ="Product name is required";
  } 
  else
  {
    $proname=test_input($_POST["name"]);
  }
  if(empty($_POST["price"]))
  {
    $priceErr="Price is required";
  }
  else
  {
    $price=test_input($_POST["price"]);
    if(!preg_match("/^[0-9]+$/",$price))
    {
        $priceErr="Price should be in digits";
    }
  }
  if($_FILES["image"]["error"]==4)
  {
    $imgErr="Image is required";
  }
  else
  {
    move_uploaded_file($_FILES['image']['tmp_name'],"uploadimage/".$_FILES['image']['name']);
    $image = "uploadimage/".$_FILES['image']['name'];
  }
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
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<style>
    .error 
    {
        color: #FF0000;
    }
</style>
<body>
<?php include "nav2.php"; 
echo "Welcome <b style = 'color : green ; text-transform:capitalize'>$name</b>";
?>

<div class="container" style = "margin-top : 50px">
<h1 class= "text-center" style = "font-family : 'Monotype Corsiva' ; color : #e6120e">Add Product</h1>
<form method = post enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="form-group">
<label><b>Product Name</b></label><span class="error">* <?php echo $proErr;?></span>
<input type = "text" name="name" class="form-control" placeholder="Enter Product Name" value="<?php echo $proname;?>">
<label><b>Product Image</b></label><span class="error">* <?php echo $imgErr;?></span>
<input type = "file" name="image" class="form-control">
<label><b>Category</b></label>
<select name = "category" class="form-control">
<?php 
$query = "select * from category";
$rs = my_select($query);
while($row = mysqli_fetch_array($rs))
{
echo "<option value='$row[0]'>$row[1]</option>";	
}
?>
</select>
<label><b>Price</b></label><span class="error">* <?php echo $priceErr;?></span>
<input type = "text" name="price" class="form-control" value="<?php echo $price;?>">
<label><b>Description</b></label>
<textarea name="description" class="form-control"></textarea>
<br>
<input type = "submit" class="btn btn-primary form-control" name="submit" value="Submit" >
</div>
</form>
</div>
</body>
</html>
<?php 

if(isset($_POST['submit']))
{
if($proErr=="" && $priceErr=="" && $imgErr=="")
{
$proname = $_POST['name'];
move_uploaded_file($_FILES['image']['tmp_name'],"uploadimage/".$_FILES['image']['name']);
$image = "uploadimage/".$_FILES['image']['name'];
$category = $_POST['category'];
$price = $_POST['price'];
$description = $_POST['description'];

$query = "insert into product(name,image,category,price,description) values('$proname','$image','$category','$price','$description')";
$n = my_iud($query);
if($n==1)
{
echo
'<script>
swal({
  text: "Product Added!",
  icon: "success",
}).then(function() {
  window.location.href = "viewproduct.php";
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