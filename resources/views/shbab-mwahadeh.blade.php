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

    <body dir="rtl" class="bg-green-700 min-h-full bgg"
        style="background-image:url('https://media.discordapp.net/attachments/938405759996276806/1024261075954319430/D77A8EED_3.png?width=306&height=606') "
        ;>>
        <!-- header -->
        <header>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 my-12">
                <div class="mx-auto max-w-4xl">
                    <div class="">

                        <div class="col-span-1 flex justify-center items-center">
                            {{-- <img class="max-w-[220px] w-full mx-auto mt-10" src="/storage/{{ $forms->icons }}"
                                alt="left logo"> --}}
                            <img class="max-w-[90%]" src="{{ asset('assets/images/title.webp') }}" alt="title">
                        </div>

                    </div>
                </div>
            </div>
        </header>
        <!-- /header -->
        <!-- Start page content -->



        <section>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <!-- divder -->
                <div
                    class="flex flex-row justify-between items-center pt-5 md:pt-9 max-w-full w-full pb-1 sm:pb-0 m-auto">
                    <div class="border-b-2 border-[#CDCCD2] w-[42%] sm:w-[44%] md:w-[45%] lg:w-[46%]"></div>
                    <div
                        class="rounded-[50%] h-8 w-8 sm:h-14 sm:w-14 lg:h-16 lg:w-16 bg-[#FFFFFF] flex flex-row items-center justify-center">
                        <p class="text-[30px] sm:text-[38px] text-[#009245] font-bold">1</p>
                    </div>
                    <div class="border-b-2 border-[#CDCCD2] w-[42%] sm:w-[44%] md:w-[45%] lg:w-[46%]"></div>
                </div>
                <!-- end divder -->
                <div class="mx-auto max-w-5xl">
                    <p class="Hebah-Font text-center text-[#E3BD2F] text-[31px] md:text-[40px] lg:text-[64px] mb-10">
                        {{ $forms->text }}
                    </p>
                </div>
                <!--divder -->
                <div class="flex flex-row justify-between items-center  py-3 max-w-full w-full sm:pb-0 m-auto">
                    <div class="border-b-2 border-[#CDCCD2] w-[42%] sm:w-[44%] md:w-[45%] lg:w-[46%]"></div>
                    <div
                        class="rounded-[50%] h-8 w-8 sm:h-14 sm:w-14 lg:h-16 lg:w-16 bg-[#FFFFFF] flex flex-row items-center justify-center">
                        <p class="text-[30px] sm:text-[38px] text-[#009245] font-bold">2</p>
                    </div>
                    <div class="border-b-2 border-[#CDCCD2] w-[42%] sm:w-[44%] md:w-[44%] lg:w-[46%]"></div>
                </div>
                <!-- end divder -->
                <div class="text-white text-center my-4">
                    <p class="text-[20px] sm:text-[24px] md:text-[28px] lg:text-[38px] mb-10 font-bold">
                        جسور شبابية - نحو بناء قيادات مستقبلية
                    </p>
                </div>

            </div>
        </section>
        {{-- <section>
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="mx-auto max-w-5xl">
                    <p class="Hebah-Font text-center text-[#E3BD2F] text-[31px] md:text-[40px] lg:text-[64px] mb-10">
                        {{ $forms->text }}
                    </p>


                    <!-- second Paragraph -->
                    <div class="flex flex-row justify-between items-center  py-3 max-w-full w-full sm:pb-0 m-auto">
                        <div class="border-b-2 border-[#CDCCD2] w-[42%] sm:w-[44%] md:w-[45%] lg:w-[46%]"></div>
                        <div
                            class="rounded-[50%] h-8 w-8 sm:h-14 sm:w-14 lg:h-16 lg:w-16 bg-[#FFFFFF] flex flex-row items-center justify-center">
                            <p class="text-[30px] sm:text-[38px] text-[#009245] font-bold">2</p>
                        </div>
                        <div class="border-b-2 border-[#CDCCD2] w-[42%] sm:w-[44%] md:w-[44%] lg:w-[46%]"></div>
                    </div>

                    <div class="text-white text-center">
                        <p class="text-[20px] sm:text-[24px] md:text-[28px] lg:text-[38px] mb-10 font-bold">
                            جسور شبابية - نحو بناء قيادات مستقبلية
                        </p>
                    </div>


                    <ul class="text-white features-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                📅 الزمان: 23 - 25 أيار 2024 </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                📍 المكان: فندق جولدن كراون، الناصرة
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                الفئة العمرية: 18 -27 عامًا </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                عدد المشاركين: محدود
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                الورشة ستتناول محاور :
                                سياسية، دينية، إدارية، إعلامية، نفسية، اجتماعية، واستراتيجية.
                            </p>
                        </li>
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            </p>
                        </li>
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">📝 برنامج اللقاء: </p><br>
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10"> اليوم الأول: وصول
                            المشاركين، جلسة افتتاحية، ومحاضرات تفاعلية.</p><br>
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10"> اليوم الثاني: محاضرات،
                            ورشات عمل، جولة خارج الفندق، وحوار مع النواب. </p><br>
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10"> اليوم الثالث: ورشات عمل
                            تفاعلية وإنشاء خطة تفعيلية للأشهر الستة القادمة. </p><br>


                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                شروط الاشتراك:
                            </p>
                        </li>

                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10"> رسوم اشتراك رمزية: 100
                            شيكل للشخص.</p><br>
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10"> للجادّين فقط والذين
                            يتطلعون للمشاركة الدائمة وبناء مستقبل سياسي قيادي.</p><br>
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10"> التواجد في كل
                            السيمينار من بدايته لنهايته أمر ضروري.</p><br>


                    </ul>

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
                            @if ($question->layout == 'range')
                                <div class="flex flex-wrap -mx-3 mb-6">
                                    <div class="w-full px-3">
                                        <div class="relative">
                                            <select name='{{ $question->attributes->text }}'
                                                class="block w-full bg-transparent text-white border border-white rounded-sm py-4 px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                                id="grid-state">
                                                <option class="text-[#000]" name='{{ $question->attributes->text }}'>
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
                        @endforeach
                        <div class="text-right mb-5">
                            <button
                                class="mb-4 block bg-[#124A85] px-20 w-full text-sm  sm:text-lg hover:bg-blue-700 text-white font-bold py-4 rounded-sm">
                                اضغط لإكمال عملية التسجيل
                            </button>
                        </div>
                        <p class="text-white TheSansArabic-regular sm:text-base  text-[14px] mb-3">
                            <span class="text-[#EBBD22] ">ملاحظة:</span>
                            طاقم الموحدة سوف يعود للتواصل معك لتأكيد عملية تسجيلك.
                        </p>
                        <div
                            class="text-white TheSansArabic-regular sm:text-base  text-[14px]   flex flex-row items-center gap-x-2">
                            <span class="text-[#EBBD22] ">للاستفسار:</span>
                            <a href="tel:0509951387" class="underline underline-offset-1">يزن مراد
                                0509951387
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </section> --}}
        <!-- End page content -->

        <!-- footer -->
        <footer class="py-20">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

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
