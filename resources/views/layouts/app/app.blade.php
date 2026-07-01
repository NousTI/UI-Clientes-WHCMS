
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Dashboard</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

<div class="flex h-screen overflow-hidden">

    @include('components.sidebar')

    <div class="flex flex-col flex-1">

        @include('components.navbar')

        <main class="flex-1 overflow-y-auto p-6">

            @yield('content')

        </main>

        @include('components.footer')

    </div>

</div>

</body>

</html>