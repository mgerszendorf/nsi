<?php
session_start();

// Sprawdzenie czy użytkownik nie jest zalogowany i nie jest studentem
if (!isset($_SESSION['email']) || $_SESSION['usertype'] == 'student') 
{
    header("location:signin.php");
}

//połączenie z bazą danych
$host = "localhost";
$user = "root";
$password = "";
$db = "school";

$data = mysqli_connect($host, $user, $password, $db);

if($data===false)
{
	die("connection error");
}

//wprowadzenie danych z formularza do bazy danych
if (isset($_POST['add_course'])) {
    $course_name = $_POST['name'];
    $course_description = $_POST['description'];
    $course_start = $_POST['start'];
    $course_end = $_POST['end'];
    $course_link = $_POST['link'];

    //mysql nie przyjmuja formatu daty znajdującego się w formularzu dlatego zamieniamy na 'Y-m-d H:i:s'
    $timestamp1 = strtotime($course_start);
    $timestamp2 = strtotime($course_end);

    $mysql_date1 = date('Y-m-d H:i:s', $timestamp1);
    $mysql_date2 = date('Y-m-d H:i:s', $timestamp2);

    
    
    $sql = "INSERT INTO course(name,description,start,end,link) VALUES ('$course_name','$course_description','$mysql_date1','$mysql_date2','$course_link')";
    $result = mysqli_query($data, $sql);

    //wyświetlenie potwierdzenia przesłania danych 
    if ($result) 
        {
            echo "<script type='text/javascript'>
            alert('Utworzenie kursu się powiodło');
            </script>";
        } else 
        {
            echo "<script type='text/javascript'>
            alert('Utworzenie kursu się nie powiodło');
            </script>";
        }
    
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj kurs</title>
    <link rel="stylesheet" href="../css/adminhome.css">
</head>

<body>
    <!-- implementacja menu administratora -->
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="dashboard">
        <h1>Dodaj kurs</h1>

        <!-- Akcja # oznacza, że ​​formularz pozostaje na tej samej stronie. -->
        <div>
            <form action="#" method="POST">
                <div>
                    <label>Nazwa kursu</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>Opis</label>
                    <textarea name="description"></textarea>
                </div>
                <div>
                    <label>Data rozpoczęcia kursu</label>
                    <input type="date" name="start">
                </div>
                <div>
                    <label>Data zakończenia kursu</label>
                    <input type="date" name="end">
                </div>
                <div>
                    <label>Link do kursu</label>
                    <input type="text" name="link">
                </div>
                <div>

                    <input type="submit" name="add_course" value="Dodaj kurs">
                </div>
            </form>
        </div>

    </div>
    <script src="../js/responsive_menu.js"></script>
</body>

</html>