<x-app-layout class="flex items-center justify-center pb-5">
    <div class="flex flex-col container p-4 px-7 lg:max-w-[65%]">
        <div class="flex flex-row mb-16 items-center justify-center text-slate-100">
            <h1 class="text-2xl md:text-3xl glow text-center">{{ $blog->title }}</h1>
        </div>
        <div class="text-slate-200">Created by <span class="text-red-500">{{ $blog->user->name }}</span></div>
        <div class="text-slate-200">Creation Date: <span class="text-slate-400">{{ date('d/m/Y', strtotime($blog->date)) }}</span></div>
        <div class="text-slate-200">Tags:
            @forelse ($blog->categories as $category)
                <span class="text-slate-300 underline">{{ $category->category }}</span>
            @empty
                None
            @endforelse
        </div>
        <p class="text-white my-7">
            {{ Str::substr((print(nl2br($blog->body))), 0, -1) }}
        </p>
        @auth
            <div class="flex my-4">
                @if ($blog->user->id == Auth::user()->id)
                    <a href="{{ route('blog.edit', $blog->id) }}">
                        <x-button bg="gray-700" class="hover:bg-gray-800 text-white">Edit</x-button>
                    </a>
                    <form action="{{ route('blog.destroy', ['id' => $blog->id, 'before' => (url()->previous() == route('dashboard') ? 'dashboard' : 'home')]) }}" method="post">
                        @csrf
                        @method('delete')

                        <x-button type="submit" class="py-1.5 hover:bg-red-700 ml-3 text-white">Delete</x-button>
                    </form>
                @endif
            </div>
        @endauth
    </div>
</x-app-layout>
