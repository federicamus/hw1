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
        <title>Iperborea</title>
        <link rel="stylesheet" href="index.css">
        <link rel="stylesheet" href="shared.css">
        <script src="index.js" defer></script>
        <meta charset="UTF-8">
        <link href="https://db.onlinewebfonts.com/c/1b3f9cb78376a36884f3908f37a42c91?family=Tiempos+Text+Regular" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/4c40c7f27503517082e3857518913bab?family=Brandon+Grotesque+Bold" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/544da55955a950deb15d6a7536c4da34?family=Brandon+Grotesque+Regular" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="font-awesome.min.css">
        <link rel="stylesheet" href="font-awesome.css">


    </head>
    <body>   
          
        <main id="main">
            <div class="slider-container">
                <div class="slider">
                        <img src="https://iperborea.com/files/website/HeaderHomepage/iperborea-template-hp-desktop_kjc6Fhy.jpg">                  
                        <img src="https://iperborea.com/files/website/HeaderHomepage/iperborea-template-hp-desktop_v6CSXys.jpg">                        
                        <img src="https://iperborea.com/files/website/HeaderHomepage/i-confidenti-1.jpg">               
                </div>
            </div>
            <section id="iperborei">               
                <div class="container">
                    <div class="iperborei-title">
                        <a href="https://iperborea.com/titoli/collana/gli-iperborei">
                            <img src="https://iperborea.com/static/2021/img/iperborei.svg" class="iperborei-logo">                            
                        </a>
                    </div>
                    <div class="novita-tab">
                        <a class="libro-novita" href="https://iperborea.com/titolo/660/lislandese-che-sapeva-raccontare-storie">
                            <div class="libro-format">
                                <div class="cop-libro">
                                    <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000660/20240118164805_Cover_racconti_islandesi.jpg.400x600_q85_upscale.jpg" class="img-libro">
                                </div>
                                <div class="info-libro">
                                    <div class="titolo-libro">
                                        L'ISLANDESE CHE SAPEVA RACCONTARE STORIE
                                        <div class="separatore"></div>
                                    </div>
                                    <div class="trama-libro">
                                     Una raccolta di racconti avventurosi e fiabeschi tratti dall'enorme patrimonio narrativo dell'Islanda medievale.
                                     Nell’Europa medievale l’Islanda è l’unico paese senza una mo…               
                                    </div>
                                    <div class="data-libro">Febbraio 2024</div>
                                </div>
                            </div>
                        </a>
                        <a class="libro-novita" href="https://iperborea.com/titolo/662/i-dettagli">
                            <div class="libro-format">
                                <div class="cop-libro">
                                    <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000662/20240124101927_380_cover_alta_(1).jpg.600x1800_q85_upscale.jpg" class="img-libro">
                                </div>
                                <div class="info-libro">
                                    <div class="autore-libro">Ia GENBERG</div>
                                    <div class="titolo-libro">
                                        I DETTAGLI
                                        <div class="separatore"></div>
                                    </div>
                                    <div class="trama-libro">
                                        Caso letterario nel mondo nordico, vincitore del Premio August 2022 – il più alto riconoscimento per la letteratura svedese – 
                                        <em>I dettagli </em>    
                                        ha venduto più di 100.000 copie in Svezia...           
                                    </div>
                                    <div class="data-libro">Febbraio 2024</div>
                                </div>
                            </div>
                        </a>

                        <a class="libro-novita" href="https://iperborea.com/titolo/664/il-cliente-busken">
                            <div class="libro-format">
                                <div class="cop-libro">
                                    <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000664/20231222153810_Cover_Brouwers.jpg.600x1800_q85_upscale.jpg" class="img-libro">
                                </div>
                                <div class="info-libro">
                                    <div class="autore-libro">Jeroen BROUWERS</div>
                                    <div class="titolo-libro">
                                        IL CLIENTE BUSKEN
                                        <div class="separatore"></div>
                                    </div>
                                    <div class="trama-libro">                                        
                                    Vincitore del Premio Libris, 
                                    <em>Il cliente Busken</em>  
                                    è il grande romanzo testamento di uno dei più importanti autori olandesi contemporanei, una denuncia feroce e a tratti spassosa contro la brutal…      
                                    </div>
                                    <div class="data-libro">Gennaio 2024</div>
                                </div>
                            </div>
                        </a>
                        <a class="libro-novita" href="https://iperborea.com/titolo/656/castelli-daria-e-altre-fiabe-finlandesi">
                            <div class="libro-format">
                                <div class="cop-libro">
                                    <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000656/20231018085129_Alta.jpg.600x1800_q85_upscale.jpg" class="img-libro">
                                </div>
                                <div class="info-libro">
                                    <div class="autore-libro">Zacharias TOPELIUS</div>
                                    <div class="titolo-libro">
                                        CASTELLI D'ARIA E ALTRE FIABE FINLANDESI
                                        <div class="separatore"></div>
                                    </div>
                                    <div class="trama-libro">                                                                                  
                                     L’anelito al sogno e alla fantasia in una raccolta di fiabe d’autore che mescolano con grazia tradizione europea e folklore finnico.
                                     Uno sguardo puro, un animo di bambino e la capacità…                                       
                                    </div>
                                    <div class="data-libro">Novembre 2023</div>
                                </div>
                            </div>
                        </a>
                        <a class="libro-novita" href="https://iperborea.com/titolo/654/le-mille-e-una-notte">
                            <div class="libro-format">
                                <div class="cop-libro">
                                    <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000654/20231005101853_3.jpg.600x1800_q85_upscale.jpg" class="img-libro">
                                </div>
                                <div class="info-libro">
                                    <div class="autore-libro">Kader ABDOLAH</div>
                                    <div class="titolo-libro">
                                        LE MILLE E UNA NOTTE
                                        <div class="separatore"></div>
                                    </div>
                                    <div class="trama-libro">                                                                                  
                                        Nella sua famiglia è tradizione che tutti gli anziani rielaborino un classico della letteratura persiana da lasciare in eredità ai propri discendenti: Kader Abdolah ha deciso di farlo c…
                                      
                                    </div>
                                    <div class="data-libro">Novembre 2023</div>
                                </div>
                            </div>
                        </a>
                        <a class="libro-novita" href="https://iperborea.com/titolo/655/il-capitano-jens-munk">
                            <div class="libro-format">
                                <div class="cop-libro">
                                    <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000655/20231012135653_93_cover.jpg.600x1800_q85_upscale.jpg" class="img-libro">
                                </div>
                                <div class="info-libro">
                                    <div class="autore-libro">Thorkild HANSEN</div>
                                    <div class="titolo-libro">
                                        IL CAPITANO JENS MUNK
                                        <div class="separatore"></div>
                                    </div>
                                    <div class="trama-libro">                                                                                         
                                        Una nuova edizione del grande romanzo di Thorkild Hansen sulla vita del marinaio Jens Munk (1579-1628) e sulle sue numerose spedizioni nel tentativo di navigare verso il Nord America.
                                        L’avvent…                                                                                                                               
                                   </div>
                                    <div class="data-libro">Novembre 2023</div>
                                </div>
                            </div>
                        </a>                                              
                    </div>
                    <div class="scopri-iperborei">
                        <a class="link-iperborei" href="https://iperborea.com/titoli/collana/gli-iperborei">SCOPRI TUTTI GLI IPERBOREI</a>
                    </div>
                </div>
            </section>
            <section id="collane">
                <div class="container">
                    <div class="collane-intestazione">
                        <h2 class="collane-title">COLLANE</h2>
                        <div class="collane-tutte">
                            <a style="text-decoration: none;" class="collane-link" href="https://iperborea.com/titoli#collane">
                                TUTTE 
                                <span>→</span>
                            </a>
                        </div>
                    </div> 
                    <div class="collane-tab">
                        <div class="collana-format">
                            <div class="collana-nome">
                                <a href="https://iperborea.com/titoli/collana/i-corvi">
                                    <img src="https://iperborea.com/files/website/Collana/i-corvi.png" class="logo-corvi">
                                </a>
                            </div>
                            <div class="collana-corpo">
                                <div class="copertine">
                                    <a href="https://iperborea.com/titolo/661/il-grande-nord">
                                        <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000661/20240130121810_4_ICORVI_TALLACK_2.jpg.400x600_q85_upscale.jpg" class="cop-collana">
                                    </a>
                                    <a href="https://iperborea.com/titolo/653/stranieri-a-noi-stessi">
                                        <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000653/20231130110404_Cover_alta.jpg.400x600_q85_upscale.jpg" class="cop-collana">
                                    </a>
                                </div>
                                <div class="testo-collana">
                                La collana di saggistica narrativa in traduzione da tutto il mondo nata nel 2023 che coniuga la qualità letteraria degli Iperborei con lo sguardo sul contemporaneo di The Passenger.
                                </div>
                                <a class="scopri-collana" href="">SCOPRI</a>
                            </div>                                                 
                        </div>
                        <div class="collana-format">
                            <div class="collana-nome">
                                <a href="https://iperborea.com/titoli/collana/i-miniborei">
                                    <img src="https://iperborea.com/files/website/Collana/i-miniborei-2.png" class="logo-miniborei">
                                </a>
                            </div>
                            <div class="collana-corpo">
                                <div class="copertine">
                                    <a href="https://iperborea.com/titolo/666/una-coda-per-nisse">
                                        <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000666/20240216121106_47_COVER_Una_coda_per_Nisse_alta.jpg.600x1800_q85_upscale.jpg" class="cop-nisse">
                                    </a>
                                    <a href="https://iperborea.com/titolo/658/grande-bro">
                                        <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000658/20231221112211_46_cover_alta.jpg.600x1800_q85_upscale.jpg" class="cop-collana">
                                    </a>
                                </div>
                                <div class="testo-collana">
                                «Piccole grandi storie per grandi piccoli lettori»: libri illustrati, romanzi e racconti dal Nord Europa per bambini e ragazzi dai 3 ai 14 anni.                                </div>
                                <a class="scopri-collana" href="">SCOPRI</a>
                            </div>
                        </div>
                        <div class="collana-format">
                            <div class="collana-nome">
                                <a href="https://iperborea.com/titoli/collana/mumin">
                                    <img src="https://iperborea.com/files/website/Collana/mumin.png" class="logo-mumin">
                                </a>
                            </div>
                            <div class="collana-corpo">
                                <div class="copertine">
                                    <a href="https://iperborea.com/titolo/607/mumin-sinnamora">
                                        <img src="https://iperborea.com/files/files_intranet/apps/librocatalogo/cover/000607/20220706143953_6_cover_alta.jpg.400x600_q85_upscale.jpg" class="cop-mumin">
                                    </a>                                    
                                </div>
                                <div class="testo-collana">
                                    La serie delle strisce dei Mumin, la famiglia di troll finlandesi nati dalla fantasia di Tove Jansson. Per bambini e adulti di ogni età.</div>
                                    <a class="scopri-collana" href="">SCOPRI</a>
                        </div>                       
                    </div>                      
                </div>
            </section>
            <section id="thepassenger">
                <div class="container">
                    <div class="passenger-format">
                        <div class="passenger-info">
                            <h2 class="passenger-title">
                                <img src="https://iperborea.com/static/2021/img/passenger.svg" class="passenger-logo">
                            </h2>
                            <p class="passenger-testo">
                            Una raccolta di inchieste, reportage letterari e saggi narrativi che formano il ritratto della vita contemporanea di un paese o di una città e dei loro abitanti. Volumi a colori, con fotografie, illustrazioni e infografiche originali.
                            </p>
                            <div>
                                <a style="text-decoration: none;" class="scopri-passenger" href="https://thepassenger.iperborea.com/">SCOPRI THE PASSENGER</a>
                            </div>
                            <div>
                                <button id="spotify-button">
                                    <img class="spotify-logo" src="/hw1/img/icons8-spotify-30.png">
                                    <span>SCOPRI LE PLAYLIST DI THE PASSENGER<span>
                                </button>
                            </div>
                        </div>
                        <div class="cop-passenger">
                            <a href="https://thepassenger.iperborea.com/titoli/corea-del-sud/">
                                <img src="https://thepassenger.iperborea.com/wp-content/uploads/2024/02/cover_corea.jpg" class="pass-img">
                            </a>
                            <a href="https://thepassenger.iperborea.com/titoli/venezia/">
                                <img src="https://thepassenger.iperborea.com/wp-content/uploads/2023/11/cover_venezia.jpg" class="pass-img">
                            </a>
                            <div class="class-mobile">
                                <a href="https://thepassenger.iperborea.com/titoli/palestina/">
                                    <img src="https://thepassenger.iperborea.com/wp-content/uploads/2023/09/palestina-cover-sito.jpg" class="pass-img">
                                </a>
                            </div>
                        </div>
                    </div>
                    <section id="modale-playlist" class="hidden">
                        <div id='playlist-container'>
                            <div id="exit-playlist"><button class="exit-button">✕</button></div>
                            <div id="playlist-view"></div> 
                        </div>
                    </section>  
                </div>
            </section>
            <section id="cosespiegatebene">
                <div class="container">
                    <div class="csb-format">
                        <div class="csb-info">
                            <h2 class="csb-title">
                                <img src="https://iperborea.com/static/2021/img/cose.png" class="csb-logo">
                            </h2>
                            <p class="csb-testo">
                                La rivista di carta del <em>Post</em>, realizzata in collaborazione con Iperborea. Ogni titolo è dedicato a un argomento per declinare la proverbiale inclinazione descrittiva e di chiarezza del <em>Post</em>, raccogliendo spiegazioni, storie, e racconti d’autore.
                            </p>
                            <div>
                                <a style="text-decoration: none;" class="scopri-csb" href="https://www.cosespiegatebene.it/">SCOPRI COSE SPIEGATE BENE</a>
                            </div>
                        </div>
                        <div class="cop-csb">
                            <a href="https://www.cosespiegatebene.it/titoli/limportante-e-partecipare/">
                                <img src="https://iperborea.com/files/website/HomepageBlock/CSB_Olimpiadi_COVER_FRONT-510x796.jpg" class="csb-img">
                            </a>
                            <a href="https://www.cosespiegatebene.it/titoli/a-natale-tutti-insieme/">
                                <img src="https://iperborea.com/files/website/HomepageBlock/CSB_Natale_COVER-510x796-3.jpg" class="csb-img">
                            </a>                           
                        </div>
                    </div>
                </div>
            </section>
            <section id="integrale">
                <div class="container">
                    <div class="int-format">
                        <div class="int-info">
                            <h2 class="int-title">
                                <img src="https://iperborea.com/static/2021/img/integrale.png" class="int-logo">
                            </h2>
                            <p class="int-testo">
                                Una rivista-libro che esplora le storie umane e le narrazioni collettive legate al cibo, i suoi miti e i suoi tabù. Attraverso linguaggi e generi diversi, tra giornalismo e letteratura e con tanti disegni irriverenti, approfondisce in ogni numero un tema centrale della nostra cultura enogastronomica.
                            </p>
                            <div>
                                <a style="text-decoration: none;" class="scopri-int" href="https://www.lintegralerivista.it/">SCOPRI L'INTEGRALE</a>
                            </div>
                        </div>
                        <div class="cop-int">
                            <a href="http://www.lintegralerivista.it/titoli/metamorfosi/">
                                <img src="http://www.lintegralerivista.it/2023/wp-content/uploads/2023/09/cover-integrale.jpg" class="int-img">
                            </a>
                            <a href="https://www.lintegralerivista.it/titoli/lintegrale-guasto/">
                                <img src="https://www.lintegralerivista.it/2023/wp-content/uploads/2023/05/guasto-cover.jpg" class="int-img">
                            </a>                           
                        </div>
                    </div>
                </div>
            </section>
            <section id="eventi">
                <div class="container">
                    <div class="eventi-format">
                        <div class="eventi-gen">
                            <h2 class="eventi-title">EVENTI</h2>
                            <p>
                                LUNEDÌ 25 MARZO
                                <br>
                                Giufà Libreria Caffè (Via degli Aurunci, 38 - Roma)
                            </p>
                            <h3 class="eventi-info">PRESENTAZIONE DI «THE PASSENGER - COREA DEL SUD» A GIUFÀ LIBRERIA CAFFÈ</h3>
                            <a style="text-decoration: none;" href="https://iperborea.com/eventi/197/presentazione-di-the-passenger-corea-del-sud-a-giufa-libreria-caffe" class="eventi-link">
                                LEGGI 
                                <span>→</span>
                            </a>
                        </div>
                        <div class="boreali">
                            <h2 class="boreali-title">
                                <img src="https://iperborea.com/static/2021/img/iboreali.svg" class="boreali-logo1">
                                <img src="https://iperborea.com/static/2021/img/star.svg" class="boreali-logo2">
                                <img src="https://iperborea.com/static/2021/img/nordicfestival.svg" class="boreali-logo3">                                
                            </h2>
                            <div class="boreali-format">
                                <div class="boreali-info">
                                    <p>
                                    Il festival italiano
                                    <br>
                                    dedicato alla cultura nordeuropea
                                    </p>
                                    <h3 class="boreali-luogodata">MILANO
                                    <br>
                                    1 – 3 MARZO 2024</h3>
                                    <a style="text-decoration: none;" href="https://iboreali.it/2024/" class="eventi-link">
                                    SCOPRI DI PIU' 
                                        <span>→</span>
                                    </a>
                                </div>
                            <img src="https://iperborea.com/static/2021/img/iboreali-2024.png" class="boreali-img">
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="news">
                <div class="container">
                    <div class="news-intestazione">
                        <h2 class="news-title">NEWS</h2>
                        <div class="news-link">
                            <a style="text-decoration: none;" class="collane-link" href="https://iperborea.com/news">
                                LEGGI TUTTE LE NEWS  
                                <span>→</span>
                            </a>
                        </div>
                    </div> 
                    <div class="news-corpo">
                        <img src="https://iperborea.com/files/website/News/419488111_819234870218017_1820226056512089554_n.jpg" class="news-img">
                        <div class="news-info">
                            <span class="newsletter">APPROFONDIMENTO</span>
                            <h4>
                                <a style="text-decoration: none;" class="news-speciale" href="https://iperborea.com/news/929/lamica-scimmia-un-racconto-di-ia-genberg">
                                    «GRANDE, BRO!»: IDENTITÀ E SKATEBOARD</a>
                            </h4>
                            <div class="news-testo">
                                <div class="news-sep"></div>
                                <div>
                                    Jenny Jägerfeld, in Svezia, è considerata l'erede di Ulf Stark. Ha la capacità di raccontare il mondo dell'adolescenza con delicatezza e convinzione. Con uno stile fresco, lucido e a tratti ironico t…
                                    <br>
                                    <br>
                                    <div class="news-leggi">
                                        LEGGI DI PIU'
                                        <span>→</span>
                                    </div>
                                    <div class="news-leggi-testo hidden">...ratteggia personaggi credibili a cui si può solo voler bene. Måns è uno di questi. Una persona in cerca di se stessa, un dodicenne in transizione, che si sente un ragazzo intrappolato in un corpo non suo. Questo è il segreto che ha confessato ai genitori.</div>
                                    <div class="nascondi-news hidden">NASCONDI ⭡</div>
                                </div>
                            </div>
                            <div id="player"></div>   
                        </div>
                    </div>                
                </div>
            </section>
                <p class="newsletter-link">
                    Per essere aggiornati sui progetti di Iperborea
                    <br>
                    <a class="newsletter">ISCRIVITI ALLA NEWSLETTER</a>
                </p>
                
            <section id="classifiche">
                <div class="container">
                    <h2 class="classifiche-title">I PIÙ VENDUTI</h2>
                    <div class="class-iperborei">
                        <div class="class-nomecollana">
                            <div class="class-sep"></div>
                            Collana
                            <br>
                            IPERBOREI
                        </div>
                        <a style="text-decoration: none;" class="class-link" href="https://iperborea.com/titolo/613/il-faraone-dolanda">
                            1
                            <br>
                            <div class="class-autore">Kader ABDOLAH</div>
                            <br>
                            IL FARAONE D'OLANDA
                        </a>
                        <a style="text-decoration: none;" class="class-link" href="https://iperborea.com/titolo/611/abbandono">
                            2
                            <br>
                            <div class="class-autore">Elisabeth ÅSBRINK</div>
                            <br>
                            ABBANDONO
                        </a>
                        <div class="class-mobile">
                            <a style="text-decoration: none;" class="class-link" href="https://iperborea.com/titolo/163/la-casa-della-moschea">
                                3
                                <br>
                                <div class="class-autore">Kader ABDOLAH</div>
                                <br>
                                LA CASA DELLA MOSCHEA
                            </a>                          
                        </div>
                    </div>
                    <div class="class-miniborei">
                        <div class="class-nomecollana">
                            <div class="class-sep"></div>
                            Collana
                            <br>
                            MINIBOREI
                        </div>
                        <a style="text-decoration: none;" class="class-link" href="https://iperborea.com/titolo/613/il-faraone-dolanda">
                            1
                            <br>
                            <div class="class-autore">Astrid LINDGREN</div>
                            <br>
                            GRETA GRINTOSA
                        </a>
                        <a style="text-decoration: none;" class="class-link" href="https://iperborea.com/titolo/611/abbandono">
                            2
                            <br>
                            <div class="class-autore">Ulf STARK</div>
                            <br>
                            SAI FISCHIARE, JOHANNA?
                        </a>
                        <div class="class-mobile">
                            <a style="text-decoration: none;" class="class-link" href="https://iperborea.com/titolo/163/la-casa-della-moschea">
                                3
                                <br>
                                <div class="class-autore">Jacob WEGELIUS</div>
                                <br>
                                LA SCIMMIA DELL'ASSASSINO
                            </a>                          
                        </div>
                    </div>
                </div>
            </section>
            <section id="temi">
                <div class="container">
                    <h2 class="temi-title">ESPLORA PER TEMI</h2>
                    <div class="temi-tab" data-index="0">
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/estremo-nord" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/estremo-nord.png" class="temi-img">
                            <br>
                            <span>Estremo Nord</span>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/viaggio" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/viaggio.png" class="temi-img">
                            <br>
                            <span>Viaggio</span>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/amicizia" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/amicizia.png" class="temi-img">
                            <br>
                            <span>Amicizia</span>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/animali" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/animali.png" class="temi-img">
                            <br>
                            <span>Animali</span>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/avventura" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/avventura.png" class="temi-img">
                            <br>
                            <span>Avventura</span>
                        </a>
                        <div class="turn-right"> ⇾</div>
                    </div>
                    <div class="temi-tab hidden" data-index="1">
                        <div class="turn-left">⇽ </div>
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/fuga-dalla-civilta/" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/fuga.png" class="temi-img">
                            <br>
                            <span>Fuga dalla civiltà</span>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/isole/" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/isole.png" class="temi-img">
                            <br>
                            <span>Isole</span>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/liberta/" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/liberta.png" class="temi-img">
                            <br>
                            <span>Libertà</span>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/memoria/" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/memoria.png" class="temi-img">
                            <br>
                            <span>Memoria</span>
                        </a>
                        <a style="text-decoration: none;" href="https://iperborea.com/temi/migrazioni/" class="temi-link">
                            <img src="https://iperborea.com/files/website/Tema/migrazioni.png" class="temi-img">
                            <br>
                            <span>Migrazioni</span>
                        </a>
                    </div>
                    <a style="text-decoration: none;" href="https://iperborea.com/eventi/197/presentazione-di-the-passenger-corea-del-sud-a-giufa-libreria-caffe" class="vedi-temi">
                        VEDI TUTTI  
                        <span>→</span>
                    </a>
                </div>
            </section>
            <section id="paesi">
                <div class="container">
                    <h2 class="paesi-title">I PAESI DI IPERBOREA</h2>
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
                </div>
            </section>
        </main>

        <?php
            include 'footer.php';
        ?>

    </body>
</html>

