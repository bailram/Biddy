<script src="<?php echo base_url() ?>assets/admin/bower_components/jquery/dist/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $("#prov_id").change(function() {
        var prov_id = $("#prov_id").val();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url(); ?>/home/getKota",
            data: "prov_id=" + prov_id,
            success: function(data) {
                $("#kota").html(data);
            }
        });
    });
});
</script>

<div class="row">
    <div class="col-2">
    </div>
    <div class="col-8 mt-3">
        <div class="row">
            <form action="<?php echo site_url('home/search'); ?>" method="post" class="pl-3 pt-3 pb-3" style="width: 98.5%; 
			background: #e9ece5">
                <div class="row">
                    <div class="col-12 form-inline">
                        <select class="form-control mr-2" id="prov_id" name="provinsi" style=" 
					background-image: url('<?php echo base_url('/images/location.png'); ?>');
					padding-left: 10px;
					background-position: 10px 10px;
					background-repeat: no-repeat;
					padding-left: 31px;
					background-size: 18px 18px;
					width: 18%;
					">
                            <option value="0">Pilih Provinsi</option>
                            <?php
							foreach ($provinsi as $prov) {
								echo "<option value='$prov[id_provinsi]'>$prov[nama]</option>";
							} ?>
                        </select>
                        <select class="form-control mr-2" id="kota" name="kota" style=" 
				background-image: url('<?php echo base_url('/images/location.png'); ?>');
				padding-left: 10px;
				background-position: 10px 10px;
				background-repeat: no-repeat;
				padding-left: 31px;
				background-size: 18px 18px;
				width: 15%;
				">
                            <option value="0">Pilih Kota</option>
                        </select>

                        <input type="text" class="form-control mr-2" placeholder="Search..." id="search_product"
                            name="search_product" style=" 
			width: 53%;
			background-image: url('<?php echo base_url('/images/search.png'); ?>');
			padding-left: 10px;
			background-position: 10px 10px;
			background-repeat: no-repeat;
			padding-left: 37px;
			background-size: 18px 18px;
			">

                        <button type="submit" class="button button-search" id="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-2">
    </div>
</div>