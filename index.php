<?php
 session_start();
 if (isset($_SESSION['logged']['email'])){
   header('location: ./scripts/login.php');
 }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Restauracja | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="./plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page"> 
<div class="cover-container w-100 p-3 mx-auto flex-column">
  <header class="masthead mb-auto">
    <div class="inner">
      <nav class="nav nav-masthead justify-content-center">
        <a class="nav-link" href="./main.php">Strona główna</a>
        <a class="nav-link" href="./menu.php">Menu</a>
        <a class="nav-link" href="./contact.php">Kontakt</a>
        <a class="nav-link" href="./index.php">Zamów online</a>
        <a class="nav-link" href="pages/register.php">Rejestracja</a>
      </nav>
    </div>
  </header>
</div>

<div class="login-box">

  <div class="login-logo">

    <a href="./index.html"><b>The Thyme</b></a>

    <?php 
      if (isset($_GET['register']) && $_GET['register'] == 'success') {
        echo <<<SUCCESS
         
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Prawidłowo dodano użytkownika</h3>
              </div>
            </div>
          
SUCCESS;
      }
    ?>
    <?php 
      if (isset($_GET['logout']) && $_GET['logout'] == 'success') {
        echo <<<LOGOUT
         
            <div class="card card-outline card-success">
              <div class="card-header">
                <h3 class="card-title">Poprawnie wylogowano</h3> 
              </div>              
            </div>
          
LOGOUT;
      }
    ?>
    <?php 
      if (isset($_SESSION['error'])) {
        echo <<<ERROR
         
            <div class="card card-outline card-danger">
              <div class="card-header">
                <h3 class="card-title">$_SESSION[error]</h3>     
              </div>
            </div>
          
ERROR;
      unset($_SESSION['error']);
      }
    ?>

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Zaloguj się do swojego konta</p>

      <form action="./scripts/login.php" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="E-mail" name="email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Hasło" name="password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Zapamiętaj mnie
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Zaloguj</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      
      <!-- /.social-auth-links -->
      <p class="mb-0">
        <a href="./pages/register.php" class="text-center">Zarejestruj nowego użytkownika</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>

</body>
</html>
