
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
    $numero = $data['numero_carta'];
    $nome = $data['nome'];
    $mese = $data['mese'];
    $anno = $data['anno'];
    $cvv = $data['cvv'];


    

    $conn = mysqli_connect("localhost", "root", "", "hw1");

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $numero = mysqli_real_escape_string($conn, $data['numero_carta']);
    $nome = mysqli_real_escape_string($conn, $data['nome']);
    $mese = mysqli_real_escape_string($conn, $data['mese']);
    $anno = mysqli_real_escape_string($conn, $data['anno']);
    $cvv = mysqli_real_escape_string($conn, $data['cvv']);


    $query = "SELECT * FROM PAGAMENTO WHERE username = '$username' AND numero_carta = '$numero'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) > 0) {
        echo json_encode("Metodo di pagamento già inserito!");
        exit;
    }


    $query = "INSERT INTO PAGAMENTO VALUES ('$username', '$numero', '$nome', '$mese', '$anno', '$cvv')";


    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode("Metodo di pagamento inserito");

    mysqli_close($conn);

?>

