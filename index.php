<?php

// Funkcja error_reporting() określa, które błędy są zgłaszane. Użycie tej funkcji ustawia ten poziom dla bieżącego skryptu
    error_reporting(0);
// session_start() tworzy sesję lub wznawia bieżącą na podstawie identyfikatora sesji przekazanego przez żądanie GET lub POST lub przekazanego przez plik cookie.
    session_start();
// session_destroy() niszczy wszystkie dane związane z bieżącą sesją
    session_destroy();

//wyświetlenie wiadomości błędu sesji
    if($_SESSION['message'])
    {
        $message=$_SESSION['message'];

        echo "<script type='text/javascript'>
        alert('$message');
        </script>";
    }

//połączenie z bazą danych
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "school";

    $data = mysqli_connect($host, $user, $password, $db);

//pobranie danych z bazy
    $sql="SELECT * FROM course";

    $result=mysqli_query($data,$sql);

?>




<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NSI - Niższa Szkoła Informatyczna</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div class="home">
        <div class="navbar">
            <a class="logo">NSI - Niższa Szkoła Informatyczna</a>
            <nav>
                <ul class="menu-links">
                    <li><a href="index.php">Strona Główna</a></li>
                    <li><a href="php/contact.php">Kontakt</a></li>
                    <!-- skrypy przenoszący do konkretnego miejsca na stronie  -->
                    <li><a href="javascript: document.body.scrollIntoView(false);">Złóż wniosek</a></li>
                    <li><a class="menu-button" href="php/signin.php">Login</a></li>
                </ul>
            </nav>
            <div class="burger">
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="header"></div>
        <div class="about-us">
            <img src="img/school2.jpg" alt="">
            <div>
                <h2>O nas</h2>
                <p>Nasza szkoła informatyczna została założona z myślą o osobach, które chcą rozwijać swoje umiejętności
                    w dziedzinie informatyki i poszerzyć swoje horyzonty zawodowe. Naszym celem jest dostarczanie
                    najwyższej jakości kształcenia przez wykwalifikowaną kadrę nauczycielską i nowoczesne metody
                    nauczania.

                    Nasza szkoła oferuje szeroki wybór kursów i szkoleń z zakresu informatyki, takich jak programowanie,
                    tworzenie stron internetowych, bazy danych czy administracja sieciami. Nasze kursy są dostosowane do
                    potrzeb rynku pracy, dzięki czemu absolwenci naszej szkoły są doskonale przygotowani do wykonywania
                    zawodu.

                    Dbamy również o dobre relacje z naszymi absolwentami i chętnie udzielamy im wsparcia i pomocy w
                    poszukiwaniu pracy po ukończeniu kursu.

                    Zapraszamy do zapoznania się z naszą ofertą i do skorzystania z naszych usług. Mamy nadzieję, że
                    będziemy mogli pomóc Ci rozwijać Twoje umiejętności i osiągnąć sukces zawodowy.</p>
            </div>
        </div>
        <div class="our-teachers">
            <h2>
                Nasi nauczyciele
            </h2>
            <div class="teachers">
                <div>
                    <img src="img/jannowak.png" alt="">
                    <h3>Jan Nowak</h3>
                </div>
                <div>
                    <img src="img/lisaann.png" alt="">
                    <h3>Lisa Ann</h3>
                </div>
                <div>
                    <img src="img/rahedkowalski.png" alt="">
                    <h3>Rahed Kowalski</h3>
                </div>
            </div>
        </div>

        <div class="our-courses">
            <h2>
                Nasze kursy
            </h2>
            <table>
                <tr>
                    <th>Nazwa Kursu</th>
                    <th>Opis</th>
                    <th>Data rozpoczęcia</th>
                    <th>Data zakończenia</th>
                </tr>
                <!-- fetch_assoc() pobiera dane z bazy jako tablicę asocjacyjną -->
                <?php
            while($info=$result->fetch_assoc())
            {
            ?>

                <tr>
                    <td>
                        <?php echo "{$info['name']}"; ?>
                    </td>
                    <td>
                        <?php echo "{$info['description']}"; ?>
                    </td>
                    <td>
                        <?php echo "{$info['start']}"; ?>
                    </td>
                    <td>
                        <?php echo "{$info['end']}"; ?>
                    </td>

                </tr>
                <?php
                }
            ?>
            </table>
        </div>

        <section class="form-section">
            <div class="form-wrapper">
                <div class="fw-top-txt">
                    <p>Chcesz zostać studentem NSI?</p>
                    <p>Złóż wniosek poniżej !</p>
                </div>
                <!-- przesłanie wniosku do bazy danych  -->
                <form class="form" action="php/check_data.php" method="POST">
                    <input class="name" name='name' type="text" placeholder="Imię i nazwisko" id="name">
                    <input class="email" name='email' type="email" placeholder="Adres e-mail" id="email">
                    <input class="phone" name='phone' type="number" placeholder="Numer telefonu" id="phone">
                    <textarea class="message" name='message' type="text" placeholder="Treść wiadomości"
                        id="message"></textarea>
                    <button class="form-submit" type="submit" name="apply">
                        WYŚLIJ
                    </button>
                </form>
            </div>
        </section>

        <footer>All Copyright reserved by Marek Gerszendorf, Kamil Gołębiowski, Eryk Dolajzer</footer>
    </div>


    <script src="js/responsive_menu.js"></script>
</body>

</html>