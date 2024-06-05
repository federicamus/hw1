
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
        <title>Book</title>
        <link rel="stylesheet" href="book.css">
        <link rel="stylesheet" href="shared.css">
        <script src="book.js" defer></script>
        <meta charset="UTF-8">
        <link href="https://db.onlinewebfonts.com/c/1b3f9cb78376a36884f3908f37a42c91?family=Tiempos+Text+Regular" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/4c40c7f27503517082e3857518913bab?family=Brandon+Grotesque+Bold" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/544da55955a950deb15d6a7536c4da34?family=Brandon+Grotesque+Regular" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
        <div id="book-container" class="container">
            <section class="book-view"></section>

        <div class="add-cart">AGGIUNGI AL CARRELLO<img src="/hw1/img/icons8-aggiungi-al-carrello.gif"></div>

            <section id="review">
                <h2>Hai già letto questo libro?</h2>

                <form id="review-form" name='review-form' method='post'>
                        <input type="text" id="search-input" name="review" placeholder="Lascia una recensione...">
                        <div id="search-buttons">
                            <input type="button" class="cancella-button" value="Cancella">
                            <input type="submit" class="search-button" value="Invia">
                        </div>
                </form>
                <div id="your-review" class="hidden">
                </div>
                <section id="modale-modifiedReview" class="hidden">
                    <div class="review-container">
                        <div id="exit-review"><button class="exit-button">✕</button></div>
                        <form id="modifiedReview-form" name='modifiedReview-form' method='post'>
                            <input type="text" id="search-input" name="review" placeholder="Inserire la nuova recensione...">
                            <div id="search-buttons">
                                <input type="button" class="cancella-button" value="Cancella">
                                <input type="submit" class="search-button" value="Invia">
                            </div>
                        </form>
                    </div>
                    </section>  

                <div id="reviews-added">
                    <h2>Le recensioni degli altri utenti:</h2>

                </div>
            </section>
        </div>
        </main>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>