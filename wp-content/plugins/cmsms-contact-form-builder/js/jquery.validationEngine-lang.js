/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Contact Form Builder
 * @version 	1.2.2
 * 
 * CMSMasters Contact Form Builder Validator Language File
 * Created by CMSMasters
 * 
 */


(function ($) { 
    $.fn.validationEngineLanguage = function () { };
	
	
    $.validationEngineLanguage = { 
        newLang : function () { 
            $.validationEngineLanguage.allRules = { 
                "required" : { 
                    "regex" : 						"none", 
                    "alertText" : 					cmsms_ve.required, 
                    "alertTextCheckboxMultiple" : 	cmsms_ve.select_option, 
                    "alertTextCheckboxe" : 			cmsms_ve.required_checkbox 
                }, 
                "minSize" : { 
                    "regex" : 						"none", 
                    "alertText" : 					cmsms_ve.min, 
                    "alertText2" : 					cmsms_ve.allowed 
                }, 
                "maxSize" : { 
                    "regex" : 						"none", 
                    "alertText" : 					cmsms_ve.max, 
                    "alertText2" : 					cmsms_ve.allowed 
                }, 
                "email" : { 
                    "regex" : 						/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/, 
                    "alertText" : 					cmsms_ve.invalid_email 
                }, 
                "number" : { 
                    "regex" : 						/^[\-\+]?((([0-9]{1,3})([,][0-9]{3})*)|([0-9]+))?([\.]([0-9]+))?$/, 
                    "alertText" : 					cmsms_ve.invalid_number 
                }, 
                "url" : { 
                    "regex" : 						/^(https?|ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(\#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/i, 
                    "alertText" : 					cmsms_ve.invalid_url 
                }, 
                "onlyNumberSp" : { 
                    "regex" : 						/^[0-9\ ]+$/, 
                    "alertText" : 					cmsms_ve.numbers_spaces 
                }, 
                "onlyLetterSp" : { 
                    "regex" : 						/^[a-zA-Z\ \']+$/, 
                    "alertText" : 					cmsms_ve.letters_spaces 
                } 
            };
        } 
    };
	
	
    $.validationEngineLanguage.newLang();
} )(jQuery);

