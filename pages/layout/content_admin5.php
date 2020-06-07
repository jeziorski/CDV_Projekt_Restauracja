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
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Aktywni:</span>
                <span class="info-box-number"></span><!-- DANE Z BAZY -->
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
      
        
          
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Nieaktywni:</span>
                <span class="info-box-number"></span><!-- DANE Z BAZY -->
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
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>
              <div class="info-box-content">
                <span class="info-box-text">Zablokowani:</span>
                <span class="info-box-number"></span><!-- DANE Z BAZY -->
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
                    echo '<td>Brak logowania</td></tr>';
                    }else{
                    echo <<<USERS
                    <td>$user[last_login]</td></tr>
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
