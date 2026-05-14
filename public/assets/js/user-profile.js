var options = {
    series: [44, 55, 41, 17],
    labels: ['Total user', 'Recently user', 'Sellers', 'Buyers'],
    chart: {
        type: 'donut',
        width: 320,
    },
  dataLabels: {
    enabled: false
  },
  colors: ["rgba(100, 117, 137, 0.1)", "#f35d43", "#89c826", "#f35d43"],
  plotOptions: {
    pie: {
      expandOnClick: false
    }
  },
  responsive: [{
    breakpoint: 1730,
    options: {
      chart: {
        width: 280
      },
      legend: {
        position: 'bottom'
      }
    }
  },
  {
    breakpoint: 1200,
    options: {
      chart: {
        width: 300
      },
      legend: {
        position: 'bottom'
      }
    }
  },
  {
    breakpoint: 768,
    options: {
      chart: {
        width: 380
      },
      legend: {
        position: 'right',
        horizontalAlign: 'right', 
      }
    }
  },
  {
    breakpoint: 480,
    options: {
      chart: {
        width: 340
      },
      legend: {
        position: 'bottom'
      }
    }
  },
  {
    breakpoint: 406,
    options: {
      chart: {
        width: 250
      },
      legend: {
        horizontalAlign: 'center', 
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#userchart"), options);
  chart.render();

  // agent chart
  var options1 = {
    series: [30, 70, 50, 20],
    labels: ['Total agent', 'Recently agent', 'Sellers', 'Buyers'],
    chart: {
        type: 'donut',
        width: 320,
    },
  dataLabels: {
    enabled: false
  },
  colors: ["rgba(100, 117, 137, 0.1)", "#f35d43", "#89c826", "#f35d43"],
  plotOptions: {
    pie: {
      expandOnClick: false
    }
  },
  responsive: [{
    breakpoint: 1730,
    options: {
      chart: {
        width: 280
      },
      legend: {
        position: 'bottom'
      }
    }
  },
  {
    breakpoint: 1200,
    options: {
      chart: {
        width: 300
      },
      legend: {
        position: 'bottom'
      }
    }
  },
  {
    breakpoint: 768,
    options: {
      chart: {
        width: 380
      },
      legend: {
        position: 'right',
        horizontalAlign: 'right', 
      }
    }
  },
  {
    breakpoint: 480,
    options: {
      chart: {
        width: 340
      },
      legend: {
        position: 'bottom'
      }
    }
  },
  {
    breakpoint: 406,
    options: {
      chart: {
        width: 250
      },
      legend: {
        horizontalAlign: 'center', 
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#agentchart"), options1);
  chart.render();
  // earning chart
  new Chartist.Bar('.earnings', {
    labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7', 'Q8', 'Q9', 'Q10', 'Q11', 'Q12', 'Q13', 'Q14'],
    series: [
        [400, 900, 800, 1000, 700, 1200, 300, 400, 300, 600, 800, 400, 200,500, 400]
    ]
    }, {
    plugins: [
        Chartist.plugins.tooltip({
            appendToBody: false,
            className: "ct-tooltip"
        })
    ],
    stackBars: true,
    chartPadding: {
        top: -30,
        right: 0,
        left: 0,
        bottom: -5
    },
    axisX: {
        showGrid: false,
        showLabel: false,
        offset: 0
    },
    axisY: {
        low: 0,
        showGrid: false,
        showLabel: false,
        offset: 0,
        labelInterpolationFnc: function (value) {
            return (value / 1000) + 'k';
        }
    }
    }).on('draw', function (data) {
    if (data.type === 'bar') {
        data.element.attr({
            style: 'stroke-width: 15px'
        });
    }
    });

    // slider 

    $('.slide-2').slick({
        dots: false,
        infinite: true,
        speed: 700,
        arrows: false,
        autoplay: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        responsive: [
            {
                breakpoint: 481,
                settings: {
                    slidesToShow: 2,
                }
            }
        ]
    });