<?php
include "php-scripts/connection.php";

$host = 'localhost';      
$dbname = 'cms';    
$username = 'root';  
$password = '';       

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Błąd połączenia z bazą danych: " . $conn->connect_error);
}

if (isset($_POST['verify'])) {
    $email = $_POST['email'];
    $otp = $_POST['otp'];

    $stmt = $conn->prepare("SELECT otp FROM user WHERE email = '$email' AND is_active = 0");
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && $user['otp'] === $otp) {
        $updateStmt = $conn->prepare("UPDATE user SET is_active = 1, otp = NULL WHERE email = '$email'");
        $updateStmt->execute();

        echo "<script>alert('Konto zostało pomyślnie aktywowane!');</script>";
        header("Location: login.php");
        exit();
    } else {
        echo "<script>alert('Nieprawidłowy kod OTP. Spróbuj ponownie.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weryfikacja OTP</title>
    <link rel="stylesheet" href="css/register-style.css">
</head>
<body>
    <div class="register-area">
        <div class="wrapper">
            <form action="" method="POST">
                <h1>Weryfikacja OTP</h1>

                <input type="hidden" name="email" value="<?php echo htmlspecialchars($_GET['email']); ?>">

                <div class="input-box">
                    <input type="text" name="otp" placeholder="Wprowadź kod OTP" required>
                </div>

                <button type="submit" name="verify" class="btn">Zweryfikuj</button>
            </form>
        </div>
    </div>
</body>
</html>
