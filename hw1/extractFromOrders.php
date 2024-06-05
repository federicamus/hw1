<?php

session_start();

if(!isset($_SESSION["username"])) {
    exit;
}

header('Content-Type: application/json');

$conn = mysqli_connect("localhost", "root", "", "hw1");

$username = mysqli_real_escape_string($conn, $_SESSION['username']);

$query = "SELECT * FROM ORDINE WHERE username = '$username'" ;

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($res) === 0) {
    echo json_encode("Nessun elemento!");
    exit;
}
    
    $ordersArray = array();
    while($row = mysqli_fetch_assoc($res)) {
        $ordersArray[] = $row;
    }
    echo json_encode($ordersArray);
    
    exit;

?>