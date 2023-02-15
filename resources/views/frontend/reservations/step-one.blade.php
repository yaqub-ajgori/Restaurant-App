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
                          w-3/6
                          p-1
                          text-xs
                          font-medium
                          leading-none
                          text-center text-blue-100
                          bg-blue-600
                          rounded-full
                        "
                      >
                        Step1
                      </div>
                    </div>
                        <form action="{{ route('reservation.step.one.store') }}" method="post">
                            @csrf
                            <div class="mb-2 max-w-3xl mx-auto">
                                <label for="first_name" class="block text-sm font-medium text-gray-700">First Name</label>
                                <input type="text" name="first_name" id="first_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="{{ $reservation->first_name ?? '' }}">
                                @error('first_name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-2 max-w-3xl mx-auto">
                                <label for="last_name" class="block text-sm font-medium text-gray-700">Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="{{ $reservation->last_name ?? ''}}">
                                @error('last_name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-2 max-w-3xl mx-auto">
                                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                <input type="text" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="{{ $reservation->email ?? '' }}">
                                @error('email')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-2 max-w-3xl mx-auto">
                                <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                                <input type="text" name="phone" id="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="{{ $reservation->phone ?? ''}}">
                                @error('phone')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-2 max-w-3xl mx-auto">
                                <label for="date" class="block text-sm font-medium text-gray-700">Reservation Date</label>
                                <input type="datetime-local" name="res_date"
                                min="{{ $minDate->format('Y-m-d\TH:i:s') }}"
                                max="{{ $maxDate->format('Y-m-d\TH:i:s') }}"
                                class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="{{ $reservation->res_date ??''}}">
                                @error('res_date')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-2 max-w-3xl mx-auto">
                                <label for="guest_number" class="block text-sm font-medium text-gray-700">Guest Number</label>
                                <input type="number" name="guest_number" id="guest_number" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                value="{{ $reservation->guest_number ?? '' }}">
                                @error('guest_number')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="mb-2 flex justify-end">
                                <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Next
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
