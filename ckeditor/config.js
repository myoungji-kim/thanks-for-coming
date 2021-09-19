/**
 * @license Copyright (c) 2003-2017, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection' ] },
		{ name: 'styles', groups: [ 'Styles', 'Format' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'font' },
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup', 'Font' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'FontSize' ] },
		{ name: 'colors' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'tools' },
		{ name: 'others' }
		
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	config.removeButtons = 'Subscript,Superscript,PasteFromWord,PasteText,Styles,Format';

	config.font_names = '돋움; Nanum Gothic Coding; 맑은 고딕; 바탕; 궁서; Quattrocento Sans;' + CKEDITOR.config.font_names;

	config.font_defaultLabel = 'Noto Sans KR';
	config.fontSize_defaultLabel = '16px';
	config.height = '400px';

	config.entities = false;
	config.enterMode = CKEDITOR.ENTER_BR;
	config.htmlEncodeOutput = false;
	config.basicEntities = false;
	config.ProcessHTMLEntities = false;

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.extraPlugins = 'uploadimage,image2,colorbutton,richcombo,floatpanel,font';

	config.uploadUrl = '/ckeditor/upload_json.php';


	// config.imageUploadUrl = '/uploader/upload.php?type=Images';
	config.filebrowserUploadUrl = '/ckeditor/upload.php';
};
