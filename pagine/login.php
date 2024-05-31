<?php
    if (isset($_POST["username"])) $username = $_POST["username"]; else $username = "";
    if (isset($_POST["password"])) $password = $_POST["password"]; else $password = "";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" value="username" name="$username"></td>
            </tr>
            <tr>
            <td>
                <label for="password">Password:</label></td>
                <td><input type="text" value="password" name="$password"></td>
            </tr>
        </table>
        <input type="submit" value="accedi">
        
        <a href="pagine\registration.php">
            <input type="submit" value="Registrati">
        </a>
    </form>
    <?php
        if ($username and $password){
            require("Data\connessione_db.php");
            $sql = "SELECT username, password FROM utenti WHERE username = '$username', AND password ='$password'";
            $ris = $conn->query($sql) or  die("<p>Query fallita! ".$conn->error."</p>");

            if ($ris->num_rows == 0){
                echo "<p>Utente e password non trovati</p>";
            }else{
                session_start();
                
                $_SESSION["username"] = $username;
                $conn->close();

                header("location: pagine/home.php");
            }
        }

    ?>
    <footer>
        <a href="pagine/cookieeprivacy.html" style="color: white;">Info su privacy e cookie</a> <br>
        Sito di: Brambilla Carlo, Livieri Lorenzo, Rossetti Gabriele
    </footer>
</body>
</html>