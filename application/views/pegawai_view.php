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
				<div style="padding-bottom: 15px;">
				<button type="button" data-toggle="modal" data-target="#tambah" class="col-md-2 btn btn-success btn-xs pull-right">Tambah Pegawai</button>
				<button type="button" data-toggle="modal" data-target="#eksport" class="col-md-2 btn btn-primary btn-xs pull-right"><span class="fa fa-table"></span> Eksport</button>
				</div>
				<table class="table table-bordered" style="margin-top: 35px;">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pegawai</th>
							<th>Username</th>
							<th>Nama Jabatan</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php 
							$no = 1;
							foreach ($pegawai as $data) {
								if ($data->level > $this->session->userdata('level')) {
									
									echo '
										<tr>
											<td>'.$no++.'</td>
											<td>'.$data->nama_pegawai.'</td>
											<td>'.$data->username.'</td>
											<td>'.$data->nama_jabatan.'</td>
											<td>
											<center>
											';

											if ($data->level > 1) {
												echo '
													<button type="button" data-toggle="modal" data-target="#edit_'.$data->id_pegawai.'" class=" btn btn-warning btn-xs">Edit</button>
												';
											} 
											
													
												echo '
												<button type="button" data-toggle="modal" data-target="#hapus_'.$data->id_pegawai.'" class=" btn btn-danger btn-xs">Hapus</button></center>
											</td>
										</tr>
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

<div class="modal fade" id="tambah" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content col-md-12">
            <div class="modal-header">
                <h4 class="modal-title" id="defaultModalLabel">Tambah User</h4>
            </div>
            <div class="modal-body col-md-12">
                <form method="post" action="<?php echo base_url() ?>index.php/pegawai/insert" enctype="multipart/form-data">
                	<div class="form-group col-md-12">
                        	<label>Pilih Jabatan</label>
                            <select class="form-control" name="id_jabatan">
                                <option  value="">-- Pilih Pegawai --</option>
                                <?php 
                                	foreach ($jabatan as $data) {
                                		echo '
                                			<option  value="'.$data->id_jabatan.'">'.$data->nama_jabatan.'</option>
                                		';
                                	}
                                ?>
                                
                            </select>
                    </div>
                    <div class="form-group col-md-12">
                        	<label>Nama Pegawai</label>
                            <input type="text" class="form-control" name="nama_pegawai" required placeholder="Nama Pegawai . . ." />
                    </div>
                    <div class="form-group col-md-6">
                        	<label>Username</label>
                            <input type="text" class="form-control" name="username" required placeholder="Username . . ." />
                    </div>
                    <div class="form-group col-md-6">
                        	<label>Password</label>
                            <input type="password" class="form-control" name="password" required placeholder="Password . . ." />
                    </div>
                    <div class="form-group col-md-12">
                        	<label>Foto Profil</label>
                            <input type="file" name="foto" class="form-control" required />
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
                <h4 class="modal-title" id="defaultModalLabel">Eksport Data Pegawai</h4>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin mengEksport Data Pegawai Ini?
            </div>
            <div class="modal-footer">
                <a href="<?php echo base_url() ?>index.php/eksport/pegawai" class="btn btn-success btn-xs">Eksport</a>
                <button type="button" class="btn btn-info btn-xs" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div> 


<?php 
	foreach ($pegawai as $data) {
		echo '
			<div class="modal fade" id="hapus_'.$data->id_pegawai.'" tabindex="-1" role="dialog">
			    <div class="modal-dialog" role="document">
			        <div class="modal-content">
			            <div class="modal-header">
			                <h4 class="modal-title" id="defaultModalLabel">Hapus '.$data->nama_jabatan.' <strong>'.$data->nama_pegawai.'</strong></h4>
			            </div>
			            <div class="modal-body">
			                Apakah Anda Yakin Ingin Menghapus User Pegawai Atas Nama <strong>'.$data->nama_pegawai.'</strong>?
			            </div>
			            <div class="modal-footer">
			                <a href="'.base_url().'index.php/pegawai/delete/'.$data->id_pegawai.'" class="btn btn-danger btn-xs">hapus</a>
			            </div>
			        </div>
			    </div>
			</div> 
		';
	}
	foreach ($pegawai as $data) {
		echo '
			<div class="modal fade" id="edit_'.$data->id_pegawai.'" tabindex="-1" role="dialog">
			    <div class="modal-dialog modal-lg" role="document">
			        <div class="modal-content col-md-12">
			            <div class="modal-header">
			                <h4 class="modal-title" id="defaultModalLabel">Update Data Pegawai</h4>
			            </div>
			            <div class="modal-body col-md-12">
			                <form method="post" action="'.base_url().'index.php/pegawai/update/'.$data->id_pegawai.'" enctype="multipart/form-data">
			                    <div class="form-group col-md-12">
			                        	<label>Nama Pegawai</label>
			                            <input type="text" class="form-control" value="'.$data->nama_pegawai.'" name="nama_pegawai" required placeholder="Nama Pegawai . . ." />
			                    </div>
			                    <div class="form-group col-md-6">
			                        	<label>Username</label>
			                            <input type="text" class="form-control" value="'.$data->username.'" name="username" required placeholder="Username . . ." />
			                    </div>
			                    <div class="form-group col-md-6">
			                        	<label>Password</label>
			                            <input type="password" class="form-control" value="'.$data->password.'" name="password" required placeholder="Password . . ." />
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
?>