<?php

defined('BASEPATH') or exit('Ação não permitida');

class cliente_model extends CI_Model {
    
    var $table = 'pessoas';
    var $tipo  = "tipo = '0'"; // cliente
    
    public function get_all() {       
        
        if ($this->table && $this->db->table_exists($this->table)) {
            $this->db->where($this->tipo);
            return $this->db->get($this->table)->result();
        }else{
            return false;
        }
    }  
    
    public function get_by_id($condition = null) {        
        
        if ($this->table && $this->db->table_exists($this->table) && is_array($condition)) {
            $this->db->where($condition);
            $this->db->where($this->tipo);
            $this->db->limit(1);            
            return $this->db->get($this->table)->row();
        }else{
            return false;
        }
    }    
    
    public function insert($data)
    {
        if ($this->table && $this->db->table_exists($this->table) && is_array($data)) {            
           $this->db->set('tipo','0') ;
           $this->db->set('data_ultima_alteracao','CURRENT_TIMESTAMP',FALSE) ;
           $this->db->insert($this->table,$data);
           if($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('sucesso','Dados salvos com sucesso!');
           }
        }else{
            return false;
        }
    }
    
    public function delete($data) 
    {
        if ($this->table && $this->db->table_exists($this->table) && is_array($data)) {            
            if ($this->db->delete($this->table,$data)) {
               $this->session->set_flashdata('sucesso','Registro excluido com sucesso!');
           }else{
               $this->session->set_flashdata('error','Não foi possivel excluir o registro!');
           }
        }else{
            return false;
        }     
    }
}