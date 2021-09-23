<?php
    include('../connections/db_connections.php');
    include('../connections/key.php');
    
    $error = $success = '';
    
    //start session
    session_start();

    //get form data
    if($_SERVER["REQUEST_METHOD"] == 'POST'){
        $old_password = $_POST['old_password'];
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
    }
    $user_id = $_SESSION['id'];

    //validate form data
    $valid = true;
    if (empty($old_password)) {
        $valid = false;
        $error = 'Old password is required.';
    }
    if (empty($new_password)) {
        $valid = false;
        $error = 'New password is required.';
    }
    if (empty($confirm_password)) {
        $valid = false;
        $error = 'Confirm password is required.';
    }
    if ($new_password != $confirm_password) {
        $valid = false;
        $error = 'New password and confirm password do not match.';
    }

    //if valid, update password
    if ($valid) {
        //connect to database
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //get user's password
        $sql = "SELECT password FROM accounts WHERE id = '$user_id'";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $db_password = openssl_decrypt($row['password'], $method, $key);
        
        //verify old password
        if($old_password == $db_password){
            //encrypt new password
            $new_password = openssl_encrypt($new_password, $method, $key);
            //update password
            $sql = "UPDATE accounts SET password = '$new_password' WHERE id = '$user_id'";
            $result = $conn->query($sql);
            if ($conn->query($sql) === TRUE) {
                $success = 'Password updated successfully.';

                //logout user
                session_destroy();
                header('Location: ../index.php?msg=' . $success);

            } else {
                $error = 'Error updating password.';
                //logout user
                session_destroy();
                header('Location: ../index.php?msg=' . $error);
            }
        } else {
            $error = 'Old password is incorrect.';
            //logout user
            session_destroy();
            header('Location: ../index.php?msg=' . $error);
        }
    } else {
        //logout user
        session_destroy();
        header('Location: ../index.php?msg=' . $error);
    }

?>