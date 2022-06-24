<!doctype html>
	<html lang="en">
	<body>

		<!-- Main body part  -->
		<div id="main-content">
			<div class="container-fluid">
				<!-- Page header section  -->
				<div class="block-header">
					<div class="row clearfix">
						<div class="col-lg-4 col-md-12 col-sm-12">
							<h1>Edit Kuisioner Calon Anggota Graduasi</h1>


						</div>

					</div>
				</div>

				<div class="row clearfix ">
					<div class=" card  col-lg-12 col-md-12 col-sm-12">
						<div class="col-lg-12  container-fluid">
							<div class="card">
								<div class="body">


									<form method='post' action="<?php echo base_url()?>CalonGraduasi/EditKuis" >
										<div class="form-group row">
											<label  class="col-sm-4 ">Nik / Nama <span class="text-danger">*</span></label>
											<div class="col-sm-8">
												<?php foreach($penerima as $prm){ ?>
													<input class="form-control" type="text" disabled name="" value="<?php echo $prm['nik']; ?>-<?php echo $prm['nama']?>" > 

												<?php } ?>
											</div>
										</div>

										<div class="form-group row">
											<label  class="col-sm-4 ">Periode <span class="text-danger">*</span></label>
											<div class="col-sm-8">
												<?php foreach($period as $prd){ ?>
													<input class="form-control" type="text" disabled name="" value="<?php echo $prd['nama_periode']; ?>" > 

												<?php } ?>

											</div>
										</div>

										<?php  foreach ($kriteria as $ktr){  ?>
											<?php $cek1= 0; 
											foreach ($kuisioner as $kuis ) { ?>
												<?php if ($ktr['id_kriteria'] == $kuis['id_kriteria']) { ?>
													<input type="hidden" name="id_kuisioner<?php echo $ktr['id_kriteria'] ?>" value="<?php echo $kuis['id_kuisioner']?>">

												<?php }?>
											<?php } ?>

											<div class="form-group row">
												<label  class="col-sm-4 "><?php echo $ktr['jenis_kriteria']?> <span class="text-danger">*</span></label>
												<div class="col-sm-8">
													<input type="hidden" value="<?php echo $ktr['id_kriteria']?>" name="id_kriteria<?php echo $ktr['id_kriteria']?>">
													<select class="form-control show-tick select2" name="nilai<?php  echo $ktr['id_kriteria'] ?>">

														<?php foreach($rentang_nilai as $rn){ ?>
															<?php if ($rn['id_kriteria'] == $ktr['id_kriteria']){ ?>

																<?php $cek = 0;
																foreach ($kuisioner as $kuis) {
																	if($kuis['id_rentang'] == $rn['id_rentang']) $cek++;

																} 
																if($cek > 0) { ?>
																	<option value="<?php echo $rn['nilai']." ".$rn['id_rentang']; ?>" selected><?php echo $rn['jenis_rentang']; ?></option>

																<?php } else { ?>
																	<option value="<?php echo $rn['nilai']." ".$rn['id_rentang']; ?>"><?php echo $rn['jenis_rentang']; ?></option>
																<?php } ?>




															<?php } ?>

														<?php } ?>
													</select>
												</div>
											</div>
										<?php } ?>



										<div class="col-sm-12 text-right">
											<button type="submit" style="border-radius: 8px;" class="btn btn-primary">Edit</button>
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
</html>
