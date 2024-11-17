<!DOCTYPE html>
<html lang="en">

<?php
session_start()
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/login-style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
        <div class="login-area">
            <div class="wrapper">
            <form action="" method="post">
                <h1>Login</h1>
                <div class="input-box">
                    <input type="text" name="mail" placeholder="Mail" id="mail" required>
                    <i class='bx bxs-user' ></i>
                </div>
                <div class="input-box">
                    <input type="password" name="password" placeholder="Username" id="password" required>
                    <i class='bx bxs-lock' ></i>
                </div>

                <div class="remember-forgot">
                    <label for=""><input type="checkbox" name="" id=""> Remember me</label>  
                    <a href="">Forgot password?</a>
                </div>

                <button type="submit" class="btn">Login</button>

                <div class="register-link">
                    <p>Nie masz konta? <a href="register.php">Zarejestruj</a></p>
                </div>
            </form>
            <?php

        $host = 'localhost';      
        $dbname = 'cms';    
        $username = 'root';  
        $password = '';       

        $conn = new mysqli($host, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Błąd połączenia z bazą danych: " . $conn->connect_error);
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $mail = $_POST['mail'];
            $password = $_POST['password'];


            $sql = "SELECT * FROM user WHERE email='$mail'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                

                if ($password == $row['password']) {
 
                    $_SESSION["name"] = $row['name'];
                    
                    header('Location: index.php');
                    exit();
                } else {
                    
                    echo '<div class="login incorrect">Błędny login lub hasło</div>';
                }
            } else {
                echo '<div class="login incorrect">Błędny login lub hasło</div>';
            }

        }

        ?>  
            </div>
        </div>

        
</body>
</html>