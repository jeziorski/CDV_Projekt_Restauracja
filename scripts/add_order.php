<?php 
session_start();
   if(!isset($_SESSION['logged']['email']) || ($_SESSION['logged']['permission']) != '2'){
      header('location: ../../index.php'); 
      exit();
      }
      else{
        if(!isset($_POST['odbior'])){
           if(!empty($_POST['street_name']) && !empty($_POST['street_num'])){
              require_once './connect.php';
              $street_name = $_POST['street_name'];
              $street_num = $_POST['street_num'];
              $flat_num = $_POST['flat_num'];
              $user_id = $_SESSION['logged']['user_id'];
              $status = 1;
              $sql = "INSERT INTO `order_list`(`id_uzytkownika`, `street_name`,`street_num`, `flat_num`, `status`) VALUES (?, ?, ?, ?, ?)";
              $stmt = $conn->prepare($sql); //unikniecie sql-incjection
              $stmt->bind_param("isssi", $user_id, $street_name, $street_num, $flat_num, $status);
              if($stmt->execute()){
                header('location: ../pages/logged/client1.2.php');
                exit();
              }
           }else{
           $_SESSION['error'] = 'wypełnij wszystkie dane lub wybierz odbiór własny';
           header('location: ../pages/logged/client.php');
           }
        }else{
           require_once './connect.php';
           $street_name = "odbiór własny";              
           $user_id = $_SESSION['logged']['user_id'];
           $status = 1;
           $sql = "INSERT INTO `order_list`(`id_uzytkownika`, `street_name`, `status`) VALUES (?, ?, ?)";
           $stmt = $conn->prepare($sql); //unikniecie sql-incjection
           $stmt->bind_param("isi", $user_id, $street_name, $status);
           if($stmt->execute()){
             header('location: ../pages/logged/client1.2.php');
             exit();
           }
        }      
   }  
?>
