<x-app-layout>
    <div id="bodyToggler" class="flex justify-center">
            <div class="text-center text-white justify-center items-center flex flex-col bg-gray-800 rounded-[2rem] w-full sm:w-[65%] lg:w-[40%] my-24 p-8">
            <h1 class="flex text-white text-center text-3xl md:text-4xl font-extrabold">Edit</h1>
            @include('components.error-show')
            <form method="POST" action="{{ route('blog.update', $blog->id) }}">
                @csrf
                @method('PATCH')
             
                <x-input type="text" name="title" value="{{ $blog->title }}">

                <textarea name="body" rows="20" class="bg-gray-900/70 border-none focus:ring-red-500 focus:ring-2 block w-full text-md rounded-xl outline-none my-6">{{ $blog->body }}</textarea>

                <h2 class="text-xl">Tags</h2> <br>
                <div class="flex flex-wrap">
                    @foreach ($categories as $category)
                    <div class="flex">
                        <input type="checkbox" class="hidden peer" name="categories[]" value="{{ $category->id }}" id="{{ $category->category }}" {{ $registered->contains('category_id', $category->id) ? 'checked' : ''; }}/>
                            
                        <label class="px-2 py-1 bg-gray-900 hover:bg-black peer-checked:bg-red-500 transition-all rounded-md m-1 cursor-pointer" for="{{ $category->category }}">{{ $category->category }}</label>
                    </div>
                    @endforeach
                    <x-button type="button" id="modalToggler" bg="white" px="2" py="1" rounded="md" class="text-black m-1 hover:bg-white/70">Add Category</x-button>
                </div>

                <x-input type="date" name="date" value="{{ $blog->date }}">

                <x-button px="10" class="hover:bg-red-700">Save</x-button>
            </form>
        </div>
    </div>
    <!-- Modal content-->
    <div id="categoryModal" class="transition-all duration-[0.5s] fixed top-[-5rem] left-[50%] max-w-[90%] translate-x-[-50%] justify-center">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <input id="categoryInput" name="category" class="w-[250px] bg-white border-none focus:ring-red-500 focus:ring-4 transition-all block text-md rounded-3xl outline-none" type="text" placeholder="Category Title...">
            <button type="submit" class="hidden"></button>
        </form>
    </div>
</x-app-layout>
