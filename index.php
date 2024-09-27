<?php

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Home | Black and White </title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/index.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="icon" href="images/cropped_logo.png" type="image/x-icon">
    </head>
    <body>
        <header>
            <div class="container">
                <div class="navbar d-flex">
                    <div class="navbar-item logo">
                        <a href="index.php" title="Logo">
                            <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                        </a>
                    </div>
                    <div class="navbar-item">
                        <ul class="menu d-flex justify-content-between">
                            <li class="navbar-list-item"><a href="#">Home</a></li>
                            <li class="navbar-list-item"><a href="#">Categories</a></li>
                            <li class="navbar-list-item"><a href="#">Menu</a></li>
                            <li class="navbar-list-item"><a href="#">Contact</a></li>
                            <li class="navbar-list-item"><a href="#">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <div class="container">
                <div id="carouselExampleIndicators" class="categories carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="images/desserts.jpg" alt="First slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="images/desserts.jpg" alt="Second slide">
                        </div>
                        <div class="carousel-item">
                        <img class="d-block w-100" src="images/desserts.jpg" alt="Third slide">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </main>
        <footer>
            
        </footer>
        

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>