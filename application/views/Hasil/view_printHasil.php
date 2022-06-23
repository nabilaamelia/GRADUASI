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
		<title>Cetak Detail Perhitungan Hasil Rekomendasi Graduasi PKH</title>
	</head>
	<body>
		<div align="center" style="margin-bottom: 10px;">
			<h2>PENGEPUL MADU HUTAN</h2>
			<h2 style="margin-top: 0px; margin-bottom: 0px;">SUPLIER MADU BUDIDAYA</h2>
			<h2 style="margin-top: 0px; margin-bottom: 0px;">PRODUSEN MADU HERBAL</h2>
			<div style="height: 10px;"></div>
			<span style="margin-top: 0px;">Jl Mundu, Ds. Sugihwaras Kec. Saradan</span><br>
			<span>Kabupaten Madiun, Jawa Timur 63155</span>
		</div>
		<br>
		<div style="width: 100%; background-color: black; height: 3px;"></div>
		<div style="width: 100%; background-color: black; height: 1px; margin-top: 1px;"></div>
		<div align="center">
			<h2 style="margin-top: 5px;"> Hasil Rekomendasi Graduasi PKH </h2>
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


