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

if (isset($_POST['add_student'])) {
    $username = $_POST['name'];
    $user_email = $_POST['email'];
    $user_phone = $_POST['phone'];
    $user_password = $_POST['password'];
    $usertype = "student";

    //brak możliwości dodania usera o tej samej nazwie
    $check = "SELECT * FROM user WHERE username='$username'";
    $check_user = mysqli_query($data, $check);

    // mysqli_num_rows — Pobiera liczbę wierszy w zbiorze wyników
    $row_count = mysqli_num_rows($check_user);

    if ($row_count==1)
     {
        echo "<script type='text/javascript'>
        alert('Uzytkownik już istieje!');
        </script>";
    }
     else 
    {
        $sql = "INSERT INTO user(username,email,phone,usertype,password) VALUES ('$username','$user_email','$user_phone','$usertype','$user_password')";
        $result = mysqli_query($data, $sql);

        //wyświetlenie potwierdzenia przesłania danych 
        if ($result) 
        {
            echo "<script type='text/javascript'>
            alert('Przesłanie danych się powiodło');
            </script>";
        } else 
        {
            echo "<script type='text/javascript'>
            alert('Przesłanie danych się nie powiodło');
            </script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj studenta</title>
    <link rel="stylesheet" href="../css/adminhome.css">
</head>

<body>
    <!-- implementacja menu administratora -->
    <?php
    include 'admin_sidebar.php';
    ?>
    <div class="dashboard">
        <h1>Dodaj studenta</h1>

        <div>
            <form action="#" method="POST">
                <div>
                    <label>Nazwa użytkownika</label>
                    <input type="text" name="name">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email">
                </div>
                <div>
                    <label>Numer telefonu</label>
                    <input type="number" name="phone">
                </div>
                <div>
                    <label>Hasło</label>
                    <input type="text" name="password">
                </div>
                <div>

                    <input type="submit" name="add_student" value="Dodaj Studenta">
                </div>
            </form>
        </div>

    </div>
    <script src="../js/responsive_menu.js"></script>
</body>

</html>