<!-- Main body part  -->
<div id="main-content">

    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-xl-6 col-md-5 col-sm-12">
                    <h1>Data Petugas</h1>
                </div>
                <div class="col-xl-6 col-md-7 col-sm-12 text-md-right">
                    <div class="d-flex align-items-center justify-content-between flex-wrap vivify pullUp delay-550">
                        <div class="ml-auto mb-3 mb-xl-0">
                            <p class="text-muted mb-1">Last Update</p>
                            <h5 class="mb-0">18 Dec 2019</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <ul class="nav nav-tabs3 page-header-tab">
                    <li class="nav-item"><a class="nav-link active show" data-toggle="tab" href="#Company_Settings"></a>
                    </li>

                </ul>
                <div class="tab-content">

                    <div class="tab-pane tab-pane active show" id="#Company_Settings">
                        <div class="card">
                            <div class="body">

                                <div class="row clearfix">
                                    <div class="col-12">
                                        <div class="body">
                                            <div class="col-12 text-lg-right">
                                                <div>
                                                    <div class="btn-group  ">
                                                        <a data-toggle="modal" data-target="#Tambah" class="btn btn-primary">Tambah Data</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>




                                        <div class="table-responsive">
                                            <table
                                            class="table table-bordered table-hover js-basic-example dataTable"
                                            width="100%" cellspacing="0">
                                            <thead>
                                                <tr class="table-active text-center">
                                                    <th><strong>No</strong></th>
                                                    <th><strong>Nama</strong></th>
                                                    <th><strong>Alamat</strong></th>
                                                    <th><strong>No Hp</strong></th>
                                                    <th><strong>Foto</strong></th>
                                                    <th><strong>Level</strong></th>
                                                    <th><strong>Username</strong></th>
                                                    <th><strong>Status</strong></th>
                                                    <th><strong>Aksi</strong></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php 
                                                $no=1;
                                                foreach($petugas as $ptg) : ?>

                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $ptg['nama'] ?></td>
                                                        <td><?php echo $ptg['alamat'] ?></td>
                                                        <td><?php echo $ptg['nohp'] ?></td>
                                                        <td><img class="avatar rounded-circle"
                                                            src="<?php echo base_url() . './uploads/' . $ptg['foto']; ?>">
                                                        </td>

                                                        <td><?php echo $ptg['level'] ?></td>
                                                        <td><?php echo $ptg['username'] ?></td>
                                                        <td><?php echo $ptg['status']?></td>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-default btn-sm"
                                                        title="Edit" data-toggle="modal"
                                                        data-target="#Edit<?php echo $ptg['id_petugas']; ?> "><i
                                                        class="fa fa-pencil"></i></button>

                                                        <!-- Modal Edit-->

                                                        <div class="modal fade"
                                                        id="Edit<?php echo $ptg['id_petugas']; ?>"
                                                        tabindex="-1" aria-labelledby="exampleModalLabel"
                                                        aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                    id="exampleModalLabel">Edit Data
                                                                Petugas</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="<?php echo base_url(). 'SuperAdmin/edit_data/'.$ptg['id_petugas'];
                                                            ?>" method="post"
                                                            enctype="multipart/form-data">


                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <input type="text"
                                                                class="form-control"
                                                                value="<?php echo $ptg['nama']; ?>"
                                                                name="nama" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <input type="text"
                                                                class="form-control"
                                                                value="<?php echo $ptg['alamat']; ?>"
                                                                name="alamat" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>No Hp</label>
                                                                <input type="text"
                                                                class="form-control"
                                                                value="<?php echo $ptg['nohp']; ?>"
                                                                name="nohp" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Level</label>
                                                                <select class="form-control"
                                                                name="level" required>
                                                                <option
                                                                value="<?php echo $ptg['level']; ?>">
                                                                <?php echo $ptg['level']; ?>
                                                            </option>
                                                            <option value="Admin">Admin
                                                            </option>
                                                            <option value="Superadmin">
                                                            Superadmin</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Username</label>
                                                        <input type="text"
                                                        class="form-control"
                                                        value="<?php echo $ptg['username']; ?>"
                                                        name="username" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Status</label>
                                                        <select class="form-control"
                                                        name="status" required>
                                                        <option
                                                        value="<?php echo $ptg['status']; ?>">
                                                        <?php echo $ptg['status']; ?>
                                                    </option>
                                                    <option value="aktif">Aktif
                                                    </option>
                                                    <option value="pasif">Pasif
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Foto</label>
                                                <input type="file"
                                                class="form-control"
                                                name="foto">
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button"
                                                class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                                <button type="submit"
                                                class="btn btn-primary">Simpan</button>


                                            </div>

                                        </form>

                                    </div>

                                </div>
                            </div>
                        </div>

                        <!-- Akhir Modal Edit -->

                        <button type="button" class="btn btn-default btn-sm"
                        title="Ubah Password" ><i
                        class="fa fa-lock"></i></button>

                        <button type="button" class="btn btn-default btn-sm"
                        title="Delete" data-toggle="modal"
                        data-target="#hapus_data<?php echo $ptg['id_petugas']; ?>"><i
                        class="fa fa-trash-o"></i></button>
                    </td>

                    <!-- Modal Popup untuk delete-->
                    <div class="modal fade"
                    id="hapus_data<?php echo $ptg['id_petugas']; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content"
                        style="margin-top:100px;">
                        <div class="modal-header">

                            <h4 class="modal-title"
                            style="text-align:center;">Anda yakin
                        akan menghapus data ini.. ?</h4>
                    </div>

                    <div class="modal-footer"
                    style="margin:0px; border-top:0px; text-align:center;">
                    <a href="<?php echo base_url().'SuperAdmin/hapus_data/'.$ptg['id_petugas']; ?>"
                        class="btn btn-danger btn-sm"
                        id="delete_link">Hapus</a>
                        <button type="button"
                        class="btn btn-success btn-sm"
                        data-dismiss="modal">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </tr>
<?php endforeach; ?>
</tbody>


</table>


</div>


</div>

</div>
</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Modal Tambah-->
<div class="modal fade" id="Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <form action="<?php echo base_url(). 'SuperAdmin/tambah_aksi';
            ?>" method="post" enctype="multipart/form-data">


            <div class="form-group">
                <label>Nama</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <input type="text" class="form-control" name="alamat" required>
            </div>
            <div class="form-group">
                <label>No Hp</label>
                <input type="text" class="form-control" name="nohp" required>
            </div>
            <div class="form-group">
                <label>Level</label>
                <select class="form-control" name="level" required>
                    <option></option>
                    <option value="Admin">Admin</option>
                    <option value="Superadmin">Superadmin</option>
                </select>
            </div>

            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status" required>
                    <option></option>
                    <option value="admin">Aktif</option>
                    <option value="pasif">Pasif</option>
                </select>
            </div>
            <div class="form-group">
                <label>Foto</label>
                <input type="file" class="form-control" name="foto" required>
            </div>

            <div class="modal-footer">
                <button type="reset" class="btn btn-secondary">Clear</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>

        </form>

    </div>

</div>
</div>
</div>
<!-- Akhir Modal Tambah -->

<script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>