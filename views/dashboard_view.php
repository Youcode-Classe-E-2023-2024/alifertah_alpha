<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <title>XENO Dashboard</title>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <!-- Metrics Section -->
        <div class="md:col-span-1 lg:col-span-1">
            <div class="bg-blue-500 p-4 rounded-md shadow-md text-white">
                <h2 class="text-xl font-semibold mb-2">Metrics Section</h2>
                <!-- Example Metrics Content -->
                <p id="totalPosts">Total Posts:</p>
                <p id="totalUsers">Total Users:</p>
            </div>
            <div class="bg-yellow-500 p-4 rounded-md shadow-md text-black mt-4">
                <h2 class="text-xl font-semibold mb-2">Product Overview</h2>
                <!-- DataTable Product Content -->
                <table id="productTable" class="table-auto w-full">
                    <thead>
                        <tr class="bg-yellow-400 text-white">
                            <th class="px-4 py-2">Product</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Product 1</td>
                        </tr>
                        <tr>
                            <td>Product 2</td>
                        </tr>
                        <tr>
                            <td>Product 3</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="bg-purple-500 p-4 rounded-md shadow-md text-white mt-4">
                <h2 class="text-xl font-semibold mb-2">PDF Statistics</h2>
                <!-- Example PDF Statistics Content -->
                <p>Total Downloads: 500</p>
                <p>Most Downloaded: Product X</p>
            </div>
        </div>

        <!-- Graph Section -->
        <div class="md:col-span-1 lg:col-span-1">
            <div class="bg-green-500 p-4 rounded-md shadow-md text-white h-full">
                <h2 class="text-xl font-semibold mb-2">Graph Section</h2>
                <canvas id="myChart" width="800" height="400"></canvas>
            </div>
        </div>
    </div>

    <script>
        // ... Your existing JavaScript code

        // Initialize DataTable for Product Overview
        $(document).ready(function () {
            $('#productTable').DataTable({
                "paging": false,  // Disable pagination if the number of products is small
                "searching": true,  // Disable search bar
                "info": false  // Disable info (showing X of Y entries)
            });
        });

        // ... Your existing fetch and update functions
    </script>
</body>

</html>


    <script>
        var data = {
            labels: ["January", "February", "March", "April", "May"],
            datasets: [{
                label: "Monthly Sales",
                backgroundColor: "rgba(75,192,192,1)",
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

        let count = 0;

        fetch("https://jsonplaceholder.typicode.com/posts")
        .then(response => response.json())
        .then(data => {
            data.forEach((val) => {
                if (val.id) {
                    count++;
                }
            });
            document.getElementById("totalPosts").innerHTML += count;

        })
        fetch("https://jsonplaceholder.typicode.com/users")
        .then(response => response.json())
        .then(data => {
            data.forEach((val) => {
                if (val.id) {
                    count++;
                }
            });
            document.getElementById("totalUsers").innerHTML += count;

        })

    </script>
