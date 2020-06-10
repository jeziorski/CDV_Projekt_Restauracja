<?php
session_start();
echo 'bedzie zmiana';
  if(!empty($_POST['nazwa_potrawy']) && !empty($_POST['opis_potrawy']))
  {
  require_once './';
    
  }else {
    $_SESSION['error'] = "Wypełnij wszystkie pola formularza";
    header 'location: ../pages/logged/admin2.php';
  }

?>
