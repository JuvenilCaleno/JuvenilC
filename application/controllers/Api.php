<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH . '/libraries/REST_Controller.php');

class Api extends REST_Controller {

    public function __construct($config = 'rest') {
        /* header("Access-Control-Allow-Origin: *");
          header("Access-Control-Allow-Methods: GET");
          header("Access-Control-Allow-Methods: GET, OPTIONS");
          header("Access-Control-Allow-Headers: X-API-KEY , Authorization"); */
        parent::__construct();
        $this->load->model('servicios_model');
    }

    public function jugadores_get($id_jugador = null) {
        $r = $this->servicios_model->get_jugadores($id_jugador);
        $this->response($r);
    }

    public function jugadores_post() {
        //$accion = $this->input->post('accion');
        $id = $this->input->post('id');
        $data = array(
            'APODO' => $this->input->post('apodo'),
            'DIRECCION' => $this->input->post('direccion'),
            'TELEFONO' => $this->input->post('telefono')
        );
        $r = $this->servicios_model->actualizar_jugador($id, $data);
        $this->response($r);
    }

    public function jugadorcedula_get($cedula) {
        $r = $this->servicios_model->get_jugadores_by_cedula($cedula);
        $this->response($r);
    }

    public function campeonatos_get() {
        $r = $this->servicios_model->get_campeonatos();
        $this->response($r);
    }

    public function resultados_get($id_campeonato) {
        $r = $this->servicios_model->get_resultados($id_campeonato);
        $this->response($r);
    }

    public function tabla_get($id_campeonato) {
        $r = $this->servicios_model->get_tabla($id_campeonato);
        $this->response($r);
    }
    
    public function incidencias_get($id_jugador) {
        $r = $this->servicios_model->indicencias($id_jugador);
        $this->response($r);
    }

}
