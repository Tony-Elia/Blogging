@if($errors->any())
    @foreach ($errors->all() as $error)
        <div class="text-center text-white justify-center items-center flex bg-red-500 rounded-[2rem] w-3/4 mt-2 py-1 px-4">{{ $error }}</div>
    @endforeach
@endif
