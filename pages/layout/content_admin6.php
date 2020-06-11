<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrator - Kontakt</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Kontakt</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6">
          <?php
        if (isset($_SESSION['error'])) {
        echo<<<ERROR
          <div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <h5><i class="icon fas fa-ban"></i>Błąd!</h5>
             {$_SESSION['error']}
          </div>
ERROR;
        unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])){
        echo<<<SUCCESS
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i> Sukces!</h5>
          {$_SESSION['success']}
        </div>
SUCCESS;
        unset($_SESSION['success']);
        }
        ?>
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Kontakt</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../../scripts/change_contact.php" method="POST">
                <div class="card-body">
                  
                    <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = sprintf("SELECT * FROM `contact` limit 1",
                    mysqli_real_escape_string($conn, $_SESSION['logged']['email']));
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ulica</label>
                    <input type="text" class="form-control" placeholder="ulica" value="$user[ulica]" name="ulica">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kod pocztowy i miasto</label>
                    <input type="text" class="form-control" placeholder="kod pocztowy i miasto" value="$user[kod_pocztowy]" name="kod_pocztowy">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telefon</label>
                    <input type="text" class="form-control" placeholder="telefon" value="$user[telefon]" name="telefon">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Adres e-mail</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Adres e-mail" value="$user[mail]" name="mail">
                  </div>
                </div>
USERS;           
                    }?>                    
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Zaktualizuj stronę kontakt</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
