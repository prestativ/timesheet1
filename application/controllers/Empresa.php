<?php

defined('BASEPATH') OR exit('Ação não permitida');

class empresa extends CI_Controller {  
    
    public function __construct() {        
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }        
    }       
    
    public function index() {               
        $data = array (            
            'titulo' => 'Empresas cadastradas',
            'sub_titulo' => 'Listando todas as empresas cadastrados',
            'styles' => array (
                'public/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(                
                'public/node_modules/datatables.net/js/jquery.dataTables.min.js',
                'public/node_modules//datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'public/node_modules/datatables.net/js/sistema.js',
            ),
            'empresas' => $this->empresa_model->get_all(),
        );
        
        $this->load->view('layout/header',$data);
	$this->load->view('empresa/index');
        $this->load->view('layout/footer');
    }   
    
    
}
    