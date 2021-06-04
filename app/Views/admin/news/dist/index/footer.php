<script>
    initalize_dataTables('#news_list')
    initalize_dataTables('#news_review')
    initalize_dataTables('#news-track')

    var delayed
    var ctx_1 = document.getElementById('track-all').getContext('2d');
    var myChart_1 = new Chart(ctx_1, {
        type: 'line',
        data: <?= $datasets ?>,
        options: {
            responsive: true,
            bezierCurve: false,
            legend: {
                position: 'right',
            },
            title: {
                display: true,
                text: 'Track Kunjungan Berita',
                position: 'top',

            },
            interaction: {
                intersect: false,
            },
            animation: {
                onComplete: () => {
                    delayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            }
        }
    });

    document.getElementById("downloadChartAll").addEventListener('click', function() {
        var url_base64jp = document.getElementById("track-all").toDataURL("image/jpg");
        var a = document.getElementById("downloadChartAll");
        a.href = url_base64jp;
    });
</script>

<script>
    // $(document).ready(function() {
    //     setInterval(function() {
    //         push_comment()
    //     }, 5000);
    // })
</script>