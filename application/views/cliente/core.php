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
                                <li class="breadcrumb-item active" aria-current="page">Clientes</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">   
                        <div class ="card-header"><?php echo (isset($cliente) ? '<strong><i class="ik ik-calendar ik-2x"></i>&nbsp;Data da ultima alteração:&nbsp;'.formata_data_banco_com_hora($cliente->data_ultima_alteracao).'</strong>' : ''); ?></div>
                        <div class="card-body">
                            <form class="forms-sample" name="form_core" method="POST">
                                <div class="form-group row">
                                    <div class="col-md-5 mb-4">
                                        <label><b>Razão social</b></label>
                                        <input type="text" class="form-control" name="nome" value="<?php echo(isset($cliente) ? $cliente->nome : set_value('nome')); ?>" autocomplete="off">
                                        <?php echo form_error('nome','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-5 mb-5">
                                        <label>Fantasia</label>
                                        <input type="text" class="form-control" name="fantasia" value="<?php echo(isset($cliente) ? $cliente->fantasia : set_value('fantasia')); ?>" autocomplete="off">
                                        <?php echo form_error('fantasia','<div class="text-danger">','</div>'); ?>
                                    </div>              
                                    <div class="col-md-2 mb-5">
                                        <label>Identificação</label>
                                        <select class="form-control" name="identific">
                                            <?php if(isset($cliente)) : ?>
                                                <option value="0" <?php echo ($cliente->identific == 0 ? 'selected' : '') ?>>Física</option>
                                                <option value="1" <?php echo ($cliente->identific == 1 ? 'selected' : '') ?>>Jurídica</option>
                                            <?php else: ?>                                                    
                                                <option value="0">Física</option>
                                                <option value="1">Jurídica</option>
                                            <?php endif; ?>    
                                        </select>
                                    </div>                                                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-3 mb-5">
                                        <label><b>CPF/CNPJ</b></label>
                                        <input type="text" class="form-control" name="cpfcnpj" value="<?php echo(isset($cliente) ? $cliente->cpfcnpj : set_value('cpfcnpj')); ?>" autocomplete="off">
                                        <?php echo form_error('cpfcnpj','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-2 mb-5">
                                        <label><b>CEP</b></label>
                                        <input type="text" class="form-control cep" name="cep" value="<?php echo(isset($cliente) ? $cliente->cep : set_value('cep')); ?>" autocomplete="off">
                                        <?php echo form_error('cep','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-5 mb-5">
                                        <label><b>Endereço</b></label>
                                        <input type="text" class="form-control" name="endereco" value="<?php echo(isset($cliente) ? $cliente->endereco : set_value('endereco')); ?>" autocomplete="off">
                                        <?php echo form_error('endereco','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-2 mb-5">
                                        <label><b>Numero</b></label>
                                        <input type="text" class="form-control" name="numero" value="<?php echo(isset($cliente) ? $cliente->numero : set_value('numero')); ?>" autocomplete="off">
                                        <?php echo form_error('numero','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                    
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-4 mb-5">
                                        <label>Complemento</label>
                                        <input type="text" class="form-control" name="complemento" value="<?php echo(isset($cliente) ? $cliente->complemento : set_value('complemento')); ?>" autocomplete="off">
                                        <?php echo form_error('complemento','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-4 mb-5">
                                        <label><b>Bairro</b></label>
                                        <input type="text" class="form-control" name="bairro" value="<?php echo(isset($cliente) ? $cliente->bairro : set_value('bairro')); ?>" autocomplete="off">
                                        <?php echo form_error('bairro','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-2 mb-5">
                                        <label><b>Cidade</b></label>
                                        <input type="text" class="form-control" name="cidade" value="<?php echo(isset($cliente) ? $cliente->cidade : set_value('cidade')); ?>" autocomplete="off">
                                        <?php echo form_error('cidade','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                    
                                    <div class="col-md-2 mb-5">
                                        <label><b>Estado</b></label>
                                        <input type="text" class="form-control" name="estado" value="<?php echo(isset($cliente) ? $cliente->estado : set_value('estado')); ?>" autocomplete="off">
                                        <?php echo form_error('estado','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                                                        
                                </div>                      
                                <div class="form-group row">
                                    <div class="col-md-2 mb-5">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control sp_celphones" name="telefone" value="<?php echo(isset($cliente) ? $cliente->telefone : set_value('telefone')); ?>" autocomplete="off">
                                        <?php echo form_error('telefone','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-4 mb-5">
                                        <label>Contato</label>
                                        <input type="text" class="form-control" name="contato" value="<?php echo(isset($cliente) ? $cliente->contato : set_value('contato')); ?>" autocomplete="off">
                                        <?php echo form_error('contato','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                    
                                    <div class="col-md-6 mb-5">
                                        <label>E-Mail</label>
                                        <input type="email" class="form-control" name="email" value="<?php echo(isset($cliente) ? $cliente->email : set_value('email')); ?>" autocomplete="off">
                                        <?php echo form_error('email','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                                                        
                                </div>                                                     
                                <div class="form-group row">
                                    <div class="col-md-2 mb-5">
                                        <label>Competencia (De)</label>
                                        <input type="number" class="form-control" name="data_comp01" value="<?php echo(isset($cliente) ? $cliente->data_comp01 : set_value('data_comp01')); ?>" autocomplete="off">
                                        <?php echo form_error('data_comp01','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-2 mb-5">                                         
                                        <label>(Até)</label>
                                        <input type="number" class="form-control" name="data_comp02" value="<?php echo(isset($cliente) ? $cliente->data_comp02 : set_value('data_comp02')); ?>" autocomplete="off">
                                        <?php echo form_error('data_comp02','<div class="text-danger">','</div>'); ?>
                                    </div>                                
                                    <div class="col-md-2 mb-5">
                                        <label>Data limite</label>
                                        <input type="number" class="form-control" name="data_limite" value="<?php echo(isset($cliente) ? $cliente->data_limite : set_value('data_limite')); ?>" autocomplete="off">
                                        <?php echo form_error('data_limite','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                    
                                    <div class="col-md-2 mb-5">
                                        <label>Dia Pagamento</label>
                                        <input type="number" class="form-control" name="dia_pagamento" value="<?php echo(isset($cliente) ? $cliente->dia_pagamento : set_value('dia_pagamento')); ?>" autocomplete="off">
                                        <?php echo form_error('dia_pagamento','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                                                        
                                    <div class="col-md-2 mb-5">
                                        <label>$ Valor</label>
                                        <input type="text" class="form-control" name="valor" value="<?php echo(isset($cliente) ? $cliente->valor : set_value('valor')); ?>" autocomplete="off">
                                        <?php echo form_error('valor','<div class="text-danger">','</div>'); ?>
                                    </div>                                                                                                                                            
                                </div>                                                     
                                
                                <?php if (isset($cliente)): ?>
                                <div class="form-group row">
                                    <div class="col-md-6 mb-5">
                                        <input type="hidden" class="form-control" name="id" value="<?php echo $cliente->id; ?>">
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

