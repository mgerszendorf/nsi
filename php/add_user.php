<?php 

// Sprawdzenie czy użytkownik nie jest zalogowany i nie jest studentem
if (!isset($_SESSION['email']) || $_SESSION['usertype'] == 'student') 
{
    header("location:signin.php");
}

//połączenie z bazą danych
$host="localhost";
$user="root";
$password="";
$db="school";

$conn=mysqli_connect($host,$user,$password,$db);

if($conn===false)
{
	die("connection error");
}

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $username = $_POST['username'];
    $email = $_POST['email'];
	$pass = $_POST['password'];

    $sql="INSERT INTO user (username, email, usertype, password) VALUES ('$username', '$email', 'student', '$pass')";

    if (mysqli_query($conn, $sql)) {
        echo "Rekord został pomyślnie dodany";
  } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  mysqli_close($conn);
    
}
?>