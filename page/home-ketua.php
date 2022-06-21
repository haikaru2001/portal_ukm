<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-4">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="row">
          <div class="col-4">
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title"><i class="nav-icon fas fa-users"></i>  Users</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <?php
            $objUser = new User();
            $objUser->SelectUserByNim($_SESSION['userid']);
            $totalUser = count($objUser->SelectAllUserByUkm($_SESSION['id_ukm']));
            ?>
            <div class="card-body">
              
            Total Anggota UKM : <?=$totalUser?><br><br>
            <a href="dashboard-ketua.php?page=list-user-k"><button class="btn btn-default"><i class="nav-icon fas fa-bars"></i> See-Detail </button></a><br>
              
              
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
          </div>

          <div class="col-4">
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title"><i class="nav-icon fas fa-users"></i> Terdaftar di UKM</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            <h4><?=$objUser->ukm?></h4>
            <br>
            <a href="dashboard-ketua.php?page=detail-ukm"><button class="btn btn-default"><i class="nav-icon fas fa-bars"></i> See-Detail </button></a><br>
              
              
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
          </div>

         
        </div>
      </div><!-- /.container-fluid -->
    </div>
</div>