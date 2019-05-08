<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Biddy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" media="screen" href="<?php echo base_url('assets/css manual/index_css.css') ?>">
    
    <script src="main.js"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/admin/bower_components/jquery/dist/jquery.min.js') ?>"></script>

    <style type="text/css">
    body{
        overflow-x:hidden;
    }

    .login-input{
        display: block;
    }

</style>
</head>
<body>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <div class="row">
                <div class="col-10">

                </div>
                <div class="col-2 align-self-end">
                    <a class="btn btn-success mt-2" href="<?= base_url('lelang/add/') ?>" role="button">
                        <i class="fas fa-plus"> Pasang iklan</i>
                    </a>        
                </div>    
            </div>
            
            
            
            <?php foreach ($lelang as $l) { ?>
                <div class="row pt-3 pb-3 mb-3">
                    <div class="col-md-3">
                        <img src="<?php echo base_url('images/no_image.png'); ?>" class="img-fluid" alt="gambar">
                    </div>
                    <div class="col-md-6">
                        <div class="row h4">
            <!--<a href="<? php
            ?>">-->
            <a href="<?= base_url('home/post/') . $l->id_lelang ?>">
                <?php echo $l->judul ?>
                <!--Ini judul-->
            </a>
        </div>
        <div class="row mb-2">
            <small>
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
            </small>
            <!--<small>Provinsi > Kota</small>-->
        </div>
        <div class="row mb-2">
            <span class="badge badge-info">
                <?php
                if ($l->kategori == 1) {
                    echo "Mobil";
                } else if ($l->kategori == 2) {
                    echo "Motor";
                } else if ($l->kategori == 3) {
                    echo "Properti";
                } else if ($l->kategori == 4) {
                    echo "Gadget";
                } else {
                    echo "Hobi";
                }

                ?>
                <!--Kategori-->
            </span>
        </div>
        <div class="row border-top mt-1">
            <h5>
                <?php
                if ($l->status == 0) {
                    echo "Sedang Berlangsung";
                } else {
                    echo "Selesai";
                }
                ?>
            </h5>
            <!--<div class="col-sm-3">
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
                            </div>-->
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="row  text-right">
                            <div class="col">
                                Rp.
                            </div>
                            <div class="col">
                                <?php echo number_format($l->final_bid, 2, ',', '.') ?>
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
                                <?php
                                foreach ($user as $u) {
                                    echo $u->nama;
                                }
                                ?>
                            </div>
                        </div>
                        <div class="row mr-1 float-right">
                            <a class="btn btn-primary mt-2 mr-2" href="<?= base_url('lelang/update/').$l->id_lelang ?>" role="button">
                                <i class="fas fa-pen">&nbsp;Edit</i>
                            </a>
                            <a class="btn btn-danger mt-2" href="<?= base_url('lelang/do_delete/').$l->id_lelang ?>" role="button">
                                <i class="fas fa-trash">&nbsp;Hapus</i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-2">
        </div>
    </div> 
</body>
</html>