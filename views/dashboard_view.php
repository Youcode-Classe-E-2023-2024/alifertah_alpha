<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <title>XENO Dashboard</title>
</head>

<body class="bg-gray-100 font-sans">
    <div class="container mx-auto p-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4">
        <!-- Metrics Section -->
        <div class="md:col-span-1 lg:col-span-1 flex flex-col justify-center">
            <div class="bg-blue-500 p-4 rounded-md shadow-md text-white mb-4">
                <h2 class="text-xl font-semibold mb-2">Metrics Section</h2>
                <!-- Example Metrics Content -->
                <p id="totalPosts">Total Posts:</p>
                <p id="totalUsers">Total Users:</p>
            </div>
            <div class="bg-blue-500 p-4 rounded-md shadow-md text-white mb-4">
                <h2 class="text-xl font-semibold mb-2">Metrics Section</h2>
                <!-- Example Metrics Content -->
                <p id="totalPosts">Total Posts:</p>
                <p id="totalUsers">Total Users:</p>
            </div>
            <div class="bg-purple-500 p-4 rounded-md shadow-md text-white">
                <h2 class="text-xl font-semibold mb-2">PDF Statistics</h2>
                <!-- Example PDF Statistics Content -->
                <p>Total Downloads: 500</p>
                <p>Most Downloaded: Product X</p>
            </div>
        </div>

        <!-- Graph Section -->
        <div class="md:col-span-1 lg:col-span-1">
            <div class="bg-green-500 p-4 rounded-md shadow-md text-white mb-4">
                <h2 class="text-xl font-semibold mb-2">Graph Section</h2>
                <canvas id="myChart" width="800" height="400"></canvas>
                <button onclick="generatePDF()">Generate PDF</button>
            </div>
        </div>
    </div>


    <!-- DataTable Product Content -->
    <div class="container mx-auto p-4">
        <div class="bg-blue-400 p-4 rounded-md shadow-md text-black">
            <h2 class="text-xl font-semibold mb-2">Product Overview</h2>
            <table id="productTable" class="table-auto w-full">
                <thead>
                    <tr class="bg-blue-400 text-white">
                        <th class="px-4 py-2">Product</th>
                    </tr>
                </thead>
                <tbody id="products"></tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#productTable').DataTable({
                "paging": true,
                "searching": true,
                "info": false,
            });
        });


        function generatePDF() {
            const element = document.getElementById("myChart");

            // Provide options (optional)
            const options = {
                margin: 10,
                filename: 'generated.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
            };

            // Call the html2pdf function
            html2pdf(element, options);
        }
    </script>

    <script>
        var users = []
        var usersData
        var data = {
            labels: users,
            datasets: [{
                label: "Monthly Sales",
                backgroundColor: "rgba(75,192,192,1)",
                borderColor: "rgba(75,192,192,1)",
                data: usersData,
                barThickness: 50,
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

        let countPosts = 0;
        fetch("https://jsonplaceholder.typicode.com/posts")
            .then(response => response.json())
            .then(data => {
                data.forEach((val) => {
                    if (val.id) {
                        countPosts++;
                    }
                });
                document.getElementById("totalPosts").innerHTML += countPosts;
            });

        let countUsers = 0;
        fetch("https://jsonplaceholder.typicode.com/users")
            .then(response => response.json())
            .then(data => {
                data.forEach((val) => {
                    if (val.id) {
                        countUsers++;
                    }
                });
                document.getElementById("totalUsers").innerHTML += countUsers;
            });

        fetch("https://jsonplaceholder.typicode.com/posts")
            .then(response => response.json())
            .then(data => {
                data.forEach((val) => {
                    let tr = document.createElement('tr');
                    let td = document.createElement('td');
                    td.innerHTML = val.title;
                    tr.appendChild(td);
                    document.getElementById('products').appendChild(tr);
                });
            });
        fetch("https://jsonplaceholder.typicode.com/users")
            .then(response => response.json())
            .then(data => {
                data.forEach((val) => {
                    users.push(val.name)
                });
            });
    </script>
</body>

</html>
