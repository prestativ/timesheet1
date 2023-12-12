<?php

defined('BASEPATH') or exit('Ação não permitida');

class usuario_model extends CI_Model {
    
    var $table = 'users';
    
    public function get_all($condition = null) {
        
        if ($this->table && $this->db->table_exists($this->table)) {
            if (is_array($condition)) {
                $this->db->where($condition);
            }
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
  
}
