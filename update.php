<?php  
require_once "../recommender-system/include/connection.php";

// Check if the 'id' parameter is set in the URL (case-sensitive)
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Prepare and execute a query to retrieve data for the specific ID
    $query = "SELECT * FROM recommendee WHERE ID = :id";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $output = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the form has been submitted
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];  
        $skill = $_POST['skill'];  
        $email = $_POST['email'];  
        $phone = $_POST['phone'];
        
        // Update the record in the recommendee table
        $query = "UPDATE recommendee SET name = :name, skill = :skill, email = :email, phone = :phone WHERE ID = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':skill', $skill);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        // Redirect to the main index page
        header('Location: ./include/success.php');
        exit();
    }
}
?>

<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <title>Update Recommendee</title>  
    <style>  
        /* Center the body content */  
        body {  
            display: flex;  
            justify-content: center;  
            align-items: center;  
            height: 100vh;  
            margin: 0;  
            background-color: #f4f4f4;  
        }  

        .box {  
            text-align: center;  
        }  

        .box form {  
            background-color: #fff;  
            padding: 20px;  
            border-radius: 5px;  
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);  
            width: 450px;  
            margin-top: 10px;
        }  
        
        .box form label {  
            display: block;  
            font-weight: bold;  
            margin-bottom: 5px;  
        }  
        
        .box form input {  
            width: 100%;  
            padding: 10px;  
            border: 1px solid #ddd;  
            border-radius: 3px;  
            margin-bottom: 10px;  
            font-size: 16px;  
        }  
        
        .box form button {  
            background-color: #4CAF50;  
            color: #fff;  
            border: none;  
            padding: 12px 16px;  
            border-radius: 3px;  
            cursor: pointer;  
            width: 100%;  
            font-size: 16px;  
            font-weight: bold;  
            transition: background-color 0.3s ease;  
        }  
        
        .box form button:hover {  
            background-color: #45a049;  
        }  
    </style>  
</head>  
<body>  
    <h1>Update Recommendee Data</h1>   
    <div class="box">
        <form action="" method="post">
            <label for="name">Name</label>  
            <input type="text" name="name" id="name" required value="<?php echo htmlspecialchars($output['name']); ?>">  

            <label for="skill">Creative Skill</label>  
            <input type="text" name="skill" id="skill" required value="<?php echo htmlspecialchars($output['skill']); ?>">  

            <label for="mail">Email</label>  
            <input type="email" name="email" id="mail" required value="<?php echo htmlspecialchars($output['email']); ?>">  

            <label for="con">Contact</label>  
            <input type="text" name="phone" id="con" required value="<?php echo htmlspecialchars($output['phone']); ?>">  

            <button type="submit" name="submit">Save Changes</button>  
        </form>  
    </div>
</body>  
</html>
