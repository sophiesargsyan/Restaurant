<?php
ini_set('display_errors', '1');
error_reporting(E_ALL);

$errors = [];

function isNameValid($name) {
    return preg_match("/^[a-zA-Z]+$/", $name);
}

function isEmailValid($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function isPasswordValid($password) {
    return strlen($password) >= 8;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $address = trim($_POST['address']);
    $phone = trim($_POST['phone']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $repeatPassword = $_POST['repeat_password'];

    if (empty($firstname) || empty($lastname) || empty($address) || empty($phone) || empty($email) || empty($password) || empty($repeatPassword)) {
        $errors[] = "All fields are required.";
    }

    if ($password !== $repeatPassword) {
        $errors[] = "Passwords do not match.";
    }

    if (!isNameValid($firstname) || !isNameValid($lastname)) {
        $errors[] = "First and Last Name should contain only letters.";
    }

    if (!isEmailValid($email)) {
        $errors[] = "Invalid email address.";
    }

    if (!isPasswordValid($password)) {
        $errors[] = "Password must be at least 8 characters long.";
    }

    if (empty($errors)) {
        $userData = [
            'firstname' => htmlspecialchars($firstname),
            'lastname' => htmlspecialchars($lastname),
            'address' => htmlspecialchars($address),
            'phone' => htmlspecialchars($phone),
            'email' => htmlspecialchars($email),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'date_created' => date('Y-m-d H:i:s')
        ];

        $dataFolder = 'db';
        $filePath = $dataFolder . DIRECTORY_SEPARATOR . 'user-data.json';

        if (file_exists($filePath)) {
            $existingData = json_decode(file_get_contents($filePath), true);
            if ($existingData === null) {
                $existingData = [];
            }
        } else {
            $existingData = [];
        }

        $existingData[] = $userData;

        if (file_put_contents($filePath, json_encode($existingData, JSON_PRETTY_PRINT)) === false) {
            echo "Error saving data";
            exit();
        } else {
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
    <title>Sign Up | Black and White</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="images/cropped_logo.png" type="image/x-icon">
</head>
<body>
    
    <div class="card">
        <div class="card-header text-center">
            <h2>Create your account!</h2>
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

            <form action="signup.php" method="POST">
                <div class="mb-3">
                    <label for="firstname" class="form-label">First Name:</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo htmlspecialchars($firstname ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="lastname" class="form-label">Last Name:</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo htmlspecialchars($lastname ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address:</label>
                    <input type="text" class="form-control" id="address" name="address" value="<?php echo htmlspecialchars($address ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone Number:</label>
                    <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($phone ?? ''); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($email ?? ''); ?>" required>
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

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
