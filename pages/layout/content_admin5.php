<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Administrator - Użytkownicy</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Użytkownicy</li>
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
                <span class="info-box-text">Aktywni:</span>
                <span class="info-box-number">
                <?php 
                    require_once '../../scripts/connect.php';
                    $sql1 = "SELECT COUNT(*) as total FROM `user` WHERE status_id='1'";
                    $result1 = $conn->query($sql1);
                    while ($user = $result1->fetch_assoc()){
                    echo<<<USERS
                    <b>$user[total]</b>
USERS;           
                    }?>
                </span><!-- DANE Z BAZY -->
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
      
        
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-minus-circle"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Nieaktywni:</span>
                <span class="info-box-number">
                <?php 
                    require_once '../../scripts/connect.php';
                    $sql2 = "SELECT COUNT(*) as total FROM `user` WHERE status_id='2'";
                    $result2 = $conn->query($sql2);
                    while ($user = $result2->fetch_assoc()){
                    echo<<<USERS
                    <b>$user[total]</b>
USERS;           
                    }?>
                </span><!-- DANE Z BAZY -->
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
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-exclamation-circle"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Zablokowani:</span>
                <span class="info-box-number">
                <?php 
                    require_once '../../scripts/connect.php';
                    $sql3 = "SELECT COUNT(*) as total FROM `user` WHERE status_id='3'";
                    $result3 = $conn->query($sql3);
                    while ($user = $result3->fetch_assoc()){
                    echo<<<USERS
                    <b>$user[total]</b>
USERS;           
                    }?>
                </span><!-- DANE Z BAZY -->
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>                   
        </div>
        <!-- /.row -->

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
            <div class="card">
            <form action="../../scripts/change_status_permission.php" method="POST">
              <table class="table m-0">
                  <thead>
                    <tr>
                      <th>Mail użytkownika</th>
                      <th>Uprawnienia</th>
                      <th>Status</th>                      
                      <th>Zatwierdź</th>                      
                    </tr>
                  </thead>
                <tbody>
                  <tr>
                    <td>
                        <select class="form-control" name="email">
                        <option></option>
                        <?php
                        require_once '../../scripts/connect.php';
                        $sql = sprintf("SELECT * FROM user WHERE email NOT LIKE '%s'",
                        mysqli_real_escape_string($conn, $_SESSION['logged']['email']));
                        $result = $conn->query($sql);
                        while ($user = $result->fetch_assoc()){
                        echo<<<CITY
                        <option value="$user[id]">$user[email]</option>
CITY;
                        }              
                        ?>
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="permission">
                        <option></option>
                        <?php
                        require_once '../../scripts/connect.php';
                        $sql = "SELECT * FROM permission";
                        $result = $conn->query($sql);
                        while ($perm = $result->fetch_assoc()){
                        echo<<<CITY
                        <option value="$perm[id]">$perm[permission]</option>
CITY;
                        }              
                        ?>
                        </select>
                    </td>                    
                    <td>
                        <select class="form-control" name="status">
                        <option></option>
                        <?php
                        require_once '../../scripts/connect.php';
                        $sql = "SELECT * FROM status";
                        $result = $conn->query($sql);
                        while ($st = $result->fetch_assoc()){
                        echo<<<CITY
                        <option value="$st[id]">$st[status]</option>
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
          <!-- Left col -->
          <div class="col-md-12"> 
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Użytkownicy</h3>

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
                      <th>ID</th>
                      <th>E-mail</th>
                      <th>Uprawnienia</th>
                      <th>Status</th>
                      <th>Ostatnie logowanie</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php 
                    require_once '../../scripts/connect.php';
                    $sql5 = "SELECT u.id, u.email, p.permission, s.status, u.last_login FROM `user` as u 
                    INNER JOIN permission as p ON u.permission_id=p.id 
                    INNER JOIN status as s ON u.status_id=s.id";
                    $result = $conn->query($sql5);
                    while ($user = $result->fetch_assoc()){
                    echo<<<USERS
                    <tr>                      
                      <td>$user[id]</td>
                      <td>$user[email]</td>
USERS;
                    switch($user['permission']){
                      case 'administrator':
                        echo '<td><span class="badge badge-info">administrator</span></td>';
                      break;
                      case 'user':
                        echo '<td><span class="badge badge-secondary">user</span></td>';
                      break;
                      case 'pracownik':
                        echo '<td><span class="badge badge-success">pracownik</span></td>';
                      break;
                    }
                    switch($user['status']){
                      case 'aktywny':
                        echo '<td><span class="badge badge-success">aktywny</span></td>';
                      break;
                      case 'nieaktywny':
                        echo '<td><span class="badge badge-warning">nieaktywny</span></td>';
                      break;
                      case 'zablokowany':
                        echo '<td><span class="badge badge-danger">zablokowany</span></td>';
                      break;
                    }
                    if($user['last_login'] == NULL){
                    echo '<td>Brak logowania</td>
                    ';
                    }else{
                    echo <<<USERS
                    <td>$user[last_login]</td>
USERS;                   
                    }
                    
}
                    ?>
                                        
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.card-body -->
            <!-- /.card -->
          </div>
          <!-- Dzisiejsze menu -->
          


          
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
