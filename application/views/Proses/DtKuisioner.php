<!doctype html>
    <html lang="en">



    <!-- Main body part  -->
    <div id="main-content">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h1>Data Hasil Kuisioner Calon Anggota Graduasi</h1>

                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12 text-lg-right">
                        <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">

                            <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                                <p class="text-muted mb-1">Total</p>
                                <h5 class="mb-0">420</h5>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-12">
                    <div class="card">
                        <div class="body">

                        </div>
                        <div class="table-responsive container-fluid mb-3">
                            <table  class="table table-bordered table-hover js-basic-example dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-active"> 
                                        <th><strong>No</strong></th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>Nik</strong></th>
                                        <th><strong>Periode</strong></th>
                                        <th><strong>Aksi</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($penerima as $prm) { ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <td><?= $prm['nama'] ?></td>
                                            <td><?= $prm['nik'] ?></td>
                                            <td><?= $prm['nama_periode'] ?></td>
                                            <td>
                                                <button type="button"  class="btn btn-default btn-sm" data-toggle="modal" data-target="#Edit<?php echo $prm['id_penerima_bantuan']; ?>"  title="Edit"><i class="fa fa-pencil"></i></button>


                                                <button type="button" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Modal Edit-->
            <?php 
            foreach($penerima as $prm) : ?>
                <div class="modal fade" id="Edit<?php echo $prm['id_penerima_bantuan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Calon Aanggota Graduasi</h5>
                                <button type="button" class="btn-close hidden-md"  data-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                                <form method="post" enctype="multipart/form-data" >

                                    <div class="form-group row">
                                        <label  class="col-sm-12 ">Nik / Nama <span class="text-danger">*</span></label>
                                        <div class="col-sm-12">
                                            <select class="form-control show-tick select2" name="id_penerima_bantuan">
                                                <option value=""></option>
                                                <?php foreach($penerima as $prm){ ?>
                                                    <option value="<?php echo $prm['id_penerima_bantuan']; ?>"><?php echo $prm['nik']; ?>-<?php echo $prm['nama']; ?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label  class="col-sm-4 ">Periode <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control show-tick select2" name="id_periode" required>
                                                <option value=""></option>
                                                <?php foreach($period as $prd){ ?>
                                                    <option value="<?php echo $prd['id_periode']; ?>"><?php echo $prd['nama_periode']; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <?php  foreach ($kriteria as $ktr){  ?>
                                        <div class="form-group row">
                                            <label  class="col-sm-4 "><?php echo $ktr['jenis_kriteria']?> <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="hidden" value="<?php echo $ktr['id_kriteria']?>" name="id_kriteria<?php echo $ktr['id_kriteria']?>">
                                                <select class="form-control show-tick select2" name="nilai<?php  echo $ktr['id_kriteria'] ?>">
                                                    <option value=""></option>
                                                    <?php foreach($rentang_nilai as $rn){ ?>
                                                        <?php if ($rn['id_kriteria'] == $ktr['id_kriteria']){ ?>
                                                            <option value="<?php echo $rn['nilai']; ?>"><?php echo $rn['jenis_rentang']; ?></option>
                                                        <?php } ?>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>





                                </form>


                            <?php endforeach; ?>





                            <script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
                            <script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    $('.select2').select2();
                                });</script>

                            </body>
                            </html>
