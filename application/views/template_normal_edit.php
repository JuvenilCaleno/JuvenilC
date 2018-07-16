<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= NOMBRE_SISTEMA ?></title>

        <link href="<?= base_url() ?>assets/bootstrap/css/bootstrap.min.css" 
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
            <form name="sistema_editar" method="post" action="" >
                <div class="panel panel-default shadow-gris">
                    <div class="panel-heading"> 
                        <span class="glyphicon glyphicon-check"></span> <?= $TITULO_PAGINA ?>  </div>
                    <div class="panel-body" >

                        <!-- +++++++++++++CODIGO INTERNO+++++++++++++++ -->

                        <div class="row">
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="sistema_editar_campo1" style="font-weight: normal">Campo 1</label>
                                    <input type="text" id="sistema_editar_campo1" 
                                           name="sistema_editar[campo1]" 
                                           class="form-control form-control" 
                                           required="required"
                                           placeholder="Campo 1" 
                                           tabindex="1" />  
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="sistema_editar_campo2" style="font-weight: normal">Campo 2</label>
                                    <input type="text" id="sistema_editar_campo2" 
                                           name="sistema_editar[campo2]" 
                                           class="form-control form-control" 
                                           placeholder="Campo 2" tabindex="2" />
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="sistema_editar_campo3" style="font-weight: normal">Campo 3</label>
                                    <input type="text" id="sistema_editar_campo3" name="sistema_editar[campo3]" 
                                           class="form-control form-control" placeholder="Campo 3" tabindex="3" />
                                </div>
                            </div>        
                            <div class="col-md-3 col-sm-6 col-xs-12">
                                <div class="form-group  form-group-sm">
                                    <label for="sistema_editar_campo4" style="font-weight: normal">Campo 4</label>
                                    <input type="date" id="sistema_editar_campo4" name="sistema_editar[campo4]" 
                                           class="form-control form-control" placeholder="Campo 4" tabindex="4" />
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="form-group  form-group-sm">
                                    <label for="sistema_editar_campo5" style="font-weight: normal">Campo 5</label>
                                    <select class="form-control input-sm"
                                            id="sistema_editar_campo5"
                                            name="sistema_editar[campo5]"
                                            required="required">
                                        <option value="" selected hidden>Seleccione...</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <label for="sistema_editar_campo6" style="font-weight: normal">Campo 6</label>
                                <div>                                    
                                    <label class="radio-inline"><input type="radio" name="sistema_editar[campo6]">Option 1</label>
                                    <label class="radio-inline"><input type="radio" name="sistema_editar[campo6]">Option 2</label>
                                    <label class="radio-inline"><input type="radio" name="sistema_editar[campo6]">Option 3</label>
                                </div>
                            </div>
                        </div>
                        <!-- +++++++++++FIN CODIGO INTERNO+++++++++++++ -->
                    </div>
                    <div class="panel-footer">                    
                        <div class="pull-left">  
                            <button type="submit" id="sistema_boton_guardar" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-save"></span>
                                GUARDAR
                            </button>
                            <a href="" class="btn btn-default btn-sm">
                                <span class="glyphicon glyphicon-remove"></span>
                                CANCELAR
                            </a>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                </div>
            </form>
        </div>
        <br/>

        <script src="<?= base_url() ?>assets/bootstrap/js/jquery.min.js"></script>
        <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
    </body>
</html>