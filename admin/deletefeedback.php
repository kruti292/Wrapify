<?php 
include "dbconfigure.php";

$id = $_GET['id'];

$query = "delete from feedback where id=$id";

my_iud($query);
header("location:viewfeedback.php");
?>
