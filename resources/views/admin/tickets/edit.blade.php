@extends('admin.layouts.admin_app')
@section('title', 'Edit')

@section('content')
  <section class="bg-white">
    <div class="p-4 sm:ml-64">
      <div class="p-4 rounded-lg mt-14">
        <div class="grid grid-cols-1 mb-4">
          <div class="flex items-center justify-center mb-4 rounded">
            <div class="relative p-4 bg-white dark:bg-gray-800 sm:p-5">
              <div class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Edit Tickets
                </h3>
              </div>
              <form method="POST" action="{{ url('admin/tickets/' . $ticket->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                  <div>
                    <label for="concertID"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Concert</label>
                    <select id="concertID" name="concertID"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required="">
                      <option selected="" value="{{ $ticket->concert_id }}"> {{ $ticket->concert->name }} </option>

                      @foreach ($concerts as $concert)
                        @if ($concert->id != $ticket->concert->id)
                          <option class="text-transform: capitalize" value="{{ $concert->id }}">{{ $concert->name }}</option>
                        @endif
                      @endforeach

                    </select>
                  </div>
                  <div>
                    <label for="time"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Time</label>
                    <div class="relative">
                      <div class="absolute inset-y-0 end-0 top-0 flex items-center pe-3.5 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                          <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm11-4a1 1 0 1 0-2 0v4a1 1 0 0 0 .293.707l3 3a1 1 0 0 0 1.414-1.414L13 11.586V8Z"
                                clip-rule="evenodd" />
                        </svg>
                      </div>
                      <input type="time" id="time" name="time"
                             class="bg-gray-50 border leading-none border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                             min="00:00" max="23:59" value="{{ $ticket->time }}" required />
                    </div>
                  </div>
                  <div>
                    <label for="price"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket Price</label>
                    <input type="number" name="price" id="price"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="$" required="" value="{{ $ticket->price }}">
                  </div>
                  <div>
                    <label for="seats"
                           class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Seats</label>
                    <input type="text" name="seats" id="seats"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="Type remaining seats" required="" value="{{ $ticket->seats }}">
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
