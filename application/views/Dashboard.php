<link href="<?php echo base_url() ?>assets/js/select2/select2.min.css" rel="stylesheet" />

<!-- Main body part  -->
<div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix mt-3">

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h1>Dashboard</h1>
                    <span>JustDo Dashboard,</span>
                </div>

            </div>

            <div class="row clearfix header mt-3">
                <div class="col-lg-10 col-md-12  col-sm-12">
                    <form action="<?= base_url('Dashboard') ?>" method='post' >
                        <div class="form-group row">
                            <div class="col-sm-6 col-md-6 col-lg-4">
                                <select class="form-control show-tick select2" name="id_periode">
                                    <?php foreach ($periode as $prd ) { ?>
                                        <?php if($this->session->userdata('id_periode') == $prd['id_periode']) { ?>
                                            <option value="<?= $prd['id_periode'] ?>"selected><?= $prd['nama_periode'] ?></option>
                                        <?php } else{ ?>
                                            <option value="<?= $prd['id_periode'] ?>"><?= $prd['nama_periode'] ?></option>
                                        <?php } ?>

                                    <?php }?>                                    
                                </select>
                            </div>
                            <div class="col-sm-2 col-md-2 col-lg-2">
                                <button class="btn btn-primary" type="submit">GET</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row clearfix">
            <div class="col-12">
                <nav class="navbar navbar-expand-lg page_menu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars text-muted"></i>
                    </button>

                </nav>

            </div>
            <div class="col-12">
                <div class="card theme-bg gradient">
                    <div class="body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <div>Total Penerima Bantuan</div>
                                        <?php
                                        $jumlahprm = 0;
                                        foreach($penerima as $prm) {
                                            $jumlahprm ++;
                                        }

                                        ?>
                                        <div class="mt-3 h1"><?php echo $jumlahprm; ?></div>

                                    </div>

                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <div>Total Kriteria</div>
                                        <?php
                                        $jumlahktr = 0;
                                        foreach($kriteria as $ktr) {
                                            $jumlahktr ++;
                                        }

                                        ?>
                                        <div class="mt-3 h1"><?php echo $jumlahktr; ?></div>

                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <div>Total Periode</div>
                                        <?php
                                        $jumlahprd = 0;
                                        foreach($period as $prd) {
                                            $jumlahprd ++;
                                        }

                                        ?>
                                        <div class="mt-3 h1"><?php echo $jumlahprd; ?></div>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body">
                                        <div>Total Calon Anggota Graduasi</div>
                                        <?php
                                        $jumlahcl = 0;
                                        foreach($calon as $cl) {
                                            $jumlahcl ++;
                                        }

                                        ?>
                                        <div class="mt-3 h1"><?php echo $jumlahcl; ?></div>

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

<script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('.select2').select2();
});</script>



