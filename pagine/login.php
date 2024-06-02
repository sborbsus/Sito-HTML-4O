<?php
    if (isset($_POST["username"])) $username = $_POST["username"]; else $username = "";
    if (isset($_POST["password"])) $password = $_POST["password"]; else $password = "";
    if (isset($_POST["cod_utente"])) $cod_utente = $_POST["cod_utente"]; else $cod_utente = "";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">

    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text"  value = "<?php echo $username ?>" name="username" required></td>
            </tr>
            <tr>
            <td>
                <label for="password">Password:</label></td>
                <td><input type="text" name="password" required></td>
            </tr>
        </table>
        <input type="submit" value="accedi">
        
        <a href="registration.php">
            <input type="submit" value="Registrati">
        </a>
    </form>
    <?php
        if (isset($_POST["username"]) and isset($_POST["password"])){
            require("../Data/connessione_db.php");
            $sql = "SELECT username, password, cod_utente FROM utente WHERE username = '$username' AND password ='$password'";
            $ris = $conn->query($sql) or  die("<p>Query fallita! ".$conn->error."</p>");

            if ($ris->num_rows == 0){
                echo "<p>Utente e password non trovati</p>";
                $conn->close();
            }else{
                session_start();
                
                $_SESSION["username"] = $username;
                $_SESSION["cod_utente"] = $cod_utente;
                $conn->close();

                header("location: home.php");
            }
        }

    ?>
    <?php 
        require('footer.php');
    ?>
</body>
</html>