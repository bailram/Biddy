<div class="row login" style="margin:5%;">

    <div class="col-md-3">
    </div>
    <div class="col-md-6">
        <div class="card">
            <h5 class="card-header">Login</h5>
            <div class="card-body">
                <form action="<?php echo base_url('login/do_login'); ?>" method="post">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="text" name="username" title="username" class="form-control login-input" placeholder="username" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="inputGroup-sizing-default"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" title="password" class="form-control  login-input" placeholder="password" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default"/>
                    </div>
                  
                   
                    <button type="submit" class="btn btn-primary">Login</button>
                    <a class="forgot" href="<?php echo site_url('/register') ?>"style="float:right;">Register here</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3">
    </div>
</div> 