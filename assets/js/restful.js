jQuery( function( $ ) {

  $( '#bright-slider' ).bxSlider({
    'mode': 'fade',
    'controls': false,
    'adaptiveHeight': true
  });

  $( '.entry' ).fitVids();

} );