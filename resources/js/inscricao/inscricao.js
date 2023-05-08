import Validations from "../validations";

export default class Inscricao {
    init() {
        this.mask();
        this.validator = new Validations();
        this.iniciaTabela();
        this.estados();
        this.bind();
    }

    bind() {
        var self = this;

        //Gravar inscrição do candidato
        $(document).on('submit', "#formulario_inscricao", (ev) => {
            ev.preventDefault();
            let cpf = $("#cpf").val();
            let valores = {
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
                data: valores,
                success: function (data) {
                    $.ajax({
                        url: "/api/inscricao",
                        type: "POST",
                        data: {
                            pessoa_fisica_id: data.pessoa.id,
                            cargo: data.cargo,
                            situacao: 'enviado',
                        },
                        success: function (data) {
                            window.location.href = "/cadastro/" + data.pessoa_fisica_id;
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
            var estadoId = $(ev.currentTarget).find(":selected").val();
            $.ajax({
                url: "/api/cidades/" + estadoId,
                type: "GET",

                success: function (response) {
                    $("#cidade_id").empty();
                    $("#cidade_id").prop('disabled', false);
                    $("#cidade_id").append(`<option value="" selected disabled>Selecione...</option>`);
                    $.each(response, (index, value) => {
                        $("#cidade_id").append(`<option value="${value.cidade_id}">${value.nome}</option>`);
                    });
                },
                error: function (response) {
                    let erros = response.responseJSON.errors;
                    self.validator.validaRetornoApi(erros);
                }
            });

        });

        //campo nome iniciar palavras com letra maiúscula
        $(document).on("keyup", "#nome", () => {
            var formatarValor = self.iniciaisMaiusculas($('#nome').val());
            $('#nome').val(formatarValor);
        });
        //campo cargo iniciar palavras com letra maiúscula
        $(document).on("keyup", "#cargo", () => {
            var formatarValor = self.iniciaisMaiusculas($('#cargo').val());
            $('#cargo').val(formatarValor);
        });

        //retorna a informacao do cadastro para consulta
        $(document).on('submit', "#consulta", (ev) => {
            ev.preventDefault();
            let valor = $("#cpf_consulta").val();
            $.ajax({
                url: "/consulta/" + valor.replace(/[.-]/g, ''),
                type: "GET",
                success: function (response) {
                    $('#resultado').html(response);
                    $("#cpf_consulta").val('');
                    $("#impressao").removeClass('d-none');
                },
                error: function (response) {
                    let erro = `
                    <div class="alert alert-danger text-center mt-4" role="alert">
                        CPF não encontrado!
                    </div>`;
                    $('#resultado').html(erro);
                }
            });
        });

        //verifica logo após digitar o documento se já possui cadastro
        $(document).on('blur', "#cpf", () => {
            $(".cpf-feedback").addClass('d-none');
            let cpf = $("#cpf").val();
            $.ajax({
                url: "/verificacao/" + cpf.replace(/[.-]/g, ''),
                type: "GET",
                success: function (response) {
                    
                },
                error: function (response) {
                    let erro = response.responseJSON.message;
                    $(".cpf-feedback").removeClass('d-none');
                    $(".cpf-feedback").html(erro);
                }
            });
        });

    }

    iniciaisMaiusculas(str) {
        var palavras = str.toLowerCase().split(' ');

        var excecoes = ["de", "da", "do", "dos", "das"];

        for (var i = 0; i < palavras.length; i++) {
            var excecao = false;
            for (var j = 0; j < excecoes.length; j++) {
                if (palavras[i] === excecoes[j]) {
                    excecao = true;
                    break;
                }
            }
            if (!excecao) {
                palavras[i] = palavras[i].charAt(0).toUpperCase() + palavras[i].substring(1);

                var apostrofoIndex = palavras[i].indexOf("'");
                if (apostrofoIndex !== -1 && apostrofoIndex < palavras[i].length - 1) {
                    // formata a primeira letra após o apóstrofo
                    palavras[i] = palavras[i].substring(0, apostrofoIndex + 1) +
                        palavras[i].charAt(apostrofoIndex + 1).toUpperCase() +
                        palavras[i].substring(apostrofoIndex + 2);
                }
            }
        }

        return palavras.join(' ');
    }

    mask() {
        $("#nome").mask("#", {
            maxlength: false,
            translation: {
                '#': { pattern: /[a-zA-ZáéíóúÁÉÍÓÚçÇãÃõÕ\s']+( [a-zA-ZáéíóúÁÉÍÓÚçÇãÃõÕ\s']*([Dd]e|[Dd]a|[Dd]o|[Dd]as|[Dd]os)[a-zA-ZáéíóúÁÉÍÓÚçÇãÃõÕ\s']*)*/, recursive: true }
            }
        });
        $('#cpf').mask('000.000.000-00');
        $('#cpf_consulta').mask('000.000.000-00');
    }

    iniciaTabela() {
        $('.tabela_inscricoes').DataTable({
            "language": {
                "lengthMenu": "Mostrando _MENU_ registros por página",
                "zeroRecords": "Nada encontrado",
                "info": "Mostrando página _PAGE_ de _PAGES_",
                "infoEmpty": "Nenhum registro disponível",
                "infoFiltered": "(filtrado de _MAX_ registros no total)",
            },
            "scrollY": 300,
            "order": [1, 'asc']

        });
    }

    estados() {
        $.ajax({
            url: "/api/estados",
            type: "GET",
            success: function (response) {
                $.each(response, (index, value) => {
                    $("#estado_id").append(`<option value="${value.estado_id}">${value.nome}</option>`);
                });
            },
            error: function (response) {
                let erros = response.responseJSON.errors;
                self.validator.validaRetornoApi(erros);
            }
        });
    }
}
