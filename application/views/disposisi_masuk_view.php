<div class="row">
	<div class="col-md-12">
		<!-- BORDERED TABLE -->
		<div class="panel">
			<div class="panel-heading">
				<center><h3 class="panel-title">Disposisi Masuk</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered" style="margin-top: 35px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Unit Pengirim</th>
							<th>Nama Pengirim</th>
							<th>Tanggal Disposisi</th>
							<th>Keterangan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							foreach ($disposisi as $data) {
								echo '
									<tr>
										<td>'.$no++.'</td>
										<td>'.$data->nama_jabatan.'</td>
										<td>'.$data->nama_pengirim.'</td>
										<td>'.$data->tgl_disposisi.'</td>
										<td>'.$data->keterangan.'</td>
										<td>
											<a href="'.base_url().'uploads/'.$data->file_surat.'" target="blank" class="btn btn-primary btn-xs col-md-12">Lihat Surat</a>';

											if ($this->session->userdata('level') < 6) {
												echo '
													<a href="'.base_url().'index.php/disposisi_keluar/lihat_disposisi/'.$data->id_surat.'/'.$data->status.'" class=" btn btn-info btn-xs col-md-12"><span class="fa fa-plus"></span>Tambah Disposisi</a>
												';
											} 
											
													
										echo '</td>
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

