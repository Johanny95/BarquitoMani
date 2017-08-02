<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VendedorModel extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    function getProductos($nombre) {
        $this->db->like('nombre', $nombre);
        return $this->db->get("producto")->result();
    }

    function getUltimaventa() {
        $this->db->select('MAX(idventa) AS "id"');
        $var = $this->db->get("venta")->result();
        return ($var[0]->id) + 1;
    }

    function realizarVenta($rut, $total, $cliente, $carro) {
        $this->db->trans_begin();
        $idVenta = $this->getUltimaventa();
        $venta = array("fecha" => date("d-m-y"), "total" => $total, "nombreCliente" => $cliente, "rut" => $rut);
        $this->db->insert("venta", $venta);
        foreach ($carro as $p) {
            $this->db->set("stock", 'stock - ' . $p["stock"], false);
            $this->db->where("idproducto", $p["idproducto"]);
            $this->db->update("producto");
            $detalle = array("idproducto" => $p["idproducto"], "idventa" => $idVenta, "precio" => $p["precio"], "cantidad" => $p["stock"]);
            $this->db->insert("detalleventa", $detalle);
        }
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
        } else {
            $this->db->trans_commit();
        }
    }

}
