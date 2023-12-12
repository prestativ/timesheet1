<?php


defined('BASEPATH') or exit('Ação não permitida');

class empresa_model extends CI_Model {
    
    var $table = 'empresas';
    
    public function get_all() {       
        
        if ($this->table && $this->db->table_exists($this->table)) {            
            return $this->db->get($this->table)->result();
        }else{
            return false;
        }
    }        
}