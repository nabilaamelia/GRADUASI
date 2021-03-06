<?php $periode = $this->ModelPeriode->tampilperiode('periode')->result_array(); 
$where = array(
    'id_petugas' => $this->session->userdata('id_petugas')
);
$profil = $this->ModelPetugas->tampil_petugas($where)->row_array(); ?>
<body>

    <div id="body" class="theme-cyan">
        <!-- Page Loader -->
        <div class="page-loader-wrapper">
            <div class="loader">
                <div class="mt-3"><img src="<?php echo base_url() ?>assets/dist/assets/icon/KEMENSOS.png" width="40" height="40" alt="Mooli"></div>
                <p>Please wait...</p>        
            </div>
        </div>

        <!-- Theme Setting -->
        <div class="themesetting">
            <a href="javascript:void(0);" class="theme_btn"><i class="fa fa-gear fa-spin"></i></a>
            <ul class="list-group">
                <li class="list-group-item">
                    <ul class="choose-skin list-unstyled mb-0">
                        <li data-theme="green" class="active"><div class="green"></div></li>
                        <li data-theme="orange"><div class="orange"></div></li>
                        <li data-theme="blush"><div class="blush"></div></li>
                        <li data-theme="cyan"><div class="cyan"></div></li>
                        <li data-theme="timber"><div class="timber"></div></li>
                        <li data-theme="blue"><div class="blue"></div></li>
                        <li data-theme="amethyst"><div class="amethyst"></div></li>
                    </ul>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Light Sidebar</span>
                    <label class="switch sidebar_light">
                        <input type="checkbox" checked="">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Gradient</span>
                    <label class="switch gradient_mode">
                        <input type="checkbox" checked="">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>Dark Mode</span>
                    <label class="switch dark_mode">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
                <li class="list-group-item d-flex align-items-center justify-content-between">
                    <span>RTL version</span>
                    <label class="switch rtl_mode">
                        <input type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </li>
            </ul>
            <hr>
            
        </div>

        <!-- Overlay For Sidebars -->
        <div class="overlay"></div>

        <div id="wrapper">

         <!-- Page top navbar -->
         <nav class="navbar navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-left">
                    <div class="navbar-btn">
                        <a href="index.html"><img src="<?php echo base_url() ?>assets/dist/assets/icon/logo.png" alt="Mooli Logo" class="img-fluid logo"></a>
                        <button type="button" class="btn-toggle-offcanvas"><i class="fa fa-align-left"></i></button>
                    </div>

                    <div class="row clearfix header mt-3">
                        <div class="col-lg-10 col-md-12  col-sm-12">
                            <form action="<?= base_url('SuperAdmin/FilterPeriode') ?>"  method='post' >
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-6 col-lg-8">
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
                                        <button class="btn btn-primary" style="border-radius: 8px;" type="submit">Tampilkan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row clearfix header">
                        <!-- <h4>
                            SPK Rekomendasi Graduasi Program Keluarga Harapan
                        </h4> -->


                    </div>
                    

                </div>
                <div class="navbar-right">
                    <div id="navbar-menu">
                        <ul class="nav navbar-nav">

                            <li class="hidden-xs"><a href="javascript:void(0);" id="btnFullscreen" class="icon-menu"><i class="fa fa-arrows-alt"></i></a></li>
                            <li><a title="Logout" href="<?php echo base_url('Auth') ?>" id="btn-logout" class="icon-menu"><i class="fa fa-power-off"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </nav>
        <!-- Main left sidebar menu -->
        <div id="left-sidebar" class="sidebar light_active">
            <a href="javascript:void(0);" class="menu_toggle"><i class="fa fa-angle-left"></i></a>
            <div class="navbar-brand">
                <center><span>GRADUASI &ensp;</span><img src="<?php echo base_url() ?>assets/dist/assets/icon/PKH3.png" alt="Mooli Logo" class="img-fluid" width="120" ></center>
                <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="fa fa-close"></i></button>
            </div>
            <div class="sidebar-scroll">
                <div class="user-account">
                    <div class="user_div">
                        <img src="<?php echo base_url() ?>uploads/<?= $profil['foto'];?>" class="user-photo" >
                    </div>
                    <div class="dropdown">
                        <span>Welcome</span>
                        <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong><?php echo $profil['nama']; ?></strong></a>
                        <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                           <li><a href="<?php echo base_url('SuperAdmin/Profil') ?>"><i class="fa fa-user"></i>Profile</a></li>
                           <li><a href="<?php echo base_url('Auth/logout') ?>" id="btn-logout" ><i class="fa fa-power-off"></i>Logout</a></li>
                       </ul>
                   </div>
               </div>  
               <nav id="left-sidebar-nav" class="sidebar-nav">
                <ul id="main-menu" class="metismenu animation-li-delay">
                    <li class="header">SUPERADMIN</li>
                    <li <?=$this->uri->segment(2) == 'Dashboard'  ? 'class="active"' : '' ?>><a href="<?php echo base_url('SuperAdmin/Dashboard') ?>"><i class="fa fa-dashboard"></i> <span>DASHBOARD</span></a></li>
                    <li <?= $this->uri->segment(2) == 'DtPenerimaSuper' || $this->uri->segment(2) == 'Petugas' || $this->uri->segment(2) == 'KriBoSuper' || $this->uri->segment(2) == 'PeriodeSuper'  ? 'class="active"' : '' ?>>
                        <a href="#Doctors" class="has-arrow"><i class="fa fa-folder"></i><span>DATA MASTER</span></a>
                        <ul>
                            <li <?=$this->uri->segment(2) == 'PeriodeSuper'  ? 'class="active"' : '' ?>><a href="<?php echo base_url('SuperAdmin/PeriodeSuper') ?>">Periode</a></li>
                            
                            <li <?=$this->uri->segment(2) == 'DtPenerimaSuper'  ? 'class="active"' : '' ?>><a href="<?php echo base_url('SuperAdmin/DtPenerimaSuper') ?>">Data Penerima Bantuan</a></li>
                            <li <?=$this->uri->segment(2) == 'KriBoSuper'  ? 'class="active"' : '' ?>><a href="<?php echo base_url('SuperAdmin/KriBoSuper') ?>">Kriteria dan Bobot</a></li>
                            
                            <li <?=$this->uri->segment(2) == 'Petugas'  ? 'class="active"' : '' ?>><a href="<?php echo base_url('SuperAdmin/Petugas') ?>">Data User</a></li>
                            
                        </ul>
                    </li>
                    <li <?=$this->uri->segment(2) == 'FormKuis' || $this->uri->segment(2) == 'DtCalonSuper' ? 'class="active"' : '' ?>>
                        <a href="#Patients" class="has-arrow"><i class="fa fa-table"></i><span>PROSES SELEKSI</span></a>
                        <ul>

                            <!-- <li <?=$this->uri->segment(2) == 'FormKuis'  ? 'class="active"' : '' ?>><a href="<?php echo base_url('SuperAdmin/FormKuis') ?>">Calon Graduasi PKH</a></li> -->
                            <li <?=$this->uri->segment(2) == 'DtCalonSuper'  ? 'class="active"' : '' ?>><a href="<?php echo base_url('SuperAdmin/DtCalonSuper') ?>">Data Peserta Graduasi</a></li>
                            
                        </ul>
                        
                    </li>
                    <li <?=$this->uri->segment(2) == 'DetailPerhitungan' || $this->uri->segment(2) == 'Hasil'  ? 'class="active"' : '' ?>>
                        <a href="<?php echo base_url('SuperAdmin/Hasil') ?>"><i class="fa fa-th-list"></i> <span>LAPORAN HASIL SELEKSI</span></a>
                    </li>
                    

                    
                    
                    
                </ul>
            </nav>     
        </div>
    </div>
    
    