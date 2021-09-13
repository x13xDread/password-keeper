<?php
    include('session_handler.php');
    //form input
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $form_account_name = $_POST['account_name'];
        $form_username = $_POST['username'];
        $form_password = $_POST['password'];
    }

?>