<?php 
foreach ($lelang as $l) {
	?>
	<div class="row mb-4">
		<div class="col-8 p-2 pl-3 border border-light rounded">
			<div class="row">
				<div class="col-8">
					<h3>
						<?php echo $l->judul ?>
					</h3>
				</div>
				<!-- Status Lelang (Selesai, Sedang Berlangsung[kalo bisa jam, menit, detik]) -->
				<div class="col-3 bg-light rounded ml-4">
					<h5 class="text-center mt-2">
						<?php 
						if($l->status == 0){
							echo "Sedang Berlangsung";
						}else{
							echo "Selesai";
						}
						?>
					</h5>
				</div>
			</div>
			<!-- Provinsi dan Kota -->
			<div class="row container">
				<span class="badge badge-info">
					<?php
					$data['data_provinsi'] = $this->m_home->get_nama_provinsi(array('id_provinsi' => $l->id_provinsi))->result();
					foreach ($data['data_provinsi'] as $dp) {
						echo $dp->nama . " ";
					}
					?>
					/
					<?php
					$data['data_kota'] = $this->m_home->get_nama_kota(array('id_kota' => $l->id_kota))->result();
					foreach ($data['data_kota'] as $dk) {
						echo $dk->nama;
					}
					?>
					<!--Provinsi / Kota-->
				</span>
			</div>
			<!-- Image -->
			<div class="row container mt-4 mb-4">
				<img src="<?php echo base_url('images/pbass-mono.png'); ?>"
				class="img-fluid col-12" alt="Iklan">
			</div>
			<h5>
				Deskripsi :
			</h5>
			<?php echo $l->deskripsi ?>
		</div>
		<div class="col-4">
			<!-- Detail Lelang -->
			<div class="row ml-1 mr-sm-2 p-2 border border-light rounded">
				<table class="table table-inverse">
					<thead>
						<tr>
							<th class="bg-light">Detail Lelang</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								Kondisi : 
								<?php 
								if($l->kondisi == 0){
									echo "Baru";
								}else {
									echo "Bekas";
								}
								?>
								<!--Bekas-->
							</td>
						</tr>
						<tr>
							<td>
								Total Bidder : 
								<?php echo $l->total_bidder ?>
							</td>
						</tr>
						<tr>
							<td>
								Next Bid : 
								<?php echo "Rp " . number_format($l->next_bid,2,',','.') ?>
								<!--Rp.50.000-->
								<!--<span class="border border-success rounded p-2">Next Bid</span> : Rp.50.000-->
							</td>
						</tr>
						<tr>
							<td>
								Final Bid : 
								<?php echo "Rp " . number_format($l->final_bid,2,',','.') ?>
								<!--Rp.1.000.000-->
							</td>
						</tr>
						<tr>
							<td>
								Top Bidder : 
								<?php 
								$whereU = array('id_user' => $l->id_pemenang);
								$data['top_bidder'] = $this->m_home->get_user_info($whereU)->result();
								foreach ($data['top_bidder'] as $tb) {
									echo $tb->nama;
								}
								?>
								<!--Rp.1.000.000-->
							</td>
						</tr>
						<tr>
							<td>
								<button type="button" class="btn btn-outline-success col-12" onclick="window.location.href='<?php echo base_url('home/make_bid/'.$l->id_lelang.'/'.$this->session->userdata('id_user'));?>'" 
									<?php 
									$whereUserLogin = array('id_user' => $this->session->userdata('id_user') );
									$data['user_login'] = $this->m_home->get_user_info($whereUserLogin)->result();
									foreach ($data['user_login'] as $u) {
										if($l->status != 0 || $u->is_ban == 1) echo "disabled "; 
									}
									?>>
									<span>
										<i class="fas fa-gavel"></i>&nbsp;Make Bid
									</span>	
								</button>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<!-- Profil pelelang -->
			<?php 
			$whereU = array('id_user' => $l->id_pelelang);
			$data['user'] = $this->m_home->get_user_info($whereU)->result();
			foreach ($data['user'] as $u) {?>
				<div class="row ml-1 mr-sm-2 p-2 mt-3 border border-light rounded">
					<table class="col-12">
						<tr>
							<th class="bg-light p-2 pl-3">
								<?php echo $u->nama;?>
								<!--Nama Pengguna-->
							</th>
						</tr>
						<tr>
							<td class="align-content-center pt-2 pb-2">
								<img src="<?php echo base_url('images/no_image.png'); ?>"
								class="img-fluid col-12" alt="Iklan">
							</td>
						</tr>
						<tr>
							<td class="pl-3">
								<p>
									<?php echo $u->no_hp ?><br>
									<?php echo $u->alamat ?>	
								</p>
							</td>
						</tr>
						<tr>
							<td align="center">
								<a href="<?php echo base_url('user/info/').$u->id_user; ?>" 
									class="btn btn-outline-info col-10">
									View Profile
								</a>
							</td>
						</tr>
					</table>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php } ?>