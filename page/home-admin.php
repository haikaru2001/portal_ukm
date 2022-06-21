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
            $totalUser = count($objUser->SelectAllUser());
            ?>
            <div class="card-body">
              
            user terdaftar : <?=$totalUser?><br><br>
            <a href="dashboard-admin.php?page=list-user"><button class="btn btn-default"><i class="nav-icon fas fa-bars"></i> See-Detail </button></a><br>
              
              
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
          </div>

          <div class="col-4">
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title"><i class="nav-icon fas fa-users"></i>  UKM</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <?php
            include('class/class.Ukm.php');
            include('class/class.Role.php');
            $objUkm = new Ukm();
            $totalUkm = count($objUkm->SelectAllukm());
            ?>
            <div class="card-body">
            Ukm terdaftar : <?=$totalUkm?><br><br>
            <a href="dashboard-admin.php?page=list-ukm"><button class="btn btn-default"><i class="nav-icon fas fa-bars"></i> See-Detail </button></a><br>
              
              
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
          </div>

          <div class="col-4">
          <div class="card card-dark">
            <div class="card-header">
              <h3 class="card-title"><i class="nav-icon fas fa-users"></i>  Role</h3>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <?php
            $objRole = new Role();
            $totalRole = count($objRole->SelectAllRole());
            ?>
            <div class="card-body">
            Role terdaftar : <?=$totalRole?><br><br>
            <a href="dashboard-admin.php?page=list-role"><button class="btn btn-default"><i class="nav-icon fas fa-bars"></i> See-Detail </button></a><br>
              
              
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer -->
          </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
</div>