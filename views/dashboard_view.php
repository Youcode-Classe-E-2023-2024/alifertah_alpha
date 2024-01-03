<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <title>XENO Dashboard</title>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-semibold mb-4">XENO Dashboard</h1>

        <!-- Metrics Section -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-xl font-semibold mb-2">Metrics Section</h2>
            <!-- Example Metrics Content -->
            <p>Total Users: 100</p>
            <p>Active Users: 75</p>
        </div>

        <!-- Graph Section -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-xl font-semibold mb-2">Graph Section</h2>
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>

        <!-- Product Overview Section -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-xl font-semibold mb-2">Product Overview</h2>
            <!-- Example Product Content -->
            <ul>
                <li>Product 1</li>
                <li>Product 2</li>
                <li>Product 3</li>
            </ul>
        </div>

        <!-- PDF Statistics Section -->
        <div class="bg-white p-4 rounded-md shadow-md mb-4">
            <h2 class="text-xl font-semibold mb-2">PDF Statistics</h2>
            <!-- Example PDF Statistics Content -->
            <p>Total Downloads: 500</p>
            <p>Most Downloaded: Product X</p>
        </div>
    </div>

    <script>
        // Chart.js code
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                label: "Monthly Sales",
                backgroundColor: "rgba(75,192,192,0.4)",
                borderColor: "rgba(75,192,192,1)",
                data: [65, 59, 80, 81, 56]
            }]
        };

        var options = {
            responsive: true,
        };

        var ctx = document.getElementById("myChart").getContext("2d");

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    </script>
</body>

</html>
