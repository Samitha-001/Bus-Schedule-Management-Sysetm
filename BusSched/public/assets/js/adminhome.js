document.addEventListener("DOMContentLoaded", function () {
    
    // pie chart for system users
    function drawPieChart() {
        var ctx = document.getElementById("usersPieChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Registered buses","Conductors","Owners", "Drivers", "Passengers"],
                datasets: [{
                    borderColor: "rgba(0,0,0,0.1)",
                    backgroundColor: ["#007bff", "#dc3545", "#ffc107", "#28a745", "#17a2b8"],
                    label: 'Registered users',
                    data: [200, 60, 20, 60, 65],
                    hoverOffset: 4
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Registered Users',
                    fontSize: 15,
                },
                layout: {
                    padding: {
                        top: 10,
                    }
                },
                legend: {
                    'position': 'right'
                }
            }
        });

    }
    drawPieChart();

    // function for schedule adherance chart
    function drawLineChart() {
        const data = {
            labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'],
            datasets: [{
                // label: 'Schedule Adherence',
                data: [80, 75, 85, 90, 92],
                fill: false,
                borderColor: 'rgb(75, 192, 192)',
                tension: 0.1
            }]
        };
    
        // Configuration Options
        const config = {
            type: 'line',
            data: data,
            options: {
                title: {
                    display: true,
                    text: 'Adherance to Schedule',
                    fontSize: 15,
                },
                responsive: true,
                scales: {
                    y: {
                        min: 0,
                        max: 100,
                        ticks: {
                            stepSize: 10
                        }
                    }
                },
                legend: {
                    display: false,
                    // 'position': 'right'
                }
            }
        };
    
        // Creating Chart
        const myChart = new Chart(
            document.getElementById('scheduleChart'),
            config
        );

    }
    drawLineChart();

    // ticket sales chart
    function drawBarChart() {
        // Dummy Data
		const data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
			datasets: [{
				// label: 'e-Ticket Sales',
				data: [500, 750, 1000, 1250, 1500, 1750],
				backgroundColor: 'rgb(75, 192, 192)',
				borderColor: 'rgb(75, 192, 192)',
				borderWidth: 1
			}]
		};

		// Configuration Options
		const config = {
			type: 'bar',
			data: data,
            options: {
                title: {
                    display: true,
                    text: 'Ticket Sales',
                    fontSize: 15,
                },
				responsive: true,
				scales: {
					y: {
						beginAtZero: true
					}
				},
				plugins: {
					legend: {
						display: false
					}
                },
                legend: {
                    display: false,
                    // 'position': 'right'
                }
			}
		};

		// Creating Chart
		const myChart = new Chart(
			document.getElementById('ticketSalesChart'),
			config
		);
    }
    drawBarChart();
});