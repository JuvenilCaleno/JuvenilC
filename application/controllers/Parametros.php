<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Parametros
 *
 * @author José Luis
 */
class Parametros extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        if (!$this->session->userdata('id_usuario')) {
            redirect('autentificacion');
        }
    }

    public function provincias() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tab_provincias');
            $crud->set_subject('Provincias');

            //los campos obligatorios
            $crud->required_fields('NOMBRE_PROVINCIA');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Provincias";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function puestos() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tab_puestos');
            $crud->set_subject('Puestos de Juego');

            //los campos obligatorios
            $crud->required_fields('DESCRIPCION_PUESTO');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Puesto de Juego";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    

}
