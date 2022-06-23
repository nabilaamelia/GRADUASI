<!-- Main body part  -->
<div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h1>Hasil Seleksi</h1>
                </div>
                
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-8">
        <div class="card">
            <div class="row clearfix header">

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <form action="<?= base_url('Hasil') ?>" method='post' >
                        <div class="form-group row">
                            <label  class="col-sm-2 ">Periode <span class="text-danger"></span></label>
                            <div class="col-sm-2">
                                <select class="form-control show-tick select2" name="id_periode">
                                    <?php foreach ($periode as $prd ) { ?>
                                        <?php if($prd['id_periode'] == $id_periode) { ?>
                                            <option value="<?= $prd['id_periode'] ?>"selected><?= $prd['nama_periode'] ?></option>

                                        <?php } else { ?>
                                            <option value="<?= $prd['id_periode'] ?>"><?= $prd['nama_periode'] ?></option>
                                        <?php } ?>
                                        
                                    <?php }?>
                                    
                                </select>
                            </div>
                            <div class="col-sm-2">
                                <button class="btn btn-primary" style="border-radius: 8px;" type="submit">GET</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12 text-lg-right">
                    <a onclick="window.open(this.href); return false;" href="<?php echo base_url('Hasil/PrintHasil/')?>" style="border-radius: 8px;" class="btn btn-primary">Cetak Hasil Rekomendasi <i class="fa fa-print"></i></a>
                    <?=$this->uri->segment(1) == 'Perhitungan'  ? 'class="active"' : '' ?><a  href="<?php echo base_url('Perhitungan/hasil/'. $id_periode) ?>" style="border-radius: 8px;" class="btn btn-primary ml-3">Detail Perhitungan</a>

                </div>

            </div>

            <div class="col-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover js-basic-example dataTable">
                                <thead>
                                    <tr>
                                        <th width="5"><strong>No</strong></th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>Total</strong></th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($penerima as $prm) { ?>
                                        <tr>
                                            <th><?= $no++; ?></th>
                                            <td><?= $prm['nama'] ?></td>
                                            <td><?php echo $prm['total'] ?></td>
                                        </tr>

                                    <?php } ?>
                                </tbody>
                            </table>
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





</div>