import Validations from "../validations";

export default class Estados {
    init() {
        this.validator = new Validations();
        this.iniciaTabela();
        this.bind();

    }

    bind() {
        var self = this;

        //Cadastrar estado
        $(document).on("submit","#cadastro_estados", (ev)=> {
            ev.preventDefault();
            let valor = $(ev.currentTarget).serialize();

            $.ajax({
                url: "/api/estados",
                type: "POST",
                data: valor,
                success: function () {
                    window.location.href = "/estados";
                },
                error: function (response) {
                    let erros = response.responseJSON.errors;
                    self.validator.validaRetornoApi(erros);
                }
            });
        });

        //Editar estado
        $(document).on("submit","#edicao_estados", (ev)=> {
            ev.preventDefault();
            let estadoId = $("#id").val();
            let valor = $(ev.currentTarget).serialize();

            $.ajax({
                url: "/api/estados/" + estadoId,
                type: "PATCH",
                data: valor,
                success: function () {
                    window.location.href = "/estados";
                },
                error: function (response) {
                    let erros = response.responseJSON.errors;
                    self.validator.validaRetornoApi(erros);
                }
            });
        });

        //Excluir estado
        $('.tabela_estados tbody').on('click', '.deletar_estado', function (ev) {
            let estadoId = $(ev.currentTarget).data('id');
            $.ajax({
                url: "/api/estados/" + estadoId,
                type: "DELETE",
                success: function () {
                    $(ev.currentTarget).closest('tr').remove();
                },
                error: function (response) {
                    let erros = response.responseJSON.errors;
                    alert(erros);
                }
            });
        });
    }

    iniciaTabela() {
        $('.tabela_estados').DataTable({
        	"language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
            },
            "scrollY": 300,
            "responsive": true
        });
    }
}