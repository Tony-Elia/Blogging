<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Page Not Found</title>
</head>
<body class="antialiased">
    <div class="flex items-center justify-center w-screen h-screen">
        <div class="contents h-max-full w-max-full">
            <img src="{{ asset('storage/404.svg') }}" class="object-cover object-center max-h-full md:max-w-[50%]" alt="404 Page Not Found">
        </div>
    </div>

</body>
</html>
