<!doctype html>
    <html lang="en">
    
    <div id="flash" data-flash="<?=$this->session->flashdata('flash');?>">
    </div>

    <!-- Main body part  -->
    <div id="main-content">
        <div class="container-fluid">
            <!-- Page header section  -->



        </div>

        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h1>Data Penerima Bantuan</h1>

                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
                    <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">

                        <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                            <p class="text-muted mb-1">Total</p>
                            <?php
                            $jumlahprm = 0;
                            foreach($penerima as $prm) {
                                $jumlahprm ++;
                            }

                            ?>
                            <h5 class="mb-0"><?php echo $jumlahprm; ?></h5>


                        </div>
                        <div class="mb-3 mb-xl-0">
                            <a data-toggle="modal" style="border-radius: 8px;" data-target="#Tambah" class="btn btn-primary">Tambah Data</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <div class="card">
                    <div class="body">
                        <form>
                            <div class="col-12 text-lg-right">
                                <div>

                                </div>
                            </div>
                        </form>
                    </div>



                    <div class="table-responsive container-fluid mb-3">
                        <table  class="table table-bordered table-hover js-basic-example dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr class="table-active"> 
                                    <th><strong>No</strong></th>
                                    <th><strong>Nik</strong></th>
                                    <th><strong>Nama</strong></th>
                                    <th><strong>Alamat</strong></th>
                                    <th><strong>Angkatan</strong></th>
                                    <th><strong>Kategori</strong></th>
                                    <th><strong>Status</strong></th>
                                    <th><strong>Aksi</strong></th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php 
                                $no=1;
                                foreach($penerima as $prm) : ?>

                                    <tr>
                                        <th><?php echo $no++ ?></th>
                                        <td><?php echo $prm['nik'] ?></td>
                                        <td><?php echo $prm['nama'] ?></td>
                                        <td><?php echo $prm['alamat'] ?></td>
                                        <td><?php echo $prm['angkatan'] ?></td>
                                        <td><?php echo $prm['kategori'] ?></td>
                                        <td>
                                            <?php if($prm['status_bantuan'] == 'aktif') { ?>
                                                <span class="badge badge-success"><?php echo $prm['status_bantuan'] ?></span>
                                            <?php } else { ?>
                                                <span class="badge badge-warning"><?php echo $prm['status_bantuan'] ?></span>
                                            <?php } ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary btn-sm" title="Edit" data-toggle="modal" data-target="#Edit<?php echo $prm['id_penerima_bantuan']; ?>"><i class="fa fa-pencil"></i></button>

                                            <button type="button" id="btn-hapus" class="btn btn-danger btn-sm" title="Delete" href="<?php echo base_url().'SuperAdmin/hapus_Penerima/'.$prm['id_penerima_bantuan']; ?>" ><i class="fa fa-trash-o"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>


        <!-- Modal Tambah-->
        <div class="modal fade" id="Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penerima Bantuan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(). 'SuperAdmin/tambah_Penerima';
                    ?>" method="post" enctype="multipart/form-data" >


                    <div class="form-group">
                        <label>Nik</label>
                        <input type="text" class="form-control" name="nik" required>
                    </div>
                    <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <input type="text" class="form-control" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label>Angkatan</label>
                        <input type="text" class="form-control" name="angkatan" required>
                    </div>


                    <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control" name="kategori" required>
                            <option ></option>
                            <option value="Pendidikan">Pendidikan</option>
                            <option value="Kesehatan">Kesehatan</option>
                            <option value="Kesejahteraan Sosial">Kesejahteraan Sosial</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select class="form-control" name="status_bantuan" required>
                            <option ></option>
                            <option value="aktif">Aktif</option>
                            <option value="tidak">Tidak</option>

                        </select>
                    </div>


                    <div class="modal-footer">
                        <button type="reset" class="btn btn-dark" >Close</button>
                        <button type="submit" id="flash" class="btn btn-primary">Simpan</button>
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
<!-- Akhir Modal Tambah -->
<!-- Modal Edit-->
<?php 
foreach($penerima as $prm) : ?>
    <div class="modal fade" id="Edit<?php echo $prm['id_penerima_bantuan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Penerima Bantuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(). 'SuperAdmin/edit_Penerima/'.$prm['id_penerima_bantuan'];
                ?>" method="post" enctype="multipart/form-data" >


                <div class="form-group">
                    <label>Nik</label>
                    <input type="text" class="form-control" value="<?php echo $prm['nik'];?>" name="nik" required>
                </div>
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" class="form-control" value="<?php echo $prm['nama']; ?>" name="nama" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" value="<?php echo $prm['alamat']; ?>" name="alamat" required>
                </div>
                <div class="form-group">
                    <label>Angkatan</label>
                    <input type="text" class="form-control"value="<?php echo $prm['angkatan']; ?>" value="<?php echo $prm['nama']; ?>" name="angkatan" required>
                </div>
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori" required>
                        <option ><?php echo $prm['kategori']; ?></option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Kesehatan">Kesehatan</option>
                        <option value="Kesejahteraan Sosial">Kesejahteraan Sosial</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Status</label>
                    <select class="form-control" name="status_bantuan" required>
                        <option ><?php echo $prm['status_bantuan']; ?></option>
                        <option value="aktif">Aktif</option>
                        <option value="tidak">Tidak</option>
                    </select>
                </div>


                <div class="modal-footer">
                    <button type="reset" class="btn btn-dark" >Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>

    </div>
</div>
</div>
<?php endforeach; ?>

<script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.select2').select2();
    });</script>




</body>
</html>
