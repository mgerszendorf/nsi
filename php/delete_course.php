<?php

session_start();

//połączenie z bazą danych
$host="localhost";
$user="root";
$password="";
$db="school";

$data=mysqli_connect($host,$user,$password,$db);

//po obraniu id usunięcie danego rekordu z bazy danych
if($_GET['course_id'])
{
    $course_id=$_GET['course_id'];

    $sql="DELETE FROM course WHERE id='$course_id'";

    $result=mysqli_query($data,$sql);

    if($result)
    {
        $_SESSION['message']="<script type='text/javascript'>
        alert('Kurs został usunięty pomyślnie');
        </script>";
        header("location:courses.php");
    } else {
        $_SESSION['message']= "<script type='text/javascript'>
        alert('Kurs nie został usunięty pomyślnie');
        </script>";
        header("location:courses.php");
    }
}


?>