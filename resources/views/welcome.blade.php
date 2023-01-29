<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
    <body class="antialiased">
        <div class="relative flex-col items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">


                <nav class="relative select-none bg-gray-800 lg:flex lg:items-stretch w-full">
                    <div class="flex flex-no-shrink items-stretch h-12">
                        <a href="#" class="text-3xl font-semibold capitalize flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">TechBlog</a>


                    </div>
                    <div class="lg:flex lg:items-stretch lg:flex-no-shrink lg:flex-grow">
                        <div class="lg:flex lg:items-stretch lg:justify-end ml-auto">
                            @auth
                                <a href="{{ url('/dashboard') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Log in</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="flex-no-grow flex-no-shrink relative py-2 px-4 leading-normal text-white no-underline flex items-center hover:bg-grey-dark">Register</a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </nav>

            <!-- component -->
            <section class="bg-white dark:bg-gray-900">
                <div class="container px-6 py-10 mx-auto">

                    <div class="grid grid-cols-1 gap-8 mt-8 md:mt-16 md:grid-cols-2">

                        @forelse($articles as $value)

                            <div class="lg:flex">
                                <img class="object-cover w-full h-56 rounded-lg lg:w-64" src="{{ url("/images/".$value->image) }}" alt="{{$value->title}}">

                                <div class="flex flex-col justify-between py-6 lg:mx-6">
                                    <a href="#" class="text-xl font-semibold text-blue-800 hover:underline dark:text-white ">
                                        {{\Illuminate\Support\Str::title($value->title)}}
                                    </a>

                                    <p>{{ Str::words($value->description, 10, ' ...') }}</p>

                                    <span class="text-sm text-gray-500 dark:text-gray-300">Par : {{$value->user->name}}, le {{$value->created_at->format('d/m/Y')}}</span>
                                </div>
                            </div>
                        @empty
                        @endforelse

                    </div>
                </div>
            </section>
        </div>
    </body>
</html>
