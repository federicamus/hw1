
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
    $nome = mysqli_real_escape_string($conn, $data['nome']);
    $cognome = mysqli_real_escape_string($conn, $data['cognome']);
    $indirizzo = mysqli_real_escape_string($conn, $data['indirizzo']);
    $info_aggiuntiva = mysqli_real_escape_string($conn, $data['info_aggiuntiva']);
    $CAP = mysqli_real_escape_string($conn, $data['cap']);
    $citta = mysqli_real_escape_string($conn, $data['citta']);
    $provincia = mysqli_real_escape_string($conn, $data['provincia']);
    $CF = mysqli_real_escape_string($conn, $data['CF']);
    $telefono = mysqli_real_escape_string($conn, $data['telefono']);
    $tel_sec = mysqli_real_escape_string($conn, $data['tel_sec']);


    $query = "SELECT * FROM FATTURAZIONE WHERE username = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) > 0) {
        echo json_encode("Esiste già un indirizzo di fatturazione per questo username!");
        exit;
    }


    $query = "INSERT INTO FATTURAZIONE VALUES ('$username', '$nome', '$cognome', '$indirizzo', '$info_aggiuntiva', '$CAP', '$citta', '$provincia', '$CF', '$telefono', '$tel_sec')";


    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode("Fatturazione inserita");

    mysqli_close($conn);

?>

