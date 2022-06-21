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
                    <th>No</th>
                    <th>UKM</th>
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
                    $objUkm = new Ukm();
                    $objUser = new User();
                    $bc = new Broadcast();
                    $arrayResult = $bc->getAllBroadcast();
                    
                    if(count($arrayResult) == 0){
                      echo '<tr><td colspan="11">Belum ada pesan!</td></tr>';			
                    }else{	
                      $no = 1;	
                      foreach ($arrayResult as $bcObj) {
                        $id = $bcObj->id;
                        $status='';
                        $penerima='';
                        if($bcObj->status == 'p'){
                          $status = '<button class="btn btn-warning"><i class="fas fa-clock"></i> Pending</button>';
                        }
                        else if($bcObj->status == 'r'){
                          $status = '<button class="btn btn-danger"><i class="fas fa-ban"></i> Rejected</button>';
                        }
                        else if($bcObj->status == 'a'){
                          $status = '<button class="btn btn-success"><i class="fas fa-check"></i> Approved</button>';
                        }

                        if($bcObj->penerima == 'a'){
                          $penerima = "Semua Anggota UKM ".$bcObj->ukm;
                        }
                        else if($bcObj->penerima == 'b'){
                          $penerima = "Hanya Bendahara UKM ".$bcObj->ukm;
                        }
                        else if($bcObj->penerima == 'k'){
                          $penerima = "Hanya Anggota UKM ".$bcObj->ukm;
                        }
                        echo '<tr>';
                          echo '<td>'.$no.'</td>';	
                          echo '<td>'.$bcObj->ukm.'</td>';	
                          echo '<td>'.$bcObj->namapengirim.'</td>';
                          echo '<td>'.$bcObj->judul.'</td>';
                          echo '<td>'.$bcObj->isi.'</td>';
                          echo '<td>'.$status.'</td>';
                          echo '<td>'.$penerima.'</td>';
                          echo '<td>'.$bcObj->date.'</td>';
                          
                        ?>
                          <td><a data-toggle="modal" data-target="#ModalAction<?= $bcObj->id; ?>" class="btn btn-info btn-sm"><i class="fas fa-cog"></i> Set Action </a></td>
                        
                        <?php
                          echo '<td>'.$bcObj->reason.'</td>';
                        ?>
                        </tr>
                        <!-- Modal Edit UKM-->
                        <div class="modal fade" id="ModalAction<?=$bcObj->id; ?>" role="dialog">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 class="modal-title">Set Action</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                              </div>
                              <div class="modal-body">
                                <form role="form" action="page/crud-bc.php" method="post">
                                  <input type="hidden" name="id_bc" value="<?php echo $bcObj->id; ?>">
                                  <div class="form-group">
                                    <label>Action</label>
                                    <select name = "action" class="form-control">
                                      <option value="a">
                                        Approve
                                      </option>
                                      <option value="r">
                                        Reject
                                      </option>
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label>Alasan</label>
                                    <input type="text" name="alasan" class="form-control" placeholder="Alasan kenapa dilakukan action ini">
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



