<?php 
include "dbconfigure.php";

$id = $_GET['id'];

$query = "delete from product where id=$id";

my_iud($query);
header("location:viewproduct.php");
?>