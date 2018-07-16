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
            <form name="sistema_editar" method="post" action="<?= site_url() ?>/campeonatos/guardar_partido" >
                <div class="panel panel-default shadow-gris">
                    <div class="panel-heading"> 
                        <span class="glyphicon glyphicon-check"></span> <?= $TITULO_PAGINA ?>  </div>
                    <div class="panel-body" >

                        <!-- +++++++++++++CODIGO INTERNO+++++++++++++++ -->

                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="lugar" style="font-weight: normal">Lugar del partido</label>
                                    <input type="text" id="lugar" 
                                           name="lugar" 
                                           class="form-control form-control" 
                                           required="required"
                                           placeholder="Lugar..." 
                                           tabindex="1" />  
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="fecha" style="font-weight: normal">Fecha</label>
                                    <input type="date" id="fecha" 
                                           name="fecha" 
                                           class="form-control form-control" 
                                           required="required"
                                           placeholder="Fecha..." 
                                           tabindex="1" />  
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="form-group  form-group-sm">
                                    <label for="hora" style="font-weight: normal">Hora</label>
                                    <select class="form-control input-sm"
                                            id="hora"
                                            name="hora"
                                            required="required">
                                        <option value="" selected hidden>Seleccione...</option>
                                        <option value="07:00 am">07:00 am</option>
                                        <option value="08:00 am">08:00 am</option>
                                        <option value="09:00 am">09:00 am</option>
                                        <option value="10:00 am">10:00 am</option>
                                        <option value="11:00 am">11:00 am</option>
                                        <option value="12:00 pm">12:00 pm</option>
                                        <option value="01:00 pm">01:00 pm</option>
                                        <option value="02:00 pm">02:00 pm</option>
                                        <option value="03:00 pm">03:00 pm</option>
                                        <option value="04:00 pm">04:00 pm</option>
                                        <option value="05:00 pm">05:00 pm</option>
                                        <option value="06:00 pm">06:00 pm</option>
                                        <option value="07:00 pm">07:00 pm</option>
                                        <option value="08:00 pm">08:00 pm</option>
                                        <option value="09:00 pm">09:00 pm</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <div class="form-group  form-group-sm">
                                    <label for="equipo1" style="font-weight: normal">Equipo 1</label>
                                    <select class="form-control input-sm"
                                            id="equipo1"
                                            name="equipo1"
                                            required="required">
                                        <option value="" selected hidden>Seleccione...</option>
                                        <?php
                                        foreach ($EQUIPOS as $value) {
                                            ?>
                                            <option value="<?= $value->ID_CLUB ?>"><?= $value->NOMBRE_CLUB ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="goles1" style="font-weight: normal">Goles</label>
                                    <input type="text" id="goles1" name="goles1" 
                                           value="0" readonly
                                           class="form-control form-control" placeholder="Campo 3" tabindex="3" />
                                </div>
                            </div>        
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="puntos1" style="font-weight: normal">Puntos</label>
                                    <input type="text" id="puntos1" name="puntos1" 
                                           value="0" readonly
                                           class="form-control form-control" placeholder="Campo 3" tabindex="3" />
                                </div>
                            </div>    
                        </div>


                        <div class="row">
                            <div class="col-md-6 col-sm-4 col-xs-12">
                                <div class="form-group  form-group-sm">
                                    <label for="equipo1" style="font-weight: normal">Equipo 2</label>
                                    <select class="form-control input-sm"
                                            id="equipo2"
                                            name="equipo2"
                                            required="required">
                                        <option value="" selected hidden>Seleccione...</option>
                                        <?php
                                        foreach ($EQUIPOS as $value) {
                                            ?>
                                            <option value="<?= $value->ID_CLUB ?>"><?= $value->NOMBRE_CLUB ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="goles2" style="font-weight: normal">Goles</label>
                                    <input type="text" id="goles2" name="goles2" 
                                           value="0" readonly
                                           class="form-control form-control" placeholder="Campo 3" tabindex="3" />
                                </div>
                            </div>        
                            <div class="col-md-3 col-sm-4 col-xs-12">
                                <div class="form-group form-group-sm">
                                    <label for="puntos2" style="font-weight: normal">Puntos</label>
                                    <input type="text" id="puntos2" name="puntos2" 
                                           value="0" readonly
                                           class="form-control form-control" placeholder="Campo 3" tabindex="3" />
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
                            <a href="<?= site_url() ?>/campeonatos/partidos" 
                               class="btn btn-default btn-sm">
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