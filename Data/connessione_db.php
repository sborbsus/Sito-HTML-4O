<?php
    $conn = new mysqli("localhost", "root", "", "scarpe");
    if($conn->connect_error){
        die("<p>Connessione al server non riuscita: ".$conn->connect_error."</p>");
    }
?>