<?php
session_start();
include "dbconfigure.php";

if(verifyuser())
{
$emailid = $_SESSION['semail'];
}
$total=0;
$query3 = "select * from addtocart where emailid='$emailid'";
//print_r($query3);die;
$rs = my_select($query3);
while($row = mysqli_fetch_array($rs))
{
$total=$total+$row[8];
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Payment</title>
    </head>
    <body>
        
        
        
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style>
.razorpay-payment-button{
    padding: 10px 16px;
    font-size: 18px;
    line-height: 1.33;
    border-radius: 6px;
    color: #fff;
    background-color: #5cb85c;
    border-color: #4cae4c;
    width: 100%;
    display: block;
}
</style>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>

<!-- If you're using Stripe for payments -->
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container">
    <div class="row">
        <!-- You can make it whatever width you want. I'm making it full width
             on <= small devices and 4/12 page width on >= medium devices -->
        <div class="col-xs-4 col-md-4"></div>
        <div class="col-xs-4 col-md-4">
        
        
            <!-- CREDIT CARD FORM STARTS HERE -->
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                       
                    </div>                    
                </div>
                <div class="panel-body">
     
   <?php
$apikey="rzp_test_Mhot8yqS0YmgBM"; 
?>
<form action="http://localhost/wrapify/viewmybooking.php" method="POST">
    
   
<script
    src="https://checkout.razorpay.com/v1/checkout.js"
    data-key="<?php echo $apikey;?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
    data-amount="<?php echo $total * 100;?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
    data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
    data-id="<?php echo 'OID'.rand(10,100).'END';?>"// Replace with the order_id generated by you in the backend.
    data-buttontext="Pay with Razorpay"
    data-name="Acme Corp"
    data-description="A Wild Sheep Chase is the third novel by Japanese author Haruki Murakami"
    data-image=""
    data-prefill.name=""
    data-prefill.email="<?php echo $emailid;?>"
    data-theme.color="#F37254"
></script>
<input type="hidden" custom="Hidden Element" name="hidden"/>

					
                    </form>
			
                                
                                
                </div>
            </div>            
            <!-- CREDIT CARD FORM ENDS HERE -->
            
            
        </div>            
        
        
        
    </div>
</div>

       
    </body>
</html>

<?php
//$var1 = "https://checkout.razorpay.com/v1/checkout.js"
//if(isset($var1))
//{
$query = "select * from addtocart where emailid='$emailid'";
$rs = my_select($query);
while($row = mysqli_fetch_array($rs))
{
$bookingdate=date("Y/m/d");

$customername=$row[9];

$emailid = $_SESSION['semail'];
$contact=$row[2];
$city=$row[3];
$address=$row[4];
$productname=$row[5];
$sprice=$row[6];
$quantity=$row[7];
$total=$row[8];
$query1="insert into booking(bookingdate,customername,emailid,contact,city,address,productname,price,quantity,total,status) values('$bookingdate','$customername','$emailid','$contact','$city','$address','$productname','$sprice','$quantity','$total','pending')";
$query2 = "delete from addtocart where emailid='$emailid'";
my_iud($query2);
$n = my_iud($query1);
}


//if($n==1)
//{
// echo '<script>alert("Booking SuccessFull");
// window.location = "viewmybooking.php";
// </script>';
//}
//else
//{
// echo '<script>alert("Something Went Wrong");
// </script>';
//}

//}




// if(isset($_POST["cod"]))
// {

// $query = "select * from addtocart where emailid='$emailid'";
// $rs = my_select($query);
// while($row = mysqli_fetch_array($rs))
// {
// $bookingdate=$_POST['bookingdate'];
    
// $customername=$row[9];
    
// $emailid=$row[1];
// $contact=$row[2];
// $city=$row[3];
// $address=$row[4];
// $productname=$row[5];
// $sprice=$row[6];
// $quantity=$row[7];
// $total=$row[8];
// $query="insert into booking(bookingdate,customername,emailid,contact,city,address,productname,price,quantity,total,status) values('$bookingdate','$customername','$emailid','$contact','$city','$address','$productname','$sprice','$quantity','$total','pending')";
// $n = my_iud($query);
// $query = "delete from addtocart where emailid='$emailid'";
// my_iud($query);
// }
// //$n = my_iud($query);
// if($n!=0)
// {
// echo '<script>alert("Booking SuccessFull");
// window.location = "viewmybooking.php";
// </script>';
// }
// else
// {
// echo '<script>alert("Something Went Wrong");
// </script>';
// }
//}


?>