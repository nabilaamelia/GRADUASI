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
		
		<div align="center">
			<h2 style="margin-top: 5px;"> Hasil Rekomendasi Graduasi PKH </h2>
			<?php foreach ($periode as $prd ) { ?>
				<h2 style="margin-top: 5px;"> <?php echo $prd['nama_periode']?> </h2>
			<?php }?>
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


