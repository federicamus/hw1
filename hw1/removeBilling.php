
<?php

session_start();


if(!isset($_SESSION["username"])) {
    echo json_encode("Non autenticato");
    exit;
}



        $conn = mysqli_connect("localhost", "root", "", "hw1");

        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $isbn = mysqli_real_escape_string($conn, $_GET['isbn']);

        $query = "SELECT * FROM FATTURAZIONE WHERE username = '$username'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) === 0) {
            echo json_encode("Elemento non trovato!");
            exit;
        }

        $query = "DELETE FROM FATTURAZIONE WHERE username = '$username'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        echo json_encode("Elemento rimosso");
        




?>

