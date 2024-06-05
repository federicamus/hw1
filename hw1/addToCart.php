<?php

session_start();

if(!isset($_SESSION["username"])) {
    $err = json_encode("Non autenticato");
    echo $err;
    exit;
}

if(isset($_GET['isbn'])) {

    $conn = mysqli_connect("localhost", "root", "", "hw1");

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $isbn = mysqli_real_escape_string($conn, $_GET['isbn']);

    $query = "SELECT * FROM LIBRI WHERE ISBN = '$isbn'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) === 0) {
        echo json_encode("Nessun elemento!");
        exit;
    }

    $bookAttributes = array();

    while($row = mysqli_fetch_assoc($res)) {
        $bookAttributes = array('autore' => $row['autore'],
        'titolo' => $row['titolo'],
        'data_di_pubblicazione' => $row['data_di_pubblicazione'],
        'pagine' => $row['pagine'],
        'ISBN' => $row['ISBN'],
        'img' => $row['img'],
        'descrizione' => $row['descrizione'],
        'costo' => $row['costo']
        );
    }

    $autore = $bookAttributes["autore"];
    $titolo = $bookAttributes["titolo"];
    $isbn = $bookAttributes["ISBN"];
    $img = $bookAttributes["img"];
    $costo = $bookAttributes["costo"];

    $copie = 1;

    $query = "SELECT * FROM CARRELLO WHERE username = '$username' AND ISBN = '$isbn'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) > 0) {
        echo json_encode("Elemento già nel carrello!");
        exit;
    }
    
    
    $query = "INSERT INTO CARRELLO VALUES('$username', '$autore', '$titolo', '$isbn', '$img', '$costo', '$copie')";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));



    echo json_encode("Elemento inserito nel carrello");
    
    
    exit;


}

?>