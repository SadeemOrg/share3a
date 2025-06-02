<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'مؤتمر' }}</title>
    <!-- Google Fonts: Tajawal & Cairo -->
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;700;900&family=Cairo:wght@400;700;900&display=swap" rel="stylesheet">
    <!-- Tailwind CSS (assumed to be included via Vite or CDN in main app) -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        body, html {
            font-family: 'Tajawal', 'Cairo', sans-serif;
        }
        .font-tajawal { font-family: 'Tajawal', sans-serif; }
        .font-cairo { font-family: 'Cairo', sans-serif; }
    </style>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ rand(0, 99) }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    @stack('head')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col" dir="rtl">
    <!-- Header slot -->
    @hasSection('header')
        <header class="mb-6">
            @yield('header')
        </header>
    @endif

    <!-- Main content slot -->
    <main class="flex-1">
        @yield('content')
    </main>

    <!-- Footer slot -->
    @hasSection('footer')
        <footer class="mt-8">
            @yield('footer')
        </footer>
    @endif
    @stack('scripts')
</body>
</html>
