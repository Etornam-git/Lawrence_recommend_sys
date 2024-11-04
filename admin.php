<?php
    session_start();
    if (isset($_SESSION['message'])) {
        echo "<p style='color: green; font-weight: bold; text-align: center;'>{$_SESSION['message']}</p>";
        unset($_SESSION['message']); // Clear the message after displaying
    }

    require_once "../recommender-system/include/connection.php";

    $query = "SELECT * FROM recommendee ";
    $stmt = $conn->prepare($query);
    $stmt->execute();
    $results = $stmt->fetchAll(); 




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
            padding: 0;
        }

        .main {
            width: 90%;
            max-width: 1200px;
            overflow-x: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
            margin-top: 20px;
        }

        caption {
            font-size: 22px;
            font-weight: bold;
            color: #333;
            padding: 10px;
            text-align: left;
        }

        thead {
            background-color: #4CAF50;
            color: #fff;
        }

        thead tr th, thead tr td, tbody tr td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tbody tr:hover {
            background-color: #e1f5d6;
        }

        button {
            padding: 6px 12px;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            font-weight: bold;
        }

        .edit {
            background-color: #4CAF50;
            color: #fff;
        }

        .del {
            background-color: #ff4d4d;
            color: #fff;
        }

        .table-container {
            overflow-x: auto;
            padding: 10px 0;
        }
        .now {
            justify-content: center;
            align-items: center;
            
        }
        .now a{
            text-decoration: none;
            color:#333;
        }
    </style>
</head>
<body>
    <div class="main">  
        <table>  
            <caption>Recommendations Table</caption>  

            <thead>  
                <tr>  
                    <td>ID</td>  
                    <td>Name</td>  
                    <td>Creative Skill</td>  
                    <td>Email</td>  
                    <td>Contact</td> 
                    <td>Action</td>
                
            </thead>  
            <tbody>  
                <?php
                $id=0; 
                foreach ($results as $recommendee) {
                    $id++ ?>  
                <tr>  
                    <td><?php echo $id; ?></td>  
                    <td><?php echo $recommendee['name']; ?></td>  
                    <td><?php echo $recommendee['skill']; ?></td>  
                    <td><?php echo $recommendee['email']; ?></td>  
                    <td><?php echo $recommendee['phone']; ?></td> 
                    <td>
                        <a href="./update.php?id=<?php echo $recommendee['ID']; ?>"><button class='edit'>Edit</button></a>
                        ~
                        <a href="./deleteconfirm.php?id=<?php echo $recommendee['ID']; ?>"><button class='del'>Delete</button></a>
                    </td>
                </tr>  
                <?php } ?>  
            </tbody>  
        </table>  
        
        <a href="./form.php" class="now edit"><button>Back To Form</button></a>
        
        <a href="./logout.php" class="now edit"><button>Log out</button></a>
    </div>
    
</body>
</html>