<!doctype html>
    <html lang="en">

    <div id="flash" data-flash="<?=$this->session->flashdata('flash');?>">



        <!-- Main body part  -->
        <div id="main-content">
            <div class="container-fluid">
                <!-- Page header section  -->
                <div class="block-header">
                    <div class="row clearfix">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <h1>Data Peserta Graduasi</h1>

                        </div>

                        <div class="col-lg-6 col-md-12 col-sm-12 text-lg-right">
                            <div
                            class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">

                            <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                                <p class="text-muted mb-1">Total</p>
                                <?php
                                $jumlahcl = 0;
                                foreach($calon as $cl) {
                                    $jumlahcl ++;
                                }

                                ?>
                                <h5 class="mb-0"><?php echo $jumlahcl; ?></h5>
                            </div>

                            <div class="mb-3 mb-xl-0">
                                <a data-toggle="modal" style="border-radius: 8px;" data-target="#Tambah" class="btn btn-primary">Tambah Data</a>
                            </div>



                            <div class="mb-3 mb-xl-0 ml-3">
                                <a href="<?php echo base_url('DtKuisioner/ProsesHitung') ?>" style="border-radius: 8px;"  class="btn btn-warning">Proses Penilaian</a>
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
                            <table class="table table-bordered table-hover js-basic-example dataTable" width="100%"
                            cellspacing="0">
                            <thead>
                                <tr class="table-active">
                                    <th class="text-center"><strong>No</strong></th>
                                    <th class="text-center"><strong>Nama</strong></th>
                                    <th class="text-center"><strong>Nik</strong></th>
                                    <th class="text-center"><strong>Periode</strong></th>
                                    <th class="text-center"><strong>Status Penilaian</strong></th>
                                    <th class="text-center"><strong>Aksi</strong></th>
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
                                        <td class="text-center">
                                            <?php if( $prm['total'] == 0 ){?>
                                                <span class="badge badge-danger">Belum Dinilai</span>
                                            <?php } else {?> 
                                                <span class="badge badge-success">Sudah Dinilai</span>
                                            <?php } ?>  
                                        </td>
                                        <td class="text-center">
                                            <a type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#Edit<?php echo $prm['id_detail_periode']; ?>"  title="Edit"  ><i
                                                class="fa fa-pencil" ></i></a>


                                                <button type="button" id="btn-hapus" class="btn btn-danger btn-sm" href="<?php echo base_url().'DtKuisioner/hapus_kuis/'.$prm['id_detail_periode']; ?>" title="Delete"><i
                                                    class="fa fa-trash-o"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal Tambah-->
                <div class="modal fade" id="Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta Graduai</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            </div>
                            <div class="modal-body">
                                <form action="<?php echo base_url(). 'DtKuisioner/tambah_aksi'?>" method='post' >
                                    <div class="form-group row">
                                        <label  class="col-sm-4 ">Nik / Nama <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <select class="form-control show-tick select2" name="id_penerima_bantuan">
                                                <option value=""></option>
                                                <?php foreach($penerimaB as $prm){ ?>
                                                    <?php $cek=0;
                                                    foreach($dataterisi as $ds){
                                                        if($ds['id_penerima_bantuan'] == $prm['id_penerima_bantuan']) $cek++;

                                                    }
                                                    if($cek == '0'){ ?>
                                                        <?php if( $prm['status_bantuan'] == 'aktif') { ?>
                                                            <option value="<?php echo $prm['id_penerima_bantuan']; ?>"><?php echo $prm['nik']; ?>-<?php echo $prm['nama']; ?> </option>
                                                        <?php } ?>

                                                    <?php } ?>

                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label  class="col-sm-4 ">Periode <span class="text-danger">*</span></label>
                                        <div class="col-sm-8">
                                            <?php foreach($period as $prd){ ?>
                                                <input class="form-control" type="text" disabled name="" value="<?php echo $prd['nama_periode']; ?>" > 
                                                <input type="hidden" name="id_periode" value="<?php echo $prd['id_periode']; ?>">
                                            <?php } ?>

                                        </div>
                                    </div>

                                    <?php  foreach ($kriteria as $ktr){  ?>
                                        <div class="form-group row">
                                            <label  class="col-sm-4 "><?php echo $ktr['jenis_kriteria']?> <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="hidden" value="<?php echo $ktr['id_kriteria']?>" name="id_kriteria<?php echo $ktr['id_kriteria']?>">
                                                <select class="form-control show-tick select2" name="id_rentang<?php  echo $ktr['id_kriteria'] ?>">
                                                    <option value=""></option>
                                                    <?php foreach($rentang_nilai as $rn){ ?>
                                                        <?php if ($rn['id_kriteria'] == $ktr['id_kriteria']){ ?>
                                                            <option value="<?php echo $rn['id_rentang']; ?>"><?php echo $rn['jenis_rentang']; ?></option>
                                                        <?php } ?>

                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>



                                    <div class="col-sm-12 text-right">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal" >Close</button>
                                        <button type="submit" style="border-radius: 8px;" class="btn btn-primary">Submit</button>

                                    </div>


                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Akhir Modal Tambah -->

                <!-- Modal Edit Data -->
                <?php 
                foreach($penerima as $prm) : ?>
                    <div class="modal fade" id="Edit<?php echo $prm['id_detail_periode'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Penerima Bantuan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                                <div class="modal-body">
                                    <form method='post' action="<?php echo base_url()?>DtKuisioner/EditKuis/" >
                                        <div class="form-group row">
                                            <label  class="col-sm-4 ">Nik / Nama <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" disabled name="" value="<?php echo $prm['nik']; ?>-<?php echo $prm['nama']?>" > 

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label  class="col-sm-4 ">Periode <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="text" disabled name="" value="<?php echo $prd['nama_periode']; ?>" > 
                                            </div>
                                        </div>

                                        <?php $i = 0; ?>
                                        <?php  foreach ($kriteria as $ktr){  ?>
                                           <?php foreach($kuisioner as $kuis){ 
                                            if($kuis['id_detail_periode'] == $prm['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria']){ ?>
                                                <input type="hidden" name="id_kuisioner<?php echo $ktr['id_kriteria']?>" value="<?php echo $kuis['id_kuisioner']?>">
                                            <?php } ?> 

                                        <?php } ?>
                                        <div class="form-group row">
                                            <label  class="col-sm-4 "><?php echo $ktr['jenis_kriteria']?> <span class="text-danger">*</span></label>
                                            <div class="col-sm-8">
                                                <input type="hidden" value="<?php echo $ktr['id_kriteria']?>" name="id_kriteria<?php echo $ktr['id_kriteria']?>">
                                                <select class="form-control show-tick select2" name="id_rentang<?php  echo $ktr['id_kriteria'] ?>">

                                                    <?php foreach ($ktr['rentang'] as $key) { ?>
                                                        <?php $cek = 0; 
                                                        foreach($kuisioner as $kuis){ 
                                                            if($kuis['id_detail_periode'] == $prm['id_detail_periode'] && $key['id_rentang'] == $kuis['id_rentang']){
                                                                $cek++;
                                                                $id_kuisioner = $kuis['id_kuisioner'];
                                                            } 

                                                        } ?>
                                                        <?php if($cek > 0 ) { ?>
                                                            <option value="<?php echo $key['id_rentang']; ?>"  selected><?php echo $key['jenis_rentang']; ?></option>
                                                        <?php } else { ?>
                                                            <option value="<?php echo $key['id_rentang']; ?>" ><?php echo $key['jenis_rentang']; ?></option>
                                                        <?php } ?>     

                                                    <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                    <?php } ?>



                                    <div class="col-sm-12 text-right">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal" >Close</button>
                                        <button type="submit" style="border-radius: 8px;" class="btn btn-primary">Edit</button>
                                    </div>


                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <!-- Akhir Modal edit data -->





            <script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous">
            </script>
            <script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('.select2').select2({ width: '100%' });
                });
            </script>

        </body>

        </html>