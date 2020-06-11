<?php
session_start();
  if(!empty($_POST['city']) && !empty($_POST['street']) && !empty($_POST['streetnum']) && !empty($_POST['flatnum']))  {
    require_once './connect.php';
    $uid = $_SESSION['logged']['user_id'];
    $city = $_POST['city'];
    $street_name = $_POST['street'];
    $street_num = $_POST['streetnum'];
    $flat_num = $_POST['flatnum'];
    $sql = "UPDATE `user` SET `city_id`=?, `street_name`= ?, `street_num`=?, `flat_num`=? WHERE `id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isiii", $city, $street_name, $street_num, $flat_num, $uid);
    if($stmt->execute()){
    $_SESSION['success'] = "Zmieniono dane adresowe";
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
