<div class="content-wrapper">
    <div class="col-md-3">
    </div>

    <div class="col-md-6">
        <?php
        echo validation_errors('<span class="error" style="margin-top:5%;">', '</span>'); ?>
        <?php foreach ($lelang as $u) { ?>
        <form action="<?php echo base_url() . 'admin/update_lelang'; ?>" method="post" style="margin-top:10%;">

            <div class="form-group">
                <input type="hidden" name="id" value="<?php echo $u->id_lelang ?>">
                <label for="name">Judul</label>
                <input type="text" class="form-control" name="judul" aria-describedby="emailHelp" placeholder="Nama"
                    value="<?php echo $u->judul ?>">
            </div>
            <div class="form-group">
                <label for="username">Username</label>
                <br>
                <textarea name="deskripsi" class="form-control"><?php echo $u->deskripsi ?></textarea>
            </div>

            <button type="submit" class="btn btn-info">Save</button>
            <a href="" class="btn btn-danger">Back</a>
        </form>
        <?php
    } ?>

    </div>
</div>