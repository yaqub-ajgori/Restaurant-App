<x-admin-layout>
    <div class="max-w-7xl mx-auto p-2 mt-8">
        @if(Session::has('success'))
        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400">
            {{session('success')}}
        </div>
    @endif
      <div class="bg-slate-100 p-4 rounded-lg">
          <form action="{{ route('admin.tables.store') }}" method="POST">
            @csrf
            <div class="flex flex-col">
                <input type="text"
                name="name"
                placeholder="Table Name"
                value=""
                class="rounded-lg px-3 py-2 mb-3 text-gray-800 @error('name') border-red-500 @enderror">
                @error('name')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex flex-col mt-2">
                <input type="number"
                name="guests_number"
                placeholder="guest number"
                class="rounded-lg px-3 py-2 mb-3 text-gray-800 @error('guests_number') border-red-500 @enderror">
                @error('guests_number')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex flex-col mt-2">
                <select name="status" class="rounded-lg px-3 py-2 mb-3 text-gray-800 @error('status') border-red-500 @enderror">
                    @foreach (App\Enums\TableStatus::cases() as $status)
                        <option value="{{ $status->value }}">{{ $status->name }}</option>
                    @endforeach
                </select>
                @error('status')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="flex flex-col mt-2">
                <select name="location" id="location" class="rounded-lg px-3 py-2 mb-3 text-gray-800 @error('location') border-red-500 @enderror">
                    @foreach (App\Enums\TablesLocation::cases() as $location)
                        <option value="{{ $location->value }}">{{ $location->name }}</option>
                    @endforeach
                </select>
                @error('location')
                    <div class="text-red-500 mt-2 text-sm">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 shadow-lg shadow-blue-500/50 dark:shadow-lg dark:shadow-blue-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Store</button>
        </form>
      </div>
    </div>
</x-admin-layout>

