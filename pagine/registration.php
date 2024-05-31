<?php
    if (isset($_POST["username"])) {$username = $_POST["username"];} else {$username = "";}
	if (isset($_POST["password"])) {$password = $_POST["password"];} else {$password = "";}
    if(isset($_POST["conferma_password"])) $conferma_password = $_POST["conferma_password"];  else $conferma_password = "";
    if(isset($_POST["nome"])) $nome = $_POST["nome"];  else $nome = "";
    if(isset($_POST["cognome"])) $cognome = $_POST["cognome"];  else $cognome = "";
    if(isset($_POST["email"])) $email = $_POST["email"];  else $email = "";
    if(isset($_POST["telefono"])) $telefono = $_POST["telefono"];  else $telefono = "";
    if(isset($_POST["comune"])) $comune = $_POST["comune"];  else $comune = "";
    if(isset($_POST["indirizzo"])) $indirizzo = $_POST["indirizzo"];  else $indirizzo = "";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registazione</title>
</head>
<body>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="username">Username:</label></td>
                <td><input type="text" value="username" name="$username" <?php echo "value='$username'" ?>required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></td>
                <td><input type="text" value="password" name="$password" <?php echo "value='$password'" ?>required></td>
            </tr>
            <tr>
                <td><label for="conferma_password">Conferma password:</label></td>
                <td><input type="text" value="conferma_password" name="$conferma_password" <?php echo "value='$conferma_password'" ?> required></td>
            </tr>
            <tr>
                <td><label for="nome">Nome:</label></td>
                <td><input type="text" value="nome" name="$nome" <?php echo "value='$nome'" ?>></td>
            </tr>
            <tr>
                <td><label for="cognome">Cognome:</label></td>
                <td><input type="text" value="cognome" name="$cognome" <?php echo "value='$cognome'" ?>></td>
            </tr>
            <tr>
                <td><label for="email">E-mail:</label></td>
                <td><input type="text" value="email" name="$email" <?php echo "value='$email'" ?>></td>
            </tr>
            <tr>
                <td><label for="comune">Indirizzo:</label></td>
                <td><input type="text" value="comune" name="$comune" <?php echo "value='$comune'" ?>></td>
            </tr>
            <tr>
                <td><label for="indirizzo">Indirizzo:</label></td>
                <td><input type="text" value="indirizzo" name="$indirizzo" <?php echo "value='$indirizzo'" ?>></td>
            </tr>
        </table>
        <input type="submit" value="GAY!">
        
    </form>

    <p>
        <?php
            if($password != $conferma_password){
                echo "Le password sono eterosessuali, non va bene!";
            }
            else{
                $sql = "SELECT username
                FROM utenti
                WHERE username = '$username'";
                $ris = $conn->query($sql) or die("<p>Query fallita! ".$conn->error."</p>");
                if ($ris->num_rows > 0){
                echo "Questo username è già stato usato";            
                }
                else{
                    $ins = "INSERT INTO utenti(username,password, nome,cognome,email,comune,indirizzo) 
                            VALUES ('$username', '$password','$nome','$cognome', '$email', '$comune', '$indirizzo')";
                    if ($conn->query($sql_insert)){
                        session_start();
                        
                        $_SESSION["username"] = $username;
                        $conn->close();
                        
                        echo "Registrazione effettuata con successo!<br>sarai ridirezionato alla home tra 5 secondi...";
                        header('Refresh: 5; URL=home.php');
                    } else {
                        echo "Non è stato possibile effettuare la registrazione per il seguente motivo: " . $conn->error;
                    }
                }
            }
        ?>
    </p>

    <?php 
        require('pagine/footer.php');
    ?>
    
</body>
</html>