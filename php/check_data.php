<?php

session_start();

//połączenie z bazą danych
$host="localhost";
$user="root";
$password="";
$db="school";

$data=mysqli_connect($host,$user,$password,$db);

if($data===false)
{
    die("connection error");
}

//wprowadzenie danych z formularza do bazy danych
if(isset($_POST['apply']))
{
    $data_name=$_POST['name'];
    $data_email=$_POST['email'];
    $data_phone=$_POST['phone'];
    $data_message=$_POST['message'];

    $sql="INSERT INTO admissions(name,email,phone,message) VALUES ('$data_name','$data_email','$data_phone','$data_message')";

    $result=mysqli_query($data,$sql);

    //Sprawdzenie czy dane zostały pobrane
    if($result) 
    {
        $_SESSION['message']='Sukces!';
        header("location:../index.php");
    }
    else
    {
        echo "Nie pobrano danych";
    }
}

?>