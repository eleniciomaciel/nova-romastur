<div class="container-fluid">
    <div class="navbar-wrapper">
        <a class="navbar-brand" href="#pablo">
        <?php
            $sess_id = $this->session->userdata('user')['id'];
            if(!empty($sess_id))
            {
                $user = $this->session->userdata('user');
                extract($user);
                ?>
                    Seja bem vindo(a) <?php echo $this->session->userdata('user')['user_nome']?>
                <?php
            }else{
                $this->session->set_userdata(array('msg'=>'Sua sessão expirou')); 
                redirect('/welcome/logout');   
            } 
        ?>
            
        </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
        <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
        <form class="navbar-form">
        </form>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">notifications</i>
                    <span class="result_count_message notification">0</span>
                    <p class="d-lg-none d-md-block">
                        Meus avisos
                    </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                    <div id="div_avisos_fiscal"></div>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="material-icons">person</i>
                    <p class="d-lg-none d-md-block">
                        Minha conta
                    </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                    <a class="vewMewPerfil dropdown-item" href="#" id="<?=$id?>">
                        <span class="material-icons"> how_to_reg </span>&nbsp;Perfíl
                    </a>
                    <a class="dadosLoginAcesso dropdown-item" href="#"  id="<?=$id?>">
                        <span class="material-icons"> verified_user </span>&nbsp;Acesso
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?= site_url('sair') ?>">
                        <span class="material-icons"> phonelink_lock </span>&nbsp;Sair
                    </a>
                </div>
            </li>
        </ul>
    </div>
</div>