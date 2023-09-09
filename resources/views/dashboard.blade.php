<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="flex items-center font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex ml-auto">
                <a href="{{ route('blog.create') }}" class="text-white py-1.5 px-3 bg-red-500 hover:bg-gray-900 transition-all rounded-md">+ Add blog</a>
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php($blogs = Auth::user()->blogs)
                    @if (count($blogs) != 0)
                        @foreach ($blogs as $blog)
                            <div class="group cursor-pointer scale-100 mb-7 pt-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent via-35% dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none motion-safe:hover:scale-[1.01]
                            transition-all duration-250 hover:via-70% focus:outline focus:outline-2 focus:outline-red-500">
                                <a href="{{ route('blog.show', $blog->id) }}" class="px-6 flex flex-row items-center pb-10">
                                    <div class="flex-flex-col">
                                        <h2 class="mt-2 text-xl font-semibold text-gray-900 dark:text-white">{{ $blog->title }}</h2>
                                        <p class="text-gray-200 text-sm mt-3">
                                            Date: {{ date('d/m/Y', strtotime($blog->date)) }}
                                        </p>
                                    </div>
                                    <div class="flex flex-col ml-auto justify-center transition-all group-hover:translate-x-4">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 group-hover:stroke-red-400 w-6 h-6 mx-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                                        </svg>
                                    </div>
                                </a>
                                <hr class="w-3/4 opacity-20 mx-auto my-none">
                                <a href="{{ route('blog.edit', $blog->id) }}" class="flex w-full justify-center text-md bg-transparent hover:bg-gray-600 transition-all
                                    text-white px-5 py-3.5 font-medium focus:outline focus:outline-2 focus:outline-red-400">Edit</a>
                                <hr class="w-3/4 opacity-20 mx-auto my-none">
                                <a href="{{ route('blog.destroy', $blog->id) }}" class="flex w-full justify-center text-md rounded-b-lg bg-transparent hover:bg-gray-600 transition-all
                                    text-white px-5 py-3.5 font-medium focus:outline focus:outline-2">Delete</a>
                            </div>
                        @endforeach
                    @else
                        {{ 'You have no Blogs!' }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
