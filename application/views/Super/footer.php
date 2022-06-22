<!-- Javascript -->
<script src="<?php echo base_url() ?>assets/dist/assets/bundles/libscripts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/dist/assets/bundles/vendorscripts.bundle.js"></script>

<!-- Vedor js file and create bundle with grunt  --> 
<script src="<?php echo base_url() ?>assets/dist/assets/bundles/flotscripts.bundle.js"></script><!-- flot charts Plugin Js -->
<script src="<?php echo base_url() ?>assets/dist/assets/bundles/c3.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/dist/assets/bundles/apexcharts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/dist/assets/bundles/jvectormap.bundle.js"></script>
<!-- <script src="<?php echo base_url() ?>assets/dist/assets/vendor/toastr/toastr.js"></script> -->

<!-- Project core js file minify with grunt --> 
<script src="<?php echo base_url() ?>assets/dist/assets/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/js/index.js"></script>


<!-- Project core js file minify with grunt --> 
<script src="<?php echo base_url() ?>assets/dist/assets/bundles/mainscripts.bundle.js"></script>

<!-- Vedor js datatable  --> 
<script src="<?php echo base_url() ?>assets/dist/assets/bundles/datatablescripts.bundle.js"></script>

<script src="<?php echo base_url() ?>assets/dist/assets/bundles/mainscripts.bundle.js"></script>
<script src="<?php echo base_url() ?>assets/js/pages/tables/jquery-datatable.js"></script>

<!-- sweetalert -->
<script src="<?php echo base_url() ?>assets/js/sweetallert/sweetalert2.min.js"></script>
<script type="">
	var flash = $('#flash').data('flash');
	if(flash) {
		Swal.fire({
			icon: 'success',
			title: 'sukses',
			text: flash + ' Data',

		})
	}

	$(document).on('click', '#btn-logout', function(e){
		e.preventDefault();
		var link = $(this).attr('href');


		Swal.fire({
			title: 'Konfirmasi!',
			text: "Apakah anda yakin ingin logout ?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#00a65a',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = link;
			}
		})
	})

	$(document).on('click', '#btn-hapus', function(e){
		e.preventDefault();
		var link = $(this).attr('href');


		Swal.fire({
			title: 'Konfirmasi!',
			text: "Apakah anda yakin ingin menghapus ?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#00a65a',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location = link;

			}
		})
	})
</script>




</body>
</html>