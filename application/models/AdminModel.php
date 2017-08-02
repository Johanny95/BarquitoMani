<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getProductos($nombre) {
        $this->db->like('nombre', $nombre);
        return $this->db->get("producto")->result();
    }

    function getProductosStock($stock) {
        $this->db->where("stock <=", $stock);
        return $this->db->get("producto")->result();
    }

    function insertarProd($nombre, $stock, $precio) {
        $datos = array("nombre" => $nombre, "stock" => $stock, "precio" => $precio);
        $this->db->insert("producto", $datos);
    }

    function updateProd($id, $nombre, $stock, $precio) {
        $this->db->where("idproducto", $id);
        $datos = array("nombre" => $nombre, "stock" => $stock, "precio" => $precio);
        $this->db->update("producto", $datos);
    }

    function deleteProd($id) {
        $this->db->where("idproducto", $id);
        $this->db->delete("producto");
    }

    function getVentas() {
        $this->db->select('v.fecha,u.nombre,u.apellido,u.rut,v.total,v.nombreCliente');
        $this->db->from('venta v');
        $this->db->join('usuario u', 'v.rut = u.rut');
        return $this->db->get()->result();
    }

}
