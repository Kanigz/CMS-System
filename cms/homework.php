<?php
session_start();

if (!isset($_SESSION['name'])) {
    header('Location: login.php'); // Przekierowanie do logowania jeśli nie zalogowany
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prace domowe z matematyki</title>
    <link rel="stylesheet" href="css/style_account.css">
</head>
<body>

<aside class="sidebar">
        <div class="logo">Panel Kursanta</div>
        <ul class="menu">
            <li><a href="account.php">Strona główna</a></li>
            <li><a href="lessons.php">Moje lekcje</a></li>
            <li><a href="courses.php">Moje kursy</a></li>
            <li><a href="homework.php">Zadania domowe</a></li>
            <li><a href="forum.php">Forum</a></li>
            <li><a href="articles.php">Wpisy</a></li>
            <li><a href="account-mg.php">Moje konto</a></li>
            <li><a href="logout.php">Wyloguj</a></li>
        </ul>
    </aside>
    <div class="main-content">
        <!-- Sekcja z pracami domowymi -->
        <section class="homework-section">
            <h2>Prace domowe z matematyki</h2>
            <table class="homework-table">
                <thead>
                    <tr>
                        <th>Temat</th>
                        <th>Opis</th>
                        <th>Termin oddania</th>
                    </tr>
                </thead>
                <tbody>
                <?php

                        $host = 'localhost';      
                        $dbname = 'cms';    
                        $username = 'root';  
                        $password = '';       

                        $conn = new mysqli($host, $username, $password, $dbname);

                        $query = "SELECT course_name, lesson_topic, lesson_date FROM lessons";
                        $result6 = mysqli_query($conn, $query);
                        if (!$result6) {
                            die("Błąd zapytania: " . mysqli_error($conn));
                        }
                        while ($row = mysqli_fetch_assoc($result6)) {
                        echo "<tr>";
                        echo "<td>" .htmlspecialchars($row['course_name']) . "</h3>";
                        echo "<td>". htmlspecialchars($row['lesson_topic']). "</p>";      
                        echo "<td>". htmlspecialchars($row['lesson_date']). "</p>";      
                        echo " </tr>";
                        }
                    ?>
                    <tr>
                        <td>Funkcje trygonometryczne</td>
                        <td>Zastosowanie funkcji trygonometrycznych w zadaniach praktycznych.</td>
                        <td>12/12/24</td>
                    </tr>
                </tbody>
            </table>
        </section>


    </div>

</body>
