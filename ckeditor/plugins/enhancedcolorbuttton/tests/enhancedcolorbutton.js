/* bender-tags: editor,unit */
/* bender-ckeditor-plugins: enhancedcolorbutton,toolbar,wysiwygarea */

( function() {
	'use strict';

	bender.editor = true;

	bender.test( {
		'test opening text/background color': function() {
			var ed = this.editor, bot = this.editorBot;
			var txtColorBtn = ed.ui.get( 'TextColor2' ),
				bgColorBtn = ed.ui.get( 'BGColor2' );

			bot.setHtmlWithSelection( '[<h1 style="color: #00FF00; background: #FF0000">Moo</h1>]' );

			// Check if automatic text color is obtained correctly.
			txtColorBtn.click( ed );
			assert.areEqual( '#00ff00', CKEDITOR.tools.convertRgbToHex( txtColorBtn.onOpen() ), 'Text color must match.' );

			// Check if automatic background color is obtained correctly.
			bgColorBtn.click( ed );
			assert.areEqual( '#ff0000', CKEDITOR.tools.convertRgbToHex( bgColorBtn.onOpen() ), 'Text color must match.' );
		},

		// #10975
		'test open palette without focus': function() {
			var editor = CKEDITOR.replace( 'noFocus' );
			editor.on( 'instanceReady', function() {
				resume( function() {
					var txtColorBtn = editor.ui.get( 'TextColor2' );
					txtColorBtn.click( editor );

					assert.areEqual( CKEDITOR.TRISTATE_ON, txtColorBtn._.state, 'txtColorBtn.click should not throw an error.' );
				} );
			} );

			wait();
		},

		'test enableAutomatic=true option': function() {
			bender.editorBot.create( {
				name: 'editor1',
				config: {
					colorButton_enableAutomatic: true
				}
			}, function( bot ) {
				var editor = bot.editor,
					txtColorBtn = editor.ui.get( 'TextColor2' ),
					bgColorBtn = editor.ui.get( 'BGColor2' );

				txtColorBtn.click( editor );
				assert.areEqual( 1, txtColorBtn._.panel.getBlock( txtColorBtn._.id ).element.find( '.cke_colorauto' ).count(), 'Automatic button should be visible.' );

				bgColorBtn.click( editor );
				assert.areEqual( 1, bgColorBtn._.panel.getBlock( bgColorBtn._.id ).element.find( '.cke_colorauto' ).count(), 'Automatic button should be visible.' );
			} );
		},

		'test enableAutomatic=false option': function() {
			bender.editorBot.create( {
				name: 'editor2',
				config: {
					colorButton_enableAutomatic: false
				}
			}, function( bot ) {
				var editor = bot.editor,
					txtColorBtn = editor.ui.get( 'TextColor2' ),
					bgColorBtn = editor.ui.get( 'BGColor2' );

				txtColorBtn.click( editor );
				assert.areEqual( 0, txtColorBtn._.panel.getBlock( txtColorBtn._.id ).element.find( '.cke_colorauto' ).count(), 'Automatic button should not be visible.' );

				bgColorBtn.click( editor );
				assert.areEqual( 0, bgColorBtn._.panel.getBlock( bgColorBtn._.id ).element.find( '.cke_colorauto' ).count(), 'Automatic button should not be visible.' );
			} );
		},

		// Additional test cases for enhanced color button.
		'test applying text colors': function() {
			var ed = this.editor,
				bot = this.editorBot,
				color = '#ffff00',
				expected = 'color:' + color,
				actual;

			bot.setHtmlWithSelection( '[<p>Test sentence for color change</p>]' );
			ed.execCommand( 'setForeFontColor', [ color ] );

			actual = CKEDITOR.tools.convertRgbToHex( ed.editable().find( 'span' ).getItem( 0 ).getAttributes().style ).replace( /\s+/g, '' ).replace( /;+/g, '' ).toLowerCase();
			assert.areEqual( expected, actual, 'text color should be changed with selected one' );
		},

		'test applying background colors': function() {
			var ed = this.editor,
				bot = this.editorBot,
				color = '#ffd700',
				expected = 'background-color:' + color,
				actual;

			bot.setHtmlWithSelection( '[<p>Test sentence for color change</p>]' );
			ed.execCommand( 'setBackFontColor', [ color ] );

			actual = CKEDITOR.tools.convertRgbToHex( ed.editable().find( 'span' ).getItem( 0 ).getAttributes().style ).replace( /\s+/g, '' ).replace( /;+/g, '' ).toLowerCase();
			assert.areEqual( expected, actual, 'background color should be changed with selected one' );
		},

		'test quick apply button of text color': function() {
			var ed = this.editor,
				bot = this.editorBot,
				color = '#008000',
				expected = 'color:' + color,
				actual,
				txtColorBtn = ed.ui.get( 'TextColor' );

			bot.setHtmlWithSelection( '[<p>Test sentence for color change</p>]' );
			ed.execCommand( 'setForeFontColor', [ color ] );
			bot.setHtmlWithSelection( '[<p>Another test sentence for color change</p>]' );
			txtColorBtn.click( ed );

			actual = CKEDITOR.tools.convertRgbToHex( ed.editable().find( 'span' ).getItem( 0 ).getAttributes().style ).replace( /\s+/g, '' ).replace( /;+/g, '' ).toLowerCase();
			assert.areEqual( expected, actual, 'text color should be changed with lastly used one' );
		},

		'test quick apply button of backgound color': function() {
			var ed = this.editor,
				bot = this.editorBot,
				color = '#d3d3d3',
				expected = 'background-color:' + color,
				actual,
				bgColorBtn = ed.ui.get( 'BGColor' );

			bot.setHtmlWithSelection( '[<p>Test sentence for color change</p>]' );
			ed.execCommand( 'setBackFontColor', [ color ] );
			bot.setHtmlWithSelection( '[<p>Another test sentence for color change</p>]' );
			bgColorBtn.click( ed );

			actual = CKEDITOR.tools.convertRgbToHex( ed.editable().find( 'span' ).getItem( 0 ).getAttributes().style ).replace( /\s+/g, '' ).replace( /;+/g, '' ).toLowerCase();
			assert.areEqual( expected, actual, 'text color should be changed with lastly used one' );
		},

		'test indicator of text color': function() {
			if ( CKEDITOR.env.ie )
				assert.ignore();

			var ed = this.editor,
				bot = this.editorBot,
				color = '#faebd7',
				actual;

			bot.setHtmlWithSelection( '[<p>Test sentence for color change</p>]' );
			ed.execCommand( 'setForeFontColor', [ color ] );

			actual = CKEDITOR.tools.convertRgbToHex( document.getElementById( ed.name + '_enhanced_color_button_text' ).style.backgroundColor ).toLowerCase();
			assert.areEqual( color, actual, 'background color of indicator should be set with lastly used one' );
		},

		'test indicator of background color': function() {
			if ( CKEDITOR.env.ie )
				assert.ignore();

			var ed = this.editor,
				bot = this.editorBot,
				color = '#ffd700',
				actual;

			bot.setHtmlWithSelection( '[<p>Test sentence for color change</p>]' );
			ed.execCommand( 'setBackFontColor', [ color ] );

			actual = CKEDITOR.tools.convertRgbToHex( document.getElementById( ed.name + '_enhanced_color_button_bg' ).style.backgroundColor ).toLowerCase();
			assert.areEqual( color, actual, 'background color of indicator should be set with lastly used one' );
		}
	} );
} )();
