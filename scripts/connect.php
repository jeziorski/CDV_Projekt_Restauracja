<?php
  //$conn = new mysqli('localhost','root', '', 'cdv_ti_gr1'); //host , uzytkownik, haslo, baza
  $conn = new mysqli('localhost','cdv_g1', 'duda', 'cdv_ti_gr1'); //host , uzytkownik, haslo, baza
//postawienie @ przed new spowoduje niepokazywanie się błędów i warningów
  $conn->set_charset('UTF8');
 ?>
