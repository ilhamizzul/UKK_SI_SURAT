<?php 
	header('Content-type: application/vnd-ms-excel');
	header('Content-distribution: attachment; filename=data_disposisi.xls');
?>

<div class="row">
	<div class="col-md-12">
		<!-- BORDERED TABLE -->
		<div class="panel">
			<div class="panel-heading">
				<center><h3 class="panel-title">Disposisi</h3>
				<p class="btn btn-primary btn-disabled"><?php echo $nomor_surat->nomor_surat; ?></p></center>
			</div>
			<div class="panel-body">
				<table border="1" class="table table-bordered" style="margin-top: 35px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Pengirim</th>
							<th>Penerima</th>
							<th>Tanggal Disposisi</th>
							<th>Keterangan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							foreach ($disposisi as $data) {
								echo'
									<tr>
										<td>'.$no++.'</td>
										<td>'.$data->pengirim.'</td>
										<td>'.$data->penerima.'</td>
										<td>'.$data->tgl_disposisi.'</td>
										<td>'.$data->keterangan.'</td>
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