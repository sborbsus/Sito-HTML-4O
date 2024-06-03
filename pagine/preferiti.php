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
    <link rel="stylesheet" href="style.css">
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
    
</body>
</html>



