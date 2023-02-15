<x-admin-layout>
    <div class="max-w-7xl mx-auto p-2 mt-8">
      <div class="bg-slate-100 p-4 rounded-lg">
        @if(Session::has('error'))
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
                {{session('error')}}
            </div>
        @endif
        <div>
            <form action="{{ route('admin.reservations.store') }}" method="post">
                @csrf
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                    <input type="text" name="first_name" id="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('first_name') }}">
                    @error('first_name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                    <input type="text" name="last_name" id="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('last_name') }}">
                    @error('last_name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="text" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('email') }}">
                    @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                    <input type="text" name="phone" id="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('phone') }}">
                    @error('phone')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                    <input type="datetime-local" name="res_date" id="res_date" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('res_date') }}">
                    @error('res_date')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                    <select name="table_id" id="table_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        @foreach ($tables as $table)
                            <option
                            value="{{ $table->id }}">{{ $table->name }}
                            ( {{ $table->guests_number }} Guests)
                        </option>
                        @endforeach
                    </select>
                    @error('table_id')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
                </div>
                <div class="mb-2 max-w-3xl mx-auto">
                    <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                    <input type="number" name="guest_number" id="guest_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('guest_number') }}">
                    @error('guest_number')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                    @enderror
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

