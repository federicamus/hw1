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
        <title>Paesi</title>
        <link rel="stylesheet" href="paesi.css">
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
            <section id="elenco-paesi">
                <div class="container">
                    <div class="paesi-testo">
                        <h1>I PAESI DI IPERBOREA</h1>
                        <p>
                            Fin dalla sua fondazione, nel 1987, Iperborea ha deciso di specializzarsi nella traduzione di opere di alto valore letterario da una piccola fetta di mondo, quella del Nord Europa. Si è partiti con l’area scandinava e la Finlandia. Presto si sono aggiunti l’Islanda, Paesi Bassi e Belgio fiammingo. Negli anni l’esplorazione si è spinta anche verso le repubbliche baltiche, la Germania e il Canada.
                        </p>
                        <p>
                            Ecco una piccola guida per orientarvi tra i <em>nostri</em> paesi.
                        </p>
                    </div>
                    <div class="paesi-tab">
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/belgio" class="paesi-link">
                            <div>
                                <span>Belgio</span>
                                <sup>4</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/brasile" class="paesi-link">
                            <div>
                                <span>Brasile</span>
                                <sup>2</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/canada" class="paesi-link">
                            <div>
                                <span>Canada</span>
                                <sup>2</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/danimarca" class="paesi-link">
                            <div>
                                <span>Danimarca</span>
                                <sup>66</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/estonia" class="paesi-link">
                            <div>
                                <span>Estonia</span>
                                <sup>4</sup>
                            </div>
                        </a>
                
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/finlandia" class="paesi-link">
                            <div>
                                <span>Finlandia</span>
                                <sup>87</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/germania" class="paesi-link">
                            <div>
                                <span>Germania</span>
                                <sup>4</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/islanda" class="paesi-link">
                            <div>
                                <span>Islanda</span>
                                <sup>62</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/italia" class="paesi-link">
                            <div>
                                <span>Italia</span>
                                <sup>16</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/lettonia" class="paesi-link">
                            <div>
                                <span>Lettonia</span>
                                <sup>2</sup>
                            </div>
                        </a>
                    
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/lituania" class="paesi-link">
                            <div>
                                <span>Lituania</span>
                                <sup>2</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/norvegia" class="paesi-link">
                            <div>
                                <span>Norvegia</span>
                                <sup>64</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/olanda" class="paesi-link">
                            <div>
                                <span>Olanda</span>
                                <sup>104</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/regno-unito" class="paesi-link">
                            <div>
                                <span>Regno Unito</span>
                                <sup>1</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/repubblica-ceca" class="paesi-link">
                            <div>
                                <span>Rep. Ceca</span>
                                <sup>1</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/svezia" class="paesi-link">
                            <div>
                                <span>Svezia</span>
                                <sup>207</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/svizzera" class="paesi-link">
                            <div>
                                <span>Svizzera</span>
                                <sup>2</sup>
                            </div>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/paesi/stati-uniti-america" class="paesi-link">
                            <div>
                                <span>Usa</span>
                                <sup>1</sup>
                            </div>
                        </a>
                    </div>
                    <div class="paesi-newsletter">
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