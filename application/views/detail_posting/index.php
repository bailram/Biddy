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
</head>
<body style="overflow-x: hidden;">
<div class="row">
    <div class="col-2">
    </div>
    <div class="col-8">
        <!-- content-home-start -->
        <?php
            include_once('detail_posting_content.php');
        ?>
        <!-- content-home-end -->
    </div>
    <div class="col-2">
    </div>
</div>

</body>
</html>