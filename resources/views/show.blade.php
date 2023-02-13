<x-app-layout>
    <x-slot name="header">
       <div class="flex justify-between">
           <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{\Illuminate\Support\Str::title($article->title)}}
           </h2>

           @auth
           <a href="{{route('dashboard')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Retour</a>
       @else
       <a href="{{route('article.index')}}" class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Retour</a>
     @endauth

       </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex-col p-6 text-gray-900 dark:text-gray-100">
                    <div class="">
                        <img class="w-full h-96" src="{{ Storage::disk('s3')->url("/images/".$value->image) }}" alt="Post image">
                    </div>
                    <div class="flex-1 mt-4">
                      <p class="text-sm text-gray-700 text-justify">{{ $article->description }}</p>
                      <hr class="my-4">
                      <p class="text-sm text-gray-500">Publié le <time>2022-01-01</time> par <span class="font-medium">John Doe</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
