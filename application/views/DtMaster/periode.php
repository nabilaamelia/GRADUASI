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
                            <h1>Periode Graduasi</h1>
                            
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
                                            <div class="btn-group  ">
                                                <a data-toggle="modal" style="border-radius: 8px;" data-target="#Tambah" class="btn btn-primary">Tambah Data</a>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable"  width="100%" cellspacing="0">
                                       <thead>
                                        <tr class="table-active"> 
                                            <th class="text-center"><strong>No</strong></th>
                                            <th class="text-center"><strong>Nama Periode</strong></th>
                                            <th class="text-center"><strong>Tanggal Dimulai</strong></th>
                                            <th class="text-center"><strong>Tanggal Berakhir</strong></th>
                                            <th class="text-center"><strong>Aksi</strong></th>
                                        </tr>
                                    </thead>

                                    
                                    <tbody>
                                        <?php 
                                        $no=1;
                                        foreach($period as $prd) : ?>

                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $prd['nama_periode'] ?></td>
                                                <td><?php echo $prd['tgl_dimulai'] ?></td>
                                                <td><?php echo $prd['tgl_berakhir'] ?></td>
                                                
                                                <td class="text-center"> 
                                                    <button type="button"  class="btn btn-primary btn-sm" title="Edit" data-toggle="modal" data-target="#Edit<?php echo $prd['id_periode']; ?>"><i class="fa fa-pencil"></i></button>

                                                    <!-- Modal Edit-->
                                                    <div class="modal fade" id="Edit<?php echo $prd['id_periode']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                      <div class="modal-dialog">
                                                        <div class="modal-content">
                                                          <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Periode</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="<?php echo base_url(). 'Periode/edit_data/'.$prd['id_periode'];
                                                        ?>" method="post" enctype="multipart/form-data" >


                                                        <div class="form-group">
                                                            <label>Nama Periode</label>
                                                            <input type="text" class="form-control" value="<?php echo $prd['nama_periode'];?>" name="nama_periode" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Dimulai</label>
                                                            <input type="date" class="form-control" value="<?php echo $prd['tgl_dimulai']; ?>" name="tgl_dimulai" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Tanggal Berakhir</label>
                                                            <input type="date" class="form-control" value="<?php echo $prd['tgl_berakhir']; ?>" name="tgl_berakhir" required>
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
                                    <!-- Akhir Modal Edit -->


                                    <button type="button" style="margin:0px; border-top:0px; text-align:center;" class="btn btn-danger btn-sm" id="btn-hapus" title="Delete" href="<?php echo base_url('Periode/hapus_data/'.$prd['id_periode']) ?>"><i class="fa fa-trash-o"></i></button>
                                </td>

                                
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


<!-- Modal Tambah-->
<div class="modal fade" id="Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Periode Graduasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div class="modal-body">
        <form action="<?php echo base_url(). 'Periode/tambah_aksi';
    ?>" method="post" enctype="multipart/form-data" >


    <div class="form-group">
        <label>Nama Periode</label>
        <input type="text" class="form-control" name="nama_periode" required>
    </div>
    <div class="form-group">
        <label>Tanggal Dimulai</label>
        <input type="date" class="form-control" name="tgl_dimulai" required>
    </div>
    <div class="form-group">
        <label>Tanggal Berakhir</label>
        <input type="date" class="form-control" name="tgl_berakhir" required>
    </div>
    
    

    <div class="modal-footer">
        <button type="reset" class="btn btn-dark" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>
    
</form>

</div>

</div>
</div>
</div>
<!-- Akhir Modal Tambah -->


<script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
});</script>





</body>

</html>
