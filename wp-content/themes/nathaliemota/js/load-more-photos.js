jQuery(document).ready(function ($) {
    $('#load-more').on('click', function () {
        var button = $(this);
        var nextPage = parseInt(button.attr('data-page')) + 1; // Próxima página

        $.ajax({
            url: ajax_params.ajax_url, // URL para requisições AJAX
            type: 'POST',
            data: {
                action: 'load_more_photos', // Nome da ação
                page: nextPage,            // Página solicitada
            },
            success: function (response) {
                if (response) {
                    $('#photo-gallery').append(response); // Adiciona as imagens carregadas
                    button.attr('data-page', nextPage);  // Atualiza o número da página
                    button.text('Charger plus');

                    // Oculta o botão se todas as imagens forem carregadas
                    if (response.indexOf('no-more-posts') > -1) {
                        button.hide();
                    }
                } else {
                    button.hide(); // Esconde o botão se não houver mais imagens
                }
            }
        });
    });
});
