<?php
session_start();

// Sprawdzenie czy użytkownik nie jest zalogowany i nie jest administratorem
    if(!isset($_SESSION['email']))
    {
        header("location:signin.php");
    }

    elseif($_SESSION['usertype']=='admin')
    {
        header("location:signin.php");
    }
?>

<!DOCTYPE html>
<html lang="pl">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Studenta</title>
    <link rel="stylesheet" href="../css/adminhome.css">
</head>

<body>
    <!-- implementacja menu studenta -->
    <?php
    include 'student_sidebar.php';
    ?>

    <div class="dashboard">
        <h1>Witaj Studencie!</h1>
    </div>

</body>

</html>