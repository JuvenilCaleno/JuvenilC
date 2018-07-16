<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Autentificacion extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model("usuarios_model");
    }

    public function index() {
        $this->load->view('autentificacion_view');
        //$this->load->library('encrypt');
        //$plain_text = 'JOSE LUIS';
        //$key = 'super-secret-key';
        //$encriptado = $this->encrypt->encode($plain_text, $key);
        //echo $this->encrypt->decode($encriptado,$key);
    }

    public function validar() {
        $persona = $this->usuarios_model->buscar_autentificacion($_POST['usuario'], md5($_POST['clave']));
        if ($persona) {
            $this->session->set_userdata('id_usuario', $persona->ID_USUARIO);
            $this->session->set_userdata('datos', $persona->NOMBRE_COMPLETO );
            redirect("menu");
        } else {
            $this->session->set_flashdata('mostrarMensajeConfirmacion', TRUE);
            redirect("");
        }
    }

    public function salir() {
        $this->session->unset_userdata('id_usuario');
        $this->session->unset_userdata('datos');
        
        $this->session->unset_userdata('CAMPEONATO_SELECCIONADO');
        $this->session->unset_userdata('CAMPEONATO_SELECCIONADO2');
        
        $this->session->sess_destroy();
        redirect('/');
    }

}
