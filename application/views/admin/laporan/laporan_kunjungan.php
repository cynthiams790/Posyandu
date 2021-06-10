<div class="container-fluid">
	<h4 class="text-center">Laporan Rekam Medis</h4>
	<small class="text-center">Jl.Krakatau, Jakarta</small>
  <center><img src="<?php echo base_url(); ?>assets/img/flamboyans.jpg" class="img-fluid rounded" width="300px"><br>
  <br><br>
	<div class="row">
		<div class="col-md">
			<table class="table table-striped">
        <thead>
          <tr>
            <td>No</td>
            <td>Tanggal Kunjungan</td>
            <td>Bayi</td>
            <td>Umur</td>
            <td>Jenis Kelamin</td>
            <td>Tindakan</td>
            <td>Diagnosa</td>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; foreach($kunjungan as $u) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $u['tgl_berobat']; ?></td>
              <td><?= $u['nama_bayi']; ?></td>
              <td><?= $u['umur_bayi']; ?></td>
              <td><?= $u['jk_bayi'] == 'L' ? 'Laki-Laki' : 'Perempuan'; ?></td>
              <td><?= $u['tindakan']; ?></td>
              <td><?= $u['diagnosa']; ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
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