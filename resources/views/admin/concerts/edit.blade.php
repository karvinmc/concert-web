@extends('admin.layouts.admin_app')
@section('title', 'Edit')

@section('content')
  <section class="bg-white">
    <div class="p-4 sm:ml-64">
      <div class="p-4 rounded-lg mt-14">
        <div class="grid grid-cols-2 mb-4">
          {{-- Image preview --}}
          <div class="flex items-center justify-center mb-4 rounded">
            <div class="relative p-4 bg-white dark:bg-gray-800 sm:p-5">
              <img class="w-[500px] h-[500px] object-cover rounded" src="{{ asset('storage/' . $concert->image_path) }}">
            </div>
          </div>
          <div class="flex items-center justify-center mb-4 rounded">
            <div class="relative p-4 bg-white dark:bg-gray-800 sm:p-5">
              <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Edit Concert
                </h3>
              </div>
              <form method="POST" action="{{ url('admin/concerts/' . $concert->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                  <div>
                    <label for="singerID"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Singer</label>
                    <select id="singerID" name="singerID"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                      <option selected="" value="{{ $concert->singer_id }}">{{ $concert->singer->name }}</option>

                      @foreach ($singers as $singer)
                        @if ($singer->id != $concert->singer->id)
                          <option class="text-transform: capitalize" value="{{ $singer->id }}">{{ $singer->name }}</option>
                        @endif
                      @endforeach

                    </select>
                  </div>
                  <div>
                    <label for="concertName"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                    <input type="text" name="concertName" id="concertName"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Type concert name" required="" value="{{ $concert->name }}">
                  </div>
                  <div class="sm:col-span-2">
                    <label for="concertDesc"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <textarea id="concertDesc" rows="4" name="concertDesc"
                              class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                              placeholder="Write concert description here" required="">{{ $concert->description }}</textarea>
                  </div>
                  <div>
                    <label for="concertDate"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date</label>
                    <div class="relative max-w-sm">
                      <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                      </div>
                      <input id="datepicker-autohide" name="concertDate" datepicker datepicker-autohide type="text"
                             class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                             placeholder="Select concert date" required="" value="{{ \Carbon\Carbon::parse($concert->date)->format('m/d/Y') }}">
                    </div>
                  </div>
                  <div>
                    <label for="concertLoc"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location</label>
                    <input type="text" name="concertLoc" id="concertLoc"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Type concert location" required="" value="{{ $concert->location }}">
                  </div>
                  <div>
                    <label for="concertDefPrice"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Default Price</label>
                    <input type="number" name="concertDefPrice" id="concertDefPrice"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="$" required="" value="{{ $concert->default_price }}">
                  </div>
                  <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                           for="file_input">Upload image</label>
                    <input
                           class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                           id="imagePath" name="imagePath" type="file">
                  </div>
                </div>
                <button type="submit"
                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg class="mr-1 -ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                       xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                          d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                          clip-rule="evenodd"></path>
                  </svg>
                  Save changes
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
  </section>
