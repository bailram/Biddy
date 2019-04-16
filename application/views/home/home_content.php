<?php 
$no = 1;
foreach ($lelang as $l) { ?>
<div class="row pt-3 pb-3 mb-3" style="width:101.7%; background: #e9ece5">
    <div class="col-md-3">
        <img src="<?php echo base_url('images/no_image.png'); ?>" class="img-fluid" alt="gambar">
    </div>
    <div class="col-md-6">
        <div class="row h4">
            <a href="<?=base_url('detailposting')?>">
                <?php echo $l->judul ?>
                <!--Ini judul-->
            </a>
        </div>
        <div class="row">
            <small><?php echo $l->id_provinsi ?> > <?php echo $l->id_kota ?></small>
            <!--<small>Provinsi > Kota</small>-->
        </div>
        <div class="row">
            <small>Kategori</small>
        </div>
        <div class="row border-top mt-1">
            <div class="col-sm-3">
                <div class="row">
                    8
                </div>
                <div class="row">
                    <small>Days</small>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="row">
                    8
                </div>
                <div class="row">
                    <small>Hours</small>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="row">
                    8
                </div>
                <div class="row">
                    <small>Minutes</small>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="row">
                    8
                </div>
                <div class="row">
                    <small>Seconds</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row  text-right">
            <div class="col">
                Rp.
            </div>
            <div class="col">
                <?php echo $l->final_bid ?>
                <!--1.000.000-->
            </div>
        </div>
        <div class="row  text-right">
            <div class="col">
                Bids
            </div>
            <div class="col">
                <?php echo $l->total_bidder ?>
            </div>
        </div>
        <div class="row  text-right">
            <div class="col">
                Top Bidder
            </div>
            <div class="col">
                <?php echo $l->id_pemenang ?>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!--
<div class="row pt-3 pb-3 mt-1" style="width:101.7%; background: #e9ece5">
    <div class="col-md-3">
        <img src="<php //echo base_url('images/no_image.png'); ?>" class="img-fluid" alt="gambar">
    </div>
    <div class="col-md-6">
        <div class="row h4">
            <a href="<=//base_url('detailposting')?>">
                Ini judul
            </a>
        </div>
        <div class="row">
            <small>Provinsi > Kota</small>
        </div>
        <div class="row">
            <small>Kategori</small>
        </div>
        <div class="row border-top mt-1">
            <div class="col-sm-3">
                <div class="row">
                    8
                </div>
                <div class="row">
                    <small>Days</small>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="row">
                    8
                </div>
                <div class="row">
                    <small>Hours</small>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="row">
                    8
                </div>
                <div class="row">
                    <small>Minutes</small>
                </div>
            </div>
            <div class="col-sm-3">
            <div class="row">
                    8
                </div>
                <div class="row">
                    <small>Seconds</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="row  text-right">
            <div class="col">
                Rp.
            </div>
            <div class="col">
                1.000.000
            </div>
        </div>
        <div class="row  text-right">
            <div class="col">
                Bids
            </div>
            <div class="col">
                10
            </div>
        </div>
        <div class="row  text-right">
            <div class="col">
                Top Bidder
            </div>
            <div class="col">
                No Name
            </div>
        </div>
    </div>
</div>
-->
