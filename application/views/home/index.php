<?php $this->load->view('layout/navbar') ?>

<div class="page-wrap">
    
    <?php $this->load->view('layout/sidebar') ?>
    
    <div class="main-content">
        <div class="container-fluid">        
            
            <?php if($message = $this->session->flashdata('sucess')) : ?>            
            <div class="row">                
                <div class="col-md-12">                    
                    <div class="alert bg-success alert-success text-white alert-dismissible fade show" role="alert">
                        <strong><?php echo $message ?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ik ik-x"></i>
                        </button>
                    </div>
                </div>
            </div>                                
            <?php endif; ?>
            
        </div>
    </div>

    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-center text-sm-left d-md-inline-block">Lidery&reg; Informática</span>
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">1.0</a></span>
        </div>
    </footer>
    
</div>

