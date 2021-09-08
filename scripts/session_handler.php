<?php 
session_start();
if($_SESSION['username'] == null){
    header("Location: ../pages/login_page.php?msg=Please Login");
}
?>