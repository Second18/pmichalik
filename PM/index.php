<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wypożyczalnia</title>
    <style>
      
      
        body{
            background-image: url(./img/2.jpg);
            font-family: Arial;
            display:flex;
            flex-direction: column;
             align-items:center;
             height: 50%;
             padding-top: 10%;
             

        }
        .form{
            background-color:rgb(134, 129, 129) ;
            width: 250px;
            height: 350px;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            border: 2px solid black;
        }
        .form input{
            display: block;
            margin: 20px;
        }
        .form a{
            text-decoration: none;
            color: deeppink;
        }
        .form .error{
            color: white;
            border: 1px solid red;
            padding: 5px 10px;
            background-color: rgb(194, 56, 56)
        }
        .p1{
            font-size: 15px;
        }
        h2{
           
            text-align: center;
            width: 40%;
            height: 40%;
                background-color: rgb(134, 129, 129);
        }
    </style>
</head>
<body>
    <h2>Aby rozpocząć pracę musisz sie zalogować!</h2>
    <div class="form">
        <form action="logowanie.php" method="post">
            <input type="text" name="login" placeholder="Wpisz login">
            <input type="password" name="haslo" placeholder="Wpisz hasło">
            <input type="submit" name="loguj" value="Zaloguj się">
        </form>
        <?php
        if(isset($_SESSION['error'])) :
        ?>
        <div class="error">
            <?php
            echo $_SESSION['error'];
            unset($_SESSION['error']);
            ?>
        </div>
        <?php endif; ?>
        <p>Nie masz konta? <a href="rejestracja.php">Utwórz konto </href></p>
    </div>
</body>
</html>