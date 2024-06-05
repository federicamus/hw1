
<?php

session_start();


if (!isset($_GET["username"])) {
    echo "Non autenticato";
    exit;
}

header('Content-Type: application/json');


    $conn = mysqli_connect("localhost", "root", "", "hw1");

    $username = mysqli_real_escape_string($conn, $_GET["username"]);


    $query = "SELECT * FROM UTENTI WHERE username = '$username'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            echo json_encode("Utente trovato!");
            exit;
        }

        else {
            echo json_encode("Utente non trovato!");
        }
        



?>

