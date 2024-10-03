$(document).ready(function(){
  $('.loading-logo').fadeIn(1000);

  $('.section:not(.is-expanded) .demo-box h2').each(function(){
    $(this).html($(this).text().replace(/([^\x00-\x80]|\w)/g, "<span class='letter'>$&</span>"));
  });

  $('.loading-logo').click(function() {
    $(this).fadeOut( "slow", function() {
        $('.after-loading').fadeIn("slow");
    });

    anime.timeline({loop: false})
    .add({
      targets: '.section:not(.is-expanded) .demo-box h2 .letter',
      opacity: [0,1],
      easing: "easeInOutQuad",
      duration: 1000,
      delay: function(el, i) {
        return 90 * (i+1)
      }
    })
  });

  $('.grid').isotope({
    itemSelector: '.grid-item',
    masonry: {
      columnWidth: 320,
      gutter: 10
    }
  });
  
});

$(document).keyup(function(e) {
  if (e.key === "Escape") { // escape key maps to keycode `27`
    $('.show-content').fadeOut("fast", function() {
      $('.demo-box').scrollTop();
      $('.close-section').parent().removeClass('is-expanded');
      document.body.classList.remove('has-expanded-item');
    });
      // <DO YOUR WORK HERE>
  }
});