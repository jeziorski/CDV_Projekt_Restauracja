<?php
session_start();
  if(!empty($_POST['pass1']) && !empty($_POST['pass2']))  {
    if ($_POST['pass1'] != $_POST['pass2'])    {
      $_SESSION['error'] = 'Hasła są różne!';
      header('location: ../pages/logged/client3.php');
    }
    require_once './connect.php';
    $uid = $_SESSION['logged']['user_id'];
    $pass = $_POST['pass1'];
    $pass = password_hash($pass, PASSWORD_ARGON2ID);
    $sql = "UPDATE `user` SET `pass`=? WHERE `id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $pass, $uid);
    if($stmt->execute()){
    $_SESSION['success'] = "Zmieniono hasło";
      header('location: ../pages/logged/client3.php');
      }else {
      $_SESSION['error'] = "Błąd zapytania sql";
      header('location: ../pages/logged/client3.php');
      }
  }else {
    $_SESSION['error'] = "Hasła powinny być takie same";
    header('location: ../pages/logged/client3.php');  
  }
?>

