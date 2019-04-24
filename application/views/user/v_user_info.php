<?php foreach ($user as $u){ ?>
	<h3 class="text-center mb-3">User Profile</h3>
	<div class="row container">
		<div class="col-4 mr-2">
			<img src="<?php echo base_url('images/no_image.png'); ?>"
			class="img-fluid" alt="Iklan">
		</div>
		<div class="col-7">
			<h4 class="border-bottom pb-2">
				<?php echo $u->nama ?>
				<?php if($u->is_ban==1){
					echo "<span class='badge badge-danger'>BANNED</span>";
				} ?>	
			</h4>
			<p>
				<?php echo $u->alamat ?><br>
				<?php echo $u->email ?><br>
				<?php echo $u->no_hp ?><br>
			</p>

		</div>
	</div>
<?php } ?>