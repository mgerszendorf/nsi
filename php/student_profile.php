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

//połączenie z bazą danych
$host="localhost";
$user="root";
$password="";
$db="school";


$data=mysqli_connect($host,$user,$password,$db);

$email=$_SESSION['email'];

//pobranie danych użytkownika z bazy danych
$sql="SELECT * FROM user WHERE email='$email'";

$result=mysqli_query($data,$sql);

$info=mysqli_fetch_assoc($result);

//uaktualnienie danych użytkownika do bazy danych 
if(isset($_POST['update_profile']))
    {
        $s_name=$_POST['name'];
        $s_phone=$_POST['phone'];
        $s_password=$_POST['password'];

        $sql2="UPDATE user SET username='$s_name',phone='$s_phone',password='$s_password' WHERE email='$email' ";

        $result2=mysqli_query($data,$sql2);

        if($result2)
        {
            header ("location:student_profile.php");
        } else
        {
            echo "<script type='text/javascript'>
            alert('Przesłanie danych się nie powiodło');
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
    <title>Panel Studenta</title>
    <link rel="stylesheet" href="../css/adminhome.css">
</head>

<body>
    <!-- implementacja menu studenta -->
    <?php
    include 'student_sidebar.php';
    ?>

    <div class="dashboard">
        <h1>Mój profil</h1>
        <div>
            <form action="#" method="POST">
                <div>
                    <label>Nazwa użytkownika</label>
                    <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>">
                </div>
                <div>
                    <label>Numer telefonu</label>
                    <input type="number" name="phone" value="<?php echo "{$info['phone']}"; ?>">
                </div>
                <div>
                    <label>Hasło</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}"; ?>">
                </div>
                <div>
                    <input type="submit" name="update_profile" value="Aktualizuj Dane">
                </div>
            </form>

        </div>

    </div>

</body>

</html>