/*-----------------------------------------------------------------------------------*/
/*	WolfjPlayer
/*-----------------------------------------------------------------------------------*/

WolfjPlayer = function ( $ ) {

	"use strict";

	return {

		playlistContainer : $( '.wolf-jplayer-playlist-container' ),
		Playlist : $( '.wolf-jplayer-playlist' ),

		init : function () {

			var $this = this;

			$this.Playlist.addClass( 'js' );

			$this.Playlist.find( 'span.close-wolf-jp-share' ).click ( function() {
				$( this ).parent().parent().parent().fadeOut();
			} );

			$( '.wolf-jp-share-icon' ).click( function() {
				var container = $( this ).parent().parent().parent();
				container.find( '.wolf-jp-overlay' ).fadeIn();
			} );
				

			$( '.wolf-share-jp-popup' ).click( function() {
				var url = $( this ).attr( 'href' );
				var popup = window.open( url,'null', 'height=350,width=570, top=150, left=150' );
				if ( window.focus ) {
					popup.focus();
				}
				return false; 
			} );

			$( window ).resize( function() {
				$this.responsive();
			} ).resize();
		},

		responsive : function () {

			if ( this.Playlist.length ) {

				this.Playlist.each( function() {
					var width = $( this).width();
					
					if ( 425 > width ) {

						$( this ).find( '.wolf-volume' ).hide();

					} else {
						
						$( this ).find( '.wolf-volume' ).show();
					}
				} );

			}
		},

		load : function () {

			this.Playlist.find( 'img' ).removeAttr( 'style' );
			this.Playlist.find( '.jp-jplayer' ).removeAttr( 'style' );

			if (  this.Playlist.length ) {

				$( window ).trigger( 'resize' );
				this.Playlist.animate( { 'opacity' : 1 } );
				this.playlistContainer.css( { 'background' : 'none' } );
				
			}
		}

	}; // end return

}( jQuery );

var WolfjPlayer = WolfjPlayer || {};

;( function( $ ) {

	"use strict";
	WolfjPlayer.init();
	
} )( jQuery );

jQuery( window ).load( function() {

	WolfjPlayer.load();

} );