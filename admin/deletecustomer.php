<?php 
include "dbconfigure.php";

$id = $_GET['id'];

$query = "delete from siteuser where emailid='$id'";

my_iud($query);
header("location:viewcustomer.php");
?>