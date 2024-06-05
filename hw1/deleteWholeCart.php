<?php

session_start();


if(!isset($_SESSION["username"])) {
    $err = json_encode("Non autenticato");
    echo $err;
    exit;
}



    $conn = mysqli_connect("localhost", "root", "", "hw1");

    $username = mysqli_real_escape_string($conn, $_SESSION['username']);
    $isbn = mysqli_real_escape_string($conn, $_GET['isbn']);

    $query = "SELECT * FROM CARRELLO WHERE username = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    if (mysqli_num_rows($res) === 0) {
        echo json_encode("Elemento non trovato!");
        exit;
    }

    $query = "DELETE FROM CARRELLO WHERE username = '$username'";

    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    echo json_encode("Carrello svuotato");

    mysqli_close($conn);
    exit;


?>