(function() {
  var data, dataset, gd, options, previousLabel, previousPoint, showTooltip, ticks;

  $(document).ready(function() {
    var blue, data, datareal, getRandomData, green, i, newOrders, options, orange, orders, placeholder, plot, purple, randNumber, randSmallerNumber, red, series, totalPoints, update, updateInterval;
    red = "#f34541";
    orange = "#f8a326";
    blue = "#00acec";
    purple = "#9564e2";
    green = "#49bf67";
    randNumber = function() {
      return ((Math.floor(Math.random() * (1 + 50 - 20))) + 20) * 800;
    };
    randSmallerNumber = function() {
      return ((Math.floor(Math.random() * (1 + 40 - 20))) + 10) * 200;
    };
    if ($("#stats-chart1").length !== 0) {
      orders = [[1, randNumber() - 10], [2, randNumber() - 10], [3, randNumber() - 10], [4, randNumber()], [5, randNumber()], [6, 4 + randNumber()], [7, 5 + randNumber()], [8, 6 + randNumber()], [9, 6 + randNumber()], [10, 8 + randNumber()], [11, 9 + randNumber()], [12, 10 + randNumber()], [13, 11 + randNumber()], [14, 12 + randNumber()], [15, 13 + randNumber()], [16, 14 + randNumber()], [17, 15 + randNumber()], [18, 15 + randNumber()], [19, 16 + randNumber()], [20, 17 + randNumber()], [21, 18 + randNumber()], [22, 19 + randNumber()], [23, 20 + randNumber()], [24, 21 + randNumber()], [25, 14 + randNumber()], [26, 24 + randNumber()], [27, 25 + randNumber()], [28, 26 + randNumber()], [29, 27 + randNumber()], [30, 31 + randNumber()]];
      newOrders = [[1, randSmallerNumber() - 10], [2, randSmallerNumber() - 10], [3, randSmallerNumber() - 10], [4, randSmallerNumber()], [5, randSmallerNumber()], [6, 4 + randSmallerNumber()], [7, 5 + randSmallerNumber()], [8, 6 + randSmallerNumber()], [9, 6 + randSmallerNumber()], [10, 8 + randSmallerNumber()], [11, 9 + randSmallerNumber()], [12, 10 + randSmallerNumber()], [13, 11 + randSmallerNumber()], [14, 12 + randSmallerNumber()], [15, 13 + randSmallerNumber()], [16, 14 + randSmallerNumber()], [17, 15 + randSmallerNumber()], [18, 15 + randSmallerNumber()], [19, 16 + randSmallerNumber()], [20, 17 + randSmallerNumber()], [21, 18 + randSmallerNumber()], [22, 19 + randSmallerNumber()], [23, 20 + randSmallerNumber()], [24, 21 + randSmallerNumber()], [25, 14 + randSmallerNumber()], [26, 24 + randSmallerNumber()], [27, 25 + randSmallerNumber()], [28, 26 + randSmallerNumber()], [29, 27 + randSmallerNumber()], [30, 31 + randSmallerNumber()]];
      plot = $.plot($("#stats-chart1"), [
        {
          data: orders,
          label: "Orders"
        }, {
          data: newOrders,
          label: "New rders"
        }
      ], {
        series: {
          lines: {
            show: true,
            lineWidth: 3
          },
          shadowSize: 0
        },
        legend: {
          show: false
        },
        grid: {
          clickable: true,
          hoverable: true,
          borderWidth: 0,
          tickColor: "#f4f7f9"
        },
        colors: ["#00acec", "#f8a326"]
      });
    }
    if ($("#stats-chart2").length !== 0) {
      orders = [[1, randNumber() - 5], [2, randNumber() - 6], [3, randNumber() - 10], [4, randNumber()], [5, randNumber()], [6, 4 + randNumber()], [7, 10 + randNumber()], [8, 12 + randNumber()], [9, 6 + randNumber()], [10, 8 + randNumber()], [11, 9 + randNumber()], [12, 10 + randNumber()], [13, 11 + randNumber()], [14, 12 + randNumber()], [15, 3 + randNumber()], [16, 14 + randNumber()], [17, 14 + randNumber()], [18, 15 + randNumber()], [19, 16 + randNumber()], [20, 17 + randNumber()], [21, 18 + randNumber()], [22, 19 + randNumber()], [23, 20 + randNumber()], [24, 21 + randNumber()], [25, 14 + randNumber()], [26, 24 + randNumber()], [27, 25 + randNumber()], [28, 26 + randNumber()], [29, 27 + randNumber()], [30, 31 + randNumber()]];
      newOrders = [[1, randSmallerNumber() - 10], [2, randSmallerNumber() - 10], [3, randSmallerNumber() - 10], [4, randSmallerNumber()], [5, randSmallerNumber()], [6, 4 + randSmallerNumber()], [7, 5 + randSmallerNumber()], [8, 6 + randSmallerNumber()], [9, 6 + randSmallerNumber()], [10, 8 + randSmallerNumber()], [11, 9 + randSmallerNumber()], [12, 10 + randSmallerNumber()], [13, 11 + randSmallerNumber()], [14, 12 + randSmallerNumber()], [15, 13 + randSmallerNumber()], [16, 14 + randSmallerNumber()], [17, 15 + randSmallerNumber()], [18, 15 + randSmallerNumber()], [19, 16 + randSmallerNumber()], [20, 17 + randSmallerNumber()], [21, 18 + randSmallerNumber()], [22, 19 + randSmallerNumber()], [23, 20 + randSmallerNumber()], [24, 21 + randSmallerNumber()], [25, 14 + randSmallerNumber()], [26, 24 + randSmallerNumber()], [27, 25 + randSmallerNumber()], [28, 26 + randSmallerNumber()], [29, 27 + randSmallerNumber()], [30, 31 + randSmallerNumber()]];
      plot = $.plot($("#stats-chart2"), [
        {
          data: orders,
          label: "Orders"
        }, {
          data: newOrders,
          label: "New orders"
        }
      ], {
        series: {
          lines: {
            show: true,
            lineWidth: 3
          },
          shadowSize: 0
        },
        legend: {
          show: false
        },
        grid: {
          clickable: true,
          hoverable: true,
          borderWidth: 0,
          tickColor: "#f4f7f9"
        },
        colors: ["#f34541", "#49bf67"]
      });
      $("#stats-chart2").bind("plotclick", function(event, pos, item) {
        if (item) {
          return alert("Yeah! You just clicked on point " + item.dataIndex + " in " + item.series.label + ".");
        }
      });
    }
    if ($("#stats-chart4").length !== 0) {
      $("#stats-chart4").sparkline([5, 6, 7, 2, 0, -4, -2, -8, 3, 0, -3, 10], {
        type: "bar",
        width: "100",
        height: "100",
        barWidth: 8,
        barColor: green,
        negBarColor: red
      });
    }
    if ($("#stats-chart5").length !== 0) {
      $("#stats-chart5").sparkline([1, 1, 3], {
        width: "100",
        height: "100",
        type: "pie",
        sliceColors: [green, purple, red]
      });
    }
    if ($("#stats-chart6").length !== 0) {
      $("#stats-chart6").sparkline([5, 6, 7, 9, 9, 5, 3, 2, 2, 4, 6, 7], {
        width: "100",
        height: "30",
        type: "line",
        lineColor: "#ff0000"
      });
    }
    if ($("#stats-chart3").length !== 0) {
      datareal = [];
      totalPoints = 300;
      getRandomData = function() {
        var i, prev, res, y;
        if (datareal.length > 0) {
          datareal = datareal.slice(1);
        }
        while (datareal.length < totalPoints) {
          prev = (datareal.length > 0 ? datareal[datareal.length - 1] : 50);
          y = prev + Math.random() * 10 - 5;
          if (y < 0) {
            y = 0;
          }
          if (y > 100) {
            y = 100;
          }
          datareal.push(y);
        }
        res = [];
        i = 0;
        while (i < datareal.length) {
          res.push([i, datareal[i]]);
          ++i;
        }
        return res;
      };
      update = function() {
        plot.setData([getRandomData()]);
        plot.draw();
        return setTimeout(update, updateInterval);
      };
      datareal = [];
      totalPoints = 300;
      updateInterval = 30;
      options = {
        series: {
          shadowSize: 0
        },
        yaxis: {
          min: 0,
          max: 100
        },
        xaxis: {
          show: false
        }
      };
      plot = $.plot($("#stats-chart3"), [getRandomData()], options);
      update();
    }
    if ($("#stats-chart8").length !== 0) {
      data = [];
      series = Math.floor(Math.random() * 6) + 3;
      i = 0;
      while (i < series) {
        data[i] = {
          label: "Series" + (i + 1),
          data: Math.floor(Math.random() * 100) + 1
        };
        i++;
      }
      placeholder = $("#stats-chart8");
      return $.plot(placeholder, data, {
        series: {
          pie: {
            show: true
          }
        }
      });
    }
  });

  if ($("#stats-chart7").length !== 0) {
    gd = function(year, month, day) {
      return new Date(year, month, day).getTime();
    };
    showTooltip = function(x, y, color, contents) {
      return $("<div id=\"tooltip\">" + contents + "</div>").css({
        position: "absolute",
        display: "none",
        top: y - 40,
        left: x - 120,
        border: "2px solid " + color,
        padding: "3px",
        "font-size": "9px",
        "border-radius": "5px",
        "background-color": "#fff",
        "font-family": "Verdana, Arial, Helvetica, Tahoma, sans-serif",
        opacity: 0.9
      }).appendTo("body").fadeIn(200);
    };
    data = [[0, 11], [1, 15], [2, 25], [3, 24], [4, 13], [5, 18]];
    dataset = [
      {
        label: "2012 Average Temperature",
        data: data,
        color: "#5482FF"
      }
    ];
    ticks = [[0, "London"], [1, "New York"], [2, "New Delhi"], [3, "Taipei"], [4, "Beijing"], [5, "Sydney"]];
    options = {
      series: {
        bars: {
          show: true
        }
      },
      bars: {
        align: "center",
        barWidth: 0.5
      },
      xaxis: {
        axisLabel: "World Cities",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: "Verdana, Arial",
        axisLabelPadding: 10,
        ticks: ticks
      },
      yaxis: {
        axisLabel: "Average Temperature",
        axisLabelUseCanvas: true,
        axisLabelFontSizePixels: 12,
        axisLabelFontFamily: "Verdana, Arial",
        axisLabelPadding: 3,
        tickFormatter: function(v, axis) {
          return v + "°C";
        }
      },
      legend: {
        noColumns: 0,
        labelBoxBorderColor: "#000000",
        position: "nw"
      },
      grid: {
        hoverable: true,
        borderWidth: 2,
        backgroundColor: {
          colors: ["#ffffff", "#EDF5FF"]
        }
      }
    };
    $(document).ready(function() {
      $.plot($("#stats-chart7"), dataset, options);
      return $("#stats-chart7").UseTooltip();
    });
    previousPoint = null;
    previousLabel = null;
    $.fn.UseTooltip = function() {
      return $(this).bind("plothover", function(event, pos, item) {
        var color, x, y;
        if (item) {
          if ((previousLabel !== item.series.label) || (previousPoint !== item.dataIndex)) {
            previousPoint = item.dataIndex;
            previousLabel = item.series.label;
            $("#tooltip").remove();
            x = item.datapoint[0];
            y = item.datapoint[1];
            color = item.series.color;
            return showTooltip(item.pageX, item.pageY, color, "<strong>" + item.series.label + "</strong><br>" + item.series.xaxis.ticks[x].label + " : <strong>" + y + "</strong> °C");
          }
        } else {
          $("#tooltip").remove();
          return previousPoint = null;
        }
      });
    };
  }

}).call(this);
