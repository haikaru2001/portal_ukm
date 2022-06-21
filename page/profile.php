<div class="content-wrapper" style="min-height: 1302.12px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Profile</li>
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
              <div class="card-header py-5">
                  <?php

                  $objUser = new User();
                  if($_SESSION['id_role'] == 1){
                    $objUser->SelectAdmin($_SESSION["userid"]);
                  }
                  else{
                  $objUser->SelectUserByNim($_SESSION["userid"]);
                  }

                  $foto='';
                  $icon='';
                  $gender='';
                  if($objUser->foto != null)
                    $foto = $objUser->foto;
                  else if($objUser->sex == 'L'){
                    $foto = 'avatar5.png';
                    
                  }
                  else if($objUser->sex == 'P'){
                    $foto = 'avatar2.png';
                  }

                  if($objUser->sex == 'L'){
                    $icon='fas fa-male';
                    $gender = 'Laki-Laki';
                  }
                  else if($objUser->sex == 'P'){
                    $icon='fas fa-female';
                    $gender = 'Perempuan';
                  }
                  ?>
                  <center>
                  <img class="img img-bordered img-circle" width="300px" height="300px" src="dist/img/<?=$foto?>">
                  <h3 class="mt-4"><?=$objUser->name?></h3>
                  <p><?=$objUser->bio?></p>
                  
                  <br>
                  <table class="table">
                    <tr>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?=$objUser->id?>" disabled>
                            </div>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?=$objUser->notelp?>" disabled>
                            </div>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Role</i></span>
                            </div>
                            <input type="text" class="form-control" value="<?=$objUser->role?>" disabled>
                        </div>
                        </td>
                        <td>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="<?=$icon?>"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?=$gender?>" disabled>
                            </div>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                </div>
                                <input type="text" class="form-control" value="<?=$objUser->email?>" disabled>
                            </div>
                            <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">UKM</i></span>
                            </div>
                            <input type="text" class="form-control" value="<?=$objUser->ukm?>" disabled>
                        </div>
                        </td>
                      </tr>

                      <tr>
                        <td>
                        <a class="btn btn-primary" data-toggle="modal" data-target="#ModalEdit"><i class="fas fa-user-edit"></i> Edit Profile</a>
                        </td>
                        <td>
                        <a class="btn btn-warning" data-toggle="modal" data-target="#ModalEditPassword"><i class="fas fa-key"></i> Change Password</a>
                        </td>
                        <td>
                        
                        </td>
                      </tr>
                  </table>
                  </center>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    

    <!-- Modal -->
    <div class="modal fade" id="ModalEditPassword" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Ganti Password</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="page/crud-user.php">
                    <input type="hidden" name="role" class="form-control" value="<?=$objUser->id_role?>">
                    <input type="hidden" name="nim" class="form-control" value="<?=$objUser->id?>">
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" name="pass" class="form-control" placeholder="Password" required>      
                    </div> 
                    <div class="form-group">
                        <label>Retype Password</label>
                        <input type="password" name="re_pass" class="form-control" placeholder="Retype Password" required>      
                    </div>
                </div>
                <div class="modal-footer">  
                    <button type="submit" class="btn btn-success" name="changePassword">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>



    <div class="modal fade" id="ModalEdit" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Profile</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form role="form" method="post" action="page/crud-user.php" enctype="multipart/form-data">
                    <input type="hidden" name="nim" class="form-control" value="<?=$objUser->id?>">
                    <input type="hidden" name="role" class="form-control" value="<?=$objUser->id_role?>">
                    <input type="hidden" name="ukm" class="form-control" value="<?=$objUser->id_ukm?>">
                    
                    <div class="form-group">
                        <label>Foto</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="foto">
                          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>
                        <p style="color: red">Ekstensi yang diperbolehkan .png | .jpg | .jpeg</p>      
                    </div>
                    <div class="form-group">
                        <label>Bio</label>
                        <textarea class="form-control" name="bio"><?=$objUser->bio?></textarea>     
                    </div>
                    <div class="form-group">
                        <label>Nama User</label>
                        <input type="text" name="nama_user" class="form-control" value="<?=$objUser->name?>" placeholder="Nama Lengkap">      
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?=$objUser->email?>" placeholder="Email">      
                    </div>
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" class="form-control">
                            <option value="L"><i class="fas fa-male"></i> Laki-Laki</option>
                            <option value="P"><i class="fas fa-female"></i> Perempuan</option>
                        </select>    
                    </div>
                    <div class="form-group">
                        <label>No Telp</label>
                        <input type="text" name="notelp" class="form-control" value="<?=$objUser->notelp?>">      
                    </div>
                    
                </div>
                <div class="modal-footer">  
                    <button type="submit" class="btn btn-success" name="edit-profile">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>