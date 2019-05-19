<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Biddy</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen"
        href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" type="text/css" media="screen"
        href="<?php echo base_url('assets/css manual/index_css.css') ?>">

    <script src="main.js"></script>
    <script type="text/javascript"
        src="<?php echo base_url('assets/admin/bower_components/jquery/dist/jquery.min.js') ?>"></script>
    <script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var prov_id = $("#provinsi").val();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url(); ?>/lelang/getKota",
                data: "provinsi=" + prov_id,
                success: function(data) {
                    $("#kota").html(data);
                }
            });
        });
    });
    </script>

    <style type="text/css">
    body {
        overflow-x: hidden;
    }

    .login-input {
        display: block;
    }
    </style>
</head>

<body>
    <?php
    foreach ($user as $u) {
        ?>
    <div class="row login" style="margin:5%;">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card">
                <h5 class="card-header">Update User Profile</h5>
                <div class="card-body">
                    <form action="<?php echo base_url('user/do_update/') . $u->id_user; ?>" method="post"
                        enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-edit"></i>&nbsp;Nama
                                </span>
                            </div>
                            <input type="text" name="nama" title="judul" class="form-control login-input"
                                placeholder="Judul iklan" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $u->nama ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-address-card "></i>&nbsp;Alamat
                                </span>
                            </div>
                            <input type="text" name="alamat" title="judul" class="form-control login-input"
                                placeholder="Judul iklan" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $u->alamat ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-envelope "></i>&nbsp;Email
                                </span>
                            </div>
                            <input type="email" name="email" title="judul" class="form-control login-input"
                                placeholder="Judul iklan" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $u->email ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-mobile"></i>&nbsp;No HP
                                </span>
                            </div>
                            <input type="text" name="no_hp" title="final_bid" class="form-control login-input"
                                placeholder="Nominal Next Bid" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $u->no_hp ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-user "></i>&nbsp;Username
                                </span>
                            </div>
                            <input type="text" name="username" title="judul" class="form-control login-input"
                                placeholder="Judul iklan" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $u->username ?>" />
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">
                                    <i class="fas fa-images"></i>&nbsp;Foto
                                </span>
                            </div>
                            <input type="file" name="foto" title="foto" class="form-control login-input"
                                placeholder="foto" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $u->foto ?>" />
                            <input type="hidden" name="old_foto" title="foto" class="form-control login-input"
                                placeholder="foto" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default" value="<?php echo $u->foto ?>" />
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>

                        <button type="button" class="btn btn-success" onclick="window.location.href='<?php echo base_url('user/change_password/' . $u->id_user); ?>'">
                            Change Password
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
        </div>
    </div>
    <?php } ?>
</body>

</html>