<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite('resources/css/app.css')
    </head>
    <body>
        <!-- header -->
        <header class="container max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
            <p>header</p>
        </header>
        <!-- /header -->

        <!-- Start page content -->
        <section class="container max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
            <p>content</p>
        </section>
        <!-- End page content -->

        <!-- footer -->
        <footer class="container max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
            footer
        </footer>
        <!-- /footer -->

    </body>
</html>
