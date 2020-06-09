<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrator - Zamówienia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Zamówienia</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        

        
        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-check-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Zrealizowane:</span>
                <span class="info-box-number">
                  <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = "SELECT COUNT(*) as total FROM `order_list` WHERE status='5'";
                    $result1 = $conn->query($sql1);
                    while ($dish = $result1->fetch_assoc()){
                    echo<<<DISH
                    <b>$dish[total]</b>
DISH;           
                    }?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-circle-notch"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">W przygotowaniu:</span>
                <span class="info-box-number">
                <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = "SELECT COUNT(*) as total FROM `order_list` WHERE status='3'";
                    $result1 = $conn->query($sql1);
                    while ($dish = $result1->fetch_assoc()){
                    echo<<<DISH
                    <b>$dish[total]</b>
DISH;           
                    }?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-minus-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Anulowane:</span>
                <span class="info-box-number">
                <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = "SELECT COUNT(*) as total FROM `order_list` WHERE status='6'";
                    $result1 = $conn->query($sql1);
                    while ($dish = $result1->fetch_assoc()){
                    echo<<<DISH
                    <b>$dish[total]</b>
DISH;           
                }?>
                    </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-truck"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">W drodze:</span>
                <span class="info-box-number">
                <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = "SELECT COUNT(*) as total FROM `order_list` WHERE status='4'";
                    $result1 = $conn->query($sql1);
                    while ($dish = $result1->fetch_assoc()){
                    echo<<<DISH
                    <b>$dish[total]</b>
DISH;           
                    }?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-md-12">
            <div class="card">
            <form action="../../scripts/change_order_status.php" method="POST">
              <table class="table m-0">
                  <thead>
                    <tr>
                      <th>ID zamówienia</th>
                      <th>Status</th>                      
                      <th>Zatwierdź</th>                      
                    </tr>
                  </thead>
                <tbody>
                  <tr>
                    <td>
                        <select class="form-control">
                        <?php
                        require_once '../../scripts/connect.php';
                        $sql = "SELECT * FROM order_list WHERE status ='2' OR status ='3' OR status ='4'";
                        $result = $conn->query($sql);
                        while ($user = $result->fetch_assoc()){
                        echo<<<CITY
                        <option value="$user[id_zamowienia]">$user[id_zamowienia]</option>
CITY;
                        }              
                        ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control">
                        <?php
                        require_once '../../scripts/connect.php';
                        $sql = "SELECT * FROM order_status WHERE id_status ='3' OR id_status ='4' OR id_status ='5' OR id_status ='6'";
                        $result = $conn->query($sql);
                        while ($perm = $result->fetch_assoc()){
                        echo<<<CITY
                        <option value="$perm[id_status]">$perm[nazwa]</option>
CITY;
                        }              
                        ?>
                        </select>
                    </td> 
                    <td>
                        <input type="submit" class="btn btn-sm btn-warning float-center" value="Zatwierdź zmiany">                     
                    </td>   
                  </tr>
                </tbody>
              </table>
              </form>
            </div>
          </div>
        </div>
        <!-- Main row -->
        <div class="row">
          <div class="col-md-12"> 
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Zamówienia oczekujące:</h3>

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
                      <th>ID_zamówienia</th>
                      <th>Zawartość zamówienia:</th>
                      <th>Adres</th>
                      <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once '../../scripts/connect.php';
                    $sql5 = "SELECT z.street_name, z.street_num, z.flat_num, z.id_zamowienia, z.wartosc_zamowienia, os.nazwa, z.data_zlozenia FROM `order_list` as z 
                    INNER JOIN order_status as os ON z.status=os.id_status  WHERE id_status='2' || id_status='3' || id_status='4'";//dodać ilość zamówień
                    $result = $conn->query($sql5);
                    while ($dish = $result->fetch_assoc()){
                    echo<<<ZAM
                    <tr>                      
                      <td>$dish[id_zamowienia]</td>
                      <td>$dish[wartosc_zamowienia] zł</td>
                      <td>$dish[street_name]  $dish[street_num] / $dish[flat_num]</td>
ZAM;
                    switch($dish['nazwa']){
                      case 'zrealizowane':
                        echo '<td><span class="badge badge-success">zrealizowane</span></td>';
                      break;
                      case 'anulowane':
                        echo '<td><span class="badge badge-danger">anulowane</span></td>';
                      break;
                      case 'w przygotowaniu':
                        echo '<td><span class="badge badge-warning">w przygotowaniu</span></td>';
                      break;
                      case 'oczekujące na zatwierdzenie':
                        echo '<td><span class="badge badge-secondary">oczekujące na zatwierdzenie</span></td>';
                      break;
                      case 'zatwierdzone':
                        echo '<td><span class="badge badge-secondary">zatwierdzone</span></td>';
                      break;
                      case 'w drodze':
                        echo '<td><span class="badge badge-info">w drodze</span></td>';
                      break;
                    }
                    echo '</tr>';//dodać zmiane statusu zamówienia
                      
                    

                    }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="./admin3.php" class="btn btn-sm btn-info float-left">Odśwież</a>
                
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


          
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
