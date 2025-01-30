<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <div id="app">
        <nav class="bg-gray-800 p-4">
            <div class="container mx-auto">
                <div class="flex items-center justify-between">
                    <div class="text-white text-lg">
                        <a href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                    </div>
                    <div>
                        <!-- Navigation Links -->
                        <a class="text-white" href="/students">Students</a>
                        <a class="ml-4 text-white" href="/">Courses</a>
                        <a class="ml-4 text-white" href="/courses/enrollments">Course Enrollment</a>
                       
                    </div>
                </div>
            </div>
        </nav>

        <main class="container mx-auto mt-4">
            @yield('content')
        </main>
    </div>
    @vite('resources/js/app.js')
    <x-toaster-hub />
</body>

</html>