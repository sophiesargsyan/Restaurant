<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

$errors = [];
$success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $errors[] = "Email and password are required.";
    } else {
        $filePath = 'db/user-data.json';

        if (file_exists($filePath)) {
            $fileContent = file_get_contents($filePath);
            $users = json_decode($fileContent, true);
            $userFound = false;

            foreach ($users as $user) {
                if ($user['email'] === $email) {
                    $userFound = true;
                    if (password_verify($password, $user['password'])) {
                        $success = true;
                        break;
                    } else {
                        $errors[] = "Invalid password.";
                        break;
                    }
                }
            }

            if (!$userFound && !$success) {
                $errors[] = "No account found with that email.";
            }
        } else {
            $errors[] = "No user data found.";
        }
    }

    if ($success) {
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Sign In | Black and White</title>
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
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?php echo htmlspecialchars($error); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

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
            <p>Don't have an account? <a href="signup.php">Sign up here</a></p>
        </div>    
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
