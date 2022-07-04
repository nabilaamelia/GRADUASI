<!doctype html>
    <html lang="en">

    <div id="flash" data-flash="<?=$this->session->flashdata('flash');?>">


        <!-- Main body part  -->
        <div id="main-content">
            <div class="container-fluid">
                <!-- Page header section  -->
                <div class="block-header">
                    <div class="row clearfix">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <h1>Personal Detail</h1>

                        </div>



                    </div>
                </div>


                <!-- Bismillah -->
                <div class="row clearfix  ">
                    <div class=" col-md-12 ">
                        <div class="card profile-header">
                            <div class="body text-center">
                                <img src="<?php echo base_url() ?>uploads/<?= $profil['foto'];?>" class="rounded-circle" style="width: 15rem;" alt="">
                                <div class="mt-3">
                                    <h5 class="mb-0"><strong><?php echo $profil['nama']; ?></strong></h5>
                                    <span><?php echo $profil['level']; ?></span>
                                </div>
                                <div class="m-t-15">
                                    <button type="button" data-toggle="modal" data-target="#Edit<?php echo $this->session->userdata('id_petugas'); ?> " style="border-radius: 8px;" class="btn btn-primary mr-3">Edit Profil</button>
                                    <button type="button" data-toggle="modal" data-target="#UbahPass<?php echo $this->session->userdata('id_petugas'); ?> " style="border-radius: 8px;" class="btn btn-dark">Ubah Password</button>
                                </div>


                            </div>
                            <div class="col-12 row">
                                <div class="col-xl-3 col-lg-2 col-md-2">

                                </div>
                                <div class="col-xl-6 col-lg-8 col-md-8 col-sm-8  ">
                                    <div class="card social   ">
                                        <div class="body">
                                            <small class="text-muted">Username: </small>
                                            <p><?php echo $profil['username']; ?></p>
                                            <hr>
                                            <small class="text-muted">No Hp: </small>
                                            <p><?php echo $profil['nohp']; ?></p>
                                            <hr>
                                            <small class="text-muted">Alamat: </small>
                                            <p><?php echo $profil['alamat']; ?></p>
                                            <hr>

                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                            
                        </div>
                    </div>
                </div>

            </body>

            <!-- Modal Edit-->

            <div class="modal fade" id="Edit<?php echo $this->session->userdata('id_petugas'); ?>"
                tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"
                            id="exampleModalLabel">Edit Profile</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                        <div class="modal-body">
                            <form action="<?php echo base_url(). 'SuperAdmin/EditProfil' ?>" method="post" enctype="multipart/form-data">  

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" class="form-control" value="<?php echo $profil['nama']; ?>" name="nama" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" class="form-control" value="<?php echo $profil['alamat'];?>" name="alamat" required>
                                </div>
                                <div class="form-group">
                                    <label>No Hp</label>
                                    <input type="text" class="form-control" value="<?php echo $profil['nohp']; ?>" name="nohp" required>
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text"class="form-control" value="<?php echo $profil['username']; ?>" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" class="form-control" name="foto">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" style="border-radius: 8px;" class="btn btn-dark" data-dismiss="modal">Close</button>
                                    <button type="submit" style="border-radius: 8px;" class="btn btn-primary">Simpan</button>
                                </div>

                            </form>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Akhir Modal Edit -->

            <!-- Modal Ubah Password -->
            <div class="modal fade" id="UbahPass<?php echo $this->session->userdata('id_petugas'); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ubah Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(). 'SuperAdmin/UbahPass' ?>" method="post" enctype="multipart/form-data">  
                        <div class="form-group">
                            <label>Password Lama</label>
                            <input type="password" class="form-control" name="password_lama" required>
                        </div>
                        <div class="form-group">
                            <label>Password Baru</label>
                            <input type="password" class="form-control" name="password_baru" required>
                        </div>
                        <div class="form-group">
                            <label>Konfirmasi Password Baru</label>
                            <input type="password" class="form-control" name="konfirmasi" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" style="border-radius: 8px;" class="btn btn-dark" data-dismiss="modal">Close</button>
                            <button type="submit" style="border-radius: 8px;" class="btn btn-primary">Simpan</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>



    </html>
