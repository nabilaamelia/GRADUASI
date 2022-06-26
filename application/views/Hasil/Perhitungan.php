<!-- Main body part  -->
<div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h1>Detail Perhitungan</h1>

                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 text-lg-right">
                    <a onclick="window.open(this.href); return false;" style="border-radius: 8px;" href="<?php echo base_url('Perhitungan/PrintDetail/'.$id_periode)?>" class="btn btn-primary">Cetak  <i class="fa fa-print"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-12 col-md-8">
        <div class="card">
            <div class="header">
                <h2>Matrik Keputusan / Nilai Awal</h2>
                <ul class="header-dropdown dropdown">
                    <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                </ul>
            </div>
            <div class="col-12">
                <div class="card">
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table mb-0 table-bordered table-hover">
                                <thead>
                                    <tr class="table-active">
                                        <th class="col-md-1 text-center"><strong>No</strong></th>
                                        <th class="col-md-1 text-center"><strong>Nama</strong></th>
                                        <?php
                                        $no = 1;
                                        foreach ($kriteria as $ktr){?>
                                            <th class="col-md-1 text-center"><strong><?php echo $ktr['nama_kode'] ?></strong></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                    $no = 1;
                                    foreach($penerima as $prm) { ?>
                                        <tr>
                                            <th class="col-md-1 text-center"><?= $no++; ?></th>
                                            <td><?= $prm['nama'] ?></td>

                                            <?php 
                                            $cek = 0;

                                            foreach($kriteria as $ktr) {
                                                $nilai = "";
                                                foreach($kuisioner as $kuis) {
                                                    
                                                    if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
                                                        $cek++;
                                                        $nilai = $kuis['nilai'];
                                                    }
                                                } if($cek > 0) { ?>

                                                    <td class="col-md-1 text-center"><?= $nilai ?></td>

                                                <?php } ?>



                                            <?php } ?>
                                        </tr>
                                    <?php } ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <h7 class="ml-3">Mencari nilai max / min</h2>
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-hover">
                                    <thead>
                                        <tr class="table-active">
                                            <?php
                                            $no = 0;
                                            foreach ($kriteria as $ktr){?>

                                                <th class="col-md-1 text-center"><strong ><?php echo $ktr['nama_kode'] ?></strong></th>

                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 0;
                                        foreach ($kriteria as $ktr){?>
                                            <?php if($ktr['atribut'] == 'Benefit') { ?>
                                                <th class="col-md-1 text-center"><?php  echo $ktr['max']->nilai ?></th>
                                            <?php } else { ?>
                                                <th class="col-md-1 text-center"><?php  echo $ktr['min']->nilai ?></th>
                                            <?php } ?>

                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-12 col-md-8">
            <div class="card">
                <div class="header">
                    <h2>Matrik Ternormalisasi</h2>

                    <ul class="header-dropdown dropdown">
                        <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                    </ul>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-hover">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="col-md-1 text-center"><strong>No</strong></th>
                                            <th class="col-md-1 text-center"><strong>Nama</strong></th>
                                            <?php
                                            $no = 1;
                                            foreach ($kriteria as $ktr){?>
                                                <th class="col-md-1 text-center"><strong><?php echo $ktr['nama_kode'] ?></strong></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($penerima as $prm) { ?>
                                            <tr>
                                                <th class="col-md-1 text-center"><?= $no++; ?></th>
                                                <td><?= $prm['nama'] ?></td>

                                                <?php 

                                                foreach($kriteria as $ktr) {
                                                    $cek = 0;
                                                    foreach($kuisioner as $kuis) {
                                                        if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
                                                            $cek++;
                                                            $nilai = $kuis['nilai'];

                                                            if($ktr['atribut'] == 'Benefit'){
                                                                $max = $ktr['max']->nilai;
                                                                $normalisasi = $nilai/$max;
                                                            } else {
                                                                $min = $ktr['min']->nilai;
                                                                $normalisasi = $min/$nilai;
                                                            }


                                                        }
                                                    } if ($cek > 0) { ?>
                                                        <td class="col-md-1 text-center"><?= number_format($normalisasi, 2) ?></td>
                                                    <?php } ?>
                                                <?php } ?>


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

        <div class="col-lg-12 col-md-8">
            <div class="card">
                <div class="header">
                    <h2>Nilai Preferensi</h2>

                    <ul class="header-dropdown dropdown">
                        <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                    </ul>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-hover">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="col-md-1 text-center"><strong>No</strong></th>
                                            <th class="col-md-1 text-center"><strong>Nama</strong></th>
                                            <?php
                                            $no = 1;
                                            foreach ($kriteria as $ktr){?>
                                                <th class="col-md-1 text-center"><strong><?php echo $ktr['nama_kode'] ?></strong></th>
                                            <?php } ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($penerima as $prm) { ?>
                                            <tr>
                                                <th class="col-md-1 text-center"><?= $no++; ?></th>
                                                <td><?= $prm['nama'] ?></td>

                                                <?php 

                                                foreach($kriteria as $ktr) {

                                                    $cek = 0;
                                                    foreach($kuisioner as $kuis) {
                                                        if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
                                                            $cek++;
                                                            $nilai = $kuis['nilai'];

                                                            if($ktr['atribut'] == 'Benefit'){
                                                                $max = $ktr['max']->nilai;
                                                                $normalisasi = $nilai/$max;
                                                                $preferensi  = $normalisasi * $ktr['bobot'];
                                                            } else {
                                                                $min = $ktr['min']->nilai;
                                                                $normalisasi = $min/$nilai;
                                                                $preferensi  = $normalisasi * $ktr['bobot'];
                                                            }


                                                        }
                                                    } if ($cek > 0) { ?>
                                                        <td class="col-md-1 text-center"><?= number_format($preferensi, 2) ?></td>
                                                    <?php } ?>
                                                <?php } ?>


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

        <div class="col-lg-12 col-md-8">
            <div class="card">
                <div class="header">
                    <h2>Nilai Total Preferensi</h2>

                    <ul class="header-dropdown dropdown">
                        <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>

                    </ul>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table mb-0 table-bordered table-hover">
                                    <thead>
                                        <tr class="table-active">
                                            <th class="col-md-1 text-center"><strong>No</strong></th>
                                            <th class="col-md-1 text-center"><strong>Nama</strong></th>
                                            <th class="col-md-1 text-center"><strong>Total</strong></th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $no = 1;
                                        foreach($penerima as $prm) { ?>
                                            <tr>
                                                <th class="col-md-1 text-center"><?= $no++; ?></th>
                                                <td ><?= $prm['nama'] ?></td>

                                                <?php 
                                                $total = 0;
                                                foreach($kriteria as $ktr) {

                                                    $cek = 0;
                                                    foreach($kuisioner as $kuis) {
                                                        if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
                                                            $cek++;
                                                            $nilai = $kuis['nilai'];

                                                            if($ktr['atribut'] == 'Benefit'){
                                                                $max = $ktr['max']->nilai;
                                                                $normalisasi = $nilai/$max;
                                                                $preferensi  = $normalisasi * $ktr['bobot'];
                                                                $total+= $preferensi;
                                                            } else {
                                                                $min = $ktr['min']->nilai;
                                                                $normalisasi = $min/$nilai;
                                                                $preferensi  = $normalisasi * $ktr['bobot'];
                                                                $total+= $preferensi;
                                                            }


                                                        }
                                                    } 


                                                } ?>


                                                <td class="col-md-1 text-center"><?php echo number_format($total, 2) ?></td>
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




    </div>
    <script src="<?php echo base_url() ?>assets/js/select2/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="<?php echo base_url() ?>assets/js/select2/select2.min.js" defer></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2();
        });</script>