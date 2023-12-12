<?php

defined('BASEPATH') OR exit('Ação não permitida');

class sistema extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }        
    }
    
    public function index() {
        
        $data = array (                      
            'titulo' => 'Editar informações do sistema',
            'sub_titulo' => 'Parametros do sistema',      
            'icone_view' => 'ik ik-settings',
            'sistema' => $this->sistema_model->get_all(),
        );        

        $this->load->view('layout/header',$data);
        $this->load->view('sistema/index');
        $this->load->view('layout/footer');
    }
}

