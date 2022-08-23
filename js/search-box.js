$(".search-button").click(function () {
  $(this).parent().toggleClass("open");

  if ($(this).parent().hasClass("open")) {
    document.getElementById("search-icon").src = "/assets/img/search-on.png";
  } else {
    document.getElementById("search-icon").src = "/assets/img/search.png";
  }
});
