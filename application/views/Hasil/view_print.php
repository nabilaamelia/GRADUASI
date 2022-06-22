<!DOCTYPE html>
<html><head>
	<title>Data UMKM</title>
</head><body>
	<style>
		p {
			font-size: 12pt
		}

		table, td, th {  
			border: 1px solid #474747;
		}

		table {
			border-collapse: collapse;
			width: 100%;
		}

		th, td {
			padding: 6px;
		}
	</style>
	<div>
		<strong><p style="text-align: center; margin-bottom:25px; font-size: 14pt">Data UMKM Kabupaten Madiun</p></strong>
		<table>
			<thead>
				<tr>
					<th style="text-align: center;">Nama UMKM</th>
					<th style="text-align: center;">Nama Pemilik</th>
					<th style="text-align: center;">No. HP</th>
					<th style="text-align: center;">Alamat</th>
					<th style="text-align: center;">Kecamatan</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($penjual as $pnj): ?>
					<tr>
						<td><?php echo $pnj->nama_umkm?></td>
						<td><?php echo $pnj->nama_pemilik?></td>
						<td><?php echo $pnj->no_hp?></td>
						<td><?php echo $pnj->alamat_penjual?></td>
						<td><?php echo $pnj->kecamatan?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
	
</body></html>