@extends('admin.layouts.admin_app')
@section('title', 'Singers')

@section('content')
  <section class="bg-white">
    <div class="p-4 sm:ml-64">
      <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 mt-14">
        @include('admin.components.alerts')
        <div class="grid grid-cols-1 gap-4 mb-4">
          <div class="flex items-center justify-start">
            <div class="relative w-full overflow-x-auto">
              <h2 class="font-bold text-2xl">Singers Table</h2>
            </div>
          </div>
          <div class="flex items-center justify-center min-h-48 rounded bg-white dark:bg-gray-800">
            <div class="relative w-full overflow-x-auto shadow-md sm:rounded-lg">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      Singer ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Profile
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                      <span class="sr-only">Edit</span>
                    </th>
                  </tr>
                </thead>
                <tbody id="singersTable">

                  @foreach ($singers as $singer)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                      <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{ $singer->id }}
                      </th>
                      <td class="px-6 py-4 text-transform: capitalize">
                        {{ $singer->name }}
                      </td>
                      <td class="px-6 py-4">
                        <div class="w-[350px] h-[80px] overflow-y-auto">
                          <p>{{ $singer->profile }} </p>
                        </div>
                      </td>
                      <td class="px-6 py-4">
                        <div class="overflow-hidden">
                          <img class="object-cover w-[100px] h-[100px]"
                            src="{{ asset('storage/' . $singer->image_path) }}" alt="Singer Image" class="w-full h-auto">
                        </div>
                      </td>
                      <td class="px-6 py-4 text-right">
                        <a id="editButton" href="{{ url('admin/singers/' . $singer->id . '/edit') }}"
                          class="px-4 font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        <button type="button" data-modal-target="deleteModal" data-singer-id="{{ $singer->id }}"
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
              {{-- Modal toggle --}}
              <button id="addButton" data-modal-target="addModal" data-modal-toggle="addModal"
                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Add a singer
              </button>
            </div>

            {{-- Modal start --}}
            <div id="addModal" tabindex="-1" aria-hidden="true"
              class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
              <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                {{-- Modal content --}}
                <div class="relative p-4 bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                  {{-- Modal header --}}
                  <div
                    class="flex justify-between items-center pb-4 mb-4 rounded-t border-b sm:mb-5 dark:border-gray-600">
                    <h3 id="modalTitle" class="text-lg font-semibold text-gray-900 dark:text-white">
                      Add Singer
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
                  {{-- Modal body --}}
                  <form method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 mb-4 sm:grid-cols-2">
                      <div>
                        <label for="singerName"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                        <input type="text" name="singerName" id="singerName"
                          class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                          placeholder="Type singer name" required="">
                      </div>
                      <div class="sm:col-span-2">
                        <label for="singerProfile"
                          class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profile</label>
                        <textarea name="singerProfile" id="singerProfile" rows="4"
                          class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:blue-primary-500"
                          placeholder="Write singer profile here" required=""></textarea>
                      </div>
                      <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                          for="file_input">Upload file</label>
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
                      Add new singer
                    </button>
                  </form>
                </div>
              </div>
            </div>
            {{-- Modal end --}}

            {{-- Delete modal start --}}
            <div id="deleteModal" tabindex="-1"
              class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
              <div class="relative p-4 w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                  <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="deleteModal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                      viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                  </button>
                  <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                      xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to delete
                      this product?</h3>
                    <form method="POST" action="{{ url('admin/singers/' . $singer->id) }}" class="inline">
                      @csrf
                      @method('DELETE')
                      <button id="confirm" data-modal-hide="deleteModal" type="submit"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                      </button>
                    </form>
                    <button data-modal-hide="deleteModal" type="button"
                      class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                      cancel</button>
                  </div>
                </div>
              </div>
            </div>
            {{-- Delete modal end --}}

          </div>
        </div>
      </div>
  </section>

  <script>
    $(document).ready(function() {
      // Select all delete buttons
      const deleteButtons = $('.delete-button');

      // Select the delete form in the modal
      const deleteForm = $('#deleteModal form');

      // Attach click event listener to each delete button
      deleteButtons.each(function() {
        $(this).on('click', function() {
          const singerId = $(this).data('singer-id'); // Get the singer's ID using jQuery's .data()
          const deleteUrl = `{{ url('admin/singers') }}/${singerId}`; // Build the dynamic URL

          deleteForm.attr('action', deleteUrl);
        });
      });
    });
  </script>
@endsection
