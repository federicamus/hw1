
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

    $current_date = date("Y-m-d");

    $shipping_date = new DateTime($current_date);

    $secondiCasuali = mt_rand(259200, 432000);

    $arrivalDate = $shipping_date->modify("+$secondiCasuali seconds");

    $arrivalDateFormat = $arrivalDate->format("Y-m-d");



    

    $conn = mysqli_connect("localhost", "root", "", "hw1");

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $numero = mysqli_real_escape_string($conn, $data['carta']);
    $totale = mysqli_real_escape_string($conn, $data['totale']);


    $query = "SELECT autore, titolo, ISBN, img, costo, copie FROM CARRELLO WHERE username = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $cartArray = array();
    while($row = mysqli_fetch_assoc($res)) {
        $cartArray[] = $row;
    }

    $cartJson = json_encode($cartArray, JSON_UNESCAPED_UNICODE);



    $query = "SELECT nome, cognome, indirizzo, CAP, citta, provincia FROM FATTURAZIONE WHERE username = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $billingArray = array();
    while($row = mysqli_fetch_assoc($res)) {
        $billingArray[] = $row;
    }

    $billingJson = json_encode($billingArray, JSON_UNESCAPED_UNICODE);






    $query = "INSERT INTO ORDINE VALUES ('$username', '$numero', '$totale', '$cartJson', '$billingJson', '$current_date', '$arrivalDateFormat')";


    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode("Ordine inserito");

    mysqli_close($conn);

?>

