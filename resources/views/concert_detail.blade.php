@extends('layouts.app')
@section('title', 'Booking')

@section('content')
  <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
    <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
      <div class="mx-auto max-w-5xl">
        <h2 class="text-xl font-bold text-gray-900 dark:text-white sm:text-2xl">Taylor Swift Concert "The Eras Tour"
        </h2>
        <div class="my-8 xl:mb-6 xl:mt-12">
          <img class="w-full rounded-2xl" src="{{ asset('images/concerts/The-Eras-Tour.jpg') }}" alt="" />
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 my-8">
          <h2 class="text-lg text-gray-900 dark:text-white flex items-center">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
            </svg>
            Date: [Date here]
          </h2>
          <h2 class="text-lg text-gray-900 dark:text-white flex items-center">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
            </svg>
            Location: [Location here]
          </h2>
        </div>
      </div>
    </div>
  </section>

  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-bold text-gray-900 dark:text-white">
          Choose Date and Time
        </h2>
        <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
          All available tickets are here.
        </p>
      </div>
      <tickets />
    </div>
  </section>

  <script>
    window.assetUrl = '{{ asset('images/singers/taylor_swift.jpg') }}';
    window.pageUrl = '{{ url('seat') }}'
  </script>
@endsection
