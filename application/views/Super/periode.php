<!doctype html>
    <html lang="en">




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
                                            <!-- <div class="btn-group  ">
                                                <a data-toggle="modal" data-target="#Tambah" class="btn btn-primary">Tambah Data</a>
                                                
                                            </div> -->
                                        </div>
                                    </div>

                                </form>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover js-basic-example dataTable"  width="100%" cellspacing="0">
                                     <thead>
                                        <tr class="table-active"> 
                                            <th><strong>No</strong></th>
                                            <th><strong>Nama Periode</strong></th>
                                            <th><strong>Tanggal Dimulai</strong></th>
                                            <th><strong>Tanggal Berakhir</strong></th>
                                            <!-- <th><strong>Aksi</strong></th> -->
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
                                                
                                                
                                            </tr>

                                            
                                        <?php endforeach; ?>    
                                    </tbody>
                                    
                                </table>

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

            


        </body>

        </html>
