<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>القائمة العربية الموحدة </title>
    <!-- Styles -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ rand(0, 99) }}">
</head>

<body dir="rtl" class=" min-h-full "
style="background-image: url('{{ asset('assets/images/Artboard.png') }}');background-repeat: no-repeat;background-size: cover;min-height: 100vh;">

    <!-- Start page content -->
    <section class="flex flex-col items-center justify-center h-screen">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 ">
                <div class="mx-auto max-w-4xl">

                    <div class="flex flex-row  items-start justify-center ">

                        <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-xl w-full mx-auto" src="/storage/{{ $logo }}" alt="logo">
                        </div>

                    </div>
                </div>
            </div>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <p class=" text-center text-[#E3BD2F] text-[25px] md:text-[40px] lg:text-[64px] mb-10">
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
