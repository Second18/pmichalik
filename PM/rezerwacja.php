<?php
    session_start();
    echo $dataOd = $_POST['data1'];
    echo $dataDo = $_POST['data2'];
    echo $model = $_POST['CarModel'];
    echo $color = $_POST['CarColor'];
     
    $klient = $_SESSION['user'];
    require_once('baza.php');
    $polaczenie = new mysqli($server, $user, $pass, $database);


    $zapytanie = "INSERT INTO `samochody`(`marka`, `kolor`, `klient`, `od`, `do`) VALUES ('$model','$color','$klient','$dataOd','$dataDo')";
    echo $polaczenie->query($zapytanie);

    $_SESSION['alert'] = 
    "<div class = 'rez'> Wypożyczyłeś samochód: 
    <p class = 'p1' >$model</p>
     w kolorze: 
     <p class = 'p1'>$color</p>
      Czas wypożyczenia: 
      <p class = 'p1'> od $dataOd do $dataDo.</p>
      </div>";
    header("Location: ./serwis.php");

?>

