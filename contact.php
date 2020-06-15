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
        <li>
             <form class="form-inline mt-2 mt-md-0">
<a href = "index.php" class="btn btn-outline-success my-2 my-sm-0" type="submit" ahref = "index.php" >Zamów online</a>
      </form>
      </li>
      </ul>
    </div>
  </nav>
</header>

<main role="main">

 <div id="carouselFull" class=" test4 carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
           <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
           <li data-target="#carouselIndicators" data-slide-to="1"></li>
           <li data-target="#carouselIndicators" data-slide-to="2"></li>
       </ol>
     <div class="carousel-inner">
           <div class="carousel-item active">
               <img class="d-block" src="img/szasz.png" alt="First slide">
               <div class="carousel-caption d-md-block">
                   <h3>Witamy w The Thyme</h3>
               </div>
           </div>
           <div class="carousel-item">
               <img class="d-block" src="img/burgers.png" alt="Second slide">
               <div class="carousel-caption d-md-block">
                   <h3>Najlepsze jedzenie w okolicy </h3>
               </div>
           </div>
           <div class="carousel-item">
               <img class="d-block" src="img/pizza.png" alt="Third slide">
               <div class="carousel-caption d-md-block">
                   <h3>Wielokrotnie nagradzana jakość jedzenia</h3>
               </div>
           </div>
       </div>
       <a class="carousel-control-prev" href="#carouselFull" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#carouselFull" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
       </a>
   </div>

  <div class="container marketing">
          <hr class="featurette-divider">
    <!-- START THE FEATURETTES -->
       
    <div class="row featurette">
      <div class="col-md-7">
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
        <img src="img/7.jpg" class="test1" width="90%" height="90%" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/" dy=".3em"></img>
      </div>
    </div>
        <hr class="featurette-divider">
  </div>
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
  <p><b>Copyright © 2020 Daniel Jeziorski & Łukasz Adamczak</b></p>
  </footer>

</main>
 </body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script> window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script>
      <script src="../assets/dist/js/bootstrap.bundle.js"></script>
<script src="./assetsbs/dist/js/bootstrap.js"> </script>
</html>
