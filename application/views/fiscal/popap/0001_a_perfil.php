<div class="modal fade" id="perfilModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados do perfíl</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   card  ============================= -->
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">account_circle</i>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- ===================   form  ============================= -->
                        <form id="form_perfil">
                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">portrait</i>
                                    </span>
                                </div>
                                <input type="text" name="fiscal_nome" id="fiscal_nome" class="form-control" placeholder="Ex.: Ana Maria">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">mail_outline</i>
                                    </span>
                                </div>
                                <input type="text" name="fiscal_email" id="fiscal_email" class="form-control" placeholder="Ex.: ana@fiscal.com">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">edit</i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" value="Fiscal" disabled>
                            </div>

                            <input type="hidden" name="id_meu_pf" id="id_meu_pf">
                            <button class="bt_atera_perfil btn btn-primary btn-round" id="upPerfil">
                                <i class="material-icons">save</i> Alterar
                            </button>

                        </form>
                        <!-- ===================   fim form  ============================= -->
                        <br>
                        <div class="alert alert-danger print-error-msgFromPerfil" style="display:none"></div>
                    </div>
                </div>
                <!-- ===================   fim card  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- =================================================================   login do usuarios  ======================================================================= -->

<div class="modal fade" id="loginPasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Dados do perfíl</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   card  ============================= -->
                <div class="card">
                    <div class="card-header card-header-icon card-header-rose">
                        <div class="card-icon">
                            <i class="material-icons">verified_user</i>
                        </div>
                    </div>
                    <div class="card-body">

                        <!-- ===================   form  ============================= -->
                        <form id="form_login">
                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">mail_outline</i>
                                    </span>
                                </div>
                                <input type="text" name="fiscal_login" id="fiscal_login" class="form-control" placeholder="Ex.: Ana Maria">
                            </div>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">lock_open</i>
                                    </span>
                                </div>
                                <input type="text" name="fiscal_password" id="fiscal_password" class="form-control" placeholder="Ex.: Eu123456@">
                            </div>


                            <input type="hidden" name="id_meu_pf_log" id="id_meu_pf_log">
                            <button class="bt_atera_perfil_login btn btn-primary btn-round" id="upPerfilLOgin">
                                <i class="material-icons">save</i> Alterar
                            </button>

                        </form>
                        <!-- ===================   fim form  ============================= -->
                        <br>
                        <div class="alert alert-danger print-error-msgFromPerfil_login" style="display:none"></div>
                    </div>
                </div>
                <!-- ===================   fim card  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>