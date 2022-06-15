 <!-- Main body part  -->
 <div id="main-content">
    <div class="container-fluid">
        <!-- Page header section  -->
        <div class="block-header">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <h1>Detail Perhitungan</h1>
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
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                        <ul class="dropdown-menu theme-bg gradient">
                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                            <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                        </ul>
                    </li>
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
                                          <th><?= $no++; ?></th>
                                          <td><?= $prm['nama'] ?></td>

                                          <?php 
                                          $cek = 0;

                                          foreach($kriteria as $ktr) {

                                            foreach($kuisioner as $kuis) {
                                                if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
                                                  $cek++;
                                                  $nilai = $kuis['nilai'];
                                              }
                                          } if($cek > 0) { ?>

                                            <td><?= $nilai ?></td>

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
            <h2>Matrik Ternormalisasi</h2>
            
            <ul class="header-dropdown dropdown">
                <li><a href="javascript:void(0);" class="full-screen"><i class="fa fa-expand"></i></a></li>
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu theme-bg gradient">
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                    </ul>
                </li>
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
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu theme-bg gradient">
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                    </ul>
                </li>
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
                <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"></a>
                    <ul class="dropdown-menu theme-bg gradient">
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-eye"></i> View Details</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-share-alt"></i> Share</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-copy"></i> Copy to</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-folder"></i> Move to</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-edit"></i> Rename</a></li>
                        <li><a href="javascript:void(0);"><i class="dropdown-icon fa fa-trash"></i> Delete</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="body">
                    <div class="table-responsive">
                        <table class="table mb-0 table-borderless table-hover">
                            <thead>
                                <tr>
                                    <th><strong>No</strong></th>
                                    <th><strong>Nama</strong></th>
                                    <th><strong>Total</strong></th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                             
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