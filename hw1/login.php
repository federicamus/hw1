<?php
    session_start();
   
    if(isset($_SESSION["username"]))
    {
        header("Location: index.php");
        exit;
    }


    
    if(isset($_POST["username"])&&isset($_POST["password"]))
    {

        $conn = mysqli_connect("localhost", "root", "", "hw1");

        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT * FROM UTENTI WHERE username = '".$username."' AND password = '".$password."'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

        if (mysqli_num_rows($res) > 0) {
            $_SESSION['username'] = $_POST['username'];
            header("Location: index.php");
            mysqli_free_result($res);
            mysqli_close($conn);
            exit;
        }

        else
            $errore = "Credenziali non valide!";
    } else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $errore = "Compilare tutti i campi.";
    }

?>

<html>
    <head>
        <link rel='stylesheet' href='login.css'>
        <script src="login.js" defer></script>
        <link href="https://db.onlinewebfonts.com/c/1b3f9cb78376a36884f3908f37a42c91?family=Tiempos+Text+Regular" rel="stylesheet">
        <meta name="viewport"content="width=device-width, initial-scale=1">
    </head>
    <body>
        
        <div id="login-header">
                <div id = 'login-logo'>
                <a href="index.php"><img src = 'https://iperborea.com/static/2021/img/iperborea-logo.svg' class="logo-img"></a>
                </div>
        </div>
        <div id='form-box'>
            Benvenuto su <span class='highlight'>Iperborea</span>! Sei già iscritto?
            <br/>
            Se si,<span class='highlight'> accedi qui sotto </span>
            <form id='login_form' name='login_form' method='post'>
            <div class="username">
                        <label for='username'>Nome utente</label>
                        <input type='text' name='username' class='input-format'<?php if(isset($_POST["username"])){echo "value=".$_POST["username"];} ?>>
                    </div>
                    <div class="password">
                        <label for='password'>Password</label>
                        <input type='password' name='password' class='input-format'<?php if(isset($_POST["password"])){echo "value=".$_POST["password"];} ?>>
                    </div>
                <?php
            if(isset($errore))
            {
                echo "<div class='errore_data'>$errore</div>";
            }
        ?>
                <label>&nbsp;<input type='submit' value='Accedi' class='submit-button'></label>
            </form>
            <div class="errore_data hidden">× Compilare tutti i campi</div>
           Altrimenti, <a role="button" style="text-decoration: none;" class='registration-button' href='signup.php'>Registrati</a>
        </div>
    </body>
</html>