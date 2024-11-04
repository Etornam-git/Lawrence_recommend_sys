<?php
session_start();

// Default admin credentials
$default_username = "admin";
$default_password = "password123"; // Replace this with secure credentials in a real application

// Handle the form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate credentials
    if ($username === $default_username && $password === $default_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: admin.php'); // Redirect to admin dashboard after successful login
        exit();
    } else {
        $error_message = "Incorrect credentials. Please try again.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; margin: 0; font-family: Arial, sans-serif; background-color: #f4f4f4; }
        .login-container { text-align: center; padding: 20px; background: #fff; border-radius: 8px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); width: 300px; }
        .login-container h2 { margin: 0 0 20px; }
        .login-container input { width: 100%; padding: 10px; margin: 8px 0; border: 1px solid #ddd; border-radius: 4px; }
        .login-container button { width: 100%; padding: 10px; background-color: #4CAF50; color: #fff; border: none; border-radius: 4px; cursor: pointer; font-weight: bold; }
        .login-container button:hover { background-color: #45a049; }
        .error-message { color: red; font-size: 14px; margin-bottom: 10px; }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Admin Login</h2>
        <?php if (isset($error_message)): ?>
            <div class="error-message"><?php echo htmlspecialchars($error_message); ?></div>
        <?php endif; ?>
        
        <form action="login.php" method="post">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
