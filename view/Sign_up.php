<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- https://planner.cloud.microsoft/webui/plan/lCD5aX_dxUeTNuC_qZFDrZcAG1xV/view/board?tid=b597eb56-0622-442c-833d-8daf3dcaf56d -->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body 
        {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url("../photos/fondo_login.jpg");
            background-size: cover;
        }

        #form 
        {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 81, 255, 0.1);
            width: 300px;
            text-align: center;
        }

        #logo
        {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        
        #logo2
        {
            height: 100px;
        }

        h1 
        {
            margin-bottom: 20px;
        }

        input 
        {
            height: 30px;
            width: 95%;
            border-radius: 10px;
            border: 1px solid #ccc;
            margin-bottom: 15px;
            padding-left: 10px;
        }

        input:hover
        {
            background-color: #ccc;
            border: 1px solid black;
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

        #sign_up
        {
            background-color: #007bff;
        }

        #sign_up:hover 
        {
            background-color: #0056b3;
        }

        a
        {
            text-decoration: none;
            color: #28a745;
        }

        a:hover
        {
            color: #218838;
            text-shadow: 0 0 8px rgb(3, 157, 33);
        }
    </style>
</head>
<body>
    <article>
        <div id="form">
            <div id="logo">
                <h1>Sign Up</h1>
                <img id="logo2" src="../photos/logo_empresa.png">
            </div>
            <form id="form1" action="../controller/user_controller.php" method="post">
                <input type="text" name="user" id="user" placeholder="Username" required>
                <input type="text" name="gmail" id="gmail" placeholder="example@gmail.com" required>
                <input type="password" name="pass" id="pass" placeholder="Password" required>
                <input type="password" name="conf_pass" id="conf_pass" placeholder="Confirm password" required>
                <?php
                    //TODO si hay valor en variable session.passerror -> echo
                    if(isset($_SESSION["pass_error"]))
                    {
                        echo "<p style='color:red'>" . $_SESSION["pass_error"] . "</p>";
                        unset($_SESSION["pass_error"]);
                    }

                    if (isset($_SESSION["sign_up_error"])) 
                    {
                        echo "<p style='color:red'>" . $_SESSION["sign_up_error"] . "</p>";
                        unset($_SESSION["sign_up_error"]);
                    }
                ?>
                <nav>
                        <button type="submit" id="sign_up" name="sign_up">Sign up</button>
                        <p>Already have an acount? <a href="Sign_in.php"><span>Sign In</span></a></p>
                </nav>
            </form>
        </div>
    </article>
</body>
</html>