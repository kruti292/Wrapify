<?php
    if(isset($_GET['code'])) {
        $code = $_GET['code'];
        $conn = new mySqli('127.0.0.1', 'root', '', 'giftshopphp');
        if($conn->connect_error) {
            die('Could not connect to the database');
        }
        $verifyQuery = $conn->query("SELECT * FROM siteuser WHERE code = '$code' and updated_time >= NOW() - Interval 1 DAY");
        if($verifyQuery->num_rows == 0) {
            header("Location: login.php");
            exit();
        }
        if(isset($_POST['submit'])) {
            $email = $_POST['email'];
            $new_password = $_POST['newpassword'];
            $changeQuery = $conn->query("UPDATE siteuser SET pwd= '$new_password' WHERE emailid = '$email' and code = '$code' and updated_time >= NOW() - INTERVAL 1 DAY");
            if($changeQuery) {
                header("Location: success.html");
            }
        }
        $conn->close();
    }
    else {
        header("Location: login.php");
        exit();
    }
?>