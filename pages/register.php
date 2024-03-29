<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>The Thyme | Rejestracja</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="cover-container w-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="../index.php">Strona główna</a>
        <a class="nav-link" href="../menu.php">Menu</a>
        <a class="nav-link" href="../contact.php">Kontakt</a>
        <a class="nav-link" href="../index.php">Zamów online</a>
        <a class="nav-link" href="#">Rejestracja</a>
      </nav>
    </div>
  </header>
</div>
<div class="register-box">

  <div class="register-logo">
    <a href="../index.html"><b>The Thyme</b></a>
  </div>

  <?php
    if (isset($_SESSION['error'])) {
      echo <<<ERROR
         <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">{$_SESSION['error']}</h3>
              </div>
            </div>
ERROR;
      unset($_SESSION['error']);
    }
  ?>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Zarejestruj nowego użytkownika</p>

      <form action="../scripts/add_user.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Imię" name="name">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nazwisko" name="surname">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>

        

         <div class="input-group mb-3">
          <select name="city" class="form-control">
<?php
              require_once '../scripts/connect.php';
              $sql = "SELECT * FROM city";
              $result = $conn->query($sql);
              while ($city = $result->fetch_assoc()){
              echo<<<CITY
              <option value="$city[id]">$city[city]</option>
CITY;
              }              
?>
            
          </select>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-map-marker-alt mr-1"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Numer telefonu (9 cyfr)"  name="phone" pattern="[0-9]{9}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-phone"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-mail"  name="email1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>       

        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Powtórz E-mail" name="email2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Hasło" name="pass1">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Powtórz hasło" name="pass2">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" value="agree">
              <label for="agreeTerms">
               Akceptuję regulamin
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Gotowe</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <a href="../" class="text-center">Już mam konto, chcę się zalogować</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>

</body>
</html>
