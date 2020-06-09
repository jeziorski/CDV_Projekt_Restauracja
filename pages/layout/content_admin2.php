<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrator - Menu dnia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Menu dnia</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12"> 
          </div>
          <!-- Dzisiejsze menu -->
          <!-- /.col -->
          <div class="col-md-12"> 
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent  bg-secondary">
                <h3 class="card-title">Dzisiejsze menu:</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Nazwa dania</th>
                      <th>Cena za porcję</th>
                      <th>Ilość zamówień</th>
                      <th>Wartość zamówień</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once '../../scripts/connect.php';
                    $sql5 = "SELECT m.cena, dl.nazwa_potrawy FROM `menu` as m 
                    INNER JOIN dish_list as dl ON m.id_potrawy=dl.id_potrawy";//dodać ilość zamówień
                    $result = $conn->query($sql5);
                    while ($dish = $result->fetch_assoc()){
                    echo<<<DISH
                    <tr>                      
                      <td>$dish[nazwa_potrawy]</td>
                      <td>$dish[cena] zł</td>
                    </tr>
DISH;
                    }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="javascript:void(0)" class="btn btn-sm btn-info float-left">Odśwież</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->         
        </div>
        <!-- /.row -->
      <div class="row">
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Nowa pozycja w menu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nazwa dania:</label>
                    <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = sprintf("SELECT adres, telefon, mail FROM `contact` limit 1",
                    mysqli_real_escape_string($conn, $_SESSION['logged']['email']));
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                    <select class="form-control" placeholder="Nazwa dania" value=""></select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Cena za porcję</label>
                    <input type="text" class="form-control" placeholder="Cena za porcję" value="">
                  </div>
                  <div class="form-group">
                    <label>Data obowiązywania</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Data obowiązywania" value="">
                  </div>
                </div>
USERS;           
                    }?>                    
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Dodaj danie do spisu</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Nowa danie w liście dań</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nazwa dania:</label>
                    <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = sprintf("SELECT adres, telefon, mail FROM `contact` limit 1",
                    mysqli_real_escape_string($conn, $_SESSION['logged']['email']));
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                    <input type="text" class="form-control" placeholder="Nazwa dania" value="">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Cena za porcję</label>
                    <input type="text" class="form-control" placeholder="Cena za porcję" value="">
                  </div>
                  <div class="form-group">
                    <label>Data obowiązywania</label>
                    <input type="date" class="form-control" id="exampleInputPassword1" placeholder="Data obowiązywania" value="">
                  </div>
                </div>
USERS;           
                    }?>                    
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
