<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Złóż zamówienie</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Złóż zamówienie</li>
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
                    require_once '../../scripts/connect.php';
                    $sql1 = sprintf("SELECT street_name, street_num, flat_num FROM `user` where email='%s'",
                    mysqli_real_escape_string($conn, $_SESSION['logged']['email']));
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
        <div class="row">
          <div class="col-md-6">
            <div class="card card-secondary">
              <div class="card-header">
                <h3 class="card-title">Adres dostawy</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="../scripts/add_order.php" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Nazwa ulicy:</label>
                    <input type="text" class="form-control" placeholder="Nazwa ulicy" value="$user[street_name]">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Numer domu</label>
                    <input type="text" class="form-control" placeholder="Numer domu" value="$user[street_num]">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Numer lokalu</label>
                    <input type="text" class="form-control" placeholder="Numer lokalu" value="$user[flat_num]">
                  </div>
                </div>
                <div class="col-sm-6">
                      <div class="form-group">
                        <div class="custom-control custom-checkbox">
                          <input class="custom-control-input" type="checkbox" id="customCheckbox1" value="option1">
                          <label for="customCheckbox1" class="custom-control-label">Custom Checkbox</label>                          
                        </div>
                        <input type="text" class="form-control" placeholder="Numer lokalu" value="$user[flat_num]">
                      </div>
                      <div class="form-group">                      
                      
                      </div>
                </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Rozpocznij składanie zamówienia</button>
            </div>
            </form>
            </div>
          </div>
        </div>
USERS;
          echo<<<DISH
                    
                    
                    
DISH;          

                    }?>                    
                

      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
