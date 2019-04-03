<div class="content-wrapper">
    <div class="col-md-3">
    </div>

    <div class="col-md-6">
        <?php echo validation_errors('<span class="error" style="margin-top:5%;">', '</span>'); ?>
        <form action="<?php echo base_url() . 'admin/do_add_admin'; ?>" method="post" style="margin-top:10%;">
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="nama" aria-describedby="emailHelp" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="emailHelp"
                    placeholder="Username">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" placeholder="Alamat"></textarea>
            </div>
            <div class="form-group">
                <label for="number">Nomor HP</label>
                <input type="tel" pattern="[0-9]{11}" class="form-control" name="number" placeholder="Nomor HP">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>


    </div>
</div>