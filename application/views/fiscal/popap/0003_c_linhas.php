<div class="modal fade" id="listaLinhasModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Linhas cadastradas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   lista table linhas  ============================= -->
                <button class="btn btn-info" data-toggle="modal" data-target="#adicipnaLinhaModalCenter">
                    <i class="fa fa-plus"></i> Add linha
                </button>
                <div class="table-responsive">
                <table class="table" id="listaLinhasTodas" style="width: 100%;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome da linha</th>
                            <th scope="col">Saída</th>
                            <th scope="col">Destino</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>

                <!-- ===================   lista table linhas  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<!-- ===================   adicionando linhas  ============================= -->

<div class="modal fade" id="adicipnaLinhaModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Adicionar linha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   car linha  ============================= -->

                <div class="card">
                    <div class="card-header card-header-icon card-header-info">
                        <div class="card-icon">
                            <i class="material-icons">directions_bus</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_add_linha">
                        <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <label for="">Saída:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">directions</i>
                                    </span>
                                </div>
                                <input type="text" name="linha_saida" class="form-control" placeholder="Ex.: Centro.">
                            </div>

                            <br>
                            <label for="">Destino:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">beenhere</i>
                                    </span>
                                </div>
                                <input type="text" name="linha_chegada" class="form-control" placeholder="Ex.: Águas Claras.">
                            </div>

                            <button class="bt_add_linha btn btn-info btn-round" id="addlinha">
                                <i class="material-icons">save</i> Salvar
                            </button>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgFromAddLinha" style="display:none"></div>
                    </div>
                </div>

                <!-- ===================   car linha  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>


<!-- ===================   alterando dados da linhas  ============================= -->

<div class="modal fade" id="viewLinhaModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Alterar linha</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- ===================   car linha  ============================= -->

                <div class="card">
                    <div class="card-header card-header-icon card-header-success">
                        <div class="card-icon">
                            <i class="material-icons">directions_bus</i>
                        </div>
                    </div>
                    <div class="card-body">
                        <form id="form_altera_linha">
                        <?php
                            $csrf = array(
                                'name' => $this->security->get_csrf_token_name(),
                                'hash' => $this->security->get_csrf_hash()
                            );
                            ?>
                            <input type="hidden" name="<?= $csrf['name']; ?>" value="<?= $csrf['hash']; ?>" />
                            <label for="">Saída:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">directions</i>
                                    </span>
                                </div>
                                <input type="text" name="linha_up_saida" id="linha_up_saida" class="form-control" placeholder="Ex.: Centro.">
                            </div>

                            <br>
                            <label for="">Destino:</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="material-icons">beenhere</i>
                                    </span>
                                </div>
                                <input type="text" name="linha_up_chega" id="linha_up_chega" class="form-control" placeholder="Ex.: Águas Claras.">
                            </div>

                            <input type="hidden" name="id_vw_linha" id="id_vw_linha">
                            <button class="bt_altera_linha btn btn-success btn-round" id="aalteralinha">
                                <i class="material-icons">save</i> Alterar
                            </button>
                        </form>
                        <br>
                        <div class="alert alert-danger print-error-msgFromLinhaAltera" style="display:none"></div>
                    </div>
                </div>

                <!-- ===================   car linha  ============================= -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>