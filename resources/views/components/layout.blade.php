<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="/images/logo1.png" type="image/x-icon">


    <link rel="apple-touch-icon" sizes="57x57" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="60x60" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="72x72" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="76x76" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="114x114" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="120x120" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="144x144" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="152x152" href="/images/favicon.ico">
    <link rel="apple-touch-icon" sizes="180x180" href="/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="192x192"  href="/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="96x96" href="/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">






    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
    />
    <script src="//unpkg.com/alpinejs" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        laravel: "#ef3b2d",
                    },
                },
            },
        };
    </script>
    <title>LaraJobs | Find Tech Jobs & Projects</title>
</head>
<body class="mb-48 ">
<nav class="flex justify-between items-center mb-4">
    <a href="/"
    ><img class="w-60 object-scale-down" src="{{asset('images/logo1.png')}}" alt="" class="logo"
        /></a>
    <ul class="flex space-x-6 mr-6 text-lg">


        @auth
        <li>
            <span class="font-bold uppercase">
                Welcome {{auth()->user()->name}}
            </span>
        </li>
        <li>
            <a href="/listings/manage" class="hover:text-laravel"
            ><i class="fa-solid fa-gear"></i>
                Manage Jobs</a
            >
        </li>

            <li>
                <form class="inline" method="post" action="/logout">
                    @csrf
                    <button type="submit" class="hover:text-laravel">
                        <i class="fa-solid fa-sign-out-alt"></i>
                        Logout
                    </button>
                </form>
            </li>

        @else

        <li>
            <a href="/register" class="hover:bg-white hover:text-green-700"
            ><i class="fa-solid fa-user-plus"></i> Register</a
            >
        </li>

        <li>
            <a href="/login" class="hover:bg-white hover:text-green-700"
            ><button class=" fa-solid fa-arrow-right-to-bracket"></button>
                Login</a
            >
        </li>





     @endauth
    </ul>
</nav>

<main>


    {{$slot}}

</main>


<footer
    class="fixed bottom-0 left-0 w-full flex items-center justify-start font-bold bg-green-700 text-white h-24 mt-24 opacity-90 md:justify-center"
>
    <p class="ml-2">Developed by <a href="https://www.linkedin.com/in/david-asem">David Asem </a> <br>Copyright &copy; 2022, All Rights reserved</p>

    <a
        href="/listings/create"
        class="absolute top-1/3 right-10 bg-black text-white py-2 px-5"
    >List A Job</a
    >
</footer>

<x-flash-message />

</body>
</html>

</body>
</html>
