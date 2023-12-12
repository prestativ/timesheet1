<?php

defined('BASEPATH') OR exit('Ação não permitida');

class projeto extends CI_Controller {  
    
    public function __construct() {        
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }        
    }       
    
    public function index() {               
        $data = array (            
            'titulo' => 'Projetos cadastrados',
            'sub_titulo' => 'Listando todos os projetos cadastrados',
            'styles' => array (
                'public/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(                
                'public/node_modules/datatables.net/js/jquery.dataTables.min.js',
                'public/node_modules//datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'public/node_modules/datatables.net/js/sistema.js',
            ),
            'projetos' => $this->projeto_model->get_all(),
        );
        
        $this->load->view('layout/header',$data);
	$this->load->view('projeto/index');
        $this->load->view('layout/footer');
    }   
    
    public function core($projeto_id = null) {   
        
        if (!$projeto_id) {                         
            //-- Valida campos atraves de rules
            $this->form_validation->set_rules('nome','Nome','trim|required|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('descricao','Descrição','trim|required|min_length[2]|max_length[100]');            
            
            if ($this->form_validation->run()) {                
                $data = $this->input->post();
                $this->projeto_model->insert($data);                
                redirect($this->router->fetch_class());                
            }else{                
                $data = array (                                    
                    'titulo' => 'Cadastrar projeto',
                    'sub_titulo' => 'Cadastrando um novo projeto',
                    'icone_view' => 'fas fa-users',
                    'scripts' => array(                
                        'public/node_modules/mask/jquery.mask.min.js',
                        'public/node_modules/mask/custom.js',                            
                    ),                    
                    'clientes'=> $this->cliente_model->get_all(),
                );
                $this->load->view('layout/header',$data);
                $this->load->view('projeto/core');
                $this->load->view('layout/footer');                                                                                      
            }
        }else{            
            if(!$this->projeto_model->get_by_id(array('id' => $projeto_id))) {
                $this->session->set_flashdata('error','Projeto não encontrado!');
                redirect($this->router->fetch_class());                                
            }else{
                //-- Valida campos atraves de rules
                $this->form_validation->set_rules('nome','Nome','trim|required|min_length[2]|max_length[100]');
                $this->form_validation->set_rules('descricao','Descrição','trim|required|min_length[2]|max_length[100]');
                
                if ($this->form_validation->run()) {                    
                    echo '<pre>';
                    print_r($dados);
                    exit();                    
                }else{                    
                    $data = array (                                    
                        'titulo' => 'Editando projeto',
                        'sub_titulo' => 'Editando o projeto selecionado',
                        'icone_view' => 'fas fa-users',
                        'scripts' => array(                
                            'public/node_modules/mask/jquery.mask.min.js',
                            'public/node_modules/mask/custom.js',                            
                        ),
                        'projeto' => $this->projeto_model->get_by_id(array('id' => $projeto_id))
                    );
                    $this->load->view('layout/header',$data);
                    $this->load->view('projeto/core');
                    $this->load->view('layout/footer');                                       
                }
            }
        }               
    }          
    
    public function del($projeto_id = null) {  
        
        if (!$projeto_id || !$this->projeto_model->get_by_id(array('id' => $projeto_id))) {
            $this->session->set_flashdata('error','Projeto não encontrado!');
            redirect($this->router->fetch_class());                                
        }else{
            $this->projeto_model->delete(array('id'=>$projeto_id));
            redirect($this->router->fetch_class());                                
        }        
    }
    
    
}
    