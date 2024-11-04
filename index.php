<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to the Recommender System</title>
    <style>
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f4f4f4; margin: 0; font-family: Arial, sans-serif; }
        .container { text-align: center; }
        .button { background-color: #4CAF50; color: white; padding: 12px 20px; border: none; border-radius: 4px; cursor: pointer; font-size: 18px; }
        .button:hover { background-color: #45a049; }
        .admin-form { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Recommender System</h1>
        <a href="form.php"><button class="button">Recommend A Creator</button></a>
        <a href="login.php"><button class="button">Log in(admin)</button></a>

        <?php
        // Check if 'admin' is in the URL query to show login form
        if (isset($_GET['admin'])): ?>
            <div class="admin-form">
                <h2>Admin Login</h2>
                <form action="login.php" method="post">
                    <input type="text" name="username" placeholder="Username" required><br><br>
                    <input type="password" name="password" placeholder="Password" required><br><br>
                    <button type="submit" class="button">Login</button>
                </form>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
