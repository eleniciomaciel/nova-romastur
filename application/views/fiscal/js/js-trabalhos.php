<script>
    $(document).ready(function() {

        listaCarros_na_linha();
        listaOcorrencias_na_linha();
        listaCarros_na_linha_sai();
        countOcirrencias();

        var dataTable_trab = $('#lista_das_atividades_fiscal').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                url: "<?= site_url('lista-todos-trabalhos-atividades') ?>",
                type: 'GET'
            },
        });

        /**lista espelho */
        var dataTable_espelho = $('#lista_espelho_dia').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                url: "<?= site_url('lista-fluxo-hoje-espelho') ?>",
                type: 'GET'
            },
        });
        /**visualiza chegada do carro */
        $(document).on('click', '.btn_chega', function() {
            let id_tbl_ln = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('listagem-dados-linha-trbalhos/') ?>" + id_tbl_ln,
                method: "GET",
                data: {
                    id_tbl_ln: id_tbl_ln
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#registroChegadasModalLong').modal('show');
                    $('#ln_tbl_carros').val(data.ln_tbl_carros);
                    $('#ln_tbl_linhas').val(data.ln_tbl_linhas);
                    $('#ln_tbl_chegada').val(data.ln_tbl_chegada);
                    $('#ln_tbl_chegada_tipo').val(data.ln_tbl_chegada);
                    $('#ln_tbl_saidas').val(data.ln_tbl_saidas);
                    $('#ln_tbl_linhas_id').val(data.ln_tbl_linhas_id);
                    $('#ln_tbl_chegada_id').val(data.ln_tbl_chegada_id);
                    $('#id_tbl_ln').val(id_tbl_ln);
                }
            })
        });

        /**inseri chegada do carro */
        $(document).on('submit', '#form_registro_chegada_carro', function(event) {
            event.preventDefault();

            var str_add_ocorrencia = $("#form_registro_chegada_carro").serialize();

            $('#addRegistroChega').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>REGISTRANDO CHEGADA, AGUARDE....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_add_registro_chegada").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('registrar-chegada-fiscal') ?>",
                type: 'POST',
                dataType: "json",
                data: str_add_ocorrencia,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAddrEGIST_chegada").css('display', 'none');
                        swal("OK!", data.success, "success");

                        dataTable_trab.ajax.reload();
                        $('#addRegistroChega').html('<span class="material-icons"> done_outline </span> registrar');
                        $(".bt_add_registro_chegada").prop("disabled", false);
                        countOcirrencias();
                    } else {
                        $(".print-error-msgAddrEGIST_chegada").css('display', 'block');
                        $(".print-error-msgAddrEGIST_chegada").html(data.error);

                        $('#addRegistroChega').html('<span class="material-icons"> done_outline </span> registrar');
                        $(".bt_add_registro_chegada").prop("disabled", false);
                    }
                }
            });
        });


        /**visualiza carro saída */
        $(document).on('click', '.btn_sai', function() {
            let id_tbl_ln_saida = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('listagem-dados-linha-trbalhos/') ?>" + id_tbl_ln_saida,
                method: "GET",
                data: {
                    id_tbl_ln_saida: id_tbl_ln_saida
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#registroSaidasModalLong').modal('show');
                    $('#ln_tbl_sai_carros').val(data.ln_tbl_carros);
                    $('#ln_tbl_sai_linhas').val(data.ln_tbl_linhas);
                    $('#ln_tbl_sai_chegada').val(data.ln_tbl_chegada);
                    $('#ln_tbl_sai_saidas').val(data.ln_tbl_saidas);
                    $('#ln_tbl_linhas_sai_id').val(data.ln_tbl_linhas_id);
                    $('#id_tbl_ln_saida').val(id_tbl_ln_saida);

                }
            })
        });

        /**registra sida do carro peo fiscal */
        $(document).on('submit', '#form_registra_saidas_do_carro', function(event) {
            event.preventDefault();

            var str_add_ocorrencia = $("#form_registra_saidas_do_carro").serialize();
            var my_id_sai = $("input[name='ln_tbl_linhas_sai_id']").val();

            $('#regist_saida_carro').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>REGISTRANDO SAÍDA, AGUARDE....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_register_saida_car").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('registrar-saida-carro-fiscal/') ?>" + my_id_sai,
                type: 'POST',
                dataType: "json",
                data: str_add_ocorrencia,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAddrEGIST_saida_car").css('display', 'none');
                        swal("OK!", data.success, "success");

                        dataTable_trab.ajax.reload();
                        $('#regist_saida_carro').html('<span class="material-icons"> done_outline </span> registrar');
                        $(".bt_register_saida_car").prop("disabled", false);
                        countOcirrencias();

                    } else {
                        $(".print-error-msgAddrEGIST_saida_car").css('display', 'block');
                        $(".print-error-msgAddrEGIST_saida_car").html(data.error);

                        $('#regist_saida_carro').html('<span class="material-icons"> done_outline </span> registrar');
                        $(".bt_register_saida_car").prop("disabled", false);
                    }
                }
            });
        });


        /**visualiza acompanhamentos */
        $(document).on('click', '.ver_acomnhamentos_id', function() {
            let id_tbl_acomp = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('ver-acomnhamento-id/') ?>" + id_tbl_acomp,
                method: "GET",
                data: {
                    id_tbl_acomp: id_tbl_acomp
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#acompanhamentoVerModalLong').modal('show');
                    $('#acomp_linha').val(data.acomp_linha);
                    $('#acomp_carro').val(data.acomp_carro);
                    $('#acomp_ocore').val(data.acomp_ocore);
                    $('#acomp_h_cheg').val(data.acomp_h_cheg);
                    $('#acomp_h_saida').val(data.acomp_h_saida);
                    $('#id_tbl_acomp').val(id_tbl_acomp);
                }
            })
        });

        /**registra sida do carro peo fiscal */
        $(document).on('submit', '#form_altera_atividades_linha', function(event) {
            event.preventDefault();

            var str_add_ocorrencia = $("#form_altera_atividades_linha").serialize();
            var my_id_atv = $("input[name='id_tbl_acomp']").val();

            $('#regist_altera_hours').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>ALTERANDO REGISTRO, AGUARDE....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_register_altera_hours").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('altera-registro-atividade-horas-carro-fiscal/') ?>" + my_id_atv,
                type: 'POST',
                dataType: "json",
                data: str_add_ocorrencia,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAltera_hours").css('display', 'none');
                        swal("OK!", data.success, "success");

                        dataTable_trab.ajax.reload();
                        $('#regist_altera_hours').html('<span class="material-icons"> save </span> alterar');
                        $(".bt_register_altera_hours").prop("disabled", false);

                    } else {
                        $(".print-error-msgAltera_hours").css('display', 'block');
                        $(".print-error-msgAltera_hours").html(data.error);

                        $('#regist_altera_hours').html('<span class="material-icons"> save </span> alterar');
                        $(".bt_register_altera_hours").prop("disabled", false);
                    }
                }
            });
        });


        /**lista carros */
        function listaCarros_na_linha() {
            $.ajax({
                url: "<?= site_url('lista-todos-carros') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="ln_tbl_carros"]').empty();
                    $('select[name="ln_tbl_carros"]').append('<option selected disabled>Selecione aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="ln_tbl_carros"]').append('<option value="' + value.id_cr + '">' + value.carro_codigo + '</option>');
                    });
                }
            });
        }

        function listaCarros_na_linha_sai() {
            $.ajax({
                url: "<?= site_url('lista-todos-carros') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="ln_tbl_sai_carros"]').empty();
                    $('select[name="ln_tbl_sai_carros"]').append('<option selected disabled>Selecione aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="ln_tbl_sai_carros"]').append('<option value="' + value.id_cr + '">' + value.carro_codigo + '</option>');
                    });
                }
            });
        }

        function listaOcorrencias_na_linha() {
            $.ajax({
                url: "<?= site_url('listagem-das-ocorrencias_tbl') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="ln_tbl_ocorrencias"]').empty();
                    $.each(data, function(key, value) {
                        $('select[name="ln_tbl_ocorrencias"]').append('<option value="' + value.id_oc + '">' + value.nome_ocorrencias_oc + '</option>');
                    });
                }
            });
        }

        function countOcirrencias() {
            $.get("<?php echo site_url('contador-de-ocorrencias'); ?>", function(data) {
                $(".result_count_ocorrencias").html(data);
            });
        }
    });
</script>