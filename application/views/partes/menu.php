<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo base_url(); ?>index.php/menu">       
                <span>
                    <img src="<?= base_url('assets/imagenes/logo_menu.png') ?>">
                </span>
                <?= NOMBRE_CORTO_SISTEMA ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav" >
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Seguridad<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url() ?>/seguridad/roles">Roles de Usuario</a></li>
                        <li><a href="<?= site_url() ?>/seguridad/usuarios">Usuarios</a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?= site_url() ?>/reportes/reporte_usuarios" target="popup" onClick="window.open(this.href, this.target, 'width=800,height=600');
                                    return false;">Reporte Usuarios</a>
                        </li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Parámetros<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url() ?>/parametros/provincias">Provincias</a></li>
                        <li class="divider"></li>
                        <li><a href="<?= site_url() ?>/parametros/puestos">Puestos de Juego</a></li>

                    </ul>
                </li>

                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Datos Generales<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url() ?>/generales/clubes">Clubes</a></li>
                        <li><a href="<?= site_url() ?>/generales/escuelas">Escuelas de Futbol</a></li>
                        <li><a href="<?= site_url() ?>/generales/jugadores">Jugadores</a></li>
                    </ul>
                </li>
                
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Campeonatos<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url() ?>/campeonatos/campeonato">Campeonatos y Equipos</a></li>
                        <li><a href="<?= site_url() ?>/campeonatos/jugadores">Equipos y Jugadores</a></li>
                        <li><a href="<?= site_url() ?>/campeonatos/partidos">Partidos e Incidencias</a></li>
                    </ul>
                </li>
                <!--
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Reportes<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?= site_url() ?>/reportes/reportepdf" target="popup" onClick="window.open(this.href, this.target, 'width=800,height=600');
                                    return false;">Reporte 1</a>
                        </li>

                    </ul>
                </li>
                -->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><p class="navbar-text">
                        <?= $this->session->userdata('datos') ?>
                    </p></li>
                <li><a href="<?php echo site_url(); ?>/autentificacion/salir">
                        <span class="glyphicon glyphicon-off"></span>
                        <b>SALIR</b>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</nav>

