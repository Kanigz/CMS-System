
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
    <title>Kursy online</title>
    <link rel="stylesheet" href="css/style_account.css">
</head>
<body>

<aside class="sidebar">
        <div class="logo">Panel Kursanta</div>
        <ul class="menu">
            <li><a href="account.php">Strona główna</a></li>
            <li><a href="lessons.php">Moje lekcje</a></li>
            <li><a href="courses.php">Moje kursy</a></li>
            <li><a href="#">Zadania domowe</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="#">Wpisy</a></li>
            <li><a href="#">Moje konto</a></li>
            <li><a href="logout.php">Wyloguj</a></li>
        </ul>
    </aside>
    <!-- Sekcja z aktywnym kursem -->

    <main class="main-content">
    <section class="active-course">
        <h2>Obecnie dostępny kurs</h2>
        <div class="course-card">
            <div class="course-info">
                <h3>Kurs maturalny z matematyki rozszerzonej online</h3>
                <p><strong>Lekcja:</strong> Zadania na dowodzenie: dowodzenie nierówności</p>
                <p><strong>Data lekcji:</strong> 20/11/24 16:00</p>
            </div>
            <div class="course-status">
                <span class="badge active">Aktywny</span>
                <button class="btn">Zobacz zawartość</button>
            </div>
        </div>
    </section>

    <!-- Sekcja z możliwymi do zapisania kursami -->
    <section class="available-courses">
        <h2>Zapisz się na inne nasze kursy i odbierz dodatkowe 20% rabatu!</h2>
        <table class="courses-table">
            <thead>
                <tr>
                    <th>Nazwa kursu</th>
                    <th>Typ kursu</th>
                    <th>Cena</th>
                    <th>Opcje</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Kurs maturalny online z języka angielskiego - rozszerzenie</td>
                    <td><span class="badge">ONLINE</span></td>
                    <td>90 zł / 120 min</td>
                    <td><button class="btn">Zapisz się</button></td>
                </tr>
                <tr>
                    <td>Egzamin ósmoklasisty</td>
                    <td><span class="badge">ONLINE</span></td>
                    <td>80 zł / 120 min</td>
                    <td><button class="btn">Zapisz się</button></td>
                </tr>
                <tr>
                    <td>Kurs maturalny z matematyki podstawowej online</td>
                    <td><span class="badge">ONLINE</span></td>
                    <td>80 zł / 120 min</td>
                    <td><button class="btn">Zapisz się</button></td>
                </tr>
                <tr>
                    <td>Kurs maturalny z fizyki online</td>
                    <td><span class="badge">ONLINE</span></td>
                    <td>80 zł / 120 min</td>
                    <td><button class="btn">Zapisz się</button></td>
                </tr>                
            </tbody>    
        </table>    
    </section>

</main>

</body>
