<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>UKM</th>
                    <th>NIM</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>No Telepon</th>
                    <th>Role</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 

                    include_once('class/class.User.php');
                    $objUser = new User();
                    $thisukm = $_SESSION['id_ukm'];
                    $listUser = $objUser->SelectAllUserByUkm($thisukm);

                    if(count($listUser) == 0){
                      echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
                    }else{	
                      $no = 1;
                      $status='';
                      foreach ($listUser as $dataUser) {
                        if($dataUser->status == 0)
                          $status = 'Offline';
                        else
                          $status = 'Online';

                        $id = $dataUser->id;
                        echo '<tr>';
                          echo '<td>'.$no.'</td>';
                          echo '<td>'.$dataUser->ukm.'</td>';	
                          echo '<td>'.$id.'</td>';
                          echo '<td>'.$dataUser->name.'</td>';
                          echo '<td>'.$dataUser->email.'</td>';
                          echo '<td>'.$dataUser->sex.'</td>';
                          echo '<td>'.$dataUser->notelp.'</td>';	
                          echo '<td>'.$dataUser->role.'</td>';
                          echo '<td>'.$status.'</td>';
                        echo '</tr>';
                        $no++;	
                      }
                    }
                    ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

            <!-- /.card -->
            </div>
          </div>
        </div>
      </div>
    </section>
</div>



