@section('page_scripts')
    <script src="{{ asset('dashboardAssets') }}/js/scripts/cards/card-statistics.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    $(window).on('load', function() {
        var options = {
            series: [Number('{{ $managers_count }}'), Number(50), Number('{{ $clients_count }}')],
            labels: ["managers percentage", "providers percentage", "drivers percentage", "clients percentage"],
            chart: {
                type: 'donut',
            },
            responsive: [{
                breakpoint: 480,
                options: {
                    chart: {
                        width: 200
                    },
                    legend: {
                        position: 'bottom'
                    }
                }
            }]
        };
        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();

        var jArray= 00;
        var order_sales= 'kakakakakak';
        var users_count= 'lalalalala';
        var t="rtl"===$("html").attr("data-textdirection");
        var i=document.querySelector("#line-area-chart"),
            n={
                chart:{
                    height:400,
                    type:"area",
                    },
                legend:{
                    labels: {
                        colors: "#ffffff",
                        useSeriesColors: false
                    },
                },
                grid:{
                    xaxis:
                        {
                            lines:{
                                show:!0
                            }
                        }
                },
                colors:['#28C76F', '#FF9F43', '#00CFE8'],
                series:[{
                    name:"{{trans('dashboard.general.visits')}}",
                    color:'#EA5455',
                    data:jArray
                },
                    {name:"{{trans('dashboard.general.users_count')}}",data:users_count},
                    {name:"{{trans('dashboard.general.sales_count')}}",data:order_sales}],
                xaxis: {
                    categories: [
                        "{{ now()->format('Y-m') }}",
                        "{{ now()->subMonths(1)->format('Y-m') }}",
                        "{{ now()->subMonths(2)->format('Y-m') }}",
                        "{{ now()->subMonths(3)->format('Y-m') }}",
                        "{{ now()->subMonths(4)->format('Y-m') }}",
                        "{{ now()->subMonths(5)->format('Y-m') }}",
                        "{{ now()->subMonths(6)->format('Y-m') }}",
                        "{{ now()->subMonths(7)->format('Y-m') }}",
                        "{{ now()->subMonths(8)->format('Y-m') }}",
                        "{{ now()->subMonths(9)->format('Y-m') }}",
                        "{{ now()->subMonths(10)->format('Y-m') }}",
                        "{{ now()->subMonths(11)->format('Y-m') }}",
                    ],
                    labels: {
                        show: true,
                        rotate: -45,
                        rotateAlways: false,
                        hideOverlappingLabels: true,
                        showDuplicates: false,
                        trim: false,
                        minHeight: undefined,
                        maxHeight: 120,
                        style: {
                            colors: "#EA5455",
                            fontSize: '12px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                            fontWeight: 400,
                            cssClass: 'apexcharts-xaxis-label',
                        },
                    },
                },
                fill:{opacity:1,type:"solid"},
                tooltip:{shared:!1},
                yaxis:{
                    opposite:t,
                labels: {
                    show: true,
                    rotateAlways: false,
                    hideOverlappingLabels: true,
                    showDuplicates: false,
                    trim: false,
                    minHeight: undefined,
                    maxHeight: 120,
                    style: {
                        colors: "#ffffff",
                        fontSize: '12px',
                        fontFamily: 'Helvetica, Arial, sans-serif',
                        fontWeight: 400,
                        cssClass: 'apexcharts-xaxis-label',
                    },
                }}
        };
        void 0!==typeof i&&null!==i&&new ApexCharts(i,n).render();
        var visits_options = {
            series: [{
                name: '{{trans('dashboard.general.visits_count')}}',
                data: jArray,
            },
            ],
            chart: {
                height: 430,
                type: 'area'
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                type: 'month',
                categories: [
                        "{{ now()->format('Y-m') }}",
                        "{{ now()->subMonths(1)->format('Y-m') }}",
                        "{{ now()->subMonths(2)->format('Y-m') }}",
                        "{{ now()->subMonths(3)->format('Y-m') }}",
                        "{{ now()->subMonths(4)->format('Y-m') }}",
                        "{{ now()->subMonths(5)->format('Y-m') }}",
                        "{{ now()->subMonths(6)->format('Y-m') }}",
                        "{{ now()->subMonths(7)->format('Y-m') }}",
                        "{{ now()->subMonths(8)->format('Y-m') }}",
                        "{{ now()->subMonths(9)->format('Y-m') }}",
                        "{{ now()->subMonths(10)->format('Y-m') }}",
                        "{{ now()->subMonths(11)->format('Y-m') }}",
                    ]
            },
            tooltip: {
                x: {
                    format: 'dd/MM/yy HH:mm'
                },
            },
        };

        var visits_chart = new ApexCharts(document.querySelector("#visits_chart"), visits_options);
        visits_chart.render();

        if (feather) {
            feather.replace({
                width: 14,
                height: 14
            });
        }
    })

      var ClientChart = function() {
        var _componentEcharts = function() {
            if (typeof echarts == 'undefined') {
                console.warn('Warning - echarts.min.js is not loaded.');
                return;
            }
            // Define elements
            var client_chart_element = document.getElementById('client_chart');
            // Weekly statistics chart config
            if (client_chart_element) {
                // Initialize chart
                var client_chart = echarts.init(client_chart_element);
                // Options
                client_chart.setOption({
                    // Define colors
                    color: ['#EF5350', '#03A9F4' , '#4eeF24' , '#8abF2e', '#ff6600', '#3c28b2' , '#cc33ff'],
                    // Global text styles
                    textStyle: {
                        fontFamily: 'Cairo',
                        fontSize: 14
                    },
                    // Chart animation duration
                    animationDuration: 750,
                    // Setup grid
                    grid: {
                        left: 0,
                        right: 10,
                        top: 35,
                        bottom: 0,
                        containLabel: true
                    },
                    // Add legend
                    legend: {
                        data: [`{{ trans('dashboard.order.orders') }}`,`{{ trans('dashboard.client.clients') }}`, `{{ trans('dashboard.product.products') }}` , `{{ trans('dashboard.store.stores') }}`],
                        itemHeight: 8,
                        itemGap: 20,
                        textStyle: {
                            padding: [0, 5],
                            color:"#ff6600"
                        }
                    },
                    // Add tooltip
                    tooltip: {
                        trigger: 'axis',
                        backgroundColor: 'rgba(0,0,0,0.75)',
                        padding: [10, 15],
                        textStyle: {
                            fontSize: 13,
                            fontFamily: 'Cairo',
                        },
                        axisPointer: {
                            type: 'shadow',
                            shadowStyle: {
                                color: 'rgba(0,0,0,0.025)'
                            }
                        }
                    },

                    // Horizontal axis
                    xAxis: [{
                        type: 'category',
                        data: [
                            "{{ now()->subMonths(11)->format('Y-m') }}",
                            "{{ now()->subMonths(10)->format('Y-m') }}",
                            "{{ now()->subMonths(9)->format('Y-m') }}",
                            "{{ now()->subMonths(8)->format('Y-m') }}",
                            "{{ now()->subMonths(7)->format('Y-m') }}",
                            "{{ now()->subMonths(6)->format('Y-m') }}",
                            "{{ now()->subMonths(5)->format('Y-m') }}",
                            "{{ now()->subMonths(4)->format('Y-m') }}",
                            "{{ now()->subMonths(3)->format('Y-m') }}",
                            "{{ now()->subMonths(2)->format('Y-m') }}",
                            "{{ now()->subMonths(1)->format('Y-m') }}",
                            "{{ now()->format('Y-m') }}",
                        ],
                        axisLabel: {
                            color:"#ff6600"
                        },
                        axisLine: {
                            lineStyle: {
                                color:"#eee"
                            }
                        },
                        splitLine: {
                            show: false,
                            lineStyle: {
                                color: '#eee',
                                type: 'dashed'
                            }
                        }
                    }],

                    // Vertical axis
                    yAxis: [
                        {
                            type: 'value',
                            name: '{{ trans('dashboard.general.counter') }}',
                            axisTick: {
                                show: false
                            },
                            axisLabel: {
                                color:"#ff6600",
                                formatter: function (value, index) {
                                          return Math.abs(value) > 999 ? Math.sign(value)*((Math.abs(value)/1000).toFixed(1)) + 'k' : Math.sign(value)*Math.abs(value)
                                      },
                            },
                            axisLine: {
                                lineStyle: {
                                    color: '#eee'
                                }
                            },
                            splitLine: {
                                show: true,
                                lineStyle: {
                                    color: ['#eee']
                                }
                            },
                            splitArea: {
                                show: true,
                                areaStyle: {
                                    color: ['rgba(250,250,250,0.1)', 'rgba(0,0,0,0.015)']
                                }
                            }
                        }
                    ],

                    // Add series
                    series: [
                        {
                            name: `{{ trans('dashboard.chart.client.active_clients') }}`,
                            type: 'line',
                            smooth: true,
                            symbolSize: 7,
                            data: [
                                {{ $client_active_analytics[now()->subMonths(11)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(10)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(9)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(8)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(7)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(6)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(5)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(4)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(3)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(2)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->subMonths(1)->format('Y-m')] }},
                                {{ $client_active_analytics[now()->format('Y-m')] }}
                            ],
                            itemStyle: {
                                normal: {
                                    borderWidth: 2
                                }
                            }
                        },
                        {
                            name: `{{ trans('dashboard.chart.client.deactive_clients') }}`,
                            type: 'line',
                            smooth: true,
                            symbolSize: 7,
                            data: [
                                {{ $client_deactive_analytics[now()->subMonths(11)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(10)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(9)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(8)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(7)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(6)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(5)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(4)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(3)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(2)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->subMonths(1)->format('Y-m')] }},
                                {{ $client_deactive_analytics[now()->format('Y-m')] }}
                            ],
                            itemStyle: {
                                normal: {
                                    borderWidth: 2
                                }
                            }
                        },
                        {
                            name: `{{ trans('dashboard.chart.client.banned_clients') }}`,
                            type: 'bar',
                            smooth: true,
                            symbolSize: 7,
                            data: [
                                {{ $client_banned_analytics[now()->subMonths(11)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(10)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(9)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(8)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(7)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(6)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(5)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(4)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(3)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(2)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->subMonths(1)->format('Y-m')] }},
                                {{ $client_banned_analytics[now()->format('Y-m')] }}
                            ],
                            itemStyle: {
                                normal: {
                                    borderWidth: 2
                                }
                            }
                        }
                    ]
                });

                //client_chart.on('click', function (e) {
                // printing data name in console
                //});
            }


            //
            // Resize client
            //

            // Resize function
            var triggerChartResize = function() {
                client_chart_element && client_chart.resize();
            };

            // On sidebar width change
            $(document).on('click', '.sidebar-control', function() {
                setTimeout(function () {
                    triggerChartResize();
                }, 0);
            });

            // On window resize
            var resizeCharts;
            window.onresize = function () {
                clearTimeout(resizeCharts);
                resizeCharts = setTimeout(function () {
                    triggerChartResize();
                }, 200);
            };
        };
        return {
            init: function() {
                _componentEcharts();
            }
        }
    }();
</script>
@endsection
