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
    prevpostthumbnail.style.display = "block";
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
