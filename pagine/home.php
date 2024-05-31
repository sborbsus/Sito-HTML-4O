<?php
    $_SESSION["username"] = $username;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h2>Cerca un tipo di scarpe</h2>
    <form action="" method="post">
        <table>
            <tr>
                <td><label for="marca">Username:</label></td>
                <td><input type="text" value="marca" name="$marca" <?php echo "value='$marca'" ?>></td>
            </tr>
            <tr>
                <td><label for="modello">Username:</label></td>
                <td><input type="text" value="modello" name="$modello" <?php echo "value='$modello'" ?>></td>
            </tr>
        </table>
    </form>
</body>
</html>