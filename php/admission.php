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

//połączenie z bazą danych
    $host="localhost";
    $user="root";
    $password="";
    $db="school";

    $data=mysqli_connect($host,$user,$password,$db);
    $sql="SELECT * FROM admissions";
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
        <h1>Wnioski</h1>

        <table>
            <tr>
                <th>Imię i nazwisko</th>
                <th>Email</th>
                <th>Telefon</th>
                <th>Wiadomość</th>
                <th>Usuń</th>
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
                    <?php echo "{$info['email']}"; ?>
                </td>
                <td>
                    <?php echo "{$info['phone']}"; ?>
                </td>
                <td>
                    <?php echo "{$info['message']}"; ?>
                </td>
                <td>
                    <!-- Pytanie z potwierdzeniem usunięcie; pobranie id i usunięcie -->
                    <?php echo "<a onClick=\"javascript:return confirm('Na pewno chcesz usunąć ?'); \" href='delete_admission.php?admission_id={$info['id']}'>Usuń</a>"; ?>
                </td>
            </tr>

            <?php                        
                }
            ?>
        </table>
    </div>
    </main>


    </section>

    <script src="../js/responsive_menu.js"></script>
</body>

</html>