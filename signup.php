<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repeat_password = $_POST['repeat_password'];

    if (empty($firstname) || empty($lastname) || empty($address) || empty($phone) || empty($email) || empty($password) || empty($repeat_password)) {
        $error = "All fields are required!";
    } elseif ($password !== $repeat_password) {
        $error = "Passwords don't match!";
    } else {
        $file = fopen("users_data.txt", "r");
        $exists = false;
        while (($line = fgets($file)) !== false) {
            $data = explode(",", trim($line));
            if ($data[4] === $email) { 
                $exists = true;
                break;
            }
        }
        fclose($file);

        if ($exists) {
            $error = "Account with this email already exists!";
        } else {
            $data = $firstname . "," . $lastname . "," . $address . "," . $phone . "," . $email . "," . password_hash($password, PASSWORD_DEFAULT) . "\n";
            
            $file = fopen("users_data.txt", "a");
            fwrite($file, $data);
            fclose($file);
            
            echo "Registration successful";
            header("Location: index.php");
            exit();
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sign Up | Black and White </title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="icon" href="images/cropped_logo.png" type="image/x-icon">
    </head>
    <body>
        <div class="card">
            <div class="card-header text-center">
                <h2>Sign Up</h2>
            </div>
            <div class="card-body">

                <!-- Error message -->
                <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

                <form action="signup.php" method="POST">
                    <div class="mb-3">
                        <label for="firstname" class="form-label">First Name:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Last Name:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address:</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone Number:</label>
                        <input type="tel" class="form-control" id="phone" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="repeat_password" class="form-label">Repeat Password:</label>
                        <input type="password" class="form-control" id="repeat_password" name="repeat_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Sign Up</button>
                </form>
            </div>
            <div class="card-footer text-center">
                <p>Already have an account? <a href="signin.php">Sign in here</a></p>
            </div>    
        </div>

        <!-- Validation -->
        <script>
            document.querySelector('form').addEventListener('submit', function(event) {
                const firstname = document.getElementById('firstname').value;
                const lastname = document.getElementById('lastname').value;
                const address = document.getElementById('address').value;
                const phone = document.getElementById('phone').value;
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;
                const repeatPassword = document.getElementById('repeat_password').value;

                if (!firstname || !lastname || !address || !phone || !email || !password || !repeatPassword) {
                    alert('All fields are required!');
                    event.preventDefault();
                }
            });
        </script>

        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>
