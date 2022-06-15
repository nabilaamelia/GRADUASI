<!doctype html>
    <html lang="en">
    


    <!-- Main body part  -->
    <div id="main-content">
        <div class="container-fluid">
            <!-- Page header section  -->
            <div class="block-header">
                <div class="row clearfix">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <h1>Data Hasil Kuisioner Calon Anggota Graduasi</h1>
                        
                    </div>
                    
                    <div class="col-lg-6 col-md-12 col-sm-12 text-lg-right">
                        <div class="d-flex align-items-center justify-content-lg-end mt-4 mt-lg-0 flex-wrap vivify pullUp delay-550">

                            <div class="border-right pr-4 mr-4 mb-2 mb-xl-0">
                                <p class="text-muted mb-1">Total</p>
                                <h5 class="mb-0">420</h5>
                            </div>

                            
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row clearfix">
                <div class="col-12">
                    <div class="card">
                        <div class="body">

                        </div>
                        <div class="table-responsive container-fluid mb-3">
                            <table  class="table table-bordered table-hover js-basic-example dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr class="table-active"> 
                                        <th><strong>No</strong></th>
                                        <th><strong>Nama</strong></th>
                                        <th><strong>Nik</strong></th>
                                        <th><strong>Periode</strong></th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $no = 1;
                                        foreach($penerima as $prm) { ?>
                                        <tr>
                                          <th><?= $no++; ?></th>
                                          <td><?= $prm['nama'] ?></td>
                                          <td><?= $prm['nik'] ?></td>
                                          <td><?= $prm['nama_periode'] ?></td>
                                          
                                      </tr>
                                      <?php } ?>
                                      
                                  </tbody>
                              </table>
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
