
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

    

    $conn = mysqli_connect("localhost", "root", "", "hw1");

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $author = mysqli_real_escape_string($conn, $data['autore']);
    $title = mysqli_real_escape_string($conn, $data['titolo']);
    $published_date = mysqli_real_escape_string($conn, $data['data']);
    $pages = mysqli_real_escape_string($conn, $data['pagine']);
    $isbn = mysqli_real_escape_string($conn, $data['codice']);
    $img = mysqli_real_escape_string($conn, $data['img']);
    $description = mysqli_real_escape_string($conn, $data['descrizione']);
    $price = mysqli_real_escape_string($conn, $data['costo']);

    $query = "SELECT * FROM PREFERITI WHERE username = '$username' AND ISBN = '$isbn'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) > 0) {
        echo json_encode("Elemento già in wishlist!");
        exit;
    }


    $query = "INSERT INTO PREFERITI VALUES ('$username', '$author', '$title', '$published_date', '$pages', '$isbn', '$img', '$description', '$price')";


    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode("Elemento inserito");

    mysqli_close($conn);

?>

