@extends('layouts.home_app')
@section('title', 'Homepage')

@section('content')
  {{-- Hero Section --}}
  <section
           class="relative bg-cover bg-center bg-no-repeat h-[600px] flex items-center justify-center px-4 sm:px-8 lg:px-12"
           style="background-image: url('{{ asset('images/hero.png') }}');">
    <div class="absolute inset-0 bg-black opacity-60"></div>

    {{-- Navbar --}}
    <header class="absolute top-0 left-0 w-full z-20">
      <nav class="bg-transparent border-gray-200 dark:bg-transparent">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
          <a href="{{ url('/') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="{{ asset('images/logo.png') }}" class="h-8" alt="Logo" />
            <span
                  class="text-white self-center text-2xl font-semibold whitespace-nowrap text-transform: first-line:uppercase dark:text-white">StagePass</span>
          </a>
          <div class="flex md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
            <a href="{{ url('login') }}" type="button"
               class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2 text-center dark:bg-transparent dark:border-white dark:hover:bg-primary-700 dark:focus:ring-primary-800">Login</a>
            <button data-collapse-toggle="navbar-cta" type="button"
                    class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                    aria-controls="navbar-cta" aria-expanded="false">
              <span class="sr-only">Open main menu</span>
              <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                   viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M1 1h15M1 7h15M1 13h15" />
              </svg>
            </button>
          </div>
          <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-cta">
            <ul
                class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-transparent md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 md:bg-transparent dark:bg-transparent md:dark:bg-transparent dark:border-gray-700">
              <li>
                <a href="{{ url('/') }}"
                   class="block py-2 px-3 md:p-0 rounded {{ request()->is('/') ? 'text-white bg-primary-500 md:bg-transparent md:text-primary-500' : 'text-white hover:bg-primary-600 md:hover:bg-transparent md:hover:text-primary-600 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}"
                   aria-current="page">Home</a>
              </li>
              <li>
                <a href="{{ url('concerts') }}"
                   class="block py-2 px-3 md:p-0 rounded {{ request()->is('concerts') ? 'text-white bg-primary-500 md:bg-transparent md:text-primary-500' : 'text-white hover:bg-primary-600 md:hover:bg-transparent md:hover:text-primary-600 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}">Concerts</a>
              </li>
              <li>
                <a href="{{ url('singers') }}"
                   class="block py-2 px-3 md:p-0 rounded {{ request()->is('singers') ? 'text-white bg-primary-500 md:bg-transparent md:text-primary-500' : 'text-white hover:bg-primary-600 md:hover:bg-transparent md:hover:text-primary-600 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent' }}">Singers</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    {{-- Hero Content --}}
    <div class="relative text-center lg:py-16 lg:px-12">
      <h1
          class="mt-10 mb-4 text-4xl font-extrabold tracking-tight leading-none text-white md:text-5xl lg:text-6xl dark:text-white">
        Book Tickets of Your Favorite Singers!
      </h1>
      <p class="mb-8 text-lg font-normal text-white lg:text-xl sm:px-16 xl:px-48 dark:text-white">
        Make sure you don't miss up these upcoming concerts!
      </p>
      <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
        <form class="flex flex-col space-y-4 sm:flex-row sm:space-x-4">
          <label for="default-search"
                 class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
          <div class="relative w-full sm:w-1/2">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                   width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="2"
                      d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
              </svg>
            </div>
            <input type="search" id="default-search"
                   class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                   placeholder="Type a singer name" required />
          </div>
          <div class="relative w-full sm:w-1/2">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                   width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
              </svg>
            </div>
            <input type="search" id="default-search"
                   class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                   placeholder="Location" required />
          </div>
          <div class="relative w-full sm:w-1/2">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                   width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 10h16M8 14h8m-4-7V4M7 7V4m10 3V4M5 20h14a1 1 0 0 0 1-1V7a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1Z" />
              </svg>
            </div>
            <input datepicker id="default-datepicker" type="text"
                   class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                   placeholder="Select date">
          </div>
          <button type="submit"
                  class="text-white bg-primary-600 hover:bg-primary-700 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800"><svg
                 class="w-6 h-6 text-white dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                    d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
            </svg>
          </button>
        </form>
      </div>
    </div>
  </section>

  {{-- Benefits Section --}}
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
          Our Benefits
        </h2>
        <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
          We promise users with the standard of these services
        </p>
      </div>
      <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-4 md:gap-12 md:space-y-0">
        <div>
          <div class="flex justify-center items-center mb-4 w-12 h-12 rounded-full bg-primary-100 dark:bg-primary-900">
            <svg class="w-6 h-6 text-primary-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 4h1.5L8 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm.75-3H7.5M11 7H6.312M17 4v6m-3-3h6" />
            </svg>
          </div>
          <h3 class="mb-2 text-xl font-bold dark:text-white">Online Booking</h3>
          <p class="text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam
            incidunt deserunt nostrum!</p>
        </div>
        <div>
          <div
               class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
            <svg class="w-6 h-6 text-primary-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m16 10 3-3m0 0-3-3m3 3H5v3m3 4-3 3m0 0 3 3m-3-3h14v-3" />
            </svg>
          </div>
          <h3 class="mb-2 text-xl font-bold dark:text-white">Refundable Tickets</h3>
          <p class="text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Neque
            soluta necessitatibus sit?</p>
        </div>
        <div>
          <div
               class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
            <svg class="w-6 h-6 text-primary-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M8.891 15.107 15.11 8.89m-5.183-.52h.01m3.089 7.254h.01M14.08 3.902a2.849 2.849 0 0 0 2.176.902 2.845 2.845 0 0 1 2.94 2.94 2.849 2.849 0 0 0 .901 2.176 2.847 2.847 0 0 1 0 4.16 2.848 2.848 0 0 0-.901 2.175 2.843 2.843 0 0 1-2.94 2.94 2.848 2.848 0 0 0-2.176.902 2.847 2.847 0 0 1-4.16 0 2.85 2.85 0 0 0-2.176-.902 2.845 2.845 0 0 1-2.94-2.94 2.848 2.848 0 0 0-.901-2.176 2.848 2.848 0 0 1 0-4.16 2.849 2.849 0 0 0 .901-2.176 2.845 2.845 0 0 1 2.941-2.94 2.849 2.849 0 0 0 2.176-.901 2.847 2.847 0 0 1 4.159 0Z" />
            </svg>
          </div>
          <h3 class="mb-2 text-xl font-bold dark:text-white">Cheapest Tickets</h3>
          <p class="text-gray-500 dark:text-gray-400">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum
            dicta ullam provident.</p>
        </div>
        <div>
          <div
               class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
            <svg class="w-6 h-6 text-primary-700 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                 width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
            </svg>
          </div>
          <h3 class="mb-2 text-xl font-bold dark:text-white">Pay in Instalment</h3>
          <p class="text-gray-500 dark:text-gray-400">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta
            quam placeat excepturi.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- Nearby Concerts Section --}}
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
          Time is Running Out!
        </h2>
        <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
          Explore nearby concerts and events here.
        </p>
      </div>
      <swiper-nearby />
    </div>
  </section>

  {{-- Buy Ticket Section --}}
  <section class="bg-gray-50 dark:bg-gray-900">
    <div class="gap-16 items-center py-8 px-4 mx-auto max-w-screen-xl lg:grid lg:grid-cols-2 lg:py-16 lg:px-6">
      <div class="font-light text-gray-500 sm:text-lg dark:text-gray-400">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Easy Steps to Buy a Ticket!
        </h2>
        <p class="mb-8">Get familiar with our easy working process.</p>
        <a href="{{ url('concerts') }}"
           class="inline-flex items-center font-medium text-primary-600 hover:text-primary-800 dark:text-primary-500 dark:hover:text-primary-700">
          Buy Ticket
          <svg class="ml-1 w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
                  d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                  clip-rule="evenodd"></path>
          </svg>
        </a>
      </div>
      <div class="grid grid-cols-3 gap-4 mt-8">
        <img class="w-full rounded-lg shadow" src="{{ asset('images/choose.png') }}" alt="office content 1"
             data-tooltip-target="tooltip-choose" data-tooltip-placement="bottom">
        <div id="tooltip-choose" role="tooltip"
             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
          1. Choose a concert!
          <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <img class="mt-4 w-full lg:mt-10 rounded-lg shadow" src="{{ asset('images/choose date.png') }}"
             alt="office content 2" data-tooltip-target="tooltip-date" data-tooltip-placement="top">
        <div id="tooltip-date" role="tooltip"
             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
          2. Select time & date!
          <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
        <img class="w-full rounded-lg shadow" src="{{ asset('images/pay.png') }}" alt="office content 1"
             data-tooltip-target="tooltip-pay" data-tooltip-placement="bottom">
        <div id="tooltip-pay" role="tooltip"
             class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-primary-600 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
          3. Pay your bill!
          <div class="tooltip-arrow" data-popper-arrow></div>
        </div>
      </div>
    </div>
  </section>

  {{-- Upcoming Concerts Section --}}
  <section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
      <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
        <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
          Upcoming Concerts
        </h2>
        <p class="font-light text-gray-500 lg:mb-16 sm:text-xl dark:text-gray-400">
          The best concerts will be held soon!
        </p>
      </div>
      <swiper-upcoming />
    </div>
    </div>
  </section>

  <script>
    window.assetUrl = '{{ asset('images/singers/taylor_swift.jpg') }}';
    window.pageUrl = '{{ url('concert_detail') }}'
  </script>
@endsection
