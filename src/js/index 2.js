// const $ = require('jquery')
require('smooziee.js')
// require('motiv.scss')

require('slick-carousel')
// require('jquery-colorbox')
require('jquery-match-height')
require('venobox')

$('.slick').slick({
  dots: true,
  infinite: true,
  speed: 800,
  slidesToShow: 8,
  slidesToScroll: 2,
  swipeToSlide: true,
  autoplay: true,

  responsive: [
    {
      breakpoint: 1648,
      settings: {
        slidesToShow: 6
      }
    },
    {
      breakpoint: 1280,
      settings: {
        slidesToShow: 4,
        arrows: false
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2
      }
    }
  ]
})

$(function () {
  $('.venobox').venobox({
    infinigall: false,
    titleattr: 'data-title'
  })
})

// $('.colorbox').colorbox({
//   maxWidth: '100%',
//   maxHeight: '100%',
//   opacity: 0.7
// })
//
// $('.colorbox-gallery').colorbox({
//   rel: 'gallery',
//   maxWidth: '100%',
//   maxHeight: '95%',
//   opacity: 0.7
// })

$('.matchheight').matchHeight()

// $('.file_userdata_label').each(function () {
//   var html = $(this).html()
//   $(this).html(html.replace('required', '必須'))
// })

$(function () {
  $.smooziee()
})
