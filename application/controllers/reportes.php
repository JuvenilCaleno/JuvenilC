<?php

class reportes extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('usuarios_model');
    }

    public function reportepdf() {
        $this->load->helper('path');
        $font_directory = './application/libraries/fpdf/font/';
        set_realpath($font_directory);
        $this->load->library('fpdf');
        define('FPDF_FONTPATH', $font_directory);
        $this->fpdf->Open();
        $this->fpdf->AddPage("P"); //L:Horizontal o P:Vertical
        $this->fpdf->SetFont('Arial', 'B', 15);
        $this->fpdf->Cell(190, 6, utf8_decode("PRUEBA"), 0, 1, 'C');
        $this->fpdf->Output();
    }

    public function reporte_usuarios() {
        $this->load->helper('path');
        $font_directory = './application/libraries/fpdf/font/';
        set_realpath($font_directory);
        $this->load->library('fpdf');
        define('FPDF_FONTPATH', $font_directory);

        $this->fpdf->Open();
        $this->fpdf->AddPage("P"); //L:Horizontal o P:Vertical
        $this->fpdf->SetFont('Arial', 'B', 15);

        $this->fpdf->Image('./assets/imagenes/banner_reporte.jpg', 15, 5, 180);
        $this->fpdf->Cell(280, 6, "", 0, 1, 'C'); //280 HORI - 190 VER
        $this->fpdf->Ln(20);

        //TITULO DEL REPORTE
        $this->fpdf->SetFont('Arial', 'BU', 13);
        $this->fpdf->Cell(190, 12, utf8_decode("REPORTE DE USUARIOS"), 0, 1, 'C');

        $this->fpdf->SetFont('Arial', 'B', 9);
        $this->fpdf->SetFillColor(143, 164, 225);
        $this->fpdf->Cell(10, 5, "", 0, 0, 'L');
        $this->fpdf->Cell(7, 5, "Nro", 1, 0, 'L', true);
        $this->fpdf->Cell(45, 5, "NOMBRES", 1, 0, 'L', true);
        $this->fpdf->Cell(45, 5, "APELLIDOS", 1, 0, 'L', true);
        $this->fpdf->Cell(45, 5, "NOMBRE USUARIO", 1, 0, 'L', true);
        $this->fpdf->Cell(35, 5, "ROL", 1, 1, 'L', true);

        $this->fpdf->SetFont('Arial', '', 8);
        $this->fpdf->SetFillColor(214, 230, 151);
        $bandera = true;

        $i = 0;
        $altura = 5;
        $usuarios = $this->usuarios_model->get_usuarios();
        foreach ($usuarios as $user) {
            if ($i % 2 == 0)
                $this->fpdf->SetFillColor(255, 255, 255);
            else
                $this->fpdf->SetFillColor(218, 225, 247);

            //DATOS DE LA BASE
            $this->fpdf->Cell(10, 5, "", 0, 0, 'L');
            $this->fpdf->Cell(7, $altura, $i + 1, 1, 0, 'C', $bandera);
            $this->fpdf->Cell(45, $altura, utf8_decode($user->NOMBRES), 1, 0, 'L', $bandera);
            $this->fpdf->Cell(45, $altura, utf8_decode($user->APELLIDOS), 1, 0, 'L', $bandera);
            $this->fpdf->Cell(45, $altura, utf8_decode($user->NOMBRE_USUARIO), 1, 0, 'L', $bandera);
            $this->fpdf->Cell(35, $altura, utf8_decode($user->DESCRIPCION), 1, 1, 'L', $bandera);
            $i++;
        }
        $this->fpdf->Ln();
        $this->fpdf->SetFont('Arial', '', 8);
        $this->fpdf->SetFillColor(255, 255, 255);
        $this->fpdf->Cell(10, 5, "", 0, 0, 'L');
        $this->fpdf->Cell(159, 5, "Total de registros: ".$i, 0, 1, 'L');

        $this->fpdf->Output();
    }

}
