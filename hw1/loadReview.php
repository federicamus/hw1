<?php

    session_start();

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
     $review = $data['review_input'];
     $isbn = $data['isbn'];

 
     
 
     $conn = mysqli_connect("localhost", "root", "", "hw1");
 
     $username = mysqli_real_escape_string($conn, $_SESSION['username']);
     $review = mysqli_real_escape_string($conn, $data['review_input']);
     $isbn = mysqli_real_escape_string($conn, $data['isbn']);
 
     $query = "SELECT * FROM RECENSIONI WHERE username = '$username' AND ISBN = '$isbn'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            echo json_encode("Recensione già inserita!");
            exit;
        } 


        $query = "INSERT INTO RECENSIONI VALUES('$username', '$isbn', '$review')";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        echo json_encode("Recensione inserita");
     mysqli_close($conn);
 

?> 