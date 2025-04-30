<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<!-- https://planner.cloud.microsoft/webui/plan/lCD5aX_dxUeTNuC_qZFDrZcAG1xV/view/board?tid=b597eb56-0622-442c-833d-8daf3dcaf56d -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Sign In</title>
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

            #sign_in
            {
                background-color: #28a745;
            }

            #sign_in:hover 
            {
                background-color: #218838;
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
                    <h1>Sign In</h1>   
                    <img id="logo2" src="../photos/logo_empresa.png">
                </div>
                <form id="form1" action="../controller/user_controller.php" method="post">
                    <input type="text" name="gmail" id="gmail" placeholder="example@gmail.com" required>
                    <input type="password" name="pass" id="pass" placeholder="Password" required>

                    <?php
                        if (isset($_SESSION["sign_in_error"])) {
                            echo "<p style='color:red'>" . $_SESSION["sign_in_error"] . "</p>";
                            unset($_SESSION["sign_in_error"]);
                        }
                    ?>

                    <nav>
                            <button type="submit" id="sign_in" name="sign_in">Sign in</button> 
                            <p>Don´t have an acount? <a href="Sign_up.php"><span>Sign Up</span></a></p>
                            

                    </nav>
                </form>
            </div>
        </article>
    </body>
</html>
