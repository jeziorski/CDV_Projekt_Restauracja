<?php 
session_start();
?>
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

    <!-- Bootstrap core CSS -->
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
    <!-- Custom styles for this template -->
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
      <img class="d-block w-100" src="img/2.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="img/3.jpg" alt="Third slide">
    </div>
  </div>
</div>

  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">
    <div class="row featurette">
      <div class="col-md-7 ">
        <h2 class="featurette-heading">Kontakt</h2>
        <p class="lead"><b>Restauracja The Thyme</b></p>
        <?php 
        require_once'./scripts/connect.php';
         $sql1 = "SELECT ulica, kod_pocztowy, telefon, mail FROM `contact`";
         $result1 = $conn->query($sql1);
         while ($cont = $result1->fetch_assoc()){
         echo<<<CONTACT
        <p> ul. $cont[ulica]</p>
        <p> $cont[kod_pocztowy] </p>
        <p> Email: $cont[mail] </p>
        <p> Telefon kontaktowy: $cont[telefon] </p>
CONTACT;
                    }
        ?>
       

      </div>
      <div class="col-md-5">
<img src = "img/spa.jpg" class="img_1 test" width="500" height="500" preserveAspectRatio="xMidYMid slice" focusable="false" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/></img>
      </div>
    </div>
  </div>


  <!-- FOOTER -->
  <footer class="container">
    <p>&copy; 2017-2020 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assetsbs/dist/js/bootstrap.bundle.js"></script></body>
<script src="./assetsbs/dist/js/bootstrap.js"> </script>
</html>
