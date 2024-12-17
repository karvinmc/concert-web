@extends('layouts.app')
@section('title', 'Singer')

@section('content')
  <section class="bg-white">
    <div class="flex flex-col items-center min-h-screen">
      <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
          <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
              Singers
            </h2>
            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
              You can meet all singers here.
            </p>
          </div>
          <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <!-- Loop through items to create a card for each concert -->
            @foreach ($singers as $singer)
              <div class="bg-white border shadow-md border-gray-200 rounded-lg dark:bg-gray-800 dark:border-gray-700">
                <div class="relative h-[350px] w-full overflow-hidden rounded-t-lg">
                  <img class="rounded-t-lg w-full h-full object-cover" src="{{ 'storage/' . $singer->image_path }}" alt="{{ $singer->name }}">
                </div>
                <div class="p-5">
                  <a href="#">
                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">
                      {{ $singer->name }}
                    </h5>
                  </a>
                  <a href="{{ url('singer-detail/' . $singer->id) }}"
                     class="inline-flex justify-center w-full px-3 py-3 text-sm font-medium text-center text-white bg-primary-600 rounded-lg hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                    View Details
                  </a>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </section>
    </div>
  </section>
@endsection
