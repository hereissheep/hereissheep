/*global jQuery */
jQuery(function ($) {
	'use strict';

	var App = {
		init: function () {
			this.ENTER_KEY = 13;
			this.base_url  = window.location.href;
			this.cacheElements();
			this.bindEvents();
		},
		cacheElements: function() {
			this.$app = $( '#todoapp' );
			this.$table = this.$app.find( 'table' );
			this.$tableHeader = this.$table.find( 'thead' );
			this.$tableBody = this.$table.find( 'tbody' );
		},
		bindEvents: function() {
			$( this.$tableBody ).on( 'click', 'tr', this.toggleCompleted );
		},
		toggleCompleted: function( event ) {
			var $tr = $( this );

			$.ajax( {
				url: App.base_url + 'toggle/' + $tr.data( 'id' ),
				method: "POST",
				error: function() {
					if( $tr.data( 'completed' ) == '0' ) {
						$tr.addClass( 'completed' )
							.data( 'completed', 1 )
							.find( '.status' ).text( 'Completed' )
					} else {
						$tr.removeClass( 'completed' )
							.data( 'completed', 0 )
							.find( '.status' ).text( 'Incomplete' );
					}
				}
			});

			if( $tr.data( 'completed' ) == '0' ) {
				$tr.addClass( 'completed' )
					.data( 'completed', 1 )
					.find( '.status' ).text( 'Completed' )
			} else {
				$tr.removeClass( 'completed' )
					.data( 'completed', 0 )
					.find( '.status' ).text( 'Incomplete' );
			}
		}
	};

	App.init();
});