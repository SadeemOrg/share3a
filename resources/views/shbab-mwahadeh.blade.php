    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>جسور شبابية - نحو بناء قيادات مستقبلية</title>
        <!-- Styles -->
        <link rel="stylesheet" type="text/css"
            href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        @vite('resources/css/app.css')
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ rand(0, 99) }}">
    </head>
    <style>
        .imgform {
            z-index: 0;
            position: absolute;
            top: 50%;
            --tw-translate-y: -50%;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }
        input::placeholder {
            color: white;
        }
        select {
            /* Hide default arrow */
            background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none"><path d="M5.5 7.5L10.5 12.5L15.5 7.5H5.5Z" fill="currentColor"/></svg>');
            background-repeat: no-repeat;
            background-position: left center;
            /* Optionally adjust padding to make space for the custom arrow */
            padding-left: 40px;
            /* Additional styles */
            border: 1px solid #A2A6B0;
            /* Add border style */
            border-radius: 0.375rem;
            /* Add border radius */
            height: 65px;
            /* Adjust height if needed */
            font-size: 1rem;
            /* Adjust font size */
            line-height: 1.5;
            /* Adjust line height */
        }
        @media screen and (min-width: 1024px) {
            .imgform {
                right: -8px;
            }
        }
    </style>
    <body dir="rtl" class=" min-h-full "
        style="background-image: url('{{ asset('assets/images/Artboard.png') }}');background-repeat: no-repeat;background-size: cover;">
        <!-- header -->
        <header>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 ">
                <div class="mx-auto max-w-5xl">
                    <div class=" flex flex-col justify-start items-center relative pt-44">
                        <img class="max-w-xl w-full mx-auto" src="/storage/{{ $forms->icons }}" alt="left logo">
                    </div>
                </div>
            </div>
        </header>
        <section class="-mt-10">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-6xl">
                    <p
                        class="Hebah-Font text-center text-[#E3BD2F] text-[42px] sm:text-[50px] md:text-[64px] m-6 sm:mt-0 font bold">
                        {{ $forms->text }}
                    </p>
                    <p class="font-bold text-center text-white text-[34px] sm:text-[40px]  md:text-[52px] my-10">
                        جسور شبابية - نحو بناء قيادات مستقبلية
                    </p>
                    <ul
                        class="text-white flex flex-row flex-wrap justify-start  gap-x-28 features-list mt-24 pb-8 mb-8 border-b border-[#EBBD22] ">
                        <li class="mb-5 min-w-[350px]">
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10">
                                الزمان: 23 - 25 أيار 2024 </p>
                        </li>
                        <li class="mb-5 min-w-[350px]">
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10">
                                المكان: فندق جولدن كراون، الناصرة- مع مبيت.
                            </p>
                        </li>
                        <li class="mb-5 min-w-[350px]">
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10">
                                الفئة العمرية: 18 -27 عامًا </p>
                        </li>
                        <li class="mb-5 min-w-[350px]">
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10">
                                عدد المشاركين: محدود
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10 ">
                                الورشة ستتناول محاور :
                                سياسية، دينية، إدارية، إعلامية، نفسية، اجتماعية، واستراتيجية.
                            </p>
                        </li>
                    </ul>
                    <p class="text-[24px] md:text-[24px] lg:text-[30px] relative text-white  mt-4">
                        برنامج اللقاء:
                    </p>
                    <ul
                        class="text-white flex flex-col gap-y-5 justify-start features-list py-4 sm:py-0  pb-8 mb-8  border-b border-[#EBBD22]">
                        <li>
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10"> اليوم الأول: وصول
                                المشاركين، جلسة افتتاحية، ومحاضرات تفاعلية.</p>
                        </li>
                        <li>
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10"> اليوم الثاني: محاضرات،
                                ورشات عمل، جولة خارج الفندق، وحوار مع النواب. </p>
                        </li>
                        <li>
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10 sm:pb-12 "> اليوم الثالث:
                                ورشات عمل
                                تفاعلية وإنشاء خطة تفعيلية للأشهر الستة القادمة. </p>
                        </li>
                    </ul>
                    <p class="text-[24px] md:text-[24px] lg:text-[30px] relative text-white  mt-4">
                        شروط الاشتراك:
                    </p>
                    <ul class="text-white flex flex-col gap-y-5 py-4 sm:py-0  justify-start features-list mt-4 pb-8 ">
                        <li>
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10"> رسوم اشتراك رمزية: 100
                                شيكل للشخص.</p>
                        </li>
                        <li>
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10"> للجادّين فقط والذين
                                يتطلعون للمشاركة الدائمة وبناء مستقبل سياسي قيادي.</p>
                        </li>
                        <li>
                            <p class="text-[20px] md:text-[24px] lg:text-[30px] relative pr-10 sm:pb-12 "> التواجد في كل
                                السيمينار من بدايته لنهايته أمر ضروري.</p>
                        </li>
                    </ul>
                    @php
                        $questions = $forms->questions;
                        $questions = json_decode($questions);
                    @endphp
                    <!-- start with Form -->
                    <div class="pt-10 md:pt-20 lg:pt-28 flex flex-col items-center justify-start relative ">
                        <div
                            class="block1 block absolute left-[50%] translate-x-[-50%] top-[20px] md:top-[40px] lg:top-[45px] w-[85%] sm:w-[75%] md:w-[70%] lg:w-[795px]">
                            <div class="relative ">
                                <h3
                                    class=" text-white  text-[24px] sm:text-[40px] md:text-[50px] lg:text-[62px] text-center z-10 relative italic">
                                    القائمة العربية الموحده</h1>
                                    <img src="{{ asset('assets/images/smallBlackArea.svg') }}" alt="black_svg"
                                        class="imgform ">
                            </div>
                        </div>
                        <form method="post" action="{{ route('form.store') }}"
                            class="pb-28  flex flex-col items-center">
                            @csrf
                            <div class=" bg-[#EBBD22] w-[95%] h-auto flex flex-col px-4 md:px-14 pb-8 mx-auto">
                                <p
                                    class=" mt-10 sm:mt-14 lg:mt-20 xl:mt-28 text-[20px] sm:text-[28px] md:text-[48px] text-center text-white">
                                    للمشاركة في جسور شبابية - نحو بناء قيادات مستقبلية
                                </p>
                                <input type="hidden" name='formid' value="{{ $forms->id }}">
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
                                                                class="text-[#000]">
                                                                {{ $selectform->attributes->text }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($question->layout == 'text')
                                        <div class="flex flex-wrap -mx-3 mb-6 mt-3">
                                            <div class="w-full px-3">
                                                <input required name="{{ $question->attributes->text }}"
                                                    class="w-full md:h-[65px] bg-transparent border-transparent border border-white rounded-md focus:ring-white focus:border-white sm:text-sm p-4"
                                                    id="grid-password" type="text"
                                                    placeholder="{{ $question->attributes->text }}"
                                                    style="color: rgb(99, 89, 89); /* Change placeholder color to black */">
                                            </div>
                                        </div>
                                    @endif
                                    @if ($question->layout == 'range')
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <div class="relative">
                                                    <select dir="rtl" name='{{ $question->attributes->text }}'
                                                        class=" block w-full  md:h-[65px] text-white bg-transparent border-transparent border border-white rounded-md focus:ring-white focus:border-white text-[14px] sm:text-sm p-4"
                                                        id="grid-state">
                                                        <option class="text-[#000]"
                                                            name='{{ $question->attributes->text }}'>
                                                            {{ $question->attributes->text }}</option>
                                                        @for ($i = $question->attributes->from; $i <= $question->attributes->to; $i++)
                                                            <option value="{{ $i }}" class="text-[#000]">
                                                                {{ $i }}
                                                            </option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if ($question->layout == 'boolean')
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <input id="remember" type="checkbox"
                                                    name="{{ $question->attributes->text }}"
                                                    class="w-4 h-4 border  border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                                                    required>
                                                {{ $question->attributes->text }}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($question->layout == 'Note')
                                        <div class="flex flex-wrap -mx-3 mb-6">
                                            <div class="w-full px-3">
                                                <textarea name="{{ $question->attributes->text }}" id=""
                                                    class="block w-full md:h-[65px] border-[#A2A6B0] border rounded-md focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm p-4"
                                                    cols="30" rows="10" placeholder="{{ $question->attributes->text }}"></textarea>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <button type="submit"
                                    class="mt-5 bg-[#124A85] text-white text-base sm:text-xl w-[100%]  md:h-[75px] py-4 font-[700] hover:bg-[#101426] duration-200">اضغط
                                    لإكمال عملية التسجيل</button>
                            </div>
                        </form>
                    </div>
                    <p class="text-white TheSansArabic-regular sm:text-base  text-[14px] mb-3">
                        <span class="text-[#EBBD22] ">ملاحظة:</span>
                        طاقم الموحدة سوف يعود للتواصل معك لتأكيد عملية تسجيلك.
                    </p>
                    <div class="text-white  sm:text-base  text-[14px]   flex flex-row items-center gap-x-2">
                        <span class="text-[#EBBD22] ">للاستفسار:</span>
                        <a href="tel:0509951387" class="underline underline-offset-1">يزن مراد
                            0509951387
                        </a>
                        <a href="tel:0509951387" class="underline underline-offset-1">احمد عابد
                            0523862002
                        </a>
                    </div>
                    <div class="flex flex-row items-center justify-start mt-12">
                        <button type="button"
                            class="mt-5 bg-[#ebbd22] text-red-600 text-base px-2 sm:text-xl w-auto md:w-[60%]  md:h-[75px] py-4 font-[700]  ">
                            <span>ملاحظه:</span>
                            آخر موعد للتسجيل يوم الخميس القادم الموافق 9 ايار 2024.
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer -->
        <footer class="py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            </div>
        </footer>
        <!-- /footer -->

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
