<?php $this->load->view('layout/navbar') ?>

<div class="page-wrap">
    
    <?php $this->load->view('layout/sidebar') ?>

    <div class="main-content">
        <div class="container-fluid">
            <div class="page-header">
                <div class="row align-items-end">
                    <div class="col-lg-8">
                        <div class="page-header-title">
                            <i class="<?php echo $icone_view; ?> bg-blue"></i>
                            <div class="d-inline">
                                <h5><?php echo $titulo; ?></h5>
                                <span><?php echo $sub_titulo; ?></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <nav class="breadcrumb-container" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Home" href="<?php echo base_url('/'); ?>"><i class="ik ik-home"></i></a>
                                </li>                                
                                <li class="breadcrumb-item">
                                    <a data-toggle="tooltip" data-placement="bottom" title="Listar <?php echo $this->router->fetch_class(); ?>" href="<?php echo base_url($this->router->fetch_class()); ?>">Listar &nbsp;<?php echo $this->router->fetch_class(); ?></a>
                                </li>                                
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">   
                        <div class ="card-header"><?php echo (isset($sistema) ? '<strong><i class="ik ik-calendar ik-2x"></i>&nbsp;Data da ultima alteração:&nbsp;'.formata_data_banco_com_hora($sistema->data_ultima_alteracao).'</strong>' : ''); ?></div>
                        <div class="card-body">
                            <form class="forms-sample" name="form_core" method="POST">
                                <div class="form-group row">
                                    <div class="col-md-6 mb-5">
                                        <label>Nome</label>
                                        <input type="text" class="form-control" name="nome" value="<?php echo(isset($sistema) ? $sistema->nome : set_value('nome')); ?>" autocomplete="off">
                                        <?php echo form_error('nome','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-6 mb-5">
                                        <label>Logotipo</label>
                                        <input type="text" class="form-control" name="logo" value="<?php echo(isset($sistema) ? $sistema->logo : set_value('logo')); ?>" autocomplete="off">
                                        <?php echo form_error('nome','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                    
                                </div>                                
                                <?php if (isset($sistema)): ?>
                                <div class="form-group row">
                                    <div class="col-md-6 mb-5">
                                        <input type="hidden" class="form-control" name="sistema_id" value="<?php echo $sistema->id; ?>">
                                    </div>                                
                                </div>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                <a class="btn btn-info" href="<?php echo base_url('/'); ?>">Voltar</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
    
    <footer class="footer">
        <div class="w-100 clearfix">
            <span class="text-center text-sm-left d-md-inline-block">Lidery&reg; Informática</span>
            <span class="float-none float-sm-right mt-1 mt-sm-0 text-center">1.0</a></span>
        </div>
    </footer>
    
</div>