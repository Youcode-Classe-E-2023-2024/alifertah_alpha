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
    <div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <!-- Metrics Section -->
        <div class="bg-blue-500 p-4 rounded-md shadow-md text-white">
            <h2 class="text-xl font-semibold mb-2">Metrics Section</h2>
            <!-- Example Metrics Content -->
            <p id="totalPosts">Total Posts: </p>
            <p id="totalUsers">Total Users: 75</p>
        </div>

        <!-- Graph Section -->
        <div class="bg-green-500 p-4 rounded-md shadow-md text-white">
            <h2 class="text-xl font-semibold mb-2">Graph Section</h2>
            <canvas id="myChart" width="400" height="200"></canvas>
        </div>

        <!-- Product Overview Section -->
        <div class="bg-yellow-500 p-4 rounded-md shadow-md text-white">
            <h2 class="text-xl font-semibold mb-2">Product Overview</h2>
            <!-- Example Product Content -->
            <ul>
                <li>Product 1</li>
                <li>Product 2</li>
                <li>Product 3</li>
            </ul>
        </div>

        <!-- PDF Statistics Section -->
        <div class="bg-purple-500 p-4 rounded-md shadow-md text-white">
            <h2 class="text-xl font-semibold mb-2">PDF Statistics</h2>
            <!-- Example PDF Statistics Content -->
            <p>Total Downloads: 500</p>
            <p>Most Downloaded: Product X</p>
        </div>
    </div>

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
        async function fetchData(url) {
            try {
                let count = 0;

                const response = await fetch(url);
                const data = await response.json();

                data.forEach((val) => {
                    if (val.id) {
                        count++;
                    }
                });

                return count;
            } catch (error) {
                console.error('Error fetching data:', error);
                throw error;
            }
        }

        async function updateTotalPosts() {
            try {
                const count = await fetchData("https://jsonplaceholder.typicode.com/posts");
                document.getElementById("totalPosts").innerHTML += count;
            } catch (error) {
                console.error('Error updating total posts:', error);
            }
        }

        updateTotalPosts();
    </script>
</body>

</html>