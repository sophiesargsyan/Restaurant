<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['full-name'], $_POST['contact'], $_POST['email'], $_POST['address'], $_POST['qty'])) {
        $fullName = filter_var(trim($_POST['full-name']), FILTER_SANITIZE_STRING);
        $contact = filter_var(trim($_POST['contact']), FILTER_SANITIZE_STRING);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_STRING);
        $quantity = filter_var(trim($_POST['qty']), FILTER_SANITIZE_NUMBER_INT);
        $foodItem = 'Fried Chicken Wings'; 

        $totalCost = $quantity * $price;

        $orderData = [
            'fullName' => $fullName,
            'contact' => $contact,
            'email' => $email,
            'address' => $address,
            'foodItem' => $foodItem,
            'quantity' => $quantity,
            'totalCost' => $totalCost,
            'orderDate' => date('Y-m-d H:i:s')
        ];

        $filePath = 'order-data.php';
        $orderEntry = "<?php\n\$orders[] = " . var_export($orderData, true) . ";\n?>\n";

        if (file_put_contents($filePath, $orderEntry, FILE_APPEND | LOCK_EX)) {
            $successMessage = "Your order has been successfully placed!";
        } else {
            $errorMessage = "Failed to save your order. Please try again.";
        }
    } else {
        $errorMessage = "Please fill in all required fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Home | Black and White</title>
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
                <?php if (isset($successMessage)): ?>
                    <div class="alert alert-success text-center"><?php echo $successMessage; ?></div>
                <?php elseif (isset($errorMessage)): ?>
                    <div class="alert alert-danger text-center"><?php echo $errorMessage; ?></div>
                <?php endif; ?>
                <form action="order.php" method="POST" class="order">
                    <fieldset>
                        <legend class="w-auto" style="color:white;">Selected Food</legend>
                        <div class="food-menu-img">
                            <img src="images/food-2.jpg" alt="Fried Chicken Wings" class="img-responsive img-curve">
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
                    <!-- Footer content omitted for brevity -->
                </div>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)"> © 2024:
            <a class="text-white" href="index.php"> blackandwhite.com </a>
        </div>
    </footer>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
