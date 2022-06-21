<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar UKM</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar UKM</li>
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
                </br><a class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"> Add Ukm</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table1 table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Nama UKM</th>
                    <th>Jumlah user</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include_once('class/class.Ukm.php');
                    include_once('class/class.User.php');
                    $objUkm = new Ukm();
                    $objUser = new User();
                    $arrayResult = $objUkm->SelectAllukm();
                    
                    if(count($arrayResult) == 0){
                      echo '<tr><td colspan="4">Tidak ada data!</td></tr>';			
                    }else{	
                      $no = 1;	
                      foreach ($arrayResult as $dataUkm) {
                        $id = $dataUkm->id;
                        echo '<tr>';
                          echo '<td>'.$id.'</td>';	
                          echo '<td>'.$dataUkm->ukm.'</td>';
                          echo '<td>'.$objUser->countUserByUkm($dataUkm->id).' Orang</td>';
                        ?>
                          <td><a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEdit<?php echo $dataUkm->id; ?>"><i class="fas fa-edit"></i> Edit</a> | <a class="btn btn-danger btn-sm" href="dashboard-admin.php?page=delete-ukm&id_ukm=<?php echo $id;?>" name="delete" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="fas fa-trash"></i> Delete</a></td>
                        </tr>

                        <!-- Modal Edit UKM-->
                        <div class="modal fade" id="ModalEdit<?php echo $dataUkm->id; ?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Update Data UKM</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form role="form" action="page/crud-ukm.php" method="get">
                                  <input type="hidden" name="id_ukm" value="<?php echo $dataUkm->id; ?>">
                                  <div class="form-group">
                                    <label>Nama UKM</label>
                                    <input type="text" name="nama_ukm" class="form-control" value="<?php echo $dataUkm->ukm; ?>">      
                                  </div>
                              </div>
                              <div class="modal-footer">  
                                <a href="dashboard-admin?page=crud-ukm.php"> <button type="submit" class="btn btn-success" name="update">Update</button></a>
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

              <!-- Modal tambah UKM-->
              <div class="modal fade" id="ModalAdd" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Data UKM</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="page/crud-ukm.php" method="get">
                    <input type="hidden" name="id_ukm">
                      <div class="form-group">
                        <label>Nama UKM</label>
                        <input type="text" name="nama_ukm" class="form-control" placeholder="Nama UKM">
                      </div>
                    </div>
                    <div class="modal-footer">  
                      <a href="dashboard-admin?page=crud-ukm.php"> <button type="submit" class="btn btn-success" name="add">Tambah Ukm</button></a>
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



