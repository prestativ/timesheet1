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
                                <li class="breadcrumb-item active" aria-current="page">Projetos</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">   
                        <div class ="card-header"><?php echo (isset($atividade) ? '<strong><i class="ik ik-calendar ik-2x"></i>&nbsp;Data da ultima alteração:&nbsp;'.formata_data_banco_com_hora($atividade->data_ultima_alteracao).'</strong>' : ''); ?></div>
                        <div class="card-body">
                            <form class="forms-sample" name="form_core" method="POST">
                                <div class="form-group row">
                                    <div class="col-md-5 mb-4">
                                        <label>Descrição</label>
                                        <input type="text" class="form-control" name="nome" value="<?php echo(isset($atividade) ? $atividade->nome : set_value('nome')); ?>" autocomplete="off">
                                        <?php echo form_error('nome','<div class="text-danger">','</div>'); ?>
                                    </div>                              
                                    <div class="col-md-7 mb-5">
                                        <label for="">Cliente</label>
                                        <select class="form-control clientes select2" name="pessoa_id">
                                            <option value="">Escolha...</option>
                                            <?php foreach ($clientes as $cliente): ?>
                                                <?php if (isset($cliente)): ?>
                                                    <option value="<?php echo $cliente->id?>" <?php echo ($cliente->id == $cliente->id ? 'selected' : '') ?>><?php echo $cliente->nome . '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;CPF&nbsp&nbsp;' . $cliente->cpfcnpj; ?></option>                                                
                                                <?php else: ?>
                                                    <option value="<?php echo $cliente->id?>"><?php echo $cliente->nome . '&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;CPF&nbsp&nbsp;' . $cliente->cpfcnpj; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>                                    
                                    <div class="col-md-5 mb-5">
                                        <label for="">Projetos</label>
                                        <select class="form-control projetos select2" name="projeto_id">
                                            <option value="">Escolha...</option>
                                            <?php foreach ($projetos as $projeto): ?>
                                                <?php if (isset($projeto)): ?>
                                                    <option value="<?php echo $projeto->id?>" <?php echo ($projeto->id == $projeto->id ? 'selected' : '') ?>><?php echo $projeto->nome; ?></option>                                                
                                                <?php else: ?>
                                                    <option value="<?php echo $projeto->id?>"><?php echo $projeto->nome; ?></option>
                                                <?php endif; ?>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-2 mb-5">
                                        <label>Grupo</label>
                                        <select class="form-control" name="grupo_id">
                                            <?php if(isset($atividade)) : ?>
                                                <option value="0" <?php echo ($atividade->grupo_id == 0 ? 'selected' : '') ?>>Gerente</option>
                                                <option value="1" <?php echo ($atividade->grupo_id == 1 ? 'selected' : '') ?>>Analista</option>
                                            <?php else: ?>                                                    
                                                <option value="0">Gerente</option>
                                                <option value="1">Analista</option>
                                            <?php endif; ?>    
                                        </select>
                                    </div>                                                                                                        
                                </div>    
                                <div class="form-group row">                                    
                                    <div class="col-md-2 mb-5">
                                        <label>Valor</label>
                                        <input type="text" class="form-control" name="valor" value="<?php echo(isset($atividade) ? $atividade->valor : set_value('valor')); ?>" autocomplete="off">
                                        <?php echo form_error('cpfcnpj','<div class="text-danger">','</div>'); ?>
                                    </div>   
                                    <div class="col-md-2 mb-5">
                                        <label>Horas</label>
                                        <input type="time" class="form-control" name="horas" value="<?php echo(isset($atividade) ? $atividade->horas : set_value('horas')); ?>" autocomplete="off">
                                        <?php echo form_error('horas','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                                                                                                                                
                                    <div class="col-md-2 mb-5">
                                        <label>Validade</label>
                                        <input type="date" class="form-control" name="horas" value="<?php echo(isset($atividade) ? $atividade->validade : set_value('validade')); ?>" autocomplete="off">
                                        <?php echo form_error('horas','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                                                                                                                                                                    
                                </div>                                
                                <?php if (isset($atividade)): ?>
                                <div class="form-group row">
                                    <div class="col-md-6 mb-5">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $atividade->id; ?>">
                                    </div>                                
                                </div>
                                <?php endif; ?>
                                <button type="submit" class="btn btn-primary mr-2">Salvar</button>
                                <a class="btn btn-info" href="<?php echo base_url($this->router->fetch_class()); ?>">Voltar</a>
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

