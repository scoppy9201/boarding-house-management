var options = {
    chart: {
        width: 470,
        type: 'donut',
        dropShadow: {
          enabled: true,
          color: '#111',
          top: -1,
          left: 3,
          blur: 3,
          opacity: 0.2
        }
    },
    dataLabels: {
        enabled: false,
        dropShadow: {
            blur: 3,
            opacity: 0.5
        },
    },
    series: [50, 30, 41],
    labels: ["Channai", "Ahemdabad", "Banglore"],
    legend: {
        formatter: function(val, opts) {
            return val + " - " + opts.w.globals.series[opts.seriesIndex] + "%"
        }
    },
    colors: ["rgba(243, 93, 67, 0.3)", "rgba(243, 93, 67, 0.5)", "#f35d43"],
    responsive: [{
        breakpoint: 1900,
        options: {
            chart: {
                width: 420
            },
        }
    },
    {
        breakpoint: 1776,
        options: {
            chart: {
                width: 380
            },
        }
    },
    {
        breakpoint: 1661,
        options: {
            chart: {
                width: 360
            },
            legend: {
                position: 'bottom'
            }
        }
    },
    {
        breakpoint: 480,
        options: {
            chart: {
                width: 250
            },
            legend: {
                position: 'bottom'
            }
        }
    }]

}

var chart = new ApexCharts(
    document.querySelector("#revenuechart"),
    options
);

chart.render();

const paper = chart.paper()


// income chart
var options1 = {
    series: [{
            name: "Rent income",
            data: [20, 25, 20, 30, 20, 50, 30, 35, 25, 60, 0]
        },
        {
            name: "Sale income",
            data: [10, 20, 10, 15, 10, 20, 15, 10, 15, 20, 0]
        }
    ],
    chart: {
        height: 320,
        type: 'area',
        dropShadow: {
            enabled: true,
            top: 10,
            left: 0,
            blur: 3,
            color: '#720f1e',
            opacity: 0.15
        },
        toolbar: {
            show: false
        },
        zoom: {
            enabled: false
        },
    },
    markers: {
        strokeWidth: 4,
        strokeColors: "#ffffff",
        hover: {
            size: 9,
        }
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        curve: 'smooth',
        lineCap: 'butt',
        width: 4,
    },
    legend: {
        show: false
    },
    colors: ["#ff5c41", "#89c826"],
    fill: {
        type: 'gradient',
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.5,
            opacityTo: 0.4,
            stops: [0, 90, 100]
        }
    },
    grid: {
        xaxis: {
            lines: {
                borderColor: 'transparent',
                show: false,
            }
        },
        yaxis: {
            lines: {
                borderColor: 'transparent',
                show: false,
            }

        },
        padding: {
            right: -112,
            bottom: 0,
            left: 15
        }
    },
    responsive: [{
        breakpoint: 1200,
        options: {
            grid: {
                padding: {
                    right: -95,
                }
            },
        },
    },
    {
        breakpoint: 992,
        options: {
            grid: {
                padding: {
                    right: -69,
                }
            },
        },
    }
    ],
    yaxis: {
        labels: {
            formatter: function (value) {
                return value + "K";
            }
        },
        axisBorder: {
            low: 0,
            offsetX: 0,
            show: false,
        },
        axisTicks: {
            show: false,
        },
        crosshairs: {
            show: false,
        },
    },
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec",],
        range: undefined,
        axisBorder: {
            low: 0,
            offsetX: 0,
            show: false,
        },
        axisTicks: {
            show: false,
        },
        crosshairs: {
            show: true,
            position: 'back',
            stroke: {
                color: '#ff5c41',
                width: 1,
                dashArray: 0,
            },
        },
    },
    tooltip: {
        formatter: undefined,
    },
};

var chart = new ApexCharts(document.querySelector("#incomechart"), options1);
chart.render();

// vector map 
'use strict';
! function(maps) {
    "use strict";
    var b = function() {};
    b.prototype.init = function() {
        maps("#asia").vectorMap({
            map: "asia_mill",
            backgroundColor: "transparent",
            markerStyle: {
                initial: {
                    fill: '#F8E23B',
                    stroke: '#383f47'
                }
            },
            markers: [
                {latLng: [23.0225, 72.5714], name: 'Ahemdabad'},
                {latLng: [25.2744, 133.7751], name: 'Australia'},
                {latLng: [33.2232, 43.6793], name: 'Iraq'},
                {latLng: [35.8617, 104.1954], name: 'Chaina'},
                {latLng: [33.9391, 67.7100], name: 'Afghanistan'},
                {latLng: [3.2, 73.22], name: 'Maldives'},
           ],
            regionStyle: {
                initial: {
                    fill: "#f35d43"
                } 
            }
        })
    }, maps.VectorMap = new b, maps.VectorMap.Constructor = b
}(window.jQuery),
function(maps) {
    "use strict";
    maps.VectorMap.init()
}(window.jQuery);