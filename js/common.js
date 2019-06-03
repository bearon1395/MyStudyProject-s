$(document).ready(function() {

  function heightDetect() {
    $(".slider .slide").css("height", $(window).height());
  }
   heightDetect();
   $(window).resize(function() {
    heightDetect();
   });
   $(".title_wrap h1").animated("fadeIn", "fadeOut");

   $(".bottom_logo").animated("fadeInLeft", "fadeOutLeft");
   $(".bt_text").animated("fadeInRight", "fadeOutRight");
});

$(function() {

    var owl = $(".slider");
    owl.owlCarousel({
      loop : true,
      items : 1,
      autoplay : true,
      smartSpeed : 900,
      itemClass : "slide-wrap",
      nav : true,
      navText : ""
    });
    $(".next").click(function(){
      owl.trigger('next.owl.carousel')
    })
    $(".prev").click(function(){
      owl.trigger('prev.owl.carousel')
    });

});
