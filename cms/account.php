
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

    <!-- Panel boczny -->
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
        <!-- Nagłówek -->
        <header class="header">
            <div class="welcome">Witaj! <?php echo htmlspecialchars($_SESSION['name']); ?></h2></div>
            <div class="time" id="clock"></div>
        </header>

        <!-- Sekcja z informacjami -->
        <section class="info-section">
            <!-- Dni do matury -->
            <div class="info-box">
                <h3>Dni do matury</h3>
                <div class="circle">169 dni</div>
                <p>Pierwsza matura: 6 maja 2025</p>
            </div>

            <!-- Średni wynik -->
            <div class="info-box">
                <h3>Średni wynik z zadań</h3>
                <p>97%</p>
            </div>

            <!-- Wiek konta -->
            <div class="info-box">
                <h3>Wiek konta</h3>
                <p>87 dni</p>
            </div>

        </section>

        <!-- Najnowsze wpisy -->
        <section class="latest-posts">
            <?php?>
            <h2>Najnowsze wpisy</h2>

            <?php

            $host = 'localhost';      
            $dbname = 'cms';    
            $username = 'root';  
            $password = '';       

            $conn = new mysqli($host, $username, $password, $dbname);

            $query = "SELECT title, description, created_at FROM articles ORDER BY created_at DESC LIMIT 2";
            $result6 = mysqli_query($conn, $query);
            if (!$result6) {
                die("Błąd zapytania: " . mysqli_error($conn));
            }
            while ($row = mysqli_fetch_assoc($result6)) {
            echo "<article class='post'>";
            echo "<h3>" . htmlspecialchars($row['title']) . "</h3>";
            echo "<p>". htmlspecialchars($row['description']). "</p>";      
            echo "<a href='#'>Czytaj dalej</a>"; 
            echo " </article>";
        }
        ?>
        </section>

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
                    $query = "SELECT course_name, lesson_topic, lesson_date FROM lessons ORDER BY lesson_date DESC LIMIT 2";
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
