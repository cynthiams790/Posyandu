<div class="container-fluid">
	<h4 class="text-center">Laporan Data Bayi</h4>
	<small class="text-center">Jl.Krakatau, Jakarta</small>
 	<center><img src="<?php echo base_url(); ?>assets/img/flamboyans.jpg" class="img-fluid rounded" width="300px"><br>
  	<br><br>
	<div class="row">
		<div class="col-md">
			<table class="table text-center">
				<tr>
					<th>No</th>
					<th>Nama Bayi</th>
					<th>Jenis Kelamin Bayi</th>
					<th>Umur</th>
				</tr>
				<?php $no = 1; foreach($bayi as $d) : ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $d['nama_bayi']; ?></td>
						<td><?= $d['jk_bayi'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
						<td><?= $d['umur_bayi']; ?></td>
					</tr>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 offset-md-8">
			<table>
				<tr>
					<td></td>
					<td>
						<?php $tgl = date_create(date('d-m-Y')); ?>
						<p>Jakarta, <?= date_format($tgl, 'd M Y'); ?>
							<br>
							Administrator <br><br>
							______________________
						</p>
					</td>
				</tr>
			</table>
		</div>
	</div>
</div>

<script>
	window.print();
</script>