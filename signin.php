<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Both fields are required!";
    } else {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $lines = file("users_data.txt");
        foreach ($lines as $line) {
            list($firstname, $lastname, $address, $phone, $emailStored, $passwordHash) = explode(",", trim($line));
            if ($email === $emailStored && password_verify($password, $passwordHash)) {
                
                $_SESSION['email'] = $email;
                header("Location: index.php"); 
                exit;
            }
        }
        $error = "Invalid email or password!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sign In | Black and White </title>
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="icon" href="images/cropped_logo.png" type="image/x-icon">
    </head>
    <body>
        <div class="card">
            <div class="card-header text-center">
                <h2>Sign In</h2>
            </div>
            <div class="card-body">
                <!-- Error message -->
                <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>

                <form action="signin.php" method="POST">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember me</label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Sign In</button>    
                </form>
            </div>
            <div class="card-footer text-center">
                <p><a href="forgot-password.html">Forgot your password?</a></p>
                <p>Don't have an account? <a href="signup.html">Sign up here</a></p>
            </div>    
        </div>
        
        <!-- Validation -->
        <script>
            document.querySelector('form').addEventListener('submit', function(event) {
                const email = document.getElementById('email').value;
                const password = document.getElementById('password').value;

                if (!email || !password) {
                    alert('Both fields are required!');
                    event.preventDefault(); 
                }
            });
        </script>
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="assets/js/bootstrap.min.js"></script>
    </body>
</html>