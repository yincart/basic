(function() {
  $(document).ready(function() {
    setScrollable();
    setTimeAgo();
    setAutoSize();
    setCharCounter();
    setMaxLength();
    setValidateForm();
    setSortable($(".sortable"));
    setSelect2();
    $(".datetimepicker").datetimepicker();
    $(".datepicker").datetimepicker({
      pickTime: false
    });
    $(".timepicker").datetimepicker({
      pickDate: false
    });
    $('.wysihtml5').wysihtml5();
    $('.dd').nestable();
    $('.nav-responsive.nav-pills, .nav-responsive.nav-tabs').tabdrop();
    $("input.nakedpassword").nakedPassword({
      path: "assets/images/plugins/naked_password/"
    });
    setDataTable($(".data-table"));
    setDataTable($(".data-table-column-filter"));
    $(".box .box-remove").live("click", function(e) {
      $(this).parents(".box").first().remove();
      e.preventDefault();
      return false;
    });
    $(".box .box-collapse").live("click", function(e) {
      var box;
      box = $(this).parents(".box").first();
      box.toggleClass("box-collapsed");
      e.preventDefault();
      return false;
    });
    if (Modernizr.touch === false) {
      $("body").on("mouseenter", ".has-popover", function() {
        var el;
        el = $(this);
        if (el.data("popover") === undefined) {
          el.popover({
            placement: el.data("placement") || "top",
            container: "body"
          });
        }
        return el.popover("show");
      });
      $("body").on("mouseleave", ".has-popover", function() {
        return $(this).popover("hide");
      });
    }
    if (Modernizr.touch === false) {
      $("body").on("mouseenter", ".has-tooltip", function() {
        var el;
        el = $(this);
        if (el.data("tooltip") === undefined) {
          el.tooltip({
            placement: el.data("placement") || "top",
            container: "body"
          });
        }
        return el.tooltip("show");
      });
      $("body").on("mouseleave", ".has-tooltip", function() {
        return $(this).tooltip("hide");
      });
    }
    $(".check-all").live("click", function(e) {
      return $(this).parents("table:eq(0)").find(".only-checkbox :checkbox").attr("checked", this.checked);
    });
    $(".colorpicker-hex").colorpicker({
      format: "hex"
    });
    $(".colorpicker-rgb").colorpicker({
      format: "rgb"
    });
    if (!Modernizr.input.placeholder) {
      $("[placeholder]").focus(function() {
        var input;
        input = $(this);
        if (input.val() === input.attr("placeholder")) {
          input.val("");
          return input.removeClass("placeholder");
        }
      }).blur(function() {
        var input;
        input = $(this);
        if (input.val() === "" || input.val() === input.attr("placeholder")) {
          input.addClass("placeholder");
          return input.val(input.attr("placeholder"));
        }
      }).blur();
      $("[placeholder]").parents("form").submit(function() {
        return $(this).find("[placeholder]").each(function() {
          var input;
          input = $(this);
          if (input.val() === input.attr("placeholder")) {
            return input.val("");
          }
        });
      });
    }
    if (!$("body").hasClass("fixed-header")) {
      $('#main-nav.main-nav-fixed').affix({
        offset: 40
      });
    }
    return $('input[type=file]').bootstrapFileInput();
  });

  this.setSelect2 = function(selector) {
    if (selector == null) {
      selector = $(".select2");
    }
    return selector.each(function(i, elem) {
      return $(elem).select2();
    });
  };

  this.setValidateForm = function(selector) {
    if (selector == null) {
      selector = $(".validate-form");
    }
    return selector.each(function(i, elem) {
      return $(elem).validate({
        errorElement: "span",
        errorClass: "help-block error",
        errorPlacement: function(e, t) {
          return t.parents(".controls").append(e);
        },
        highlight: function(e) {
          return $(e).closest(".control-group").removeClass("error success").addClass("error");
        },
        success: function(e) {
          return e.closest(".control-group").removeClass("error");
        }
      });
    });
  };

  this.setDataTable = function(selector) {
    return selector.each(function(i, elem) {
      var dt, sdom;
      if ($(elem).data("pagination-top-bottom") === true) {
        sdom = "<'row-fluid datatables-top'<'span6'l><'span6 text-right'pf>r>t<'row-fluid datatables-bottom'<'span6'i><'span6 text-right'p>>";
      } else if ($(elem).data("pagination-top") === true) {
        sdom = "<'row-fluid datatables-top'<'span6'l><'span6 text-right'pf>r>t<'row-fluid datatables-bottom'<'span6'i><'span6 text-right'>>";
      } else {
        sdom = "<'row-fluid datatables-top'<'span6'l><'span6 text-right'f>r>t<'row-fluid datatables-bottom'<'span6'i><'span6 text-right'p>>";
      }
      dt = $(elem).dataTable({
        sDom: sdom,
        sPaginationType: "bootstrap",
        "iDisplayLength": $(elem).data("pagination-records") || 10,
        oLanguage: {
          sLengthMenu: "_MENU_ records per page"
        }
      });
      if ($(elem).hasClass("data-table-column-filter")) {
        return dt.columnFilter();
      }
    });
  };

  this.setMaxLength = function(selector) {
    if (selector == null) {
      selector = $(".char-max-length");
    }
    return selector.maxlength();
  };

  this.setCharCounter = function(selector) {
    if (selector == null) {
      selector = $(".char-counter");
    }
    return selector.charCount({
      allowed: selector.data("char-allowed"),
      warning: selector.data("char-warning"),
      cssWarning: "text-warning",
      cssExceeded: "text-error"
    });
  };

  this.setAutoSize = function(selector) {
    if (selector == null) {
      selector = $(".autosize");
    }
    return selector.autosize();
  };

  this.setTimeAgo = function(selector) {
    if (selector == null) {
      selector = $(".timeago");
    }
    jQuery.timeago.settings.allowFuture = true;
    jQuery.timeago.settings.refreshMillis = 60000;
    selector.timeago();
    return selector.addClass("in");
  };

  this.setScrollable = function(selector) {
    if (selector == null) {
      selector = $(".scrollable");
    }
    return selector.each(function(i, elem) {
      return $(elem).slimScroll({
        height: $(elem).data("scrollable-height"),
        start: $(elem).data("scrollable-start") || "top"
      });
    });
  };

  this.setSortable = function(selector) {
    if (selector == null) {
      selector = null;
    }
    if (selector) {
      return selector.sortable({
        axis: selector.data("sortable-axis"),
        connectWith: selector.data("sortable-connect")
      });
    }
  };

}).call(this);
