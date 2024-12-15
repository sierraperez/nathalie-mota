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


// Ativa o botao para Carregar mais fotos da mesma categoria no single photo 


jQuery(document).ready(function ($) {
    $('#load-more').on('click', function () {
        var button = $(this);
        var category = button.data('category'); // Categoria atual
        var nextPage = parseInt(button.attr('data-page')) + 1; // Próxima página
        var exclude = button.data('exclude'); // IDs a excluir

        $.ajax({
            url: ajax_params.ajax_url,
            type: 'POST',
            data: {
                action: 'load_more_photos_by_category', // Nome da ação
                category: category,                    // ID da categoria
                page: nextPage,                        // Página solicitada
                exclude: exclude                       // Posts já carregados
            },
            beforeSend: function () {
                button.text('Carregando...'); // Feedback visual
            },
            success: function (response) {
                if (response) {
                    $('#related-photos').append(response.html); // Adiciona as imagens carregadas
                    button.attr('data-page', nextPage);         // Atualiza o número da página
                    button.data('exclude', response.new_exclude); // Atualiza a lista de excluídos

                    // Oculta o botão se não houver mais posts
                    if (response.no_more_posts) {
                        button.hide();
                    } else {
                        button.text('Ver mais');
                    }
                } else {
                    button.hide(); // Esconde o botão se não houver mais posts
                }
            }
        });
    });
});



