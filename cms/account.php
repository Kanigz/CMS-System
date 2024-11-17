<?php
session_start();

if (!isset($_SESSION['name'])) {
    // Jeśli użytkownik nie jest zalogowany, przekieruj go do strony logowania
    header('Location: login.php');
    exit();
}

// Połączenie z bazą danych
$host = 'localhost';
$dbname = 'cms';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Błąd połączenia z bazą danych: " . $e->getMessage());
}

// Pobierz dane użytkownika z bazy na podstawie sesji
$username = $_SESSION['name'];
$stmt = $pdo->prepare("SELECT * FROM user WHERE name = :username");
$stmt->bindParam(':username', $username);
$stmt->execute();
$userData = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$userData) {
    echo "Błąd: Nie znaleziono użytkownika.";
    exit();
}

// Aktualizacja danych po przesłaniu formularza
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newUsername = $_POST['username'];
    $newEmail = $_POST['email'];

    // Aktualizacja danych w bazie
    $updateStmt = $pdo->prepare("UPDATE users SET username = :newUsername, email = :newEmail WHERE id = :id");
    $updateStmt->bindParam(':newUsername', $newUsername);
    $updateStmt->bindParam(':newEmail', $newEmail);
    $updateStmt->bindParam(':id', $userData['id']);
    
    if ($updateStmt->execute()) {
        // Zaktualizuj nazwę użytkownika w sesji
        $_SESSION['username'] = $newUsername;
        echo "Dane zostały zaktualizowane.";
        // Odśwież stronę, aby pokazać zaktualizowane dane
        header('Location: account.php');
        exit();
    } else {
        echo "Wystąpił błąd podczas aktualizacji danych.";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zarządzanie kontem</title>
</head>
<body>

<h2>Zarządzanie kontem dla: <?php echo htmlspecialchars($userData['username']); ?></h2>

<form action="account.php" method="post">
    <label for="username">Nazwa użytkownika:</label>
    <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userData['username']); ?>" required><br><br>

    <label for="email">Adres e-mail:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>" required><br><br>

    <input type="submit" value="Zaktualizuj dane">
</form>

<a href="logout.php">Wyloguj się</a>

</body>
</html>
