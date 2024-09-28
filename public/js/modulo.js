
console.log("MOOODULOOOOOOOOOOOOOO")
function modulo_bloco(id_cliente = null ,estrutura,categoria,corCard) {
    $.ajax({
        url: "/dashboard/"+estrutura, // URL para onde a requisição será enviada (substitua com a rota correta)
        method: 'POST',
        data: {
            categoria: categoria,
            corCard: corCard,
            id_cliente: id_cliente,
            _token: $('meta[name="csrf-token"]').attr('content') // Obtendo o token CSRF do meta
        },
        success: function(data) {
            $('#clientesList').html(data.original.html);
        },
        error: function(xhr) {
            console.error(xhr.responseText);
        }
    });
}