<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web transversal</title>
    <style>
        #profile
        {
            width: 200px;
            height: 50px;
        }

        button 
        {
            height: 40px;
            width: 100%;
            border-radius: 5px;
            border: none;
            color: white;
            cursor: pointer;
            margin-top: 10px;
        }

        #sign_out
        {
            background-color: #28a745;
        }

        #sign_out:hover 
        {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <h1>Bienvenido a la web transversal</h1>
    <div id="profile">
        <form action="../controller/user_controller.php" method="post">
            <button type="submit" id="sign_out" name="sign_out">sign_out</button>
        </form>
    </div>
</body>
</html>