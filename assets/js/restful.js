var Restful = {

  components: {

    headerMenu: {

      el: '.header__menu',

      toggle: function() {
        jQuery( this.el ).toggleClass( 'is-open' );
      },

    },

    slider: {

    },

  },

};

jQuery( function( $ ) {

  $( '#bright-slider' ).bxSlider({
    'mode': 'fade',
    'controls': false,
    'adaptiveHeight': true
  });

  $( '.header__toggle-menu' ).click( function() {
    Restful.components.headerMenu.toggle();
  } );

} );
