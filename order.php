<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

$errorMessage = $successMessage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['full-name']) && !empty($_POST['contact']) && !empty($_POST['email']) && 
        !empty($_POST['address']) && !empty($_POST['qty'])) {
        
        $fullName = filter_var(trim($_POST['full-name']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $contact = filter_var(trim($_POST['contact']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
        $address = filter_var(trim($_POST['address']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $quantity = filter_var(trim($_POST['qty']), FILTER_VALIDATE_INT);

        if ($quantity && $quantity > 0) {
            $foodItem = 'Fried Chicken Wings';
            $price = 10; 
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

            $filePath = __DIR__ . '/db/order-data.txt';

            if (is_writable($filePath)) {
                $orderEntry = json_encode($orderData) . PHP_EOL; 

                if (file_put_contents($filePath, $orderEntry, FILE_APPEND | LOCK_EX)) {
                    $successMessage = "Your order has been successfully placed!";
                } else {
                    $errorMessage = "Failed to save your order. Please try again.";
                }
            } else {
                $errorMessage = "The order file is not writable. Please check the file permissions.";
            }
        } else {
            $errorMessage = "Please enter a valid quantity.";
        }
    } else {
        $errorMessage = "All fields are required. Please fill in all the details.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Order | Black and White</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/order.css">
    <link rel="icon" href="images/cropped_logo.png" type="image/x-icon">
</head>
<body>
    <header>
        <div class="container">
            <div class="navbar d-flex">
                <div class="navbar-item logo">
                    <a href="index.php"><img src="images/logo.png" alt="Restaurant Logo" class="img-responsive"></a>
                </div>
                <div class="navbar-item">
                    <ul class="menu d-flex justify-content-between">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="categories.php">Categories</a></li>
                        <li><a href="menu.php">Menu</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="about-us.php">About Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <main>
        <div class="food-search">
            <div class="container">
                <h2 class="text-center">Confirm Your Order</h2>
                <?php if ($successMessage): ?>
                    <div class="alert alert-success text-center"><?php echo htmlspecialchars($successMessage); ?></div>
                <?php elseif ($errorMessage): ?>
                    <div class="alert alert-danger text-center"><?php echo htmlspecialchars($errorMessage); ?></div>
                <?php endif; ?>
                <form action="order.php" method="POST" class="order">
                    <fieldset>
                        <legend class="my-4">Selected Food</legend>
                        <div class="food-menu-img">
                            <img src="images/food-2.jpg" alt="Fried Chicken Wings">
                        </div>
                        <div class="food-menu-desc">
                            <h3>Fried Chicken Wings</h3>
                            <p class="food-price">$10 per item</p>
                            <label>Quantity:</label>
                            <input type="number" name="qty" class="input-responsive" value="1" required>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend class="my-4">Delivery Details</legend>
                        <label>Full Name:</label>
                        <input type="text" name="full-name" placeholder="Enter your full name" class="input-responsive" required>
                        <label>Phone Number:</label>
                        <input type="tel" name="contact" placeholder="+374 xxxxxxxx" class="input-responsive" required>
                        <label>Email:</label>
                        <input type="email" name="email" placeholder="youremail@example.com" class="input-responsive" required>
                        <label>Address:</label>
                        <textarea name="address" rows="5" placeholder="Street, City, Country" class="input-responsive" required></textarea>
                        <input type="submit" value="Confirm Order" class="btn">
                    </fieldset>
                </form>
            </div>
        </div>
    </main>
    <footer>
        <div class="text-center p-3">© 2024: <a href="index.php">blackandwhite.com</a></div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
