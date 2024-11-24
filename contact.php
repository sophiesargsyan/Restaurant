<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    if ($email && !empty($name) && !empty($subject) && !empty($message)) {
        $to = "info@blackandwhite.com";
        $headers = "From: $email";
        $body = "Name: $name\nEmail: $email\nSubject: $subject\n\nMessage:\n$message";

        if (mail($to, $subject, $body, $headers)) {
            echo "Your message has been sent successfully!";
        } else {
            echo "Failed to send your message. Please try again.";
        }
    } else {
        echo "Please fill in all fields correctly.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact | Black and White</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/cropped_logo.png" type="image/x-icon">
</head>
<body>
    <!-- Header Section -->
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
                        <li class="navbar-list-item"><a href="index.php">Home</a></li>
                        <li class="navbar-list-item"><a href="categories.php">Categories</a></li>
                        <li class="navbar-list-item"><a href="menu.php">Menu</a></li>
                        <li class="navbar-list-item"><a href="contact.php">Contact</a></li>
                        <li class="navbar-list-item"><a href="about-us.php">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <section class="contact-form-container py-5">
            <div class="container">
                <h2 class="text-center mb-4">Get in Touch</h2>
                <form action="submit_contact.php" method="post" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                            <div class="invalid-feedback">Please enter your name.</div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required>
                            <div class="invalid-feedback">Please enter a valid email address.</div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" name="subject" id="subject" class="form-control" placeholder="Subject" required>
                        <div class="invalid-feedback">Please enter a subject.</div>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea name="message" id="message" rows="5" class="form-control" placeholder="Your Message" required></textarea>
                        <div class="invalid-feedback">Please enter your message.</div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <!-- Footer Section -->
    <footer class="text-center text-lg-start text-white" style="background-color: #181b1e;">
        <div class="container p-4">
            <section class="">
                <div class="row">
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Black and White Restaurant</h6>
                        <p>Welcome to Black & White Bistro, where timeless elegance meets contemporary flavor...</p>
                    </div>
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Products</h6>
                        <p><a href="#" class="text-white">Some Text</a></p>
                        <p><a href="#" class="text-white">Some Text</a></p>
                        <p><a href="#" class="text-white">Some Text</a></p>
                        <p><a href="#" class="text-white">Some Text</a></p>
                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                        <p><i class="fas fa-home mr-3"></i> New York, USA</p>
                        <p><i class="fas fa-envelope mr-3"></i> info@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> +01 234 567 88</p>
                        <p><i class="fas fa-print mr-3"></i> +01 234 567 89</p>
                    </div>
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Follow Us</h6>
                        <a href="https://www.facebook.com" class="text-white m-2" target="_blank"><i class="fab fa-facebook"></i></a>
                        <a href="https://www.twitter.com" class="text-white m-2" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.google.com" class="text-white m-2" target="_blank"><i class="fab fa-google"></i></a>
                        <a href="https://www.instagram.com" class="text-white m-2" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.tiktok.com" class="text-white m-2" target="_blank"><i class="fab fa-tiktok"></i></a>
                        <a href="https://www.youtube.com" class="text-white m-2" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2024: <a href="index.php" class="text-white">blackandwhite.com</a>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
