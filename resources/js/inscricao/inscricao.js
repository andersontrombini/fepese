import Validations from "../validations";

export default class Inscricao {
    init() {
        this.mask();
        this.validator = new Validations();
       // this.iniciaTabela();
        this.bind();
    }

    bind() {
        var self = this;
        //Gravar inscrição do candidato
        $(document).on('submit', "#formulario_inscricao", (ev) => {
            ev.preventDefault();
            let cpf = $("#cpf").val();
            let values = {
                nome: $("#nome").val(),
                cpf: cpf.replace(/[.-]/g, ''),
                endereco: $('#endereco').val(),
                estado_id: $('#estado_id').val(),
                cidade_id: $('#cidade_id').val(),
                cargo: $('#cargo').val(),
            }

            $.ajax({
                url: "/api/pessoa_fisica",
                type: "POST",
                data: values,
                success: function (response) {
                    $.ajax({
                        url: "/api/inscricao",
                        type: "POST",
                        data: {
                            pessoa_fisica_id: data.pessoa.id,
                            cargo: data.cargo,
                            situacao: 'enviado',
                        },
                        success: function (response) {
                            window.location.href = "/cadastro/" + data.pessoa.id;

                        },
                        error: function (response) {
                            let erros = response.responseJSON.errors;
                            self.validator.validaRetornoApi(erros);
                        }
                    });
                },
                error: function (response) {
                    let erros = response.responseJSON.errors;
                    self.validator.validaRetornoApi(erros);
                }
            });
        });

        //insere opções no select de cidades de acordo com estado
        $(document).on("change", "#estado_id", (ev) => {
            var estados = $(ev.currentTarget).find(":selected").data("estados");
            $("#cidade_id").empty();
            $("#cidade_id").prop('disabled',false);
            $("#cidade_id").append(`<option value="" selected disabled>Selecione...</option>`);

            $.each(estados.cidades, (index, value) => {
                $("#cidade_id").append(`<option value="${value.cidade_id}">${value.nome}</option>`);
            });
        });

        //campo nome iniciar palavras com letra maiúscula
        $(document).on("keyup", ".teste", () => {
            self.mask();
            var formatarValor = self.iniciaisMaiusculas($('#nome').val());
            $('#nome').val(formatarValor);

        });
    }

    iniciaisMaiusculas(str) {
        var palavras = str.toLowerCase().split(' ');

        for (var i = 0; i < palavras.length; i++) {
            palavras[i] = palavras[i].charAt(0).toUpperCase() + palavras[i].slice(1);
        }

        return palavras.join(' ');
    }

    mask(){
        $("#nome").mask("#", {
            maxlength: false,
            translation: {
                '#': {pattern: /[A-zÀ-ÿ\s]/, recursive: true}
            }
        });
        $('#cpf').mask('000.000.000-00', { reverse: true });
    }

    iniciaTabela(){
        $('#tabela_inscricoes').dataTable();
    }
}
