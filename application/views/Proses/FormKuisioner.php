
<link href="<?php echo base_url() ?>assets/js/select2/select2.min.css" rel="stylesheet" />


<body>

  <!-- Main body part  -->
  <div id="main-content">
    <div class="container-fluid">
      <!-- Page header section  -->
      <div class="block-header">
        <div class="row clearfix">
          <div class="col-lg-4 col-md-12 col-sm-12">
            <h1>Kuisioner Calon Anggota Graduasi</h1>
            
          </div>
          
        </div>
      </div>

      <div class="row clearfix ">
        <div class=" card  col-lg-12 col-md-12 col-sm-12">
          <div class="col-lg-12  container-fluid">
            <div class="card">
              <div class="body">


                <form action="<?php echo base_url(). 'CalonGraduasi/tambah_aksi'?>" method='post' >
                  <div class="form-group row">
                    <label  class="col-sm-4 ">Nik / Nama <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <select class="form-control show-tick select2" name="id_penerima_bantuan">
                        <option value=""></option>
                        <?php foreach($penerima as $prm){ ?>
                          <?php $cek=0;
                          foreach($dataterisi as $ds){
                            if($ds['id_penerima_bantuan'] == $prm['id_penerima_bantuan']) $cek++;

                          }
                          if($cek == '0'){ ?>
                            <?php if( $prm['status_bantuan'] == 'aktif') { ?>
                              <option value="<?php echo $prm['id_penerima_bantuan']; ?>"><?php echo $prm['nik']; ?>-<?php echo $prm['nama']; ?> </option>
                            <?php } ?>

                          <?php } ?>
                          
                        <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div class="form-group row">
                    <label  class="col-sm-4 ">Periode <span class="text-danger">*</span></label>
                    <div class="col-sm-8">
                      <?php foreach($period as $prd){ ?>
                        <input class="form-control" type="text" disabled name="" value="<?php echo $prd['nama_periode']; ?>" > 
                        <input type="hidden" name="id_periode" value="<?php echo $prd['id_periode']; ?>">
                      <?php } ?>

                    </div>
                  </div>

                  <?php  foreach ($kriteria as $ktr){  ?>
                    <div class="form-group row">
                      <label  class="col-sm-4 "><?php echo $ktr['jenis_kriteria']?> <span class="text-danger">*</span></label>
                      <div class="col-sm-8">
                        <input type="hidden" value="<?php echo $ktr['id_kriteria']?>" name="id_kriteria<?php echo $ktr['id_kriteria']?>">
                        <select class="form-control show-tick select2" name="nilai<?php  echo $ktr['id_kriteria'] ?>">
                          <option value=""></option>
                          <?php foreach($rentang_nilai as $rn){ ?>
                            <?php if ($rn['id_kriteria'] == $ktr['id_kriteria']){ ?>
                              <option value="<?php echo $rn['nilai']." ".$rn['id_rentang']; ?>"><?php echo $rn['jenis_rentang']; ?></option>
                            <?php } ?>

                          <?php } ?>
                        </select>
                      </div>
                    </div>
                  <?php } ?>

                  

                  <div class="col-sm-12 text-right">
                    <button type="submit" style="border-radius: 8px;" class="btn btn-primary">Submit</button>
                    
                  </div>


                </form>
                
                
                
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

</body>

