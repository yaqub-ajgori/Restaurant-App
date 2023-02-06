<x-admin-layout>
    <div class="max-w-7xl mx-auto p-2 mt-8">
      <div class="bg-slate-100 p-4 rounded-lg">
          {{-- form with validation errors and old input values --}}
          <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="flex flex-col">
                <input type="text"
                name="name" id="name"
                placeholder="Category Name"
                value="{{ $category->name }}"
                class="rounded-lg px-3 py-2 mb-3 text-gray-800 @error('name') border-red-500 @enderror">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex flex-col mt-2">
                <textarea name="description" id="description" cols="20" rows="2"
                placeholder="Category Description"
                class="rounded-lg px-3 py-2 mb-3 text-gray-800 @error('description') border-red-500 @enderror">{{ $category->description }}</textarea>
                @error('description')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex flex-col mt-2">
                <input type="file" name="image" id="image"
                class="rounded-lg px-3 py-2 mb-3 text-gray-800 @error('image') border-red-500 @enderror">
                @error('image')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
                <div class="p-4">
                    <img class="w-24 h-24" src="{{ asset('storage/'. $category->image) }}" alt="">
                </div>
            </div>
            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Update</button>
        </form>
      </div>
    </div>
</x-admin-layout>

