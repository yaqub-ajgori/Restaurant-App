<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <a class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2" href="{{ route('admin.categories.create') }}">Create Category</a>
            <div class="relative overflow-x-auto mt-8 ">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 bg-slate-100">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                               Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($categories as $category)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{ $category->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $category->description }}
                            </td>
                            <td class="px-6 py-4">
                                <img src="{{ $category->image ? asset('storage/'. $category->image) : 'images/no-image' }}" alt="" width="100">
                            </td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a class="bg-indigo-500 text-white px-1 py-2" href="{{ route('admin.categories.edit', $category->id) }}">Edit</a>
                                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-1 py-2"
                                    onclick="return confirm('Are you sure?')"
                                    >Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>
