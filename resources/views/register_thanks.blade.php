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

<body dir="rtl" >
    <!-- Start page content -->
    <section class="flex items-center justify-center h-[100vh]">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <h2 class="text-[38px] md:text-[48px] text-center">سجلني</h2>
                <p class="Hebah-Font text-center text-[#E3BD2F] text-[35px] md:text-[40px] lg:text-[64px] mb-8">
                    شكرا لك للتسجيل معنا
                </p>
                <p class="text-[25px] md:text-[28px] lg:text-[35px] text-[#115A48] text-center">
                     سيتم التواصل معكم قريبا من قبل احد المسؤولين
                </p>
            </div>
        </div>
    </section>
    <!-- End page content -->
</body>

</html>
