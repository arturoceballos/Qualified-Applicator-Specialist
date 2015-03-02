/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.1.0
 * 
 * Content Composer Shortcodes for Editor Scripts
 * Created by CMSMasters
 * 
 */


(function () { 
	tinymce.create('tinymce.plugins.cmsms_shortcodes', { 
        init : function (c, url) { 
			c.addCommand('cmsms_shortcodes_command', function () { 
				var elObj = { 
					index : 	false, 
					prepend : 	false, 
					editor : 	true 
				};
				
				
				cmsmsComposerLightbox.methods.openShortcodes(elObj);
			} );
			
			
			c.addButton('cmsms_shortcodes', { 
				title : 'Content Composer shortcodes', 
				cmd : 'cmsms_shortcodes_command' 
			} );
        }, 
		createControl : function (n, c) { 
            return null;
		}, 
		getInfo : function () { 
			return { 
				longname : 		'CMSMasters Shortcodes Selector', 
				author : 		'CMSMasters', 
				authorurl : 	'http://cmsmasters.net/', 
				infourl : 		'http://cmsmasters.net/', 
				version : 		'1.0' 
			};
		} 
	} );
	
	
	tinymce.PluginManager.add('cmsms_shortcodes', tinymce.plugins.cmsms_shortcodes);
} )();

