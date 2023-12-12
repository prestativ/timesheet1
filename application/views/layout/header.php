<!doctype html>
<html class="no-js" lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?php echo $this->sistema_model->get_by_nome().' | '.$titulo ?></title>
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">                
        <link rel="stylesheet" href="<?php echo base_url('public/node_modules/bootstrap/dist/css/bootstrap.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public/node_modules/@fortawesome/fontawesome-free/css/all.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public/node_modules/icon-kit/dist/css/iconkit.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public/node_modules/ionicons/dist/css/ionicons.min.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public/node_modules/perfect-scrollbar/css/perfect-scrollbar.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('public/dist/css/theme.min.css'); ?>">             
        
        <?php if(isset($styles)) :?> 
            <?php foreach ($styles as $style)  : ?>
                <link rel="stylesheet" href="<?php echo base_url($style); ?>">                   
            <?php endforeach ?>            
        <?php endif ?>                    
    </head>

    <body>
        <div class="wrapper">