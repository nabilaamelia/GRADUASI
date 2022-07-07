<!doctype html>
    <html lang="en">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">


    



    <body>

        <div id="body"  >


            <div class="auth-main ">

                <div class="auth_div vivify fadeIn">



                    <div class="auth_brand">
                        <a class="navbar-brand" href="#">GRADUASI</a>
                    </div>
                    <div class="container-fluid mb-30">
                        <img src="<?php echo base_url() ?>assets/dist/assets/icon/PKH.png" width="250" class="d-inline-block align-top mr-2">
                    </div>

                    <div class="card container-fluid  ">
                        <div class="header">
                            <p class="lead"></p>
                        </div>
                        <div class="body bg-light border p-4" id="login" autocomplete="off">
                            <?php echo $this->session->flashdata('pesan')?>
                            <form class="form-auth-small" action="<?php echo base_url('Auth/proses_login')?>" method="POST">


                              <div class="form-group c_form_group">
                                <label><strong>Username:</strong></label>
                                <div class="input-group mb-3">
                                  <div class="input-group-prepend">
                                    <!-- <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span> -->
                                </div>
                                <input name="username" type="text" value="" class="input form-control" id="username" required="true"  placeholder="Masukkan Username" aria-label="Username" aria-describedby="basic-addon1" />
                            </div>

                        </div>
                        <div class="form-group c_form_group">
                            <label><strong>Password:</strong></label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <!-- <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span> -->
                                </div>
                                <input name="password" type="password" value="" class="input form-control" id="password" placeholder="Masukkan Password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                      <i class="fas fa-eye" id="show_eye"></i>
                                      <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                  </span>
                              </div>
                          </div>
                      </div>

                      <button type="submit" class="btn btn-dark btn-lg btn-block" >LOGIN</button>

                  </form>
              </div>


          </div>
      </div>
      <div class="animate_lines">
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
        <div class="line"></div>
    </div>
</div>

</div>



<!-- Vedor js file and create bundle with grunt  --> 


</script>
<script type="text/javascript">
    function password_show_hide() {
      var x = document.getElementById("password");
      var show_eye = document.getElementById("show_eye");
      var hide_eye = document.getElementById("hide_eye");
      hide_eye.classList.remove("d-none");
      if (x.type === "password") {
        x.type = "text";
        show_eye.style.display = "none";
        hide_eye.style.display = "block";
    } else {
        x.type = "password";
        show_eye.style.display = "block";
        hide_eye.style.display = "none";
    }
}
</script>
</body>
</html>