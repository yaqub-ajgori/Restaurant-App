<x-guest-layout>
    <section class="mt-8 bg-white">
        <div class="container w-full px-5 py-6 mx-auto">
            <div class="flex flex-col md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                  <img
                    class="object-cover w-full h-full"
                    src="https://cdn.pixabay.com/photo/2021/01/15/17/01/green-5919790__340.jpg"
                    alt="img"
                  />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                  <div class="w-full">
                    <h3 class="mb-4 text-xl font-bold text-blue-600">Sign up</h3>

                    <div class="w-full bg-gray-200 rounded-full">
                      <div
                        class="
                          w-full
                          p-1
                          mb-2
                          text-xs
                          font-medium
                          leading-none
                          text-center text-blue-100
                          bg-blue-600
                          rounded-full
                        "
                      >
                        Step2
                      </div>
                    </div>
                        <form action="" method="post">
                            @csrf
                            <div class="mb-2 max-w-3xl mx-auto">
                                <label for="table_id" class="block text-sm font-medium text-gray-700">Table</label>
                                <select name="table_id" id="table_id" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    @foreach ($tables as $table)
                                        <option value="{{ $table->id }}" @selected($reservation->table == $table)>{{ $table->name }}</option>
                                    @endforeach
                                </select>
                                @error('table_id')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-2 flex justify-between">
                                <button>
                                    <a href="{{ route('reservation.step.one') }}" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Previous</a>
                                </button>
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Make Reservation
                                </button>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </section>
</x-guest-layout>
