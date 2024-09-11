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
                <div class="flex flex-row items-center justify-center my-4">
                    <div class="col-span-1 flex justify-center items-center">
                        <img class="max-w-[260px] w-full mx-auto"
                            src="{{ asset('assets/images/header-logos/middle-logo.png') }}" alt="left logo">
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- /header -->

    <!-- Start page content -->
    <section>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <p class="Hebah-Font text-center text-[#E3BD2F] text-[25px] md:text-[40px] lg:text-7xl mb-10">
                    كلّيّة الشريعة كفر برا
                </p>

                <div class="text-white text-center">
                    <p class="text-[25px] md:text-[40px] lg:text-[59px] bg-[#EBBD22] py-4 px-4 text-sh">
                        كلّيّة الشريعة كفر برا تفتح أمامك فرصة لا تعوّض
                    </p>
                    <p class="text-[23px] md:text-[35px] lg:text-[43px] bg-[#124A85] py-3 px-4">
                        احصل على لقبك الأوّل
                    </p>
                </div>
                @php
                    $Contents = nova_get_setting('Content', '');
                    $Contents = json_decode($Contents);
                @endphp

                <ul class="text-white features-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                    <li class="mb-5">
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            24 مساقًا، وتنهي تعليمك مع لقب معترف به، وإمكانيّة التسجيل للّقب الثاني.

                        </p>
                    </li>
                    <li class="mb-5">
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            3 مساقات في الفصل الواحد.
                        </p>
                    </li>
                    <li class="mb-5">
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            3 فصول في العام الدراسي: فصل أوّل، فصل ثانٍ، فصل صيفي.

                        </p>
                    </li>
                    <li class="mb-5">
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            التعليم أيّام السبت فقط.
                        </p>
                    </li>
                    <li class="mb-5">
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            للكلّيّة 9 فروع، اختر الفرع الأقرب إليك.
                    </li>
                    <li class="mb-5">
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            التعليم يوم واحد فقط أسبوعيًّا.
                    </li>
                    <li class="mb-5">
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            هناك إمكانيّة لاختيار مسار تعليمي كامل عبر الزوم.
                        </p>
                    </li>
                    <li class="mb-5">
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            لا حاجة للبجروت لمن هم فوق 30 عامًا.
                        </p>
                    </li>
                    <li class="mb-5">
                        <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                            الدفع بالتقسيط وميسّر للجميع.
                        </p>
                    </li>
                </ul>

                @php
                    $questions = $forms->questions;
                    $questions = json_decode($questions);

                @endphp
                <div class="flex flex-row items-center justify-center my-4 text-white">
                    <p class="text-[16px] sm:text-[20px] md:text-[28px] lg:text-[35px] mb-10">
                        سجّل تفاصيلك، ونعاود الاتّصال بك في أقرب فرصة
                    </p>
                </div>
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
                            <a href="tel:0545431188" class="underline underline-offset-1">0545431188</a>
                       
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
