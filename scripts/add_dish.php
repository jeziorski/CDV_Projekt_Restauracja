<?php
session_start();
echo 'bedzie zmiana';
  if(!empty($_POST['nazwa_potrawy']) && !empty($_POST['opis_potrawy']))
  {
  require_once './connect.php';
  $nazwa = $_POST['nazwa_potrawy'];
  $opis = $_POST['opis_potrawy'];
  $sql = "INSERT INTO `dish_list`(`nazwa_potrawy`, `opis_potrawy`) VALUES (?, ?)";
  $stmt = $conn->prepare($sql); //unikniecie sql-incjection
  $stmt->bind_param("ss", $nazwa, $opis);
  //s-string, i-int, i inne
  if($stmt->execute()){
  $_SESSION['success'] = "Pomyślnie dodano potrawe do listy";
    header('location: ../pages/logged/admin2.php');
    }else {
    $_SESSION['error'] = "Błąd zapytania sql";
    header('location: ../pages/logged/admin2.php');
    }
  }else {
    $_SESSION['error'] = "Wypełnij wszystkie pola formularza";
    header('location: ../pages/logged/admin2.php');
  }

?>
