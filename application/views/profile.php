<!doctype html>
    <html lang="en">


    <!-- Main body part  -->
    <div id="main-content">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <h1>Profil Petugas</h1>
                        
                    </div>
                    
                </div>
            </div>

            <div class="row clearfix ">
                <div class=" card  col-lg-12 col-md-12 col-sm-12">
                    <div class="col-lg-12  container-fluid">
                        <div class="card ">
                            <div class="body ">

                                <div class="container mt-2 mb-5">
                                    <div class="row" >
                                        <div class="col-lg-4">
                                            <img src="<?php echo base_url() ?>uploads/<?= $this->session->userdata('foto');?> " class="card-img-top " style="width: 15rem;" alt="...">
                                        </div>
                                        <div class="col-lg-8">
                                            <table class="table  mt-4 ">
                                                <tr>
                                                    <td><strong>Nama</strong></td>
                                                    <td><?php echo $this->session->userdata('nama'); ?></td>
                                                </tr>
                                                <tr>
                                                    <td><strong>No Hp</strong></td>
                                                    <td><?php echo $this->session->userdata('nohp'); ?></td>
                                                </tr>

                                                <tr>
                                                    <td><strong>alamat</strong></td>
                                                    <td><?php echo $this->session->userdata('alamat'); ?></td>
                                                </tr>

                                                <tr>
                                                    <td><strong>Status</strong></td>
                                                    <td><?php echo $this->session->userdata('level'); ?></td>

                                                </tr>

                                            </table>
                                            
                                            
                                        </div>
                                    </div>

                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                </div>
                
            </div>

        </body>

        </html>
