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
                            window.location.href = "cadastro/" + data.pessoa_fisica_id;
                            toastr.warning('Tivemos um problema ao listar os eventos disponíveis!');

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
        $(document).on("keyup", ".teste", () => {
            self.mask();
            var formatarValor = self.iniciaisMaiusculas($('#nome').val());
            $('#nome').val(formatarValor);

        });

        //
        $(document).on('submit', "#consulta", (ev) => {
            ev.preventDefault();
            let valor = $("#cpf_consulta").val();
            $.ajax({
                url: "/consulta/" + valor.replace(/[.-]/g, ''),
                type: "GET",
                success: function (response) {
                   $('#resultado').html(response);
                   $("#cpf_consulta").val('');
                },
                error: function (response) {
                   alert('teste');
                }
            });
        });
    }

    iniciaisMaiusculas(str) {
        var palavras = str.toLowerCase().split(' ');

        for (var i = 0; i < palavras.length; i++) {
            palavras[i] = palavras[i].charAt(0).toUpperCase() + palavras[i].slice(1);
        }

        return palavras.join(' ');
    }

    mask() {
        $("#nome").mask("#", {
            maxlength: false,
            translation: {
                '#': { pattern: /[A-zÀ-ÿ\s]/, recursive: true }
            }
        });
        $('#cpf').mask('000.000.000-00', { reverse: true });
        $('#cpf_consulta').mask('000.000.000-00', { reverse: true });
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
