<!doctype html>
	<html>
	<head>
		<style>
			table {
				border-collapse: collapse;
			}
			table td {
				border: 1.3px solid black;
				background-color: #fffff;
			} 
			table tr {
				border: 0px solid black;
				
			}

			table th {
				border: 1.3px solid black;
				background-color: #DCDCDC;
			}
		</style>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Cetak Hasil Rekomendasi Graduasi PKH</title>
	</head>
	<body>
		
		<div align="center" style="margin-bottom: 5px;">
			<h2 style="margin-top: 0px; margin-bottom: 0px;">HASIL REKOMENDASI GRADUASI PKH</h2>
			<h2 style="margin-top: 0px; margin-bottom: 0px;">DESA SUGIHWARAS</h2>
			<?php function tgl_indo($tgl){
				$bulan=array(
					1=>'Januari',
					'Februari',
					'Maret',
					'April',
					'Mei',
					'Juni',
					'Juli',
					'Agustus',
					'September',
					'Oktober',
					'November',
					'Desember'
				);

				$pecahkan=explode('-', $tgl);
				return $pecahkan[2]. ' '. $bulan[(int)$pecahkan[1]]. ' '. $pecahkan[0];

				// Variabel pecahkan 0 = tanggal
				// variabel pecahkan 1 = bulan
				// variabel pecahkan 2 = tahun

			} ?>
			<?php foreach ($periode as $prd ) {?>
				<h2 style="margin-top: 0px; margin-bottom: 0px;"><?php echo $prd['nama_periode']?> </h2>
				<h3 style="margin-top: 0px; margin-bottom: 0px;">(<?php echo tgl_indo($prd['tgl_dimulai']);?> - <?php echo tgl_indo($prd['tgl_berakhir']);?>)</h3>
			<?php }?>
			<div style="height: 5px;"></div>

			<br>
			<div style="width: 100%; background-color: black; height: 3px;"></div>
			<div style="width: 100%; background-color: black; height: 1px; margin-top: 1px; margin-bottom: 30px;"></div>



			
		</div>

		<div>
			
			<div style="margin-top: 10px;">
				<table width="100%">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama</th>
							<th style="text-align: center;">Total</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach($penerima as $prm) { ?>
							<tr>
								<td style="text-align: center;"><?= $no++; ?></td>
								<td><?= $prm['nama'] ?></td>
								<td style="text-align: center;"><?php echo $prm['total'] ?></td>
							</tr>

						<?php } ?>

					</tbody>


				</table>
			</div>
		</div>

	</body>
	</html>


