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
    <div class="row login" style="margin:5%;">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card">
              <h5 class="card-header">Change Password</h5>
              <div class="card-body">
                <form action="<?php echo base_url('user/do_change_password/') . $this->uri->segment(3); ?>" method="post"
                    enctype="multipart/form-data">
                    
                    <?php if($this->uri->segment(4) == 1){
                        echo '
                        <div class="alert alert-danger mb-2" role="alert">
                            Password Lama Anda Salah!
                        </div>';
                    } ?>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                <i class="fa fa-key"></i>&nbsp;Password Lama
                            </span>
                        </div>
                        <input type="password" name="password_lama" title="judul" class="form-control login-input"
                        placeholder="Password Lama" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" />
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default">
                                <i class="fa fa-key"></i>&nbsp;Password Baru
                            </span>
                        </div>
                        <input type="password" name="password_baru" title="judul" class="form-control login-input"
                        placeholder="Password Baru" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" />
                    </div>

                    <button type="submit" class="btn btn-primary">Save</button>

                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
    </div>
</div>
</body>

</html>