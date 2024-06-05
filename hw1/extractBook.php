<?php

header('Content-Type: application/json');



$conn = mysqli_connect("localhost", "root", "", "hw1");

$isbn = mysqli_real_escape_string($conn, $_GET['isbn']);

$query = "SELECT * FROM LIBRI WHERE ISBN = '$isbn'" ;

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($res) === 0) {
    echo json_encode("Nessun elemento!");
    exit;
}
    
    $preferencesArray = array();
    while($row = mysqli_fetch_assoc($res)) {
        $preferencesArray[] = $row;
    }
    echo json_encode($preferencesArray);
    
    exit;



?>