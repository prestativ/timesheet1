<div class="auth-wrapper">
    <div class="container-fluid h-100">
        <div class="row flex-row h-100 bg-white">
            <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                <div class="lavalite-bg" style="background-image: url(<?php echo base_url('public/img/login-bg.jpg'); ?>">
                    <div class="lavalite-overlay"></div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                <div class="authentication-form mx-auto">
                    <div class="logo-centered">                        
                        <img src="<?php echo $this->sistema_model->get_by_logo(); ?>" alt="" width="100" height="100">
                    </div>
                    <?php if($message = $this->session->flashdata('error')) : ?>                    
                    <div class="row">                        
                        <div class="col-md-12">                            
                            <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
                                <strong><?php echo $message ?></strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <i class="ik ik-x"></i>
                                </button>
                            </div>
                        </div>
                    </div>                                
                    <?php endif; ?>            
                    <h3>Seja muito bem vindo(a)!</h3>
                    <p>Estamos felizes em ver você!</p>
                    <form method="POST" action="<?php echo base_url('login/auth') ?>">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Digite seu e-mail" required="" autocomplete="off">
                            <i class="ik ik-user"></i>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password" required="" autocomplete="off">
                            <i class="ik ik-lock"></i>
                        </div>
                        <div class="sign-btn text-center">
                            <button class="btn btn-theme">Entrar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>