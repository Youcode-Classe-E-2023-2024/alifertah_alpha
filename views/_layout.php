<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= ucfirst($page) ?></title>
    <link rel="stylesheet" href="<?= PATH ?>assets/css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0/dist/chart.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"
        integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" 
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body>
    <nav class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0">
        <a href="index.php?page=home" class="text-2xl no-underline hover:text-blue-dark">Home</a>
    </div>
    <div>
        <?php
            if(isset($_SESSION["email"])){
                echo ("
                    <div class='flex'>
                        <a href='index.php?page=manage_users' class='text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2'>manage users</a>
                        <a href='index.php?page=create_room' class='text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2'>create room</a>
                        <a href='index.php?page=profile&username=$_SESSION[email]' class='text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2'>profile</a>
                        <form method='post' action='index.php?page=login'>
                        <button class='text-lg underline text-red-500 hover:text-blue-dark ml-2' type='submit' name='logout'> 
                        Logout
                            </button>
                        </form>
                    </div>
                    "
            );
            } else {
                echo ("
                    <a href='index.php?page=login' class='text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2'>login</a>
                    "
            );
            }
        ?>
    </div>
    </nav>
    
    <main>
        <?php include_once 'views/' . $page . '_view.php'; ?>
    </main>

    <footer></footer>
    <script src="<?= PATH ?>assets/js/main.js"></script>
</body>
</html>