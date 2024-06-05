<?php
    session_start();
    if(isset($_SESSION["username"]))
    {
        include 'header_logged.php';
    }
    else {
        include 'header.php';
    }

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Ordini</title>
        <link rel="stylesheet" href="orders.css">
        <link rel="stylesheet" href="shared.css">
        <script src="orders.js" defer></script>
        <meta charset="UTF-8">
        <link href="https://db.onlinewebfonts.com/c/1b3f9cb78376a36884f3908f37a42c91?family=Tiempos+Text+Regular" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/4c40c7f27503517082e3857518913bab?family=Brandon+Grotesque+Bold" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/544da55955a950deb15d6a7536c4da34?family=Brandon+Grotesque+Regular" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">
    </head>
    <body>      
        <main>
            <section id="orders" class="container">
            <h1 class="orders-title">I TUOI ORDINI</h1>
            <section id="orders-box"></section>
            </section>
        </main>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>
