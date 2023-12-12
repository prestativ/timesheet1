<?php


defined('BASEPATH') or exit('Ação não permitida');

class atividade_model extends CI_Model {
    
    var $table = 'atividades';
    
    
    public function get_all() {       
        
        if ($this->table && $this->db->table_exists($this->table)) {
            return $this->db->get($this->table)->result();
        }else{
            return false;
        }
    }  
    
    public function get_by_id($condition = null) {        
        
        if ($this->table && $this->db->table_exists($this->table) && is_array($condition)) {
            $this->db->where($condition);
            $this->db->limit(1);            
            return $this->db->get($this->table)->row();
        }else{
            return false;
        }
    }    
    public function insert($data)
    {
        if ($this->table && $this->db->table_exists($this->table) && is_array($data)) {            
           $this->db->set('data_ultima_alteracao','CURRENT_TIMESTAMP',FALSE) ;
           $this->db->insert($this->table,$data);
           if($this->db->affected_rows() > 0) {
               $this->session->set_flashdata('sucesso','Dados salvos com sucesso!');
           }
        }
    }        
}