<!doctype html>
<html lang="en">

<head>
    <?php include '../app/views/components/head.php'; ?>

    <title>Income</title>

    <link href="<?= ROOT ?>/assets/css/owner.css" rel="stylesheet">
    <link href="<?= ROOT ?>/assets/css/owner-profile.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<?php
include '../app/views/components/ownernavbar.php';
include '../app/views/components/ownersidebar.php';
?>

<div class="col">
    <div class="header orange-header">
        <button style="background-color: #f4511e;"><h3 type="button">E-Ticket Income</h3></button>
        <div class="row">
            <label for="start_date">Start Date</label>
            <input type="date" class="form-control" id="start_date" name="start_date"
            value="<?= date('Y-m-d', strtotime('last month')) ?>">
            <label for="end_date">End Date</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="<?= date('Y-m-d') ?>">
        </div>
    </div>
    <main class="container">

        <div class="canvas-container w-75 h-50 m-5 p-5 rounded" style="background-color: white">
            <canvas id="myChart"></canvas>
        </div>
    </main>
</div>


</body>

</html>

<script>

    let data = <?php echo json_encode($revenue); ?>;

    function drawChart(data) {
    if(!data){
        data = [{bus_no: 'No Data Available', total: 0}]
        var yname=""
    }
        document.querySelector('.canvas-container').innerHTML = '<canvas id="myChart"></canvas>'
        const ctx = document.getElementById('myChart').getContext('2d')
        //destroy previous chart if it exists


        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.map(d => d.bus_no),
                datasets: [{
                    label: 'Income',
                    data: data.map(d => d.total),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        display: true,
                        title: {
                            display: true,
                            text: yname
                        }
                    },
                    y: {
                        display: true,
                        title: {
                            display: true,
                            text: 'Income (LKR)'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    }

    drawChart(data)

    function requestAPI() {
        let url = `${ROOT}/ownerincome/api_get_BusRevenue`
        let options = {
            method: 'POST',
            body: JSON.stringify({
                start_date: document.getElementById('start_date').value,
                end_date: document.getElementById('end_date').value
            })
        }
        fetch(url, options)
            .then(res => res.json())
            .then(data => {
                drawChart(data.data)
            })

    }

    document.getElementById('start_date').addEventListener('change', (e) => {
        if (e.target.value > document.getElementById('end_date').value) {
            document.getElementById('end_date').value = e.target.value
            new Toast('fa fa-warning', 'rgba(234,0,0,0.91)', 'Invalid date', 'Start date cannot be greater than end date', true, 3000)
        } else {
            requestAPI()
        }
    })
    document.getElementById('end_date').addEventListener('change', (e) => {
        if (e.target.value < document.getElementById('start_date').value) {
            document.getElementById('start_date').value = e.target.value
            new Toast('fa fa-warning', 'rgba(234,0,0,0.91)', 'Invalid date', 'Start date cannot be greater than end date', true, 3000)
        } else {
            requestAPI()
        }
    })

</script>
