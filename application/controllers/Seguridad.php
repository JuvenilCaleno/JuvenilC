<?php

class Seguridad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('grocery_CRUD');
        if (!$this->session->userdata('id_usuario')) {
            redirect('autentificacion');
        }
    }

    public function roles() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('admin_roles');
            $crud->set_subject('Roles');

            //los campos obligatorios
            $crud->required_fields('DESCRIPCION');

            //relaciones de varios a varios
            $crud->set_relation_n_n('PERMISOS', 'admin_permisos', 'admin_modulos', 'ID_ROL', 'ID_MODULO', 'NOMBRE_MODULO', 'PRIORIDAD');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Roles";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
        }
    }

    public function usuarios() {
        try {
            $crud = new grocery_CRUD();
            $crud->set_table('admin_usuarios');
            $crud->set_subject('Usuarios');

            //las columnas que aparecerán en la lista
            //$crud->columns('NOMBRES', 'APELLIDOS', 'CORREO_ELECTRONICO', 'NOMBRE_USUARIO', 'ID_ROL', 'ESTADO', 'FOTOGRAFIA');

            //los campos obligatorios
            $crud->required_fields('user_name', 'user_password', 'user_type');

            //para ocultar clave y encriptar
            $crud->change_field_type('user_password', 'password');
            $crud->callback_edit_field('user_password', array($this, 'set_password_input_to_empty'));
            $crud->callback_add_field('user_password', array($this, 'set_password_input_to_empty'));
            $crud->callback_before_insert(array($this, 'encrypt_password_callback'));
            $crud->callback_before_update(array($this, 'encrypt_password_callback'));

            //creando un combo box de datos (ESTÁTICOS)
            $crud->field_type('user_type', 'dropdown', array('ADMINISTRADOR' => 'ADMINISTRADOR', 'NORMAL' => 'NORMAL'));

            //creando un combo box de datos relacionados con otra tabla (DINÁMICOS)
//            $crud->display_as('ID_ROL', 'ROL');
//            $crud->set_relation('ID_ROL', 'admin_roles', 'DESCRIPCION');

            //cargando archivos
//            $crud->set_field_upload('FOTOGRAFIA', 'assets/uploads/files', 'jpg|JPG');

            //validaciones - Validar tipo de datos
//            $crud->set_rules('TELEFONO', 'TELÉFONO', 'integer');

            //Validaciones - validaciones personalizadas (unico, requerido y formato correcto)
            //$crud->set_rules('CORREO_ELECTRONICO', 'CORREO ELECTRÓNICO', 'trim|required|is_unique[admin_usuarios.CORREO_ELECTRONICO]|valid_email');
//            $crud->set_rules('CORREO_ELECTRONICO', 'CORREO ELECTRÓNICO', 'valid_email|required');

            //validaciones - Valores únicos
//            $crud->unique_fields('NOMBRE_USUARIO', 'CORREO_ELECTRONICO');

            $output = $crud->render();
            $datos = (array) $output;
            $datos['TITULO_PAGINA'] = "Administrar Usuarios";
            $this->load->view('template_grocery.php', $datos);
        } catch (Exception $e) {
            //show_error($e->getMessage() . ' --- ' . $e->getTraceAsString());
            echo $e->getMessage() . ' --- ' . $e->getTraceAsString();
        }
    }

    function encrypt_password_callback($post_array, $primary_key) {
        $this->load->library('encrypt');
        if (!empty($post_array['user_password'])) {
            //$key = 'super-secret-key';
            //$post_array['CLAVE'] = $this->encrypt->encode($post_array['CLAVE'], $key);
            $post_array['user_password'] = md5($post_array['user_password']);
        } else {
            unset($post_array['user_password']);
        }
        return $post_array;
    }

    function set_password_input_to_empty() {
        return "<input type='password' name='user_password' class='form-control' value='' />";
    }

}
