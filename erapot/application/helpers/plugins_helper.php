<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('get_tinymce'))
{
    function get_tinymce($class = "textarea.texteditor")
    {
		return '$(function() {
			var tinymce_options = {
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
					
					external_filemanager_path: "'.base_url('assets').'/filemanager/",
					filemanager_title:"ToroERP File Manager" ,
					external_plugins: { "filemanager" : "'.base_url('js/tinymce').'/plugins/responsivefilemanager/plugin.min.js"},
				};
			$("'.$class.'").tinymce(tinymce_options);
			});';
    }
}

if ( ! function_exists('get_tinymce_knockout'))
{
    function get_tinymce_knockout($class = "textarea.texteditor")
    {
		return '(function( $, ko ) {
			var binding = {
				\'after\': [ \'attr\', \'value\' ],

				\'defaults\': {
					theme : "modern",
					plugins : [
						"advlist autolink link image lists charmap print preview hr anchor pagebreak",
						"searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
						"table contextmenu directionality emoticons paste textcolor responsivefilemanager code"
					],
					image_advtab: true,
					toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
					toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code | qrcode ",
					entity_encoding : "raw",
					external_filemanager_path: "'.base_url('assets').'/filemanager/",
					filemanager_title:"ToroERP File Manager" ,
					external_plugins: { "filemanager" : "'.base_url('js/tinymce').'/plugins/responsivefilemanager/plugin.min.js"},
				},

				\'extensions\': {},

				\'init\': function( element, valueAccessor, allBindings, viewModel, bindingContext ) {
					if ( !ko.isWriteableObservable( valueAccessor() ) ) {
						throw \'valueAccessor must be writeable and observable\';
					}

					var options = allBindings.has( \'wysiwygConfig\' ) ? allBindings.get( \'wysiwygConfig\' ) : null,

						ext = allBindings.has( \'wysiwygExtensions\' ) ? allBindings.get( \'wysiwygExtensions\' ) : [],

						settings = configure( binding[\'defaults\'], ext, options, arguments );
					
					$( element ).text( valueAccessor()() );
					setTimeout( function() {
						$( element ).tinymce( settings );
					}, 0 );
					ko.utils[\'domNodeDisposal\'].addDisposeCallback( element, function() {
						$( element ).tinymce().remove();
					});

					return { controlsDescendantBindings: true };
				},

				\'update\': function( element, valueAccessor, allBindings, viewModel, bindingContext ) {
					var tinymce = $( element ).tinymce(),
						value = valueAccessor()();

					if ( tinymce ) {
						if ( tinymce.getContent() !== value ) {
							tinymce.setContent( value );
							tinymce.execCommand( \'keyup\' );
						}
					}
				}

			};
			
			var configure = function( defaults, extensions, options, args ) {
				var config = $.extend( true, {}, defaults );
				if ( options ) {
					ko.utils.objectForEach( options, function( property ) {
						if ( Object.prototype.toString.call( options[property] ) === \'[object Array]\' ) {
							if ( !config[property] ) {
								config[property] = [];
							}
							options[property] = ko.utils.arrayGetDistinctValues( config[property].concat( options[property] ) );
						}
					});

					$.extend( true, config, options );
				}
				if ( !config[\'plugins\'] ) {
					config[\'plugins\'] = [ \'paste\' ];
				} else if ( $.inArray( \'paste\', config[\'plugins\'] ) === -1 ) {
					config[\'plugins\'].push( \'paste\' );
				}
				var applyChange = function( editor ) {
					editor.on( \'change keyup nodechange\', function( e ) {
						args[1]()( editor.getContent() );
						for ( var name in extensions ) {
							if ( extensions.hasOwnProperty( name ) ) {
								binding[\'extensions\'][extensions[name]]( editor, e, args[2], args[4] );
							}
						}
					});
				};

				if ( typeof( config[\'setup\'] ) === \'function\' ) {
					var setup = config[\'setup\'];
					config[\'setup\'] = function( editor ) {
						setup( editor );
						applyChange( editor );
					};
				} else {
					config[\'setup\'] = applyChange;
				}

				return config;
			};

			ko.bindingHandlers[\'wysiwyg\'] = binding;

		})( jQuery, ko );';
    }
}

if ( ! function_exists('get_buttonset_knockout'))
{
    function get_buttonset_knockout($class = "chooseInput")
    {
		return '$(\'.chooseInput\').buttonset();
			ko.bindingHandlers[\'buttonset\'] = {
				\'init\': function(element, valueAccessor, allBindingsAccessor) {
					var updateHandler = function() {
						var valueToWrite;
						if (element.type == "checkbox") {
							valueToWrite = element.checked;
						} else if ((element.type == "radio") && (element.checked)) {
							valueToWrite = element.value;
						} else {
							return;
						}

						var modelValue = valueAccessor();
						if ((element.type == "checkbox") && (ko.utils.unwrapObservable(modelValue) instanceof Array)) {
							var existingEntryIndex = ko.utils.arrayIndexOf(ko.utils.unwrapObservable(modelValue), element.value);
							if (element.checked && (existingEntryIndex < 0)) modelValue.push(element.value);
							else if ((!element.checked) && (existingEntryIndex >= 0)) modelValue.splice(existingEntryIndex, 1);
						} else if (ko.isWriteableObservable(modelValue)) {
							if (modelValue() !== valueToWrite) {
								modelValue(valueToWrite);
							}
						} else {
							var allBindings = allBindingsAccessor();
							if (allBindings[\'_ko_property_writers\'] && allBindings[\'_ko_property_writers\'][\'checked\']) {
								allBindings[\'_ko_property_writers\'][\'checked\'](valueToWrite);
							}
						}
					};
					ko.utils.registerEventHandler(element, "click", updateHandler);

					if ((element.type == "radio") && !element.name) ko.bindingHandlers[\'uniqueName\'][\'init\'](element, function() {
						return true
					});
				},
				\'update\': function(element, valueAccessor) {
					var buttonSet = function(element) {
						var buttonId = $(element).attr(\'id\');
						if (buttonId) {
							var buttonSetDiv = $(element).parent(\'.ui-buttonset\');
							var elementLabel = $(buttonSetDiv).find(\'label[for="\' + buttonId + \'"]\');
							if (elementLabel.length === 0) {
								elementLabel = $(element).parent(\'*\').find(\'label[for="\' + buttonId + \'"]\');
							}
							if (element.checked && !$(elementLabel).hasClass(\'ui-state-active\')) {
								$(elementLabel).addClass(\'ui-state-active\');
							}
							if (!element.checked && $(elementLabel).hasClass(\'ui-state-active\')) {
								$(elementLabel).removeClass(\'ui-state-active\');
							}
						}
					};
					var value = ko.utils.unwrapObservable(valueAccessor());

					if (element.type == "checkbox") {
						if (value instanceof Array) {
							element.checked = ko.utils.arrayIndexOf(value, element.value) >= 0;
						} else {
							element.checked = value;
						}
						buttonSet(element);
						if (value && ko.utils.isIe6) element.mergeAttributes(document.createElement("<input type=\'checkbox\' checked=\'checked\' />"), false);
					} else if (element.type == "radio") {
						element.checked = (element.value == value);
						buttonSet(element);
						if ((element.value == value) && (ko.utils.isIe6 || ko.utils.isIe7)) element.mergeAttributes(document.createElement("<input type=\'radio\' checked=\'checked\' />"), false);
					}
				}
			};';
    }
}