/**
 * @license Copyright (c) 2003-2018, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see https://ckeditor.com/legal/ckeditor-oss-license
 */

CKEDITOR.editorConfig = function (config) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	config.uiColor = '#AADC6E';

	config.language = 'vi';

	config.toolbarGroups = [
		{ name: 'clipboard', groups: ['clipboard', 'undo'] },
		// { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		// { name: 'forms' },
		{ name: 'tools' },
		// { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'links' },
		{ name: 'paragraph', groups: ['list', 'indent', 'blocks', 'align', 'bidi'] },
		{ name: 'basicstyles', groups: ['basicstyles', 'cleanup'] },
		{ name: 'colors' },
		{ name: 'styles' },
		{ name: 'others' },
		// { name: 'about' }
	];

	config.filebrowserBrowseUrl = '<?= base_url()?>public/assets/plugins/ck/ckfinder/ckfinder.html';

	config.filebrowserImageBrowseUrl = '<?= base_url()?>public/assets/plugins/ck/ckfinder/ckfinder.html?type=Images';

	config.filebrowserFlashBrowseUrl = '<?= base_url()?>public/assets/plugins/ck/ckfinder/ckfinder.html?type=Flash';

	config.filebrowserUploadUrl = '<?= base_url()?>public/assets/plugins/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files';

	config.filebrowserImageUploadUrl = '<?= base_url()?>public/assets/plugins/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images';

	config.filebrowserFlashUploadUrl = '<?= base_url()?>public/assets/plugins/ck/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash';

	// config.extraPlugins = 'markdown';
};


