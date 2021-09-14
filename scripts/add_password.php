<?php
    include('session_handler.php');
    include('../connections/db_connections.php');
    include('../connections/key.php');
    $msg="";
    $errormsg = "";
    //form input
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $form_account_name = $_POST['account_name'];
        $form_username = $_POST['username'];
        $form_password = $_POST['password'];
        $owner = $_SESSION['id'];
    }
    //encrypt password with openssl
    $encrypted_password = openssl_encrypt($form_password, $method, $key);

    //database connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //sql query
    $sql = "INSERT INTO passwords (account_name, username, password, owner) VALUES ('$form_account_name', '$form_username', '$encrypted_password', '$owner')";
    if ($conn->query($sql) === TRUE) {
        $msg = "New record created successfully";
        echo $msg;
        //redirect to home page
        header("Location: ../pages/main.php?msg=" . $msg);
    } else {
        $errormsg = "Error: " . $sql . "<br>" . $conn->error;
        echo $errormsg;
        //redirect back to add password page
        header("Location: ../pages/add_password.php?errormsg=" . $errormsg);
    }
    die();
?>