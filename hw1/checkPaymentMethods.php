
<?php

session_start();


if(!isset($_SESSION["username"])) {
    echo json_encode("Non autenticato");
    exit;
}



    $conn = mysqli_connect("localhost", "root", "", "hw1");

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);


    $query = "SELECT * FROM PAGAMENTO WHERE username = '$username'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            echo json_encode("Elemento trovato!");
            exit;
        }

        else {
            echo json_encode("Elemento non trovato!");
        }
        



?>

