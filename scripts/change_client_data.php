<?php
session_start();
  if(!empty($_POST['name']) && !empty($_POST['surname']) && !empty($_POST['mail']) && !empty($_POST['tel']))  {
    require_once './connect.php';
    $uid = $_SESSION['logged']['user_id'];
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $mail = $_POST['mail'];
    $tel = $_POST['tel'];
    $sql = "UPDATE `user` SET `name`=?, `surname`= ?, `email`=?, `phone`=? WHERE `id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $name, $surname, $mail, $tel, $uid);
    if($stmt->execute()){
    $_SESSION['success'] = "Zmieniono dane kontaktowe";
      header('location: ../pages/logged/client3.php');
      }else {
      $_SESSION['error'] = "Błąd zapytania sql";
      header('location: ../pages/logged/client3.php');
      }
  }else {
    $_SESSION['error'] = "Wypełnij wszystkie pola formularza";
    header('location: ../pages/logged/client3.php');  
  }
?>
