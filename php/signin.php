<?php 
// Funkcja error_reporting() określa, które błędy są zgłaszane. Użycie tej funkcji ustawia ten poziom dla bieżącego skryptu
	error_reporting(0);
	session_start();
	session_destroy();
//wyświetlenie informacji o logowaniu
	echo $_SESSION['loginMessage'];
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn Page</title>
    <link rel="stylesheet" href="../css/signin.css">
</head>

<body>
    <section class='sign-in-wrapper'>
        <div class="sign-in">
            <div class="close-btn">
                <a href="../index.php">
                    <img src="../img/close.svg" alt="close button">
                </a>
            </div>
            <h2 class='welcome-title'>Witaj ponownie!</h2>
            <p class="welcome-txt">Wprowadź dane logowania</p>
            <form action="login_check.php" method="POST" class='sign-in-form'>
                <label for=" email">
                    <input type="email" name="email" placeholder="Wprowadź adres email" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Wprowadź adres email'" />
                </label>
                <label for="password">
                    <input type="password" name="password" placeholder="Wprowadź hasło" onfocus="this.placeholder = ''"
                        onblur="this.placeholder = 'Wprowadź hasło'" />
                </label>
                <button class='sign-in-btn' type="submit" name="submit">Zaloguj</button>
            </form>
        </div>
    </section>
</body>

</html>