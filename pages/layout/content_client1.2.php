<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Złóż zamówienie 2/3</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Złóż zamówienie 2/3</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
      
          <form>
      
                    <?php
                    require_once '../../scripts/connect.php';
                    $sql5 = "SELECT m.id_potrawy, m.cena, dl.nazwa_potrawy, dl.opis_potrawy, e.opis_etykiety FROM `menu` as m 
                    INNER JOIN dish_list as dl ON m.id_potrawy=dl.id_potrawy
                    INNER JOIN etykiety as e ON e.id_etykiety=m.id_etykiety
                    WHERE m.data=CURDATE()";//zamówienia z dzisiaj
                    $result = $conn->query($sql5);
                    while ($dish = $result->fetch_assoc()){
                    echo<<<DISH
            <div class="row">
              <div class="col-md-6">
            <div class="card card-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-success">
                <h3 class="widget-user-username">$dish[nazwa_potrawy]</h3></br>
                <h5 class="widget-user-desc">$dish[opis_potrawy]</h5>
              </div>
              
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <div class="form-check">
                          <input type="checkbox" class="form-check-input" name="$dish[id_potrawy]num">
                          <label class="form-check-label">Zamawiam</label>
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <div class="form-group">
                        <input type="number" placeholder="Ilość" class="form-control min="0"/>
                      </div>
                    </div>
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">$dish[cena] zł / porcja</h5>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          </div>
          <br/>
DISH;
                    }?>                   
      <button type="submit" class="btn btn-primary">Dodaj produkty do zamówienia</button>          
      </form>
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
