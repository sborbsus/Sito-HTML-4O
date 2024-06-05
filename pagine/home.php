<?php
    session_start();

    if(isset($_SESSION["username"]) and isset($_SESSION["cod_utente"])){
        $username = $_SESSION["username"];
        $cod_utente = $_SESSION["cod_utente"];
    }
    else{ header('location: login.php');} 


    if (isset($_POST["marca"])) $marca = $_POST["marca"]; else $marca = "";
    if (isset($_POST["modello"])) $modello = $_POST["modello"]; else $modello = "";

    if(isset($_POST['cod_scarpa'])){
        foreach($_POST['cod_scarpa'] as $cod_scarpa) {
            // echo "ciaoooo";
            //echo $libro . '<br/>';
            require("../Data/connessione_db.php");
            $sql = "UPDATE ordine
                    SET cod_utente = '$username'
                    WHERE cod_scarpa = '$cod_scarpa'";
            $conn->query($sql) or die("<p>Query fallita!</p>");
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
    <div class="search">
        <h2>Cerca un tipo di scarpe</h2>
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
            $sql = "SELECT immagine, marca,modello, cod_scarpa  from scarpa 
                    where marca LIKE '%$marca%' and modello LIKE '%$modello%' ";

            $ris = $conn->query($sql) or die("<p>Query fallita! ".$conn->error."</p>");

            // $prefs = "SELECT cod_utente, cod_scarpa from ordine where cod_utente = '$username' ";

            // $prefe = $conn->query($prefs) or die("<p>Query fallita! ".$conn->error."</p>");
            if ($ris->num_rows == 0){
                // $prefe->fetch_assoc("cod_scarpa");
                echo "<p>Non sono stati trovati libri che soddisfano i requisiti di ricerca.</p>";}
            else{
                // if($prefe->num_rows > 0){
                    echo "<form method='post' action=''>
                    <div class='grid'>";
                    // echo  "";
                    foreach($ris as $riga){
                        $immagine = $riga["immagine"];
                        $marca = $riga["marca"];
                        $modello = $riga["modello"];
                        // if ($prefe->num_rows > 0) {
                        //     $prefe = $prefe->fetch_assoc();
                        //     $pref = $prefe["cod_scarpa"];
                        // }
                        $cod_scarpa = $riga["cod_scarpa"];
                        $check = "<p><input type='checkbox' name='cod_scarpa[]' value='$cod_scarpa'> Preferiti?</p>";
                        // if ($pref == "") $disp = "no"; else $disp = "si";
                        // if ($pref) $check = "" ;
                        
                        
                        // echo "ciaooooooooooooooooo";
                        echo <<<EOD
                                    <div class="scarpa">
                                        <div class="scarpa_img">
                                            <img src="../immagini/$immagine" alt="">
                                        </div>
                                        <div class="scarpa_testi">
                                            <div class="scarpa_testi_content">
                                                <p>Marca: $marca</p>
                                                <p>Modello: $modello</p>
                                               
                                                $check
                                            </div>
                                        </div>
                                        
                                    </div>
                    
                                    EOD; 
                    }
                    echo  "</div>";
                    echo "
                    <table>
                    <tr>
                        <td><input type='submit' value='Conferma' style='margin-bottom: 50px'></td>
                    </tr>
                </table> 
                    "; 
                    echo "</form>";

                }

            
        ?>
        

    </div>
    
    <?php 
        require('footer.php');
    ?>
</body>
</html>