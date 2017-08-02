<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class AdminController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("adminModel");
    }

    public function index() {
        if (count($this->session->userdata("admin")) > 0) {
            $this->load->view('menuAdmin.php');
        } else {
            $this->load->view('Errormsg.php');
        }
    }

    public function getProductos() {
        $nombre = $this->input->post("nombre");
        echo json_encode($this->adminModel->getProductos($nombre));
    }
    public function getVentas() {
        $ventas=$this->adminModel->getVentas();
        echo json_encode($ventas);
    }
    public function getProductosStock() {
        $stock = $this->input->post("stock");
        echo json_encode($this->adminModel->getProductosStock($stock));
    }

    public function insertarProducto() {
        $nombre = $this->input->post("nombre");
        $stock = $this->input->post("stock");
        $precio = $this->input->post("precio");
        $this->adminModel->insertarProd($nombre, $stock, $precio);
        echo json_encode(array("msg" => "ok"));
    }

    public function updateProducto() {
        $id = $this->input->post("id");
        $nombre = $this->input->post("nombre");
        $stock = $this->input->post("stock");
        $precio = $this->input->post("precio");
        $this->adminModel->updateProd($id, $nombre, $stock, $precio);
        echo json_encode(array("msg" => "ok"));
    }

    public function deleteProducto() {
        $id = $this->input->post("id");
        $this->adminModel->deleteProd($id);
        echo json_encode(array("msg" => "ok"));
    }

}
