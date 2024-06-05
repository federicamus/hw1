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
        <title>Chi Siamo</title>
        <link rel="stylesheet" href="chisiamo.css">
        <link rel="stylesheet" href="shared.css">
        <script src="index.js" defer></script>
        <meta charset="UTF-8">
        <link href="https://db.onlinewebfonts.com/c/1b3f9cb78376a36884f3908f37a42c91?family=Tiempos+Text+Regular" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/4c40c7f27503517082e3857518913bab?family=Brandon+Grotesque+Bold" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/544da55955a950deb15d6a7536c4da34?family=Brandon+Grotesque+Regular" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <section id="chi-siamo-intro">
                <div class="container">
                   <div class="chi-siamo-box">
                    <h1>CHI SIAMO</h1>
                    <div class="chi-siamo-info">
                        <p>
                            Iperborea è una casa editrice indipendente fondata da Emilia Lodigiani nel 1987 per far conoscere la letteratura dell'area nord-europea in Italia. Primi a esplorarla in maniera sistematica, si è potuto farlo con vasta libertà di scelta e una produzione di altissima qualità, che spazia dai classici e premi Nobel, inediti o riproposti in nuove traduzioni, alle voci di punta della narrativa contemporanea.</br> </br>
    
    Oltre ai paesi scandinavi (Svezia, Danimarca, Norvegia e Finlandia), Iperborea pubblica letteratura baltica, nederlandese, tedesca, canadese, islandese (incluse le antiche saghe medioevali). </br> </br>
    
    Dal 2017 alla collana storica Gli Iperborei si affiancano I Miniborei, una proposta di narrativa e libri illustrati per l’infanzia (4-14 anni) da tutta l’area nordica, oltre a una serie dedicata alle strisce dei Mumin di Tove Jansson. </br> </br>
    
    Del 2018 è il lancio di The Passenger, un libro-magazine che raccoglie inchieste, reportage letterari e saggi narrativi che formano il ritratto della vita contemporanea di un paese, una città, un luogo e dei loro abitanti. Dal 2020 The Passenger è disponibile anche in inglese, pubblicato e distribuito in tutto il mondo in coedizione con Europa Editions, ed è stato tradotto anche in spagnolo, portoghese e coreano. </br> </br>
    
    Nel 2021 è arrivata la serie COSE Spiegate bene, in collaborazione con il Post: ogni numero è dedicato all’approfondimento di un tema, attraverso articoli, infografiche e illustrazioni originali, mentre nel 2023 si è aggiunta L’Integrale, una rivista-libro che esplora le storie umane e le narrazioni collettive legate alla cultura enogastronomica attraverso linguaggi e generi diversi, tra giornalismo e letteratura. </br> </br>
    
    Nel 2023 sono cominciate le pubblicazioni dei Corvi, la collana di saggistica narrativa in traduzione da tutto il mondo che coniuga la qualità letteraria degli Iperborei con lo sguardo sul contemporaneo di The Passenger. </br> </br>
    
    A partire dal 2015 Iperborea affianca alle pubblicazioni l’organizzazione del festival I Boreali, dedicato alla cultura nordica, a Milano e in varie città d’Italia.
                        </p>
                        <div class="chi-siamo-side">
                            <a href="">ESPLORA I PAESI →</a>
                            <a href="">ESPLORA LE COLLANE →</a>
                            <a href="">CONOSCI GLI AUTORI →</a>
                        </div>
                    </div>
                   </div>
                </div>
            </section>
            <section id="chi-siamo-crew">
                <div class="container">
                    <div class="crew-tab">
                        <div>
                            <h6>FONDATRICE</h6>
                            <p>Emilia Lodigiani</p>
                        </div>
                        <div>
                            <h6>EDITORE</h6>
                            <p>Pietro Biancardi</p>
                        </div>
                        <div>
                            <h6>DIRETTRICE EDITORIALE</h6>
                            <p>Cristina Gerosa</p>
                        </div>
                        <div>
                            <h6>REDAZIONE E EDITOR</h6>
                            <p>Alessandro Foggetta, Cristina Marasti,
                                Andrea Morstabilini, Silvia Piraccini</p>
                        </div>
                        <div>
                            <h6>REDAZIONE E UFFICIO TECNICO</h6>
                            <p>Anna Basile</p>
                        </div>
                        <div>
                            <h6>REDAZIONE THE PASSENGER</h6>
                            <p>Marco Agosta, Tomaso Biancardi, Beatrice Martelli</p>
                        </div>
                        <div>
                            <h6>WEB E SOCIAL MANAGER</h6>
                            <p>Matteo Tognocchi</p>
                        </div>
                        <div>
                            <h6>EVENTI</h6>
                            <p>Victoria Zenaro</p>
                        </div>
                        <div>
                            <h6>UFFICIO COMMERCIALE</h6>
                            <p>Anna Oppes</p>
                        </div>
                        <div>
                            <h6>COORDINAMENTO </br>
                                FESTIVAL I BOREALI</h6>
                            <p>Anna Oppes, Matteo Tognocchi, Victoria Zenaro</p>
                        </div>
                        <div>
                            <h6>UFFICIO STAMPA</h6>
                            <p>Francesca Gerosa</p>
                        </div>
                        <div>
                            <h6>AMMINISTRAZIONE</h6>
                            <p>Daniela Ferrante</p>
                        </div>
                    </div>

                    <div class="chi-siamo-extra-info">
                        <div>
                            <h3>I PREMI CHE ABBIAMO RICEVUTO</h3>
                            <button>+</button>
                        </div>
                        <div>
                            <h3>IL FORMATO DEI NOSTRI LIBRI</h3>
                            <button>+</button>
                        </div>
                    </div>
                    <div class="chi-siamo-newsletter">
                        <p>Vuoi restare aggiornato sui progetti di Iperborea?</p>
                        <a href="">ISCRIVITI ALLA NEWSLETTER</a>
                    </div>
                </div>
            </section>
        </main>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>