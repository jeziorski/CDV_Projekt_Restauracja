<?php
  session_start();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Strona główna restauracji The Thyme">
  <meta name="author" content="Daniel Jeziorski & Łukasz Adamczak">
  <title>The Thyme - Kontakt</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/cover/">
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
  <!-- Bootstrap core CSS -->
  <link href="assetsbs/dist/css/bootstrap.css" rel="stylesheet">

  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      -ms-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>
  <!-- Custom styles for this template -->
  <link href="cover.css" rel="stylesheet">
</head>
<body class="text-center">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="masthead mb-auto">
      <div class="inner">
        <h3 class="masthead-brand">The Thyme</h3>
        <nav class="nav nav-masthead justify-content-center">
          <a class="nav-link" href="./main.php">Strona główna</a>
          <a class="nav-link" href="./menu.php">Menu</a>
          <a class="nav-link active" href="#">Kontakt</a>
          <a class="nav-link" href="./index.php">Zamów online</a>
          <a class="nav-link" href="pages/register.php">Rejestracja</a>
        </nav>
      </div>
    </header>

    <main role="main" class="inner cover">
      <div class="col-md-12 col-sm-12 col-12">
        <div class="info-box bg-secondary">
          <span class="info-box-icon bg-secondary"><i class="fas fa-envelope"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Mail</span>
            <span class="info-box-number">
            <?php 
                    require_once './scripts/connect.php';
                    $sql1 = "SELECT adres, telefon, mail FROM `contact` limit 1";
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                    <b>$user[mail]</b>
USERS;           
                    }?>
            </span><!-- dane kontaktowe -->
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
        <div class="info-box bg-secondary">
          <span class="info-box-icon bg-secondary"><i class="fas fa-phone"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Telefon</span>
            <span class="info-box-number">
            <?php 
                    require_once './scripts/connect.php';
                    $sql1 = "SELECT adres, telefon, mail FROM `contact` limit 1";
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                    <b>$user[telefon]</b>
USERS;           
                    }?>
            </span> <!-- dane kontaktowe z usera-->
          </div>
          <!-- /.info-box-content -->
        </div>
        <div class="info-box bg-secondary">
          <span class="info-box-icon bg-secondary"><i class="fas fa-map-marker-alt"></i></span>
          <div class="info-box-content">
            <span class="info-box-text">Lokalizacja</span>
            <span class="info-box-number">
            <?php 
                    require_once './scripts/connect.php';
                    $sql1 = "SELECT adres, telefon, mail FROM `contact` limit 1";
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                    <b>$user[adres]</b>
USERS;           
                    }?>
            </span> <!-- dane kontaktowe z usera-->
          </div>
          <!-- /.info-box-content -->
        </div>
      </div>
    </main>

    <footer class="mastfoot mt-auto">
      <div class="inner">
        <p>The Thyme, by Daniel Jeziorski & Łukasz Adamczak</p>
      </div>
    </footer>
  </div>
  <script src="./dist/js/adminlte.min.js"></script>
  <script src="./plugins/jquery/jquery.min.js"></script>
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
