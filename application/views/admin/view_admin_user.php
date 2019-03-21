<div class="content-wrapper">
    <section class="content">
        <table id="table_c" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Username</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($user as $u) {
                ?>
                <tr>
                    <td><?= $u->id_user ?></td>
                    <td><?= $u->username ?></td>
                    <td><?= $u->nama ?></td>
                    <td><?= $u->email ?></td>
                    <td><?= $u->alamat ?></td>
                    <td><?php if($u->role == 0){
                            echo 'user';
                        }else{
                            echo 'admin';
                        } ?></td>
                    <td>  <?= '<a href="admin/edit_user/'.$u->id_user.'" class="btn btn-info">Edit</a>'; ?>
                    |
                            <?= '<a href="admin/hapus_user/'.$u->id_user.'" class="btn btn-danger">Delete</a>'; ?>
                    </td>    
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </section>
</div> 

