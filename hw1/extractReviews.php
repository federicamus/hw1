<?php

session_start();


if(isset($_GET['isbn'])) {

    $conn = mysqli_connect("localhost", "root", "", "hw1");

    $isbn = mysqli_real_escape_string($conn, $_GET['isbn']);

    if (isset($_SESSION["username"])) {

        $username = $_SESSION["username"];
        
        $query = "SELECT * FROM RECENSIONI WHERE ISBN = '$isbn' AND username != '$username'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) === 0) {
            echo json_encode("Nessun elemento!");
            exit;
        }
            
            $preferencesArray = array();
            while($row = mysqli_fetch_assoc($res)) {
                $preferencesArray[] = $row;
            }
            echo json_encode($preferencesArray);
            
            mysqli_close($conn);
            exit;

    }

$query = "SELECT * FROM RECENSIONI WHERE ISBN = '$isbn'";

$res = mysqli_query($conn, $query) or die(mysqli_error($conn));

if (mysqli_num_rows($res) === 0) {
    echo json_encode("Nessun elemento!");
    exit;
}
    
    $preferencesArray = array();
    while($row = mysqli_fetch_assoc($res)) {
        $preferencesArray[] = $row;
    }
    echo json_encode($preferencesArray);
    
    mysqli_close($conn);
    exit;

}

?>