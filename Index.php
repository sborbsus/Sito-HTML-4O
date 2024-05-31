<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scarpe</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="page-container">
        <header>

            <div class="nav">
                <ul>
                    <li>
                        <a href="Index.html"> Home</a>
                    </li>
                    <li>
                        <a href="pagine/novita.html" class="new">Novità</a>
                    </li>
                    <li>
                        <a href="pagine/classici.html">Scopri i Classici</a>
                    </li>

                    <li>
                        <a href="pagine/login.php"  class="log"><img src="immagini/login.png" alt="" ></a>
                    </li>
                </ul>


            </div>
        </header>
        
        <div class="hero">
                <div class="hero-contenitor">
                    <div class="hero__content">
                        <h1 class="big-text">SneakersHub</h1>
                        <p>The best shoes</p>
                        <a href="https://www.treedom.net/it/gift-a-tree?gad_source=1&gclid=EAIaIQobChMI173AkZu6hAMVQ6hoCR3npAxLEAAYASAAEgI04PD_BwE" class="button">Supporta anche tu</a>
                    </div>  
                </div>
        </div>
            
        <div class="container">
            <img src="Immagini/adidas.jpg" alt="" class="adidasrun">
            <div class="bot-left">
                <a href="pagine/running.html">More </a>
                <img src="Immagini/arrow-up-right.svg" alt="" class="arrow">

            </div>
        </div>
        <h1>Tendenza</h1>
        
        
    </div>

    <div class="main-carousel" data-flickity='{ "cellAlign": "left", "contain": true }'>
        <div class="carousel-cell c1">New Balance 550</div>
        <div class="carousel-cell c2">New Balance 200r</div>
        <div class="carousel-cell c3">Nike Dunk Retro</div>
        <div class="carousel-cell c4">Nike Air Jordan 1 Log</div>
        <div class="carousel-cell c5">Nike x Supreme Airforce 1</div>
        <div class="carousel-cell c6">Nike Dunk LeBron James</div>
        <div class="carousel-cell c7">Adidas Ozweego</div>
        <div class="carousel-cell c8">Adidas Ultraboost 1.0</div>

    </div>
    
    <?php 
        require('pagine/footer.php');
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/2.2.1/flickity.pkgd.min.js"></script>

</body>
</html>