<?php 
	header('Content-type: application/vnd-ms-excel');
	header('Content-distribution: attachment; filename=data_pegawai.xls');
?>

<div class="row">
	<div class="col-md-12">
		<!-- BORDERED TABLE -->
		<div class="panel">
			<div class="panel-heading">
				<center>
				<h3 class="panel-title">Data Pegawai</h3>
				</center>
			</div>
			<div class="panel-body">
				<table border="1" class="table table-bordered" style="margin-top: 35px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pegawai</th>
							<th>Username</th>
							<th>Nama Jabatan</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							foreach ($pegawai as $data) {
								echo '
									<tr>
										<td>'.$no++.'</td>
										<td>'.$data->nama_pegawai.'</td>
										<td>'.$data->username.'</td>
										<td>'.$data->nama_jabatan.'</td>
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
