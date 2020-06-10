<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Złóż zamówienie</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Złóż zamówienie</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <?php
        
        ?>
      
     
        <?php
                    require_once '../../scripts/connect.php';
                    $sql1 = sprintf("SELECT street_name, street_num, flat_num FROM `user` where email='%s'",
                    mysqli_real_escape_string($conn, $_SESSION['logged']['email']));
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    
                    if (isset($_SESSION['error'])) {
                    echo<<<ERROR
                    <div class="row">
                      <div class="col-md-6">
                        <div class="alert alert-danger alert-dismissible">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                          <h5><i class="icon fas fa-ban"></i>Błąd!</h5>
                          {$_SESSION['error']}
                          </div>
                      </div>
                    </div>
ERROR;
        unset($_SESSION['error']);
        }
        echo<<<USERS
        <div class="row">
          <div class="col-md-6">
          <div class="container-fluid">
      <div class="alert alert-warning alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <h5><i class="icon fas fa-exclamation-triangle"></i> Uwaga!</h5>
       Restauracja prowadzi dostawy tylko na terenie miasta Poznania! Zamówienia poza Poznań bedą anulowane.
      </div>
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Adres dostawy</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../../scripts/add_order.php" method="post">
                <div class="card-body">
                  <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="odbiór osobisty" name="odbior">
                          <label for="customCheckbox1" class="custom-control-label">Odbiorę osobiście</label>
                  </div><br/>
                  <div class="form-group">
                    <label>Nazwa ulicy:</label>
                    <input type="text" class="form-control" id="adres" placeholder="Nazwa ulicy"  name="street_name">
                  </div>
                  <div class="form-group">
                    <label>Numer domu</label>
                    <input type="text" class="form-control" id="adres" placeholder="Numer domu"  name="street_num">
                  </div>
                  <div class="form-group">
                    <label>Numer lokalu</label>
                    <input type="text" class="form-control" id="adres" placeholder="Numer lokalu"  name="flat_num">
                  </div>
                </div>
                
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Rozpocznij składanie zamówienia</button>
            </div>
            </form>
            </div>
          </div>
        </div>
USERS;          

                    }?>                    
                
      
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
