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
        <!-- Header -->
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
            <div class="food-search">
                <div class="container">
                    <h2 class="text-center text-white">Confirm your order:</h2>
                    <form action="#" class="order">
                        <fieldset>
                            <legend class="w-auto" style="color:white;">Selected Food</legend>

                            <div class="food-menu-img">
                                <img src="images/food-2.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            </div>
            
                            <div class="food-menu-desc" style="color:white;">
                                <h3>Fried Chicken Wings</h3>
                                <p class="food-price">$2.3</p>
                                <div class="order-label">Quantity</div>
                                <input type="number" name="qty" class="input-responsive" value="1" required>
                            </div>
                        </fieldset>
                        
                        <fieldset style="color:white;">
                            <legend class="w-auto" style="color:white;">Delivery Details</legend>
                            <div class="order-label">Full Name:</div>
                            <input type="text" name="full-name" placeholder="Enter your full name" class="input-responsive" required>

                            <div class="order-label">Phone Number:</div>
                            <input type="tel" name="contact" placeholder="+374 xxxxxxxx" class="input-responsive" required>

                            <div class="order-label">Email:</div>
                            <input type="email" name="email" placeholder="forexample@gmail.com" class="input-responsive" required>

                            <div class="order-label">Address:</div>
                            <textarea name="address" rows="5" placeholder="Street, City, Country" class="input-responsive" required></textarea>

                            <input type="submit" name="submit" value="Confirm Order" class="btn" style="background-color:white; color:black;">
                        </fieldset>
                    </form>
                </div>
            </div>
        </main>
        <!-- Footer -->
        <footer class="text-center text-lg-start text-white" style="background-color: #181b1e">
            <div class="container p-4 pb-0">
                <section class="">
                    <div class="row">
                        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Black and White Restaurant</h6>
                            <p>
                                Welcome to Black & White Bistro
                                Where timeless elegance meets contemporary flavor...
                            </p>
                        </div>
                        <hr class="w-100 clearfix d-md-none" />
    
                        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                            <p>
                                <a class="text-white">Some Text</a>
                            </p>
                            <p>
                                <a class="text-white">Some Text</a>
                            </p>
                            <p>
                                <a class="text-white">Some Text</a>
                            </p>
                            <p>
                                <a class="text-white">Some Text</a>
                            </p>
                        </div>

                        <hr class="w-100 clearfix d-md-none" />
                        <hr class="w-100 clearfix d-md-none" />

                        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                            <p><i class="fas fa-home mr-3"></i> New York, USA </p>
                            <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                            <p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
                            <p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
                        </div>

                        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                            <h6 class="text-uppercase mb-4 font-weight-bold">Follow us</h6>
                            <!-- Facebook -->
                            <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-facebook m-2"></i>
                            </a>

                            <!-- Twitter -->
                            <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-twitter m-2"></i>
                            </a>

                            <!-- Google -->
                            <a href="https://www.google.com" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-google m-2"></i>
                            </a>

                            <!-- Instagram -->
                            <a href="https://www.instagram.com" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-instagram m-2"></i>
                            </a>

                            <!-- TikTok -->
                            <a href="https://www.tiktok.com" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-tiktok m-2"></i>
                            </a>

                            <!-- YouTube -->
                            <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer">
                                <i class="fa-brands fa-youtube m-2"></i>
                            </a>
                        </div>
                    </div>
                </section>
            </div>
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)"> © 2024:
                <a class="text-white" href="index.php"> blackandwhite.com </a>
            </div>
        </footer>
        

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>