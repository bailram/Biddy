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
    <h3 class="text-center mb-3 mt-2">Transaction</h3>
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <?php 
                foreach ($transaksi as $t) {
                    $where = array('id_lelang' => $t->id_lelang );
                    $data['lelang'] = $this->m_lelang->tampil_data_where($where)->result();
                    foreach ($data['lelang'] as $l) {
            ?>

                <div class="row pt-3 pb-3 mb-3">
                    <div class="col-md-3">
                        <img src="<?php echo base_url('upload/' . $l->foto); ?>" class="img-fluid" alt="gambar">
                    </div>
                    <div class="col-md-9">
                        <div class="row h4">
                            <a href="#">
                                <?php echo $l->judul ?>
                            </a>&nbsp;
                            <span class="badge badge-secondary">
                                <?php 
                                    $whereT = array('id_transaksi' => $t->id_transaksi);
                                    $data['status_transaksi'] = $this->m_transaksi->tampil_data_transaksi_where($whereT)->result();
                                    foreach ($data['status_transaksi'] as $st) {
                                        if($st->status == 0){
                                            echo "New";
                                        }
                                        else if ($st->status == 1) {
                                            echo "succeeded";
                                        }
                                        else if($st->status == 2){
                                            echo "Canceled";
                                        }
                                        else if($st->status == 3){
                                            echo "Waiting";
                                        }  
                                    
                                ?>
                            </span>
                        </div>
                        <div class="row mb-2">
                            <?php 
                            if($l->id_pemenang == $this->session->userdata('id_user')){
                                echo "<p>Selamat anda <strong>menang</strong> lelang! Lanjutkan Transaksi?</p>";
                            }else if($l->id_pelelang == $this->session->userdata('id_user')){
                                echo "<p>Lelang yang anda <strong>buat</strong> telah selesai! Lanjutkan Transaksi?</p>";
                            }
                            ?>
                        </div>
                        <div class="row mt-1">
                            <form class="form-inline" action="<?php echo base_url('transaksi/do_update/'.$t->id_status_pelelangan.'/'.$st->id_transaksi.'/'.$st->status);}?>" method="post">
                              <div class="form-group mb-2">
                                <input type="text" class="form-control" name="alasan" placeholder="alasan" 
                                    value="<?php if($t->status > 0 ){ echo $t->alasan;} ?>">
                                </div>
                                <div class="form-group mx-sm-3 mb-2">
                                    <select id="inputState" class="form-control" name="status">
                                        <option value="1" selected>Iya</option>
                                        <option value="2" <?php if($t->status == 2){echo "selected";}?> >Tidak</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary mb-2" <?php if($t->status > 0 ){echo "disabled";}?>>Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php 
                    }
                } 
            ?>
        </div>
        <div class="col-2">
        </div>
    </div> 
</body>
</html>