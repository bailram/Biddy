<div class="content-wrapper">
    <section class="content">
        <table id="table_c" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>Foto</th>
                    <th>Kondisi</th>
                    <th>Status</th>
                    <th>Next Bid</th>
                    <th>Final Bid</th>
                    <th>Total Bidder</th>
                    <th>Tanggal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $no = 1;
                foreach ($lelang as $u) {
                    ?>
                <tr>
                    <td><?= $u->id_lelang ?></td>
                    <td><?= $u->judul ?></td>
                    <td><?= $u->deskripsi ?></td>
                    <td><?= $u->foto ?></td>
                    <td><?= $u->kondisi ?></td>
                    <td><?= $u->status ?></td>
                    <td><?= $u->next_bid ?></td>
                    <td><?= $u->final_bid ?></td>
                    <td><?= $u->total_bidder ?></td>
                    <td><?= $u->tanggal ?></td>
                    <td> <?= '<a href="edit_lelang/' . $u->id_lelang . '" class="btn btn-info">Edit</a>'; ?>
                        |
                        <?= '<a href="delete_lelang/' . $u->id_lelang . '" class="btn btn-danger">Delete</a>'; ?>
                    </td>
                </tr>
                <?php 
            } ?>
            </tbody>
        </table>
    </section>
</div>