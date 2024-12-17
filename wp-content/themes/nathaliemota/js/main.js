$(document).ready(function () {
  // Esconder o popup inicialmente
  $(".popup-overlay").hide();

  console.log("Test");

  // Abrir o popup e preencher referência ao clicar no botão de contato
  $(".btn-contact").click(function () {
    $(".popup-overlay").show();
    const reference_value = $(".reference_value").text();
    console.log(reference_value);
    $("#ref_photo").val(reference_value);
  });

  // Fechar popup ao clicar no botão de fechar
  $(".popup-close").click(function () {
    console.log("Test");
    $(".popup-overlay").hide();
  });

  // Fechar o popup ao clicar fora dele
  $(".popup-overlay").on("click", function (event) {
    if (event.target === this) {
      $(this).hide();
    }
  });

  // Configuração inicial das variáveis para galeria e botão
  const gallery = $("#photo-gallery");
  let currentPage = parseInt($("#load-more").data("page"));

  // Função para carregar mais imagens via AJAX
  $("#load-more").on("click", function () {
    currentPage++;

    $.ajax({
      url: "/wp-admin/admin-ajax.php",
      method: "POST",
      data: {
        action: "load_more_photos",
        page: currentPage,
      },
      success: function (response) {
        if (response.trim()) {
          gallery.append(response); // Adiciona o conteúdo retornado
          $("#load-more").data("page", currentPage);

          // Reaplica os eventos às novas imagens carregadas
          attachImageEvents();
        } else {
          $("#load-more").text("Nenhuma imagem adicional").prop("disabled", true);
        }
      },
      error: function (xhr, status, error) {
        console.error("Erro ao carregar imagens:", error);
      },
    });
  });

  // Função para adicionar eventos de clique às imagens
  function attachImageEvents() {
    const overlay = $("#photo-overlay");
    const overlayImage = $(".overlay-image");
    const overlayCaption = $(".overlay-caption");

    $(".galerie-photo img").on("click", function () {
      const imgSrc = $(this).attr("src");
      const caption = $(this).attr("alt") || "Sem descrição disponível";

      overlayImage.attr("src", imgSrc);
      overlayCaption.text(caption);
      overlay.css("display", "flex");
    });

    $(".close-overlay").on("click", function () {
      overlay.hide();
    });

    overlay.on("click", function (event) {
      if (event.target === this) {
        overlay.hide();
      }
    });
  }

  // Chama a função inicialmente
  attachImageEvents();

  // Função para aplicar filtros usando AJAX
  function filtres() {
    $(".form-select").on("change", function () {
      const categorie = $("#categorie_id").val();
      const format = $("#format_id").val();
      const order = $("#date").val();
      const nonce = $("#nonce").val();
      const ajaxurl = $("#ajaxurl").val();

      $.ajax({
        url: ajaxurl,
        method: "POST",
        data: {
          action: "filter_photos",
          nonce: nonce,
          categorie: categorie,
          format: format,
          order: order,
        },
        success: function (response) {
          gallery.html(response); // Substitui o conteúdo da galeria com os resultados
          attachImageEvents(); // Reaplica os eventos às imagens filtradas
        },
        error: function (xhr, status, error) {
          console.error("Erro ao filtrar imagens:", error);
        },
      });
    });
  }

  // Inicializa a função de filtros
  filtres();
});
