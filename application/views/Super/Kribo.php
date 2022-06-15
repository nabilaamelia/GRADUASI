
<!-- Main body part  -->
<div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h1>Data Kriteria dan Bobot</h1>
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
                                    <a data-toggle="modal" data-target="#Tambah" class="btn btn-primary">Tambah Data</a>
                                    
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
                                <!--  <th><strong>Aksi</strong></th> -->
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
                                            <!-- <td class="text-center">
                                                <button type="button" class="btn btn-default btn-sm" title="Detail" data-toggle="modal" data-target="#Detail"><i class="fa fa-info"></i></button>

                                                
                                                <button type="button" class="btn btn-default btn-sm" title="Edit Kriteria"><i class="fa fa-pencil" data-toggle="modal" data-target="#Edit<?php echo $ktr['id_kriteria']?>"></i></button>

                                                
                                                <button type="button" class="btn btn-default btn-sm" title="Edit Rentang Nilai" data-toggle="modal" data-target="#EditRentang<?php echo $ktr['id_kriteria']?>"><i class="fa fa-pencil"></i></button>

                                                <button type="button" class="btn btn-default btn-sm" title="Delete"><i class="fa fa-trash-o"></i></button>
                                            </td> -->
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

<script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
});</script>



