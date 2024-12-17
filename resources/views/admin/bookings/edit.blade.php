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
                  Edit Bookings
                </h3>
              </div>
              <form method="POST" action="{{ url('admin/bookings/' . $booking->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="grid gap-4 mb-4 sm:grid-cols-2">
                  <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Username</label>
                    <select id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                      <option selected=""value="{{ $booking->user_id }}">{{ $booking->user->name }}</option>

                      @foreach ($users as $user)
                        @if ($user->id != $booking->user->id)
                          <option class="text-transform: capitalize" value="{{ $user->id }}">{{ $user->name }}</option>
                        @endif
                      @endforeach

                    </select>
                  </div>
                  <div>
                    <label for="ticketID" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ticket</label>
                    <select id="ticketID" name="ticketID" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required="">
                      <option selected=""value="{{ $booking->ticket_id }}">{{ $booking->ticket_id }}</option>

                      @foreach ($tickets as $ticket)
                        @if ($ticket->id != $booking->ticket->id)
                          <option class="text-transform: capitalize" value="{{ $ticket->id }}">{{ $ticket->id }}</option>
                        @endif
                      @endforeach

                    </select>
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
