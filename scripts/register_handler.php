<?php    
include("../connections/db_connections.php");
include("../connections/key.php");
//variables
$form_username = $form_password = $form_confirm_password = "";
$msg = "";

//connection to db
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//form input
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $form_username = $_POST["username"];
    $form_password = $_POST["password"];
    $form_confirm_password = $_POST["confirm_password"];
}

//check if username is already taken
$sql = "SELECT * FROM accounts WHERE username = '$form_username'";
$result = $conn->query($sql);

//if username is taken
if ($result->num_rows > 0) {
    $msg = "Username already taken";
    header("Location: ../pages/register_page.php?msg=" . $msg);
    die();
}

//check if passwords match
if ($form_password != $form_confirm_password) {
    $msg = "Passwords do not match";
    header("Location: ../pages/register_page.php?msg=" . $msg);
    die();
}
//encrypt password with openssl
$form_password = openssl_encrypt($form_password, $method, $key);

//sql statement
$sql = "INSERT INTO accounts (`username`, `password`) VALUES ('$form_username', '$form_password')";
$result = $conn->query($sql);
if(!mysqli_error($conn))
{
    echo "Success";
    header("Location: ../pages/register_page.php?msg=" . $newUsername . " added!");
    die();
}
else
{
    echo $sql;
    echo mysqli_error($conn);
}

//close connection
$conn->close();
?>