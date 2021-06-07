<div class="container-fluid">
	<h4 class="text-center">Posyandu Flamboyan</h4>
	<small class="text-center">Jl.Krakatau, Jakarta</small>
	<div class="row">
		<div class="col-md">
			<table class="table text-center">
				<tr>
					<th>No</th>
					<th>Nama imunisasi</th>
				</tr>
				<?php $no = 1; foreach($imunisasi as $d) : ?>
					<tr>
						<td><?= $no++; ?></td>
						<td><?= $d['nama_imunisasi']; ?></td>
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