<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>كلية الدعوة</title>
    <!-- Styles -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ rand(0, 99) }}">
</head>

<body dir="rtl"
    style="background-image: url({{ asset('assets/images/website-bg-img.webp') }}); background-size: auto 100%;">
    <!-- header -->
    <header>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                    <div class="flex flex-row items-center justify-center my-4 ">
                        {{-- <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/rt-logo-h.png') }}" alt="left logo">
                        </div> --}}
                        <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-[260px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/middle-logo.png') }}" alt="left logo">
                        </div>
                        {{-- <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/lt-logo.svg') }}" alt="left logo">
                        </div> --}}
                    </div>

            </div>
        </div>
    </header>
    <!-- /header -->

    <!-- Start page content -->
    <section>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <p class="Hebah-Font text-center text-[#E3BD2F] text-[25px] md:text-[40px] lg:text-[64px] mb-10">
                    شكرا لك للتسجيل معنا
                </p>
                <p class="text-[25px] md:text-[28px] lg:text-[35px] mb-10 text-white text-center">
                    سيتم التواصل معكم قريبا
                </p>
            </div>
        </div>
    </section>
    <!-- End page content -->


</body>

</html>
