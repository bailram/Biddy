<div class="content-wrapper">
    <section class="content">
        <table id="table_c" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Deadline</th>
                    <th>Status</th>
                    <th>Judul Lelang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($trans as $u) {
                    ?>
                <tr>
                    <td><?= $u->id_transaksi ?></td>
                    <td><?= $u->tanggal ?></td>
                    <td><?= $u->deadline ?></td>
                    <td><?= $u->status ?></td>
                    <td><?= $u->judul ?></td>
                    <td>
                        <!-- <?= '<a href="edit_lelang/' . $u->id_lelang . '" class="btn btn-info">Edit</a>'; ?>
                            | -->
                        <?= '<a href="delete_lelang/' . $u->id_lelang . '" class="btn btn-danger">Delete</a>'; ?>
                    </td>
                </tr>
                <?php
            } ?>
            </tbody>
        </table>
    </section>
</div>