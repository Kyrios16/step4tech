//To show daily post count chart
(function ($) {
    var charts = {
        init: function () {
            // -- Set new default font family and font color to mimic Bootstrap's default styling
            Chart.defaults.global.defaultFontColor = "#000";
            Chart.defaults.global.defaultFontFamily = "Poppins";

            this.ajaxGetPostDailyData();
        },

        ajaxGetPostDailyData: function () {
            var urlPath = "/api/admin/chart";
            var request = $.ajax({
                method: "GET",
                url: urlPath,
            });

            request.done(function (res) {
                charts.createCompletedJobsChart(res);
            });
        },

        /**
         * Created the Completed Jobs Chart
         */
        createCompletedJobsChart: function (res) {
            const biggestCount = Math.max(...Object.values(res));
            const remainder = biggestCount / 10;
            const max = Object.hasOwnProperty(Object.values(res))
                ? Math.ceil(remainder) * 10
                : 10;

            let days = ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"];
            let labels = Object.hasOwnProperty(Object.keys(res))
                ? Object.keys(res)
                : days;
            var ctx = document.getElementById("myChart");
            var myChart = new Chart(ctx, {
                type: "line",
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: "no. of posts",
                            lineTension: 0.3,
                            backgroundColor: "rgba(75, 192, 192, 0.2)",
                            borderColor: "#34c85b",
                            pointRadius: 5,
                            pointBackgroundColor: "rgba(2,117,216,1)",
                            pointBorderColor: "rgba(255,255,255,0.8)",
                            pointHoverRadius: 5,
                            pointHoverBackgroundColor: "rgba(255, 206, 86, 1)",
                            pointHitRadius: 20,
                            pointBorderWidth: 2,
                            data: Object.values(res),
                        },
                    ],
                },
                options: {
                    scales: {
                        xAxes: [
                            {
                                time: {
                                    unit: "date",
                                },
                                gridLines: {
                                    display: false,
                                },
                                ticks: {
                                    maxTicksLimit: 7,
                                },
                            },
                        ],
                        yAxes: [
                            {
                                ticks: {
                                    min: 0,
                                    max: max,
                                    maxTicksLimit: 5,
                                },
                                gridLines: {
                                    color: "rgba(0, 0, 0, .125)",
                                },
                            },
                        ],
                    },
                    title: {
                        display: true,
                        text: "Line Chart Of Daily Posts Count",
                        fontColor: "#000",
                        fontSize: 25,
                    },
                    legend: {
                        display: false,
                    },
                },
            });
        },
    };

    charts.init();
})(jQuery);
