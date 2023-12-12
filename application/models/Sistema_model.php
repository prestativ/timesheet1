<?php

defined('BASEPATH') or exit('Ação não permitida');

class sistema_model extends CI_Model {
    
    var $table = 'sistema';
    
    public function get_all() {       
        
        if ($this->table && $this->db->table_exists($this->table)) {
            return $this->db->get($this->table)->row();
        }else{
            return false;
        }
    }
    
    public function get_by_nome() {       
        
        if ($this->table && $this->db->table_exists($this->table)) {
            return $this->db->get($this->table)->row()->nome;            
        }else{
            return false;
        }
    }
    
    public function get_by_logo() {
        if ($this->table && $this->db->table_exists($this->table)) {
            return $this->db->get($this->table)->row()->logo;
        }else{
            return false;
        }        
    }    

    
}
