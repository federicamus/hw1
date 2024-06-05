
<?php

    
    $jsonData = file_get_contents('php://input');

    
    $data = json_decode($jsonData, true);

    
    if ($data === null) {
        
        http_response_code(400); 
        exit('Errore durante la decodifica dei dati JSON');
    }

    

    $conn = mysqli_connect("localhost", "root", "", "hw1");

    $author = mysqli_real_escape_string($conn, $data['autore']);
    $title = mysqli_real_escape_string($conn, $data['titolo']);
    $published_date = mysqli_real_escape_string($conn, $data['data']);
    $pages = mysqli_real_escape_string($conn, $data['pagine']);
    $isbn = mysqli_real_escape_string($conn, $data['codice']);
    $img = mysqli_real_escape_string($conn, $data['img']);
    $description = mysqli_real_escape_string($conn, $data['descrizione']);


    $query = "SELECT * FROM LIBRI WHERE  ISBN = '$isbn'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) > 0) {
        echo json_encode("Elemento già presente nel database!");
        exit;
    } 

    $costo = mt_rand(15, 20);

    $query = "INSERT INTO LIBRI VALUES ('$author', '$title', '$published_date', '$pages', '$isbn', '$img', '$description', '$costo')";


    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    mysqli_close($conn);


?>

