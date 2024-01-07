<table class="min-w-full divide-y divide-gray-200">
    <thead>
        <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">title</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
        </tr>
    </thead>
    <tbody id="users" class="bg-white divide-y divide-gray-200">
    </tbody>
</table>

<script>
    table = document.getElementById("users")
    let r = ""
    fetch("https://jsonplaceholder.typicode.com/posts")
            .then(response => response.json())
            .then(data => {
                data.map((val, key) => {
                    r += `
                    <tr id=${key}>
            <td class="px-6 py-4 whitespace-nowrap">${val.title}</td>
            <td class="px-6 py-4 whitespace-nowrap">
                <button class="px-4 py-2 font-medium text-white bg-blue-600 rounded-md hover:bg-blue-500 focus:outline-none focus:shadow-outline-blue active:bg-blue-600 transition duration-150 ease-in-out">Edit</button>
                <button onclick="handleDelete(${key})" class="ml-2 px-4 py-2 font-medium text-white bg-red-600 rounded-md hover:bg-red-500 focus:outline-none focus:shadow-outline-red active:bg-red-600 transition duration-150 ease-in-out">Delete</button>
            </td>
        </tr>
        `
                });
                table.innerHTML = r
            });

            var arr = []

            function handleDelete(id){
                document.getElementById(id).style.display = "none"

                fetch(`https://jsonplaceholder.typicode.com/posts/${id}`, {
                    method: "DELETE"
                })
                .then(response=> {
                    if(response.ok){
                        Swal.fire({
                        title: "Success",
                        text: "User removed successfully",
                        confirmButtonColor: '#34D399',
                        icon: "success",
                        });
                    }
                })
            }
</script>