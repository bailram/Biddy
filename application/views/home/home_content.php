<?php
//$no = 1;
if ($this->db->get_where('lelang', array('kategori' => $this->uri->segment(3)))->num_rows() == 0 && $this->uri->segment(3) != null) {
    include_once('v_404_not_found.php');
}
foreach ($lelang as $l) { ?>
<div class="row pt-3 pb-3 mb-3" style="width:101.7%; background: #e9ece5">
    <div class="col-md-3">
        <img src="<?php echo base_url('upload/' . $l->foto); ?>" class="img-fluid" alt="gambar">
    </div>
    <div class="col-md-6">
        <div class="row h4">
            <!--<a href="<? php
                                ?>">-->
            <a href="<?= base_url('home/post/') . $l->id_lelang ?>">
                <?php echo $l->judul ?>
                <!--Ini judul-->
            </a>
        </div>
        <div class="row mb-2">
            <small>
                <?php
                    $data['data_provinsi'] = $this->m_home->get_nama_provinsi(array('id_provinsi' => $l->id_provinsi))->result();
                    $no = $this->uri->segment('3') + 1;
                    foreach ($data['data_provinsi'] as $dp) {
                        echo $dp->nama . " ";
                    }
                    ?>
                /
                <?php
                    $data['data_kota'] = $this->m_home->get_nama_kota(array('id_kota' => $l->id_kota))->result();
                    foreach ($data['data_kota'] as $dk) {
                        echo $dk->nama;
                    }
                    ?>
            </small>
            <!--<small>Provinsi > Kota</small>-->
        </div>
        <div class="row mb-2">
            <span class="badge badge-info">
                <?php
                    if ($l->kategori == 1) {
                        echo "Mobil";
                    } else if ($l->kategori == 2) {
                        echo "Motor";
                    } else if ($l->kategori == 3) {
                        echo "Properti";
                    } else if ($l->kategori == 4) {
                        echo "Gadget";
                    } else {
                        echo "Hobi";
                    }

                    ?>
                <!--Kategori-->
            </span>
        </div>
        <div class="row border-top mt-1">
            <h5>
                <?php
                    if ($l->status == 0) {
                        echo "Sedang Berlangsung";
                    } else {
                        echo "Selesai";
                    }
                    ?>
            </h5>
            <!--<div class="col-sm-3">
                                                            <div class="row">
                                                                8
                                                            </div>
                                                            <div class="row">
                                                                <small>Days</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                8
                                                            </div>
                                                            <div class="row">
                                                                <small>Hours</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                8
                                                            </div>
                                                            <div class="row">
                                                                <small>Minutes</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <div class="row">
                                                                8
                                                            </div>
                                                            <div class="row">
                                                                <small>Seconds</small>
                                                            </div>
                                                        </div>-->
        </div>
    </div>
    <div class="col-md-3">
        <div class="row  text-right">
            <div class="col">
                Rp.
            </div>
            <div class="col">
                <?php echo number_format($l->final_bid, 2, ',', '.') ?>
                <!--1.000.000-->
            </div>
        </div>
        <div class="row  text-right">
            <div class="col">
                Bids
            </div>
            <div class="col">
                <?php echo $l->total_bidder ?>
            </div>
        </div>
        <div class="row  text-right">
            <div class="col">
                Top Bidder
            </div>
            <div class="col">
                <?php
                    $whereU = array('id_user' => $l->id_pemenang);
                    $data['user'] = $this->m_home->get_user_info($whereU)->result();
                    foreach ($data['user'] as $u) {
                        echo $u->nama;
                    }
                    ?>
            </div>
        </div>
    </div>

</div>

<?php } ?>