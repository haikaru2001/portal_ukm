<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Send Broadcast Mail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Broadcast</li>
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
                </br><a class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd"> Send New Messege</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>ID_BC</th>
                    <th>pengirim</th>
                    <th>judul</th>
                    <th>isi</th>
                    <th>status</th>
                    <th>penerima</th>
                    <th>date</th>
                    <th>action</th>
                    <th>action reason</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                    include_once('class/class.Ukm.php');
                    include_once('class/class.User.php');
                    include_once('class/class.Broadcast.php');
                    $bc = new Broadcast();
                    $bc->id = $_SESSION['userid'];
                    $arrayResult = $bc->getAllBroadcastMe();
                    
                    if(count($arrayResult) == 0){
                      echo '<tr><td colspan="9">Belum ada pesan!</td></tr>';			
                    }else{	
                      $no = 1;	
                      foreach ($arrayResult as $bcObj) {
                        $id = $bcObj->id;
                        $status='';
                        if($bcObj->status == 'p'){
                          $status = '<button class="btn btn-warning"><i class="fas fa-clock"></i> Pending</button>';
                        }
                        else if($bcObj->status == 'r'){
                          $status = '<button class="btn btn-danger"><i class="fas fa-close"></i> Reject</button>';
                        }
                        else if($bcObj->status == 'a'){
                          $status = '<button class="btn btn-success"><i class="fas fa-check"></i> Approved</button>';
                        }
                        echo '<tr>';
                          echo '<td>'.$no.'</td>';
                          echo '<td>'.$id.'</td>';	
                          echo '<td>'.$bcObj->namapengirim.'</td>';
                          echo '<td>'.$bcObj->judul.'</td>';
                          echo '<td>'.$bcObj->isi.'</td>';
                          echo '<td>'.$status.'</td>';
                          echo '<td>'.$bcObj->penerima.'</td>';
                          echo '<td>'.$bcObj->date.'</td>';
                          
                        ?>
                          <td><a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#ModalEdit<?php echo $bcObj->id; ?>"><i class="fas fa-edit"></i> Edit</a> | <a class="btn btn-danger btn-sm" href="dashboard-ketua.php?page=delete-bc&id_bc=<?php echo $id;?>" name="delete" onclick="return confirm('Apakah anda yakin ingin menghapus?')"><i class="fas fa-trash"></i> Delete</a></td>
                        
                        <?php
                          echo '<td>'.$bcObj->reason.'</td>';
                        ?>
                        </tr>
                        <!-- Modal Edit UKM-->
                        <div class="modal fade" id="ModalEdit<?=$bcObj->id; ?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Set Action</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form role="form" action="page/crud-bc.php" method="post">
                                  <input type="hidden" name="id_bc" value="<?=$bcObj->id; ?>">
                                  <input type="hidden" name="id_ukm" value="<?=$_SESSION['id_ukm']?>">
                                  <input type="hidden" name="pengirim" value="<?=$_SESSION['userid']?>">
                                  <input type="hidden" name="role" value="<?=$_SESSION['id_role']?>">
                                    <div class="form-group">
                                      <label>Judul Pesan</label>
                                      <input type="text" name="judul" class="form-control" value="<?=$bcObj->judul; ?>">
                                    </div>
                                    <div class="form-group">
                                      <label>Isi</label>
                                      <textarea name="isi" class="form-control" placeholder="isi Pesan"><?=$bcObj->isi; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                      <label>Penerima</label>
                                      <select name = "penerima" class="form-control">
                                        <option value="a">
                                          Semua anggota
                                        </option>
                                        <option value="b">
                                          Hanya Bendahara
                                        </option>
                                        <option value="k">
                                          Hanya anggota
                                        </option>
                                      </select>
                                    </div>
                              </div>
                              <div class="modal-footer">  
                                <button type="submit" class="btn btn-success" name="setAction">Update</button>
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

              <!-- Modal tambah Pesan Broadcast-->
              <div class="modal fade" id="ModalAdd" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Tambah Pesan Broadcast</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                    <form role="form" action="page/crud-bc.php" method="post">
                    <input type="hidden" name="id_ukm" value="<?=$_SESSION['id_ukm']?>">
                    <input type="hidden" name="pengirim" value="<?=$_SESSION['userid']?>">
                    <input type="hidden" name="role" value="<?=$_SESSION['id_role']?>">
                      <div class="form-group">
                        <label>Judul Pesan</label>
                        <input type="text" name="judul" class="form-control" placeholder="Judul Pesan">
                      </div>
                      <div class="form-group">
                        <label>Isi</label>
                        <textarea name="isi" class="form-control" placeholder="isi Pesan"></textarea>
                      </div>
                      <div class="form-group">
                        <label>Penerima</label>
                        <select name = "penerima" class="form-control">
                          <option value="a">
                            Semua anggota
                          </option>
                          <option value="b">
                            Hanya Bendahara
                          </option>
                          <option value="k">
                            Hanya anggota
                          </option>
                        </select>
                      </div>
                    </div>
                    <div class="modal-footer">  
                      <a href="dashboard-admin?page=crud-ukm.php"> <button type="submit" class="btn btn-success" name="add">Tambah Pesan Broadcast</button></a>
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



