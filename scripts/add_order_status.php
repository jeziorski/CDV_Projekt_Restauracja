<?php 
session_start();
   if(!isset($_SESSION['logged']['email']) || ($_SESSION['logged']['permission']) != '2'){
      header('location: ../../index.php'); 
      exit();
      }else{
          require_once './connect.php';
          if(!empty($_POST['wartosc']) && !empty($_POST['id_zamowienia'])){
          $wartosc = $_POST['wartosc'];
          $id_z = $_POST['id_zamowienia'];
          $status = 2;
          $sql ="UPDATE order_list SET `wartosc_zamowienia`='$wartosc', `status`='$status', `data_aktualizacji`=CURRENT_TIMESTAMP() WHERE `id_zamowienia`='$id_z'";
          $stmt = $conn->prepare($sql);
          if($stmt->execute()){
                header('location: ../pages/logged/client2.php');
                $_SESSION['success'] = 'Pomyślnie złożono zamówienie';
                exit();
              }
          }else{$_SESSION['error']="Coś poszło nie tak, spróbuj ponownie"; header('location: ../pages/logged/client1.3.php');}
      } 
?>
