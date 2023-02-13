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


                <nav class="flex items-center justify-between py-2 px-11 bg-gray-800">
                    <a href="#">
                      <h3 class="text-white text-2xl">Tech<span class="text-indigo-700">Blog</span></h3>
                    </a>
                    <div class="flex space-x-4">
                        @auth
                            <a class="px-4 py-2 bg-gray-600 text-white rounded-full" href="{{ url('/dashboard')}}">Tableau de bord</a>
                        @else
                            <a class="px-4 py-2 bg-gray-600 text-white rounded-full" href="{{ route('login') }}">Connexion</a>
                        @if (Route::has('register'))
                            <a class="px-4 py-2 bg-gray-600 text-white rounded-full" href="{{ route('register') }}">Inscription</a>
                        @endif
                      @endauth
                    </div>
                  </nav>


            <section class="bg-white dark:bg-gray-900">
                <div class="container px-11 py-10 mx-auto">

                    <ul class="flex flex-col space-y-6">
                        @forelse($articles as $value)

                        <li class="flex items-start space-x-6 shadow-md rounded-sm p-4">
<a href="{{ route('article.show') }}">
    <div class="w-36 h-36" >
        <img class="w-36 h-36 rounded-full" src="{{ Storage::disk('s3')->url("/images/".$value->image) }}" alt="{{$value->title}}">

        </div>
              <div class="flex-1 ml-2">
                                  <h3 class="text-lg font-medium"> {{\Illuminate\Support\Str::title($value->title)}}</h3>
                                  <hr class="my-2">
                                  <p class="text-sm text-gray-700">{{ Str::words($value->description, 100, ' ...') }}</p>
                                  <hr class="my-2">
                                  <p class="text-sm text-gray-500">Publié le <time>{{$value->created_at->format('d/m/Y')}}</time> par <span class="font-medium">{{$value->user->name}}</span></p>
                                </div>
</a>
                          </li>
                        @empty
                            <li class="text-xl font-semibold text-gray-800 hover:underline dark:text-white text-center">Oups !!!</li>
                        @endforelse


                      </ul>



                </div>
            </section>
        </div>
    </body>
</html>
