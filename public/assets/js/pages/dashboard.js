var optionsProfileVisit = {
    annotations: {
        position: 'back'
    },
    dataLabels: {
        enabled: false
    },
    chart: {
        type: 'bar',
        height: 300
    },
    fill: {
        opacity: 1
    },
    plotOptions: {},
    series: [{
        name: 'sales',
        data: [9, 20, 30, 20, 10, 20, 30, 20, 10, 20, 30, 20]
    }],
    colors: '#435ebe',
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    },
}
let optionsVisitorsProfile = {
    series: [70, 30],
    labels: ['Male', 'Female'],
    colors: ['#435ebe', '#55c6e8'],
    chart: {
        type: 'donut',
        width: '100%',
        height: '350px'
    },
    legend: {
        position: 'bottom'
    },
    plotOptions: {
        pie: {
            donut: {
                size: '30%'
            }
        }
    }
}

var optionsEurope = {
    series: [{
        name: 'series1',
        data: [310, 800, 600, 430, 540, 340, 605, 805, 430, 540, 340, 605]
    }],
    chart: {
        height: 80,
        type: 'area',
        toolbar: {
            show: false,
        },
    },
    colors: ['#5350e9'],
    stroke: {
        width: 2,
    },
    grid: {
        show: false,
    },
    dataLabels: {
        enabled: false
    },
    xaxis: {
        type: 'datetime',
        categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z", "2018-09-19T07:30:00.000Z", "2018-09-19T08:30:00.000Z", "2018-09-19T09:30:00.000Z", "2018-09-19T10:30:00.000Z", "2018-09-19T11:30:00.000Z"],
        axisBorder: {
            show: false
        },
        axisTicks: {
            show: false
        },
        labels: {
            show: false,
        }
    },
    show: false,
    yaxis: {
        labels: {
            show: false,
        },
    },
    tooltip: {
        x: {
            format: 'dd/MM/yy HH:mm'
        },
    },
};

let optionsAmerica = {
    ...optionsEurope,
    colors: ['#008b75'],
}
let optionsIndonesia = {
    ...optionsEurope,
    colors: ['#dc3545'],
}



// var chartProfileVisit = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsProfileVisit);
// var chartVisitorsProfile = new ApexCharts(document.getElementById('chart-visitors-profile'), optionsVisitorsProfile)
// var chartEurope = new ApexCharts(document.querySelector("#chart-europe"), optionsEurope);
// var chartAmerica = new ApexCharts(document.querySelector("#chart-america"), optionsAmerica);
// var chartIndonesia = new ApexCharts(document.querySelector("#chart-indonesia"), optionsIndonesia);

// chartIndonesia.render();
// chartAmerica.render();
// chartEurope.render();
// chartProfileVisit.render();
// chartVisitorsProfile.render()

;
(function ($) {
    $.fn.preloadinator = function (options) {
        'use strict';

        var settings = $.extend({
                scroll: false,
                minTime: 0,
                animation: 'fadeOut',
                animationDuration: 400,
                afterDisableScroll: function () {},
                afterEnableScroll: function () {},
                afterRemovePreloader: function () {}
            }, options),
            preloader = this,
            start = new Date().getTime();

        $.fn.preloadinator.disableScroll = function () {
            $('body').css('overflow', 'hidden');

            if (typeof settings.afterDisableScroll == 'function') {
                settings.afterDisableScroll.call(this);
            }
        }

        $.fn.preloadinator.enableScroll = function () {
            $('body').css('overflow', 'auto');

            if (typeof settings.afterEnableScroll == 'function') {
                settings.afterEnableScroll.call(this);
            }
        }

        $.fn.preloadinator.removePreloader = function () {
            $(preloader)[settings.animation](settings.animationDuration, function () {
                if (settings.scroll === false) {
                    $.fn.preloadinator.enableScroll();
                }
                if (typeof settings.afterRemovePreloader == 'function') {
                    settings.afterRemovePreloader.call(this);
                }
            });
        }

        $.fn.preloadinator.minTimeElapsed = function () {
            var now = new Date().getTime(),
                elapsed = now - start;

            if (elapsed >= settings.minTime) {
                return true;
            } else {
                return false;
            }
        }

        if (settings.scroll === false) {
            $.fn.preloadinator.disableScroll();
        }

        $(window).on('load', function () {
            if ($.fn.preloadinator.minTimeElapsed()) {
                $.fn.preloadinator.removePreloader();
            } else {
                var now = new Date().getTime(),
                    elapsed = now - start;

                setTimeout($.fn.preloadinator.removePreloader, settings.minTime - elapsed);
            }
        });

        return this;
    }
}(jQuery));

function getDateDiff(time1, time2, abs=true) {
    // console.log(time1);
    var str1= time1.split('-');
    var str2= time2.split('-');
    //                yyyy   , mm       , dd
    var t1 = new Date(str1[0], str1[1]-1, str1[2]);
    var t2 = new Date(str2[0], str2[1]-1, str2[2]);
  
    var diffMS = t1 - t2;    
    // console.log(diffMS + ' ms');
  
    var diffS = diffMS / 1000;    
    // console.log(diffS + ' ');
  
    var diffM = diffS / 60;
    // console.log(diffM + ' minutes');
  
    var diffH = diffM / 60;
    // console.log(diffH + ' hours');
  
    var diffD = diffH / 24;
    // console.log(diffD + ' days');
    // alert(diffD);
    if (abs==true) {
        return Math.abs(diffD);
    }else{
        return diffD;
    }
  }

  function cekSingle(m) {
    return m < 10 ? '0'+m: m;
  }
  
