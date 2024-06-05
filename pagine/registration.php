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
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Registazione</title>
</head>
<body class = "sfondo">
    <div  class = "contenuto">
        <form action="" method="post">
            <table>
                    <tr>
                        <td><label for="username">Username:</label></td>
                        <td><input type="text" name="username"  value = "<?php echo $username ?>"required></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password:</label></td>
                        <td><input type="text"  name="password"  value = "<?php echo $password ?>"required></td>
                    </tr>
                    <tr>
                        <td><label for="conferma_password">Conferma password:</label></td>
                        <td><input type="text"  name="conferma_password"  value = "<?php echo $conferma_password ?>"required></td>
                    </tr>
                    <tr>
                        <td><label for="nome">Nome:</label></td>
                        <td><input type="text"  name="nome"   value = "<?php echo $nome ?>" ></td>
                    </tr>
                    <tr>
                        <td><label for="cognome">Cognome:</label></td>
                        <td><input type="text" name="cognome"   value = "<?php echo $cognome ?>" ></td>
                    </tr>
                    <tr>
                        <td><label for="email">E-mail:</label></td>
                        <td><input type="text"  name="email"  value = "<?php echo $email ?>" ></td>
                    </tr>
                    <tr>
                        <td><label for="comune">Comune:</label></td>
                        <td><input type="text" name="comune"  value = "<?php echo $comune ?>" ></td>
                    </tr>
                    <tr>
                        <td><label for="indirizzo">Indirizzo:</label></td>
                        <td><input type="text"  name="indirizzo"  value = "<?php echo $indirizzo ?>" ></td>
                    </tr>
                    <td>
                        <input type="submit" value="GAY!">

                    </td>
                </table>
        </form>
    </div>
        
    </form>

    
    <?php
        if($password != $conferma_password){
            echo "Le password sono eterosessuali, non va bene!";
        }
        else{
            require('../Data/connessione_db.php');
            $sql = "SELECT username
            FROM utente
            WHERE username = '$username'";
            $ris = $conn->query($sql) or die("<p>Query fallita! ".$conn->error."</p>");


            if($username == ""){
                echo "<p>Inserisci nome utente</p>";
            }else{

                if ($ris->num_rows > 0){
                    echo "Questo username è già stato usato";            
                }
                else{
                    
    
                    $sql_insert = "INSERT INTO utente(username,password, nome,cognome,email,comune,indirizzo) 
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
        }
    ?>
    

    <?php 
        require('footer.php');
    ?>
    
</body>
</html>
