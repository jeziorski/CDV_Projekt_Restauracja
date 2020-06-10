<?php
session_start();
  if(!empty($_POST['zamowienie']) && !empty($_POST['status']))
  {
    require_once './connect.php';
    $zamowienie = $_POST['zamowienie'];
    $status = $_POST['status'];
    $sql = "UPDATE `order_list` SET `status`= ?, data_aktualizacji=CURRENT_TIMESTAMP() WHERE `id_zamowienia`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $status,$zamowienie);
    if($stmt->execute()){
    $_SESSION['success'] = "Zmieniono status zamówienia";
      header('location: ../pages/logged/admin3.php');
      }else {
      $_SESSION['error'] = "Błąd zapytania sql";
      header('location: ../pages/logged/admin3.php');
      }
  }else {
    $_SESSION['error'] = "Wybierz zamówienie oraz jego nowy status";
    header('location: ../pages/logged/admin3.php');  
  }
?>
