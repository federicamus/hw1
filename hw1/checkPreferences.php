
<?php

session_start();


if(!isset($_SESSION["username"])) {
    echo json_encode("Non autenticato");
    exit;
}

    if(isset($_GET['isbn'])) {

        $conn = mysqli_connect("localhost", "root", "", "hw1");

        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $isbn = mysqli_real_escape_string($conn, $_GET['isbn']);

        $query = "SELECT * FROM PREFERITI WHERE username = '$username' AND ISBN = '$isbn'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            echo json_encode("Elemento trovato!");
            exit;
        }

        else {
            echo json_encode("Elemento non trovato!");
        }
        
    }


?>

