<?php 
session_start();
   if(!isset($_SESSION['logged']['email']) || ($_SESSION['logged']['permission']) != '2'){
      header('location: ../../index.php'); 
      exit();
      }else{
          require_once './connect.php';
          $dishname = $_POST['nazwa'];
          $dish = $_POST['menu'];
          $price = $_POST['cena'];
          $cnt = $_POST['ilosc'];
          $sql1 = sprintf("SELECT * FROM order_list WHERE id_uzytkownika='%u' AND status=1",
            mysqli_real_escape_string($conn, $_SESSION['logged']['user_id']));    
          if($result = $conn->query($sql1)){
            $count = $result->num_rows;
            if ($count == 1){
            $zam = $result->fetch_assoc();  
            $id_zamowienia = $zam['id_zamowienia'];
            //znalezienie id_zamowienia ktore jest puste od sql1
          }
          if(isset($_POST['menu'])){
            for($i=0;$i<count($dish);$i++){
              $razem = $cnt[$i] * $price[$i];
              echo $id_zamowienia.' wybrano '.$dishname[$i].' w ilosci: '.$cnt[$i].' za łączną watość '.$razem.'</br>'; //wyswietlanie zamowienia
              $sql = "INSERT INTO `ordered_dish`(`id_zamowienia`, `id_menu`, `ilosc`, `wartosc`) VALUES ('$id_zamowienia', '$dish[$i]', '$cnt[$i]', '$razem')";
              $stmt = $conn->prepare($sql);
              $stmt->execute();}
          }else{
           $_SESSION['error'] = 'Wybierz posiłek i podaj ilość';
           header('location: ../pages/logged/client1.2.php');
          }
          $_SESSION['success'] = 'Poniżej przedstawiono twoje zamówienie do zatwierdzenia';
          header('location: ../pages/logged/client1.3.php');
          //$sql = "UPDATE order_list "
      } 
   }
?>
