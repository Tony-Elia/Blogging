<x-app-layout>
    <div id="bodyToggler" class="flex justify-center">
        <div class="text-center text-white justify-center items-center flex flex-col bg-gray-800 rounded-[2rem] w-full sm:w-[65%] lg:w-[40%] my-24 mx-4 sm:p-8 p-5">
            <h1 class="flex text-white text-center text-3xl md:text-4xl font-extrabold">Edit</h1>
            <form method="POST" action="{{ route('blog.update', $blog->id) }}">
                @csrf
                @method('PATCH')
             
                <label for="title" class="flex ml-1">Title</label>
                <x-input id="title" type="text" name="title" value="{{ $blog->title }}" />
                <x-input-error :messages="$errors->get('title')" />
                        
                <label for="body" class="flex ml-1">Body</label>
                <textarea id="body" name="body" rows="20" class="bg-gray-900/70 border-none focus:ring-red-500 focus:ring-2 block w-full text-md rounded-xl outline-none mt-1 mb-3">{{ $blog->body }}</textarea>
                <x-input-error :messages="$errors->get('body')" />

                <label class="text-md mb-2 flex ml-1">Tags</label>
                <div class="flex flex-wrap mb-3">
                    @foreach ($categories as $category)
                    <div class="flex">
                        <input type="checkbox" class="hidden peer" name="categories[]" value="{{ $category->id }}" id="{{ $category->category }}" {{ $registered->contains('category_id', $category->id) ? 'checked' : ''; }}/>
                            
                        <label class="px-2 py-1 bg-gray-900 hover:bg-black peer-checked:bg-red-500 transition-all rounded-md m-1 cursor-pointer" for="{{ $category->category }}">{{ $category->category }}</label>
                    </div>
                    @endforeach
                    <x-button type="button" id="modalToggler" bg="white" px="2" py="1" rounded="md" class="text-black m-1 hover:bg-white/70">Add Category</x-button>
                </div>
                
                <label for="date" class="flex ml-1">Date</label>
                <x-input id="date" type="date" name="date" value="{{ $blog->date }}" />
                <x-input-error :messages="$errors->get('date')" />

                <x-button px="10" class="hover:bg-red-700 mt-5">Save</x-button>
            </form>
        </div>
    </div>
    <!-- Modal content-->
    <div id="categoryModal" class="transition-all duration-[0.5s] fixed top-[-5rem] left-[50%] max-w-[90%] translate-x-[-50%] justify-center">
        <form action="{{ route('category.store') }}" method="post">
            @csrf
            <x-input type="text" id="categoryInput" name="category" bg="white" width="w-[250px]" rounded="3xl" placeholder="Category Title..." />
            <button type="submit" class="hidden"></button>
        </form>
    </div>
</x-app-layout>
