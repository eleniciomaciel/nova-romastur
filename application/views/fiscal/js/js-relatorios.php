<script>
    $(document).ready(function() {
        get_linhas_relatios();

        $(document).on('click', '.viewRelatorios', function() {
            let id_uss_relat = $(this).attr("id");
            $.ajax({
                url: "<?= site_url('lista-dados-do-meu-perfil/') ?>" + id_uss_relat,
                method: "GET",
                data: {
                    id_uss_relat: id_uss_relat
                },
                beforeSend: function() {
                    $(".loader").css('display', 'block');
                },
                complete: function() {
                    $(".loader").css('display', 'none');
                },
                dataType: "json",
                success: function(data) {
                    $('#relatoriosModalLong').modal('show');
                    $('#fiscal_nome_user').val(data.fiscal_nome);
                    $('#id_uss_relat').val(id_uss_relat);
                }
            })
        });

        /**lista linhas para relatoris */
        function get_linhas_relatios() {
            $.ajax({
                url: "<?=site_url('lista-linhas-para-relatorios')?>",
                type: "GET",
                dataType: "json",
                success: function(data) {
                    $('select[name="select_linhas_reatorios_get_all"]').empty();
                    $('select[name="select_linhas_reatorios_get_all"]').append('<option selected disabled>Selecione aqui...</option>');
                    $('select[name="select_linhas_reatorios_get_all"]').append('<option value="todas-linhas">TODAS AS LINHAS</option>');
                    $.each(data, function(key, value) {
                        $('select[name="select_linhas_reatorios_get_all"]').append('<option value="' + value.id_ln + '">'+ value.linha_saida +' / ' + value.linha_chegada + '</option>');
                    });
                }
            });
        }
    });
</script>