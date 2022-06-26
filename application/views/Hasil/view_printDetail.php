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
		<div align="center">
			<h2 style="margin-top: 5px;">Detail Perhitungan Hasil Rekomendasi Graduasi PKH </h2>
			
		</div>

		<div>
			<div>
				<h3>Matrik Keputusan / Nilai Awal</h3>
			</div>
			<div style="margin-top: 10px;">
				<table width="100%">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama</th>
							<?php
							$no = 1;
							foreach ($kriteria as $ktr){?>
								<th style="text-align: center;"><?php echo $ktr['nama_kode'] ?></th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach($penerima as $prm) { ?>
							<tr>
								<td style="text-align: center;"><?= $no++; ?></td>
								<td><?= $prm['nama'] ?></td>

								<?php 
								$cek = 0;

								foreach($kriteria as $ktr) {

									foreach($kuisioner as $kuis) {
										if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
											$cek++;
											$nilai = $kuis['nilai'];
										}
									} if($cek > 0) { ?>

										<td style="text-align: center;" ><?= $nilai ?></td>

									<?php } ?>



								<?php } ?>
							</tr>
						<?php } ?>

					</tbody>
					

				</table>
			</div>
		</div>


		<div>
			<div>
				<h3>Mencari nilai max / min</h3>
			</div>
			<div style="margin-top: 10px;">
				<table width="100%">
					<thead>
						<tr>
							<?php
							$no = 0;
							foreach ($kriteria as $ktr){?>

								<th style="text-align: center;"><?php echo $ktr['nama_kode'] ?></th>

							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 0;
						foreach ($kriteria as $ktr){?>
							<?php if($ktr['atribut'] == 'Benefit') { ?>
								<td style="text-align: center;" ><?php  echo $ktr['max']->nilai ?></td>
							<?php } else { ?>
								<td style="text-align: center;" ><?php  echo $ktr['min']->nilai ?></td>
							<?php } ?>

						<?php } ?>

					</tbody>
					

				</table>
			</div>
		</div>


		<div>
			<div>
				<h3>Matrik Ternormalisasi</h3>
			</div>
			<div style="margin-top: 10px;">
				<table width="100%">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama</th>
							<?php
							$no = 1;
							foreach ($kriteria as $ktr){?>
								<th style="text-align: center;"><?php echo $ktr['nama_kode'] ?></th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach($penerima as $prm) { ?>
							<tr>
								<td style="text-align: center;"><?= $no++; ?></td>
								<td ><?= $prm['nama'] ?></td>

								<?php 

								foreach($kriteria as $ktr) {
									$cek = 0;
									foreach($kuisioner as $kuis) {
										if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
											$cek++;
											$nilai = $kuis['nilai'];

											if($ktr['atribut'] == 'Benefit'){
												$max = $ktr['max']->nilai;
												$normalisasi = $nilai/$max;
											} else {
												$min = $ktr['min']->nilai;
												$normalisasi = $min/$nilai;
											}


										}
									} if ($cek > 0) { ?>
										<td style="text-align: center;"><?= number_format($normalisasi, 2) ?></td>
									<?php } ?>
								<?php } ?>


							</tr>

						<?php } ?>



					</tbody>


				</table>
			</div>
		</div>


		<div>
			<div>
				<h3>Nilai Preferensi</h3>
			</div>
			<div style="margin-top: 10px;">
				<table width="100%">
					<thead>
						<tr>
							<th style="text-align: center;">No</th>
							<th style="text-align: center;">Nama</th>
							<?php
							$no = 1;
							foreach ($kriteria as $ktr){?>
								<th style="text-align: center;"><?php echo $ktr['nama_kode'] ?></th>
							<?php } ?>
						</tr>
					</thead>
					<tbody>
						<?php 
						$no = 1;
						foreach($penerima as $prm) { ?>
							<tr>
								<td style="text-align: center;"><?= $no++; ?></td>
								<td><?= $prm['nama'] ?></td>

								<?php 

								foreach($kriteria as $ktr) {

									$cek = 0;
									foreach($kuisioner as $kuis) {
										if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
											$cek++;
											$nilai = $kuis['nilai'];

											if($ktr['atribut'] == 'Benefit'){
												$max = $ktr['max']->nilai;
												$normalisasi = $nilai/$max;
												$preferensi  = $normalisasi * $ktr['bobot'];
											} else {
												$min = $ktr['min']->nilai;
												$normalisasi = $min/$nilai;
												$preferensi  = $normalisasi * $ktr['bobot'];
											}


										}
									} if ($cek > 0) { ?>
										<td style="text-align: center;"><?= number_format($preferensi, 2) ?></td>
									<?php } ?>
								<?php } ?>


							</tr>

						<?php } ?>


					</tbody>


				</table>
			</div>
		</div>

		<div>
			<div>
				<h3>Nilai Total Preferensi</h3>
			</div>
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
								<td ><?= $prm['nama'] ?></td>

								<?php 
								$total = 0;
								foreach($kriteria as $ktr) {

									$cek = 0;
									foreach($kuisioner as $kuis) {
										if($prm['id_detail_periode'] == $kuis['id_detail_periode'] && $ktr['id_kriteria'] == $kuis['id_kriteria'] ) {
											$cek++;
											$nilai = $kuis['nilai'];

											if($ktr['atribut'] == 'Benefit'){
												$max = $ktr['max']->nilai;
												$normalisasi = $nilai/$max;
												$preferensi  = $normalisasi * $ktr['bobot'];
												$total+= $preferensi;
											} else {
												$min = $ktr['min']->nilai;
												$normalisasi = $min/$nilai;
												$preferensi  = $normalisasi * $ktr['bobot'];
												$total+= $preferensi;
											}


										}
									} 


								} ?>


								<td style="text-align: center;"><?php echo number_format($total, 2) ?></td>
							</tr>

						<?php } ?>

					</tbody>


				</table>
			</div>
		</div>





	</body>
	</html>


