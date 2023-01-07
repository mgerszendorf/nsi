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
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "school";

    $data = mysqli_connect($host, $user, $password, $db);

    $id=$_GET['student_id'];

    $sql="SELECT * FROM user WHERE id='$id'";

    $result=mysqli_query($data,$sql);

    $info=$result->fetch_assoc();

    //uaktualnienie danych użytkownika do bazy danych 
    if(isset($_POST['update']))
    {
        $name=$_POST['name'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $query="UPDATE user SET username='$name',email='$email',phone='$phone',password='$password' WHERE id='$id' ";

        $result2=mysqli_query($data,$query);

        if($result2)
        {
            header ("location:view_student.php");
        }

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
        <h1>Aktualizuj dane studenta</h1>
        <div>
            <form action="#" method="POST">
                <div>
                    <label>Nazwa użytkownika</label>
                    <input type="text" name="name" value="<?php echo "{$info['username']}"; ?>">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}"; ?>">
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

                    <input type="submit" name="update" value="Aktualizuj Dane">
                </div>
            </form>
        </div>
    </div>

    <script src="../js/responsive_menu.js"></script>
</body>

</html>