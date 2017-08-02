<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class VendedorController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("vendedorModel");
    }

    public function index() {
        if (count($this->session->userdata("usuario")) > 0) {
            $this->load->view('menuVendedor');
        } else {
            $this->load->view('Errormsg.php');
        }
    }

    function getProductos() {
        $nombre = $this->input->post("nombre");
        echo json_encode($this->vendedorModel->getProductos($nombre));
    }

    public function addCarro() {
        $id = $this->input->post("id");
        $nombre = $this->input->post("nombre");
        $stock = $this->input->post("stock");
        $precio = $this->input->post("precio");
        $dato = array("idproducto" => $id, "nombre" => $nombre, "stock" => $stock, "precio" => $precio);
        if ($this->session->userdata("carro")) {
            $carro = $this->session->userdata("carro");
            $carro[] = $dato;
            $this->session->set_userdata("carro", $carro);
        } else {
            $carro = array();
            $carro[] = $dato;
            $this->session->set_userdata("carro", $carro);
        }
        echo json_encode(array("msg" => "ok"));
    }

    public function vaciarCarro() {
        if ($this->session->userdata("carro")) {
            $vacio = array();
            $this->session->set_userData("carro", $vacio);
            echo json_encode(array("msg" => "ok"));
        }
    }

    public function getcarro() {
        echo json_encode($this->session->userdata("carro"));
    }

    public function getcarro2() {
        if ($this->session->userdata("carro")) {
            echo json_encode($this->session->userdata("carro"));
        } else {
            echo json_encode(array("msg" => "carro"));
        }
    }

    public function realizarPago() {
        $total = $this->input->post("total");
        $cliente = $this->input->post("cliente");
        if ($this->session->userdata("carro")) {
            $carro = $this->session->userdata("carro");
            $user = $this->session->userdata("usuario");
            $this->vendedorModel->realizarVenta($user->rut, $total, $cliente, $carro);
            $this->vaciarCarro();
        }
        echo json_encode(array("msg"=>"ok"));
    }

    public function prueba(){
        echo json_encode($this->vendedorModel->getUltimaventa());
    }
    
}
