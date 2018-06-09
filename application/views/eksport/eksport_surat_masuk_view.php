<?php 
	header('Content-type: application/vnd-ms-excel');
	header('Content-distribution: attachment; filename=surat_masuk.xls');
?>

<div class="row">
	<div class="col-md-12">
		<!-- BORDERED TABLE -->
		<div class="panel">
			<div class="panel-heading">
				<center>
				<h3 class="panel-title">Surat Masuk</h3>
				</center>
			</div>
			<div class="panel-body">
				<table border="1" class="table table-bordered" style="margin-top: 35px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Nomor Surat</th>
							<th>Pengirim</th>
							<th>Penerima</th>
							<th>Tanggal Kirim</th>
							<th>Tanggal Terima</th>
							<th>Perihal</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>

						<?php 
							$no = 1;
							foreach ($surat_masuk as $data) {
								echo '
									<tr>
										<td>'.$no++.'</td>
										<td>'.$data->nomor_surat.'</td>
										<td>'.$data->pengirim.'</td>
										<td>'.$data->penerima.'</td>
										<td>'.$data->tgl_kirim.'</td>
										<td>'.$data->tgl_terima.'</td>
										<td>'.$data->perihal.'</td>
										<td>
										';
										if ($data->status == 'proses') {
											echo '
												<span class="label label-danger">'.$data->status.'</span>
											';
										} else {
											echo '
												<span class="label label-success">'.$data->status.'</span>
											';
										}
										
							}
						?>
									
					</tbody>
				</table>
			</div>
		</div>
		<!-- END BORDERED TABLE -->
	</div>
</div>



			
	
			