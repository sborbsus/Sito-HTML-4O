<?php
    session_start();

    if(isset($_SESSION["username"]) and isset($_SESSION["cod_utente"])){
        $username = $_SESSION["username"];
        $cod_utente = $_SESSION["cod_utente"];
    }
    else{ header('location: login.php');} 


    if (isset($_POST["marca"])) $marca = $_POST["marca"]; else $marca = "";
    if (isset($_POST["modello"])) $modello = $_POST["modello"]; else $modello = "";

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Preferiti</title>
</head>
<body>
    <?php require('nav.php'); ?>


    <div class="search">
        <h2>Cerca tra i tuoi preferiti </h2>
        <form action="" method="post" class="">
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

    </div>


<div class="grid">

    <?php 

        require('../Data/connessione_db.php');
        $sql = "SELECT scarpa.immagine, scarpa.marca, scarpa.modello, scarpa.cod_scarpa  from scarpa join ordine
                 on scarpa.cod_scarpa = ordine.cod_scarpa
                where marca LIKE '%$marca%' and modello LIKE '%$modello%' and scarpa.cod_scarpa = ordine.cod_scarpa and 
                ordine.cod_utente = '$cod_utente' ";

        $ris = $conn->query($sql) or die("<p>Query fallita! ".$conn->error."</p>");


        if ($ris->num_rows == 0){
            echo "<p>Non sono state trovate scarpe che soddisfano i requisiti di ricerca.</p>";}
        else{
            
                echo "<form method='post' action=''>";
                echo  "<div class='grid'>";
                foreach($ris as $riga){
                    $immagine = $riga["immagine"];
                    $marca = $riga["marca"];
                    $modello = $riga["modello"];
                    
                    $cod_scarpa = $riga["cod_scarpa"];
                    $check = "<p><input type='checkbox' name='cod_scarpa[]' value='$cod_scarpa'> Preferiti?</p>";

                    echo <<<EOD
                                <div class="scarpa">
                                    <div class="scarpa_img">
                                        <img src="../immagini/$immagine" alt="">
                                    </div>
                                    <div class="scarpa_testi">
                                        <div class="scarpa_testi_content">
                                            <p>Marca: $marca</p>
                                            <p>Modello: $modello</p>
                                        
                                        
                                        </div>
                                    </div>
                                    
                                </div>
                
                                EOD; 
                }
                echo  "</div>";
                echo "</div><input type='submit' value='Conferma'></form>";

            }

        
    ?>
</div>


    
</body>
</html>




