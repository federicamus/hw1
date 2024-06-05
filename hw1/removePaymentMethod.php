
<?php

session_start();


if(!isset($_SESSION["username"])) {
    echo json_encode("Non autenticato");
    exit;
}

    if(isset($_GET['numero_carta'])) {

        $conn = mysqli_connect("localhost", "root", "", "hw1");

        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $numero = mysqli_real_escape_string($conn, $_GET['numero_carta']);

        $query = "SELECT * FROM PAGAMENTO WHERE username = '$username' AND numero_carta = '$numero'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) === 0) {
            echo "Elemento non trovato!";
            exit;
        }

        $query = "DELETE FROM PAGAMENTO WHERE username = '$username' AND numero_carta = '$numero'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        echo json_encode("Elemento rimosso");
        
    }



?>

