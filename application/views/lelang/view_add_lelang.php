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
    <div class="row login" style="margin:5%;">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Buat Lelang</h5>
                <div class="card-body">
                    <form action="<?php echo base_url('lelang/do_add');?>" method="post">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-edit"></i>&nbsp;Judul
                                </span>
                            </div>
                            <input type="text" name="judul" title="judul" class="form-control login-input" placeholder="Judul iklan" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-edit"></i>&nbsp;Deskripsi
                                </span>
                            </div>
                            <input type="text" name="deskripsi" title="deskripsi" class="form-control login-input" placeholder="Deskripsi iklan" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-images"></i>&nbsp;Gambar
                                </span>
                            </div>
                            <input type="text" name="foto" title="foto" class="form-control login-input" placeholder="foto" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-search"></i>&nbsp;Kondisi
                                </span>
                            </div>
                            <select class="custom-select" id="kondisi" name="kondisi">
                                <option value="1" selected>Baru</option>
                                <option value="2">Bekas</option>
                            </select>
                            <!--<input type="text" name="kondisi" title="kondisi" class="form-control login-input" placeholder="kondisi" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>-->
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-gavel"></i>&nbsp;Bid Awal
                                </span>
                            </div>
                            <input type="number" name="final_bid" title="final_bid" class="form-control login-input" placeholder="Nominal Next Bid" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-gavel"></i>&nbsp;Next Bid
                                </span>
                            </div>
                            <input type="number" name="next_bid" title="next_bid" class="form-control login-input" placeholder="Nominal Next Bid" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-object-group"></i>&nbsp;Kategori
                                </span>
                            </div>
                            <select class="custom-select" id="kategori" name="kategori">
                                <option value="1" selected>Mobil</option>
                                <option value="2">Motor</option>
                                <option value="3">Properti</option>
                                <option value="4">Gadget</option>
                                <option value="5">Hobi</option>
                            </select>
                            <!--<input type="text" name="kategori" title="kategori" class="form-control login-input" placeholder="kategori" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>-->
                        </div>
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="far fa-calendar"></i>&nbsp;Iklan Berakhir
                                </span>
                            </div>
                            <input type="date" name="tanggal" title="tanggal" class="form-control login-input" placeholder="tanggal" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                        </div>
                        

                        <button type="submit" class="btn btn-primary">Pasang Iklan</button>
                        
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div> 
</body>
</html>