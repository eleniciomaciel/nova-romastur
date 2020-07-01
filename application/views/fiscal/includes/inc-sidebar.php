<div class="logo">
    <a href="#" class="simple-text logo-normal">

        <img src="<?= base_url('assets/home/images/logo3.png') ?>" alt="" class="img-responsive">
    </a>
</div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item active  ">
            <a class="nav-link" href="#">
                <i class="material-icons">dashboard</i>
                <p>Navegação</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#listaCarros">
                <i class="material-icons">directions_bus</i>
                <p>Carros</p>
            </a>
        </li>
        <li class="nav-item " data-toggle="modal" data-target="#listaLinhasModal">
            <a class="nav-link" href="#">
                <i class="material-icons">directions</i>
                <p>Linhas</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="#"  data-toggle="modal" data-target="#montarLinhaModal">
                <i class="material-icons">emoji_transportation</i>
                <p>Montar linha</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="#"  data-toggle="modal" data-target="#ocorrenciasModalLista">
                <i class="material-icons">build</i>
                <p>Ocorrências</p>
            </a>
        </li>
        <li class="nav-item ">
            <a href="#" class="viewRelatorios nav-link" id="<?php echo $this->session->userdata('user')['id'];?>">
                <i class="material-icons">post_add</i>
                <p>Relatórios</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="meusAvisos nav-link" href="#" id="<?php echo $this->session->userdata('user')['id'];?>">
                <i class="material-icons">record_voice_over</i>
                <p>Avisos</p>
            </a>
        </li>
        <li class="nav-item ">
            <a class="nav-link" href="#" data-toggle="modal" data-target="#listaItineririosModalLong">
                <i class="material-icons">nature_people</i>
                <p>Itinerários</p>
            </a>
        </li>
        <!-- 
                <li class="nav-item ">
                    <a class="nav-link" href="./rtl.html">
                        <i class="material-icons">language</i>
                        <p>RTL Support</p>
                    </a>
                </li> -->
        <li class="nav-item">
            <a class="nav-link" href="<?= site_url('sair') ?>">
                <i class="material-icons">power_settings_new</i>
                <p>Sair</p>
            </a>
        </li>
    </ul>
</div>