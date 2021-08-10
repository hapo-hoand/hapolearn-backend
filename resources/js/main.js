$(".item-menu").click(function (e) {
  e.preventDefault();
  $(".item-menu").removeClass("item-active");
  $(this).addClass("item-active");
  $(".btn-menu").attr("aria-expanded", "false")
  $(".btn-menu").addClass("collapsed")
  $(".custom-menu").removeClass("show")
});

$(".btn-menu").click(function () {
  $(this).toggleClass("rotate");
});

$(document).on("ready", function () {
  $(".autoplay").slick({
    dots: false,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 3000,
    speed: 1500,
    responsive: [
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1,
        },
      },
    ],
  });
});

$(function () {
  $(".example-popover").popover({
    container: "body",
  });
});

$("#login").click(function () {
  $("#modal-login").modal("show");
});

$(".close-modal").click(function () {
  $("#modal-login").modal("hide");
});

$(".messenger").click(function () {
  $(".wrap-mess").toggleClass("show");
});

$(".close-mess").click(function () {
  $(".wrap-mess").toggleClass("show");
});
