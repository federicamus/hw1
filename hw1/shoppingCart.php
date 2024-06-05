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
        <title>Carrello</title>
        <link rel="stylesheet" href="shoppingCart.css">
        <link rel="stylesheet" href="shared.css">
        <script src="shoppingCart.js" defer></script>
        <meta charset="UTF-8">
        <link href="https://db.onlinewebfonts.com/c/1b3f9cb78376a36884f3908f37a42c91?family=Tiempos+Text+Regular" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/4c40c7f27503517082e3857518913bab?family=Brandon+Grotesque+Bold" rel="stylesheet">
        <link href="https://db.onlinewebfonts.com/c/544da55955a950deb15d6a7536c4da34?family=Brandon+Grotesque+Regular" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>

        <div id="carrello" class="container">
            <h1 class="carrello-title">IL TUO CARRELLO</h1>
            <section id="carrello-box"></section>
            <section id="subtotale"></section>
            <div id="proceed_order">PROCEDI CON L'ORDINE<span>→</span></div>
        </div>

        <section id="billing" class="hidden">
            <div class="container">
                <h2>INTESTAZIONE DELL'ORDINE</h2>
                <legend>NOMINATIVO E INDIRIZZO</legend>
                <form id='billing_form' name='billing_form' method='post'>            
                    <div class="order_fields"><label>Nome*: <br/> <input type='text' name='nome' class='order-input'></label></div>
                    <div class="order_fields"><label>Cognome*: <br/> <input type='text' name='cognome' class='order-input'></label></div>
                    <div class="order_fields"><label>Indirizzo per esteso con numero civico*: <br/> <input type='text' name='indirizzo' class='order-input'></label></div>
                    <div class="order_fields"><label>c/o, interno, località, ufficio ... (facoltativo): <br/> <input type='text' name='fac' class='order-input'></label></div>
                    <div class="order_fields"><label>CAP*: <br/> <input type='text' name='cap' class='order-input'></label></div>
                    <div class="order_fields"><label>Città*: <br/> <input type='text' name='citta' class='order-input'></label></div>
                    <div class="order_fields"><label>Provincia*: <br/> <select name='provincia' class='order-input'>
                                                <option value="">-- Provincia --</option>
                                                <option value="AG">Agrigento</option>
                                                <option value="AL">Alessandria</option>
                                                <option value="AN">Ancona</option>
                                                <option value="AR">Arezzo</option>
                                                <option value="AP">Ascoli Piceno</option>
                                                <option value="AT">Asti</option>
                                                <option value="AV">Avellino</option>
                                                <option value="BA">Bari</option>
                                                <option value="BT">Barletta-Andria-Trani</option>
                                                <option value="BL">Belluno</option>
                                                <option value="BN">Benevento</option>
                                                <option value="BG">Bergamo</option>
                                                <option value="BI">Biella</option>
                                                <option value="BO">Bologna</option>
                                                <option value="BZ">Bolzano - Bozen</option>
                                                <option value="BS">Brescia</option>
                                                <option value="BR">Brindisi</option>
                                                <option value="CA">Cagliari</option>
                                                <option value="CL">Caltanissetta</option>
                                                <option value="CB">Campobasso</option>
                                                <option value="CI">Carbonia-Iglesias</option>
                                                <option value="CE">Caserta</option>
                                                <option value="CT">Catania</option>
                                                <option value="CZ">Catanzaro</option>
                                                <option value="CH">Chieti</option>
                                                <option value="CO">Como</option>
                                                <option value="CS">Cosenza</option>
                                                <option value="CR">Cremona</option>
                                                <option value="KR">Crotone</option>
                                                <option value="CN">Cuneo</option>
                                                <option value="EN">Enna</option>
                                                <option value="FM">Fermo</option>
                                                <option value="FE">Ferrara</option>
                                                <option value="FI">Firenze</option>
                                                <option value="FG">Foggia</option>
                                                <option value="FC">Forlì-Cesena</option>
                                                <option value="FR">Frosinone</option>
                                                <option value="GE">Genova</option>
                                                <option value="GO">Gorizia</option>
                                                <option value="GR">Grosseto</option>
                                                <option value="IM">Imperia</option>
                                                <option value="IS">Isernia</option>
                                                <option value="AQ">L'Aquila</option>
                                                <option value="SP">La Spezia</option>
                                                <option value="LT">Latina</option>
                                                <option value="LE">Lecce</option>
                                                <option value="LC">Lecco</option>
                                                <option value="LI">Livorno</option>
                                                <option value="LO">Lodi</option>
                                                <option value="LU">Lucca</option>
                                                <option value="MC">Macerata</option>
                                                <option value="MN">Mantova</option>
                                                <option value="MS">Massa-Carrara</option>
                                                <option value="MT">Matera</option>
                                                <option value="VS">Medio Campidano</option>
                                                <option value="ME">Messina</option>
                                                <option value="MI">Milano</option>
                                                <option value="MO">Modena</option>
                                                <option value="MB">Monza e Brianza</option>
                                                <option value="NA">Napoli</option>
                                                <option value="NO">Novara</option>
                                                <option value="NU">Nuoro</option>
                                                <option value="OG">Ogliastra</option>
                                                <option value="OT">Olbia-Tempio</option>
                                                <option value="OR">Oristano</option>
                                                <option value="PD">Padova</option>
                                                <option value="PA">Palermo</option>
                                                <option value="PR">Parma</option>
                                                <option value="PV">Pavia</option>
                                                <option value="PG">Perugia</option>
                                                <option value="PU">Pesaro Urbino</option>
                                                <option value="PE">Pescara</option>
                                                <option value="PC">Piacenza</option>
                                                <option value="PI">Pisa</option>
                                                <option value="PT">Pistoia</option>
                                                <option value="PN">Pordenone</option>
                                                <option value="PZ">Potenza</option>
                                                <option value="PO">Prato</option>
                                                <option value="RG">Ragusa</option>
                                                <option value="RA">Ravenna</option>
                                                <option value="RC">Reggio di Calabria</option>
                                                <option value="RE">Reggio nell'Emilia</option>
                                                <option value="RI">Rieti</option>
                                                <option value="RN">Rimini</option>
                                                <option value="RM">Roma</option>
                                                <option value="RO">Rovigo</option>
                                                <option value="SA">Salerno</option>
                                                <option value="SS">Sassari</option>
                                                <option value="SV">Savona</option>
                                                <option value="SI">Siena</option>
                                                <option value="SR">Siracusa</option>
                                                <option value="SO">Sondrio</option>
                                                <option value="TA">Taranto</option>
                                                <option value="TE">Teramo</option>
                                                <option value="TR">Terni</option>
                                                <option value="TO">Torino</option>
                                                <option value="TP">Trapani</option>
                                                <option value="TN">Trento</option>
                                                <option value="TV">Treviso</option>
                                                <option value="TS">Trieste</option>
                                                <option value="UD">Udine</option>
                                                <option value="AO">Valle d'Aosta</option>
                                                <option value="VA">Varese</option>
                                                <option value="VE">Venezia</option>
                                                <option value="VB">Verbano-Cusio-Ossola</option>
                                                <option value="VC">Vercelli</option>
                                                <option value="VR">Verona</option>
                                                <option value="VV">Vibo Valentia</option>
                                                <option value="VI">Vicenza</option>
                                                <option value="VT">Viterbo</option>
                                            </select>
                    </label></div>
                    <legend>INFORMAZIONI PER LA FATTURAZIONE</legend>
                    <div class="order_fields"><label>Codice fiscale: <br/> <input type='text' name='cf' class='order-input'></label></div>
                    <legend>CONTATTO TELEFONICO</legend>
                    <div class="order_fields"><label>Telefono principale*: <br/> <input type='text' name='tel_princ' class='order-input'></label></div>
                    <div class="order_fields"><label>Telefono secondario: <br/> <input type='text' name='tel_sec' class='order-input'></label></div>

                    <br/>
                    <label>&nbsp;<input type='submit' value="SALVA E PROCEDI CON L'ORDINE  →" class='submit-button'></label>
                </form>
            </div>
        </section>

        <section id="payment" class="hidden">
            <div class="container">
                <h2>MODALITA' DI PAGAMENTO</h2>
                <form id='payment_form' name='payment_form' method='post'>            
                    <div class="order_fields"><label>Numero della carta: <br/> <input type='text' name='numero' class='order-input'></label></div>
                    <div class="order_fields"><label>Nome sulla carta: <br/> <input type='text' name='nome' class='order-input'></label></div>
                    <div class="order_fields"><label>Data di scadenza: <br/> <select name='mese' class='date-input'>
                                                    <option value="1">01</option>
                                                    <option value="2">02</option>
                                                    <option value="3">03</option>
                                                    <option value="4">04</option>
                                                    <option value="5">05</option>
                                                    <option value="6">06</option>
                                                    <option value="7">07</option>
                                                    <option value="8">08</option>
                                                    <option value="9">09</option>
                                                    <option value="10">10</option>
                                                    <option value="11">11</option>
                                                    <option value="12">12</option>
                                                </select>
                                                <select name='anno' class='date-input'>
                                                    <option value="2024">2024</option>
                                                    <option value="2025">2025</option>
                                                    <option value="2026">2026</option>
                                                    <option value="2027">2027</option>
                                                    <option value="2028">2028</option>
                                                    <option value="2029">2029</option>
                                                    <option value="2030">2030</option>
                                                    <option value="2031">2031</option>
                                                    <option value="2032">2032</option>
                                                    <option value="2033">2033</option>
                                                    <option value="2034">2034</option>
                                                    <option value="2035">2035</option>
                                                    <option value="2036">2036</option>
                                                    <option value="2037">2037</option>
                                                    <option value="2038">2038</option>
                                                    <option value="2039">2039</option>
                                                    <option value="2040">2040</option>
                                                    <option value="2041">2041</option>
                                                    <option value="2042">2042</option>
                                                    <option value="2043">2043</option>
                                                    <option value="2044">2044</option>
                                                </select>
                    </label></div>  
                    <div class="order_fields"><label>Codice di sicurezza (CVV): <br/> <input type='text' name='cvv' class='date-input'></label></div> 
                    <label>&nbsp;<input type='submit' value="AGGIUNGI LA TUA CARTA →" class='submit-button'></label>
                </form>
            </div>
        </section>

        <section id="order-checking" class="hidden">
            <div class="container">
                <h2>CONTROLLA E CONFERMA IL TUO ORDINE</h2>
                <form id='order_form' name='order_form' method='post'>
                    <section id="cart-summary"></section>
                    <section id="subtotale"></section>
                    <section id="order-summary">
                        <div class="indirizzo-spedizione">
                        </div>
                        <div class="metodo-pagamento">
                        </div>
                    </section>
                    <section id="shipping">
                    Spedizione con corriere (spedito in 3-5gg lavorativi) <span>Gratuito</span>
                    </section>
                    <label>&nbsp;<input type='submit' value="CONFERMA E PAGA →" class='submit-button'></label>
                </form>
            </div>
        </section>

        </main>
        <?php
            include 'footer.php';
        ?>
    </body>
</html>