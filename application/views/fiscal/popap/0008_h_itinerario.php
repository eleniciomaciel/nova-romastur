<div class="modal fade" id="listaItineririosModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Listagens dos itinerários</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   table  ============================= -->
                <div class="table-responsive">
                    <button class="btn btn-primary btn-round" data-toggle="modal" data-target="#criaItinerioModalLong">
                        <i class="material-icons">add</i>Criar
                    </button>

                    <table class="table" id="listagem_dos_etinerarios" style="width: 100%;">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Itinerário</th>
                                <th scope="col">Dias</th>
                                <th scope="col">Saída</th>
                                <th scope="col">Horário</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

                <!-- ===================   table  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- ===================   formulario de cadastro  ============================= -->

<div class="modal fade" id="criaItinerioModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Cadastro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   card  ============================= -->
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Cadastrar linha</h4>
                        <p class="card-category">Cadastro dos itinerários fixos das linhas.</p>
                    </div>
                    <div class="card-body">
                        <form id="form_add_itinerario">

                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Linha saída:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="seleciona_ls_1" id="seleciona_ls_1"></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Linha destino:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="seleciona_ls_2" id="seleciona_ls_2"></select>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <label class="bmd-label-floating">Dias:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="select_dias" id="select_dias">
                                            <option selected disabled>Selecione aqui...</option>
                                            <option value="ss">Segunda/Sábado</option>
                                            <option value="dm">Domingos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="bmd-label-floating">H.: de saída:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="time" class="form-control" name="horario_itinerario" id="horario_itinerario">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="bt_add_itinerario btn btn-primary pull-right" id="addItinerario"><span class="material-icons"> save </span> Cadastrar</button>
                            <div class="clearfix"></div>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgAddItinerario" style="display:none"></div>
                    </div>
                </div>
                <!-- ===================   card  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- ===================   visualiza etinerario  ============================= -->

<div class="modal fade" id="verItinerioModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Linha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   card  ============================= -->
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Visualizar linha</h4>
                        <p class="card-category">Itinerários fixos das linhas.</p>
                    </div>
                    <div class="card-body">
                        <form id="form_altera_itinerario">

                            <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Linha saída:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="linha_altera_saida" id="linha_altera_saida"></select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="bmd-label-floating">Linha destino:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="linha_altera_chegada" id="linha_altera_chegada"></select>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <label class="bmd-label-floating">Dias:</label>
                                    <div class="form-group bmd-form-group">
                                        <select class="form-control" name="itiner_dias" id="itiner_dias">
                                            <option selected disabled>Selecione aqui...</option>
                                            <option value="ss">Segunda/Sábado</option>
                                            <option value="dm">Domingos</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <label class="bmd-label-floating">H.: de saída:</label>
                                    <div class="form-group bmd-form-group">
                                        <input type="time" class="form-control" name="itiner_hora" id="itiner_hora">
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="id_vw_itinerarios" id="id_vw_itinerarios">
                            <button type="submit" class="bt_upd_itinerario btn btn-primary pull-right" id="altera_dados_up_Itinerario">
                                    <span class="material-icons"> save </span> Alterar
                            </button>
                            <div class="clearfix"></div>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgUpdateItinerario" style="display:none"></div>
                    </div>
                </div>
                <!-- ===================   card  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>