<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Złóż zamówienie 3/3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Złóż zamówienie 3/3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
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
                      <th>Ilość</th>
                      <th>Wartość</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $uid = $_SESSION['logged']['user_id'];
                    require_once '../../scripts/connect.php';
                    $sql = "SELECT od.id_zamowienia, dl.nazwa_potrawy, od.ilosc, od.wartosc FROM ordered_dish as od INNER JOIN order_list as ol ON od.id_zamowienia=ol.id_zamowienia INNER JOIN menu as m ON od.id_menu=m.id_menu INNER JOIN dish_list as dl ON m.id_potrawy=dl.id_potrawy WHERE ol.id_uzytkownika='$uid' AND ol.status=1";//dodać ilość zamówień
                    $result = $conn->query($sql);
                    while ($dish = $result->fetch_assoc()){
                    
                    echo<<<ZAM
                    <tr>                      
                      <td>$dish[id_zamowienia]</td>
                      <td>$dish[nazwa_potrawy]</td>
                      <td>$dish[ilosc]</td>
                      <td>$dish[wartosc] zł</td>
                      
ZAM;
                    echo '</tr>';
                    
                    $id_zam = $dish['id_zamowienia'];
                    }
                    echo<<<PODSUMOWANIE
                    
PODSUMOWANIE;
                    ?>
                    <form action="../../scripts/add_order_status.php" method="POST">                
                <?php
                $sql1 = "SELECT ol.id_zamowienia,ol.street_name, ol.street_num, ol.flat_num,SUM(od.wartosc) as sum FROM ordered_dish as od INNER JOIN order_list as ol ON od.id_zamowienia=ol.id_zamowienia INNER JOIN menu as m ON od.id_menu=m.id_menu INNER JOIN dish_list as dl ON m.id_potrawy=dl.id_potrawy WHERE ol.id_uzytkownika='$uid' AND ol.status=1"; 
                $result1 = $conn->query($sql1);
                    while ($sum = $result1->fetch_assoc()){
                    echo<<<SUM
                    <tr>
                    <td>Adres:</td>
                    <td><span class="badge badge-info">$sum[street_name] $sum[street_num] $sum[flat_num]</span></td>
                    <td>Razem:</td>
                    <td><span class="badge badge-info">$sum[sum] zł</span></td>
                    <input type="hidden" name="wartosc" value="$sum[sum]">
                    <input type="hidden" name="id_zamowienia" value="$sum[id_zamowienia]">
                    </tr>
SUM;                    
                    }
                ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">                
                <button type="submit" class="btn btn-success float-right">Zatwierdź zamówienie</button>
                </form>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->


          
        </div>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
