<script>
    $(document).ready(function() {

        select_linha1();
        select_linha2();
        select_linha_altera_saida();
        select_linha_altera_chegada()

        var dataTableiti = $('#listagem_dos_etinerarios').DataTable({
            "language": { //Altera o idioma do DataTable para o português do Brasil
                "url": "//cdn.datatables.net/plug-ins/1.10.12/i18n/Portuguese-Brasil.json"
            },
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                url: "<?= site_url('lista-etinearios-todos') ?>",
                type: 'GET'
            },
        });

        /**inseri itinerario */
        $(document).on('submit', '#form_add_itinerario', function(event) {
            event.preventDefault();

            var str_add_ocorrencia = $("#form_add_itinerario").serialize();

            $('#addItinerario').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Sanvando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_add_itinerario").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('cadastra-itinerario') ?>",
                type: 'POST',
                dataType: "json",
                data: str_add_ocorrencia,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgAddItinerario").css('display', 'none');
                        swal("OK!", data.success, "success");

                        dataTableiti.ajax.reload();
                        $('#addItinerario').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_itinerario").prop("disabled", false);

                    } else {
                        $(".print-error-msgAddItinerario").css('display', 'block');
                        $(".print-error-msgAddItinerario").html(data.error);

                        $('#addItinerario').html('<i class="fa fa-save"></i> Salvar');
                        $(".bt_add_itinerario").prop("disabled", false);
                    }
                }
            });
        });


        /**visuali a linha */
        $(document).on('click', '.verSelectItinerarios', function() {
            let id_vw_itinerarios = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('lista-dados-da-linha/') ?>" + id_vw_itinerarios,
                method: "GET",
                data: {
                    id_vw_itinerarios: id_vw_itinerarios
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#verItinerioModalLong').modal('show');
                    $('#linha_altera_saida').val(data.itiner_saida);
                    $('#linha_altera_chegada').val(data.itiner_chega);
                    $('#itiner_hora').val(data.itiner_hora);
                    $('#itiner_dias').val(data.itiner_dias);
                    $('#id_vw_itinerarios').val(id_vw_itinerarios);
                }
            })
        });


        /**altera itinerario */
        $(document).on('submit', '#form_altera_itinerario', function(event) {
            event.preventDefault();

            var str_add_ocorrencia = $("#form_altera_itinerario").serialize();
            var id_new_iti = $("input[name='id_vw_itinerarios']").val();

            $('#altera_dados_up_Itinerario').html('<i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Alterando, aguarde....<span class="sr-only">Loading...</span>').prop("disabled", true);
            $(".bt_upd_itinerario").prop("disabled", true);

            $.ajax({
                url: "<?= site_url('altera-dados-itinerario/') ?>" + id_new_iti,
                type: 'POST',
                dataType: "json",
                data: str_add_ocorrencia,
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        $(".print-error-msgUpdateItinerario").css('display', 'none');
                        swal("OK!", data.success, "success");

                        dataTableiti.ajax.reload();
                        $('#altera_dados_up_Itinerario').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_upd_itinerario").prop("disabled", false);

                    } else {
                        $(".print-error-msgUpdateItinerario").css('display', 'block');
                        $(".print-error-msgUpdateItinerario").html(data.error);

                        $('#altera_dados_up_Itinerario').html('<i class="fa fa-save"></i> Alterar');
                        $(".bt_upd_itinerario").prop("disabled", false);
                    }
                }
            });
        });


        /**deleta itinerario */
        $(document).on('click', '.deleteItinerario', function() {
            var id_del = $(this).attr("id");

            swal({
                    title: "Deseja deletar?",
                    text: "Ao confirmar essa ação será permanente!",
                    icon: "error",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: "<?= site_url('deleta-itinerario/') ?>" + id_del,
                            method: "GET",
                            data: {
                                id_del: id_del
                            },
                            success: function(data) {
                                swal(data, {
                                    icon: "success",
                                });
                                dataTableiti.ajax.reload();
                            }
                        });
                    } else {
                        swal("YVocê desistiu de deletar!");
                    }
                });
        });


        /**selet do cadastro */
        function select_linha1() {
            $.ajax({
                url: "<?= site_url('seleciona-linhas-itinerario1') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="seleciona_ls_1"]').empty();
                    $('select[name="seleciona_ls_1"]').append('<option selected disabled>Selecione aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="seleciona_ls_1"]').append('<option value="' + value.id_ln + '">' + value.linha_saida + '</option>');
                    });
                }
            });
        }

        function select_linha2() {
            $.ajax({
                url: "<?= site_url('seleciona-linhas-itinerario2') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="seleciona_ls_2"]').empty();
                    $('select[name="seleciona_ls_2"]').append('<option selected disabled>Selecione aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="seleciona_ls_2"]').append('<option value="' + value.id_ln + '">' + value.linha_chegada + '</option>');
                    });
                }
            });
        }

        /**select do altera cadastro */
        function select_linha_altera_saida() {
            $.ajax({
                url: "<?= site_url('seleciona-linhas-itinerario1') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="linha_altera_saida"]').empty();
                    $('select[name="linha_altera_saida"]').append('<option selected disabled>Selecione aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="linha_altera_saida"]').append('<option value="' + value.id_ln + '">' + value.linha_saida + '</option>');
                    });
                }
            });
        }

        function select_linha_altera_chegada() {
            $.ajax({
                url: "<?= site_url('seleciona-linhas-itinerario2') ?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="linha_altera_chegada"]').empty();
                    $('select[name="linha_altera_chegada"]').append('<option selected disabled>Selecione aqui...</option>');
                    $.each(data, function(key, value) {
                        $('select[name="linha_altera_chegada"]').append('<option value="' + value.id_ln + '">' + value.linha_chegada + '</option>');
                    });
                }
            });
        }

    });
</script>