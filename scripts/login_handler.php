<?php
include("../connections/db_connections.php");

//variables
$form_username = $form_password = "";
$msg = "";

//connection to db
$conn = new mysqli($servername, $username, $password);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_username = $_POST["username"];
    $form_password = $_POST["password"];
}

//sql query
$sql = "SELECT * FROM accounts WHERE username = '$form_username'";
$result = $conn->query($sql);

//check if username exists
if ($result->num_rows > 0) {
    //output data of each row
    while($row = $result->fetch_assoc()) {
        if ($row["password"] === $form_password) {
            $msg = "Login successful!";
            header("Location: ../pages/main.php");
            die();
        } else {
            $msg = "Incorrect password!";
            header("Location: ../pages/login_page.php?msg=" . $msg);
            die();
        }
    }
} else {
    $msg = "Username does not exist!";
    header("Location: ../pages/login_page.php?msg=" . $msg);
    die();
}

//close connection
$conn->close();
?>