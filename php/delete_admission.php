<?php

session_start();

//połączenie z bazą danych
$host="localhost";
$user="root";
$password="";
$db="school";

$data=mysqli_connect($host,$user,$password,$db);

//po obraniu id usunięcie danego rekordu z bazy danych
if($_GET['admission_id'])
{
    $admission_id=$_GET['admission_id'];

    $sql="DELETE FROM admissions WHERE id='$admission_id'";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']= "<script type='text/javascript'>
        alert('Wniosek został usunięty pomyślnie');
        </script>";
        //przekierowanie na listę wniosków
        header("location:admission.php");
    } else {
        $_SESSION['message']= "<script type='text/javascript'>
        alert('Wniosek nie został usunięty pomyślnie');
        </script>";
        header("location:admission.php");
    }
}


?>