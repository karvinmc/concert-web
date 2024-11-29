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
    {{-- Navbar Section --}}
    <div id="app">
      <navbar/>
    </div>

    {{-- Main Section --}}
    <main>
      @yield('content')
    </main>

    {{-- Footer Section --}}
    <footer>
      {{-- TODO: Footer here --}}
    </footer>

</body>

</html>