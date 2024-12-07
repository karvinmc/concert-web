@extends('layouts.app')
@section('title', 'Concerts')

@section('content')
  <section class="bg-white">
    <div class="flex flex-col items-center min-h-screen">
      <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
          <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
              Concerts
            </h2>
            <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
              You can see all available concerts here.
            </p>
          </div>
          <concerts />
        </div>
      </section>
    </div>
  </section>

  <script>
    window.assetUrl = '{{ asset('images/singers/taylor_swift.jpg') }}';
    window.pageUrl = '{{ url('concert_detail') }}';
  </script>
@endsection
