<x-admin-layout>
    <div class="max-w-7xl mx-auto p-2 mt-8">
      <div class="bg-slate-100 p-4 rounded-lg">
        <div>
            <form action="{{ route('admin.menus.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                    <input type="text" name="description" id="description" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                    <input type="file" name="image" id="image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                    <input type="number" name="price" id="price" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                    <select name="categories[]" id="category" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" multiple>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Create
                    </button>
                </div>
            </form>
        </div>
      </div>
    </div>
</x-admin-layout>

