<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<!-- BORDERED TABLE -->
		<div class="panel col-md-12 col-sm-12 col-xs-12">
			<div class="panel-heading">
				<center>
				<h3 class="panel-title">Surat Keluar</h3>
				</center>
			</div>
			<div class="panel-body col-xs-12">
				<div style="padding-bottom: 15px;">
				<form class="col-md-5 col-sm-12 col-xs-12" method="post" action="<?php echo base_url() ?>index.php/surat_keluar/search">
					<div class="input-group">
						<input type="text" value="Cari" name="search" class="form-control" placeholder="">
						<span class="input-group-btn"><input type="submit" value="Go" class="btn btn-info" name=""></span>
					</div>
				</form>
				<button type="button" data-toggle="modal" data-target="#tambah" class="col-md-2 col-sm-6 col-xs-6 btn btn-success pull-right"><span class="fa fa-plus"></span> Tambah Surat</button>
				<button type="button" data-toggle="modal" data-target="#eksport" class="col-md-2 col-sm-6 col-xs-6 btn btn-primary pull-right"><span class="fa fa-table"></span> Eksport</button>
				</div>
				<table class="table table-bordered col-sm-12 col-xs-12 table-responsive" style="margin-top: 35px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Nomor Surat</th>
							<th>Penerima</th>
							<th>Tanggal Kirim</th>
							<th>Perihal</th>
							<th>Aksi</th>
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
										<td>
												<a href="'.base_url().'uploads/'.$data->file_surat.'" target="blank" class="btn btn-primary btn-xs col-xs-12">Lihat</a>
												<button type="button" data-toggle="modal" data-target="#edit_data_'.$data->id_surat.'" class=" btn btn-success btn-xs col-xs-12">Edit Surat</button>
												<button type="button" data-toggle="modal" data-target="#edit_pdf_'.$data->id_surat.'" class=" btn btn-warning btn-xs col-xs-12">Edit PDF</button>
													<button type="button" data-toggle="modal" data-target="#hapus_'.$data->id_surat.'" class=" btn btn-danger btn-xs col-xs-12">Hapus</button>
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
                <h4 class="modal-title" id="defaultModalLabel">Tambah Surat Masuk</h4>
            </div>
            <div class="modal-body col-md-12">
                <form method="post" action="<?php  echo base_url() ?>index.php/surat_keluar/insert" enctype="multipart/form-data">
                	<div class="form-group col-md-12">
                        	<label>Nomor Surat</label>
                            <input type="text" class="form-control" required name="nomor_surat" placeholder="Nomor Surat . . ." />
                    </div>
                    <div class="form-group col-md-12">
                        	<label>Penerima</label>
                            <input type="text" class="form-control" required name="penerima" placeholder="Penerima . . ." />
                    </div>
                    <div class="form-group col-md-12">
                        	<label>Tanggal Kirim</label>
                            <input type="date" name="tgl_kirim" required class="form-control" />
                    </div>
                    <div class="form-group col-md-12">
                        	<label>File Surat (*pdf)</label>
                            <input type="file" name="file_surat" required class="form-control" />
                    </div>
                    <div class="form-group col-md-12">
                        	<label>Perihal</label>
                            <textarea rows="4" name="perihal" required class="form-control" placeholder="Perihal . . ."></textarea>
                    </div>

                    <input type="submit" class="btn btn-success col-md-6 col-md-offset-3" value="Submit" name="">
                    <button type="button" class="btn btn-info col-md-6 col-md-offset-3" data-dismiss="modal">Tutup</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="eksport" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Eksport Surat Keluar</h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin mengEksport Surat Keluar Ini?
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url() ?>index.php/eksport/surat_keluar" class="btn btn-success btn-xs">Eksport</a>
                <button type="button" class="btn btn-info btn-xs" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> 
<?php 
	foreach ($surat_keluar as $data) {
		echo '
			<div class="modal fade" id="edit_data_'.$data->id_surat.'" tabindex="-1" role="dialog">
			    <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content col-md-12">
			            <div class="modal-header">
			                <h4 class="modal-title" id="defaultModalLabel">Ubah Surat Keluar</h4>
			            </div>
			            <div class="modal-body col-md-12">
			                <form method="post" action="'.base_url().'index.php/surat_keluar/update_data/'.$data->id_surat.'">
			                	<div class="form-group col-md-12">
			                        	<label>Nomor Surat</label>
			                            <input type="text" class="form-control" required name="nomor_surat" value="'.$data->nomor_surat.'" placeholder="Nomor Surat . . ." />
			                    </div>
			                    <div class="form-group col-md-12">
			                        	<label>Penerima</label>
			                            <input type="text" class="form-control" required name="penerima" value="'.$data->penerima.'" placeholder="Penerima . . ." />
			                    </div>
			                    <div class="form-group col-md-12">
			                        	<label>Tanggal Kirim</label>
			                            <input type="date" name="tgl_kirim" required value="'.$data->tgl_kirim.'" class="form-control" />
			                    </div>
			                    <div class="form-group col-md-12">
			                        	<label>Perihal</label>
			                            <textarea rows="4" name="perihal" required class="form-control" placeholder="Perihal . . .">'.$data->perihal.'</textarea>
			                    </div>

			                    <input type="submit" class="btn btn-success col-md-6 col-md-offset-3" value="Submit" name="">
			                    <button type="button" class="btn btn-info col-md-6 col-md-offset-3" data-dismiss="modal">Tutup</button>
			                </form>
			            </div>
			        </div>
			    </div>
			</div>
		';
	}

	foreach ($surat_keluar as $data) {
		echo '
			<div class="modal fade" id="edit_pdf_'.$data->id_surat.'" tabindex="-1" role="dialog" >
			    <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content col-md-12">
			            <div class="modal-header">
			                <h4 class="modal-title" id="defaultModalLabel">Ubah Surat Keluar</h4>
			            </div>
			            <div class="modal-body col-md-12">
			                <form method="post" action="'.base_url().'index.php/surat_keluar/update_pdf/'.$data->id_surat.'" enctype="multipart/form-data">
			                	<div class="form-group">
		                        	<label>File Surat (*pdf)</label>
		                            <input type="file" required name="file_surat" class="form-control" >
			                    </div>

			                    <input type="submit" class="btn btn-success col-md-6 col-md-offset-3" value="Submit" name="">
			                    <button type="button" class="btn btn-info col-md-6 col-md-offset-3" data-dismiss="modal">Tutup</button>
			                </form>
			            </div>
			        </div>
			    </div>
			</div>
		';
	}

	foreach ($surat_keluar as $data) {
		echo '
			<div class="modal fade" id="hapus_'.$data->id_surat.'" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h4 class="modal-title" id="defaultModalLabel">Hapus Surat '.$data->nomor_surat.'</h4>
			            </div>
			            <div class="modal-body">
			                Apakah Anda Yakin Ingin Menghapus Data Surat dengan Nomor Surat <strong>'.$data->nomor_surat.'</strong>?
			            </div>
			            <div class="modal-footer">
			                <a href="'.base_url().'index.php/surat_keluar/delete/'.$data->id_surat.'" class="btn btn-danger btn-xs">hapus</a>
			            </div>
			        </div>
			    </div>
			</div> 
		';
	}

?>

			
	
			