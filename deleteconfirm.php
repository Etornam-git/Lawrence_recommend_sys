<?php
session_start();
require_once "../recommender-system/include/connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $_SESSION['message'] = 'Invalid request. No ID specified.';
    header('Location: ./admin.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
        // Proceed to delete if the user confirmed
        $query = "DELETE FROM recommendee WHERE ID = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        if ($stmt->execute()) {
            $_SESSION['message'] = 'Data deleted successfully.';
        } else {
            $_SESSION['message'] = 'Error deleting data. Please try again.';
        }
        // Redirect back to admin with message
        header('Location: ./admin.php');
        exit();
    } else {
        // If user cancels, set a message and redirect
        $_SESSION['message'] = 'Deletion canceled.';
        header('Location: ./admin.php');
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Confirm Delete</title>
    <style>
        /* Styling similar to the previous card-style layout */
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f9f9f9; font-family: Arial, sans-serif; }
        .confirmation-box { background-color: #fff; padding: 30px; border-radius: 8px; box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.15); max-width: 400px; text-align: center; }
        h2 { color: #333; font-size: 24px; margin-bottom: 20px; }
        .confirmation-box form { display: flex; justify-content: space-around; }
        button { font-size: 16px; padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; transition: background-color 0.3s ease; width: 45%; font-weight: bold; }
        button[name="confirm"][value="yes"] { background-color: #d9534f; color: #fff; }
        button[name="confirm"][value="yes"]:hover { background-color: #c9302c; }
        button[name="confirm"][value="no"] { background-color: #5bc0de; color: #fff; }
        button[name="confirm"][value="no"]:hover { background-color: #31b0d5; }
    </style>
</head>
<body>
    <div class="confirmation-box">
        <h2>Are you sure you want to delete this record?</h2>
        <form method="post" action="">
            <button type="submit" name="confirm" value="yes">Yes, Delete</button>
            <button type="submit" name="confirm" value="no">Cancel</button>
        </form>
    </div>
</body>
</html>
