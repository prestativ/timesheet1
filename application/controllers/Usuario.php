<?php

defined('BASEPATH') OR exit('Ação não permitida');

class usuario extends CI_Controller {  
    
    public function __construct() {        
        parent::__construct();
        
        if (!$this->ion_auth->logged_in()) {
            redirect('login');
        }        
    }

    public function index() {               
        $data = array (            
            'titulo' => 'Usuários cadastrados',
            'sub_titulo' => 'Listando todos os usuários cadastrados',
            'styles' => array (
                'public/node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css',
            ),
            'scripts' => array(                
                'public/node_modules/datatables.net/js/jquery.dataTables.min.js',
                'public/node_modules//datatables.net-bs4/js/dataTables.bootstrap4.min.js',
                'public/node_modules/datatables.net/js/sistema.js',
            ),
            'usuarios' => $this->ion_auth->users()->result(),
        );
        
        $this->load->view('layout/header',$data);
	$this->load->view('usuario/index');
        $this->load->view('layout/footer');
    }

    public function core($usuario_id = null) {           
        
        if (!$usuario_id) {               
            
            //-- Valida campos atraves de rules
            $this->form_validation->set_rules('first_name','Nome','trim|required|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('last_name','Sobrenome','trim|required|min_length[2]|max_length[100]');
            $this->form_validation->set_rules('username','Usuário','trim|required|min_length[2]|max_length[100]|is_unique[users.username]');
            $this->form_validation->set_rules('email','E-Mail (Login)','trim|required|min_length[5]|max_length[200]|is_unique[users.email]');
            $this->form_validation->set_rules('password','Senha','trim|required|min_length[5]|max_length[100]');
            $this->form_validation->set_rules('confirmacao','Confirmação','trim|required|min_length[5]|matches[password]|max_length[100]');
            
            if($this->form_validation->run()) { 
                $username = html_escape($this->input->post('username'));
                $password = html_escape($this->input->post('password'));
                $email = html_escape($this->input->post('email'));                
                $additional_data = array(
                    'first_name' => html_escape($this->input->post('first_name')),
                    'last_name' => html_escape($this->input->post('last_name')),
                    'active' => html_escape($this->input->post('active')),
                );
               $group = array(html_escape($this->input->post('perfil')));   
               $additional_data = html_escape($additional_data);             
               
               if ($this->ion_auth->register($username, $password, $email, $additional_data, $group)) {
                   $this->session->set_flashdata('sucess','Dados salvos com sucesso!');
               }else{
                   $this->session->set_flashdata('error','Erro ao salvar os dados!');
               }
               redirect ($this->router->fetch_class()); 
            }else{
                $data = array (                    
                    'titulo' => 'Cadastrar usuário',
                    'sub_titulo' => 'Cadastrando um novo usuário',
                    'icone_view' => 'ik ik-user',
                );
                $this->load->view('layout/header',$data);
                $this->load->view('usuario/core');
                $this->load->view('layout/footer');                           
            }            
        }else{
            if (!$this->ion_auth->user($usuario_id)->row()) {
                exit('Usuário não encontrado!');                
            }else{                
                $perfil_atual = $this->ion_auth->get_users_groups($usuario_id)->row();
                
                //-- Valida campos atraves de rules
                $this->form_validation->set_rules('first_name','Nome','trim|required|min_length[2]|max_length[100]');
                $this->form_validation->set_rules('last_name','Sobrenome','trim|required|min_length[2]|max_length[100]');
                $this->form_validation->set_rules('username','Usuário','trim|required|min_length[2]|max_length[100]|callback_username_check');
                $this->form_validation->set_rules('email','E-Mail (Login)','trim|required|min_length[5]|max_length[200]|callback_email_check');
                $this->form_validation->set_rules('password','Senha','trim|min_length[5]|max_length[100]');               
                $this->form_validation->set_rules('confirmacao','Confirmação','trim|min_length[5]|matches[password]|max_length[100]');                
                
                if($this->form_validation->run()) {                                        
                    $data = elements(                            
                            array(
                                'first_name',
                                'last_name',
                                'username',
                                'email',
                                'password',
                                'active',
                                
                            ),$this->input->post()                            
                    );            
                    $password = html_escape($this->input->post('password'));
                    if(!$password) {
                        unset($data['password']);
                    }
                    $data = html_escape($data);
                    if($this->ion_auth->update($usuario_id,$data)){
                        $perfil_post = html_escape($this->input->post('perfil'));                 
                        if($perfil_atual->id != $perfil_post) {
                            $this->ion_auth->remove_from_group($perfil_atual->id, $usuario_id);                            
                            $this->ion_auth->add_to_group($perfil_post, $usuario_id);
                        }
                        
                        $this->session->set_flashdata('sucess','Dados atualizados com sucesso!');                        
                    }else{
                        $this->session->set_flashdata('error','Não foi possivel atualizar os dados!'); 
                    }
                    redirect ($this->router->fetch_class());                           
                }else{
                    $data = array (                        
                        'titulo' => 'Editar usuário',
                        'sub_titulo' => 'Editando o usuário selecionado',
                        'icone_view' => 'ik ik-user',
                        'usuario' => $this->ion_auth->user($usuario_id)->row(),
                        'perfil' => $this->ion_auth->get_users_groups($usuario_id)->row(),
                    );
                    
                    $this->load->view('layout/header',$data);
                    $this->load->view('usuario/core');
                    $this->load->view('layout/footer');           
                }
            }
        }
    }
    
    public function username_check($username) {
        
        $usuario_id = $this->input->post('usuario_id');
        $dados = array(
            'username' => $username,
            'id !=' => $usuario_id,
        );
        if ($this->usuario_model->get_by_id($dados)) {
            $this->form_validation->set_message('username_check','Usuário já cadastrado!');
            return false;            
        }else{
            return true;            
        }        
    }
    
    public function email_check($email) {
        
        $usuario_id = $this->input->post('usuario_id');
        $dados = array(
            'email' => $email,
            'id !=' => $usuario_id,
        );
        if ($this->usuario_model->get_by_id($dados)) {
            $this->form_validation->set_message('email_check','E-Mail já cadastrado!');
            return false;            
        }else{
            return true;            
        }        
    }
    
    public function del($usuario_id = NULL) {
        if(!$usuario_id || !$this->usuario_model->get_by_id(array('id' => $usuario_id))) {
            $this->session->set_flashdata('error','Usuário não encontrado!');
            redirect($this->router->fetch_class());
        }else{
            if ($this->ion_auth->is_admin($usuario_id)) {
                $this->session->set_flashdata('error','Administrador não pode ser excluido!');
                redirect($this->router->fetch_class());                
            }else{
                if($this->ion_auth->delete_user($usuario_id)) {
                    $this->session->set_flashdata('sucess','Registro excluido com sucesso!');                    
                }else{
                    $this->session->set_flashdata('error','Não foi possivel excluir o registro!');                    
                }
                redirect($this->router->fetch_class());                                                        
            }            
        }        
    }

}
