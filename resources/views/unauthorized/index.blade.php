<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>Unauthorized access</title>
</head>
<body class="antialiased">
    <div class="flex flex-col items-center justify-center w-full h-full">
        <div class="contents h-max-full w-max-full font-bold">
            <img src="{{ asset('storage/401.svg') }}" class="object-cover object-center max-h-full md:max-w-[50%]" alt="404 Page Not Found">
            Unauthorized access!
            <a class="block rounded-full bg-red-500 hover:bg-red-800 transition-all text-white px-7 py-2 font-medium focus:outline focus:outline-2 focus:outline-red-400 my-3" href="{{ route('home') }}">Home</a>
        </div>
    </div>

</body>
</html>
