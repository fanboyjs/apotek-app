<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PharmaShop</title>
  <link rel="icon" type="image/x-icon" href="/icons/pharma-favicon.svg">
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
  <x-appbar />
  <main class="min-h-[100vh] md:p-20 bg-zinc-50">
    {{ $slot }}
  </main>
  <x-footer/>
</body>

</html>
