<div class="row">
	<div class="col-md-12">
		<!-- BORDERED TABLE -->
		<div class="panel">
			<div class="panel-heading">
				<center>
				<h3 class="panel-title">Account Setting</h3>
				</center>
			</div>
			<div class="panel-body">
				<?php 
						echo '
							<form method="post" action="'.base_url().'index.php/account_setting/update/'.$this->uri->segment(3).'" enctype="multipart/form-data">
			                    <div class="form-group col-md-12">
			                        	<label>Nama Pegawai</label>
			                            <input type="text" class="form-control" value="'.$pegawai->nama_pegawai.'" name="nama_pegawai" required placeholder="Nama Pegawai . . ." />
			                    </div>
			                    <div class="form-group col-md-6">
			                        	<label>Username</label>
			                            <input type="text" class="form-control" value="'.$pegawai->username.'" name="username" required placeholder="Username . . ." />
			                    </div>
			                    <div class="form-group col-md-6">
			                        	<label>Password</label>
			                            <input type="password" class="form-control" value="'.$pegawai->password.'" name="password" required placeholder="Password . . ." />
			                    </div>
			                    <input type="submit" class="btn btn-success col-md-6 col-md-offset-3" value="Submit" name="">
			                </form>
						';
				?>
							
			</div>
		</div>
		<!-- END BORDERED TABLE -->
	</div>
</div>


