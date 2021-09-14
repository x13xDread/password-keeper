<?php 
session_start();
if($_SESSION['username'] == null || $_SESSION['id'] == null){
    header("Location: ../pages/login_page.php?msg=Please Login");
}
?>