<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= NOMBRE_SISTEMA ?></title>
        <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">      
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style type="text/css">
            .form-control[disabled], .form-control[readonly], fieldset[disabled] .form-control {
                background-color: #fff;
                opacity: 1;
            }
            .shadow-gris{

                box-shadow: 3px 3px 12px #333;
            }
            .image-itca-vector{                
                background-image:url("<?= base_url() ?>assets/imagenes/fondo_itca2.png");
                background-position: center top;
                background-size: 1170px 700px;
                max-width: 1170px; 
                height: 700px; 
                margin: 0 auto;
            }
        </style>
    </head>
    <body style=" background-image: url('<?= base_url() ?>assets/imagenes/background.jpg') ?>');  background-repeat: repeat; background-attachment: fixed;">

        <?php $this->load->view('partes/menu'); ?>

        <div class="container">            
            <div class="panel panel-default shadow-gris image-itca-vector">
                <div class="panel-heading"> <span class="glyphicon glyphicon-link"></span> <?= NOMBRE_SISTEMA ?> </div>
                <div class="panel-body">

                </div>

            </div>
        </div>
        <br/>
        <script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>