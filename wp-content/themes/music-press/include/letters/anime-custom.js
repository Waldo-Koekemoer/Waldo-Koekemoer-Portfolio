jQuery('.ml2').each(function(){
  jQuery(this).html(jQuery(this).text().replace(/\S/g, "<span class='letter'>$&</span>"));
});

anime.timeline({loop: false})
  .add({
    targets: '.ml2 .letter',
    scale: [4,1],
    opacity: [0,1],
    translateZ: 7,
    easing: "easeOutExpo",
    duration: 800,
    delay: function(el, i) {
      return 90*i;
    }
  });
