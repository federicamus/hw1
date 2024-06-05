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
        <title>Cerca</title>
        <link rel="stylesheet" href="searchBook.css">
        <link rel="stylesheet" href="shared.css">
        <script src="searchBook.js" defer></script>
        <meta charset="UTF-8">
        <link href="https://db.onlinewebfonts.com/c/1b3f9cb78376a36884f3908f37a42c91?family=Tiempos+Text+Regular" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/4c40c7f27503517082e3857518913bab?family=Brandon+Grotesque+Bold" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/544da55955a950deb15d6a7536c4da34?family=Brandon+Grotesque+Regular" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">
    </head>
    <body>      
        <div id='full-page-search'>
            <div class="container">
                <form id="full-page-search-form">
                    <input type="text" id="search-input" placeholder="Cerca per titolo o autore">
                    <div id="search-buttons">
                        <input type="button" class="cancella-button" value="Cancella">
                        <input type="submit" class="search-button" value="Cerca">
                    </div>
                </form>
                <section id="SearchResults-view">
                    
                </section>
                <section class="book-view">
                </section>
            </div>
        </div>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>
