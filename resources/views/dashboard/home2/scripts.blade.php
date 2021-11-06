@section('page_scripts')
    <script src="{{ asset('dashboardAssets') }}/js/scripts/cards/card-statistics.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    $(window).on('load', function() {
        var options = {
            series: [Number('{{ $managers_count }}'), Number('{{ $clients_count }}')],
            labels: ["managers percentage", "clients percentage"],
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

        var users_count= {{json_encode(array_values($clients_analytics))}};
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
</script>
@endsection
