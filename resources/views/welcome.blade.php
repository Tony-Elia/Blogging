<x-app-layout>
    <div>
        <div class="flex-col mt-[4rem] mb-16">
            <div class="flex flex-row justify-center mb-12">
                <h1 id="articlesTitle" style="clip-path: polygon(0 0, 100% 0, 100% 100%, 0% 100%);" class="flex text-white text-center text-3xl md:text-4xl font-extrabold">
                    <div class="animate-[textPop_0.8s_ease-in-out_0.3s_1_normal_forwards] translate-y-[-120%]">A</div>
                    <div class="animate-[textPop_0.8s_ease-in-out_0.35s_1_normal_forwards] translate-y-[-120%]">r</div>
                    <div class="animate-[textPop_0.8s_ease-in-out_0.4s_1_normal_forwards] translate-y-[-120%]">t</div>
                    <div class="animate-[textPop_0.8s_ease-in-out_0.45s_1_normal_forwards] translate-y-[-120%]">i</div>
                    <div class="animate-[textPop_0.8s_ease-in-out_0.5s_1_normal_forwards] translate-y-[-120%]">c</div>
                    <div class="animate-[textPop_0.8s_ease-in-out_0.55s_1_normal_forwards] translate-y-[-120%]">l</div>
                    <div class="animate-[textPop_0.8s_ease-in-out_0.6s_1_normal_forwards] translate-y-[-120%]">e</div>
                    <div class="animate-[textPop_0.8s_ease-in-out_0.65s_1_normal_forwards] translate-y-[-120%]">s</div>
                </h1>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mx-auto px-6 max-w-[1200px]">
                @foreach ($blogs as $blog)
                    <a href="{{ route('blog.show', $blog->id) }}" class="group scale-100 p-6 pt-7 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent via-35% dark:ring-1 dark:ring-inset dark:ring-white/5 rounded-lg shadow-2xl shadow-gray-500/20 dark:shadow-none flex motion-safe:hover:scale-[1.01] transition-all duration-250 hover:via-70% focus:outline focus:outline-2 focus:outline-red-500 justify-between">
                        <div>
                            <div class="flex flex-row items-start">
                                <h2 class="mr-auto text-xl font-semibold text-gray-900 dark:text-white">{{ $blog->title }}</h2>
                                @foreach ($blog->categories as $category)
                                    <span class="bg-red-500 text-white text-sm px-2.5 py-1 rounded-2xl ml-2">{{ $category->category }}</span>
                                @endforeach
                            </div>
                            <p class="mt-6 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
                                {{ Str::limit($blog->body, 150) }}
                            </p>
                            <p class="text-gray-200 text-sm mt-3">
                                Author: <span class="text-red-500">{{ $blog->user->name }}</span>, Date: {{ date('d/m/Y', strtotime($blog->date)) }}
                            </p>
                        </div>
                        <div class="flex flex-col justify-center transition-all group-hover:translate-x-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" class="self-center shrink-0 stroke-red-500 group-hover:stroke-red-400 w-6 h-6 mx-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
                            </svg>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
