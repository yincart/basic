(function ($) {
    "use strict";

    var Wysihtml5 = function (options) {
        this.init('wysihtml5', options, Wysihtml5.defaults);

        //extend wysihtml5 manually as $.extend not recursive
        this.options.wysihtml5 = $.extend({}, Wysihtml5.defaults.wysihtml5, options.wysihtml5);
    };

    $.fn.editableutils.inherit(Wysihtml5, $.fn.editabletypes.abstractinput);

    $.extend(Wysihtml5.prototype, {
        render: function () {
            var deferred = $.Deferred(),
                msieOld;

            //generate unique id as it required for wysihtml5
            this.$input.attr('id', 'textarea_'+(new Date()).getTime());

            this.setClass();
            this.setAttr('placeholder');

            //resolve deffered when widget loaded
            $.extend(this.options.wysihtml5, {
                events: {
                    load: function() {
                        deferred.resolve();
                    }
                }
            });

            this.$input.wysihtml5(this.options.wysihtml5);

            /*
             In IE8 wysihtml5 iframe stays on the same line with buttons toolbar (inside popover).
             The only solution I found is to add <br>. If you fine better way, please send PR.
             */
            msieOld = /msie\s*(8|7|6)/.test(navigator.userAgent.toLowerCase());
            if(msieOld) {
                this.$input.before('<br><br>');
            }

            return deferred.promise();
        },

        value2html: function(value, element) {
            $(element).html(value);
        },

        html2value: function(html) {
            return html;
        },

        value2input: function(value) {
            this.$input.data("wysihtml5").editor.setValue(value, true);
        },

        activate: function() {
            this.$input.data("wysihtml5").editor.focus();
        }
    });

    Wysihtml5.defaults = $.extend({}, $.fn.editabletypes.abstractinput.defaults, {
        /**
         @property tpl
         @default <textarea></textarea>
         **/
        tpl:'<textarea></textarea>',
        /**
         @property inputclass
         @default editable-wysihtml5
         **/
        inputclass: 'editable-wysihtml5',
        /**
         Placeholder attribute of input. Shown when input is empty.

         @property placeholder
         @type string
         @default null
         **/
        placeholder: null,
        /**
         Wysihtml5 default options.
         See https://github.com/jhollingworth/bootstrap-wysihtml5#options

         @property wysihtml5
         @type object
         @default {stylesheets: false}
         **/
        wysihtml5: {
            stylesheets: false //see https://github.com/jhollingworth/bootstrap-wysihtml5/issues/183
        }
    });

    $.fn.editabletypes.wysihtml5 = Wysihtml5;

}(window.jQuery));
