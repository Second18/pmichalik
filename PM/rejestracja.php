<?php
session_start();

//walidacja formularza
if(isset($_POST['zaloz']))
{
 $imie = $_POST['imie'];
 $nazwisko = $_POST['nazwisko'];
 $email = $_POST['email'];
 $login = $_POST['login'];
 $haslo = $_POST['haslo'];
 $haslo2 = $_POST['haslo2'];

 $walidacja = true;

 if(strlen($imie) < 3)
 {
 $walidacja = false;
 $_SESSION['imie_error'] = 'Wpisz poprawne imie';
 }

 if(!ctype_alnum($login))
 {
 $walidacja = false;
 $_SESSION['login_error'] = 'Login musi składać się tylko z liter i cyfr (bez polskich znaków)';
 }

 if(filter_var($email, FILTER_VALIDATE_EMAIL) == false)
 {
 $walidacja = false;
 $_SESSION['email_error'] = 'Wpisz prawidłowy adres email!';
 }

 if($haslo != $haslo2)
 {
 $walidacja = false;
 $_SESSION['haslo_error'] = 'Hasła są różne';
 }

//logowanie do bazy
if($walidacja)
{
    require_once('baza.php');

    mysqli_report(MYSQLI_REPORT_STRICT);
    try{
        $poloczenie = new mysqli($server, $user, $pass, $database); 
    }catch(mysqli_sql_exception $e)
    {
    $_SESSION['error'] = $e;
    header('Location: index.php');
    exit();
    }

    //sprawdzamy czy podany login już istnieje

    $zapytanie = "SELECT login FROM users WHERE login='$login'";
$wynik = $poloczenie->query($zapytanie);

if($wynik->num_rows > 0)
{
    $_SESSION['login_error'] = 'Login już istnieje wpisz inny';
}
else{
    //login prawidłowy
    //rejestracja uzytkownika

    $zapytanie = "INSERT INTO users VALUE ('$imie', '$nazwisko', '$login', '$haslo', '$email')";
    if($poloczenie->query($zapytanie))
    {
        //udało sie
        header('Location: index.php');
        $poloczenie->close();
    }
    else{
        //nie udało się
        //jakieś opercaje
    }
}

}

}

?>


<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rejestracja</title>
    <style>
        body{
            margin-top: 10px;
            font-family: Arial;
            background-image: url(./img/3.jpg);
            display:flex;
            align-items:center;
            flex-direction: column;
            padding-top: 10%;
            background-repeat: no-repeat;
            background-size: cover;
            
        }
        form{
            height: 30%;
            background-color: silver;
        }

        form>input{
            display: block;
            margin: 30px;
        }

        .error{
            color: red;
            margin: 10px;
        }
        h2{
            padding: 20px;
            margin: 15px;
            background-color: silver;
        }
        .back{
        
            margin-top: 20px;
            border: 2px solid black;
            display: flex;
            width: 5%;
            background-color: silver;
           align-items: center;
           justify-content: center;
        }
    </style>
</head>
<body>
    <h2>Wypełnij formularz rejestracyjny: </h2>
        <form action="rejestracja.php" method="POST">
            <input type="text" name="imie" placeholder="Imię">
            <div class="error">
                <?php
                if(isset( $_SESSION['imie_error']))
                {
                    echo  $_SESSION['imie_error'];
                    unset( $_SESSION['imie_error']);
                }
                ?>
            </div>
            <input type="text" name="nazwisko" placeholder="Nazwisko">
            <input type="email" name="email" placeholder="Email">
            <div class="error">
                <?php
                if(isset( $_SESSION['email_error']))
                {
                    echo  $_SESSION['email_error'];
                    unset( $_SESSION['email_error']);
                }
                ?>
            </div>
            <input type="text" name="login" placeholder="Login">
            <div class="error">
                <?php
                if(isset( $_SESSION['login_error']))
                {
                    echo  $_SESSION['login_error'];
                    unset( $_SESSION['login_error']);
                }
                ?>
            </div>
            <input type="password" name="haslo" placeholder="Hasło">
            <input type="password" name="haslo2" placeholder="Powtórz hasło">
            <div class="error">
                <?php
                if(isset( $_SESSION['haslo_error']))
                {
                    echo  $_SESSION['haslo_error'];
                    unset( $_SESSION['haslo_error']);
                }
                ?>
            </div>
            <input type="submit" value="Załóż konto" name="zaloz">
        </form>
        <div class="back">
            <a href="index.php" class="ctn">Powrót</a>
         </div>

        </body>
</html>