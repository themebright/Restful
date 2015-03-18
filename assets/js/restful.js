var Restful = {

  components: {

    headerMenu: {

      el: '.header__menu',

      toggle: function() {
        jQuery( this.el ).toggleClass( 'is-open' );
      }

    },

    slider: {

      el: '.brightslider__slides',

      options: {
        'mode'           : 'fade',
        'controls'       : false,
        'adaptiveHeight' : true
      },

      init: function() {
        jQuery( this.el ).bxSlider( this.options );
      }

    }

  }

};

jQuery( function( $ ) {

  Restful.components.slider.init();

  $( '.header__toggle-menu' ).click( function() {
    Restful.components.headerMenu.toggle();
  } );

} );
