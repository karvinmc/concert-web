@extends('admin.layouts.admin_app')
@section('title', 'Users')

@section('content')
  <section class="bg-white">
    <div class="p-4 sm:ml-64">
      <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        @include('admin.components.alerts')
        <div class="grid grid-cols-1 gap-4 mb-4">
          <div class="flex items-center justify-start">
            <div class="relative w-full overflow-x-auto">
              <h2 class="font-bold text-2xl">Users Table</h2>
            </div>
          </div>
          <div class="flex items-center justify-center min-h-48 rounded bg-white dark:bg-gray-800">
            <div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      User ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Password
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Role
                    </th>
                    <th scope="col" class="px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($users as $user)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $user->id }}
                      </th>
                      <td class="px-6 py-4 text-tranform: capitalize">
                        {{ $user->name }}
                      </td>
                      <td class="px-6 py-4">
                        {{ $user->email }}
                      </td>
                      <td class="px-6 py-4">
                        {{ $user->password }}
                      </td>
                      <td class="px-6 py-4 text-tranform: capitalize">
                        @if ($user->is_admin == 1)
                          Admin
                        @else
                          User
                        @endif
                      </td>
                      <td class="px-6 py-4 text-right">
                        <a id="editButton" href="{{ url('admin/users/' . $user->id . '/edit') }}"
                           class="px-4 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <button type="button" data-modal-target="deleteModal" data-singer-id="{{ $user->id }}"
                                data-modal-toggle="deleteModal"
                                class="delete-button font-medium text-red-600 dark:text-red-500 hover:underline">Remove</button>
                      </td>
                    </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </div>
          <div class="flex items-center justify-end rounded bg-white dark:bg-gray-800">
            <div class="flex justify-center">
              {{-- Add toggle --}}
              <button id="addButton" data-modal-target="addModal" data-modal-toggle="addModal"
                      class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                      type="button">
                Add a user
              </button>
            </div>

            {{-- Add modal start --}}
            <div id="addModal" tabindex="-1" aria-hidden="true"
                 class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
              <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                {{-- Modal content --}}
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                  {{-- Modal header --}}
                  <div
                       class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                      Add User
                    </h3>
                    <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="addModal">
                      <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                           xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                      </svg>
                      <span class="sr-only">Close modal</span>
                    </button>
                  </div>
                  {{-- Add body --}}
                  <form method="POST">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                      <div>
                        <label for="username"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="username" id="username"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="Type username" required="">
                      </div>
                      <div>
                        <label for="email"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-blue-500"
                               placeholder="name@email.com" required="">
                      </div>
                      <div>
                        <label for="password"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                        <input type="password" name="password" id="password"
                               class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               placeholder="••••••••" required="">
                      </div>
                      <div>
                        <label for="role"
                               class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="role" name="role"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                          <option selected="">Select role</option>
                          <option value="1">Admin</option>
                          <option value="0">User</option>
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
                      Add new user
                    </button>
                  </form>
                </div>
              </div>
            </div>
            {{-- Add modal end --}}

          </div>
        </div>
      </div>
  </section>
@endsection
