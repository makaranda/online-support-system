/**
 * @license Copyright (c) 2003-2014, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
config.extraPlugins = 'imagemaps';

// ...
   config.filebrowserBrowseUrl = 'http://helpdesk.globemw.net/scp/ckeditor/plugins/kcfinder/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = 'http://helpdesk.globemw.net/scp/ckeditor/plugins/kcfinder/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = 'http://helpdesk.globemw.net/scp/ckeditor/plugins/kcfinder/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = 'http://helpdesk.globemw.net/scp/ckeditor/plugins/kcfinder/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = 'http://helpdesk.globemw.net/scp/ckeditor/plugins/kcfinder/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = 'http://helpdesk.globemw.net/scp/ckeditor/plugins/kcfinder/upload.php?opener=ckeditor&type=flash';
// ...
};
