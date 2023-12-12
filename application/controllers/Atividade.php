<?php

defined('BASEPATH') OR exit('Ação não permitida');

class atividade extends CI_Controller {  
    
    public function __construct() {        
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }        
    }       
    
    public function index() {               
        $data = array (            
            'titulo' => 'Atividades cadastradas',
            'sub_titulo' => 'Listando todas as atividades cadastradas',
            'styles' => array (
                'public/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(                
                'public/node_modules/datatables.net/js/jquery.dataTables.min.js',
                'public/node_modules//datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'public/node_modules/datatables.net/js/sistema.js',
            ),
            'atividades' => $this->atividade_model->get_all(),
        );
        
        $this->load->view('layout/header',$data);
	$this->load->view('atividade/index');
        $this->load->view('layout/footer');
    }   
    
    public function core($atividade_id = null) {   
        
        if (!$atividade_id) {                         
            //-- Valida campos atraves de rules
            $this->form_validation->set_rules('nome','Nome','trim|required|min_length[2]|max_length[100]');
            
            if ($this->form_validation->run()) {                                
                $data = $this->input->post();
                $this->atividade_model->insert($data);                
                redirect($this->router->fetch_class());                
            }else{                
                $data = array (                                    
                    'titulo' => 'Cadastrar atividade',
                    'sub_titulo' => 'Cadastrando uma nova atividade',
                    'icone_view' => 'fas fa-users',
                    'scripts' => array(                
                        'public/node_modules/mask/jquery.mask.min.js',
                        'public/node_modules/mask/custom.js',                            
                    ),  
                    'projetos'=> $this->projeto_model->get_all(),
                    'clientes'=> $this->cliente_model->get_all(),
                );
                $this->load->view('layout/header',$data);
                $this->load->view('atividade/core');
                $this->load->view('layout/footer');                                                                                      
            }
        }else{            
            if(!$this->cliente_model->get_by_id(array('id' => $atividade_id))) {
                $this->session->set_flashdata('error','Atividade não encontrada!');
                redirect($this->router->fetch_class());                                
            }else{
                //-- Valida campos atraves de rules
                $this->form_validation->set_rules('nome','Nome','trim|required|min_length[2]|max_length[100]');
                
                if ($this->form_validation->run()) {                    
                    echo '<pre>';
                    print_r($dados);
                    exit();                    
                }else{                    
                    $data = array (                                    
                        'titulo' => 'Editando atividade',
                        'sub_titulo' => 'Editando o atividade selecionado',
                        'icone_view' => 'fas fa-users',
                        'scripts' => array(                
                            'public/node_modules/mask/jquery.mask.min.js',
                            'public/node_modules/mask/custom.js',                            
                        ),
                        'cliente' => $this->cliente_model->get_by_id(array('id' => $atividade_id))
                    );
                    $this->load->view('layout/header',$data);
                    $this->load->view('atividade/core');
                    $this->load->view('layout/footer');                                       
                }
            }
        }       
        
    }          
    
}
    