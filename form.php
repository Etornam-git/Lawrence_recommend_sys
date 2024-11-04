<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recommendation Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        
        .box {
            width: 100%;
            max-width: 450px;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        .box h1 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        .box label {
            display: block;
            font-weight: bold;
            color: #555;
            margin-bottom: 8px;
            text-align: left;
        }
        
        .box input[type="text"],
        .box input[type="email"],
        .box input[type="phone"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 16px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        .box input[type="text"]:focus,
        .box input[type="email"]:focus,
        .box input[type="phone"]:focus {
            border-color: #72d899;
            outline: none;
        }
        
        .box button {
            width: 35%;
            background-color: #72d899;
            color: #fff;
            border: none;
            padding: 12px;
            font-size: 16px;
            font-weight: bold;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        .box button:hover {
            background-color: #119c16;
        }
        button a{
            text-decoration: none;
        }
        .class {
            display: flex;
            margin: 10px;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>
<body>
    <div class="box">
        <h1>Recommendation Form</h1>
        <form action="../recommender-system/include/handleform.php" method="post">
            <label for="name">Name</label>  
            <input type="text" name="name" id="name" required>  

            <label for="skill">Creative Skill</label>  
            <input type="text" name="skill" id="skill" required>  

            <label for="mail">Email</label>  
            <input type="email" name="email" id="mail" required>  

            <label for="con">Contact</label>  
            <input type="phone" name="phone" id="con" required>  

            <button type="submit" name="submit">Recommend</button> 
        </form>  
    </div>
</body>
</html>
