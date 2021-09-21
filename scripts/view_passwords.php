<?php

//create  new msqli connection
include('../connections/db_connections.php');
include('../connections/key.php');
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//sql select account name, username, and password where owner = $_SESSION['id']
$sql = "SELECT account_name, username, password FROM passwords WHERE owner = '$_SESSION[id]'";

//execute sql
$result = $conn->query($sql);

//put each row of results into an array
while($row = $result->fetch_assoc()) {
    //decrypt each password with openssl_decrypt
    $decrypted_password = openssl_decrypt($row['password'], $method, $key);
    //put each row into an array
    $data[] = array(
        'account_name' => $row['account_name'],
        'username' => $row['username'],
        'password' => $decrypted_password
    );
}
//openssl decrpyt each password in data



//encode data as json
$json = json_encode($data);

?>