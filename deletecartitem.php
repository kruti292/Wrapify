<?php 
include "dbconfigure.php";

$id = $_GET['id'];

$query = "delete from addtocart where id='$id'";

my_iud($query);
header("location:addtocart.php");
?>