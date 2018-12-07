jQuery(document).ready(function($) {
 $(".scroll").click(function(event){
  event.preventDefault();
  $('html,body').animate({scrollTop:$(this.hash).offset().top}, 800);
 });
});

$(document).ready(function() {
  $(window).on("scroll", function() {
    if ($(window).scrollTop() >= 100) {
      $(".navbar").slideDown(200).addClass("compressed");
    } else {
      $(".navbar").removeClass("compressed");
    }
  });
})
$(document).ready(function() {
/* show lightbox when clicking a thumbnail */
    $('a.thumb').click(function(event){
      event.preventDefault();
      var content = $('.modal-body');
      content.empty();
        var title = $(this).attr("title");
        $('.modal-title').html(title);
        content.html($(this).html());
        $(".modal-profile").modal({show:true});
    });

  });

  $('.box').click(function(){
    $('#f2').removeClass('d-none');
    $('#f1').addClass('d-none');
    var botao = $(this).attr('value');
    $("label#valor").text(botao);
});

    $('.box2').click(function(){
      $('#f3').removeClass('d-none');
      $('#f2').addClass('d-none');
    });

    $('#botao').click(function (){
    $('#f3').addClass('d-none');
    $('#f4').removeClass('d-none');

  });
