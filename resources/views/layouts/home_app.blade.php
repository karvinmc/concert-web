<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  @vite('resources/css/app.css')
  @vite(['resources/js/app.js'])
</head>

<body>
  {{-- Main Section --}}
  <main id="app">
    @yield('content')
  </main>

  {{-- Footer Section --}}
  <footer>
    {{-- TODO: Footer here --}}
  </footer>

  <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
