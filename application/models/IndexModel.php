<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class IndexModel extends CI_Model {
    public function __construct() {
        parent::__construct();
    }
    
    function IniciarSession($rut,$clave){
        $this->db->where("rut",$rut);
        $this->db->where("clave",$clave);
        return $this->db->get("usuario")->result();
    }
    
    
    
}
