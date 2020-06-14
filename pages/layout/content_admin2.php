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
                <h3 class="card-title">Historia menu:</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
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
                      <th>Data obowiązywania</th>
                      <th>Ilość zamówień</th>
                      <th>Wartość zamówień</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once '../../scripts/connect.php';
                    $sql5 = "SELECT m.data_obowiazywania, m.cena, dl.nazwa_potrawy FROM `menu` as m 
                    INNER JOIN dish_list as dl ON m.id_potrawy=dl.id_potrawy ORDER BY m.data_obowiazywania desc";//dodać ilość zamówień
                    $result = $conn->query($sql5);
                    while ($dish = $result->fetch_assoc()){
                    echo<<<DISH
                    <tr>                      
                      <td>$dish[nazwa_potrawy]</td>
                      <td>$dish[cena] zł</td>
                      <td>$dish[data_obowiazywania]</td>
                      <td></td>
                      <td></td>
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
                <a href="./admin2.php" class="btn btn-sm btn-info float-left">Odśwież</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->         
        </div>
        <!-- /.row -->


        <!-- Sukces lub error -->
      <?php
        if (isset($_SESSION['error'])) {
        echo<<<ERROR
          <div class="alert alert-danger alert-dismissible">
             <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
             <h5><i class="icon fas fa-ban"></i>Błąd wysyłania formularza!</h5>
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

      <div class="row">
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Nowa pozycja w liście dań</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../../scripts/add_dish.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nazwa dania:</label>                    
                    <input type="text" class="form-control" placeholder="Nazwa dania" value="" name="nazwa_potrawy">
                  </div>
                  <div class="form-group">
                    <label for="">Opis dania</label>
                    <input type="text-area" class="form-control" placeholder="Opis dania" name="opis_potrawy">
                  </div>
                </div>                    
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Dodaj danie do spisu</button>
                </div>
              </form>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Menu</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="../../scripts/add_dish_menu.php" method="POST">
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nazwa dania:</label>
                    <select class="form-control" name="nazwa_potrawy">
                    <option></option>
                    <?php
                        require_once '../../scripts/connect.php';
                        $sql = "SELECT * FROM dish_list";
                        $result = $conn->query($sql);
                        while ($dish = $result->fetch_assoc()){
                        echo<<<CITY
                        <option value="$dish[id_potrawy]">$dish[nazwa_potrawy]</option>
CITY;
                        }              
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Cena za porcję</label>
                    <input type="number" class="form-control" placeholder="Cena za porcję" min="0" name="cena">
                  </div>
                  <div class="form-group">
                    <label>Etykieta</label>
                    <select class="form-control" name="etykieta">
                    <option></option>
                    <?php
                        require_once '../../scripts/connect.php';
                        $sql = "SELECT * FROM etykiety";
                        $result = $conn->query($sql);
                        while ($ety = $result->fetch_assoc()){
                        echo<<<CITY
                        <option value="$ety[id_etykiety]">$ety[opis_etykiety]</option>
CITY;
                        }              
                        ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Data obowiązywania</label>
                    <input type="date" class="form-control" placeholder="Data obowiązywania" value="" name="data_obowiazywania">
                  </div>
                </div>                   
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Dodaj nowy punkt w menu</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
