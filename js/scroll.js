jQuery(document).ready(function() {
  
  let btnup = $('.scrollup');
  let btndown = $('.scrolldown');
  btndown.addClass('show');

  $(window).scroll(function() {
    if ($(window).scrollTop() > 100) {
      btnup.addClass('show');
      btndown.removeClass('show');
    } else {
      btnup.removeClass('show');
      btndown.addClass('show');
    }
  });

  var WH = $(window).height()+248;  

  btnup.on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '300');
  });
  btndown.on('click', function(e) {
    e.preventDefault();
    $('html, body').stop().animate({scrollTop: WH}, 1000);
  });
});
