<?php
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
        <h1>Witaj Administratorze!</h1>

    </div>


    <script src="../js/responsive_menu.js"></script>
</body>

</html>