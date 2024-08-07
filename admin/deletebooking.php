<?php 
include "dbconfigure.php";

$id = $_GET['id'];
$query = "delete from booking where id=$id";

my_iud($query);
header("location:viewbooking.php");
?>
