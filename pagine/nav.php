<div class="nav">
    <div class="centronav">
        <ul class="navlinks">
            <?php 
                if(basename($_SERVER["PHP_SELF"]) == "login.php"){
                    echo "<li><a href=' registration.php'>Registrati</a></li>";
                }
                elseif (basename($_SERVER['PHP_SELF']) == "registrazione.php") {
                echo "<li><a href='../index.php'>Login</a></li>";
                }else {
                if (basename($_SERVER['PHP_SELF']) == "home.php") {
                    echo "<li id='active'>Home</li>";
                } else {
                    echo "<li><a href='home.php'>Home</a></li>";
                }
                if (basename($_SERVER['PHP_SELF']) == "dati_personali.php") {
                    echo "<li id='active'>Dati personali</li>";
                } else {
                    echo "<li><a href='dati_personali.php'>Dati personali</a></li>";
                }
                if (basename($_SERVER['PHP_SELF']) == "preferiti.php") {
                    echo "<li id='active'>Preferiti</li>";
                } else {
                    echo "<li><a href='preferiti.php'>Preferiti</a></li>";
                }
                if (basename($_SERVER['PHP_SELF']) == "logout.php") {
                    echo "<li id='active'>Logout</li>";
                } else {
                    echo "<li><a href='logout.php'>Logout</a></li>";
                }
            }
            
            ?>
        </ul>
    </div>
</div>