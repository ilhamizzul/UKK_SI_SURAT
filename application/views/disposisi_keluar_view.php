<div class="row">
	<div class="col-md-12">
		<!-- BORDERED TABLE -->
		<div class="panel">
			<div class="panel-heading">
				<center><h3 class="panel-title">Disposisi</h3>
				<p class="btn btn-primary btn-disabled"><?php echo $nomor_surat->nomor_surat; ?></p></center>
			</div>
			<div class="panel-body">
				<div style="padding-bottom: 15px;">
				<form class="col-md-5" method="post" action="<?php echo base_url() ?>index.php/disposisi/search/<?php echo $this->uri->segment(3) ?>">
				</form>
				<?php 
					if ($status == 'proses') {
						echo '
							<button type="button" data-toggle="modal" data-target="#tambah" class="col-md-2 btn btn-success btn-xs pull-right">Tambah Disposisi</button>
						';
					}
				 ?>
							
				</div>
				<table class="table table-bordered" style="margin-top: 35px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Pengirim</th>
							<th>Penerima</th>
							<th>Tanggal Disposisi</th>
							<th>Keterangan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							foreach ($disposisi as $data) {
								echo'
									<tr>
										<td>'.$no++.'</td>
										<td>'.$this->session->userdata('nama_jabatan').'</td>
										<td>'.$data->penerima.'</td>
										<td>'.$data->tgl_disposisi.'</td>
										<td>'.$data->keterangan.'</td>
										<td>
												<a href="'.base_url().'uploads/'.$data->file_surat.'" target="blank" class="btn btn-primary btn-xs col-md-12">Lihat Surat</a>
												<button type="button" data-toggle="modal" data-target="#hapus_'.$data->id_surat.'" class=" btn btn-danger btn-xs col-md-12">Hapus</button>
										</td>
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

<div class="modal fade" id="tambah" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Tambah Disposisi</h4>
            </div>
            <div class="modal-body col-md-12">
                <form method="post" action="<?php echo base_url() ?>index.php/disposisi_keluar/insert/<?php echo $this->uri->segment(3) ?>" enctype="multipart/form-data">
                	<div class="form-group col-md-12">
                        	<label>Tujuan Pegawai</label>
                            <select class="form-control" name="id_pegawai">
                                <option value="">-- Pilih Pegawai --</option>
                                <?php 
                                	foreach ($pegawai as $data) {
                                		if ($data->level > $this->session->userdata('level')) {
                                			echo '
                                				<option value="'.$data->id_pegawai.'">'.$data->nama_jabatan.' - '.$data->nama_pegawai.'</option>
                                			';
                                		}
                                	}
                                 ?>
                            </select>
                    </div>
                    <div class="form-group col-md-12">
                        	<label>Keterangan</label>
                            <textarea rows="4" name="keterangan" required class="form-control" placeholder="Keterangan . . ." required></textarea>
                    </div>

                    <input type="submit" class="btn btn-success col-md-6 col-md-offset-3" value="Submit" name="">

                </form>
            </div>
        </div>
    </div>
</div>

<?php 
	foreach ($disposisi as $data) {
		echo '
			<div class="modal fade" id="hapus_'.$data->id_surat.'" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h4 class="modal-title" id="defaultModalLabel">Hapus Disposisi</h4>
			            </div>
			            <div class="modal-body">
			                Apakah Anda Yakin Ingin Menghapus Data Disposisi Surat Ini?
			            </div>
			            <div class="modal-footer">
			                <a href="'.base_url().'index.php/disposisi_keluar/delete/'.$data->id_disposisi.'/'.$data->id_surat.'" class="btn btn-danger btn-xs">hapus</a>
			                <button type="button" class="btn btn-default btn-xs" data-dismiss="modal">Tutup</button>
			            </div>
			        </div>
			    </div>
			</div> 
		';
	}
?>