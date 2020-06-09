<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Informacje o koncie</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Informacje o koncie</li>
            </ol>
          </div><!-- /.col -->
        </div>        
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid"> 
        <div class="row">
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Dane adresowe</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../../scripts/change_client_contact.php" method="POST">
              
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Miejscowość</label>
                    <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = sprintf("SELECT street_name, street_num, flat_num FROM user WHERE email='%s'",
                    mysqli_real_escape_string($conn, $_SESSION['logged']['email']));
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Miejscowość" value="Poznań" >
                    </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kod pocztowy</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Kod pocztowy">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ulica</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Ulica" value=$user[street_name]>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Numer budynku</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Numer budynku" value=$user[street_num]>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Numer lokalu</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Numer lokalu" value=$user[flat_num]>
                  </div>
                </div>
USERS;           
                    }?>
                    
                  
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Zaktualizuj dane adresowe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Dane osobowe</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../../scripts/change_client_data.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Imię</label>
                    <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = sprintf("SELECT name, surname, email, phone FROM user WHERE email='%s'",
                    mysqli_real_escape_string($conn, $_SESSION['logged']['email']));
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Imię" value="$user[name]">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Nazwisko</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Nazwisko" value="$user[surname]">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Adres e-mail</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Adres e-mail" value="$user[email]">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Numer telefonu</label>
                    <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Numer telefonu" value="$user[phone]">
                  </div>
                </div>
USERS;           
                    }?>                    
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Zaktualizuj dane osobowe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Hasło</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../../scripts/change_client_pass.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nowe hasło</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Nowe hasło">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Powtórz nowe hasło</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Powtórz nowe hasło">
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Zmień hasło</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
