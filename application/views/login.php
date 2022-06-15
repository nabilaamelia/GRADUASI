
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
                        <div class="body">
                            <?php echo $this->session->flashdata('pesan')?>
                            <form class="form-auth-small" action="<?php echo base_url('Auth/proses_login')?>" method="POST">
                                <div class="form-group c_form_group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Enter your username"required>
                                </div>
                                <div class="form-group c_form_group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                                </div>
                                <div class="form-group clearfix">

                                </div>
                                <button type="submit" class="btn btn-dark btn-lg btn-block" >LOGIN</button>
                                <div class="bottom">


                                </div>
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
</body>
</html>