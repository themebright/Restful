jQuery(function($) {

  $('.bxslider').bxSlider({
    'mode': 'fade',
    'controls': false,
    'adaptiveHeight': true
  });

  $('#person-groups').change(function() {
    var href = $(this).find(':selected').val();

    window.location.assign(href);
  });

});