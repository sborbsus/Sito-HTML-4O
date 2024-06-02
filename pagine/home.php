<?php
    session_start();

    if(isset($_SESSION["username"])){
        $username = $_SESSION["username"];
    }
    else{ header('location: login.php');} 


    if (isset($_POST["username"])) $marca = $_POST["marca"]; else $marca = "";
    if (isset($_POST["password"])) $modello = $_POST["modello"]; else $modello = "";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Home</title>
</head>
<body>

    <?php require('nav.php'); ?>
    <h2>Cerca un tipo di scarpe</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="marca">Marca:</label></td>
                <td><input type="text" value="<?php echo $marca ?>" name="marca" ></td>
            </tr>
            <tr>
                <td><label for="modello">Modello:</label></td>
                <td><input type="text" name="modello"  value = "<?php echo $modello ?>"></td>
            </tr>
        </table>
        <input type="submit" value="Cerca">
    </form>

    <?php 

        require('../Data/connessione_db.php');
        $sql = "SELECT immagine, marca,modello  from scarpa where marca LIKE '%$marca%' and modello LIKE '%$modello%' ";

        $ris = $conn->query($sql) or die("<p>Query fallita! ".$conn->error."</p>");

        if($ris-> num_rows > 0){
            foreach($ris as $riga){
                $immagine = $riga["immagine"];
                $marca = $riga["marca"];
                $modello = $riga["modello"];
                echo <<<EOD
                                <div class="elenco_libri">
                                    <div class="card-scarpa">
                                        <div class="card-scarpa_img">
                                            <img src="../immagini/$immagine" alt="$immagine">
                                        </div>
                                        <div class="card-scarpa__testo__centrato">
                                                <p>Marca: $marca</p>
                                                <p>Modello: $modello</p>
                                        </div>
                                    </div>
                                </div>
            
                            EOD; 
            }
        }
    ?>
</body>
</html>