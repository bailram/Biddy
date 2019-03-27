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
    <!-- content-category-start -->
    <div class="row">
        <div class="col-2">
        </div>
        <div class="col-8">
            <div class="row">
                <!-- cateogry-start -->
                <div class="col-8">
                    <div class="row">
                        <div class="col-3 text-center border p-3">
                            <img src="<?php echo base_url('images/car.png'); ?>" 
                                class="img-fluid mb-2" alt="Kategori Mobil">
                                Mobil    
                        </div>
                        <div class="col-3 text-center border p-3">
                            <img src="<?php echo base_url('images/motorbike.png'); ?>" 
                                class="img-fluid mb-2" alt="Kategori Motor">
                            Motor
                        </div>
                        <div class="col-3 text-center border p-3">
                            <img src="<?php echo base_url('images/property.png'); ?>" 
                                class="img-fluid mb-2" alt="Kategori Property">
                            Properti
                        </div>
                        <div class="col-3 text-center border p-3">
                            <img src="<?php echo base_url('images/gadget.png'); ?>" 
                                class="img-fluid mb-2" alt="Kategori Gadget">
                            Gadget
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3 text-center border p-3">
                            <img src="<?php echo base_url('images/hobby.png'); ?>" 
                                class="img-fluid mb-2" alt="Kategori Hobby">
                            Hobi
                        </div>
                    </div>
                </div>
                <!-- cateogry-end -->
                <!-- iklan-start -->
                <div class="col-4">
                    <img src="<?php echo base_url('images/iklan.jpg'); ?>" 
                                class="img-fluid" style="height: 100%" alt="Iklan">
                    <!-- color-pallete-start -->
                    <div class="row pl-3 pr-3">
                        <div class="col-3" style="background: #c0dfd9">
                            &nbsp;
                        </div>
                        <div class="col-3" style="background: #e9ece5">
                            &nbsp;
                        </div>
                        <div class="col-3" style="background: #b3c2bf">
                            &nbsp;
                        </div>
                        <div class="col-3" style="background: #3b3a36">
                            &nbsp;
                        </div>
                    </div>
                    <!-- color-pallete-end -->
                </div>
                <!-- iklan-end -->
            </div>
        </div>
        <div class="col-2">
        </div>
    </div>
    <!-- content-category-end -->
</body>
</html>