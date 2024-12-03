<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forum Uczniów</title>
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
        <h2>Forum Uczniów</h2>
        <form action="submit_question.php" method="POST" class="question-form">
            <label for="question">Zadaj pytanie:</label>
            <textarea id="question" name="question" rows="4" required></textarea>
            <button type="submit" class="btn">Wyślij</button>
        </form>

        <!-- Display Questions and Responses -->
        <div class="forum-section">
            <!-- Example of a question and responses -->
            <div class="question-box">
                <h3>Pytanie: Jak rozwiązać równanie kwadratowe?</h3>
                <div class="response">
                    <p>Odpowiedź: Możesz użyć wzoru kwadratowego...</p>
                </div>
                <!-- Form to add a response -->
                <form action="submit_response.php" method="POST">
                    <input type="hidden" name="question_id" value="1">
                    <textarea name="response" rows="2" required></textarea>
                    <button type="submit" class="btn">Dodaj odpowiedź</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>