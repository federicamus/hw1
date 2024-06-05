<?php

session_start();


if(!isset($_SESSION["username"])) {
    echo "Non autenticato";
    exit;
}

if(!isset($_SESSION["username"])) {
    $err = json_encode("Non autenticato");
    echo $err;
    exit;
}

 $jsonData = file_get_contents('php://input');


 $data = json_decode($jsonData, true);


 if ($data === null) {
     
     http_response_code(400); 
     exit('Errore durante la decodifica dei dati JSON');
 }


 $username = $_SESSION["username"];
 $copie = $data['copie'];
 $isbn = $data['isbn'];




 $conn = mysqli_connect("localhost", "root", "", "hw1");

 $username = mysqli_real_escape_string($conn, $_SESSION['username']);
 $copie = mysqli_real_escape_string($conn, $data['copie']);
 $isbn = mysqli_real_escape_string($conn, $data['isbn']);

 $new_copie = $copie + 1;

 $query = "UPDATE CARRELLO SET copie = '$new_copie' WHERE username = '$username' AND ISBN = '$isbn'";

 $res = mysqli_query($conn, $query) or die(mysqli_error($conn));


 echo json_encode("Copia aggiunta");

 mysqli_close($conn);


?>