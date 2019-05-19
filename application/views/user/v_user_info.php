<?php foreach ($user as $u) { ?>
    <h3 class="text-center mb-3">User Profile</h3>
    <div class="row container">
        <div class="col-4 mr-2">
            <img src="<?php echo base_url('upload/' . $u->foto); ?>" class="img-fluid" alt="Iklan">
        </div>
        <div class="<?php if ($this->session->userdata('id_user') == $u->id_user ) { echo "col-5";}else{ echo "col-7";} ?>">
            <h4 class="border-bottom pb-2">
                <?php echo $u->nama ?>
                <?php if ($u->is_ban == 1) {
                 echo "<span class='badge badge-danger'>BANNED</span>";
             } ?>
            </h4>
            <p>
                <?php echo $u->alamat ?><br>
                <?php echo $u->email ?><br>
                <?php echo $u->no_hp ?><br>
            </p>
        </div>
        <?php if ($this->session->userdata('id_user') == $u->id_user ) {
         echo '
         <div class="col-2">
            <a class="btn btn-primary mt-2 mr-2" href="'.base_url('user/update/'.$u->id_user).'"
                role="button">
                <i class="fas fa-pen">&nbsp;Edit</i>
            </a>
        </div>';
        } ?>
        
</div>
<?php } ?>
<?php foreach ($lelang as $l) { ?>
    <div class="row pt-3 pb-3 mb-3">
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