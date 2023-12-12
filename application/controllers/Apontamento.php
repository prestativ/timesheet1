<?php

defined('BASEPATH') OR exit('Ação não permitida');

class apontamento extends CI_Controller {  
    
    public function __construct() {        
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }        
    }       
    
    public function index() {               
        $data = array (            
            'titulo' => 'Apontamento cadastradas',
            'sub_titulo' => 'Listando todos os apontamentos cadastradas',
            'styles' => array (
                'public/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
                'public/node_modules/handsontable/handsontable.full.min.css',
            ),
            'scripts' => array(                
                'public/node_modules/datatables.net/js/jquery.dataTables.min.js',
                'public/node_modules//datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'public/node_modules/datatables.net/js/sistema.js',
                'public/node_modules/handsontable/handsontable.full.min.js',
            ),            
        );
        
        $this->load->view('layout/header',$data);
	$this->load->view('apontamento/index');
        $this->load->view('layout/footer');
    }  
        
    
}
    