<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Mi Sistema</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">Home</a></li>
            <?php if ($this->session->userdata('perfil') == 1) { ?>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Configuracion <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo base_url('Welcome/viewAdd') ?>">Registro Usuario</a></li>
                        <li><a href="<?php echo base_url('Welcome/listar') ?>">Listar Usuarios</a></li>
                        <li><a href="<?php echo base_url('Perfiles') ?>">Perfiles</a></li>
                    </ul>
                </li>
            <?php }else if ($this->session->userdata('perfil') == 2) { ?>
            <li><a href="#">Page 2</a></li>
            <?php } ?>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $this->session->userdata('nombre'); ?></a></li>
            <li><a href="<?php echo base_url('Auth/salir') ?>"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
        </ul>
    </div>
</nav>