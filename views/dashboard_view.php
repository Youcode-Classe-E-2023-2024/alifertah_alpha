
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
    <table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
        </tr>
    </thead>
    <tbody id="products" class="bg-white divide-y divide-gray-200">
    </tbody>
</table>

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
        fetch("https://jsonplaceholder.typicode.com/users")
            .then(response => response.json())
            .then(data => {
                users = data.map(user => ({
                    id: user.id,
                    name: user.name,
                    counter: 0
                }))
                return fetch("https://jsonplaceholder.typicode.com/posts");
            })
            .then(response => response.json())
            .then(postsData => {
                postsData.forEach(post => {
                    const user = users.find(user => user.id === post.userId);
                    if (user) {
                        user.counter++;
                    }
                });
                createChart();
            })
            
            function createChart() {
                var data = {
                    labels: users.map(name =>(name.name)),
                    datasets: [{
                        label: "Monthly Sales",
                        backgroundColor: "rgba(75,192,192,1)",
                        borderColor: "rgba(75,192,192,1)",
                        data: users.map(name =>(name.counter)),
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
            }

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
        
    </script>
