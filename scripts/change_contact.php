<?php
session_start();
  if(!empty($_POST['ulica']) && !empty($_POST['kod_pocztowy']) && !empty($_POST['telefon']) && !empty($_POST['mail']))  {
    require_once './connect.php';
    $ulica = $_POST['ulica'];
    $kod = $_POST['kod_pocztowy'];
    $tel = $_POST['telefon'];
    $mail = $_POST['mail'];
    $sql = "UPDATE `contact` SET `ulica`= ?, `kod_pocztowy`=?, `telefon`=?, `mail`=?  WHERE `id`=1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $ulica, $kod, $tel, $mail);
    if($stmt->execute()){
    $_SESSION['success'] = "Zmieniono dane kontaktowe restauracji";
      header('location: ../pages/logged/admin6.php');
      }else {
      $_SESSION['error'] = "Błąd zapytania sql";
      header('location: ../pages/logged/admin6.php');
      }
  }else {
    $_SESSION['error'] = "Wypełnij wszystkie pola formularza";
    header('location: ../pages/logged/admin6.php');  
  }
?>
