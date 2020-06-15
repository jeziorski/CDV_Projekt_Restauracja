<?php 
session_start();
   if(!isset($_SESSION['logged']['email']) || ($_SESSION['logged']['permission']) != '2'){
      header('location: ../../index.php'); 
      exit();
      }
      else{
          $dishname = $_POST['nazwa'];
          $dish = $_POST['menu'];
          $price = $_POST['cena'];
          $cnt = $_POST['ilosc'];
          if(isset($_POST['menu'])){
              for($i=0;$i<count($dish);$i++){
              echo 'wybrano '.$dishname[$i].' w ilosci: '.$cnt[$i].' za łączną watość '.($price[$i]*$cnt[$i]).'</br>'; }//insert to ordered dish
          }else{
           $_SESSION['error'] = 'Wybierz przynajmniej jedno danie';
           header('location: ../pages/logged/client1.2.php');
          }
   }  
?>
