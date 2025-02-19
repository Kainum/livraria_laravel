$(document).ready(function() {
    $('.date').mask('00/00/0000');
    $('.time').mask('00:00:00');
    $('.date_time').mask('00/00/0000 00:00:00');
    $('.cep').mask('00000-000');
    $('.phone').mask('00000-0000');
    $('.phone_with_ddd').mask('(00) 00000-0000');
    $('.phone_us').mask('(000) 000-0000');
    $('.mixed').mask('AAA 000-S0S');
    $('.cpf').mask('000.000.000-00', {reverse: true});
    $('.cnpj').mask('00.000.000/0000-00', {reverse: true});
    $('.money').mask('000.000.000.000.000,00', {reverse: true});
    $('.money2').mask("#0.00", {reverse: true});
    $('.ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
        translation: {
        'Z': {
            pattern: /[0-9]/, optional: true
        }
        }
    });
    $('.ip_address').mask('099.099.099.099');
    $('.percent').mask('##0,00%', {reverse: true});
    $('.clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.fallback').mask("00r00r0000", {
        translation: {
            'r': {
            pattern: /[\/]/,
            fallback: '/'
            },
            placeholder: "__/__/____"
        }
    });
    $('.selectonfocus').mask("00/00/0000", {selectOnFocus: true});
});

$('.delete-confirm').on('click', function (event) {
    event.preventDefault();
    const url = $(this).attr('href');
    swal({
        title:  'Você tem certeza?',
        text:   'Este registro será deletado permanentemente!',
        icon:   'warning',
        buttons: ["Cancelar", "Sim!"],
    }).then(function(value) {
        if (value) {
            $.get(url, function(data) {
                if (data.status == 200) {
                    swal({
                        title:  'Deletado!',
                        text:   'Exclusão confirmada',
                        icon:   'success',
                    }).then(function() {
                        window.location.reload();
                    });
                } else {
                    swal({
                        title:  'Erro!',
                        text:   'Ocorreram erros na exclusão. Entre em contato com o suporte.',
                        icon:   'error',
                    });
                }
            });
        }
    });
});