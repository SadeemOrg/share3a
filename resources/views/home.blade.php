<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $forms->slug }}</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ rand(0, 99) }}">
</head>

<body dir="rtl"
    style="background-image: url({{ asset('assets/images/website-bg-img.webp') }}); background-size: auto 100%;">
    <!-- header -->
    <header>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                @if ($nqp == false && $sakhnin == false && $share3a == false)
                    <div class="grid grid-cols-3 gap-6 ">
                        <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/rt-logo-h.png') }}" alt="left logo">
                        </div>
                        <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/middle-logo.png') }}" alt="left logo">
                        </div>
                        <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/lt-logo.svg') }}" alt="left logo">
                        </div>
                    </div>
                @elseif(($nqp == true || $share3a == false) && $sakhnin == false)
                
                    {{-- <div class="grid grid-cols-3 gap-6 ">
                        <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/middlelogo-nqp.jpeg') }}" alt="left logo">
                        </div>
                        <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/middle-logo.png') }}" alt="left logo">
                        </div>
                        <div class="col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/nqp.jpeg') }}" alt="left logo">
                        </div>
                    </div> --}}
                    <div class="flex flex-row items-center justify-center py-2">
                        <img class="max-w-[280px] w-full mx-auto"
                        src="{{ asset('assets/images/header-logos/middlelogo-nqp.jpeg') }}" alt="left logo">
              
                    </div>
                @elseif($nqp == false && $sakhnin == true && $share3a == false)
                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-6 mt-6 mb-8 sm:mb-0">
                        <div class="col-span-2 sm:col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/share3a-sakhnin_2.jpeg') }}" alt="left logo">
                        </div>
                        <div class="col-span-2 sm:col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/share3a-sakhnin_1.jpeg') }}" alt="left logo">
                        </div>
                        <div class="col-span-2 sm:col-span-1 flex justify-center items-center">
                            <img class="max-w-[220px] w-full mx-auto"
                                src="{{ asset('assets/images/header-logos/middlelogo-nqp1.jpeg') }}" alt="left logo">
                        </div>
                    </div>
                @endif
            </div>

        </div>

    </header>
    <!-- /header -->

    <!-- Start page content -->
    <section>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <p class="Hebah-Font text-center text-[#E3BD2F] text-[25px] md:text-[40px] lg:text-[64px] mb-10">
                    {{ $forms->text }}
                </p>

                <div class="text-white text-center">
                    <ul class="text-white features-list titles-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                        @if ($nqp == false && $share3a == true && $sakhnin == false)
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    مركز الهدى الثقافي دار القرآن الكريم نحف
                                </p>
                            </li>
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    كلية ومسجد الإمام علي شفاعمرو
                                </p>
                            </li>
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    كلية العلوم الشرعية كفربرا
                                </p>
                            </li>
                        @elseif($nqp == true && $share3a == false && $sakhnin == false)
                            {{-- <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    جمعية هاجر لتمكين المرأة
                                </p>
                            </li> --}}
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    جمعية السلام كسيفة
                                </p>
                            </li>
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    كلية العلوم الشرعية كفربرا
                                </p>
                            </li>
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    يعلنون للأهل في النقب عن بدء التسجيل للفوج الثاني (تموز 2024) لدراسة الشريعة
                                    الإسلامية
                                </p>
                            </li>
                            {{-- <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                 دبلوم في الشريعة، التعليم أيام السبت في رهط وكسيفة </p>
                            </li> --}}
                        @elseif($nqp == false && $share3a == false && $sakhnin == true)
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    كلية العلوم الشرعية كفربرا
                                </p>
                            </li>
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    وجمعيّة التّوعيّة الإسلاميّة سخنين
                                </p>
                            </li>
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    وجمعية هاجر
                                </p>
                            </li>
                            <li class="mb-5">
                                <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] relative pr-10">
                                    يعلنون للأهل في سخنين ومنطقة البطوف عن بدء التسجيل
                                    للفوج الثاني لدراسة الشريعة الإسلامية


                                </p>
                            </li>
                        @endif
                    </ul>
                    @if ($nqp == false && $share3a == true && $sakhnin == false)
                        <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] mb-10">
                            يعلنون عن بدء التسجيل ل:
                        </p>
                    @endif
                    @if ($share3a == true && $sakhnin == false && $nqp == false)
                        <p class="text-[25px] md:text-[40px] lg:text-[59px] bg-[#EBBD22] py-4 px-4 text-sh">
                            {{ $forms->second_text }}
                        </p>
                        <p class="text-[23px] md:text-[35px] lg:text-[43px] bg-[#124A85] py-3 px-4">
                            {{ $forms->second_sup_text }}
                        </p>
                    @elseif($sakhnin == true)

                    @elseif($nqp == true)
                        <p class="text-[25px] md:text-[40px] lg:text-[59px] bg-[#EBBD22] py-4 px-4 text-sh">
                            {{-- {{ $forms->second_text }} --}}
                            دبلوم في الشريعة الاسلامية، التعليم أيام السبت في رهط وكسيفة.
                        </p>
                        <div>
                            <div
                                class="text-[23px] md:text-[35px] lg:text-[43px] bg-[#124A85] h-60 flex flex-row items-center px-4">
                                <p>
                                    {{-- {{ $forms->second_sup_text }} --}}
                                    {{-- افتتاح العام الدراسي: السبت 06/07/2024 --}}
                                    لقب أول مع شهادة تدريس،مدة التعليم 3 سنوات.
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
                @php
                    $Contents = nova_get_setting('Content', '');
                    $Contents = json_decode($Contents);
                @endphp

                @if ($nqp == false && $share3a == true && $sakhnin == false)
                    <ul class="text-white features-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                أيام التعليم :أيام السبت في رهط وكسيفة.
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                التعليم عبارة عن 24 مساقًا، ومن يتمّها يحصل على دبلوم في الشريعة والعلوم الإسلاميّة من
                                كلّيّة كفربرا.
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                هناك إمكانيّة للحاصلين على الدبلوم إكمال اللقب الأوّل في كليّة أونو.
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                التعليم في نحف وشفاعمرو، مساقان كل فصل دراسي، 6 مساقات في السنة. وهناك إمكانيّة للانضمام
                                للمسار المكثّف في كفربرا.
                            </p>
                        </li>
                        {{-- <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                مساقات الفصل الثاني: عقيدة 1 + عبادات 1.
                            </p>
                        </li> --}}
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                كلفة التسجيل للمساقين: 1800 شيكل، 900 شيكل عن كل مساق. </p>
                        </li>
                    </ul>
                @elseif($nqp == true && $share3a == false && $sakhnin == false)
                    <ul class="text-white features-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                        {{-- <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                التعليم أيام السبت في رهط وكسيفة.
                            </p>
                        </li> --}}
                        {{-- <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                لقب أول مع شهادة تدريس.
                            </p>
                        </li> --}}
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                {{-- مدة التعليم 3 سنوات. --}}
                                افتتاح العام الدراسي: السبت 06/07/2024
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                مساقان كل فصل دراسي، 6 مساقات بالسنة
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                كلفة التسجيل للمساقين:1800 شيكل، 900 شيكل عن كل مساق.
                            </p>
                        </li>
                    </ul>
                @elseif($nqp == false && $share3a == false && $sakhnin == true)
                    <ul class="text-white features-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                بداية التعليم: السبت 7/6/2024
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                أيام التعليم: كل يوم سبت.
                            </p>
                        </li>

                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                التعليم عبارة عن 24 مساقًا، من يتمّها يحصل على دبلوم في الشريعة والعلوم الإسلاميّة من
                                كلّيّة كفربرا.
                            </p>
                        </li>

                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                بإمكان الحاصلين على الدبلوم إكمال اللقب الأوّل في كليّة أونو.
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                التعليم في مركز ابن عباس الثقافي في سخنين، مساقان كل فصل دراسي، 6 مساقات في السنة. وهناك
                                إمكانيّة للانضمام للمسار المكثّف في كفربرا </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                كلفة التسجيل للمساقين: 1800 شيكل، 900 شيكل عن كل مساق.
                            </p>
                        </li>
                    </ul>
                @endif

                @php
                    $questions = $forms->questions;
                    $questions = json_decode($questions);

                @endphp

                <form class="w-full " method="post" action="{{ route('form.store') }}">
                    <input type="hidden" name='formid' value="{{ $forms->id }}">
                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf
                    @foreach ($questions as $question)
                        @if ($question->layout == 'select')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <div class="relative">
                                        <select name='{{ $question->attributes->name }}'
                                            class="bg-transparent w-full border border-gray-200 text-white py-4 px-4 pr-8 rounded-sm leading-tight focus:outline-none focus:bg-transparent focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                            id="grid-state">
                                            <option class="text-[#000]">
                                                {{ $question->attributes->name }}</option>
                                            @foreach ($question->attributes->selectform as $selectform)
                                                <option value="{{ $selectform->attributes->text }}"
                                                    class="text-[#000]"> {{ $selectform->attributes->text }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        @endif
                        @if ($question->layout == 'text')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <input required name="{{ $question->attributes->text }}"
                                        class="block w-full bg-transparent text-white border border-white rounded-sm py-4  px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                        id="grid-password" type="text"
                                        placeholder="{{ $question->attributes->text }}">
                                </div>
                            </div>
                        @endif
                        @if ($question->layout == 'boolean')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <input id="remember" type="checkbox" name="{{ $question->attributes->text }}"
                                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                        required>
                                    {{ $question->attributes->text }}
                                </div>
                            </div>
                        @endif
                        @if ($question->layout == 'Note')
                            <div class="flex flex-wrap -mx-3 mb-6">
                                <div class="w-full px-3">
                                    <textarea name="{{ $question->attributes->text }}" id=""
                                        class="block w-full bg-transparent text-white border border-white rounded-sm py-4 px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                        cols="30" rows="10" placeholder="{{ $question->attributes->text }}"></textarea>
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="text-right mb-5">
                        <button
                            class="mb-4 block bg-[#124A85] px-20 w-full py-4 hover:bg-blue-700 text-white font-bold py-2 rounded-sm">
                            اضغط لإكمال عملية التسجيل
                        </button>
                    </div>
                    <p class="text-white TheSansArabic-regular text-[14px] mb-3">
                        <span class="text-[#EBBD22] ">ملاحظة:</span>
                        طاقم الكلية سوف يعود للتواصل معك لتأكيد عملية تسجيلك.
                    </p>
                    <div class="text-white TheSansArabic-regular text-[14px] flex flex-row items-center gap-x-2">
                        <span class="text-[#EBBD22] ">للاستفسار:</span>
                        @if ($nqp == false && $share3a == true && $sakhnin == false)
                            <a href="tel:0545431188" class="underline underline-offset-1">0545431188</a>
                        @elseif($nqp == true && $share3a == false && $sakhnin == false)
                            <div class="flex flex-col justify-start items-start">
                                <a href="tel:0508223804" class="underline underline-offset-1">كيان أبو عجاج
                                    0508223804
                                </a>
                            </div>
                        @elseif($nqp == false && $share3a == false && $sakhnin == true)
                            <div
                                class="flex flex-row flex-wrap sm:flex-nowrap gap-y-2 sm:gap-y-0 gap-x-4 justify-start">
                                <a href="tel:0506411910" class="underline underline-offset-1">الشيخ فريد حمزة:
                                    0506411910</a>
                                <a href="tel:0546896365" class="underline underline-offset-1">نجاح عثمان:
                                    0546896365</a>
                                {{-- <a href="tel:0538704518" class="underline underline-offset-1">هدى حجازي ذياب:
                                    0538704518</a> --}}
                                <a href="tel:0545431188" class="underline underline-offset-1">إكرام خطيب صبح:
                                    0545431188</a>
                            </div>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End page content -->

    <!-- footer -->
    <footer class="py-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <div class="md:flex items-center">
                    <img class="mx-auto md:mx-0 md:mb-0 mb-5 max-w-[300px]"
                        src="{{ asset('assets/images/footer-books.webp') }}" alt="footer books image">
                    <p class="text-[25px] md:text-[27px] lg:text-[32px] text-white">
                        <span class="text-[#EBBD22]">{{ nova_get_setting('Title_Footer', '') }} - </span>
                        {{-- {{ nova_get_setting('sub_Title_Footer', '') }} --}}
                        يمكنكم الالتحاق أيضًا بدورات تعليم أحكام التجويد عبر تطبيق الزوم.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- /footer -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        @if (Session::has('success'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.success("{{ Session::get('success') }}");
        @endif
        @if (Session::has('error'))
            toastr.options = {
                "closeButton": true,
                "progressBar": true
            }
            toastr.error("{{ Session::get('error') }}");
        @endif
        @if ($errors->any())
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
</body>

</html>
