<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

<nav class="sidebar">
    <div class="logo-menu">
        <h2 class="logo">
            MatMax
        </h2>
        <i class='bx bx-menu-alt-left toggle-btn'></i>
    </div>
    <ul class="list">
    <?php if (isset($_SESSION['name'])) { 
        ?>
        <li class="list-item">
            <a href="account.php">
                <i class='bx bx-user' ></i>
                <span class="link-name" style="--i:1">Witaj <?php echo $_SESSION['name']?>
            </span>
            </a>
        </li>
        <li class="list-item">
            <a href="logout.php">
            <i class='bx bx-log-out' ></i>
                <span class="link-name" style="--i:1">Wyloguj
            </span>
            </a>
        </li>
    <?php } else { ?>
        <li class="list-item">
                <a href="login.php">
                    <i class='bx bx-user' ></i>
                    <span class="link-name" style="--i:1">Twoje konto</span>
                </a>
            </li>
    <?php } ?>

    
        <li class="list-item">
            <a href="#info-section">
                <i class='bx bx-grid-alt' ></i>
                <span class="link-name" style="--i:2">Co oferujemy?</span>
            </a>
        </li>
        
        <li class="list-item">
            <a href="#">
                <i class='bx bx-chat' ></i>
                <span class="link-name" style="--i:3">Opinie</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
            <i class='bx bx-info-circle'></i>
                <span class="link-name" style="--i:4">O mnie</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
                <i class='bx bx-cart' ></i>
                <span class="link-name" style="--i:5">Order</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
            <i class='bx bx-heart' ></i>
                <span class="link-name" style="--i:6">Saved</span>
            </a>
        </li>
        <li class="list-item">
            <a href="#">
            <i class='bx bx-cog' ></i>
                <span class="link-name" style="--i:7">Setting</span>
            </a>
        </li>
    </ul>
</nav>
<div class="background-section">
</div>

<div class="info-section" id="info-section">
<section class="features">
        <div class="feature">
        <i class='bx bxs-right-top-arrow-circle feature-icon' ></i>
            <h3>Wydajne zajęcia</h3>
            <p>Moi kursanci często podkreślają, że podczas jednej lekcji nauczyli się tyle co w dwa miesiące w szkole.</p>
        </div>
        <div class="feature">
        <i class='bx bx-detail feature-icon' ></i>
            <h3>Nowoczesne i skuteczne metody nauki</h3>
            <p>Stosuję sprawdzone metody nauki oraz pokazuję jak i ile się uczyć - by w maksymalnym stopniu wykorzystać poświęcony czas.</p>
        </div>
        <div class="feature">
        <i class='bx bx-briefcase-alt-2 feature-icon' ></i>
            <h3>Lekcja pierwsza lekcją próbną</h3>
            <p>Pierwsza lekcja jest płatną lekcją próbną - po niej możesz podjąć decyzję o udziale w kursie.</p>
        </div>
        <div class="feature">
        <i class='bx bx-book-open feature-icon' ></i>
            <h3>Nieprzerwany dostęp do platformy e-learningowej</h3>
            <p>Po każdym spotkaniu udostępniam nagranie z lekcji i zadania domowego, dzięki czemu uczeń ma stały dostęp do materiałów.</p>
        </div>
        <div class="feature">
        <i class='bx bx-home feature-icon' ></i>
            <h3>Zadania domowe sprawdzające umiejętności</h3>
            <p>Po każdej lekcji do wykonania jest zadanie domowe sporządzone metodą przeplataną (największa wydajność nauki wg badań).</p>
        </div>
        <div class="feature">
        <i class='bx bx-trending-up feature-icon'></i>
            <h3>Niesamowite wyniki uczniów na maturze</h3>
            <p>Średni wynik moich kursantów z matury rozszerzonej z matematyki oraz fizyki wynosi około 80%.</p>
        </div>
    </section>
</div>


<section id="opinie-klientow">
    <h2>Opinie naszych klientów</h2>
    <div class="opinie-container">
    <?php

            $host = 'localhost';      
            $dbname = 'cms';    
            $username = 'root';  
            $password = '';       

            $conn = new mysqli($host, $username, $password, $dbname);

            $query = "SELECT reviewer_name, details FROM user_review";
            $result6 = mysqli_query($conn, $query);
            if (!$result6) {
                die("Błąd zapytania: " . mysqli_error($conn));
            }
            while ($row = mysqli_fetch_assoc($result6)) {
            echo "<div class='opinia active'>";
            echo "<p>" . htmlspecialchars($row['details']) . "</p>";
            echo "<span>". htmlspecialchars($row['reviewer_name']). "</h1>";          
            echo "</div>";
        }
        ?>
    </div>
</section>
 <section class="o_mnie">
 <h2>O mnie</h2>
    <div class="to-left">
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident fugiat neque illum illo rerum consequatur, mollitia eum animi excepturi harum alias dolorum repellendus ea rem qui id dolor, delectus quidem deserunt impedit reiciendis? Vel ullam deserunt dicta, sint in vitae, soluta labore dolores veritatis, deleniti sed ipsum laboriosam voluptas eos.
        </p>   
        <img src="media/info-zdj1.png" alt="zdj1">
    </div>
    <div class="to-right">
        <img src="media/info-zdj2.png" alt="zdj2">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Soluta expedita aspernatur corrupti nobis, ipsum vero et ipsa omnis vel recusandae commodi reiciendis quia sequi, illum, consequatur atque. Eaque porro consectetur molestias. Ut natus iste inventore labore officiis harum, corrupti similique officia, iure, laudantium ab est. Eveniet illum cupiditate, a incidunt minima molestiae quod possimus cum nam quos qui libero quidem.
        </p>
    </div>
 </section>
 
 <div class="courses-section">
 <h2>Polecane kursy maturalne stacjonarne</h2>
    <div class="card-wrap">
        <div class="course-card">
            <img src="media/info-zdj2.png" alt="Kurs 1">
            <div class="course-info">
                <span class="badge">Kurs stacjonarny</span>
                <h3>Kurs maturalny z matematyki podstawowej - Kraków</h3>
                <p><i class="fas fa-user"></i> Łukasz Jarosiński</p>
                <p><i class="fas fa-star"></i> 4.9 (152)</p>
                <ul>
                    <li>Kurs stacjonarny</li>
                    <li>Matematyka podstawowa</li>
                </ul>
                <button>Dowiedz się więcej</button>
            </div>
        </div>
        <div class="course-card">
            <img src="media/info-zdj2.png" alt="Kurs 2">
            <div class="course-info">
                <span class="badge">Kurs stacjonarny</span>
                <h3>Kurs maturalny z matematyki rozszerzonej - Warszawa</h3>
                <p><i class="fas fa-user"></i> Katarzyna Nowak</p>
                <p><i class="fas fa-star"></i> 4.8 (112)</p>
                <ul>
                    <li>Kurs stacjonarny</li>
                    <li>Matematyka rozszerzona</li>
                </ul>
                <button>Dowiedz się więcej</button>
            </div>
        </div>
        <div class="course-card">
            <img src="media/info-zdj2.png" alt="Kurs 3">
            <div class="course-info">
                <span class="badge">Kurs stacjonarny</span>
                <h3>Kurs maturalny z fizyki rozszerzonej - Wrocław</h3>
                <p><i class="fas fa-user"></i> Jan Kowalski</p>
                <p><i class="fas fa-star"></i> 4.7 (98)</p>
                <ul>
                    <li>Kurs stacjonarny</li>
                    <li>Fizyka rozszerzona</li>
                </ul>
                <button>Dowiedz się więcej</button>
            </div>
        </div>
    </div>
            




    

<script src="js/script.js"></script>
</body>
</html>