<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (!$this->session->userdata('id_usuario')) {
            redirect('autentificacion');
        }
    }

    public function index() {
        //$this->load->helper('url');
        $this->load->view('menu_view');
    }
  
}
