	$(function() {
		var tinymce_path = default_texteditor_path+'/tiny_mce2/';
	
		var tinymce_options = {

				// Location of TinyMCE script
				script_url : tinymce_path +"tinymce.min.js",
				
				// General options
				theme : "modern",
				plugins : [
					"advlist autolink link image lists charmap print preview hr anchor pagebreak",
					"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
					"table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
				],

				// Theme options
				image_advtab: true,
				toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
				toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | qrcode ",
				entity_encoding : "raw",
				
				external_filemanager_path: default_root_assets+"/filemanager/",
				filemanager_title:"ToroERP File Manager" ,
				external_plugins: { "filemanager" : tinymce_path+"/plugins/responsivefilemanager/plugin.min.js"},
			};
		
		$('textarea.texteditor').tinymce(tinymce_options);
		
		var minimal_tinymce_options = $.extend({}, tinymce_options);
		minimal_tinymce_options.theme = "simple";
		
		$('textarea.mini-texteditor').tinymce(minimal_tinymce_options);
		
	});