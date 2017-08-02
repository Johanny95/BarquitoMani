<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("indexModel");
    }

    public function index() {
        $this->load->view('index');
    }

    public function iniciarSesion() {
        $rut = $this->input->post("rut");
        $clave = $this->input->post("pass");
        $user = $this->indexModel->IniciarSession($rut, $clave);
        if (count($user) > 0) {
            if($user[0]->rol=="vendedor"){
                $this->session->set_userdata("usuario", $user[0]);
            }else if ($user[0]->rol=="administrador"){
                $this->session->set_userdata("admin", $user[0]);
            }
            echo json_encode(array("msg" => $user[0]->rol));
        } else {
            echo json_encode(array("msg" => "error"));
        }
    }

    public function cerrarSession() {
        $this->session->sess_destroy();
        echo json_encode(array("msg"=>"ok"));
    }

}
