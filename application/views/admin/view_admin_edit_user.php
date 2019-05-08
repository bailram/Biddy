<div class="content-wrapper">
    <div class="col-md-3">
    </div>

    <div class="col-md-6">
        <?php echo validation_errors('<span class="error" style="margin-top:5%;">', '</span>'); ?>
        <?php foreach ($user as $u) { ?>
        <form action="<?php echo base_url() . 'admin/update'; ?>" method="post" style="margin-top:10%;">
            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $u->id_user ?>">
                <label for="name">Nama</label>
                <input type="text" class="form-control" name="nama" aria-describedby="emailHelp" placeholder="Nama"
                    value="<?php echo $u->nama ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" aria-describedby="emailHelp"
                    placeholder="Username" value="<?php echo $u->username ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email"
                    value="<?php echo $u->email ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Password"
                    value="<?php echo $u->password ?>">
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="alamat" placeholder="Alamat"><?php echo $u->alamat ?></textarea>
            </div>
            <div class="form-group">
                <label for="number">Nomor HP</label>
                <input type="tel" pattern="[0-9]{11}" class="form-control" name="number" placeholder="Nomor HP"
                    value="<?php echo $u->no_hp ?>">
            </div>

            <button type="submit" class="btn btn-info">Save</button>
            <a href="" class="btn btn-danger">Back</a>
        </form>
        <?php 
    } ?>

    </div>
</div>