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
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Kontakt</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Pełny adres</label>
                    <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = sprintf("SELECT adres, telefon, mail FROM `contact` limit 1",
                    mysqli_real_escape_string($conn, $_SESSION['logged']['email']));
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                    <input type="text" class="form-control" placeholder="adres" value="$user[adres]">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Telefon</label>
                    <input type="text" class="form-control" placeholder="telefon" value="$user[telefon]">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Adres e-mail</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Adres e-mail" value="$user[mail]">
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
