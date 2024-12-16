$(document).ready(function () {
  $(".popup-overlay").hide();
  console.log("Test");
  $(".btn-contact").click(function () {
    $(".popup-overlay").show();
    const reference_value =
      document.querySelector(".reference_value").innerHTML;
    console.log(reference_value);
    const ref_photo = document.getElementById("ref_photo");
    console.log(ref_photo);
    ref_photo.value = reference_value;
  });
  $(".popup-close").click(function () {
    console.log("Test");
    $(".popup-overlay").hide();
  });

  const prevlink = document.querySelector(".prev-link");
  const nextlink = document.querySelector(".next-link");
  const prevpostthumbnail = document.querySelector(".prev-post-thumbnail");
  const nextpostthumbnail = document.querySelector(".next-post-thumbnail");

  prevpostthumbnail.style.display = "none";
  nextpostthumbnail.style.display = "none";

  prevlink.addEventListener("mouseover", function () {
    prevpostthumbnail.style.display = "block"
    prevpostthumbnail.style.display = " transition: 5.5s ease";
  });

  prevlink.addEventListener("mouseout", function () {
    prevpostthumbnail.style.display = "none";
  });

  nextlink.addEventListener("mouseover", function () {
    nextpostthumbnail.style.display = "block";
  });

  nextlink.addEventListener("mouseout", function () {
    nextpostthumbnail.style.display = "none";
  });
});
 
// JavaScrip bouton Load More photos 




document.getElementById("contactBtn").addEventListener("click", function() {
    // Captura o valor da referência do botão clicado
    var photoReference = this.getAttribute("data-photo-ref");

    // Preenche o campo de referência no formulário Contact Form 7
    document.getElementById("ref_photo").value = photoReference;

    // Exibe o popup
    document.querySelector(".popup-overlay").style.display = "flex";
});

// Fechar o popup ao clicar no botão de fechar
document.querySelector(".popup-close").addEventListener("click", function() {
    document.querySelector(".popup-overlay").style.display = "none";
});

// Fechar o popup ao clicar fora dele
document.querySelector(".popup-overlay").addEventListener("click", function(event) {
    if (event.target === this) {
        this.style.display = "none";
    }
});

