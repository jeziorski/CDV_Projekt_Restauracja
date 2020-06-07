<?php
  session_start();
  if (isset($_SESSION['logged']['email'])){
    switch ($_SESSION['logged']['permission']) {
	            case '1':
		            header('location: ../pages/logged/admin.php');
		            break;

              case '2':
		            header('location: ../pages/logged/client.php');
		            break;

              case '3':
		            header('location: ../pages/logged/kuchnia.php');
		            break;
    }
            //exit();  //zakończenie kodu
  }

  else if (!empty($_POST['email']) && !empty($_POST['password'])){
    require_once './connect.php';
    if($conn->connect_errno != 0){
      $_SESSION['error'] = 'Błędne połączeznie z bazą danych!';
      header('location: ../'); 
      exit();
    } 
    $email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
    $pass = htmlentities($_POST['password'], ENT_QUOTES, "UTF-8");

    $sql = sprintf("SELECT * FROM user WHERE email='%s'",
            mysqli_real_escape_string($conn, $email));
    
    if($result = $conn->query($sql)){
      $count = $result->num_rows;
      if ($count == 1){
        //pobranie hasła
        $user = $result->fetch_assoc();
        $passdb = $user['pass'];
        //echo $passdb;
        
        //porównanie hasła
        if(password_verify($pass, $passdb)){
          //prawidłowy login i hasło
          //sprawdzenie statusu konta
          if($user['status_id'] == 1){
            $_SESSION['logged']['permission'] = $user['permission_id'];
            $_SESSION['logged']['name'] = $user['name'];
            $_SESSION['logged']['surname'] = $user['surname'];
            $_SESSION['logged']['email'] = $user['email'];
            $sql2 = sprintf("UPDATE user SET last_login = CURRENT_TIMESTAMP() WHERE email='%s'",
            mysqli_real_escape_string($conn, $email));
            $conn->query($sql2);
            $conn->close();

            switch ($_SESSION['logged']['permission']) {
	            case '1':
		            header('location: ../pages/logged/admin.php');
		            break;

              case '2':
		            header('location: ../pages/logged/client.php');
		            break;

              case '3':
		            header('location: ../pages/logged/kuchnia.php');
		            break;
            }

          }else{
            $_SESSION['error'] = 'Skontaktuj się z administratorem w celu odblokowania konta lub aktywuj konto';
            header('location: ../');
          }
        }else{
          $_SESSION['error'] = 'Login lub hasło są błędne';
        header('location: ../');
        }

      }else{
        $_SESSION['error'] = 'Login lub hasło są błędne';
        header('location: ../');
      }

    }

  }else{
    $_SESSION['error'] = 'Wypełnij wszystkie dane!';
    header('location: ../');
  }
?>
