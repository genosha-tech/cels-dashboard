jQuery(function ($) {
  var $nav = $(".red-nav-container");
  var $win = $(window);
  var winH = $win.height();

  $win
    .on("scroll", function () {
      if ($(this).scrollTop() > winH) {
        $nav.addClass("d-flex");
        $nav.removeClass("d-none");
      } else {
        $nav.addClass("d-none");
        $nav.removeClass("d-flex");
      }
    })
    .on("resize", function () {
      winH = $(this).height();
    });

    $(".navbar-nav>li>a").on("click", function () {
      $(".navbar-collapse").collapse("hide");
    });    
});
