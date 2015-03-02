/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.1.1
 * 
 * Visual Content Composer jQuery Plugin
 * Created by CMSMasters
 * 
 */

 
(function ($) { 
	var ContentComposer = function (element, parameters) { 
		var defaults = { 
				editorID : 			'content', 
				composerButton : 	'#cmsms_content_composer_button' 
			}, 
			obj = this, 
			privateMethods = {};
		
		// Global Methods
		obj.methods = { 
			init : function () { 
				obj.methods.options = $.extend({}, defaults, parameters);
				
				
				obj.methods.el = $(element);
				
				obj.methods.elCont = obj.methods.el.parent();
				
				
				obj.methods.body = $('body');
				
				
				obj.methods.setVars();
				
				
				privateMethods.attachStaticEvents();
				
				
				privateMethods.composerAutoStart();
			}, 
			setVars : function () { 
				obj.methods.editorID = obj.methods.options.editorID;
				
				obj.methods.composerButton = $(obj.methods.options.composerButton);
				
				
				obj.methods.butCont = obj.methods.elCont.find('> .cmsms_composer_buttons_container');
				
				
				obj.methods.butElems = obj.methods.butCont.find('> .cmsms_composer_buttons_container_wrap');
				
				
				obj.methods.butTemp = obj.methods.butCont.find('> .cmsms_composer_templates_container_wrap');
				
				
				obj.methods.content = $('#' + obj.methods.editorID);
				
				
				obj.methods.editorHTML = false;
				
				obj.methods.shortcodes = [];
				
				
				obj.methods.composerURL = $('#cmsms_composer_url').val();
				
				
				obj.methods.composerShow = $('#cmsms_composer_show');
				
				obj.methods.composerFullScreen = $('#cmsms_composer_fullscreen');
				
				obj.methods.composerBegin = $('#cmsms_composer_begin');
				
				obj.methods.composerConfirm = $('#cmsms_composer_confirm');
				
				
				obj.methods.templates = obj.methods.butTemp.find('.cmsms_pattern_list > ul');
				
				
				obj.methods.messageSave = $('#cmsms_composer_message_saved');
				obj.methods.messageSaveAll = $('#cmsms_composer_message_saved_all');
				obj.methods.messageLoad = $('#cmsms_composer_message_added');
				obj.methods.messageDelete = $('#cmsms_composer_message_deleted');
				
				
				obj.methods.cmsmsShortcodes = '';
				obj.methods.pairShortcodes = '';
				obj.methods.unpairedShortcodes = '';
				
				obj.methods.pairMultipleShortcodes = '';
				
				obj.methods.pairEditorShortcodes = '';
				
				
				for (var key in cmsmsShortcodes) {
					obj.methods.cmsmsShortcodes += key + '|';
				}
				
				obj.methods.cmsmsShortcodes = obj.methods.cmsmsShortcodes.slice(0, -1);
				
				
				for (var key in cmsmsShortcodes) {
					if (cmsmsShortcodes[key].pair) {
						obj.methods.pairShortcodes += key + '|';
					}
				}
				
				obj.methods.pairShortcodes = obj.methods.pairShortcodes.slice(0, -1);
				
				
				for (var key in cmsmsShortcodes) {
					if (!cmsmsShortcodes[key].pair) {
						obj.methods.unpairedShortcodes += key + '|';
					}
				}
				
				obj.methods.unpairedShortcodes = obj.methods.unpairedShortcodes.slice(0, -1);
				
				
				for (var key in cmsmsMultipleShortcodes) {
					if (cmsmsMultipleShortcodes[key].pair) {
						obj.methods.pairMultipleShortcodes += key + '|';
					}
				}
				
				obj.methods.pairMultipleShortcodes = obj.methods.pairMultipleShortcodes.slice(0, -1);
				
				
				for (var key in cmsmsEditorShortcodes) {
					if (cmsmsEditorShortcodes[key].pair) {
						obj.methods.pairEditorShortcodes += key + '|';
					}
				}
				
				obj.methods.pairEditorShortcodes = obj.methods.pairEditorShortcodes.slice(0, -1);
			}, 
			composerToggle : function () { 
				if ($('#postdivrich').is(':visible')) {
					if ($('#wp-' + obj.methods.editorID + '-wrap').hasClass('html-active')) {
						obj.methods.editorHTML = true;
						
						
						switchEditors.go(obj.methods.editorID, 'tmce');
					} else {
						obj.methods.editorHTML = false;
					}
					
					
					obj.methods.parseContent(false);
					
					
					obj.methods.appendControls();
					
					
					$('#postdivrich').hide();
					
					$('#cmsms_composer_meta_box').show();
					
					
					obj.methods.composerButton.text(obj.methods.composerButton.data('editor'));
					
					
					obj.methods.composerShow.val('true');
					
					
					obj.methods.startObj();
					
					
					obj.methods.buildButtons();
					
					
					obj.methods.el.removeClass('deactivated');
					
					
					privateMethods.composerAutoFullScreen();
				} else {
					privateMethods.detachEvents();
					
					
					if (obj.methods.editorHTML) {
						obj.methods.editorHTML = false;
						
						
						switchEditors.go(obj.methods.editorID, 'html');
					}
					
					
					$('#postdivrich').show();
					
					$('#cmsms_composer_meta_box').hide();
					
					
					obj.methods.composerButton.text(obj.methods.composerButton.data('composer'));
					
					
					obj.methods.composerShow.val('false');
					
					
					obj.methods.el.addClass('deactivated').empty();
				}
			}, 
			parseContent : function (template) { 
				tinyMCE.get(obj.methods.editorID).save();
				
				
				var editorShortcodes = template ? template : switchEditors.pre_wpautop(obj.methods.content.val()), 
					newEditorShortcodes = '', 
					newContent = '', 
					newContentString = '', 
					rowsArray = [];
				
				// Set content line breaks
				newEditorShortcodes = editorShortcodes.replace(/(\[cmsms_row(?:\s[^\]]*)?\])\s?\[cmsms_column/g, "$1\n\n[cmsms_column").replace(/\[\/cmsms_column\]\s?\[\/cmsms_row]/g, "[/cmsms_column]\n\n[/cmsms_row]").replace(/\[\/cmsms_column\]\s?\[cmsms_column/g, "[/cmsms_column]\n\n[cmsms_column").replace(/(\[cmsms_column(?:\s[^\]]*)?\])\s?\[/g, "$1\n\n[").replace(/\]\s?\[\/cmsms_column]/g, "]\n\n[/cmsms_column]");
				
				// Rows split
				rowsArray = newEditorShortcodes.split(/(\[cmsms_row(?:\s[^\]]*)?\])([\s\S]*?)\[\/cmsms_row\]/g);
				
				
				for (var i = 0, ilength = rowsArray.length; i < ilength; i += 1) {
					if (/\[cmsms_row(?:\s.*)?\]/g.test(rowsArray[i])) {
						var rowAttrs = /\[cmsms_row(\s.*)?\]/g.exec(rowsArray[i]);
						
						
						i += 1;
						
						
						if (rowsArray[i] !== '') {
							newContentString = obj.methods.parseRow(rowsArray[i]);
						}
						
						
						if (newContentString === '') {
							newContentString = '<div class="cmsms_column"></div>';
						}
						
						
						newContent += '<div class="cmsms_row' + (template ? ' hideEl' : '') + '"' + ((rowAttrs[1] !== undefined) ? rowAttrs[1].replace(/\sdata_([^=]+)=/g, " data-$1=") : '') + '>' + newContentString + '</div>';
					} else if (rowsArray[i] !== '') {
						newContentString = obj.methods.parseRow(rowsArray[i]);
						
						
						if (newContentString !== '') {
							newContent += '<div class="cmsms_row' + (template ? ' hideEl' : '') + '">' + newContentString + '</div>';
						}
					}
				}
				
				
				if (!template) {
					obj.methods.el.empty();
					
					
					obj.methods.el.append(newContent);
				} else {
					if (obj.methods.composerBegin.is(':checked')) {
						obj.methods.el.prepend(newContent);
					} else {
						obj.methods.el.append(newContent);
					}
				}
				
				
				privateMethods.setColumnsWidth();
			}, 
			parseRow : function (row) { 
				var newColumn = '', 
					newColumnArray = [], 
					colOpen = /<div class="cmsms_column"\s?.*>/g, 
					newContentString = '';
				
				// Columns shortcodes to HTML conversion
				newColumn = row.replace(/[\s\S]*?\[cmsms_column(\s.*)?\]([\s\S]*?)\[\/cmsms_column\][\s\S]*?/g, '<div class="cmsms_column"$1>$2[/cmsms_column]').replace(/<div class="cmsms_column"(\s.*)?>([\s\S]*(?!<\/div class="cmsms_column"(\s.*)?>))\[\/cmsms_column\][\s\S]*(?!<\/div class="cmsms_column"(\s.*)?>)/g, '<div class="cmsms_column"$1>$2[/cmsms_column]');
				
				// Columns split
				newColumnArray = newColumn.replace(/\sdata_([^=]+)=/g, " data-$1=").split(/(<div class="cmsms_column"\s?.*>)([\s\S]*?)(\[\/cmsms_column\])/g);
				
				
				for (var j = 0, jlength = newColumnArray.length; j < jlength; j += 1) {
					if ( 
						newColumnArray[j] !== '' && 
						newColumnArray[j] !== "\n\n" && 
						newColumnArray[j] !== /\s+/g 
					) {
						// If column open div
						if (colOpen.test(newColumnArray[j])) {
							newContentString += newColumnArray[j];
						// If column close tag
						} else if (/^\[\/cmsms_column\]/g.test(newColumnArray[j])) {
							newContentString += '</div>';
						} else {
							// If next element not column div or close div
							if (colOpen.test(newColumnArray[j - 1]) && /^\[\/cmsms_column\]/g.test(newColumnArray[j + 1])) {
								newContentString += obj.methods.convertShortcodes(newColumnArray[j], false);
							} else {
								newContentString += '<div class="cmsms_column">' + obj.methods.convertShortcodes(newColumnArray[j], false) + '</div>';
							}
						}
					}
				}
				
				
				return newContentString;
			}, 
			convertShortcodes : function (text, shcd) { 
				var newText = '', 
					newTextArray = [], 
					shcdTrigger = false, 
					tagMemory = '', 
					newInnerContent = '', 
					newInnerShortcode = '', 
					innerShCdsCount = 0, 
					reCmsmsShCds = new RegExp("(\\[(?:\\/)?(?:" + ((shcd) ? shcd : obj.methods.cmsmsShortcodes) + ")(?:\\s\\w+=[\"'][^\"']+[\"'])*\\])", "g"), 
					reCmsmsPairShCds = new RegExp("\\[(" + ((shcd && cmsmsMultipleShortcodes[shcd].pair) ? shcd : obj.methods.pairShortcodes) + ")(?:\\s\\w+=[\"'][^\"']+[\"'])*\\]", "g"), 
					reCmsmsPairShCd = new RegExp("\\[(" + ((shcd && cmsmsMultipleShortcodes[shcd].pair) ? shcd : obj.methods.pairShortcodes) + ")\\s?.*\\]", "g"), 
					reCmsmsUnpairedShCd = new RegExp("(\\[(" + ((shcd && !cmsmsMultipleShortcodes[shcd].pair) ? shcd : obj.methods.unpairedShortcodes) + ")\\s?.*\\])", "g");
				
				// Shortcodes split
				newTextArray = text.split(reCmsmsShCds);
				
				
				if (newTextArray.length > 1) {
					for (var i = 0, ilength = newTextArray.length; i < ilength; i += 1) {
						var reCmsmsPairShCdsTest = reCmsmsPairShCds.test(newTextArray[i]);
						
						
						if (newTextArray[i] !== '' && newTextArray[i] !== "\n\n") {
							if (shcdTrigger === true) {
								var reTagPlus = new RegExp("\\[" + tagMemory + "(?:\\s\\w+=[\"'][^\"']+[\"'])*\\]", "g");
								
								
								if (reTagPlus.test(newTextArray[i])) {
									innerShCdsCount += 1;
									
									
									newInnerContent += newTextArray[i];
								} else if (newTextArray[i] === '[/' + tagMemory + ']' && innerShCdsCount > 0) {
									innerShCdsCount -= 1;
									
									
									newInnerContent += newTextArray[i];
								} else if (newTextArray[i] === '[/' + tagMemory + ']' && innerShCdsCount < 1) {
									var tagAttrsArray = newInnerShortcode.slice(tagMemory.length + 2, -2).split('" '), 
										tagAttrsLength = tagAttrsArray.length, 
										tagAttr = [], 
										tagAttrs = {}, 
										shcdVisual = (shcd) ? cmsmsMultipleShortcodes[tagMemory].visual : cmsmsShortcodes[tagMemory].visual, 
										tagContent = newInnerContent, 
										visualContent = '';
									
									
									if (tagAttrsLength > 0 && tagAttrsArray[0] !== '') {
										for (var j = 0; j < tagAttrsLength; j += 1) {
											tagAttr = tagAttrsArray[j].split('="');
											
											
											tagAttrs[tagAttr[0]] = tagAttr[1];
										}
									}
									
									
									if (typeof shcdVisual === 'string') {
										visualContent = shcdVisual.replace(/\{\{\sdata\.([^\s]+)\s\}\}/g, function (str, data) { 
											if (data === ((shcd) ? cmsmsMultipleShortcodes[tagMemory].content : cmsmsShortcodes[tagMemory].content)) {
												if (((shcd) ? cmsmsMultipleShortcodes[tagMemory].fields[data].type : cmsmsShortcodes[tagMemory].fields[data].type) === 'upload') {
													var newImgLink = tagContent.split('|');
													
													
													return ((newImgLink.length > 1) ? newImgLink[1] : newImgLink[0]);
												} else {
													if ( 
														(shcd && cmsmsMultipleShortcodes[tagMemory].fields[data].type === 'editor') || 
														(!shcd && cmsmsShortcodes[tagMemory].fields[data].type === 'editor') 
													) {
														return obj.methods.convertToContent(tagContent);
													} else {
														return tagContent;
													}
												}
											}
											
											
											for (var key in tagAttrs) {
												if (key === data && data !== ((shcd) ? cmsmsMultipleShortcodes[tagMemory].content : cmsmsShortcodes[tagMemory].content)) {
													return tagAttrs[key];
												}
											}
											
											
											return '';
										} );
									} else if (shcdVisual) {
										if (shcd) {
											visualContent = obj.methods.convertToContent(tagContent);
										} else {
											visualContent = (!cmsmsShortcodes[tagMemory].multiple) ? obj.methods.convertToContent(tagContent) : '<span class="cmsmsShortcodeTitle ' + cmsmsShortcodes[tagMemory].icon + '">' + cmsmsShortcodes[tagMemory].title + '</span>';
										}
									} else {
										visualContent = '<span class="cmsmsShortcodeTitle ' + cmsmsShortcodes[tagMemory].icon + '">' + cmsmsShortcodes[tagMemory].title + '</span>';
									}
									
									
									if (shcd && cmsmsMultipleShortcodes[tagMemory].fields[cmsmsMultipleShortcodes[tagMemory].content].type === 'editor') {
										newInnerShortcode += obj.methods.convertToContent(newInnerContent.replace(/<p([^>]*)><br\s*\/?>\s*/g, '<p$1>').replace(/<\/p><br\s*\/?>\s*/g, '</p>')).replace(/<p([^>]*)>\s*/g, '<p$1>').replace(/\s*<p[^>]*><br\s?\/?><\/p>/g, '') + newTextArray[i];
									} else if (!shcd && cmsmsShortcodes[tagMemory].fields[cmsmsShortcodes[tagMemory].content].type === 'editor') {
										newInnerShortcode += obj.methods.convertToContent(newInnerContent.replace(/<p([^>]*)><br\s*\/?>\s*/g, '<p$1>').replace(/<\/p><br\s*\/?>\s*/g, '</p>')).replace(/<p([^>]*)>\s*/g, '<p$1>').replace(/\s*<p[^>]*><br\s?\/?><\/p>/g, '') + newTextArray[i];
									} else if (!shcd && cmsmsShortcodes[tagMemory].fields[cmsmsShortcodes[tagMemory].content].type === 'multiple') {
										var shortTagRegExp1 = new RegExp("<p[^>]*>(\\[" + tagMemory.slice(0, -1) + "(?:\\s\\w+=[\"'][^\"']+[\"'])*\\])", "g"), 
											shortTagRegExp2 = new RegExp("(\\[" + tagMemory.slice(0, -1) + "(?:\\s\\w+=[\"'][^\"']+[\"'])*\\])<\\/p>", "g"), 
											shortTagRegExp3 = new RegExp("<p[^>]*>(\\[\\/" + tagMemory.slice(0, -1) + "\\])", "g"), 
											shortTagRegExp4 = new RegExp("(\\[\\/" + tagMemory.slice(0, -1) + "\\])<\\/p>\\s*", "g");
										
										
										newInnerShortcode += obj.methods.convertToContent(newInnerContent.replace(/<p([^>]*)><br\s*\/?>\s*/g, '<p$1>').replace(/<\/p><br\s*\/?>\s*/g, '</p>')).replace(/<p([^>]*)>\s*/g, '<p$1>').replace(/\s*<p[^>]*><br\s?\/?><\/p>/g, '').replace(shortTagRegExp1, '$1').replace(shortTagRegExp2, '$1').replace(shortTagRegExp3, '$1').replace(shortTagRegExp4, '$1') + newTextArray[i];
									} else {
										newInnerShortcode += newInnerContent + newTextArray[i];
									}
									
									
									newText += visualContent + '</div>' + 
										'<div class="innerCode">' + newInnerShortcode + '</div>' + 
									'</div>';
									
									
									newInnerContent = '';
									
									newInnerShortcode = '';
									
									
									shcdTrigger = false;
								} else {
									newInnerContent += newTextArray[i];
								}
							} else if (newTextArray[i].slice(0, 1) === '[') {
								if (reCmsmsPairShCdsTest) {
									shcdTrigger = true;
									
									
									newInnerShortcode += newTextArray[i];
									
									
									tagMemory = newTextArray[i].replace(reCmsmsPairShCd, '$1');
									
									
									newText += newTextArray[i].replace(reCmsmsPairShCd, '<div class="$1">' + 
										'<div class="innerContent">');
								} else {
									newText += newTextArray[i].replace(reCmsmsUnpairedShCd, function (str, re1, re2) { 
										return '<div class="' + re2 + '">' + 
											'<div class="innerContent"><span class="cmsmsShortcodeTitle' + ((shcd) ? '' : ' ' + cmsmsShortcodes[re2].icon) + '">' + ((shcd) ? cmsmsMultipleShortcodes[re2].title : cmsmsShortcodes[re2].title) + '</span></div>' + 
											'<div class="innerCode">' + obj.methods.convertToContent(re1) + '</div>' + 
										'</div>';
									} );
								}
							} else {
								newText += '<div class="cmsms_text">' + 
									'<div class="innerContent">' + obj.methods.convertToContent(newTextArray[i]) + '</div>' + 
									'<div class="innerCode">[cmsms_text]' + obj.methods.convertToContent(newTextArray[i]) + '[/cmsms_text]</div>' + 
								'</div>';
							}
						}
					}
				} else {
					newText = '<div class="cmsms_text">' + 
						'<div class="innerContent">' + obj.methods.convertToContent(newTextArray[0]) + '</div>' + 
						'<div class="innerCode">[cmsms_text]' + obj.methods.convertToContent(newTextArray[0]) + '[/cmsms_text]</div>' + 
					'</div>';
				}
				
				
				return newText;
			}, 
			resetBlocks : function () { 
				obj.methods.rows = obj.methods.el.find('> div.cmsms_row');
				
				obj.methods.cols = (obj.methods.rows.find('> div.innerRow').length > 0) ? obj.methods.rows.find('> div.innerRow > div.cmsms_column') : obj.methods.rows.find('> div.cmsms_column');
				
				obj.methods.shcds = (obj.methods.cols.find('> div.innerColumn').length > 0) ? obj.methods.cols.find('> div.innerColumn > div') : obj.methods.cols.find('> div');
			}, 
			appendControls : function () { 
				obj.methods.resetBlocks();
				
				
				obj.methods.rows.each(function () { 
					obj.methods.appendRowControl($(this));
				} );
				
				
				obj.methods.cols.each(function () { 
					obj.methods.appendColumnControl($(this));
				} );
				
				
				obj.methods.shcds.each(function () { 
					obj.methods.appendShCdControl($(this));
				} );
			}, 
			appendRowControl : function (el) { 
				var cols = el.find('> div'), 
					colsCount = cols.length, 
					colsLayout = '';
				
				
				for (var i = 0; i < colsCount; i += 1) {
					colsLayout += cols.eq(i).data('width') + '+';
				}
				
				
				colsLayout = colsLayout.slice(0, -1);
				
				
				el.wrapInner('<div class="innerRow" />').prepend('<div class="innerHead">' + 
					'<span>' + cmsmsRow.title + '</span>' + 
					'<a href="#" class="cmsmsDelBut admin-icon-remove" title="' + cmsms_composer.remove_section + '" />' + 
					'<a href="#" class="cmsmsCopyBut admin-icon-copy" title="' + cmsms_composer.clone_section + '" />' + 
					'<a href="#" class="cmsmsEditBut admin-icon-edit" title="' + cmsms_composer.edit_section + '" />' + 
					'<ul class="cmsmsColumnButs">' + 
						'<li' + ((colsLayout === '1/1') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-11" data-width="1/1" title="1/1" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '1/2+1/2') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-1212" data-width="1/2+1/2" title="1/2 + 1/2" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '1/3+2/3') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-1323" data-width="1/3+2/3" title="1/3 + 2/3" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '2/3+1/3') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-2313" data-width="2/3+1/3" title="2/3 + 1/3" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '1/4+3/4') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-1434" data-width="1/4+3/4" title="1/4 + 3/4" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '3/4+1/4') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-3414" data-width="3/4+1/4" title="3/4 + 1/4" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '1/3+1/3+1/3') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-131313" data-width="1/3+1/3+1/3" title="1/3 + 1/3 + 1/3" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '1/2+1/4+1/4') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-121414" data-width="1/2+1/4+1/4" title="1/2 + 1/4 + 1/4" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '1/4+1/2+1/4') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-141214" data-width="1/4+1/2+1/4" title="1/4 + 1/2 + 1/4" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '1/4+1/4+1/2') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-141412" data-width="1/4+1/4+1/2" title="1/4 + 1/4 + 1/2" />' + 
						'</li>' + 
						'<li' + ((colsLayout === '1/4+1/4+1/4+1/4') ? ' class="current"' : '') + '>' + 
							'<a href="#" class="admin-icon-column-14141414" data-width="1/4+1/4+1/4+1/4" title="1/4 + 1/4 + 1/4 + 1/4" />' + 
						'</li>' + 
					'</ul>' + 
				'</div>');
			}, 
			appendColumnControl : function (el) { 
				el.wrapInner('<div class="innerColumn" />').prepend('<div class="innerHead">' + 
					'<span>' + privateMethods.converClass(el) + '</span>' + 
					'<a href="#" class="cmsmsAddBut admin-icon-add" title="' + cmsms_composer.add_shortcode + '" />' + 
					'<a href="#" class="cmsmsEditBut admin-icon-edit" title="' + cmsms_composer.edit_column + '" />' + 
				'</div>').find('.innerColumn').append('<a href="#" class="cmsmsAddBut admin-icon-add" title="' + cmsms_composer.add_shortcode + '" />');
			}, 
			appendShCdControl : function (el) { 
				el.wrapInner('<div class="innerShortcode" />').prepend('<div class="innerHead">' + 
					'<a href="#" class="cmsmsDelBut admin-icon-remove" title="' + cmsms_composer.remove_shortcode + '" />' + 
					'<a href="#" class="cmsmsCopyBut admin-icon-copy" title="' + cmsms_composer.clone_shortcode + '" />' + 
					'<a href="#" class="cmsmsEditBut admin-icon-edit" title="' + cmsms_composer.edit_shortcode + '" />' + 
				'</div>').append('<a href="#" class="cmsmsEditShortcodeBut admin-icon-edit" />');
			}, 
			startObj : function () { 
				obj.methods.resetBlocks();
				
				
				obj.methods.el.selectable( { 
					filter : '> div.cmsms_row', 
					cancel : 'a, .innerHead, .cmsms_text, .cmsms_icon_box, .ui-sortable-helper, .ui-sortable-placeholder', 
					selecting : function () { 
						obj.methods.butTemp.find('.cmsms_pattern_save').css( { 
							opacity : 1, 
							visibility : 'visible' 
						} );
					}, 
					stop : function () { 
						var selectedList = obj.methods.el.find('> div.cmsms_row.ui-selected');
						
						
						if (selectedList.length < 1) {
							obj.methods.butTemp.find('.cmsms_pattern_save').css( { 
								opacity : 0, 
								visibility : 'hidden' 
							} );
						}
					} 
				} );
				
				
				obj.methods.el.droppable( { 
					accept : ':not(.ui-sortable-helper)', 
					tolerance : 'pointer', 
					drop : function (event, ui) { 
						if (!ui.draggable.hasClass('iris-square-value')) {
							if (event.originalEvent.type === 'mouseup') {
								if (ui.draggable.hasClass('cmsms_row')) {
									var rowAttrs = '';
									
									
									for (var k in cmsmsRow.fields) {
										if (cmsmsRow.fields[k].def !== '') {
											rowAttrs += ' data-' + k + '="' + cmsmsRow.fields[k].def + '"';
										}
									}
									
									
									ui.draggable.html('<div class="cmsms_row cmsms_dropped hideEl"' + rowAttrs + '>' + 
										'<div class="cmsms_column one_first" data-width="1/1" />' + 
									'</div>');
									
									
									setTimeout(function () { 
										ui.draggable.find('.cmsms_column').parent().unwrap('a.' + ui.draggable.data('shortcode'));
										
										
										if (obj.methods.el.find('> .cmsms_dropped').length > 0) {
											obj.methods.appendRowControl(obj.methods.el.find('> .cmsms_dropped'));
											
											
											obj.methods.appendColumnControl(obj.methods.el.find('> .cmsms_dropped .cmsms_column'));
											
											
											obj.methods.el.find('> .cmsms_dropped').removeClass('cmsms_dropped');
											
											
											setTimeout(function () { 
												obj.methods.el.find('> .hideEl').addClass('showEl');
											
											
												setTimeout(function () { 
													obj.methods.el.find('> .hideEl').removeClass('hideEl showEl');
													
													
													setTimeout(function () { 
														obj.methods.makeRowsDroppable();
														
														
														obj.methods.updateContent(false);
													}, 150);
												}, 300);
											}, 100);
										}
									}, 100);
								} else {
									var out = '', 
										attrs = '', 
										rowAttrs = '', 
										shcdContField = cmsmsShortcodes[ui.draggable.data('shortcode')].content, 
										shcdDef = (ui.draggable.data('pair') && shcdContField) ? cmsmsShortcodes[ui.draggable.data('shortcode')].fields[shcdContField].def : false, 
										shcdDefNew = '', 
										parent = $(ui.draggable[0].parentNode);
									
									
									if (typeof cmsmsShortcodes[ui.draggable.data('shortcode')].visual === 'string') {
										shcdDefNew = cmsmsShortcodes[ui.draggable.data('shortcode')].visual.replace(/\{\{\sdata\.([^\s]+)\s\}\}/g, function (str, data) { 
											return cmsmsShortcodes[ui.draggable.data('shortcode')].fields[data].def;
										} );
									}
									
									
									for (var k in cmsmsShortcodes[ui.draggable.data('shortcode')].fields) {
										if ( 
											cmsmsShortcodes[ui.draggable.data('shortcode')].content !== k && 
											cmsmsShortcodes[ui.draggable.data('shortcode')].fields[k].def !== '' 
										) {
											attrs += ' ' + k + '="' + cmsmsShortcodes[ui.draggable.data('shortcode')].fields[k].def + '"';
										}
									}
									
									
									for (var k in cmsmsRow.fields) {
										if (cmsmsRow.fields[k].def !== '') {
											rowAttrs += ' data-' + k + '="' + cmsmsRow.fields[k].def + '"';
										}
									}
									
									
									if (parent.is(':not(.innerColumn)')) {
										out += '<div class="cmsms_row cmsms_dropped hideEl"' + rowAttrs + '>' + 
											'<div class="cmsms_column one_first" data-width="1/1">';
									}
									
									
									out += '<div class="' + ui.draggable.data('shortcode') + ((parent.is('.innerColumn')) ? ' cmsms_dropped hideEl' : '') + '">' + 
										'<div class="innerContent">' + 
											((ui.draggable.data('pair') && typeof cmsmsShortcodes[ui.draggable.data('shortcode')].visual === 'string') ? ((shcdDefNew !== '') ? shcdDefNew : shcdDef) : '<span class="cmsmsShortcodeTitle ' + cmsmsShortcodes[ui.draggable.data('shortcode')].icon + '">' + cmsmsShortcodes[ui.draggable.data('shortcode')].title + '</span>') + 
										'</div>' + 
										'<div class="innerCode">' + 
											'[' + ui.draggable.data('shortcode') + attrs + ']' + (ui.draggable.data('pair') ? shcdDef + '[/' + ui.draggable.data('shortcode') + ']' : '') + 
										'</div>' + 
									'</div>';
									
									
									if (parent.is(':not(.innerColumn)')) {
										out += '</div>' + 
										'</div>';
									}
									
									
									ui.draggable.html(out);
									
									
									setTimeout(function () { 
										if (parent.is('.innerColumn')) {
											ui.draggable.find('.cmsms_dropped').unwrap('a.' + ui.draggable.data('shortcode'));
										} else {
											ui.draggable.find('.cmsms_dropped').unwrap('a.cmsms_row');
										}
										
										
										if (obj.methods.el.find('.cmsms_dropped').length > 0) {
											if (parent.is('.innerColumn')) {
												obj.methods.appendShCdControl(obj.methods.el.find('.cmsms_dropped'));
											} else {
												obj.methods.appendRowControl(obj.methods.el.find('> .cmsms_dropped'));
												
												
												obj.methods.appendColumnControl(obj.methods.el.find('> .cmsms_dropped .cmsms_column'));
												
												
												obj.methods.appendShCdControl(obj.methods.el.find('> .cmsms_dropped .cmsms_column > .innerColumn > div'));
											}
											
											
											obj.methods.el.find('.cmsms_dropped').removeClass('cmsms_dropped');
											
											
											setTimeout(function () { 
												obj.methods.el.find('.hideEl').addClass('showEl');
											
											
												setTimeout(function () { 
													if (parent.is('.innerColumn')) {
														privateMethods.moveAddButton(obj.methods.el.find('.hideEl').parents('.innerColumn'));
													}
													
													
													obj.methods.el.find('.hideEl').removeClass('hideEl showEl');
													
													
													setTimeout(function () { 
														obj.methods.makeRowsDroppable();
														
														
														obj.methods.makeColumnsSortable();
														
														
														obj.methods.updateContent(false);
													}, 150);
												}, 300);
											}, 100);
										}
									}, 100);
								}
							} else if ($(ui.draggable[0].parentNode).is('.innerColumn')) {
								ui.draggable.remove();
							}
						}
					} 
				} );
				
				
				obj.methods.el.sortable( { 
					items : '> div', 
					handle : '> .innerHead', 
					tolerance : 'pointer', 
					axis : 'y', 
					opacity : 0.85, 
					cursor : 'move', 
					update : function () { 
						setTimeout(function () { 
							obj.methods.updateContent(false);
						}, 150);
					} 
				} );
				
				
				obj.methods.makeRowsDroppable();
				
				
				privateMethods.attachEvents();
			}, 
			makeRowsDroppable : function () { 
				obj.methods.resetBlocks();
				
				
				obj.methods.rows.find('> .innerRow').sortable( { 
					items : '> div', 
					handle : '> .innerHead', 
					containment : 'parent', 
					tolerance : 'pointer', 
					axis : 'x', 
					opacity : 0.85, 
					cursor : 'move', 
					update : function () { 
						setTimeout(function () { 
							obj.methods.updateContent(false);
						}, 150);
					} 
				} );
				
				
				obj.methods.makeColumnsSortable();
			}, 
			makeColumnsSortable : function () { 
				obj.methods.resetBlocks();
				
				
				obj.methods.cols.find('> .innerColumn').sortable( { 
					items : '> div', 
					handle : '> .innerHead', 
					opacity : 0.85, 
					cursor : 'move', 
					connectWith : '.innerColumn', 
					cursorAt : { 
						left : 75 
					}, 
					start : function (event, ui) { 
						$(ui.item).width(300).addClass('cmsms_move_add');
						
						
						$(ui.item).find('.innerShortcode').height(22);
					}, 
					stop : function (event, ui) { 
						privateMethods.moveAddButton(obj.methods.el.find('.cmsms_move_add').parents('.innerColumn'));
						
						
						$(ui.item).removeClass('cmsms_move_add').find('.innerShortcode').removeAttr('style');
					}, 
					update : function () { 
						setTimeout(function () { 
							obj.methods.updateContent(false);
						}, 150);
					} 
				} );
			}, 
			buildButtons : function () { 
				if (obj.methods.butElems.find('> ul').length < 1) {
					var out = '<ul>' + 
						'<li>' + 
							'<a href="#" class="cmsms_row ' + cmsmsRow.icon + '" data-shortcode="cmsms_row" title="' + cmsmsRow.button + '">' + 
								'<span>' + cmsmsRow.button + '</span>' + 
							'</a>' + 
						'</li>';
					
					
					for (var key in cmsmsShortcodes) {
						out += '<li>' + 
							'<a href="#" class="' + key + ' ' + cmsmsShortcodes[key].icon + '" title="' + cmsmsShortcodes[key].title + '" data-shortcode="' + key + '" data-pair="' + ((cmsmsShortcodes[key].pair) ? true : false) + '" data-multiple="' + ((cmsmsShortcodes[key].multiple) ? true : false) + '">' + 
								'<span>' + cmsmsShortcodes[key].title + '</span>' + 
							'</a>' + 
						'</li>';
					}
					
					
					out += '</ul>';
					
					
					obj.methods.butElems.append(out);
					
					
					setTimeout(function () { 
						obj.methods.button_row = obj.methods.butElems.find('a.cmsms_row');
						
						
						obj.methods.buttons = obj.methods.butElems.find('a:not(.cmsms_row)');
						
						
						obj.methods.button_row.draggable( { 
							opacity : 0.75, 
							cursor : 'move', 
							helper : 'clone', 
							delay : 150, 
							zIndex : 1000, 
							revert : 'invalid', 
							connectToSortable : '#' + obj.methods.el.attr('id'), 
							cursorAt : { 
								top : 12, 
								left : 75 
							}, 
							start : function (event, ui) {
								$(ui.helper).attr('class', 'cmsms_row').css( { 
									border : 0, 
									background : 'none', 
									fontSize : 13, 
									textAlign : 'left', 
									width : 300, 
									height: 75, 
									padding : '25px 0 0' 
								} ).wrapInner('<div class="cmsms_row" />').empty().append('<div class="innerRow" />').find('.innerRow').height(63).append('<span class="cmsmsShortcodeTitle admin-icon-row" />').parent().prepend('<div class="innerHead">' + 
									'<span>' + cmsmsRow.title + '</span>' + 
								'</div>');
							} 
						} );
						
						
						obj.methods.resetBlocks();
						
						
						obj.methods.buttons.draggable( { 
							opacity : 0.75, 
							cursor : 'move', 
							helper : 'clone', 
							delay : 150, 
							zIndex : 1000, 
							revert : 'invalid', 
							connectToSortable : '#' + obj.methods.el.attr('id') + ', #' + obj.methods.el.attr('id') + ' > .cmsms_row .cmsms_column > .innerColumn', 
							cursorAt : { 
								top : 12, 
								left : 75 
							}, 
							start : function (event, ui) {
								$(ui.helper).attr('class', ui.helper.data('shortcode')).css( { 
									border : 0, 
									background : 'none', 
									display : 'block', 
									fontSize : 13, 
									textAlign : 'left', 
									width : 300, 
									height : 90, 
									padding : '25px 0 0' 
								} ).wrapInner('<div class="' + ui.helper.data('shortcode') + '" />').empty().append('<div class="innerHead" />').append('<div class="innerShortcode" />').parent().find('.innerShortcode').append('<div class="innerContent">' + 
									'<span class="cmsmsShortcodeTitle ' + cmsmsShortcodes[ui.helper.data('shortcode')].icon + '">' + cmsmsShortcodes[ui.helper.data('shortcode')].title + '</span>' + 
								'</div>');
							} 
						} );
					}, 100);
				}
			}, 
			updateContent : function (selected) { 
				obj.methods.resetBlocks();
				
				
				var newPostContent = '', 
					newRows = selected ? obj.methods.rows.filter('.ui-selected') : obj.methods.rows, 
					row = undefined, 
					rowData = {}, 
					columns = [], 
					column = undefined, 
					columnData = {}, 
					shortcodes = [], 
					shortcode = undefined;
				
				
				for (var i = 0, ilength = newRows.length; i < ilength; i += 1) {
					row = newRows.eq(i);
					
					rowData = row.data();
					
					
					columns = row.find('.cmsms_column');
					
					
					newPostContent += '[cmsms_row';
					
					
					for (var key in rowData) {
						if (typeof rowData[key] !== 'object') {
							newPostContent += ' data_' + key + '="' + rowData[key] + '"';
						}
					}
					
					
					newPostContent += ']' + '';
					
					
					for (var j = 0, jlength = columns.length; j < jlength; j += 1) {
						column = columns.eq(j);
						
						columnData = column.data();
						
						
						shortcodes = column.find('> .innerColumn > div');
						
						
						newPostContent += '[cmsms_column';
						
						
						for (var k in columnData) {
							if (typeof columnData[k] !== 'object') {
								newPostContent += ' data_' + k + '="' + columnData[k] + '"';
							}
						}
						
						
						newPostContent += ']' + '';
						
						
						for (var h = 0, hlength = shortcodes.length; h < hlength; h += 1) {
							shortcode = shortcodes.eq(h);
							
							
							newPostContent += shortcode.find('.innerShortcode > .innerCode').html() + '';
						}
						
						
						newPostContent += '[/cmsms_column]' + '';
					}
					
					
					newPostContent += '[/cmsms_row]' + '';
				}
				
				
				if (!selected) {
					setTimeout(function () { 
						tinyMCE.get('content').focus();
						
						
						tinyMCE.activeEditor.setContent(newPostContent);
					}, 100);
				} else {
					return newPostContent;
				}
			}, 
			addShortcode : function (shcd, col, prepend) { 
				var out = 		'', 
					rowAttrs = 	'';
				
				
				for (var k in cmsmsRow.fields) {
					if (cmsmsRow.fields[k].def !== '') {
						rowAttrs += ' data-' + k + '="' + cmsmsRow.fields[k].def + '"';
					}
				}
				
				
				if (shcd === 'cmsms_row') {
					out = '<div class="cmsms_row hideEl"' + rowAttrs + '>' + 
						'<div class="cmsms_column one_first" data-width="1/1" />' + 
					'</div>';
				} else {
					var attrs = '', 
						shcdDefVisual = '', 
						shcdContField = cmsmsShortcodes[shcd].content, 
						shcdDef = (cmsmsShortcodes[shcd].fields && shcdContField) ? cmsmsShortcodes[shcd].fields[shcdContField].def : false;
					
					
					if (typeof cmsmsShortcodes[shcd].visual === 'string') {
						shcdDefVisual = cmsmsShortcodes[shcd].visual.replace(/\{\{\sdata\.([^\s]+)\s\}\}/g, function (str, data) { 
							return cmsmsShortcodes[shcd].fields[data].def;
						} );
					}
					
					
					for (var k in cmsmsShortcodes[shcd].fields) {
						if ( 
							cmsmsShortcodes[shcd].content !== k && 
							cmsmsShortcodes[shcd].fields[k].def !== ''
						) {
							attrs += ' ' + k + '="' + cmsmsShortcodes[shcd].fields[k].def + '"';
						}
					}
					
					
					if (!col) {
						out = '<div class="cmsms_row hideEl"' + rowAttrs + '>' + 
							'<div class="cmsms_column one_first" data-width="1/1">' + 
								'<div class="' + shcd + '">' + 
									'<div class="innerContent">' + 
										((cmsmsShortcodes[shcd].pair && typeof cmsmsShortcodes[shcd].visual === 'string') ? ((shcdDefVisual !== '') ? shcdDefVisual : shcdDef) : '<span class="cmsmsShortcodeTitle ' + cmsmsShortcodes[shcd].icon + '">' + cmsmsShortcodes[shcd].title + '</span>') + 
									'</div>' + 
									'<div class="innerCode">' + 
										'[' + shcd + attrs + ']' + (cmsmsShortcodes[shcd].pair ? shcdDef + '[/' + shcd + ']' : '') + 
									'</div>' + 
								'</div>' + 
							'</div>' + 
						'</div>';
					} else {
						out = '<div class="' + shcd + ' hideEl">' + 
							'<div class="innerContent">' + 
								((cmsmsShortcodes[shcd].pair && typeof cmsmsShortcodes[shcd].visual === 'string') ? ((shcdDefVisual !== '') ? shcdDefVisual : shcdDef) : '<span class="cmsmsShortcodeTitle ' + cmsmsShortcodes[shcd].icon + '">' + cmsmsShortcodes[shcd].title + '</span>') + 
							'</div>' + 
							'<div class="innerCode">' + 
								'[' + shcd + attrs + ']' + (cmsmsShortcodes[shcd].pair ? shcdDef + '[/' + shcd + ']' : '') + 
							'</div>' + 
						'</div>';
					}
				}
				
				if (!col) {
					if (obj.methods.composerBegin.is(':checked')) {
						obj.methods.el.prepend(out);
					} else {
						obj.methods.el.append(out);
					}
				} else {
					if (prepend) {
						obj.methods.el.find('> div.cmsms_row:eq(' + col[1] + ') > div.innerRow > div.cmsms_column:eq(' + col[0] + ') > div.innerColumn').prepend(out);
					} else {
						$(out).insertBefore(obj.methods.el.find('> div.cmsms_row:eq(' + col[1] + ') > div.innerRow > div.cmsms_column:eq(' + col[0] + ') > div.innerColumn > a.cmsmsAddBut'));
					}
				}
				
				
				setTimeout(function () { 
					if (!col) {
						obj.methods.appendRowControl(obj.methods.el.find('> div.cmsms_row.hideEl'));
						
						obj.methods.appendColumnControl(obj.methods.el.find('> div.cmsms_row.hideEl > div.innerRow > div.cmsms_column'));
						
						obj.methods.appendShCdControl(obj.methods.el.find('> div.cmsms_row.hideEl > div.innerRow > div.cmsms_column > div.innerColumn > div'));
					} else {
						obj.methods.appendShCdControl(obj.methods.el.find('> div.cmsms_row:eq(' + col[1] + ') > div.innerRow > div.cmsms_column:eq(' + col[0] + ') > div.innerColumn > div.hideEl'));
					}
					
					
					setTimeout(function () { 
						obj.methods.el.find('.hideEl').addClass('showEl');
					
					
						setTimeout(function () { 
							obj.methods.el.find('.hideEl').removeClass('hideEl showEl');
							
							
							setTimeout(function () { 
								if (!col) {
									obj.methods.makeRowsDroppable();
									
									
									obj.methods.makeColumnsSortable();
								}
								
								
								obj.methods.updateContent(false);
							}, 150);
						}, 300);
					}, 100);
				}, 100);
			}, 
			openShortcodesLightbox : function (el) { 
				var col = el.parents('.cmsms_column'), 
					elObj = { 
						index : 	col.index() + '|' + col.parents('.cmsms_row').index(), 
						prepend : 	(el.parent().is('.innerHead') ? true : false), 
						editor : 	false 
					};
				
				
				cmsmsComposerLightbox.methods.openShortcodes(elObj);
			}, 
			changeLayout : function (el) { 
				var row = el.parents('.cmsms_row'), 
					innerRow = row.find('> .innerRow'), 
					columns = innerRow.find('> .cmsms_column'), 
					colCount = columns.length, 
					rWidthArray = el.data('width').split('+'), 
					rWidthArrayLength = rWidthArray.length, 
					extraCols = '', 
					extraContent = '', 
					extraShortcodes = '';
				
				
				el.parents('.cmsmsColumnButs').find('> li').removeClass('current');
				
				
				el.parent().addClass('current');
				
				
				for (var i = 0; i < colCount; i += 1) {
					if (rWidthArray[i] !== undefined) {
						columns.eq(i).data('width', rWidthArray[i]).attr('class', 'cmsms_column ' + privateMethods.converWidth(rWidthArray[i])).find('> .innerHead > span').text(rWidthArray[i]);
					} else {
						extraContent += columns.eq(i).find('> .innerColumn').html();
						
						
						columns.eq(i).remove();
					}
				}
				
				
				if (colCount < rWidthArrayLength) {
					for (var j = 0, jlength = rWidthArrayLength - colCount; j < jlength; j += 1) {
						extraCols += '<div class="cmsms_column ' + privateMethods.converWidth(rWidthArray[colCount + j]) + '" data-width="' + rWidthArray[colCount + j] + '">' + 
							'<div class="innerHead">' + 
								'<span>' + rWidthArray[colCount + j] + '</span>' + 
								'<a href="#" class="cmsmsAddBut admin-icon-add" title="' + cmsms_composer.add_shortcode + '"></a>' + 
								'<a href="#" class="cmsmsEditBut admin-icon-edit" title="' + cmsms_composer.edit_column + '"></a>' + 
							'</div>' + 
							'<div class="innerColumn">' + 
								'<a href="#" class="cmsmsAddBut admin-icon-add" title="' + cmsms_composer.add_shortcode + '"></a>' + 
							'</div>' + 
							'<div class="innerCode"></div>' + 
						'</div>';
					}
					
					
					innerRow.append(extraCols);
					
					
					obj.methods.makeColumnsSortable();
				} else if (colCount > rWidthArrayLength) {
					$(extraContent).each(function () { 
						if ($(this).is('a.cmsmsAddBut')) {
							$(this).remove();
						} else {
							extraShortcodes += $(this)[0].outerHTML;
						}
					} );
					
					
					columns.eq(rWidthArrayLength - 1).find('> .innerColumn').append(extraShortcodes);
				}
				
				
				obj.methods.updateContent(false);
			}, 
			editElement : function (el) { 
				var elObj = {};
				
				
				if (el.hasClass('cmsms_row')) {
					elObj = { 
						type : 		'cmsms_row', 
						index : 	el.index() + '', 
						content : 	el.data() 
					};
				} else if (el.hasClass('cmsms_column')) {
					elObj = { 
						type : 		'cmsms_column', 
						index : 	el.index() + '|' + el.parents('.cmsms_row').index(), 
						content : 	el.data() 
					};
				} else {
					elObj = { 
						type : 		el.attr('class'), 
						index : 	el.index() + '|' + el.parents('.cmsms_column').index() + '|' + el.parents('.cmsms_row').index(), 
						content : 	el.find('.innerCode').html() 
					};
				}
				
				
				cmsmsComposerLightbox.methods.openLightbox(elObj);
			}, 
			copyElement : function (el) { 
				var elClone = el.clone().addClass('hideEl');
				
				
				el.after(elClone);
				
				
				setTimeout(function () { 
					var elNew = el.next();
					
					
					elNew.addClass('showEl');
					
					
					setTimeout(function () { 
						elNew.removeClass('hideEl showEl');
						
						
						setTimeout(function () { 
							if (el.hasClass('cmsms_row')) {
								obj.methods.makeRowsDroppable();
							}
							
							
							obj.methods.updateContent(false);
						}, 100);
					}, 300);
				}, 100);
			}, 
			deleteElement : function (el) { 
				if (obj.methods.composerConfirm.is(':checked') || confirm(cmsms_composer.delete_el)) {
					el.addClass('hideEl');
					
					
					setTimeout(function () { 
						el.remove();
						
						
						setTimeout(function () { 
							obj.methods.updateContent(false);
						}, 150);
					}, 300);
				}
			}, 
			composerStartFullScreen : function (el) { 
				if (el.hasClass('admin-icon-fullscreen')) {
					el.addClass('admin-icon-fullscreen-exit').removeClass('admin-icon-fullscreen');
					
					
					obj.methods.body.addClass('cmsms_set_fullscreen');
					
					
					obj.methods.composerFullScreen.val('true');
					
					
					obj.methods.el.css('margin-top', obj.methods.butCont.outerHeight() - 28);
				} else {
					el.addClass('admin-icon-fullscreen').removeClass('admin-icon-fullscreen-exit');
					
					
					obj.methods.el.removeAttr('style');
					
					
					obj.methods.composerFullScreen.val('false');
					
					
					obj.methods.body.removeClass('cmsms_set_fullscreen');
				}
			}, 
			convertToContent : function (text) { 
				return switchEditors.wpautop(text);
			} 
		};
		
		// Private Methods
		privateMethods = { 
			attachStaticEvents : function () { 
				// Declare CONTENT COMPOSER Button Click Event
				obj.methods.composerButton.bind('click', function () { 
					obj.methods.composerToggle();
					
					
					return false;
				} );
				
				
				// Declare TEMPLATES Button Click Event
				obj.methods.butTemp.on('click', '.cmsms_pattern_list_button', function () { 
					return false;
				} );
				
				
				// Declare SAVE TEMPLATE Button Click Event
				obj.methods.butTemp.on('click', '.cmsms_pattern_save, .cmsms_pattern_save_all', function () { 
					var button = $(this), 
						saveBut = obj.methods.butTemp.find('.cmsms_pattern_save'), 
						selectedList = obj.methods.el.find('> div.cmsms_row.ui-selected'), 
						newContent = switchEditors.pre_wpautop(obj.methods.content.val()), 
						newName = prompt(cmsms_composer.new_tmpl_name);
					
					
					if (button.is('.cmsms_pattern_save') && selectedList.length > 0) {
						newContent = switchEditors.pre_wpautop(obj.methods.updateContent(true));
					} else {
						selectedList.removeClass('ui-selected');
						
						
						saveBut.css( { 
							opacity : 0, 
							visibility : 'hidden' 
						} );
					}
					
					
					if (newName.length > 2) {
						$.post(obj.methods.composerURL, { 
							type : 'add', 
							name : newName, 
							content : newContent 
						}, function (data) { 
							obj.methods.templates.append(data);
							
							
							if (button.is('.cmsms_pattern_save') && selectedList.length > 0) {
								selectedList.removeClass('ui-selected');
								
								
								saveBut.css( { 
									opacity : 0, 
									visibility : 'hidden' 
								} );
								
								
								obj.methods.messageSave.fadeIn(100).delay(1000).fadeOut(100);
							} else {
								obj.methods.messageSaveAll.fadeIn(100).delay(1000).fadeOut(100);
							}
						}, 'text');
					} else {
						alert(cmsms_composer.invalid_tmpl_name);
					}
					
					
					return false;
				} );
				
				
				// Declare LOAD TEMPLATE Button Click Event
				obj.methods.butTemp.on('click', '.cmsms_pattern_paste', function () { 
					if ($(this).data('id') !== '') {
						$.post(obj.methods.composerURL, { 
							type : 	'load', 
							id : 	$(this).data('id') 
						}, function (data) { 
							obj.methods.parseContent(data);
							
							
							obj.methods.el.find('> div.cmsms_row.hideEl').each(function () { 
								obj.methods.appendRowControl($(this));
							} );
							
							
							obj.methods.el.find('> div.cmsms_row.hideEl > .innerRow > .cmsms_column').each(function () { 
								obj.methods.appendColumnControl($(this));
							} );
							
							
							obj.methods.el.find('> div.cmsms_row.hideEl > .innerRow > .cmsms_column > .innerColumn > div').each(function () { 
								obj.methods.appendShCdControl($(this));
							} );
							
							
							setTimeout(function () { 
								var elNew = obj.methods.el.find('> div.cmsms_row.hideEl');
								
								
								elNew.addClass('showEl');
								
								
								setTimeout(function () { 
									elNew.removeClass('hideEl showEl');
									
									
									setTimeout(function () { 
										obj.methods.makeRowsDroppable();
										
										
										obj.methods.makeColumnsSortable();
										
										
										obj.methods.updateContent(false);
										
										
										obj.methods.messageLoad.fadeIn(100).delay(1000).fadeOut(100);
									}, 100);
								}, 300);
							}, 100);
						}, 'text');
					} else {
						alert(cmsms_composer.error_on_page);
					}
					
					
					return false;
				} );
				
				
				// Declare DELETE TEMPLATE Button Click Event
				obj.methods.butTemp.on('click', '.cmsms_pattern_delete', function () { 
					if (confirm(cmsms_composer.delete_tmpl)) {
						if ($(this).data('id') !== '') {
							$.post(obj.methods.composerURL, { 
								type : 'del', 
								id : $(this).data('id') 
							}, function (id) { 
								obj.methods.templates.find('a[data-id="' + id + '"]').eq(0).parents('li').remove();
								
								
								obj.methods.messageDelete.fadeIn(100).delay(1000).fadeOut(100);
							}, 'text');
						} else {
							alert(cmsms_composer.error_on_page);
						}
					}
					
					
					return false;
				} );
				
				
				// Declare CLEAR COMPOSER Button Click Event
				obj.methods.butTemp.on('click', '.cmsms_clear_content', function () { 
					if (confirm(cmsms_composer.delete_all)) {
						obj.methods.el.find('> div.cmsms_row').remove();
						
						
						setTimeout(function () { 
							obj.methods.updateContent(false);
						}, 150);
					}
					
					
					return false;
				} );
				
				
				// Declare FULLSCREEN Button Click Event
				obj.methods.butTemp.on('click', '.cmsms_composer_fullscreen', function () { 
					obj.methods.composerStartFullScreen($(this));
					
					
					return false;
				} );
				
				
				// Declare FULLSCREEN UPDATE Button Click Event
				obj.methods.butTemp.on('click', '.cmsms_update_trigger', function () { 
					$('#publishing-action > input#publish').trigger('click');
					
					
					return false;
				} );
				
				
				// Declare FULLSCREEN PREVIEW Button Click Event
				obj.methods.butTemp.on('click', '.cmsms_preview_trigger', function () { 
					$('#preview-action > a#post-preview').trigger('click');
					
					
					return false;
				} );
				
				
				// Declare FULLSCREEN RESIZE Event
				$(window).bind('resize', function () { 
					if (obj.methods.body.hasClass('cmsms_set_fullscreen')) {
						if (obj.methods.el.css('margin-top') !== obj.methods.butCont.outerHeight() - 28 + 'px') {
							obj.methods.el.css('margin-top', obj.methods.butCont.outerHeight() - 28);
						}
					}
				} );
			}, 
			composerAutoStart : function () { 
				if (obj.methods.composerShow.val() === 'true') {
					var startInterval = setInterval(function () { 
						if ( 
							typeof tinyMCE !== 'undefined' && 
							typeof tinyMCE.get(obj.methods.editorID) !== 'undefined' && 
							tinyMCE.get(obj.methods.editorID) !== null 
						) {
							clearInterval(startInterval);
							
							
							obj.methods.composerToggle();
						}
					}, 100);
				}
			}, 
			composerAutoFullScreen : function () { 
				if (obj.methods.composerFullScreen.val() === 'true') {
					obj.methods.composerStartFullScreen(obj.methods.butTemp.find('.cmsms_composer_fullscreen'));
				}
			}, 
			attachEvents : function () { 
				// Declare SHORTCODE Button Click Event
				obj.methods.butElems.on('click', '> ul > li > a', function () { 
					$(this).clone().css( { 
						position : 'absolute', 
						top : 0, 
						zIndex : 100 
					} ).insertAfter($(this));
					
					
					$(this).next().animate( { 
						borderColor : '#e6db55', 
						backgroundColor : '#ffffe0', 
						color : ($(this).hasClass('cmsms_row') ? '#d54e21' : '#21759d'), 
						width : '10%', 
						left : '45%' 
					}, { 
						queue : false, 
						duration : 250 
					} ).animate( { 
						top : '250px' 
					}, { 
						queue : false, 
						duration : 500 
					} ).animate( { 
						opacity : 0 
					}, 750, function () { 
						$(this).remove();
					} );
					
					
					obj.methods.addShortcode($(this).data('shortcode'), false, false);
					
					
					return false;
				} );
				
				
				// Declare Column ADD Button Click Event
				obj.methods.el.on('click', 'a.cmsmsAddBut', function () { 
					obj.methods.openShortcodesLightbox($(this));
					
					
					return false;
				} );
				
				
				// Declare Row LAYOUT CHANGE Buttons Click Event
				obj.methods.el.on('click', 'ul.cmsmsColumnButs > li > a', function () { 
					obj.methods.changeLayout($(this));
					
					
					return false;
				} );
				
				
				// Declare Element EDIT Button Click Event
				obj.methods.el.on('click', 'a.cmsmsEditBut, a.cmsmsEditShortcodeBut', function () { 
					var el = $(this).parent();
					
					
					if (el.is('.innerHead')) {
						el = $(this).parents('.innerHead').parent();
					}
					
					
					obj.methods.editElement(el);
					
					
					return false;
				} );
				
				
				// Declare Element COPY Button Click Event
				obj.methods.el.on('click', 'a.cmsmsCopyBut', function () { 
					var el = $(this).parents('.innerHead').parent();
					
					
					obj.methods.copyElement(el);
					
					
					return false;
				} );
				
				
				// Declare Element DELETE Button Click Event
				obj.methods.el.on('click', 'a.cmsmsDelBut', function () { 
					var el = $(this).parents('.innerHead').parent();
					
					
					obj.methods.deleteElement(el);
					
					
					return false;
				} );
			}, 
			detachEvents : function () { 
				// Undeclare SHORTCODE Button Click Event
				obj.methods.butElems.off('click', '> ul > li > a');
				
				// Undeclare Column ADD Button Click Event
				obj.methods.el.off('click', 'a.cmsmsAddBut');
				
				// Undeclare Row LAYOUT CHANGE Buttons Click Event
				obj.methods.el.off('click', 'ul.cmsmsColumnButs > li > a');
				
				// Undeclare Element EDIT Button Click Event
				obj.methods.el.off('click', 'a.cmsmsEditBut, a.cmsmsEditShortcodeBut');
				
				// Undeclare Element COPY Button Click Event
				obj.methods.el.off('click', 'a.cmsmsCopyBut');
				
				// Undeclare Element DELETE Button Click Event
				obj.methods.el.off('click', 'a.cmsmsDelBut');
			}, 
			moveAddButton : function (col) { 
				var addBut = col.find('> a.cmsmsAddBut'), 
					addButClone = addBut.clone(), 
					shcdsLength = col.find('> div').length;
				
				
				if (addBut.index() === 0 || addBut.index() < shcdsLength) {
					addBut.remove();
					
					
					col.append(addButClone);
				}
			}, 
			setColumnsWidth : function () { 
				obj.methods.el.find('div.cmsms_column').each(function () { 
					if ($(this).attr('data-width') !== undefined) {
						$(this).addClass(privateMethods.converWidth($(this).attr('data-width')));
					} else {
						$(this).addClass('one_first').attr('data-width', '1/1');
					}
				} );
			}, 
			converWidth : function (width) { 
				if (width === '1/1') {
					width = 'one_first';
				} else if (width === '3/4') {
					width = 'three_fourth';
				} else if (width === '2/3') {
					width = 'two_third';
				} else if (width === '1/2') {
					width = 'one_half';
				} else if (width === '1/3') {
					width = 'one_third';
				} else if (width === '1/4') {
					width = 'one_fourth';
				}
				
				
				return width;
			}, 
			converClass : function (el) { 
				var width = '1/1', 
					classes = el.attr('class') ? el.attr('class').split(' ') : [];
				
				
				if (classes[1] !== undefined) {
					if (classes[1] === 'three_fourth') {
						width = '3/4';
					} else if (classes[1] === 'two_third') {
						width = '2/3';
					} else if (classes[1] === 'one_half') {
						width = '1/2';
					} else if (classes[1] === 'one_third') {
						width = '1/3';
					} else if (classes[1] === 'one_fourth') {
						width = '1/4';
					}
				}
				
				
				return width;
			} 
		};
		
		
		obj.methods.init();
	};
	
	// Plugin Start
	$.fn.cmsmsContentComposer = function (parameters) { 
		return this.each(function () { 
			if ($(this).data('cmsmsContentComposer')) { 
				return;
			}
			
			
			var cmsmsContentComposer = new ContentComposer(this, parameters);
			
			
			$(this).data('cmsmsContentComposer', cmsmsContentComposer);
		} );
	};
})(jQuery);

