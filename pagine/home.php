<?php
    session_start();

    if(isset($_SESSION["username"]) and isset($_SESSION["cod_utente"])){
        $username = $_SESSION["username"];
        $cod_utente = $_SESSION["cod_utente"];
    }
    else{ header('location: login.php');} 


    if (isset($_POST["marca"])) $marca = $_POST["marca"]; else $marca = "";
    if (isset($_POST["modello"])) $modello = $_POST["modello"]; else $modello = "";

    if(isset($_POST["cod_scarpa"])){
        foreach( $_POST["cod_scarpa"] as $cod_scarpa){
            $myquery = "INSERT INTO ordine (cod_utente, cod_scarpa,)
                                        VALUES ('$cod_utente', '$cod_scarpa',)";

        }

    }
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
    <form action="" method="post" class="search">
        <table id="tab_dati_personali">
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
        $sql = "SELECT immagine, marca,modello, cod_scarpa  from scarpa 
                where marca LIKE '%$marca%' and modello LIKE '%$modello%' ";

        $ris = $conn->query($sql) or die("<p>Query fallita! ".$conn->error."</p>");


        if ($ris->num_rows == 0){
            echo "<p>Non sono stati trovati libri che soddisfano i requisiti di ricerca.</p>";}
        else{


            echo "<form method='post' action=''><div class='elenco_libri'>";
            foreach($ris as $riga){
                $immagine = $riga["immagine"];
                $marca = $riga["marca"];
                $modello = $riga["modello"];
                $cod_scarpa = $riga["cod_scarpa"];
                echo <<<EOD
                            <div class="scarpa">
                                <div class="scarpa_img">
                                    <img src="../immagini/$immagine" alt="">
                                    </div>
                                    <div class="scarpa_testi">
                                        <p>Marca: $marca</p>
                                        <p>Modello: $modello</p>
                                        <p><input type='checkbox' name='cod_scarpa[]' value='$cod_scarpa'></p>
                                    </div>
                                </div>
                            </div>
            
                            EOD; 
            }
            echo "</div><input type='submit' value='Conferma'></form>";
        }
    ?>
    
    <?php 
        require('pagine/footer.php');
    ?>
</body>
</html>