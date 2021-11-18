<!-- script -->
<script src="{{ asset('js/lib/Chart.min.js') }}"></script>

<div class="chart">
    <canvas id="myChart" width="400" height="200"></canvas>
</div>

<script>
    //To show line chart for posts and users
    Chart.defaults.global.defaultFontColor = "#000";
    Chart.defaults.global.defaultFontFamily = "Poppins";
    let ctx = document.getElementById("myChart").getContext("2d");

    let myChart = new Chart(ctx, {
        type: "line",
        data: {
            labels: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "July",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            datasets: [{
                    label: "Number of Users",
                    data: [12, 19, 3, 5, 2, 3, 9, 19, 6, 8, 5, 3],
                    // backgroundColor: "#e9eefd",
                    borderColor: "#34c85b",
                    borderWidth: 1,
                },
                {
                    label: "Number of Posts",
                    data: [19, 3, 8, 7, 5, 3, 5, 2, 3, 9, 19, 6],
                    // backgroundColor: "#e9eefd",
                    borderColor: "rgba(54, 162, 235, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            title: {
                display: true,
                text: "Line Chart Of New Users",
                fontColor: "#000",
                fontSize: 25,
            },
            legend: {
                position: "right",
                fontColor: "#000",
            },
        },
    });
</script>