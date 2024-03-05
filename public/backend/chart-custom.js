function createNew(labels,series,total_label,total_count,colors) {
    var legendColor = "#000";
    var headingColor = "#333";
    return donutChartConfig = {
        chart: {
            height: 390,type: 'donut'
        },
        labels: labels,
        series: series,
        colors: colors,
        stroke: {
            show: false,
            curve: 'straight'
        },
        dataLabels: {
            enabled: true,
            formatter: function (val, opt) {
                return parseInt(val, 10) + '%';
            }
        },
        legend: {
            show: true,
            position: 'bottom',
            markers: { offsetX: -3 },
            itemMargin: {
                vertical: 3,
                horizontal: 10
            },
            labels: {
                colors: legendColor,
                useSeriesColors: false
            }
        },
        plotOptions: {
            pie: {
                donut: {
                    labels: {
                        show: true,
                        name: {
                            fontSize: '2rem',
                            fontFamily: 'Open Sans'
                        },
                        value: {
                            fontSize: '1.2rem',
                            color: legendColor,
                            fontFamily: 'Open Sans',
                            formatter: function (val) {
                                return parseInt(val, 10);
                            }
                        },
                        total: {
                            show: true,
                            fontSize: '1.5rem',
                            color: headingColor,
                            label: total_label,
                            formatter: function (w) {
                                return total_count;
                            }
                        }
                    }
                }
            }
        },
        responsive: [
            {
                breakpoint: 992,
                options: {
                    chart: {height: 380},
                    legend: {
                        position: 'bottom',
                        labels: {
                            colors: legendColor,
                            useSeriesColors: false
                        }
                    }
                }
            },
            {
                breakpoint: 576,
                options: {
                    chart: {height: 320},
                    plotOptions: {
                    pie: {
                        donut: {
                            labels: {
                                show: true,
                                name: {fontSize: '1.5rem'},
                                value: {fontSize: '1rem'},
                                total: {fontSize: '1.5rem'}
                            }
                        }
                    }
                    },
                    legend: {
                        position: 'bottom',
                        labels: {
                            colors: legendColor,
                            useSeriesColors: false
                        }
                    }
                }
            },
            {
                breakpoint: 420,
                options: {
                    chart: {height: 280},
                    legend: {show: false}
                }
            },
            {
                breakpoint: 360,
                options: {
                    chart: {height: 250},
                    legend: {show: false}
                }
            }
        ]
    };
}
