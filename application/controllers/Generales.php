<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Generales
 *
 * @author José Luis
 */
class Generales extends CI_Controller {

    //put your code here

    public function __construct() {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        if (!$this->session->userdata('id_usuario')) {
            redirect('autentificacion');
        }
    }

    public function clubes() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tab_clubes');
            $crud->set_subject('Clubes');

            //los campos obligatorios
            $crud->required_fields('CODIGO', 'NOMBRE_CLUB');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Clubes";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }
    
    public function escuelas() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tab_escuelas');
            $crud->set_subject('Escuelas de Futbol');

            //los campos obligatorios
            $crud->required_fields('NOMBRE_ESCUELA');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Escuelas de Futbol";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function jugadores() {
        try {
            $crud = new grocery_CRUD();
            
            //$crud->set_theme('datatables');
            //$crud->set_theme('twitter-bootstrap');
            
            $crud->set_table('tab_jugadores');
            $crud->set_subject('Jugadores');

            //las columnas que aparecerán en la lista
            $crud->columns('CEDULA', 'NOMBRES', 'APELLIDOS', 'APODO', 'TELEFONO','FOTOGRAFIA');

            //los campos obligatorios
            $crud->required_fields('CEDULA', 'NOMBRES', 'APELLIDOS','ESTADO');

            $crud->display_as('ID_PROVINCIA_NACIMIENTO', 'PROVINCIA DE NACIMIENTO');
            $crud->set_relation('ID_PROVINCIA_NACIMIENTO', 'tab_provincias', 'NOMBRE_PROVINCIA');

            $crud->display_as('ID_PROVINCIA_RESIDENCIA', 'PROVINCIA DE RESIDENCIA');
            $crud->set_relation('ID_PROVINCIA_RESIDENCIA', 'tab_provincias', 'NOMBRE_PROVINCIA');
            
            $crud->display_as('ID_ESCUELA', 'ESCUELA DE FUTBOL');
            $crud->set_relation('ID_ESCUELA', 'tab_escuelas', 'NOMBRE_ESCUELA');
            
             $crud->display_as('ID_PUESTO', 'PUESTO DE JUEGO');
            $crud->set_relation('ID_PUESTO', 'tab_puestos', 'DESCRIPCION_PUESTO');

            $crud->field_type('ESTADO', 'dropdown', array('ACTIVO' => 'ACTIVO', 'PASIVO' => 'PASIVO'));

            $crud->set_field_upload('FOTOGRAFIA', 'assets/uploads/files', 'jpg|JPG');

            $crud->set_rules('TELEFONO', 'TELÉFONO', 'integer');

            $crud->unique_fields('CEDULA');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Jugadores";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            //show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            echo $e->getMessage() . ' --- ' . $e->getTraceAsString();
        }
    }

}
