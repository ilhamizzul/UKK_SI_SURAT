<?php 
	header('Content-type: application/vnd-ms-excel');
	header('Content-distribution: attachment; filename=surat_keluar.xls');
?>

<div class="row">
	<div class="col-md-12">
		<!-- BORDERED TABLE -->
		<div class="panel">
			<div class="panel-heading">
				<center>
				<h3 class="panel-title">Surat Keluar</h3>
				</center>
			</div>
			<div class="panel-body">
				<table border="1" class="table table-bordered" style="margin-top: 35px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Nomor Surat</th>
							<th>Penerima</th>
							<th>Tanggal Kirim</th>
							<th>Perihal</th>
						</tr>
					</thead>
					<tbody>

						<?php 
							$no = 1;
							foreach ($surat_keluar as $data) {
								echo '
									<tr>
										<td>'.$no++.'</td>
										<td>'.$data->nomor_surat.'</td>
										<td>'.$data->penerima.'</td>
										<td>'.$data->tgl_kirim.'</td>
										<td>'.$data->perihal.'</td>
									</tr>
								';
							}
						?>
									
					</tbody>
				</table>
			</div>
		</div>
		<!-- END BORDERED TABLE -->
	</div>
</div>