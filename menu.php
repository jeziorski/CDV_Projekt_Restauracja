<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>The Thyme</title>
       <link rel="shortcut icon" href="img/logo.jpg">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">

<link href="./assetsbs/dist/css/bootstrap.css" rel="stylesheet">

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

    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
  <header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="main.php">Strona główna</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="menu.php"> Menu<span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Kontakt</a>
        </li>     
      </ul>
      <form class="form-inline mt-2 mt-md-0">
<a href = "index.php" class="btn btn-outline-success my-2 my-sm-0" type="submit" ahref = "index.php" >Zamów online</a>
      </form>
    </div>
  </nav>
</header>

<main role="main">

 <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="test_1 carousel-item active">
      <img class="d-block w-100" src="img/5.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/4.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/4.jpg" alt="Third slide">
    </div>
  </div>
</div>

<h1 class = "test2">◊ MENU ◊</h1>

  <div class="container marketing">

    <hr class="featurette-divider">

        
         <?php
       require_once './scripts/connect.php';
                    $sql5 = "SELECT m.id_potrawy, m.cena, dl.nazwa_potrawy, dl.opis_potrawy, dl.img, e.opis_etykiety, m.id_menu FROM `menu` as m 
                    INNER JOIN dish_list as dl ON m.id_potrawy=dl.id_potrawy
                    INNER JOIN etykiety as e ON e.id_etykiety=m.id_etykiety
                    WHERE m.data_obowiazywania=CURDATE()";//menu z dzisiaj
                    $result = $conn->query($sql5);
                    while ($cont = $result->fetch_assoc()){
          echo <<< MENU
        <div class="row featurette">
        <div class="col-md-7">
        <h1 class="featurette-heading"> $cont[nazwa_potrawy] </h1>
        <h3 class = "ety"><span style="color: red"> $cont[opis_etykiety] </span></h3>
        <p class="lead">$cont[opis_potrawy]</p>
        <h3> $cont[cena] zł</h3>
      </div>
        <div class="col-md-5">
        <img src="{$cont['img']}" class="test bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/></svg>
      </div>
    </div>
    <hr class="featurette-divider">
MENU;
        }
    ?>
 
  </div>


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.js"></script></body>
<script src="./assetsbs/dist/js/bootstrap.js"> </script>
</html>
