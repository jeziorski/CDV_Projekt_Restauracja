<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Strona główna restauracji The Thyme">
  <meta name="author" content="Daniel Jeziorski & Łukasz Adamczak">
  <title>The Thyme - Menu</title>

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
          <a class="nav-link active" href="#">Menu</a>
          <a class="nav-link" href="./contact.php">Kontakt</a>
          <a class="nav-link" href="./index.php">Zamów online</a>
          <a class="nav-link" href="pages/register.php">Rejestracja</a>
        </nav>
      </div>
    </header>
    
    <section class="content">
      <div class="container-fluid">
        <main role="main" class="inner cover">
        <?php
                    require_once './scripts/connect.php';
                    $sql5 = "SELECT m.cena, dl.nazwa_potrawy, dl.opis_potrawy, e.opis_etykiety FROM `menu` as m 
                    INNER JOIN dish_list as dl ON m.id_potrawy=dl.id_potrawy
                    INNER JOIN etykiety as e ON e.id_etykiety=m.id_etykiety";//zamówienia
                    $result = $conn->query($sql5);
                    while ($dish = $result->fetch_assoc()){
                    echo<<<DISH
          <div class="row">
            <div class="col-sm-12">
              <div class="position-relative p-3 bg-secondary" style="height: 180px">
                <div class="ribbon-wrapper ribbon-xl">
                  <div class="ribbon bg-success">
                    $dish[opis_etykiety]
                  </div>
                </div>
                <big>$dish[nazwa_potrawy]</big> <br />
                <big>$dish[opis_potrawy]</big><br />
                <big>$dish[cena] zł</big>
              </div>
            </div>
          </div>
          <br/>
DISH;
                    }?>
        </main>
      </div>
    </section>
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
