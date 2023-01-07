<?php
error_reporting(0);
session_start();

// Sprawdzenie czy użytkownik nie jest zalogowany i nie jest studentem
    if(!isset($_SESSION['email']))
    {
        header("location:signin.php");
    }

    elseif($_SESSION['usertype']=='student')
    {
        header("location:signin.php");
    }

    //połączenie z bazą danych
$host="localhost";
$user="root";
$password="";
$db="school";

$data = mysqli_connect($host, $user, $password, $db);

$sql="SELECT * FROM user WHERE usertype='student'";

$result=mysqli_query($data,$sql);

?>

<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
    <link rel="stylesheet" href="../css/adminhome.css">
</head>

<body>
    <!-- implementacja menu administratora -->
    <?php
    include 'admin_sidebar.php';
    ?>

    <div class="dashboard">
        <h1>Lista studentów</h1>

        <?php
            if($_SESSION['message'])
            {
                echo $_SESSION['message'];
            }
            //usunięcie informacji sesji
            unset($_SESSION['message'])
        ?>

        <table>
            <tr>
                <th>Nazwa uzytkownika</th>
                <th>Adres email</th>
                <th>Numer Telefonu</th>
                <th>Password</th>
                <th>Usuń</th>
                <th>Aktualizuj dane</th>
            </tr>

            <?php

            while($info=$result->fetch_assoc())
            {
            ?>

            <tr>
                <td>
                    <?php echo "{$info['username']}"; ?>
                </td>
                <td>
                    <?php echo "{$info['email']}"; ?>
                </td>
                <td>
                    <?php echo "{$info['phone']}"; ?>
                </td>
                <td>
                    <?php echo "{$info['password']}"; ?>
                </td>
                <td>
                    <!-- Pytanie z potwierdzeniem usunięcie; pobranie id i usunięcie -->
                    <?php echo "<a onClick=\"javascript:return confirm('Na pewno chcesz usunąć ?'); \" href='delete.php?student_id={$info['id']}'>Usuń</a>"; ?>
                </td>
                <td>
                    <!-- przeniesienie do strony aktualizacji danych studenta -->
                    <?php echo "<a href='update_student.php?student_id={$info['id']}'> Aktualizuj </a>"; ?>
                </td>
            </tr>

            <?php

            }

            ?>
        </table>
        <script src="../js/responsive_menu.js"></script>
</body>

</html>