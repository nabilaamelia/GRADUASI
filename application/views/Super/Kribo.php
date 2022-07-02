
<!-- Main body part  -->
<div id="flash" data-flash="<?=$this->session->flashdata('flash');?>">
    <div id="main-content">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <h1>Data Kriteria dan Bobot</h1>
                            <!-- <?php echo print_r($rentang_nilai);?><br><br>
                                <?= print_r($kriteria);?><br> -->
                            </div>
                        </div>
                    </div>
                    
                    <div class="row clearfix row-deck">
                        <div class="col-lg-12 col-md-12">
                            <div class="card">

                                <div class="body">
                                    <form>

                                       <div class="col-12 text-lg-right">
                                        <div>
                                            <div class="btn-group  ">
                                                <a data-toggle="modal" style="border-radius: 8px;" data-target="#Tambah" class="btn btn-primary">Tambah Data</a>
                                                
                                            </div>
                                        </div>
                                    </div>


                                </form>
                            </div>
                            
                            <div class="body table-responsive ">
                                <table class="table table-bordered table-hover js-basic-example dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr class="table-active text-center">
                                            <th><strong>No</strong></th>
                                            <th><strong>Kode Kriteria</strong></th>
                                            <th><strong>Jenis Kriteria</strong></th>
                                            <th><strong>Atribut</strong></th>
                                            <th><strong>Bobot</strong></th>
                                            <th><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>

                                    
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        foreach($kriteria as $ktr) : ?>

                                            <tr class="">
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $ktr['nama_kode'] ?></td>
                                                <td><?php echo $ktr['jenis_kriteria'] ?></td>
                                                <td><?php echo $ktr['atribut'] ?></td>
                                                <td><?php echo $ktr['bobot'] ?></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-warning btn-sm" title="Detail" data-toggle="modal" data-target="#Detail<?php echo $ktr['id_kriteria']?>"><i class="fa fa-info"></i></button>

                                                    
                                                    <button type="button" class="btn btn-primary btn-sm" title="Edit Kriteria"><i class="fa fa-pencil" data-toggle="modal" data-target="#Edit<?php echo $ktr['id_kriteria']?>"></i></button>

                                                    
                                                    <button type="button" class="btn btn-primary btn-sm" title="Edit Rentang Nilai" data-toggle="modal" data-target="#EditRentang<?php echo $ktr['id_kriteria']?>"><i class="fa fa-pencil"></i></button>

                                                    <button type="button" id="btn-hapus" class="btn btn-danger btn-sm" title="Delete" href="<?php echo base_url('SuperAdmin/hapus_KriBo/'.$ktr['id_kriteria']) ?>" ><i class="fa fa-trash-o"></i></button>
                                                </td>

                                                <!-- Modal Popup untuk delete-->
                                                <div class="modal fade" id="hapus_data<?php echo $ktr['id_kriteria']; ?>">
                                                  <div class="modal-dialog">
                                                    <div class="modal-content" style="margin-top:100px;">
                                                      <div class="modal-header">

                                                        <h4 class="modal-title" style="text-align:center;">Anda yakin akan menghapus data ini.. ?</h4>
                                                    </div>

                                                    <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                                                        <a href="<?php echo base_url().'KriBo/hapus_datakri/'.$ktr['id_kriteria']; ?>" class="btn btn-danger btn-sm" id="delete_link">Hapus</a>
                                                        <button type="button" class="btn btn-success btn-sm" data-dismiss="modal">Cancel</button>
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
<!-- Modal Tambah-->
<div class="modal fade" id="Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria dan Bobot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
            aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form action="<?php echo base_url(). 'SuperAdmin/tambah_KriBo';
        ?>" method="post" enctype="multipart/form-data" >


        <div class="form-group">
            <label>Kode Kriteria</label>
            <input type="text" class="form-control" name="nama_kode" required>
        </div>
        <div class="form-group">
            <label>Jenis Kriteria</label>
            <input type="text" class="form-control" name="jenis_kriteria" required>
        </div>
        <div class="form-group">
            <label>Atribut</label>
            <select class="form-control" name="atribut" required>
              <option ></option>
              <option value="Benefit">Benefit</option>
              <option value="Cost">Cost</option>
          </select>
      </div>
      <div class="form-group">
        <label>Bobot</label>
        <input type="text" class="form-control" name="bobot" required>
    </div>
    <div class="form-group">
        <label>Rentang Nilai</label>
        <div class="d-flex">
            <div class="col-6 mr-2">
                <input type="text" class="form-control" placeholder="jenis rentang" name="jenis_rentang1" required>
            </div>
            <div class="col-6 mr-2">
                <input type="text" class="form-control" placeholder="nilai" name="nilai1" required>

            </div>
        </div>
        <div class="d-flex mt-2">
            <div class="col-6 mr-2">
                <input type="text" class="form-control" placeholder="jenis rentang" name="jenis_rentang2" required>
            </div>
            <div class="col-6 mr-2">
                <input type="text" class="form-control" placeholder="nilai" name="nilai2" required>

            </div>
        </div>
        <div class="d-flex mt-2">
            <div class="col-6 mr-2">
                <input type="text" class="form-control" placeholder="jenis rentang" name="jenis_rentang3" required>
            </div>
            <div class="col-6 mr-2">
                <input type="text" class="form-control" placeholder="nilai" name="nilai3" required>

            </div>
        </div>
        <div class="d-flex mt-2">
            <div class="col-6 mr-2">
                <input type="text" class="form-control" placeholder="jenis rentang" name="jenis_rentang4" required>
            </div>
            <div class="col-6 mr-2">
                <input type="text" class="form-control" placeholder="nilai" name="nilai4" required>

            </div>
        </div>
    </div>
    
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    
</form>

</div>

</div>
</div>
</div>
<!-- Akhir Modal Tambah -->


<!-- Modal Detail Kriteria-->
<?php 
$no=1;
foreach($kriteria as $ktr) : ?>
    <div class="modal fade" id="Detail<?php echo $ktr['id_kriteria']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Detail Data Kriteria dan Bobot</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-body">
            <form action="" method="post" enctype="multipart/form-data" >
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label>Kode Kriteria</label>
                        </div>

                        <div class="col-8">
                            <input type="text" class="form-control" name="nama_kode" value="<?php echo $ktr['nama_kode'];?>" required>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label>Jenis Kriteria</label>
                        </div>

                        <div class="col-8">
                            <input type="text" class="form-control" name="jenis_kriteria" value="<?php echo $ktr['jenis_kriteria'];?>" required>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label>Atribut</label>
                        </div>

                        <div class="col-8">
                            <input type="text" class="form-control" name="atribut" value="<?php echo $ktr['atribut']?>" required>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label>Bobot</label>
                        </div>

                        <div class="col-8">
                            <input type="text" class="form-control" name="bobot" value="<?php echo $ktr['bobot']?>" required>
                        </div>

                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-4">
                            <label>Rentang Nilai</label>
                        </div>
                        <div class="col-8">:
                        </div>

                    </div>
                    <?php foreach($rentang_nilai as $rn){ ?>

                        <?php if ($rn['id_kriteria'] == $ktr['id_kriteria'] ) { ?>

                            <div class="d-flex">
                                <div class="col-4">
                                    <!-- <label></label> -->
                                </div>
                                <div class="col-6 mr-2">
                                    <input type="text" class="form-control" value="<?php echo $rn['jenis_rentang']?>" name="jenis_rentang" required>
                                </div>
                                <div class="col-2 mr-2">
                                    <input type="text" class="form-control" value="<?php echo $rn['nilai']?>" name="nilai" required>
                                </div>
                            </div>

                        <?php } ?>

                    <?php } ?>
                    
                    

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
                </div>
                
            </form>
            
        </div>
        
    </div>
</div>
</div>
<!-- Akhir Modal Detail Kriteria -->

<!-- Modal Edit Kriteria-->
<div class="modal fade" id="Edit<?php echo $ktr['id_kriteria']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <form action="<?php echo base_url(). 'SuperAdmin/edit_kriteria/'.$ktr['id_kriteria'];
    ?>" method="post" enctype="multipart/form-data" >


    <div class="form-group">
        <label>Kode Kriteria</label>
        <input type="text" class="form-control" name="nama_kode" value="<?php echo $ktr['nama_kode'];?>" required>
    </div>
    <div class="form-group">
        <label>Jenis Kriteria</label>
        <input type="text" class="form-control" name="jenis_kriteria" value="<?php echo $ktr['jenis_kriteria'];?>" required>
    </div>
    <div class="form-group">
        <label>Atribut</label>
        <select class="form-control" name="atribut" required>
          <option ><?php echo $ktr['atribut']?></option>
          <option value="Benefit">Benefit</option>
          <option value="Cost">Cost</option>
      </select>
  </div>
  <div class="form-group">
    <label>Bobot</label>
    <input type="text" class="form-control" name="bobot" value="<?php echo $ktr['bobot']?>" required>
</div>

<div class="modal-footer">
    <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary">Simpan</button>
</div>

</form>

</div>

</div>
</div>
</div>
<!-- Akhir Modal Edit Kriteria -->


<!-- Modal Edit Rentang Kriteria-->
<div class="modal fade" id="EditRentang<?php echo $ktr['id_kriteria']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Rentang Kriteria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <form action="<?php echo base_url(). 'SuperAdmin/edit_rentang/'.$ktr['id_kriteria'];
    ?>" method="post" enctype="multipart/form-data" >


    <div class="form-group">
        <div class="row">
            <div class="col-4">
                <label>Rentang Nilai</label>
            </div>
            <div class="col-8">:
            </div>

        </div>
        <?php 
        $ai=1;
        foreach($rentang_nilai as $rn){ ?>


            <?php if ($rn['id_kriteria'] == $ktr['id_kriteria'] ) { ?>

                <div class="d-flex">
                    <div class="col-4">
                        <!-- <label></label> -->
                    </div>
                    <div class="col-6 mr-2">
                        <input type="text" class="form-control" value="<?php echo  $rn['jenis_rentang']?>" name="jenis_rentang<?php echo $ai ?>" required>
                        <input type="hidden" name="id_rentang<?php echo $ai ?>" value="<?php echo $rn['id_rentang']?>" >
                    </div>
                    <div class="col-2 mr-2">
                        <input type="text" class="form-control" value="<?php echo $rn['nilai']?>" name="nilai<?php echo $ai ?>" required>
                    </div>
                    <?php $ai++ ; ?>
                </div>

            <?php } ?>

        <?php } ?>
        
        

    </div>


    
    
    <div class="modal-footer">
        <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    
</form>

</div>

</div>
</div>
</div>
<!-- Akhir Modal Edit Rentang Kriteria -->

<?php endforeach; ?>


<script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
});</script>






</div>



