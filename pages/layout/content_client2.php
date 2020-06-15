<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Moje zamówienia</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Moje zamówienia</li>
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
               
        <div class="col-md-12"> 
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Moje zamówienia</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
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
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>ID zamówienia</th>
                      <th>Wartość zamówienia</th>
                      <th>Data złożenia</th>
                      <th>Status zamówienia</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    require_once '../../scripts/connect.php';
                    $sql5 = sprintf("SELECT z.id_zamowienia, z.wartosc_zamowienia, os.nazwa, z.data_zlozenia FROM `order_list` as z 
                    INNER JOIN order_status as os ON z.status=os.id_status WHERE z.id_uzytkownika='%s'",
                    mysqli_real_escape_string($conn, $_SESSION['logged']['user_id'])) ;//dodać ilość zamówień
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
                <a href="./client2.php" class="btn btn-sm btn-info float-left">Odśwież</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
        <!-- /.row -->

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
