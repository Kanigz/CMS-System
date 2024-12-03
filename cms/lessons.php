
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
    <title>Panel Ucznia</title>
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

    <!-- Główna zawartość -->
    <main class="main-content">
        <!-- Najbliższe lekcje -->
        <section class="upcoming-lessons">
            <h2>Najbliższe lekcje</h2>
            <!-- Tabela z lekcjami -->
            <table class="lessons-table">
                
                <thead>
                    <tr>
                        <th>Kurs</th>
                        <th>Lekcja</th>
                        <th>Data lekcji</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Przykładowe dane -->

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

                </tbody>
            </table>

        </section>

    </main>
<script>
    function updateClock() {
            const now = new Date(); // Pobierz bieżącą datę i czas
            const hours = now.getHours().toString().padStart(2, '0'); // Godziny
            const minutes = now.getMinutes().toString().padStart(2, '0'); // Minuty
            const seconds = now.getSeconds().toString().padStart(2, '0'); // Sekundy
            const currentTime = hours + ':' + minutes + ':' + seconds;
           document.getElementById('clock').textContent = currentTime;
        }
        setInterval(updateClock, 1000);
        window.onload = updateClock;


</script>

</body>
</html>
