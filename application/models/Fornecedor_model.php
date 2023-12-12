<?php


defined('BASEPATH') or exit('Ação não permitida');

class fornecedor_model extends CI_Model {
    
    var $table = 'pessoas';
    var $tipo  = "tipo = '1'"; // fornecedor
    
    public function get_all() {       
        
        if ($this->table && $this->db->table_exists($this->table)) {
            $this->db->where($this->tipo);
            return $this->db->get($this->table)->result();
        }else{
            return false;
        }
    }        
}