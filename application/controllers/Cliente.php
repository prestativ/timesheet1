<?php

defined('BASEPATH') OR exit('Ação não permitida');

class cliente extends CI_Controller {  
    
    public function __construct() {        
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }        
    }       
    
    public function index() {               
        $data = array (            
            'titulo' => 'Clientes cadastrados',
            'sub_titulo' => 'Listando todos os clientes cadastrados',
            'styles' => array (
                'public/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(                
                'public/node_modules/datatables.net/js/jquery.dataTables.min.js',
                'public/node_modules//datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'public/node_modules/datatables.net/js/sistema.js',
            ),
            'clientes' => $this->cliente_model->get_all(),
        );
        
        $this->load->view('layout/header',$data);
	$this->load->view('cliente/index');
        $this->load->view('layout/footer');
    }   
    
    public function core($pessoa_id = null) {   
        
        if (!$pessoa_id) {  
            //-- Valida campos atraves de rules
            $this->form_validation->set_rules('nome','Nome','trim|required|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('fantasia','Fantasia','trim|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('identific','Identificação','trim|required|min_length[1]|max_length[1]');            
            $this->form_validation->set_rules('cpfcnpj','CNPJ/CPF','trim|required|min_length[1]|max_length[20]|is_unique[pessoas.cpfcnpj]');
            $this->form_validation->set_rules('cep','CEP','trim|required|min_length[1]|max_length[9]');
            $this->form_validation->set_rules('endereco','Endereço','trim|required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('numero','Numero','trim|required|min_length[1]|max_length[10]');
            $this->form_validation->set_rules('complemento','Complemento','trim|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('bairro','Bairro','trim|required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('cidade','Cidade','trim|required|min_length[1]|max_length[100]');
            $this->form_validation->set_rules('estado','Estado','trim|required|min_length[2]|max_length[2]');
            $this->form_validation->set_rules('telefone','Telefone','trim|min_length[2]|max_length[20]');
            $this->form_validation->set_rules('celular','Celular','trim|required|min_length[2]|max_length[20]');
            $this->form_validation->set_rules('contato','Contato','trim|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('email','E-Mail','trim|min_length[2]|max_length[100]');

            if ($this->form_validation->run()) {                
                $data = $this->input->post();
                $this->cliente_model->insert($data);                
                redirect($this->router->fetch_class());
            }else{                
                $data = array (                                    
                    'titulo' => 'Cadastrar cliente',
                    'sub_titulo' => 'Cadastrando um novo cliente',
                    'icone_view' => 'fas fa-users',
                    'scripts' => array(                
                        'public/node_modules/mask/jquery.mask.min.js',
                        'public/node_modules/mask/custom.js',                            
                    ),                    
                );
                $this->load->view('layout/header',$data);
                $this->load->view('cliente/core');
                $this->load->view('layout/footer');                                                                                      
            } 
        }else{            
            if(!$this->cliente_model->get_by_id(array('id' => $pessoa_id))) {
                $this->session->set_flashdata('error','Cliente não encontrado!');
                redirect($this->router->fetch_class());                                
            }else{
                //-- Valida campos atraves de rules
                $this->form_validation->set_rules('tipo','Tipo','trim|required|min_length[1]|max_length[1]');
                $this->form_validation->set_rules('identific','Identificação','trim|required|min_length[1]|max_length[1]');
                $this->form_validation->set_rules('nome','Nome','trim|required|min_length[2]|max_length[100]');
                $this->form_validation->set_rules('fantasia','Fantasia','trim|min_length[2]|max_length[100]');
                $this->form_validation->set_rules('cpfcnpj','CNPJ/CPF','trim|required|min_length[1]|max_length[20]');
                $this->form_validation->set_rules('cep','CEP','trim|required|min_length[1]|max_length[9]');
                $this->form_validation->set_rules('endereco','Endereço','trim|required|min_length[1]|max_length[100]');
                $this->form_validation->set_rules('numero','Numero','trim|required|min_length[1]|max_length[10]');
                $this->form_validation->set_rules('complemento','Complemento','trim|min_length[1]|max_length[100]');
                $this->form_validation->set_rules('bairro','Bairro','trim|required|min_length[1]|max_length[100]');
                $this->form_validation->set_rules('cidade','Cidade','trim|required|min_length[1]|max_length[100]');
                $this->form_validation->set_rules('estado','Estado','trim|required|min_length[2]|max_length[2]');
                $this->form_validation->set_rules('telefone','Telefone','trim|min_length[2]|max_length[20]');
                $this->form_validation->set_rules('celular','Celular','trim|required|min_length[2]|max_length[20]');
                $this->form_validation->set_rules('contato','Contato','trim|min_length[2]|max_length[100]');
                $this->form_validation->set_rules('email','E-Mail','trim|min_length[2]|max_length[100]');
                $this->form_validation->set_rules('site','Site','trim|min_length[2]|max_length[100]');                            
                
                if ($this->form_validation->run()) {                    
                    echo '<pre>';
                    print_r($dados);
                    exit();                    
                }else{                    
                    $data = array (                                    
                        'titulo' => 'Editando cliente',
                        'sub_titulo' => 'Editando o cliente selecionado',
                        'icone_view' => 'fas fa-users',
                        'scripts' => array(                
                            'public/node_modules/mask/jquery.mask.min.js',
                            'public/node_modules/mask/custom.js',                            
                        ),
                        'cliente' => $this->cliente_model->get_by_id(array('id' => $pessoa_id))
                    );
                    $this->load->view('layout/header',$data);
                    $this->load->view('cliente/core');
                    $this->load->view('layout/footer');                                       
                }
            }
        }       
        
    }    
    public function del($pessoa_id = null) {  
        
        if (!$pessoa_id || !$this->cliente_model->get_by_id(array('id' => $pessoa_id))) {
            $this->session->set_flashdata('error','Cliente não encontrado!');
            redirect($this->router->fetch_class());                                
        }else{
            $this->cliente_model->delete(array('id'=>$pessoa_id));
            redirect($this->router->fetch_class());                                
        }        
    }
    
}
    