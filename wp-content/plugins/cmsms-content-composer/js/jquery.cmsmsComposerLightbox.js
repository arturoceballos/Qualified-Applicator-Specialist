/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.3.0
 * 
 * Visual Content Composer Lightbox jQuery Plugin
 * Created by CMSMasters
 * 
 */

 
(function ($) { 
	var ComposerLightbox = function (element, parameters) { 
		var defaults = { 
				closeButtons : 		true, 
				backdropClose : 	false, 
				closeButtonText : 	cmsms_lightbox.cancel, 
				saveButtonText : 	cmsms_lightbox.update, 
				mediaButtonText : 	cmsms_lightbox.add_media, 
				boxTitle : 			false, 
				loadURL : 			false, 
				loadData : 			false 
			}, 
			obj = this, 
			privateMethods = {};
		
		// Global Methods
		obj.methods = { 
			init : function () { 
				obj.methods.options = $.extend({}, defaults, parameters);
				
				
				obj.methods.setVars();
			}, 
			setVars : function () { 
				obj.methods.el = $(element);
				
				
				obj.methods.body = $('body');
				
				
				obj.methods.lbHTML = '<div class="cmsmsBoxOut">' + 
					'<div class="cmsmsBoxBack" />' + 
					'<div class="cmsmsBoxCont">' + 
						'<div class="cmsmsBoxContIn admin-icon-loader animate-spin">' + 
							'<div class="cmsmsBoxContInTop wrap" />' + 
							'<div class="cmsmsBoxContInMid" />' + 
							'<div class="cmsmsBoxContInBot" />' + 
						'</div>' + 
					'</div>' + 
				'</div>';
			}, 
			resetVars : function () { 
				obj.methods.uniqID = privateMethods.getUniqID();
				
				
				obj.methods.lbStructure = $(obj.methods.lbHTML);
				
				
				obj.methods.back = obj.methods.lbStructure.find('.cmsmsBoxBack');
				obj.methods.cont = obj.methods.lbStructure.find('.cmsmsBoxCont');
				
				obj.methods.contIn = obj.methods.cont.find('.cmsmsBoxContIn');
				
				obj.methods.contInTop = obj.methods.contIn.find('.cmsmsBoxContInTop');
				obj.methods.contInMid = obj.methods.contIn.find('.cmsmsBoxContInMid');
				obj.methods.contInBot = obj.methods.contIn.find('.cmsmsBoxContInBot');
				
				
				obj.methods.fields = '';
				
				
				obj.methods.shcdIndex = undefined;
				
				
				obj.methods.colIndex = undefined;
				
				
				obj.methods.startEditor = false;
				
				
				obj.methods.eventsArray = [];
				
				
				obj.methods.buildObj();
				
				
				privateMethods.attachEvents();
			}, 
			buildObj : function () { 
				if (obj.methods.options.closeButtons) {
					obj.methods.contInTop.append('<a href="#" class="cmsmsBoxClose admin-icon-remove" title="' + obj.methods.options.closeButtonText + '" />');
					
					
					obj.methods.lbCloseBut = obj.methods.contInTop.find('.cmsmsBoxClose');
				}
				
				
				obj.methods.contInTop.append('<h2>' + cmsms_lightbox.shcd_settings + '</h2>');
				
				
				obj.methods.lbTitle = obj.methods.contInTop.find('h2');
				
				
				obj.methods.lbTitleText = obj.methods.lbTitle.text();
				
				
				if (obj.methods.options.closeButtons) {
					obj.methods.contInBot.append('<a href="#" class="cmsmsBoxCancel button button-large" title="' + obj.methods.options.closeButtonText + '">' + 
						obj.methods.options.closeButtonText + 
					'</a>');
					
					
					obj.methods.lbCancelBut = obj.methods.contInBot.find('.cmsmsBoxCancel');
				}
				
				
				obj.methods.contInBot.append('<a href="#" class="cmsmsBoxSave button button-primary button-large" title="' + obj.methods.options.saveButtonText + '">' + 
					obj.methods.options.saveButtonText + 
				'</a>');
				
				
				obj.methods.lbSaveBut = obj.methods.contInBot.find('.cmsmsBoxSave');
			}, 
			openLightbox : function (shcd) { 
				obj.methods.resetVars();
				
				
				obj.methods.lbStructure.attr( { 
					id : 				'cmsmsBox_' + obj.methods.uniqID, 
					'data-id' : 		obj.methods.uniqID, 
					'data-index' : 		((shcd.index !== undefined) ? shcd.index : false), 
					'data-shortcode' : 	shcd.type 
				} );
				
				
				if (shcd.editor) {
					obj.methods.lbStructure.attr('data-editor', shcd.editor);
				} else {
					obj.methods.lbStructure.removeAttr('data-editor');
				}
				
				
				if (shcd.multiple) {
					obj.methods.lbStructure.attr('data-multiple', shcd.multiple);
				} else {
					obj.methods.lbStructure.removeAttr('data-multiple');
				}
				
				
				if (shcd.for_editor) {
					obj.methods.lbStructure.attr('data-for_editor', shcd.for_editor);
				} else {
					obj.methods.lbStructure.removeAttr('data-for_editor');
				}
				
				
				if (shcd.link) {
					obj.methods.lbStructure.attr('data-link', shcd.link);
				} else {
					obj.methods.lbStructure.removeAttr('data-link');
				}
				
				
				if (privateMethods.getWinWidth() < 930) {
					obj.methods.cont.addClass('resp');
				}
				
				
				obj.methods.body.append(obj.methods.lbStructure);
				
				
				if (shcd.type === 'cmsms_row') {
					obj.methods.lbTitle.text(cmsmsRow.title + ' ' + obj.methods.lbTitleText);
				} else if (shcd.type === 'cmsms_column') {
					obj.methods.lbTitle.text(cmsmsColumn.title + ' ' + obj.methods.lbTitleText);
				} else if (shcd.link) {
					obj.methods.lbTitle.text(cmsmsLinkShortcode.title + ' ' + obj.methods.lbTitleText);
				} else if (shcd.multiple) {
					obj.methods.lbTitle.text(cmsmsMultipleShortcodes[shcd.type].title + ' ' + obj.methods.lbTitleText);
				} else if (shcd.for_editor) {
					obj.methods.lbTitle.text(cmsmsEditorShortcodes[shcd.type].title + ' ' + obj.methods.lbTitleText);
				} else {
					obj.methods.lbTitle.text(cmsmsShortcodes[shcd.type].title + ' ' + obj.methods.lbTitleText);
				}
				
				
				obj.methods.body.css( { 
					overflow : 'hidden' 
				} ).find('#cmsmsBox_' + obj.methods.uniqID).addClass('showBox preloadBox');
				
				
				if (obj.methods.lbSaveBut.is(':hidden')) {
					obj.methods.lbSaveBut.removeAttr('style');
				}
				
				
				if (shcd.link) {
					var shcdContentArray = shcd.content.split('|'), 
						shcdAttrKey = '', 
						shcdAttrsObject = {};
					
					
					for (var j = 0, jlength = shcdContentArray.length; j < jlength; j += 1) {
						if (j === 0) {
							shcdAttrKey = 'title';
							
							
							shcdContentArray[j] = shcdContentArray[j].replace(/title\{([^\}]*)\}/g, '$1');
						} else if (j === 1) {
							shcdAttrKey = 'link';
							
							
							shcdContentArray[j] = shcdContentArray[j].replace(/link\{([^\}]*)\}/g, '$1');
						} else if (j === 2) {
							shcdAttrKey = 'icon';
							
							
							shcdContentArray[j] = shcdContentArray[j].replace(/icon\{([^\}]*)\}/g, '$1');
						}
						
						
						shcdAttrsObject[shcdAttrKey] = shcdContentArray[j];
					}
				} else {
					var reCmsmsParseContent = new RegExp("\\[" + shcd.type + "((?:\\s\\w+=[\"'][^\"']+[\"'])*)\\]([\\s\\S]*)", "g"), 
						reArray = (shcd.content ? reCmsmsParseContent.exec(shcd.content) : [shcd.type, '', '']), 
						shcdContent = '', 
						shcdAttrsArray = [], 
						shcdAttrs = [], 
						shcdAttrsObject = {};
					
					
					if (shcd.type !== 'cmsms_row' && shcd.type !== 'cmsms_column') {
						if (reArray[1] !== '') {
							shcdAttrsArray = reArray[1].slice(1, -1).split(/["|']\s/g);
							
							
							for (var i = 0, ilength = shcdAttrsArray.length; i < ilength; i += 1) {
								shcdAttrs = /([^=]+)=["|']([\s\S]*)/g.exec(shcdAttrsArray[i]);
								
								
								if (shcdAttrs === null) {
									shcdAttrs = /([^=]+)=["|']([\s\S]*)/g.exec(shcdAttrsArray[i] + '" ' + shcdAttrsArray[i + 1]);
									
									
									i += 1;
								}
								
								
								shcdAttrsObject[shcdAttrs[1]] = shcdAttrs[2];
							}
						}
						
						
						if (reArray[2] !== '') {
							shcdContent += reArray[2].slice(0, -(shcd.type.length + 3)).replace(/^(?:<br>|<br \/>){2}/g, '').replace(/(?:<br>|<br \/>){2}$/g, '');
						}
					} else {
						for (var k in shcd.content) {
							if (typeof shcd.content[k] !== 'object' && typeof shcd.content[k] !== 'array') {
								shcdAttrsObject[k] = shcd.content[k];
							}
						}
					}
				}
				
				
				if (shcd.type === 'cmsms_row') {
					for (var key in cmsmsRow.fields) {
						obj.methods.fields += obj.methods.generateField(key, cmsmsRow.fields[key], ((shcdAttrsObject[key] !== undefined) ? shcdAttrsObject[key] : ''), shcd.type);
					}
				} else if (shcd.type === 'cmsms_column') {
					for (var key in cmsmsColumn.fields) {
						obj.methods.fields += obj.methods.generateField(key, cmsmsColumn.fields[key], ((shcdAttrsObject[key] !== undefined) ? shcdAttrsObject[key] : ''), shcd.type);
					}
				} else {
					if (shcd.link) {
						for (var key in cmsmsLinkShortcode.fields) {
							obj.methods.fields += obj.methods.generateField(key, cmsmsLinkShortcode.fields[key], ((shcdAttrsObject[key] !== undefined) ? shcdAttrsObject[key] : ''), shcd.type);
						}
					} else if (shcd.multiple) {
						for (var key in cmsmsMultipleShortcodes[shcd.type].fields) {
							if (cmsmsMultipleShortcodes[shcd.type].content === key) {
								obj.methods.fields += obj.methods.generateField(key, cmsmsMultipleShortcodes[shcd.type].fields[key], shcdContent, shcd.type);
							} else {
								obj.methods.fields += obj.methods.generateField(key, cmsmsMultipleShortcodes[shcd.type].fields[key], ((shcdAttrsObject[key] !== undefined) ? shcdAttrsObject[key] : ''), shcd.type);
							}
						}
					} else if (shcd.for_editor) {
						for (var key in cmsmsEditorShortcodes[shcd.type].fields) {
							if (cmsmsEditorShortcodes[shcd.type].content === key) {
								obj.methods.fields += obj.methods.generateField(key, cmsmsEditorShortcodes[shcd.type].fields[key], shcdContent, shcd.type);
							} else {
								obj.methods.fields += obj.methods.generateField(key, cmsmsEditorShortcodes[shcd.type].fields[key], ((shcdAttrsObject[key] !== undefined) ? shcdAttrsObject[key] : ''), shcd.type);
							}
						}
					} else {
						for (var key in cmsmsShortcodes[shcd.type].fields) {
							if (cmsmsShortcodes[shcd.type].content === key) {
								obj.methods.fields += obj.methods.generateField(key, cmsmsShortcodes[shcd.type].fields[key], shcdContent, shcd.type);
							} else {
								obj.methods.fields += obj.methods.generateField(key, cmsmsShortcodes[shcd.type].fields[key], ((shcdAttrsObject[key] !== undefined) ? shcdAttrsObject[key] : ''), shcd.type);
							}
						}
					}
				}
				
				
				obj.methods.body.find('#cmsmsBox_' + obj.methods.uniqID).find('.cmsmsBoxContInMid').append(obj.methods.fields);
				
				
				obj.methods.startEditor = true;
				
				
				obj.methods.body.find('#cmsmsBox_' + obj.methods.uniqID).removeClass('preloadBox');
				
				
				setTimeout(function () { 
					privateMethods.attachDependenceEvents();
					
					
					privateMethods.attachGeneratedEvents();
				}, 100);
			}, 
			openShortcodes : function (elData) { 
				obj.methods.resetVars();
				
				
				if (elData.index) {
					obj.methods.colIndex = elData.index.split('|');
				} else {
					obj.methods.colIndex = false;
				}
				
				
				obj.methods.lbStructure.attr( { 
					id : 				'cmsmsBox_' + obj.methods.uniqID, 
					'data-shortcode' : 	'cmsms_shortcodes' 
				} );
				
				
				if (privateMethods.getWinWidth() < 930) {
					obj.methods.cont.addClass('resp');
				}
				
				
				obj.methods.body.append(obj.methods.lbStructure);
				
				
				obj.methods.lbTitle.text(cmsms_lightbox.shcd_choose);
				
				
				obj.methods.body.css( { 
					overflow : 'hidden' 
				} ).find('#cmsmsBox_' + obj.methods.uniqID).addClass('showBox preloadBox');
				
				
				obj.methods.lbSaveBut.css('display', 'none');
				
				
				obj.methods.body.find('#cmsmsBox_' + obj.methods.uniqID).find('.cmsmsBoxContInMid').append(obj.methods.generateShortcodes(elData.prepend, elData.editor));
				
				
				obj.methods.eventsArray.push('shortcodes');
				
				
				obj.methods.body.find('#cmsmsBox_' + obj.methods.uniqID).removeClass('preloadBox');
				
				
				setTimeout(function () { 
					privateMethods.attachGeneratedEvents();
				}, 100);
			}, 
			generateShortcodes : function (prepend, cmsms_editor) { 
				out = '<div class="cmsms_content_box cmsms_shortcodes full_width" data-id="cmsms_shortcode_' + obj.methods.uniqID + '" data-prepend="' + prepend + '">' + 
					'<div class="cmsms_field">' + 
						'<ul>';
				
				
				if (cmsms_editor) {
					for (var key in cmsmsEditorShortcodes) {
						out += '<li>' + 
							'<a href="#" class="' + key + ' ' + cmsmsEditorShortcodes[key].icon + '" data-shortcode="' + key + '" data-pair="' + ((cmsmsEditorShortcodes[key].pair) ? true : false) + '" data-editor="' + cmsms_editor + '">' + 
								'<span>' + cmsmsEditorShortcodes[key].title + '</span>' + 
							'</a>' + 
						'</li>';
					}
				}
				
				
				for (var key in cmsmsShortcodes) {
					out += '<li>' + 
						'<a href="#" class="' + key + ' ' + cmsmsShortcodes[key].icon + '" data-shortcode="' + key + '" data-pair="' + ((cmsmsShortcodes[key].pair) ? true : false) + '">' + 
							'<span>' + cmsmsShortcodes[key].title + '</span>' + 
						'</a>' + 
					'</li>';
				}
				
				
				out += '</ul>' + 
					'</div>' + 
				'</div>';
				
				
				return out;
			}, 
			generateField : function (key, field, val, shcd) { 
				var fieldContent = '';
				
				
				fieldContent += '<div class="cmsms_content_box' + ((field.width !== 'full') ? ' ' + field.width + '_width' : ' full_width') + '" data-id="' + key + '_' + obj.methods.uniqID + '" data-type="' + field.type + '"' + ((typeof field.depend === 'string' && field.depend !== '') ? ' style="display:none;"' : '') + '>' + 
					'<div class="cmsms_caption">' + 
						'<label for="' + key + '_' + obj.methods.uniqID + '">' + 
							field.title + 
							((field.required) ? '<abbr class="required" title="required">*</abbr>' : '') + 
						'</label>' + 
						((field.descr !== '') ? '<p>' + field.descr + '</p>' : '') + 
					'</div>' + 
					'<div class="cmsms_field cmsms_field_' + field.type + '">';
				
				
				switch (field.type) { 
				case 'editor':
					fieldContent += '<div class="wp-' + key + '_' + obj.methods.uniqID + '-container-wrap" id="wp-' + key + '_' + obj.methods.uniqID + '-editor-container-wrap">' + 
						'<div class="wp-core-ui wp-editor-wrap tmce-active" id="wp-' + key + '_' + obj.methods.uniqID + '-wrap">' + 
							'<link media="all" type="text/css" href="http://' + document.location.host + '/wp-includes/css/editor.min.css" id="editor-buttons-css" rel="stylesheet" />' + 
							'<div class="wp-editor-tools hide-if-no-js" id="wp-' + key + '_' + obj.methods.uniqID + '-editor-tools">' + 
								'<a class="wp-switch-editor switch-html" id="' + key + '_' + obj.methods.uniqID + '-html">Text</a>' + 
								'<a class="wp-switch-editor switch-tmce" id="' + key + '_' + obj.methods.uniqID + '-tmce">Visual</a>' + 
								'<div class="wp-media-buttons" id="wp-' + key + '_' + obj.methods.uniqID + '-media-buttons">' + 
									'<a title="Add Media" data-editor="' + key + '_' + obj.methods.uniqID + '" class="button insert-media add_media" id="insert-media-button-' + key + '_' + obj.methods.uniqID + '" href="#"><span class="wp-media-buttons-icon"></span> Add Media</a>' + 
								'</div>' + 
							'</div>' + 
							'<div class="wp-editor-container" id="wp-' + key + '_' + obj.methods.uniqID + '-editor-container">' + 
								'<textarea id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" cols="40" rows="15" class="wp-editor-area">' + val + '</textarea>' + 
							'</div>' + 
						'</div>' + 
					'</div>';
					
					
					var editorStartInterval = setInterval(function () { 
						if (obj.methods.startEditor) {
							privateMethods.generateEditor(key + '_' + obj.methods.uniqID);
							
							
							clearInterval(editorStartInterval);
						}
					}, 50);
					
					
					break;
				case 'input':
					fieldContent += '<input type="' + ((field.width === 'number') ? 'number' : 'text') + '" id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" value="' + privateMethods.unSanitizeContent(val) + '"' + ((field.required) ? ' aria-required="true"' : '') + ((field.min) ? ' min="' + field.min + '"' : '') + ((field.max) ? ' max="' + field.max + '"' : '') + ((field.step) ? ' step="' + field.step + '"' : '') + ' />';
					
					
					break;
				case 'range':
					fieldContent += '<input type="range" id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" value="' + val + '"' + ((field.required) ? ' aria-required="true"' : '') + ((field.min) ? ' min="' + field.min + '"' : '') + ((field.max) ? ' max="' + field.max + '"' : '') + ((field.step) ? ' step="' + field.step + '"' : '') + ' />' + 
					'<input type="text" id="' + key + '_' + obj.methods.uniqID + '_number" name="' + key + '_' + obj.methods.uniqID + '_number" value="' + val + '" readonly="readonly" />';
					
					
					obj.methods.eventsArray.push('range');
					
					
					break;
				case 'textarea':
					fieldContent += '<textarea id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '"' + ((field.required) ? ' aria-required="true"' : '') + '>' + privateMethods.unSanitizeContent(val) + '</textarea>';
					
					
					break;
				case 'base64':
					fieldContent += '<textarea id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '"' + ((field.required) ? ' aria-required="true"' : '') + '>' + privateMethods.base64Decode(val) + '</textarea>';
					
					
					break;
				case 'select':
					fieldContent += '<select id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '"' + ((field.required) ? ' aria-required="true"' : '') + '>';
					
					
					for (var k in field.choises) {
						fieldContent += '<option value="' + k + '"' + ((((val !== '') ? val.toString() : field.def) === k) ? ' selected="selected"' : '') + '>' + field.choises[k] + '</option>';
					}
					
					
					fieldContent += '</select>';
					
					
					break;
				case 'select_multiple':
					var defVals = field.def.split(','), 
						newVals = val.toString().split(',');
					
					
					fieldContent += '<select id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '"' + ((field.required) ? ' aria-required="true"' : '') + ' multiple="multiple" size="5">';
					
					
					for (var k in field.choises) {
						fieldContent += '<option value="' + k + '"' + ((((val !== '') ? $.inArray(k, newVals) : $.inArray(k, defVals)) !== -1) ? ' selected="selected"' : '') + '>' + field.choises[k] + '</option>';
					}
					
					
					fieldContent += '</select>' + 
					'<a href="#" class="cmsms_cat_cancel admin-icon-remove"' + ((val !== '') ? '' : ' style="display:none;"') + '>' + cmsms_lightbox.deselect + '</a>';
					
					
					obj.methods.eventsArray.push('select_multiple');
					
					
					break;
				case 'radio':
					var i = 0;
					
					
					fieldContent += '<div class="cmsms_check_parent" id="' + key + '_' + obj.methods.uniqID + '">';
					
					
					for (var k in field.choises) {
						fieldContent += '<div class="cmsms_check">' + 
							'<input type="radio" id="' + key + '_' + obj.methods.uniqID + '_' + i + '" name="' + key + '_' + obj.methods.uniqID + '" value="' + k + '"' + ((k === ((val !== '') ? val : field.def)) ? ' checked="checked"' : '') + '>' + 
							'<label for="' + key + '_' + obj.methods.uniqID + '_' + i + '">' + field.choises[k] + '</label>' + 
						'</div>';
						
						
						i += 1;
					}
					
					
					fieldContent += '</div>';
					
					
					break;
				case 'checkbox':
					var j = 0, 
						newVals = val.toString().split(',');
					
					
					fieldContent += '<div class="cmsms_check_parent" id="' + key + '_' + obj.methods.uniqID + '">';
					
					
					for (var k in field.choises) {
						fieldContent += '<div class="cmsms_check">' + 
							'<label for="' + key + '_' + obj.methods.uniqID + '_' + j + '">' + 
								'<input type="checkbox" id="' + key + '_' + obj.methods.uniqID + '_' + j + '" name="' + key + '_' + obj.methods.uniqID + '_' + j + '" value="' + k + '"' + ((val !== '' && $.inArray(k, newVals) !== -1) ? ' checked="checked"' : '') + '>' + 
								field.choises[k] + 
							'</label>' + 
						'</div>';
						
						
						j += 1;
					}
					
					
					fieldContent += '</div>';
					
					
					break;
				case 'color':
					fieldContent += '<input type="text" id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" value="' + ((val !== '') ? val : field.def) + '" class="cmsms_color_field" data-default-color="' + field.def + '" />';
					
					
					obj.methods.eventsArray.push('color');
					
					
					break;
				case 'rgba':
					var arr_val = val.split('|'), 
						def_val = field.def.split('|'), 
						new_color = (val !== '') ? arr_val[0] : ((field.def !== '') ? def_val[0] : ''), 
						new_alpha = (val !== '') ? arr_val[1] : ((field.def !== '') ? def_val[1] : '100');
					
					
					fieldContent += '<input type="text" id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" value="' + new_color + '" class="cmsms_color_field" data-default-color="' + ((field.def !== '') ? def_val[0] : '') + '" />' + 
					'<input type="range" id="' + key + '_' + obj.methods.uniqID + '_transp" name="' + key + '_' + obj.methods.uniqID + '_transp" value="' + new_alpha + '"' + ((field.required) ? ' aria-required="true"' : '') + ((field.min) ? ' min="' + field.min + '"' : '') + ((field.max) ? ' max="' + field.max + '"' : '') + ((field.step) ? ' step="' + field.step + '"' : '') + ' />' + 
					'<input type="text" id="' + key + '_' + obj.methods.uniqID + '_number" name="' + key + '_' + obj.methods.uniqID + '_number" value="' + new_alpha + '" readonly="readonly" />' + 
					'<span class="range_descr">' + cmsms_lightbox.opacity + '</span>';
					
					
					obj.methods.eventsArray.push('color');
					
					obj.methods.eventsArray.push('range');
					
					
					break;
				case 'upload':
					var newVal = val.split('|');
					
					
					fieldContent += '<div class="cmsms_upload_parent cmsms_select_parent">' + 
						'<input type="button" id="cmsms_upload_' + obj.methods.uniqID + '_button" class="cmsms_upload_button button button-large" value="' + ((field.library === 'image') ? cmsms_lightbox.choose_image : ((field.library === 'video') ? cmsms_lightbox.choose_video : cmsms_lightbox.choose_audio)) + '" data-title="' + ((field.library === 'image') ? cmsms_lightbox.choose_image : ((field.library === 'video') ? cmsms_lightbox.choose_video : cmsms_lightbox.choose_audio)) + '" data-button="' + ((field.library === 'image') ? cmsms_lightbox.insert_image : ((field.library === 'video') ? cmsms_lightbox.insert_video : cmsms_lightbox.insert_audio)) + '" data-id="cmsms-media-select-frame-' + key + '_' + obj.methods.uniqID + '" data-classes="media-frame cmsms-media-select-frame' + ((!field.description) ? ' cmsms-frame-no-description' : '') + ((!field.caption) ? ' cmsms-frame-no-caption' : '') + ((!field.align) ? ' cmsms-frame-no-align' : '') + ((!field.link) ? ' cmsms-frame-no-link' : '') + ((!field.size) ? ' cmsms-frame-no-size' : '') + '" data-library="' + field.library + '" data-type="' + field.frame + '"' + ((field.frame === 'post') ? ' data-state="insert"' : '') + ' data-multiple="' + field.multiple + '" />';
					
					
					if (field.library === 'image') {
						fieldContent += '<div class="cmsms_upload"' + ((val !== '' && typeof newVal[1] !== 'undefined') ? ' style="display:block;"' : '') + '>' + 
							'<img src="' + ((val !== '' && typeof newVal[1] !== 'undefined') ? newVal[1] : '') + '" class="cmsms_preview_image" alt="" />' + 
							'<a href="#" class="cmsms_upload_cancel admin-icon-remove" title="' + cmsms_lightbox.remove + '"></a>' + 
						'</div>';
					}
					
					
					fieldContent += '<input type="' + ((field.library === 'image') ? 'hidden' : 'text') + '" id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" class="cmsms_upload_image" value="' + val + '" />' + 
					'</div>';
					
					
					obj.methods.eventsArray.push('upload');
					
					
					break;
				case 'gallery':
					var newVals = val.split(',');
					
					
					fieldContent += '<div class="cmsms_upload_parent cmsms_gallery_parent">' + 
						'<input type="button" id="cmsms_gallery_' + obj.methods.uniqID + '_button" class="cmsms_upload_button button button-large" value="' + ((val !== '') ? cmsms_lightbox.edit_gallery : cmsms_lightbox.create_gallery) + '" data-title="' + cmsms_lightbox.create_edit_gallery + '" data-button="' + cmsms_lightbox.insert_gallery + '" data-id="cmsms-media-gallery-frame-' + key + '_' + obj.methods.uniqID + '" data-classes="media-frame cmsms-media-gallery-frame cmsms-frame-no-description" data-library="image" data-type="post" data-state="' + ((val !== '') ? 'gallery-edit' : 'gallery-library') + '" data-multiple="true"' + ((val !== '') ? ' data-editing="true"' : '') + ' />' + 
						'<ul class="cmsms_gallery">';
					
					
					if (val !== '') {
						for (var i = 0, ilength = newVals.length; i < ilength; i += 1) {
							var newVal = newVals[i].split('|');
							
							
							fieldContent += '<li class="cmsms_gallery_item">' + 
								'<img src="' + newVal[1] + '" alt="" data-id="' + newVal[0] + '" class="cmsms_gallery_image" />' + 
								'<a href="#" class="cmsms_gallery_cancel admin-icon-remove" title="Remove"></a>' + 
							'</li>';
						}
					}
					
					
					fieldContent += '</ul>' + 
						'<input type="hidden" id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" class="cmsms_gallery_images" value="' + val + '" />' + 
					'</div>';
					
					
					obj.methods.eventsArray.push('gallery');
					
					
					break;
				case 'icon':
					fieldContent += '<div class="icons_list_parent">' + 
						'<p>' + 
							'<input class="icon_upload_image all-options" type="hidden" id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" value="' + val + '" />' + 
							'<span id="' + key + '_' + obj.methods.uniqID + '_icon" data-class="cmsms_new_icon_img"' + ((val !== '') ? ' class="' + val + '" style="display:block;"' : '"') + '></span>' + 
							'<input id="' + key + '_' + obj.methods.uniqID + '_button" class="cmsms_icon_choose_button button" type="button" value="' + cmsms_lightbox.choose_icon + '" />' + 
							'<a href="#" class="cmsms_remove_icon admin-icon-remove" title="' + cmsms_lightbox.remove + '"' + ((val !== '') ? ' style="display:inline-block;"' : '') + '></a>' + 
						'</p>' + 
					'</div>';
					
					
					break;
				case 'multiple':
					fieldContent += '<div class="cmsms_multiple_parent">' + 
						'<div class="cmsms_multiple_fields">' + 
							cmsmsContentComposer.methods.convertShortcodes(val, shcd.slice(0, -1)) + 
						'</div>' + 
						'<a href="#" class="cmsms_multi_add admin-icon-add"></a>' + 
						'<textarea id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" class="cmsms_multiple_value" style="display:none;">' + val.replace(/<br\s?\/?>/g, "\n") + '</textarea>' + 
					'</div>';
					
					
					obj.methods.eventsArray.push('multiple');
					
					
					break;
				case 'table':
					var tr = val.split(/\[\/cmsms_tr\]\[/g), 
						trLength = tr.length, 
						trf = tr[0].split(/\[\/cmsms_td\]\[/g), 
						trl = tr[trLength - 1].split(/\[\/cmsms_td\]\[/g);
					
					
					fieldContent += '<div class="cmsms_table_parent">' + 
						'<input type="button" id="cmsms_table_' + obj.methods.uniqID + '_column_button" class="cmsms_table_column_button button button-large" value="' + cmsms_lightbox.add_table_col + '" />' + 
						'<input type="button" id="cmsms_table_' + obj.methods.uniqID + '_row_button" class="cmsms_table_row_button button button-large" value="' + cmsms_lightbox.add_table_row + '" />' + 
						'<div class="cmsms_table">' + 
							'<div class="cmsms_table_row  cmsms_table_row_top">' + 
								'<div class="cmsms_table_cell cmsms_table_cell_top"></div>';
					
					
					for (var f = 0, flength = trf.length; f < flength; f += 1) {
						if (f === 0) {
							trf[f] = trf[f].replace(/\[cmsms_tr[^\]]*\]\[/g, '');
						} else if (f === (flength - 1)) {
							trf[f] = trf[f].replace(/\[\/cmsms_td\]/g, '');
						}
						
						
						var selectedCol = (trf[f].slice(8, 9) === ' ') ? trf[f].replace(/cmsms_td(\stype="([^"]*)")?\salign="([^"]*)"\][^\[]*/g, '$3') : '';
						
						
						fieldContent += '<div class="cmsms_table_cell cmsms_table_cell_top">' + 
							'<select id="cmsms_column_select_' + f + '" name="cmsms_column_select_' + f + '" class="cmsms_column_select">' + 
								'<option value=""' + ((selectedCol === '') ? ' selected="selected"' : '') + '>' + cmsms_lightbox.text_align_left + '</option>' + 
								'<option value="center"' + ((selectedCol === 'center') ? ' selected="selected"' : '') + '>' + cmsms_lightbox.text_align_center + '</option>' + 
								'<option value="right"' + ((selectedCol === 'right') ? ' selected="selected"' : '') + '>' + cmsms_lightbox.text_align_right + '</option>' + 
							'</select>' + 
						'</div>';
					}
					
					
					fieldContent += '<div class="cmsms_table_cell cmsms_table_cell_top"></div>' + 
					'</div>';
					
					
					for (var i = 0, ilength = tr.length; i < ilength; i += 1) {
						fieldContent += '<div class="cmsms_table_row">';
						
						
						if (i === 0) {
							tr[i] = tr[i].slice(1);
						} else if (i === (ilength - 1)) {
							tr[i] = tr[i].replace(/\[\/cmsms_tr\]/g, '');
						}
						
						
						var td = tr[i].split(/\[\/cmsms_td\]\[cmsms_td[^\]]*]/g), 
							selectedRow = (td[0].slice(8, 9) === ' ') ? td[0].replace(/cmsms_tr\stype="([^"]*)"\]\[cmsms_td[^\]]*\][^\[]*/g, '$1') : '';
						
						
						fieldContent += '<div class="cmsms_table_cell">' + 
							'<select id="cmsms_row_select_' + i + '" name="cmsms_row_select_' + i + '" class="cmsms_row_select">' + 
								'<option value=""' + ((selectedRow === '') ? ' selected="selected"' : '') + '>' + cmsms_lightbox.default_row + '</option>' + 
								'<option value="header"' + ((selectedRow === 'header') ? ' selected="selected"' : '') + '>' + cmsms_lightbox.header_row + '</option>' + 
								'<option value="footer"' + ((selectedRow === 'footer') ? ' selected="selected"' : '') + '>' + cmsms_lightbox.footer_row + '</option>' + 
							'</select>' + 
						'</div>';
						
						
						for (var j = 0, jlength = td.length; j < jlength; j += 1) {
							if (j === 0) {
								td[j] = td[j].replace(/cmsms_tr[^\]]*\]\[cmsms_td[^\]]*\]/g, '');
							} else if (j === (jlength - 1)) {
								td[j] = td[j].replace(/\[\/cmsms_td\]/g, '');
							}
							
							
							fieldContent += '<div class="cmsms_table_cell cmsms_change_cell">' + td[j].replace(/\n/g, "<br />") + '</div>';
						}
						
						
						fieldContent += '<div class="cmsms_table_cell">' + 
								'<a href="#" class="cmsms_row_remove admin-icon-remove" title="' + cmsms_lightbox.delete_row + '"></a>' + 
							'</div>' + 
						'</div>';
					}
					
					
					fieldContent += '<div class="cmsms_table_row cmsms_table_row_bot">' + 
						'<div class="cmsms_table_cell cmsms_table_cell_bot"></div>';
					
					
					for (var l = 0, llength = trl.length - 1; l < llength; l += 1) {
						fieldContent += '<div class="cmsms_table_cell cmsms_table_cell_bot">' + 
							'<a href="#" class="cmsms_column_remove admin-icon-remove" title="' + cmsms_lightbox.delete_col + '"></a>' + 
						'</div>';
					}
					
					
					fieldContent += '<div class="cmsms_table_cell cmsms_table_cell_bot"></div>' + 
							'</div>' + 
						'</div>' + 
						'<textarea id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" class="cmsms_table_value">' + val + '</textarea>' + 
					'</div>';
					
					
					obj.methods.eventsArray.push('table');
					
					
					break;
				case 'link':
					var newLinks = val.split('||');
					
					
					fieldContent += '<div class="cmsms_link_parent">' + 
						'<ul class="cmsms_link_fields">';
					
					
					if (val !== '') {
						for (var i = 0, ilength = newLinks.length; i < ilength; i += 1) {
							var newLink = newLinks[i].split('|');
							
							
							fieldContent += '<li>' + 
								'<span class="cmsms_link_handle admin-icon-move"></span>' + 
								'<div class="cmsms_link_wrap">' + 
									'<span class="cmsms_link_text ' + 
									((typeof newLink[2] !== 'undefined') ? newLink[2].replace(/icon\{([^\}]*)\}/g, '$1') : '') + '">' + 
									((typeof newLink[0] !== 'undefined') ? newLink[0].replace(/title\{([^\}]*)\}/g, '$1') : '') + 
									((typeof newLink[1] !== 'undefined') ? '<span class="cmsms_link_hide_empty">' + newLink[1].replace(/link\{([^\}]*)\}/g, '$1') + '</span>' : '') + 
									'</span>' + 
								'</div>' + 
								'<a href="#" class="cmsms_link_del admin-icon-remove" title="' + cmsms_lightbox.remove + '"></a>' + 
								'<input type="hidden" id="cmsms_link_field_' + i + '" name="cmsms_link_field_' + i + '" class="cmsms_link_field" value="' + newLinks[i] + '" />' + 
							'</li>';
						}
					}
					
					
					fieldContent += '</ul>' + 
						'<a href="#" class="cmsms_link_add admin-icon-add"></a>' + 
						'<input type="hidden" id="' + key + '_' + obj.methods.uniqID + '" name="' + key + '_' + obj.methods.uniqID + '" class="cmsms_link_value" value="' + val + '" />' + 
					'</div>';
					
					
					obj.methods.eventsArray.push('link');
					
					
					break;
				default:
				}
				
				
				fieldContent += '</div>' + 
					'</div>' + 
				'</div>';
				
				
				return fieldContent;
			}, 
			saveContent : function (id, multiple) { 
				var shcd = obj.methods.body.find('#cmsmsBox_' + id).data('shortcode'), 
					link = obj.methods.body.find('#cmsmsBox_' + id).data('link'), 
					for_editor = obj.methods.body.find('#cmsmsBox_' + id).data('for_editor'), 
					contField = '', 
					attrs = {}, 
					attributes = '', 
					content = '', 
					shcdVisual = '', 
					newContent = '', 
					shortcode = '', 
					uploadContent = false;
				
				
				if (shcd === 'cmsms_row') {
					contField = cmsmsRow.content;
				} else if (shcd === 'cmsms_column') {
					contField = cmsmsColumn.content;
				} else if (multiple) {
					contField = cmsmsMultipleShortcodes[shcd].content;
				} else if (for_editor) {
					contField = cmsmsEditorShortcodes[shcd].content;
				} else if (link) {
					contField = cmsmsLinkShortcode.content;
				} else {
					contField = cmsmsShortcodes[shcd].content;
				}
				
				
				obj.methods.body.find('#cmsmsBox_' + id).find('.cmsmsBoxContInMid > div').each(function () { 
					if ($(this).is(':visible')) {
						var fieldID = $(this).data('id'), 
							fieldName = fieldID.replace('_' + id, '');
						
						
						switch ($(this).data('type')) { 
						case 'editor':
							if ($(this).find('> .cmsms_field #' + fieldID).val() !== '' || fieldName === contField) {
								if ($('#wp-' + fieldID + '-wrap').hasClass('html-active')) {
									$('#wp-' + fieldID + '-wrap').find('> .wp-editor-tools > a.switch-tmce').trigger('click');
								}
								
								
								tinyMCE.get(fieldID).save();
								
								
								if (fieldName !== contField) {
									attrs[fieldName] = switchEditors.pre_wpautop(privateMethods.sanitizeContent($(this).find('> .cmsms_field #' + fieldID).val()));
								} else {
									content = cmsmsContentComposer.methods.convertToContent(switchEditors.pre_wpautop($(this).find('> .cmsms_field #' + fieldID).val()));
								}
							}
							
							
							break;
						case 'input':
							if (link) {
								attrs[fieldName] = fieldName + '{' + privateMethods.sanitizeContent($(this).find('> .cmsms_field #' + fieldID).val()) + '}';
							} else if ($(this).find('> .cmsms_field #' + fieldID).val() !== '' || fieldName === contField) {
								if (fieldName !== contField) {
									attrs[fieldName] = privateMethods.sanitizeContent($(this).find('> .cmsms_field #' + fieldID).val());
								} else {
									content = $(this).find('> .cmsms_field #' + fieldID).val();
								}
							}
							
							
							break;
						case 'textarea':
							if ($(this).find('> .cmsms_field #' + fieldID).val() !== '' || fieldName === contField) {
								if (fieldName !== contField) {
									attrs[fieldName] = switchEditors.pre_wpautop(privateMethods.sanitizeContent($(this).find('> .cmsms_field #' + fieldID).val()));
								} else {
									content = $(this).find('> .cmsms_field #' + fieldID).val().replace(/\n/g, '<br />');
								}
							}
							
							
							break;
						case 'base64':
							if ($(this).find('> .cmsms_field #' + fieldID).val() !== '' || fieldName === contField) {
								if (fieldName !== contField) {
									attrs[fieldName] = privateMethods.base64Encode($(this).find('> .cmsms_field #' + fieldID).val());
								} else {
									content = privateMethods.base64Encode($(this).find('> .cmsms_field #' + fieldID).val());
								}
							}
							
							
							break;
						case 'select_multiple':
							var options = $(this).find('> .cmsms_field #' + fieldID + ' > option:selected'), 
								vals = '';
							
							
							if (options.length > 0) {
								for (var i = 0, ilength = options.length; i < ilength; i += 1) {
									vals += options.eq(i).val() + ',';
								}
								
								
								vals = vals.slice(0, -1);
								
								
								attrs[fieldName] = vals;
							}
							
							
							break;
						case 'upload':
							if ($(this).find('> .cmsms_field #' + fieldID).val() !== '' || fieldName === contField) {
								if (fieldName !== contField) {
									attrs[fieldName] = $(this).find('> .cmsms_field #' + fieldID).val();
								} else {
									var newImageArray = $(this).find('> .cmsms_field #' + fieldID).val().split('|');
									
									
									uploadContent = $(this).find('> .cmsms_field #' + fieldID).val();
									
									
									if (newImageArray.length > 1) {
										content = newImageArray[1];
									} else {
										content = newImageArray[0];
									}
								}
							}
							
							
							break;
						case 'gallery':
							if ($(this).find('> .cmsms_field #' + fieldID).val() !== '' || fieldName === contField) {
								if (fieldName !== contField) {
									attrs[fieldName] = $(this).find('> .cmsms_field #' + fieldID).val();
								} else {
									content = $(this).find('> .cmsms_field #' + fieldID).val();
								}
							}
							
							
							break;
						case 'radio':
							var radio = $(this).find('> .cmsms_field #' + fieldID + ' > .cmsms_check > input[type=radio]:checked');
							
							
							if (radio.length > 0) {
								attrs[fieldName] = radio.val();
							}
							
							
							break;
						case 'checkbox':
							var checkboxes = $(this).find('> .cmsms_field #' + fieldID + ' > .cmsms_check > label > input[type=checkbox]:checked'), 
								vals = '';
							
							
							if (checkboxes.length > 0) {
								for (var i = 0, ilength = checkboxes.length; i < ilength; i += 1) {
									vals += checkboxes.eq(i).val() + ',';
								}
								
								
								vals = vals.slice(0, -1);
								
								
								attrs[fieldName] = vals;
							}
							
							
							break;
						case 'rgba':
							if (link) {
								attrs[fieldName] = fieldName + '{' + $(this).find('> .cmsms_field #' + fieldID).val() + '|' + $(this).find('> .cmsms_field #' + fieldID + '_transp').val() + '}';
							} else if ($(this).find('> .cmsms_field #' + fieldID).val() !== '') {
								attrs[fieldName] = $(this).find('> .cmsms_field #' + fieldID).val() + '|' + $(this).find('> .cmsms_field #' + fieldID + '_transp').val();
							}
							
							
							break;
						case 'multiple':
							if ($(this).find('> .cmsms_field #' + fieldID).val() !== '') {
								content = $(this).find('> .cmsms_field #' + fieldID).val();
							} else {
								content = cmsmsShortcodes[shcd].def;
							}
							
							
							break;
						case 'table':
							if ($(this).find('> .cmsms_field #' + fieldID).val() !== '') {
								content = $(this).find('> .cmsms_field #' + fieldID).val().replace(/\n/g, '<br />');
							}
							
							
							break;
						default:
							if (link) {
								attrs[fieldName] = fieldName + '{' + $(this).find('> .cmsms_field #' + fieldID).val() + '}';
							} else if ($(this).find('> .cmsms_field #' + fieldID).val() !== '') {
								attrs[fieldName] = $(this).find('> .cmsms_field #' + fieldID).val();
							}
						}
					}
				} );
				
				
				setTimeout(function () { 
					if (link) {
						for (var k in attrs) {
							attributes += attrs[k] + '|';
						}
						
						
						shortcode = attributes.slice(0, -1);
						
						
						newContent = '<span class="cmsms_link_text ' + 
						((typeof attrs['icon'] !== 'undefined') ? attrs['icon'].replace(/icon\{([^\}]*)\}/g, '$1') : '') + '">' + 
						((typeof attrs['title'] !== 'undefined') ? attrs['title'].replace(/title\{([^\}]*)\}/g, '$1') : '') + 
						((typeof attrs['link'] !== 'undefined') ? '<span class="cmsms_link_hide_empty">' + attrs['link'].replace(/link\{([^\}]*)\}/g, '$1') + '</span>' : '') + 
						'</span>';
						
						
						privateMethods.loadLink(shortcode, newContent, id);
					} else if (shcd !== 'cmsms_row' && shcd !== 'cmsms_column') {
						if (multiple) {
							shcdVisual = cmsmsMultipleShortcodes[shcd].visual;
						} else if (for_editor) {
							shcdVisual = cmsmsEditorShortcodes[shcd].visual;
						} else {
							shcdVisual = cmsmsShortcodes[shcd].visual;
						}
						
						
						for (var k in attrs) {
							attributes += ' ' + k + '="' + attrs[k] + '"';
						}
						
						
						shortcode += '[' + shcd + attributes + ']';
						
						
						if (typeof shcdVisual === 'string' && !$.isEmptyObject(attrs)) {
							newContent = shcdVisual.replace(/\{\{\sdata\.([^\s]+)\s\}\}/g, function (str, data) { 
								for (var key in attrs) {
									if (data === contField) {
										return content;
									} else if (key === data) {
										return attrs[key];
									}
								}
								
								
								return '';
							} );
						} else {
							newContent = content;
						}
						
						
						if (uploadContent) {
							content = uploadContent;
						}
						
						
						if (multiple && !for_editor && $.inArray(shcd, cmsmsContentComposer.methods.pairMultipleShortcodes.split('|')) !== -1) {
							shortcode += content + '[/' + shcd + ']';
						} else if (!multiple && for_editor && $.inArray(shcd, cmsmsContentComposer.methods.pairEditorShortcodes.split('|')) !== -1) {
							shortcode += content + '[/' + shcd + ']';
						} else if (!multiple && !for_editor && $.inArray(shcd, cmsmsContentComposer.methods.pairShortcodes.split('|')) !== -1) {
							shortcode += content + '[/' + shcd + ']';
						}
						
						
						if (multiple && !cmsmsMultipleShortcodes[shcd].visual) {
							newContent = '<span class="cmsmsShortcodeTitle">' + cmsmsMultipleShortcodes[shcd].title + '</span>';
						} else if (for_editor && !cmsmsEditorShortcodes[shcd].visual) {
							newContent = '<span class="cmsmsShortcodeTitle">' + cmsmsEditorShortcodes[shcd].title + '</span>';
						} else if (!multiple && !for_editor && !cmsmsShortcodes[shcd].visual) {
							newContent = '<span class="cmsmsShortcodeTitle ' + cmsmsShortcodes[shcd].icon + '">' + cmsmsShortcodes[shcd].title + '</span>';
						}
						
						
						if (obj.methods.body.find('#cmsmsBox_' + id).data('editor') === undefined) {
							if (typeof shcdVisual === 'string') {
								var loadInterval = setInterval(function () { 
									if (newContent !== '') {
										clearInterval(loadInterval);
										
										
										if (multiple) {
											privateMethods.loadMultiple(shortcode, newContent, id);
										} else {
											privateMethods.loadContent(shortcode, newContent, id);
										}
									}
								}, 50);
							} else {
								privateMethods.loadContent(shortcode, newContent, id);
							}
						} else {
							obj.methods.closeLightbox('cmsmsBox_' + id);
							
							
							tinyMCE.get(obj.methods.body.find('#cmsmsBox_' + id).data('editor')).focus();
							
							
							window.tinyMCE.activeEditor.selection.setContent(shortcode);
						}
					} else {
						privateMethods.loadContent(attrs, false, id);
					}
				}, 150);
			}, 
			closeLightbox : function (id) { 
				if (obj.methods.body.find('#' + id).find('.cmsmsBoxContInMid .mceIframeContainer').length > 0) {
					tinyMCE.get(tinyMCE.activeEditor.editorId).focus();
					
					tinyMCE.execCommand('mceRemoveEditor', true, tinyMCE.activeEditor.editorId);
				}
				
				
				obj.methods.body.find('#' + id).removeClass('showBox');
				
				
				if (obj.methods.body.find('.cmsmsBoxOut').length < 2) {
					obj.methods.body.css( { 
						overflow : 'auto' 
					} );
				}
				
				
				if (obj.methods.body.find('.cmsmsBoxOut').length > 1) {
					obj.methods.uniqID = obj.methods.body.find('.cmsmsBoxOut').eq(-2).data('id');
				}
				
				
				setTimeout(function () { 
					privateMethods.destroyLightbox(id);
				}, 150);
			} 
		};
		
		// Private Methods
		privateMethods = { 
			attachEvents : function () { 
				obj.methods.lbCloseBut.bind('click', function () { 
					var id = privateMethods.getLbID(this);
					
					
					obj.methods.body.find('#' + id).addClass('preloadBox');
					
					
					obj.methods.closeLightbox(id);
					
					
					return false;
				} );
				
				
				obj.methods.lbCancelBut.bind('click', function () { 
					var id = privateMethods.getLbID(this);
					
					
					obj.methods.body.find('#' + id).addClass('preloadBox');
					
					
					obj.methods.closeLightbox(id);
					
					
					return false;
				} );
				
				
				if (obj.methods.options.backdropClose) {
					obj.methods.back.bind('click', function () { 
						var id = privateMethods.getLbID(this);
						
						
						obj.methods.body.find('#' + id).addClass('preloadBox');
						
						
						obj.methods.closeLightbox(id);
						
						
						return false;
					} );
				}
				
				
				obj.methods.lbSaveBut.bind('click', function () { 
					obj.methods.saveContent($(this).parents('.cmsmsBoxOut').data('id'), (($(this).parents('.cmsmsBoxOut').data('multiple')) ? true : false));
					
					
					return false;
				} );
				
				
				$(window).bind('resize', function () { 
					if (privateMethods.getWinWidth() < 930) {
						obj.methods.cont.addClass('resp');
					} else if (obj.methods.cont.hasClass('resp')) {
						obj.methods.cont.removeClass('resp');
					}
				} );
			}, 
			generateEditor : function (editorID) { 
				tinyMCE.execCommand('mceAddEditor', true, editorID);
				
				tinyMCE.get(editorID).focus();
				
				
				window.wpActiveEditor = editorID;
				
				
				quicktags( { 
					id : editorID 
				} );
				
				QTags.addButton( 
					'column', 
					'col', 
					'[one_first]', 
					'[/one_first]', 
					'', 
					'', 
					111, 
					true 
				);
				
				
				var containerWrap = $('#' + editorID).parents('.wp-' + editorID + '-container-wrap');
				
				
				containerWrap.find('.wp-switch-editor').removeAttr('onclick');
				
				
				if ($('#wp-' + editorID + '-wrap').hasClass('html-active')) {
					$('#wp-' + editorID + '-wrap').removeClass('html-active').addClass('tmce-active');
				}
				
				
				containerWrap.find('.switch-tmce').bind('click', function () { 
					containerWrap.find('.wp-editor-wrap').removeClass('html-active').addClass('tmce-active');
					
					
					var valContent = $(this).parents('.wp-' + editorID + '-container-wrap').find('textarea#' + editorID).val(), 
						val = switchEditors.wpautop(valContent);
					
					
					$('textarea#' + editorID).val(val);
					
					
					tinyMCE.execCommand('mceAddEditor', true, editorID);
					
					tinyMCE.get(editorID).focus();
				} );
				
				
				containerWrap.find('.switch-html').bind('click', function () { 
					containerWrap.find('.wp-editor-wrap').removeClass('tmce-active').addClass('html-active');
					
					
					tinyMCE.get(editorID).focus();
					
					tinyMCE.execCommand('mceRemoveEditor', true, editorID);
				} );
			}, 
			loadContent : function (data, content, id) { 
				var idx = obj.methods.body.find('#cmsmsBox_' + id).data('index').toString(), 
					index = (idx.indexOf('|') !== -1) ? idx.split('|') : idx;
				
				
				if (index.length === 3 && typeof index !== 'string') {
					obj.methods.el.find('> div.cmsms_row').eq(index[2]).find('> .innerRow > div.cmsms_column').eq(index[1]).find('> .innerColumn > div').eq(index[0]).find('> .innerShortcode > .innerCode').html(data);
					
					
					obj.methods.el.find('> div.cmsms_row').eq(index[2]).find('> .innerRow > div.cmsms_column').eq(index[1]).find('> .innerColumn > div').eq(index[0]).find('> .innerShortcode > .innerContent').html(content);
				} else if (index.length === 2 && typeof index !== 'string') {
					for (var key in cmsmsColumn.fields) {
						obj.methods.el.find('> div.cmsms_row').eq(index[1]).find('> .innerRow > div.cmsms_column').eq(index[0]).removeAttr('data-' . key).removeData(key);
					}
					
					
					for (var k in data) {
						obj.methods.el.find('> div.cmsms_row').eq(index[1]).find('> .innerRow > div.cmsms_column').eq(index[0]).data(k, data[k]);
					}
				} else if (typeof index === 'string') {
					for (var key in cmsmsRow.fields) {
						obj.methods.el.find('> div.cmsms_row').eq(index).removeAttr('data-' . key).removeData(key);
					}
					
					
					for (var k in data) {
						obj.methods.el.find('> div.cmsms_row').eq(index).data(k, data[k]);
					}
				} else {
					alert(cmsms_lightbox.error_on_page);
					
					
					return false;
				}
				
				
				obj.methods.body.find('#' + id).addClass('preloadBox');
				
				
				obj.methods.closeLightbox('cmsmsBox_' + id);
				
				
				setTimeout(function () { 
					cmsmsContentComposer.methods.updateContent();
				}, 150);
			}, 
			loadMultiple : function (data, content, id) { 
				var idx = obj.methods.body.find('#cmsmsBox_' + id).data('index');
				
				
				obj.methods.body.find('.cmsmsBoxOut').eq(-2).find('.cmsms_multiple_fields > div').eq(idx).find('> .innerCode').html(data.replace(/<\/p>\s+\[\//g, '</p>[/').replace(/\]\s+<p>/g, ']<p>').replace(/<\/p>\s+<([^\/])/g, '</p><$1'));
				
				
				obj.methods.body.find('.cmsmsBoxOut').eq(-2).find('.cmsms_multiple_fields > div').eq(idx).find('> .innerContent').html(content);
				
				
				obj.methods.closeLightbox('cmsmsBox_' + id);
				
				
				privateMethods.multiUpdate(obj.methods.body.find('.cmsmsBoxOut').eq(-2).data('id'));
			}, 
			loadLink : function (data, content, id) { 
				var idx = obj.methods.body.find('#cmsmsBox_' + id).data('index');
				
				
				obj.methods.body.find('.cmsmsBoxOut').eq(-2).find('.cmsms_link_fields > li').eq(idx).find('> .cmsms_link_field').val(data);
				
				
				obj.methods.body.find('.cmsmsBoxOut').eq(-2).find('.cmsms_link_fields > li').eq(idx).find('> .cmsms_link_wrap').html(content);
				
				
				obj.methods.closeLightbox('cmsmsBox_' + id);
				
				
				privateMethods.linkUpdate(obj.methods.body.find('.cmsmsBoxOut').eq(-2).data('id'));
			}, 
			destroyLightbox : function (id) { 
				obj.methods.body.find('#' + id).find('.cmsmsBoxContInMid > div').remove();
				
				
				obj.methods.body.find('#' + id).remove();
			}, 
			attachDependenceEvents : function () { 
				var id = '_' + obj.methods.uniqID, 
					shcd = obj.methods.body.find('#cmsmsBox' + id).data('shortcode'), 
					multi = obj.methods.body.find('#cmsmsBox' + id).data('multiple'), 
					for_editor = obj.methods.body.find('#cmsmsBox' + id).data('for_editor'), 
					link = obj.methods.body.find('#cmsmsBox' + id).data('link'), 
					newFields = [], 
					dependField = [], 
					dependFields = {};
				
				
				if (shcd !== 'cmsms_row' && shcd !== 'cmsms_column') {
					if (multi) {
						newFields = cmsmsMultipleShortcodes[shcd].fields;
					} else if (for_editor) {
						newFields = cmsmsEditorShortcodes[shcd].fields;
					} else if (link) {
						newFields = cmsmsLinkShortcode.fields;
					} else {
						newFields = cmsmsShortcodes[shcd].fields;
					}
				} else if (shcd === 'cmsms_row') {
					newFields = cmsmsRow.fields;
				} else {
					newFields = cmsmsColumn.fields;
				}
				
				
				for (var key in newFields) {
					if (typeof newFields[key].depend === 'string') {
						dependField = newFields[key].depend.split(':');
						
						
						if (typeof dependFields[dependField[0] + id] === 'object') {
							if (typeof dependFields[dependField[0] + id][dependField[1]] === 'undefined') {
								dependFields[dependField[0] + id][dependField[1]] = new Array(key + id);
							} else {
								dependFields[dependField[0] + id][dependField[1]].push(key + id);
							}
						} else {
							dependFields[dependField[0] + id] = {};
							
							
							dependFields[dependField[0] + id][dependField[1]] = new Array(key + id);
						}
					}
				}
				
				
				for (var k in dependFields) {
					var lightbox = obj.methods.body.find('#cmsmsBox' + id), 
						fieldParent = lightbox.find('div[data-id="' + k + '"]'), 
						fieldType = fieldParent.data('type');
					
					
					if (fieldType === 'select') {
						for (var x in dependFields[k]) {
							if (fieldParent.find('select#' + k).val() === x) {
								for (var i = 0, ilength = dependFields[k][x].length; i < ilength; i += 1) {
									lightbox.find('div[data-id="' + dependFields[k][x][i] + '"]').slideDown('fast');
								}
							}
						}
						
						
						fieldParent.find('select#' + k).bind('change', function (e) { 
							var newK = $(e.target).attr('id');
							
							
							for (var y in dependFields[newK]) {
								if ($(this).val() === y) {
									for (var j = 0, jlength = dependFields[newK][y].length; j < jlength; j += 1) {
										lightbox.find('div[data-id="' + dependFields[newK][y][j] + '"]').slideDown('fast');
									}
								} else {
									for (var l = 0, llength = dependFields[newK][y].length; l < llength; l += 1) {
										lightbox.find('div[data-id="' + dependFields[newK][y][l] + '"]').slideUp('fast');
									}
								}
							}
						} );
					} else if (fieldType === 'radio') {
						for (var x in dependFields[k]) {
							if (fieldParent.find('input[name="' + k + '"]:checked').val() === x) {
								for (var i = 0, ilength = dependFields[k][x].length; i < ilength; i += 1) {
									lightbox.find('div[data-id="' + dependFields[k][x][i] + '"]').slideDown('fast');
								}
							}
						}
						
						
						fieldParent.find('input[name="' + k + '"]').bind('change', function (e) { 
							var newK = $(e.target).attr('name');
							
							
							for (var y in dependFields[newK]) {
								if ($(this).val() === y) {
									for (var j = 0, jlength = dependFields[newK][y].length; j < jlength; j += 1) {
										lightbox.find('div[data-id="' + dependFields[newK][y][j] + '"]').slideDown('fast');
									}
								} else {
									for (var l = 0, llength = dependFields[newK][y].length; l < llength; l += 1) {
										lightbox.find('div[data-id="' + dependFields[newK][y][l] + '"]').slideUp('fast');
									}
								}
							}
						} );
					} else if (fieldType === 'checkbox') {
						for (var w in dependFields[k]) {
							if (fieldParent.find('input[type="checkbox"]:checked').val() === w) {
								for (var m = 0, mlength = dependFields[k][w].length; m < mlength; m += 1) {
									lightbox.find('div[data-id="' + dependFields[k][w][m] + '"]').slideDown('fast');
								}
							}
						}
						
						
						fieldParent.find('input[type="checkbox"]').bind('change', function (e) { 
							var newK = $(e.target).parents('div[data-id]').data('id');
							
							
							for (var y in dependFields[newK]) {
								if ($(this).is(':checked') && $(this).val() === y) {
									for (var j = 0, jlength = dependFields[newK][y].length; j < jlength; j += 1) {
										lightbox.find('div[data-id="' + dependFields[newK][y][j] + '"]').slideDown('fast');
									}
								} else {
									for (var l = 0, llength = dependFields[newK][y].length; l < llength; l += 1) {
										lightbox.find('div[data-id="' + dependFields[newK][y][l] + '"]').slideUp('fast');
									}
								}
							}
						} );
					} else if (fieldType === 'upload' || fieldType === 'input') {
						for (var s in dependFields[k]) {
							if (fieldParent.find('input#' + k).val() !== '') {
								for (var n = 0, nlength = dependFields[k][s].length; n < nlength; n += 1) {
									lightbox.find('div[data-id="' + dependFields[k][s][n] + '"]').slideDown('fast');
								}
							}
						}
						
						
						fieldParent.find('input#' + k).bind('change', function (e) { 
							var newK = $(e.target).attr('id');
							
							
							for (var y in dependFields[newK]) {
								if ($(this).val() !== '') {
									for (var j = 0, jlength = dependFields[newK][y].length; j < jlength; j += 1) {
										lightbox.find('div[data-id="' + dependFields[newK][y][j] + '"]').slideDown('fast');
									}
								} else {
									for (var l = 0, llength = dependFields[newK][y].length; l < llength; l += 1) {
										lightbox.find('div[data-id="' + dependFields[newK][y][l] + '"]').slideUp('fast');
									}
								}
							}
						} );
					}
				}
			}, 
			attachGeneratedEvents : function () { 
				// Type Shortcodes
				if ($.inArray('shortcodes', obj.methods.eventsArray) !== -1) {
					// Shortcode Choose
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_shortcodes ul li a').bind('click', function () { 
						var shcd = $(this).data('shortcode'), 
							prepend = $(this).parents('.cmsms_shortcodes').data('prepend'), 
							cmsms_editor = $(this).data('editor');
						
						
						if (obj.methods.colIndex) {
							cmsmsContentComposer.methods.addShortcode(shcd, obj.methods.colIndex, prepend);
							
							
							obj.methods.closeLightbox('cmsmsBox_' + obj.methods.uniqID);
						} else {
							var attrs = '',	
								contentPart = '', 
								elObj = {};
							
							
							if (cmsms_editor) {
								for (var k in cmsmsEditorShortcodes[shcd].fields) {
									if ( 
										k !== cmsmsEditorShortcodes[shcd].content && 
										cmsmsEditorShortcodes[shcd].fields[k].def !== ''
									) {
										attrs += ' ' + k + '="' + cmsmsEditorShortcodes[shcd].fields[k].def + '"';
									}
								}
								
								
								contentPart = cmsmsEditorShortcodes[shcd].pair ? cmsmsEditorShortcodes[shcd].def + '[/' + shcd + ']' : '';
							} else {
								for (var k in cmsmsShortcodes[shcd].fields) {
									if ( 
										k !== cmsmsShortcodes[shcd].content && 
										cmsmsShortcodes[shcd].fields[k].def !== ''
									) {
										attrs += ' ' + k + '="' + cmsmsShortcodes[shcd].fields[k].def + '"';
									}
								}
								
								
								contentPart = cmsmsShortcodes[shcd].pair ? cmsmsShortcodes[shcd].def + '[/' + shcd + ']' : '';
							}
							
							
							elObj = { 
								type : 			shcd, 
								index : 		obj.methods.colIndex, 
								content : 		'[' + shcd + attrs + ']' + contentPart, 
								editor : 		window.tinyMCE.activeEditor.id, 
								for_editor : 	(cmsms_editor ? true : false) 
							};
							
							
							obj.methods.closeLightbox('cmsmsBox_' + obj.methods.uniqID);
							
							
							setTimeout(function () { 
								obj.methods.openLightbox(elObj);
							}, 150);
						}
						
						
						return false;
					} );
				}
				
				// Type Select Multiple
				if ($.inArray('select_multiple', obj.methods.eventsArray) !== -1) {
					// Select Change
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_field_select_multiple select').bind('change', function () { 
						$(this).parents('.cmsms_field_select_multiple').find('.cmsms_cat_cancel').fadeIn('fast');
					} );
					
					// Cancel Select Choises
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_cat_cancel').bind('click', function () { 
						$(this).parents('.cmsms_field_select_multiple').find('select > option').removeProp('selected');
						
						
						$(this).fadeOut('fast');
						
						
						return false;
					} );
				}
				
				// Type Color
				if ($.inArray('color', obj.methods.eventsArray) !== -1) {
					// Color Picker
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_color_field').wpColorPicker( { 
						palettes : [ 
							'#000000', 
							'#ffffff', 
							'#4ecdc4', 
							'#ff6b6b', 
							'#556270', 
							'#aed957', 
							'#707070', 
							'#3d3d3d' 
						] 
					} );
				}
				
				// Type Range
				if ($.inArray('range', obj.methods.eventsArray) !== -1) {
					// Range Number Change
					$('#cmsmsBox_' + obj.methods.uniqID + ' input[type="range"]').bind('change', function () { 
						$(this).next('input[type=text]').val($(this).val());
					} );
				}
				
				// Type Upload
				if ($.inArray('upload', obj.methods.eventsArray) !== -1) {
					// Uploaded Image Remove
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_upload_cancel').bind('click', function () { 
						$(this).parent().fadeOut(500, function () {
							$(this).removeAttr('style').find('.cmsms_preview_image').attr('src', '');
							
							
							$(this).next().val('').trigger('change');
						} );
						
						
						return false;
					} );
				}
				
				// Type Gallery
				if ($.inArray('gallery', obj.methods.eventsArray) !== -1) {
					// Gallery Image Remove
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_gallery').on('click', '.cmsms_gallery_cancel', function () { 
						$(this).parents('li').fadeOut(500, function () {
							if ($(this).parents('ul').find('li').length < 2) {
								$(this).parents('ul').parent().find('.cmsms_upload_button').data( { 
									state : 	'gallery-library', 
									editing : 	false 
								} ).val(cmsms_lightbox.create_gallery);
							}
							
							
							$(this).remove();
							
							
							privateMethods.galUpdate(obj.methods.uniqID);
						} );
						
						
						return false;
					} );
					
					// Sort Gallery Images
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_gallery').sortable( { 
						items : '> li', 
						handle : '> img', 
						tolerance : 'pointer', 
						opacity : 0.85, 
						cursor : 'move', 
						update : function () { 
							privateMethods.galUpdate(obj.methods.uniqID);
						} 
					} );
				}
				
				// Type Multiple
				if ($.inArray('multiple', obj.methods.eventsArray) !== -1) {
					// Add Controls
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_multiple_fields > div').each(function () { 
						privateMethods.multiAddControls($(this));
					} );
					
					// Add New Element
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_multiple_parent > .cmsms_multi_add').bind('click', function () { 
						var shcd = $('#cmsmsBox_' + obj.methods.uniqID).data('shortcode').slice(0, -1), 
							multiFields = $(this).parents('.cmsms_multiple_parent').find('.cmsms_multiple_fields'), 
							attrs = '', 
							val = '', 
							html = undefined;
						
						
						for (var k in cmsmsMultipleShortcodes[shcd].fields) {
							if ( 
								cmsmsMultipleShortcodes[shcd].content !== k && 
								cmsmsMultipleShortcodes[shcd].fields[k].def !== ''
							) {
								attrs += ' ' + k + '="' + cmsmsMultipleShortcodes[shcd].fields[k].def + '"';
							}
						}
						
						
						val = '[' + shcd + attrs + ']' + (cmsmsMultipleShortcodes[shcd].pair ? cmsmsMultipleShortcodes[shcd].def + '[/' + shcd + ']' : '');
						
						
						html = $(cmsmsContentComposer.methods.convertShortcodes(val, shcd)).hide();
						
						
						multiFields.append(html);
						
						
						multiFields.find('> div:eq(-1)').slideDown('fast');
						
						
						privateMethods.multiAddControls(multiFields.find('> div:eq(-1)'));
						
						
						privateMethods.multiUpdate(obj.methods.uniqID);
						
						
						return false;
					} );
					
					// Edit Element
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_multiple_fields').on('click', '> div > .innerContent', function () { 
						var shcd = $('#cmsmsBox_' + obj.methods.uniqID).data('shortcode').slice(0, -1), 
							elObj = {};
						
						
						elObj = { 
							type : 		shcd, 
							index : 	$(this).parent().index(), 
							content : 	$(this).parent().find('.innerCode').html(), 
							multiple : 	true 
						};
						
						
						setTimeout(function () { 
							obj.methods.openLightbox(elObj);
						}, 150);
						
						
						return false;
					} );
					
					// Copy Element
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_multiple_fields').on('click', '> div > .cmsms_multi_copy', function () { 
						var el = 		$(this).parent(), 
							elClone = 	el.clone();
						
						
						el.after(elClone.hide());
						
						
						el.next().slideDown('fast', function () { 
							privateMethods.multiUpdate(obj.methods.uniqID);
						} );
						
						
						return false;
					} );
					
					// Delete Element
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_multiple_fields').on('click', '> div > .cmsms_multi_del', function () { 
						$(this).parent().slideUp('fast', function () { 
							$(this).remove();
							
							
							privateMethods.multiUpdate(obj.methods.uniqID);
						} );
						
						
						return false;
					} );
					
					// Sort Elements
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_multiple_fields').sortable( { 
						items : '> div', 
						handle : '> .cmsms_multi_handle', 
						containment : 'parent', 
						tolerance : 'pointer', 
						axis : 'y', 
						opacity : 0.85, 
						cursor : 'move', 
						update : function () { 
							privateMethods.multiUpdate(obj.methods.uniqID);
						} 
					} );
				}
				
				// Type Table
				if ($.inArray('table', obj.methods.eventsArray) !== -1) {
					// Apply Column Text Align
					privateMethods.applyColAlign();
					
					// Apply Row Type
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table .cmsms_table_row').each(function () { 
						if ($(this).is(':not(.cmsms_table_row_top)') && $(this).is(':not(.cmsms_table_row_bot)')) {
							var rowType = $(this).find('.cmsms_table_cell:eq(0) .cmsms_row_select').val();
							
							
							if (rowType !== '') {
								$(this).addClass('cmsms_table_row_' + rowType);
							}
							
							
							$(this).find('.cmsms_table_cell').filter(':not(:eq(0))').filter(':not(:eq(-1))').each(function () { 
								if (rowType === 'header') {
									$(this).addClass('.cmsms_table_cell_haeder');
								}
							} );
						}
					} );
					
					// Change Column Text Align
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table').on('change', '.cmsms_column_select', function () { 
						var index = $(this).parents('.cmsms_table_cell').index(), 
							colAlign = $(this).val();
						
						
						$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table .cmsms_table_row').each(function () { 
							if ($(this).is(':not(.cmsms_table_row_top)') && $(this).is(':not(.cmsms_table_row_bot)')) {
								$(this).find('.cmsms_table_cell').eq(index).removeClass('cmsms_table_cell_aligncenter cmsms_table_cell_alignright').addClass('cmsms_table_cell_align' + colAlign);
							}
						} );
						
						
						setTimeout(function () { 
							privateMethods.tableUpdate(obj.methods.uniqID);
						}, 150);
					} );
					
					// Change Row Type
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table').on('change', '.cmsms_row_select', function () { 
						var row = $(this).parents('.cmsms_table_row'), 
							rowType = $(this).val();
						
						
						row.removeClass('cmsms_table_row_header cmsms_table_row_footer').addClass('cmsms_table_row_' + rowType);
						
						
						row.find('.cmsms_table_cell').filter(':not(:eq(0))').filter(':not(:eq(-1))').each(function () { 
							if (rowType === 'header') {
								$(this).addClass('.cmsms_table_cell_haeder');
							}
						} );
						
						
						setTimeout(function () { 
							privateMethods.tableUpdate(obj.methods.uniqID);
						}, 150);
					} );
					
					// Edit Table Cell Text
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table').on('click', '.cmsms_table_cell.cmsms_change_cell', function () { 
						var cellText = $(this).html().replace(/<br\s?\/?>/g, "\n");
						
						
						$(this).removeClass('cmsms_change_cell').html('<textarea />').find('textarea').focus().html(cellText);
					} );
					
					// Change Table Cell Text
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table').on('focusout', '.cmsms_table_cell textarea', function () { 
						var textArea = $(this), 
							cellText = textArea.val().replace(/\n/g, "<br />");
						
						
						setTimeout(function () { 
							textArea.parents('.cmsms_table_cell').addClass('cmsms_change_cell').html(cellText);
							
							
							setTimeout(function () { 
								privateMethods.tableUpdate(obj.methods.uniqID);
							}, 150);
						}, 100);
					} );
					
					// Add New Table Row
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table_row_button').bind('click', function () { 
						var rowCols = $('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table .cmsms_table_row:eq(0) .cmsms_table_cell').filter(':not(:eq(0))').filter(':not(:eq(-1))'), 
							colsCount = rowCols.length, 
							newRow = '<div class="cmsms_table_row">' + 
							'<div class="cmsms_table_cell">' + 
								'<select id="cmsms_row_select_' + colsCount + '" name="cmsms_row_select_' + colsCount + '" class="cmsms_row_select">' + 
									'<option value="">' + cmsms_lightbox.default_row + '</option>' + 
									'<option value="header">' + cmsms_lightbox.header_row + '</option>' + 
									'<option value="footer">' + cmsms_lightbox.footer_row + '</option>' + 
								'</select>' + 
							'</div>';
						
						
						rowCols.each(function () { 
							newRow += '<div class="cmsms_table_cell cmsms_change_cell"></div>';
						} );
						
						
						newRow += '<div class="cmsms_table_cell">' + 
								'<a class="cmsms_row_remove admin-icon-remove" title="' + cmsms_lightbox.delete_row + '" href="#"></a>' + 
							'</div>' + 
						'</div>';
						
						
						$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table .cmsms_table_row_bot').before(newRow);
						
						
						privateMethods.applyColAlign();
						
						
						setTimeout(function () { 
							privateMethods.tableUpdate(obj.methods.uniqID);
						}, 150);
						
						
						return false;
					} );
					
					// Add New Table Column
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table_column_button').bind('click', function () { 
						var tableRows = $('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table .cmsms_table_row');
						
						
						tableRows.each(function () { 
							var lastCell = $(this).find('.cmsms_table_cell').eq(-1);
							
							
							if ($(this).hasClass('cmsms_table_row_top')) {
								var cellsCount = $(this).find('.cmsms_table_cell').length - 2;
								
								
								lastCell.before('<div class="cmsms_table_cell cmsms_table_cell_top">' + 
									'<select id="cmsms_column_select_' + cellsCount + '" name="cmsms_column_select_' + cellsCount + '" class="cmsms_column_select">' + 
										'<option value="">' + cmsms_lightbox.text_align_left + '</option>' + 
										'<option value="center">' + cmsms_lightbox.text_align_center + '</option>' + 
										'<option value="right">' + cmsms_lightbox.text_align_right + '</option>' + 
									'</select>' + 
								'</div>');
							} else if ($(this).hasClass('cmsms_table_row_bot')) {
								lastCell.before('<div class="cmsms_table_cell cmsms_table_cell_bot">' + 
									'<a class="cmsms_column_remove admin-icon-remove" title="' + cmsms_lightbox.delete_col + '" href="#"></a>' + 
								'</div>');
							} else {
								lastCell.before('<div class="cmsms_table_cell cmsms_change_cell"></div>');
							}
						} );
						
						
						setTimeout(function () { 
							privateMethods.tableUpdate(obj.methods.uniqID);
						}, 150);
						
						
						return false;
					} );
					
					// Delete Table Row
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table').on('click', '.cmsms_row_remove', function () { 
						$(this).parents('.cmsms_table_row').fadeOut('fast', function () { 
							$(this).remove();
							
							
							setTimeout(function () { 
								privateMethods.tableUpdate(obj.methods.uniqID);
							}, 150);
						} );
						
						
						return false;
					} );
					
					// Delete Table Column
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table').on('click', '.cmsms_column_remove', function () { 
						var colIndex = $(this).parents('.cmsms_table_cell').index();
						
						
						$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table .cmsms_table_row').each(function () { 
							$(this).find('.cmsms_table_cell').eq(colIndex).fadeOut('fast', function () { 
								$(this).remove();
							} );
						} );
						
						
						setTimeout(function () { 
							privateMethods.tableUpdate(obj.methods.uniqID);
						}, 150);
						
						
						return false;
					} );
				}
				
				// Type Link
				if ($.inArray('link', obj.methods.eventsArray) !== -1) {
					// Add New Element
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_link_parent > .cmsms_link_add').bind('click', function () { 
						var multiFields = $(this).parents('.cmsms_link_parent').find('.cmsms_link_fields'), 
							fieldsLength = multiFields.find('> li').length, 
							html = undefined;
						
						
						html = '<li>' + 
							'<span class="cmsms_link_handle admin-icon-move"></span>' + 
							'<div class="cmsms_link_wrap">' + 
								'<span class="cmsms_link_text"></span>' + 
							'</div>' + 
							'<a href="#" class="cmsms_link_del admin-icon-remove" title="' + cmsms_lightbox.remove + '"></a>' + 
							'<input type="hidden" id="cmsms_link_field_' + fieldsLength + '" name="cmsms_link_field_' + fieldsLength + '" class="cmsms_link_field" value="" />' + 
						'</li>';
						
						
						multiFields.append(html);
						
						
						multiFields.find('> li:eq(-1)').slideDown('fast');
						
						
						privateMethods.linkUpdate(obj.methods.uniqID);
						
						
						return false;
					} );
					
					// Edit Element
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_link_fields').on('click', '> li > .cmsms_link_wrap', function () { 
						var shcd = $('#cmsmsBox_' + obj.methods.uniqID).data('shortcode') + '_link', 
							elObj = {};
						
						
						elObj = { 
							type : 		shcd, 
							index : 	$(this).parents('li').index(), 
							content : 	$(this).parents('li').find('.cmsms_link_field').val(), 
							link : 		true 
						};
						
						
						setTimeout(function () { 
							obj.methods.openLightbox(elObj);
						}, 150);
						
						
						return false;
					} );
					
					// Delete Element
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_link_fields').on('click', '> li > .cmsms_link_del', function () { 
						$(this).parents('li').slideUp('fast', function () { 
							$(this).remove();
							
							
							privateMethods.linkUpdate(obj.methods.uniqID);
						} );
						
						
						return false;
					} );
					
					// Sort Elements
					$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_link_fields').sortable( { 
						items : '> li', 
						handle : '> .cmsms_link_handle', 
						containment : 'parent', 
						tolerance : 'pointer', 
						axis : 'y', 
						opacity : 0.85, 
						cursor : 'move', 
						update : function () { 
							privateMethods.linkUpdate(obj.methods.uniqID);
						} 
					} );
				}
			}, 
			getLbID : function (el) { 
				return $(el).parents('.cmsmsBoxOut').attr('id');
			}, 
			getUniqID : function () { 
				return (new Date().getTime()).toString(16);
			}, 
			getWinWidth : function () { 
				return $(window).width();
			}, 
			sanitizeContent : function (content) { 
				return (typeof content === 'string') ? content.replace(/\[/g, '').replace(/\]/g, '').replace(/\n/g, '&#60;br /&#62;').replace(/</g, '&#60;').replace(/>/g, '&#62;').replace(/\"/g, '&#8243;').replace(/\'/g, '&#8242;') : '';
			}, 
			unSanitizeContent : function (content) { 
				return (typeof content === 'string') ? content.replace(/&#60;br\s?\/?&#62;/g, "\n").replace(/&#8243;/g, '"').replace(/&#8242;/g, "'").replace(/<br\s?\/?>/g, "\n").replace(/\u2033/g, '"').replace(/\u2032/g, "'") : content;
			}, 
			base64Encode : function (content) { 
				return $.base64.encode(content);
			}, 
			base64Decode : function (content) { 
				return $.base64.decode(content);
			}, 
			multiAddControls : function (el) { 
				el.prepend('<span class="cmsms_multi_handle admin-icon-move" />');
				
				
				el.append('<a href="#" class="cmsms_multi_del admin-icon-remove" />');
				
				
				el.append('<a href="#" class="cmsms_multi_copy admin-icon-copy" />');
			}, 
			galUpdate : function (id) { 
				setTimeout(function () { 
					var newText = '';
					
					
					$('#cmsmsBox_' + id + ' .cmsms_gallery > li').each(function () { 
						newText += $(this).find('img').data('id') + '|';
						
						newText += $(this).find('img').attr('src') + ',';
					} );
					
					
					if (newText !== '') {
						newText = newText.slice(0, -1);
					} else {
						$('#cmsmsBox_' + id + ' .cmsms_gallery_images').trigger('change');
					}
					
					
					$('#cmsmsBox_' + id + ' .cmsms_gallery_images').val(newText);
				}, 150);
			}, 
			multiUpdate : function (id) { 
				setTimeout(function () { 
					var newText = '';
					
					
					$('#cmsmsBox_' + id + ' .cmsms_multiple_fields > div').each(function () { 
						newText += $(this).find('.innerCode').html();
					} );
					
					
					$('#cmsmsBox_' + id + ' .cmsms_multiple_value').text(newText);
				}, 150);
			}, 
			tableUpdate : function (id) { 
				setTimeout(function () { 
					var newText = '', 
						alignArray = [];
					
					
					$('#cmsmsBox_' + id + ' .cmsms_table > .cmsms_table_row.cmsms_table_row_top .cmsms_table_cell').filter(':not(:first-child)').filter(':not(:last-child)').each(function () { 
						alignArray.push($(this).find('select').val());
					} );
					
					
					$('#cmsmsBox_' + id + ' .cmsms_table > .cmsms_table_row').filter(':not(.cmsms_table_row_top)').filter(':not(.cmsms_table_row_bot)').each(function () { 
						var rowType = $(this).find('.cmsms_table_cell:eq(0) select').val();
						
						
						newText += '[cmsms_tr' + ((rowType !== '') ? ' type="' + rowType + '"' : '') + ']';
						
						
						$(this).find('.cmsms_table_cell').filter(':not(:eq(0))').filter(':not(:eq(-1))').each(function (n) { 
							newText += '[cmsms_td' + 
							((rowType === 'header') ? ' type="header"' : '') + 
							((alignArray[n] !== '') ? ' align="' + alignArray[n] + '"' : '') + 
							']' + $(this).html() + '[/cmsms_td]';
						} );
						
						
						newText += '[/cmsms_tr]';
					} );
					
					
					$('#cmsmsBox_' + id + ' .cmsms_table_value').text(newText);
				}, 150);
			}, 
			applyColAlign : function () { 
				$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table .cmsms_table_cell_top').each(function (id) { 
					if ($(this).html() !== '') {
						var colAlign = $(this).find('.cmsms_column_select').val();
						
						
						if (colAlign !== '') {
							$('#cmsmsBox_' + obj.methods.uniqID + ' .cmsms_table .cmsms_table_row').each(function () { 
								if ($(this).is(':not(.cmsms_table_row_top)') && $(this).is(':not(.cmsms_table_row_bot)')) {
									$(this).find('.cmsms_table_cell').eq(id).addClass('cmsms_table_cell_align' + colAlign);
								}
							} );
						}
					}
				} );
			}, 
			linkUpdate : function (id) { 
				setTimeout(function () { 
					var newText = '';
					
					
					$('#cmsmsBox_' + id + ' .cmsms_link_fields > li').each(function () { 
						newText += $(this).find('.cmsms_link_field').val() + '||';
					} );
					
					
					$('#cmsmsBox_' + id + ' .cmsms_link_value').val(newText.slice(0, -2));
				}, 150);
			} 
		};
		
		
		obj.methods.init();
	};
	
	// Plugin Start
	$.fn.cmsmsComposerLightbox = function (parameters) { 
		return this.each(function () { 
			if ($(this).data('cmsmsComposerLightbox')) { 
				return;
			}
			
			
			var cmsmsComposerLightbox = new ComposerLightbox(this, parameters);
			
			
			$(this).data('cmsmsComposerLightbox', cmsmsComposerLightbox);
		} );
	};
} )(jQuery);

