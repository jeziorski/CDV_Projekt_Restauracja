<?php
session_start();
  if(!empty($_POST['email']) && !empty($_POST['permission']) && !empty($_POST['status']))  {
    require_once './connect.php';
    $id = $_POST['email'];
    $permission = $_POST['permission'];
    $status = $_POST['status'];
    $sql = "UPDATE `user` SET `status_id` = ? , `permission_id` = ? WHERE `id` = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iii", $status, $permission, $id);
    if($stmt->execute()){
    $_SESSION['success'] = "Zmieniono dostęp konta o id ".$id;
      header('location: ../pages/logged/admin5.php');
      }else {
      $_SESSION['error'] = "Błąd zapytania sql";
      header('location: ../pages/logged/admin5.php');
      }
  }else {
    $_SESSION['error'] = "Wybierz użytkownika, odpowiednie uprawnienia i status konta";
    header('location: ../pages/logged/admin5.php');  
  }
