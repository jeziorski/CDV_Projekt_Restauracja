<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.0.1">
    <title>The Thyme</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/carousel/">
       <link rel="shortcut icon" href="img/logo.jpg">
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


  <!-- Marketing messaging and featurettes
  ================================================== -->
  <!-- Wrap the rest of the page in another container to center all the content. -->

  <div class="container marketing">

    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-4">
        <img src="img/chef1.png" class="test rounded-circle" t width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
        <h2> Szef kuchni Daniel Jeziorski</h2>
        <p>Wieloletnie doświadczenie i niesamowite wyczucie smaku. Te dwie rzeczy najlepiej definiują Daniela w swojej pracy.
Staże u światowej klasy największych kucharzy, tysiące godzin praktyk, prób i dążenia do doskonałości.</p>
      
      </div><!-- /.col-lg-4 -->

      <div class="col-lg-4">
        <img src = "img/chef2.png" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></img>
        <h2>Sous-chef Łukasz Adamczak</h2>
        <p>Prawa ręka Daniela, dziesiątki godzin praktyk u najlepszych, kurs szkoleniowy u samej Magdy Gessler, jak i u francuza, który podbił polskie serca - Michela Morana.</p>
        
      </div><!-- /.col-lg-4 -->

      <div class="col-lg-4">
        <img  src = "img/chef4.jpg" class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect width="100%" height="100%" fill="#777"/><text x="50%" y="50%" fill="#777" dy=".3em"></text></svg>
        <h2>Degustator Jakub Pąkalski</h2>
        <p>Trzecie najważniejsze stanowisko zajmuje Pan Jakub, on jest naszym słynnym degustatorem, który przygotowuje ocenę dań, świetnie wyczuwa niedoskonałości potrawy i jest bezbłędny w swoim fachu.</p>
       
      </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->


    <!-- START THE FEATURETTES -->

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Nasza kuchnia. <span class="text-muted">Nasz smak</span></h2>
        <p class="lead">W Restauracji The Thyme czeka na Państwa wiele smakowitych dań kuchni śródziemnomorskiej. Menu jest tak skomponowane, by zaspokoić nawet najbardziej wymagające gusta, a dodatkowo – codziennie szef kuchni serwuje niespodziankę w postaci menu dnia. Podawane przez nas potrawy są przygotowywane z wysokiej jakości produktów z dodatkiem pachnących ziół i sezonowych warzyw. Posiadamy również ofertę dań wegetariańskich.</p>
      </div>
      <div class="col-md-5">
        <img src="img/przyprawy.jpg"  class="bd-placeholder-img test  bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="5000" height="500" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/></img>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7 order-md-2">
        <h2 class="featurette-heading">Nie czekaj, zamawiaj! <span class="text-muted"></span></h2>
        <p class="lead">Sprawna kadra pozwala na naprawdę szybką obsługę, a doświadczeni kierowcy sprawiają, że jedzenie jest dostarczane w rekordowym tempie. Jeżeli przekroczymy zadeklarowany czas oczekiwania - zwracamy koszty!</p>
      </div>
      <div class="col-md-5 order-md-1">
        <img src="img/car.jpg" class="bd-placeholder-img test bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <div class="row featurette">
      <div class="col-md-7">
        <h2 class="featurette-heading">Opinie gości</h2>
        <p class="lead">
"Świetne jedzenie. a szef kuchni jest nie zastąpiony w tym co robi. Jego dania po prostu pieszczą podniebienie. Jednym zdaniem odpowiedni człowiek na właściwym miejscu. Obsługa bardzo miła i pomocna, znają się wspaniale na tym co robią. Lokal naprawę godny polecenia."<b><p>Źródło: www.google.com</p></b></p>
      </div>
      <div class="col-md-5">
        <img src="img/people.jpg" class=" test bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect width="100%" height="100%" fill="#eee"/></svg>
      </div>
    </div>

    <hr class="featurette-divider">

    <!-- /END THE FEATURETTES -->

  </div><!-- /.container -->


  <!-- FOOTER -->
  <footer class="container">
    <p class="float-right"><a href="#">Back to top</a></p>
    <p><b>Copyright © 2020 Daniel Jeziorski & Łukasz Adamczak</b></p>
  </footer>
</main>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assetsbs/dist/js/bootstrap.bundle.js"></script></body>
<script src="./assetsbs/dist/js/bootstrap.js"> </script>
</html>
