<?php 
include "dbconfigure.php";

$id = $_GET['id'];

$query = "delete from category where id=$id";

my_iud($query);
header("location:viewcategory.php");
?>
