<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= NOMBRE_SISTEMA ?></title>

        <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" 
              rel="stylesheet">
        <link href="<?= base_url() ?>assets/bootstrap/css/dataTables.bootstrap.min.css" 
              rel="stylesheet">

        <style type="text/css">
            .shadow-gris{
                box-shadow: 1px 1px 6px #333;
            }
        </style>
    </head>
    <body>
        <?php $this->load->view('partes/menu'); ?>
        <div class="container-fluid">      
            <div class="panel panel-default shadow-gris">
                <div class="panel-heading"> <span class="glyphicon glyphicon-check"></span> <?= $TITULO_PAGINA ?>  </div>
                <div class="panel-body">

                    <!-- +++++++++++++CODIGO INTERNO+++++++++++++++ -->

                    <form name="sistema_busqueda" method="post" action="">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                Buscar
                            </div>
                            <div class="panel-body" >
                                <div class="row" id="nombreCompleto">
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <input type="text" id="sistema_busqueda_campo1" name="sistema_busqueda[campo1]" 
                                                   class="form-control form-control" placeholder="Campo 1" tabindex="1" />  
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <input type="text" id="sistema_busqueda_campo2" name="sistema_busqueda[campo2]" 
                                                   class="form-control form-control" placeholder="Campo 2" tabindex="2" />
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group form-group-sm">
                                            <input type="text" id="sistema_busqueda_campo3" name="sistema_busqueda[campo3]" 
                                                   class="form-control form-control" placeholder="Campo 3" tabindex="3" />
                                        </div>
                                    </div>        
                                    <div class="col-md-3 col-sm-3 col-xs-12">
                                        <div class="form-group  form-group-sm">
                                            <input type="text" id="sistema_busqueda_campo4" name="sistema_busqueda[campo4]" 
                                                   class="form-control form-control" placeholder="Campo 4" tabindex="4" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="panel-footer">                    
                                <div class="pull-right">  
                                    <button type="submit" id="sistema_boton_buscar" class="btn btn-default btn-sm" name="sistema_busqueda[buscar]" >BUSCAR</button>
                                    <button type="button" id="sistema_boton_nuevo" class="btn btn-primary btn-sm">NUEVO</button>
                                </div>
                                <div class="clearfix"> </div>
                            </div>
                        </div>
                    </form>

                    <table id="mi_tablita" class="table table-striped table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>Título 1</th>
                                <th>Título 2</th>
                                <th style="width: 120px">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>dato1</td>
                                <td>dato1</td>
                                <td>
                                    <a href="" class="btn btn-primary btn-xs"><span class="glyphicon glyphicon-edit"></span> Editar</a>
                                    <a href="" class="btn btn-warning btn-xs"><span class="glyphicon glyphicon-edit"></span> Eliminar</a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>

                    <!-- +++++++++++FIN CODIGO INTERNO+++++++++++++ -->
                </div>
            </div>
        </div>
        <br/>

        <script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>

        <script src="<?= base_url() ?>assets/bootstrap/js/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/dataTables.bootstrap.min.js"></script>	
        <script>
            $(document).ready(function () {
                $('#mi_tablita').DataTable();
            });
        </script>

    </body>
</html>