jQuery( document ).ready( function( $ ) {

  $( '.entry' ).fitVids();

  $( '.header__toggle-menu' ).click( function() {
    $( '.header__menu' ).toggleClass( 'is-open' );
  } );

} );
