<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Campeonato
 *
 * @author José Luis
 */
class Campeonatos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        $this->load->model('campeonato_model');
        $this->load->model('clubes_model');
        $this->load->model('jugadores_model');

        if (!$this->session->userdata('id_usuario')) {
            redirect('autentificacion');
        }
    }

    public function campeonato() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('tab_campeonatos');
            $crud->set_subject('Campeonatos');

            $crud->required_fields('NOMBRE_CAMPEONATO', 'FECHA_INICIO', 'FECHA_FINAL', 'ESTADO');
            $crud->field_type('ESTADO', 'dropdown', array('ACTIVO' => 'ACTIVO', 'PASIVO' => 'PASIVO'));

            $crud->set_relation_n_n("CLUBES_PARTICIPANTES", 'tab_equipos_participantes', 'tab_clubes', 'ID_CAMPEONATO', 'ID_CLUB', 'NOMBRE_CLUB', 'PRIORIDAD');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Campeonatos";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function jugadores() {
        $mostrar = "NO";
        $id_campeonato_seleccionado = 0;

        if (isset($_POST['id_campeonato'])) {
            $this->session->set_userdata('CAMPEONATO_SELECCIONADO', $_POST['id_campeonato']);
        }

        if ($this->session->userdata('CAMPEONATO_SELECCIONADO')) {
            $mostrar = "SI";
            $id_campeonato_seleccionado = $this->session->userdata('CAMPEONATO_SELECCIONADO');
        }
        try {
            $crud = new grocery_CRUD();
            $crud->where('ID_CAMPEONATO', $id_campeonato_seleccionado);
            $crud->set_table('tab_equipos_participantes');
            $crud->set_subject('Equipos Participantes');

            $crud->columns('ID_CLUB', 'JUGADORES');

            $crud->display_as('ID_CLUB', 'CLUBES');
            $crud->set_relation('ID_CLUB', 'tab_clubes', 'NOMBRE_CLUB');
            $crud->field_type('ID_CLUB', 'readonly');

            $crud->field_type('ID_CAMPEONATO', 'hidden', $id_campeonato_seleccionado);

//            $crud->set_relation_n_n('Affectation',
//                    'usertogroupe', 
//                    'groupe', 
//                    'idutilisateur', 
//                    'idgroupe',
//                    'nomGroupe',
//                    null,
//                    array('idgroupe'=>28));// I have to change the idgroupe to idutilisateur		

            //$crud->set_relation_n_n('JUGADORES', 'tab_jugadores_participantes', 'tab_jugadores', 'ID_EQUIPOS_PARTICIPANTES', 'ID_JUGADOR', '{CEDULA} {NOMBRES} {APELLIDOS}', 'PRIORIDAD', array('ID_JUGADOR' => 1));
            $crud->set_relation_n_n('JUGADORES', 'tab_jugadores_participantes', 'tab_jugadores', 'ID_EQUIPOS_PARTICIPANTES', 'ID_JUGADOR', '{CEDULA} {NOMBRES} {APELLIDOS}', 'PRIORIDAD');

            $crud->field_type('PRIORIDAD', 'invisible');
            $crud->unset_add();
            $crud->unset_delete();

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Registro de Jugadores";
            $datos["MOSTRAR"] = $mostrar;
            $datos["CAMPEONATOS"] = $this->campeonato_model->get_campeonatos();
            $datos["ID_SELECCIONADO"] = $id_campeonato_seleccionado;
            $this->load->view('jugadores_view.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function partidos() {
        $mostrar = "NO";
        $id_campeonato_seleccionado = 0;

        if (isset($_POST['id_campeonato'])) {
            $this->session->set_userdata('CAMPEONATO_SELECCIONADO2', $_POST['id_campeonato']);
        }

        if ($this->session->userdata('CAMPEONATO_SELECCIONADO2')) {
            $mostrar = "SI";
            $id_campeonato_seleccionado = $this->session->userdata('CAMPEONATO_SELECCIONADO2');
        }
        try {
            $crud = new grocery_CRUD();
            $crud->where('ID_CAMPEONATO', $id_campeonato_seleccionado);
            $crud->set_table('tab_partidos');
            $crud->set_subject('Partidos Programados');

            $crud->columns('FECHA', 'HORA', 'LUGAR', 'ID_CLUB_EQUIPO1', 'GOLES_EQUIPO1', 'PUNTOS_EQUIPO1', 'ID_CLUB_EQUIPO2', 'GOLES_EQUIPO2', 'PUNTOS_EQUIPO2');

            $crud->display_as('ID_CLUB_EQUIPO1', 'EQUIPO 1');
            $crud->display_as('GOLES_EQUIPO1', 'GOLES');
            $crud->display_as('PUNTOS_EQUIPO1', 'PUNTOS');
            $crud->display_as('ID_CLUB_EQUIPO2', 'EQUIPO 1');
            $crud->display_as('GOLES_EQUIPO2', 'GOLES');
            $crud->display_as('PUNTOS_EQUIPO2', 'PUNTOS');

            $crud->set_relation('ID_CLUB_EQUIPO1', 'tab_clubes', 'NOMBRE_CLUB');
            $crud->field_type('ID_CLUB_EQUIPO1', 'readonly');

            $crud->set_relation('ID_CLUB_EQUIPO2', 'tab_clubes', 'NOMBRE_CLUB');
            $crud->field_type('ID_CLUB_EQUIPO2', 'readonly');

            $crud->field_type('FECHA', 'readonly');
            $crud->field_type('HORA', 'readonly');
            $crud->field_type('LUGAR', 'readonly');

            $crud->field_type('ID_CAMPEONATO', 'hidden', $id_campeonato_seleccionado);

            $crud->add_action('INCIDENCIAS', base_url() . 'assets/imagenes/incidencias.png', '', 'ui-icon-ckeck', array($this, 'get_row_id'));

            $crud->unset_add();
            $crud->unset_delete();

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Partidos Programados";
            $datos["MOSTRAR"] = $mostrar;
            $datos["CAMPEONATOS"] = $this->campeonato_model->get_campeonatos();
            $datos["ID_SELECCIONADO"] = $id_campeonato_seleccionado;
            $state = $crud->getState();
            $datos["MOSTRAR_BOTON"] = "NO";
            if ($state == 'list' || $state == 'success') {
                $datos["MOSTRAR_BOTON"] = "SI";
            }

            $this->load->view('partidos_view.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    function get_row_id($primary_key, $row) {
        return site_url() . "/campeonatos/incidencias/" . $row->ID_PARTIDO;
    }

    public function agregar_partido() {
        $datos["TITULO_PAGINA"] = "Agregar Partidos";
        $id_campeonato = $this->session->userdata('CAMPEONATO_SELECCIONADO2');
        $datos["EQUIPOS"] = $this->clubes_model->get_equipos_campeonato($id_campeonato);
        $this->load->view('partidos_add_view.php', $datos);
    }

    public function guardar_partido() {
        if (isset($_POST['lugar'])) {
            $datos['ID_CAMPEONATO'] = $this->session->userdata('CAMPEONATO_SELECCIONADO2');
            $datos['FECHA'] = $_POST["fecha"];
            $datos['HORA'] = $_POST["hora"];
            $datos['LUGAR'] = $_POST["lugar"];

            $datos['ID_CLUB_EQUIPO1'] = $_POST["equipo1"];
            $datos['GOLES_EQUIPO1'] = "0";
            $datos['PUNTOS_EQUIPO1'] = "0";

            $datos['ID_CLUB_EQUIPO2'] = $_POST["equipo2"];
            $datos['GOLES_EQUIPO2'] = "0";
            $datos['PUNTOS_EQUIPO2'] = "0";

            $this->campeonato_model->guardar_partido($datos);
            $this->session->set_flashdata('mostrarMensajeConfirmacion', TRUE);
        }
        redirect("campeonatos/partidos");
    }

    public function incidencias($id_partido) {
        try {
            $crud = new grocery_CRUD();
            $crud->where('ID_PARTIDO', $id_partido);
            $crud->set_table('tab_incidencias');
            $crud->set_subject('Incidencias');

            $crud->required_fields('ID_JUGADOR', 'MINUTOS_JUGADOS', 'NUMERO_LESIONES', 'NUMERO_TARJETAS_AMARILLAS', 'TARJETA_ROJA');
            $crud->field_type('ID_PARTIDO', 'hidden', $id_partido);
            $crud->field_type('TARJETA_ROJA', 'dropdown', array('SI' => 'SI', 'NO' => 'NO'));

            $crud->display_as('ID_JUGADOR', 'JUGADOR');

            $lista_jugadores = $this->jugadores_model->jugadores_partido($id_partido);
            $arreglo = array();
            foreach ($lista_jugadores as $value) {
                $arreglo[$value->ID_JUGADOR] = $value->NOMBRE_CLUB . " - " . $value->APELLIDOS . ' ' . $value->NOMBRES;
            }
            $crud->field_type('ID_JUGADOR', 'dropdown', $arreglo);

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Campeonatos";
            $datos['REGRESAR'] = "<a href='". site_url()."/campeonatos/partidos' class='btn btn-primary'><span class='glyphicon glyphicon-chevron-left'></span> Regresar</a><br/><br/>";
            
            $partido =  $this->campeonato_model->get_partido($id_partido);
            $partido = $partido[0];
            $datos['DESCRIPCION'] = "<b>CAMPEONATO ".$partido->NOMBRE_CAMPEONATO.":</b> ".$partido->EQUIPO1." vs ".$partido->EQUIPO2."<br/>";
            
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

}
