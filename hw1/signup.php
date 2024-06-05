<?php
   session_start();

   if(isset($_SESSION["username"]))
   {
       header("Location: index.php");
       exit;
   }

   
   if(isset($_POST["username"])&&isset($_POST["cognome"])&&isset($_POST["email"])&&isset($_POST["username"])&&isset($_POST["password"])&&isset($_POST["confirm_password"]))
   {

       $errore = array();
       $conn = mysqli_connect("localhost", "root", "", "hw1");

       $nome = mysqli_real_escape_string($conn, $_POST['nome']);
       $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
       $email = mysqli_real_escape_string($conn, $_POST['email']);
       $username = mysqli_real_escape_string($conn, $_POST['username']);
       $password = mysqli_real_escape_string($conn, $_POST['password']);
       $password = password_hash($password, PASSWORD_BCRYPT);
       $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

       if(strlen($nome) === 0 || strlen($cognome) === 0 || strlen($email) === 0 || strlen($username) === 0 || strlen($password) === 0 || strlen($confirm_password) === 0) {
            $errore[] = "Compilare tutti i campi";
       }

       if (strlen($password) > 8) {
           $errore[] = "La password non può superare gli 8 caratteri";
       } 

       if (strcmp($_POST["password"], $_POST["confirm_password"]) != 0) {
           $errore[] = "Le password non coincidono";
       }

       if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
           $errore[] = "Email non valida";
       }

       $query1 = "SELECT * FROM UTENTI WHERE username = '".$username."'";

       $res1 = mysqli_query($conn, $query1);

       if (mysqli_num_rows($res1) == 0) {

       $query2 = "INSERT INTO UTENTI VALUES ('".$nome."', '".$cognome."', '".$email."','".$username."','".$password."')";

       $res2 = mysqli_query($conn, $query2);

       if ($res2) {
           $_SESSION['username'] = $_POST['username'];
           header("Location: index.php");
           exit;
       }

       else
           $errore[] = "Qualcosa è andato storto in fase di registrazione";
       }
       
       else
           $errore[] = "Username già in uso!";
   }
?>



<html>
    <head>
        <link rel='stylesheet' href='signup.css'>
        <script src="signup.js" defer></script>
        <link href="https://db.onlinewebfonts.com/c/1b3f9cb78376a36884f3908f37a42c91?family=Tiempos+Text+Regular" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <div id="registration-header">
                    <div id = 'registration-logo'>
                        <a href="index.php"><img src = 'https://iperborea.com/static/2021/img/iperborea-logo.svg' class="logo-img"></a>
                    </div>
            </div>
            <div id='registration-box'>
                Per registrarti, compila il seguente <span class='highlight'>form</span>
                <br/>
                <form id='registration_form' name='registration_form' method='post' autocomplete="off">
                    <div class="nome">
                        <label for='name'>Nome</label>
                            <!-- Se il submit non va a buon fine, il server reindirizza su questa stessa pagina, quindi va ricaricata con 
                                i valori precedentemente inseriti -->
                        <input type='text' name='nome' class='input-format'<?php if(isset($_POST["name"])){echo "value=".$_POST["name"];} ?> >
                    </div>
                    <div class="cognome">
                        <label for='cognome'>Cognome</label>
                        <input type='text' name='cognome'class='input-format'<?php if(isset($_POST["surname"])){echo "value=".$_POST["surname"];} ?> >
                    </div>
                    <div class="username">
                        <label for='username'>Nome utente</label>
                        <input type='text' name='username' class='input-format'<?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                        <div class="errore_data hidden">× <span>Username già in uso</span></div>
                    </div>
                    <div class="email">
                        <label for='email'>Email</label>
                        <input type='text' name='email' class='input-format'<?php if(isset($_POST["email"])){echo "value=".$_POST["email"];} ?>>
                        <div class="errore_data hidden">× <span>Email non valida</span></div>
                    </div>
                    <div class="password">
                        <label for='password'>Password</label>
                        <input type='password' name='password' class='input-format'<?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    </div>
                    <div class="confirm_password">
                        <label for='confirm_password'>Conferma Password</label>
                        <input type='password' name='confirm_password'class='input-format' <?php if(isset($_POST["confirm_password"])){echo "value=".$_POST["confirm_password"];} ?>>
                        <div class="errore_data hidden">× <span>Le password non coincidono</span></div>
                    </div>
                    
                    <?php if(isset($errore)) {
                        foreach($errore as $err) {
                            echo "<div class='errore_data'>".$err."</div>";
                        }
                    } 
                    ?>
                    <div class="submit">
                    <label>&nbsp;<input type='submit' value='Registrati' class='submit-button'></label>
                    </div>
                </form>
                <p>Hai già un account? Allora, <a role="button" class='login-button' href='login.php'>Accedi</a>
                <div class="generic_error errore_data"></div>
                <div class="nota">
                    <span class='highlight'>* Nota</span>: la password deve contenere solo lettere e numeri.
                    <br/>E, in particolare, deve contenere: almeno una lettera maiuscola, <br/>
                    almeno un numero e non deve superare gli 8 caratteri di lunghezza.
                </div>
            </div>
        </main>
    </body>
</html>