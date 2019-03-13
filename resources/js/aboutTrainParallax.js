
//workaround for ie11 fixed position jitter bug
//   if(navigator.userAgent.match(/Trident\/7\./)) {
//   document.body.addEventListener("mousewheel", function() {
//     event.preventDefault();
//     var wd = event.wheelDelta;
//     var csp = window.pageYOffset;
//     window.scrollTo(0, csp - wd);
//   });
// }

  // 
  // $(window).scroll(function() {
  //   var scrolled = $(window).scrollTop()
  //   $('.aboutTrains').each(function(index, element) {
  //     var initY = $(this).offset().top
  //     var height = $(this).height()
  //     var endY  = initY + $(this).height()
  //     var diff = scrolled - (initY + -200)
  //     var ratio = Math.round((diff / height) * 100)
  //     $(this).css('background-position','right ' + parseInt(-(ratio * 2.5)) + 'px')
  //   })
  // })




  // var w = window,
  //     d = document,
  //     e = d.documentElement,
  //     g = d.getElementsByTagName('body')[0],
  //     x = w.innerWidth || e.clientWidth || g.clientWidth,
  //     y = w.innerHeight|| e.clientHeight|| g.clientHeight;
