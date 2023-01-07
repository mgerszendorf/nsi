<?php 
// Funkcja error_reporting() określa, które błędy są zgłaszane. Użycie tej funkcji ustawia ten poziom dla bieżącego skryptu
error_reporting(0);
session_start();

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


//kolejny sposób przedstawienia sposobu logowania
	if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$email = $_POST['email'];

		$pass = $_POST['password'];

		
		$sql="select * from user where email='".$email."' AND password='".$pass."'  ";
		
		$result=mysqli_query($conn,$sql);
		
		$row=mysqli_fetch_array($result);
	


		if($row["usertype"]=="student")
		{

			$_SESSION['email']=$email;

			$_SESSION['usertype']="student";

			header("location:studenthome.php");
		}

		elseif($row["usertype"]=="admin")
		{	
			$_SESSION['email']=$email;

			$_SESSION['usertype']="admin";

			header("location:adminhome.php");
		}

		else
		{
			$message= "Wprowadzono błędną dane logowania";

			$_SESSION['loginMessage']=$message;

			header("location:signin.php");
		}


	}


?>