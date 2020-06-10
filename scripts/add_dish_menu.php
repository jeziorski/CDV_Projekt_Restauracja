<?php
session_start();
  if(!empty($_POST['nazwa_potrawy']) && !empty($_POST['cena']) && !empty($_POST['etykieta']) && !empty($_POST['data_obowiazywania']))
  {
    require_once './connect.php';
    $nazwa = $_POST['nazwa_potrawy'];
    $cena = $_POST['cena'];
    $etykieta = $_POST['etykieta'];
    $data = $_POST['data_obowiazywania'];
    $sql = "INSERT INTO `menu`(`id_potrawy`, `cena`, `id_etykiety`, `data_obowiazywania`) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql); //unikniecie sql-incjection
    $stmt->bind_param("idis", $nazwa, $cena, $etykieta, $data);  
    if($stmt->execute()){
    $_SESSION['success'] = "Pomyślnie dodano punkt w menu";
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
