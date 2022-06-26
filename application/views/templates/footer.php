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

<!-- baru -->
<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="/cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7c4c0161bd3ac0fcaba6fb9c-|49" defer=""></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194" integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw==" data-cf-beacon='{"rayId":"7190aab96a2ea132","version":"2021.12.0","r":1,"token":"f79813393a9345e8a59bb86abc14d67d","si":100}' crossorigin="anonymous"></script>



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



	var flash = $('#log').data('flash');
	if(flash) {
		Swal.fire({
			icon: 'success',
			title: 'Berhasil',
			text: flash + ' Login',

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

<?php echo $this->session->flashdata('gagal')?>




</body>
</html>