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
            .alerts {
                position: absolute;
                top: 30px;
                left: 20px;
                right: 20px;
                width: 300px;
            }
            .shadow-gris{

                box-shadow: 3px 3px 12px #333;
            }

            .image-itca-vector{
                background-image:url("<?= base_url() ?>assets/imagenes/fondo_itca.png");
                background-position: center top;
                background-size: 1170px 453px;
                max-width: 1170px; 
                height: 453px; 
                margin: 0 auto;
            }
        </style>
        <script>
            window.setTimeout(function () {
                $(".alert").fadeTo(500, 0).slideUp(500, function () {
                    $(this).remove();
                });
            }, 3000);
        </script>
    </head>
    <body style=" background-image: url('<?= base_url() ?>assets/imagenes/background.jpg');  background-repeat: repeat; background-attachment: fixed;">
        <div class="container ">

            <center>
                <img src="<?= base_url() ?>assets/imagenes/banner.png" class="img-responsive">
            </center>
            <div class="panel panel-info shadow-gris image-itca-vector">
                <div class="panel-heading"><b><?= NOMBRE_SISTEMA ?></b></div>
                <div class="panel-body">

                    <div class="row">
                        <div class="col-xs-0 col-sm-2 col-md-4"></div>
                        <div class="col-xs-12 col-sm-8 col-md-4"> 

                            <form name="login" method="post" action="<?php echo site_url(); ?>/autentificacion/validar">
                                <div class="form-group">
                                    <label for="usuario">Usuario:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                                        </span>
                                        <input type="text" class="form-control" id="usuario" name="usuario" autocomplete="off">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="clave">Clave:</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">
                                            <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                                        </span>
                                        <input type="password" class="form-control" id="clave" name="clave">
                                    </div>
                                </div>
                                <button id="enviar" class="btn btn-sm btn-primary btn-block" type="submit">ACEPTAR</button><br/>

                            </form>
                            <?php
                            if ($this->session->flashdata('mostrarMensajeConfirmacion')) {
                                ?>
                                <div class="alerts3">
                                    <div class="alert alert-warning">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error!</strong> Usuario no existe.
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <br/>
                            <br/>
                        </div>
                        <div class="col-xs-0 col-sm-2 col-md-4"></div>
                    </div>
                </div>
            </div>
        </div>
        <br/>

        <script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>