<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Role</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar Role</li>
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
                </br><a class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"> Add Role</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama Role</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include_once('class/class.Role.php');
                    include_once('class/class.User.php');
                    $objRole = new Role();
                    $objUser = new User();
                    $arrayResult = $objRole->SelectAllRole();
                    
                    if(count($arrayResult) == 0){
                      echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
                    }else{	
                      $no = 1;	
                      foreach ($arrayResult as $dataRole) {
                        $id = $dataRole->id;
                        echo '<tr>';
                          echo '<td>'.$id.'</td>';	
                          echo '<td>'.$dataRole->role.'</td>';
                        ?>
                          <td><a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEdit<?php echo $dataRole->id; ?>">Edit</a> | <a class="btn btn-danger btn-sm" href="dashboard-admin.php?page=delete-role&id_role=<?php echo $id;?>" name="delete" onclick="return confirm('Apakah anda yakin ingin menghapus?')">Delete</a></td>
                        </tr>

                        <!-- Modal Edit role-->
                        <div class="modal fade" id="ModalEdit<?php echo $dataRole->id; ?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Update Data role</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form role="form" action="page/crud-role.php" method="get">
                                  <input type="hidden" name="id_role" value="<?php echo $dataRole->id; ?>">
                                  <div class="form-group">
                                    <label>Nama role</label>
                                    <input type="text" name="nama_role" class="form-control" value="<?php echo $dataRole->role; ?>">      
                                  </div>
                              </div>
                              <div class="modal-footer">  
                                <a href="dashboard-admin?page=crud-role.php"> <button type="submit" class="btn btn-success" name="update">Update</button></a>
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
                    //Update role
                    ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->

              <!-- Modal tambah role-->
              <div class="modal fade" id="ModalAdd" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data Role</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="page/crud-role.php" method="get">
                    <input type="hidden" name="id_ukm">
                      <div class="form-group">
                        <label>Nama Role</label>
                        <input type="text" name="nama_role" class="form-control" placeholder="Nama role">
                      </div>
                    </div>
                    <div class="modal-footer">  
                      <a href="dashboard-admin?page=crud-role.php"> <button type="submit" class="btn btn-success" name="add">Tambah Role</button></a>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                                </form>
                            </div>
                          </div>
                        </div>
              
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </section>
</div>



