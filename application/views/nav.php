<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?= base_url() ?>">Biddy</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= base_url('home') ?>">Home <span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('lelang') ?>">Lelang</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">About</a>
            </li>
            <?php
      if ($this->session->userdata('status') == "login") {
        echo ' 
        <li class="nav-item">
        <a class="nav-link"href="' . base_url('user/info/' . $this->session->userdata('id_user')) . '">Profile</a>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
  

      
        <li class="nav-item">
          <a class="nav-link"href="' . base_url('login/logout') . '">Logout</a>
          </li>
       ';
      } else {
        echo '  <li class="nav-item">
          <a class="nav-link"href="' . base_url('login') . '">Login</a>
        </li>';
      }
      if ($this->session->userdata('role') == 1) {
        echo '  <li class="nav-item">
          <a class="nav-link"href="' . base_url('admin') . '">Admin</a>
          </li>';
      }
      ?>
        </ul>
        <!-- <form action="<?php echo site_url('home/search'); ?>" method="post" class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" id="search_product" name="search_product"
                placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-info my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>