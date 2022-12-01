<?php
session_start();

if(!isset($_SESSION['user']))
{
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Serwis</title>
    <style>
        body{
            
            font-family: Arial;
            background-image: url('./img/1.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            justify-content: center;
            display: flex;
            flex-direction: column;
            align-items:center;
            
        }
        p{
            font-size:24px;
            text-align: center;
        }

        a{
            
            padding: 5px;
            margin: 5px;
            font-weight: bold;
            color: red;
            border: 2px solid black;
            background-color: white;
            
        }
        .main{
            border: 2px solid black;
            display:flex;  
            flex-direction: column;
            background-color: silver;
            width: 30%;
            padding-bottom: 20px;
            justify-content: center;
           
        }

        .span{
            font-weight: bold;
            color: red;
            display: flex;
            padding-bottom: 20px;
            border: 2px solid black;
            background-color: silver;
           align-items: center;
            
          
        }
        .r1{
            background-color: white;
            height:40px;
            color: red;
            font-size:20px;

           
           
        }
        .div{
            flex-direction: column;
            padding: 20px;
            margin-bottom: 20px;
        }
        .rez{
            width: 20%;
            padding-top: 15px;
            background-color: white;
           border: 2px solid black;
           display: flex;
           flex-direction: column;
           align-items:center;
        }
        .auto{
            height: 30px;
            width: 150px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
        }
        .auto1{
            justify-content: center;
      
            display: flex;
            padding-top: 25px;
        }
        .form{
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        h1{
            display: flex;
            text-align: center;
        }
        .div2{
            display: flex;
            flex-direction: column;
          align-items: center;
          padding-bottom: 25px;
        }

       
    </style>
</head>
<body>
    <div class="div2">
    <h2>Witaj w naszej wypożyczalni! Wybierz swój samochód!</h2>
    <p>Zalogowany jako: </p>
    <span class="span">
     
    <?php
    if(isset($_SESSION['user']))
    {
        echo $_SESSION['user'];
    }
    
    ?>
    </span>

</div>

   


<div class="main">
<h1>Wybierz okres czasu wyporzyczenia samochodu</h1>
    <form class="form" action="./rezerwacja.php" method="post">
        <p>Data od:</p>
        <input type="date" name="data1">
        <p>Data do:</p>
        <input type="date" name="data2">
        <br>
        <label for="CarModel" class="form-label2">Wybierz samochód:</label>
                <select name="CarModel">
                    <option value="KIA Sportage">Kia Sportage</option>
                    <option value="Audi RS7">Audi RS7 </option>
                    <option value="BMW I8">BMW I8</option>
                    <option value="Passat B8">Passat B8</option>
                    <option value="Mercedes-Benz Klasa C">Mercedes-Benz Klasa C</option>
                    <option value="Skoda Superb">Skoda Superb</option>
                </select>
                <br>

                <label for="CarColor" class="form-label3">Wybierz kolor samochodu:</label>
                <select name="CarColor">
                    <option value="Czerwonym">Czerwony</option>
                    <option value="Niebieskim">Niebieski </option>
                    <option value="Białym">Biały</option>
                    <option value="Zielonym">Zielony</option>
                    <option value="Żółty">Żółty</option>
                    <option value="Czarny">Czarny</option>
                </select>
                <div class="auto1">
                <input class="auto" type="submit" value="Zarezerwuj">
                </div>
    </form>



              
</div>
       

</div>
    <?php if(isset($_SESSION['alert'])) { echo $_SESSION['alert'];unset($_SESSION['alert']);} ?>
    <p><a href="wyloguj.php">Wyloguj się</a></p>
</body>
</html>