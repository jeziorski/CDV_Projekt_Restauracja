<?php
session_start();
  if(!empty($_POST['zamowienie']) && !empty($_POST['status']))
  {
    require_once './connect.php';
    $zamowienie = $_POST['zamowienie'];
    $status = $_POST['status'];
    //do poprawy
    $sql2 = sprintf("UPDATE order_list SET status = CURRENT_TIMESTAMP() WHERE email='%s'",
            mysqli_real_escape_string($conn, $email)); 
            $conn->query($sql2);
    //do poprawy
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
