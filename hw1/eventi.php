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
        <title>Eventi</title>
        <link rel="stylesheet" href="eventi.css">
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
            <section id="eventi-conclusi">
                <div class="container">
                    <h1>PROSSIMI EVENTI</h1>
                    <div class="eventi-info-tab">
                        <div class="eventi-left-side">
                            <span>DA MERCOLEDÌ 17 APRILE A MERCOLEDÌ 29 MAGGIO</span>
                            <div>CONCLUSO</div>
                        </div>
                        <div class="eventi-right-side">
                            <a class="eventi-conclusi-title" href="/eventi/211/buon-compleanno-ulf-stark-80-letture-per-80-anni/">BUON COMPLEANNO ULF STARK: 80 LETTURE PER 80 ANNI</a>
                            <span>A BOLOGNA</span>
                            <div class="separatore"></div>
                            <p>Ulf Stark, uno dei più grandi autori per l’infanzia contemporanei, nel 2024 avrebbe compiuto 80 anni. Nella cornice del festival BOOM! Crescere nei libri, Bologna lo festeggia con una maratona di let…</p>
                            <a style="text-decoration: none;" href="https://iperborea.com/eventi/197/presentazione-di-the-passenger-corea-del-sud-a-giufa-libreria-caffe" class="eventi-link">
                                LEGGI →
                            </a>
                        </div>
                    </div>
                </div>
            </section>
            <section id="prossimi-eventi">
                <div class="container">
                    <div class="eventi-info-tab">
                        <div class="eventi-left-side">
                            <span>VENERDÌ 24 MAGGIO</span>
                            <div>TRA 10 GIORNI</div>
                        </div>
                        <div class="eventi-right-side">
                            <a class="eventi-conclusi-title" href="https://iperborea.com/eventi/212/kader-abdolah-ospite-al-festival-delle-culture-2024/">KADER ABDOLAH OSPITE AL FESTIVAL DELLE CULTURE 2024</a>
                            <span>A RAVENNA</span>
                            <div class="separatore"></div>
                            <p>Lo scrittore Kader Abdolah sarà ospite al Festival delle Culture a Ravenna, con due appuntamenti in programma nella giornata di venerdì 24 maggio. Di seguito trovate i dettagli: - ore 10.00, press…</p>
                            <a style="text-decoration: none;" href="https://iperborea.com/eventi/197/presentazione-di-the-passenger-corea-del-sud-a-giufa-libreria-caffe" class="eventi-link">
                                LEGGI →
                            </a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>