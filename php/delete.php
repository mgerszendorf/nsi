<?php

session_start();

//połączenie z bazą danych
$host="localhost";
$user="root";
$password="";
$db="school";

$data=mysqli_connect($host,$user,$password,$db);

//po obraniu id usunięcie danego rekordu z bazy danych
if($_GET['student_id'])
{
    $user_id=$_GET['student_id'];

    $sql="DELETE FROM user WHERE id='$user_id'";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']="<script type='text/javascript'>
        alert('Usunięcie studenta się powiodło');
        </script>";
        header("location:view_student.php");
    } else {
        $_SESSION['message']= "<script type='text/javascript'>
        alert('Usunięcie studenta się nie powiodło');
        </script>";
        header("location:view_student.php");
    }
}


?>