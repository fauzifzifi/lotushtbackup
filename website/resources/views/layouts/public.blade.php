<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
<title>@yield('judul', 'SMP Negeri 1 Loceret')</title>
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
<link rel="apple-touch-icon" href="{{ asset('images/logo.png') }}">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@include('partials.public.navbar')

@yield('konten')

@include('partials.public.footer')

@stack('scripts')
</body>
</html>