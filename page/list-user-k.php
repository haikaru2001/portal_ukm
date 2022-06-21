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
                </br><a class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"> Add User</a>
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
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include_once('class/class.Role.php');
                    include_once('class/class.Ukm.php');
                    include_once('class/class.User.php');
                    $objRole = new Role();
                    $objUkm = new Ukm();
                    $objUser = new User();
                    $thisrole = $_SESSION['id_role'];
                    $thisukm = $_SESSION['id_ukm'];
                    $listUser = $objUser->SelectAllUserByUkm($thisukm);
                    $listukm = $objUkm->SelectAllukm();
                    $listrole = $objRole->SelectRole($thisrole);
                    
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
                        ?>
                          <td><a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalPromote<?php echo $id; ?>"><i class="fas fa-edit"></i> Promote</a></td>
                        <?php
                        
                        ?>

                        <!-- Modal Promote -->
                        <div class="modal fade" id="ModalPromote<?php echo $id; ?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Update Data User</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form role="form" method="get" action="page/crud-user.php">
                                <input type="text" name="nim" class="form-control" value="<?php echo $dataUser->id; ?>" hidden>
                                <div class="form-group">
                                    <label>Nama User</label>
                                    <input type="text" name="nama_user" class="form-control" value="<?php echo $dataUser->name; ?>" placeholder="Nama Lengkap" disabled>      
                                  </div>

                                  <div class="form-group">
                                    <label>Role</label>
                                    <select name="role" class="form-control">
                                      <?php
                                      foreach ($listrole as $dataRole) {
                                        echo '<option value='.$dataRole->id.'>'.$dataRole->role.'</option>';
                                      }
                                      ?>
                                    </select>    
                                  </div>
                              </div>
                              <div class="modal-footer">  
                                <a href="dashboard-ketua?page=crud-user.php"> <button type="submit" class="btn btn-success" name="promote">Promote</button></a>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                                </form>
                            </div>
                          </div>
                        </div>

                        <?php
                        $no++;	
                      }
                    }
                    
                    //Update UKM
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



