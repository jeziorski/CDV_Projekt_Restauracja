<?php 
session_start();
   if(!isset($_SESSION['logged']['email']) || ($_SESSION['logged']['permission']) != '2'){
      header('location: ../../index.php'); 
      exit();
      }
      else{
          require_once './connect.php';
          $dishname = $_POST['nazwa'];
          $dish = $_POST['menu'];
          $price = $_POST['cena'];
          $cnt = $_POST['ilosc'];
          $id_zamowienia = 0;
          
          if(isset($_POST['menu'])){
              for($i=0;$i<count($dish);$i++){
              $razem = $cnt[$i] * $price[$i];
              //echo 'wybrano '.$dishname[$i].' w ilosci: '.$cnt[$i].' za łączną watość '.$razem.'</br>'; 
              $sql = 'INSERT INTO `ordered_dish`(`id_zamowienia`, `id_menu`, `ilosc`, `wartosc`) VALUES (?, ?, ?, ?)';
              $stmt = $conn->prepare($sql);
              $stmt = bind_param("iiii", $id_zamowienia,  $dish, $cnt, $razem);
              }//insert to ordered dish
          }else{
           $_SESSION['error'] = 'Wybierz przynajmniej jedno danie';
           header('location: ../pages/logged/client1.2.php');
          }
   }  
?>
