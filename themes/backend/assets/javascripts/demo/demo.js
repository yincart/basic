(function() {
  $(document).ready(function() {
    var calendarDate, d, m, select2icon, y;
    setTimeAgoExample();
    $('#slider').sliderNav();
    $("#new-event").live('submit', function(e) {
      var value;
      e.preventDefault();
      value = $("#new-event-input").val();
      if (value.length > 0) {
        $("#events .box-content").prepend("<div class='label label-important external-event'>" + value + "</div>");
        $("#new-event-input").val("");
        return setDraggableEvents();
      }
    });
    $("#tree1").dynatree();
    $("#tree2").dynatree({
      checkbox: true,
      selectMode: 2,
      onSelect: function(select, node) {
        var selKeys, selNodes;
        selNodes = node.tree.getSelectedNodes();
        selKeys = $.map(selNodes, function(node) {
          return "[" + node.data.key + "]: '" + node.data.title + "'";
        });
        return $("#echoSelection2").text(selKeys.join(", "));
      },
      onClick: function(node, event) {
        if (node.getEventTargetType(event) === "title") {
          return node.toggleSelect();
        }
      },
      onKeydown: function(node, event) {
        if (event.which === 32) {
          node.toggleSelect();
          return false;
        }
      },
      idPrefix: "dynatree-Cb2-"
    });
    $("#tree3").dynatree({
      dnd: {
        preventVoidMoves: true,
        onDragStart: function(node) {
          return true;
        },
        onDragEnter: function(node, sourceNode) {
          return ["before", "after"];
        },
        onDrop: function(node, sourceNode, hitMode, ui, draggable) {
          return sourceNode.move(node, hitMode);
        }
      }
    });
    $("#slider-example > span").each(function() {
      var value;
      value = parseInt($(this).text(), 10);
      return $(this).empty().slider({
        value: value,
        range: "min",
        animate: true,
        orientation: "vertical"
      });
    });
    $("#slider-example1").slider({
      value: 100,
      min: 0,
      max: 500,
      step: 50,
      slide: function(event, ui) {
        return $("#slider-example1-amount").text("$" + ui.value);
      }
    });
    $("#slider-example1-amount").text("$" + $("#slider-example1").slider("value"));
    $("#slider-example2").slider({
      range: true,
      min: 0,
      max: 500,
      values: [75, 300],
      slide: function(event, ui) {
        return $("#slider-example2-amount").text("$" + ui.values[0] + " - $" + ui.values[1]);
      }
    });
    $("#slider-example2-amount").text("$" + $("#slider-example2").slider("values", 0) + " - $" + $("#slider-example2").slider("values", 1));
    $("#alert-example").live("click", function(e) {
      bootbox.dialog("This is alert!", [
        {
          label: "Okay",
          "class": "btn-danger"
        }
      ]);
      return false;
    });
    $("#notification1").live("click", function(e) {
      $.jGrowl("Lorem ipsum dolor sit amet...");
      return false;
    });
    $("#notification2").live("click", function(e) {
      $.jGrowl("Lorem ipsum dolor sit amet...", {
        sticky: true
      });
      return false;
    });
    select2icon = function(e) {
      return "<i class='" + e.text + "'></i> ." + e.text;
    };
    $("#select2-icon").select2({
      formatResult: select2icon,
      formatSelection: select2icon,
      escapeMarkup: function(e) {
        return e;
      }
    });
    $("#select2-tags").select2({
      tags: ["today", "tomorrow", "toyota"],
      tokenSeparators: [",", " "],
      placeholder: "Type your tag here... "
    });
    $.validator.addMethod("buga", (function(value) {
      return value === "buga";
    }), "Please enter \"buga\"!");
    $.validator.methods.equal = function(value, element, param) {
      return value === param;
    };
    $(".todo-list .new-todo").live('submit', function(e) {
      var li, todo_name;
      todo_name = $(this).find("#todo_name").val();
      $(this).find("#todo_name").val("");
      if (todo_name.length !== 0) {
        li = $(this).parents(".todo-list").find("li.item").first().clone();
        li.removeClass("important").removeClass("done");
        li.find("label.todo span").text(todo_name);
        $(".todo-list ul").first().prepend(li);
        li.effect("highlight", {}, 500);
      }
      return e.preventDefault();
    });
    $("#comments-more-activity").live("click", function(e) {
      $(this).button("loading");
      setTimeout((function() {
        var list;
        list = $("#comments-more-activity").parent().parent().find("ul");
        list.append(list.find("li:not(:first)").clone().effect("highlight", {}, 500));
        return $("#comments-more-activity").button("reset");
      }), 1000);
      e.preventDefault();
      return false;
    });
    $("#users-more-activity").live("click", function(e) {
      $(this).button("loading");
      setTimeout((function() {
        var list;
        list = $("#users-more-activity").parent().parent().find("ul");
        list.append(list.find("li:not(:first)").clone().effect("highlight", {}, 500));
        return $("#users-more-activity").button("reset");
      }), 1000);
      e.preventDefault();
      return false;
    });
    $(".todo-list .remove").live("click", function(e) {
      $(this).tooltip("hide");
      $(this).parents("li").fadeOut(500, function() {
        return $(this).remove();
      });
      e.stopPropagation();
      e.preventDefault();
      return false;
    });
    $(".todo-list .important").live("click", function(e) {
      $(this).parents("li").toggleClass("important");
      e.stopPropagation();
      e.preventDefault();
      return false;
    });
    $(".todo-list .check").live("click", function() {
      var checkbox;
      checkbox = $(this).find("input[type='checkbox']");
      if (checkbox.is(":checked")) {
        return $(this).parents("li").addClass("done");
      } else {
        return $(this).parents("li").removeClass("done");
      }
    });
    $(".recent-activity .ok").live("click", function(e) {
      $(this).tooltip("hide");
      $(this).parents("li").fadeOut(500, function() {
        return $(this).remove();
      });
      return e.preventDefault();
    });
    $(".recent-activity .remove").live("click", function(e) {
      $(this).tooltip("hide");
      $(this).parents("li").fadeOut(500, function() {
        return $(this).remove();
      });
      return e.preventDefault();
    });
    $(".chat .new-message").live('submit', function(e) {
      var chat, date, li, message, months, reply, scrollable, sender, timeago;
      date = new Date();
      months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
      chat = $(this).parents(".chat");
      message = $(this).find("#message_body").val();
      $(this).find("#message_body").val("");
      if (message.length !== 0) {
        li = chat.find("li.message").first().clone();
        li.find(".body").text(message);
        timeago = li.find(".timeago");
        timeago.removeClass("in");
        timeago.attr("title", "" + (date.getFullYear()) + "-" + (date.getDate()) + "-" + (date.getMonth() + 1) + " " + (date.getHours()) + ":" + (date.getMinutes()) + ":" + (date.getSeconds()) + " +0200");
        timeago.text("" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
        setTimeAgo(timeago);
        sender = li.find(".name").text().trim();
        chat.find("ul").append(li);
        scrollable = li.parents(".scrollable");
        $(scrollable).slimScroll({
          scrollTo: scrollable.prop('scrollHeight') + "px"
        });
        li.effect("highlight", {}, 500);
        reply = scrollable.find("li").not(":contains('" + sender + "')").first().clone();
        setTimeout((function() {
          date = new Date();
          timeago = reply.find(".timeago");
          timeago.attr("title", "" + (date.getFullYear()) + "-" + (date.getDate()) + "-" + (date.getMonth() + 1) + " " + (date.getHours()) + ":" + (date.getMinutes()) + ":" + (date.getSeconds()) + " +0200");
          timeago.text("" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
          setTimeAgo(timeago);
          scrollable.find("ul").append(reply);
          $(scrollable).slimScroll({
            scrollTo: scrollable.prop('scrollHeight') + "px"
          });
          return reply.effect("highlight", {}, 500);
        }), 1000);
      }
      return e.preventDefault();
    });
    setDraggableEvents();
    calendarDate = new Date();
    d = calendarDate.getDate();
    m = calendarDate.getMonth();
    y = calendarDate.getFullYear();
    $(".full-calendar-demo").fullCalendar({
      header: {
        center: "title",
        left: "basicDay,basicWeek,month",
        right: "prev,today,next"
      },
      buttonText: {
        prev: "<span class=\"icon-chevron-left\"></span>",
        next: "<span class=\"icon-chevron-right\"></span>",
        today: "Today",
        basicDay: "Day",
        basicWeek: "Week",
        month: "Month"
      },
      droppable: true,
      editable: true,
      eventClick: function(calEvent, jsEvent, view) {
        return bootbox.confirm("Do you really want to delete selected event?", function(result) {
          if (result === true) {
            return $(".full-calendar-demo").fullCalendar('removeEvents', calEvent.id);
          }
        });
      },
      drop: function(date, allDay) {
        var copiedEventObject, originalEventObject;
        originalEventObject = $(this).data("eventObject");
        originalEventObject.id = Math.floor(Math.random() * 99999);
        console.log(originalEventObject);
        copiedEventObject = $.extend({}, originalEventObject);
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        $(".full-calendar-demo").fullCalendar("renderEvent", copiedEventObject, true);
        if ($("#calendar-remove-after-drop").is(":checked")) {
          return $(this).remove();
        }
      },
      events: [
        {
          id: "event1",
          title: "All Day Event",
          start: new Date(y, m, 1),
          className: 'event-orange'
        }, {
          id: "event2",
          title: "Long Event",
          start: new Date(y, m, d - 5),
          end: new Date(y, m, d - 2),
          className: "event-red"
        }, {
          id: 999,
          id: "event3",
          title: "Repeating Event",
          start: new Date(y, m, d - 3, 16, 0),
          allDay: false,
          className: "event-blue"
        }, {
          id: 999,
          id: "event3",
          title: "Repeating Event",
          start: new Date(y, m, d + 4, 16, 0),
          allDay: false,
          className: "event-green"
        }, {
          id: "event4",
          title: "Meeting",
          start: new Date(y, m, d, 10, 30),
          allDay: false,
          className: "event-orange"
        }, {
          id: "event5",
          title: "Lunch",
          start: new Date(y, m, d, 12, 0),
          end: new Date(y, m, d, 14, 0),
          allDay: false,
          className: "event-red"
        }, {
          id: "event6",
          title: "Birthday Party",
          start: new Date(y, m, d + 1, 19, 0),
          end: new Date(y, m, d + 1, 22, 30),
          allDay: false,
          className: "event-purple"
        }
      ]
    });
    if ($(".mention").length > 0) {
      $(".mention").mention({
        users: [
          {
            name: "Lindsay Made",
            username: "LindsayM",
            image: "http://placekitten.com/25/25"
          }, {
            name: "Rob Dyrdek",
            username: "robdyrdek",
            image: "http://placekitten.com/25/24"
          }, {
            name: "Rick Bahner",
            username: "RickyBahner",
            image: "http://placekitten.com/25/23"
          }, {
            name: "Jacob Kelley",
            username: "jakiestfu",
            image: "http://placekitten.com/25/22"
          }, {
            name: "John Doe",
            username: "HackMurphy",
            image: "http://placekitten.com/25/21"
          }, {
            name: "Charlie Edmiston",
            username: "charlie",
            image: "http://placekitten.com/25/20"
          }, {
            name: "Andrea Montoya",
            username: "andream",
            image: "http://placekitten.com/24/20"
          }, {
            name: "Jenna Talbert",
            username: "calisunshine",
            image: "http://placekitten.com/23/20"
          }, {
            name: "Street League",
            username: "streetleague",
            image: "http://placekitten.com/22/20"
          }, {
            name: "Loud Mouth Burrito",
            username: "Loudmouthfoods",
            image: "http://placekitten.com/21/20"
          }
        ]
      });
    }
    $("#daterange2").daterangepicker({
      format: "MM/DD/YYYY"
    }, function(start, end) {
      return $("#daterange2").parent().find("input").first().val(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
    });
    $("#daterange").daterangepicker({
      ranges: {
        Yesterday: [moment().subtract("days", 1), moment().subtract("days", 1)],
        "Last 30 Days": [moment().subtract("days", 29), new Date()],
        "This Month": [moment().startOf("month"), moment().endOf("month")]
      },
      opens: "left",
      format: "MM/DD/YYYY",
      separator: " to ",
      startDate: moment().subtract("days", 29),
      endDate: new Date(),
      minDate: "01/01/2012",
      maxDate: "12/31/2013",
      locale: {
        applyLabel: "Submit",
        fromLabel: "From",
        toLabel: "To",
        customRangeLabel: "Custom Range",
        daysOfWeek: ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
        monthNames: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
        firstDay: 1
      },
      showWeekNumbers: true,
      buttonClasses: ["btn-danger"],
      dateLimit: false
    }, function(start, end) {
      return $("#daterange span").html(start.format("MMMM D, YYYY") + " - " + end.format("MMMM D, YYYY"));
    });
    if (localStorage.getItem("content") !== null) {
      $("#color-settings-body-color").attr("href", localStorage.getItem("content"));
    }
    if ((localStorage.getItem("contrast") !== null) && !$("body").hasClass("contrast-background")) {
      $("body")[0].className = $("body")[0].className.replace(/(^|\s)contrast.*?(\s|$)/g, " ").replace(/\s\s+/g, " ").replace(/(^\s|\s$)/g, "");
      $("body").addClass(localStorage.getItem("contrast"));
    }
    $(".color-settings-body-color > a").hover(function() {
      $("#color-settings-body-color").attr("href", $(this).data("change-to"));
      return localStorage.setItem("content", $(this).data("change-to"));
    });
    return $(".color-settings-contrast-color > a").hover(function() {
      $('body')[0].className = $('body')[0].className.replace(/(^|\s)contrast.*?(\s|$)/g, ' ').replace(/\s\s+/g, ' ').replace(/(^\s|\s$)/g, '');
      $('body').addClass($(this).data("change-to"));
      return localStorage.setItem("contrast", $(this).data("change-to"));
    });
  });

  this.setDraggableEvents = function() {
    return $("#events .external-event").each(function() {
      var eventObject;
      eventObject = {
        title: $.trim($(this).text())
      };
      $(this).data("eventObject", eventObject);
      return $(this).draggable({
        zIndex: 999,
        revert: true,
        revertDuration: 0
      });
    });
  };

  this.setTimeAgoExample = function(selector) {
    var date, months, timeago;
    if (selector == null) {
      selector = $("#timeago-example");
    }
    date = new Date();
    months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    timeago = selector;
    timeago.attr("title", "" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
    timeago.text("" + months[date.getMonth()] + " " + (date.getDate()) + ", " + (date.getFullYear()) + " " + (date.getHours()) + ":" + (date.getMinutes()));
    return timeago.timeago();
  };

}).call(this);
