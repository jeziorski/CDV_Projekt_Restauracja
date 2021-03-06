<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrator - Historia zamówień</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Historia zamówień</li>
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
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-smile"></i></span>

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
          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-frown"></i></span>
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
        </div>
        <!-- /.row -->

        

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12"> 
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Historia zamówień:</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID zamówienia</th>
                      <th>Wartość zamówienia</th>
                      <th>Data zamówienia</th>
                      <th>Status zamówienia</th>
                    </tr>
                    </thead>
                    <tbody>                    
                    <?php
                    require_once '../../scripts/connect.php';
                    $sql5 = "SELECT z.id_zamowienia, z.wartosc_zamowienia, os.nazwa, z.data_zlozenia FROM `order_list` as z 
                    INNER JOIN order_status as os ON z.status=os.id_status WHERE z.status='5' || z.status='6'";//dodać ilość zamówień
                    $result = $conn->query($sql5);
                    while ($dish = $result->fetch_assoc()){
                    echo<<<ZAM
                    <tr>                      
                      <td>$dish[id_zamowienia]</td>
                      <td>$dish[wartosc_zamowienia] zł</td>
                      <td>$dish[data_zlozenia]</td>
ZAM;
                    switch($dish['nazwa']){
                      case 'zrealizowane':
                        echo '<td><span class="badge badge-success">zrealizowane</span></td></tr>';
                      break;
                      case 'anulowane':
                        echo '<td><span class="badge badge-danger">anulowane</span></td></tr>';
                      break;
                      case 'w przygotowaniu':
                        echo '<td><span class="badge badge-warning">w przygotowaniu</span></td></tr>';
                      break;
                      case 'oczekujące na zatwierdzenie':
                        echo '<td><span class="badge badge-secondary">oczekujące na zatwierdzenie</span></td></tr>';
                      break;
                      case 'zatwierdzone':
                        echo '<td><span class="badge badge-secondary">zatwierdzone</span></td></tr>';
                      break;
                      case 'w drodze':
                        echo '<td><span class="badge badge-info">w drodze</span></td></tr>';
                      break;
                    }
                      
                    

                    }?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="./admin4.php" class="btn btn-sm btn-info float-left">Odśwież</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- Dzisiejsze menu -->
          <!-- /.col -->
          
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
