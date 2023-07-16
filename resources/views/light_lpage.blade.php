<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>كلية الدعوة</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ rand(0, 99) }}">
</head>

<body dir="rtl" >
    <!-- header -->
    <header>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                {{-- <img src="{{ asset('assets/logos-header.svg') }}" alt=""> --}}
                <div class="flex justify-between items-center">
                    <div>
                        <a href="/register_2_lpage">
                            <img class="max-w-[180px] sm:max-w-[220px] w-full mx-auto" src="{{asset('assets/images/lpage-2/logo-2.svg')}}" alt="left logo">
                        </a>
                    </div>
                    <div class="flex gap-x-3 items-center">
                        <svg width="40" height="40" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_80_38)">
                            <path d="M38.0741 28.9722C38.0663 28.9643 38.0588 28.9565 38.0509 28.9486C38.0476 28.9453 38.0435 28.9412 38.0393 28.9374L35.2954 26.1934C34.5241 25.4218 33.4987 24.9971 32.4078 24.9971C31.3237 24.9971 30.3035 25.417 29.5337 26.1796C29.5281 26.1848 29.5229 26.1904 29.5173 26.1957L28.0589 27.6544L21.3429 20.938L22.8009 19.4796C22.8065 19.4744 22.8117 19.4688 22.8169 19.4636C24.3957 17.8703 24.3916 15.2896 22.8035 13.7016L20.0636 10.9613C20.0584 10.9561 20.0535 10.9512 20.0487 10.9464C19.2774 10.1766 18.2527 9.75269 17.1634 9.75269C16.0773 9.75269 15.056 10.174 14.2859 10.9385C14.2754 10.949 14.265 10.9594 14.2549 10.9703L12.9965 12.2283C12.3345 12.8903 11.8264 13.3984 11.8066 13.4186C9.86337 15.3614 9.40916 18.4587 10.5277 22.1399C11.552 25.5116 13.8059 29.0582 16.8736 32.1263C21.1563 36.409 26.4013 39.0692 30.561 39.0692C32.6183 39.0692 34.3548 38.4206 35.5757 37.1993C35.6012 37.1742 36.3036 36.4718 37.1376 35.6378L38.0509 34.7245C38.0524 34.723 38.0539 34.7215 38.0558 34.7196C39.6248 33.1454 39.6398 30.5924 38.0984 28.9991C38.0906 28.9898 38.082 28.9804 38.0741 28.9722ZM36.0311 32.6837C36.0225 32.6923 36.0139 32.7009 36.0053 32.7098L35.1077 33.6074C34.2879 34.4273 33.5955 35.1196 33.551 35.1637C32.8646 35.8501 31.8586 36.1982 30.561 36.1982C27.1864 36.1982 22.611 33.803 18.904 30.0963C16.1633 27.3557 14.1644 24.2338 13.2747 21.3051C12.4903 18.7245 12.6952 16.5899 13.8377 15.4474L15.0265 14.2586L16.3046 12.9804C16.3095 12.9756 16.314 12.9711 16.3185 12.9662C16.5461 12.7453 16.8452 12.6238 17.1634 12.6238C17.483 12.6238 17.7839 12.7468 18.0123 12.9703C18.0153 12.9737 18.0187 12.9771 18.0224 12.9804L20.7732 15.7315C21.2461 16.2044 21.2461 16.9738 20.7732 17.4467C20.7724 17.4474 20.7717 17.4486 20.7705 17.4493V17.4497L18.2972 19.923C17.7368 20.4838 17.7368 21.3926 18.2972 21.9533L27.044 30.6997C27.3131 30.9692 27.6784 31.1203 28.0589 31.1203C28.4399 31.1203 28.8051 30.9689 29.0743 30.6997L31.5319 28.2413C31.5409 28.2331 31.5495 28.2241 31.5581 28.2155C31.7865 27.9916 32.0878 27.8682 32.4078 27.8682C32.7316 27.8682 33.0359 27.9946 33.265 28.2234L36.0086 30.9666L36.0146 30.973C36.0176 30.976 36.0206 30.979 36.0232 30.982C36.4898 31.4511 36.492 32.2111 36.0311 32.6837Z" fill="#115A48"/>
                            <path d="M41.8241 7.17587C37.1967 2.54847 31.0444 0 24.5 0C17.9556 0 11.8033 2.54847 7.17587 7.17587C2.54847 11.8036 0 17.9559 0 24.5C0 31.0441 2.54847 37.1967 7.17587 41.8241C11.8033 46.4515 17.9559 49 24.5 49C31.0441 49 37.1964 46.4515 41.8241 41.8241C46.4515 37.1967 49 31.0444 49 24.5C49 17.9559 46.4515 11.8036 41.8241 7.17587ZM24.5 46.1289C12.5737 46.1289 2.87109 36.4259 2.87109 24.5C2.87109 12.5741 12.5737 2.87147 24.5 2.87109C36.4263 2.87147 46.1289 12.5741 46.1289 24.5C46.1285 36.4263 36.4259 46.1289 24.5 46.1289Z" fill="#115A48"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_80_38">
                            <rect width="49" height="49" fill="white"/>
                            </clipPath>
                            </defs>
                        </svg>
                        <a href="tel: +2614516161203266">
                            2614516161203266
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </header>
    <!-- /header -->

    <!-- main section -->
    <section class="pt-10 mb-14">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <p class="text-[20px] md:text-[23px] lg:text-[30px] mb-7 text-[#E3BD2F]">
                            التعليم اليوم متاخ أكثر من أي وقت مضى , لا حاجة للسفر بعيدا
                        </p>
                        <p class="text-[20px] md:text-[23px] lg:text-[30px] mb-10">
                            جمعية الامام علي شفاعمرو , وجمعية مركز الهدى نحف بالتعاون مع كلية كفر برا للعلوم الشرعية تعلنان عن افتتاح التسجيل
                        </p>
                    </div>
                    <div class="relative flex items-center">
                        {{-- <a href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="91" height="91" viewBox="0 0 91 91" fill="none">
                                <g clip-path="url(#clip0_903_2141)">
                                <path d="M45.5 0C20.3712 0 0 20.3712 0 45.5C0 70.6288 20.3712 91 45.5 91C70.6306 91 91 70.6288 91 45.5C91 20.3712 70.6306 0 45.5 0ZM45.5 81.9C25.429 81.9 9.1 65.571 9.1 45.5C9.1 25.429 25.429 9.1 45.5 9.1C65.571 9.1 81.9 25.429 81.9 45.5C81.9 65.571 65.571 81.9 45.5 81.9Z" fill="white"/>
                                <path d="M62.0489 42.315L39.9831 29.575C36.9492 27.8241 34.4668 29.2565 34.4668 32.76V58.24C34.4668 61.7435 36.9492 63.1776 39.9831 61.425L62.0489 48.685C65.0828 46.9341 65.0828 44.0659 62.0489 42.315Z" fill="white"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_903_2141">
                                <rect width="91" height="91" fill="white"/>
                                </clipPath>
                                </defs>
                            </svg>
                        </a> --}}
                        <div class="video-container" style="--aspect-ratio: 2 / 3;">
                            <iframe src="https://www.youtube.com/embed/LXb3EKWsInQ"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /main section -->

    <!-- Start register form -->
    <section class="mb-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <div class="flex items-center gap-x-3 mb-3">
                    <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="9.61218" height="9.61218" transform="matrix(0.719705 -0.69428 0.719705 0.69428 7.59619 6.67352)" fill="#115A48"/>
                        <rect width="9.61218" height="9.61218" transform="matrix(0.719705 -0.69428 0.719705 0.69428 7.59619 21.1775)" fill="#115A48"/>
                        <rect width="9.61218" height="9.61218" transform="matrix(0.719705 -0.69428 0.719705 0.69428 15.0093 13.8494)" fill="#115A48"/>
                        <rect width="9.61218" height="9.61218" transform="matrix(0.719705 -0.69428 0.719705 0.69428 0 13.8494)" fill="#115A48"/>
                    </svg>

                    <h3 class="text-[25px] text-[#115A48]">سجل معنا</h3>
                </div>
                <form class="w-full register-form" method="post" action="">
                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="name"
                                class="block w-full bg-[#f7f7f8] placeholder:text-[#f7f7f8] text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#E3BD2F]"
                                id="grid-password" type="text" placeholder="الاسم">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="phone_number"
                                class="block w-full bg-[#f7f7f8] placeholder:text-[#f7f7f8] text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#E3BD2F]"
                                id="grid-password" type="text" placeholder="رقم الهاتف ">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="country"
                                class="block w-full bg-[#f7f7f8] placeholder:text-[#f7f7f8] text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#E3BD2F]"
                                id="grid-password" type="text" placeholder="البلد">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            {{-- <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                area
                            </label> --}}
                            @php
                                $areas = nova_get_setting('area', '');
                                $areas = json_decode($areas);

                            @endphp
                            <div class="relative">
                                <select name="area"
                                    class="bg-[#f7f7f8] w-full border border-[#115A48] text-[#115A48] py-4 px-4 pr-8 rounded-sm leading-tight focus:outline-none focus:bg-[#f7f7f8] focus:ring-0 focus:outline-transparent focus:border-[#E3BD2F]"
                                    id="grid-state">
                                    <option class="text-[#000]">المنطقة التي تريد التعلم فيها</option>
                                    @foreach ($areas as $area)
                                        <option class="text-[#000]"> {{ $area->attributes->area }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <textarea name="" id="" class="block w-full bg-[#f7f7f8] text-[#115A48] border border-white rounded-sm py-4 px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#E3BD2F]" cols="30" rows="10" placeholder="هل لديك سؤال أو استفسار يمكن إضافته؟"></textarea>
                        </div>
                    </div>

                    <div class="text-right mb-5">
                        <button
                            class="mb-4 block bg-[#115A48] px-20 w-full py-4 hover:bg-[#167a62] text-white font-bold py-2 rounded-sm">
                            تسجيل الان
                        </button>
                    </div>
                    {{-- <p class="text-white TheSansArabic-regular text-[14px]">
                        <span class="text-[#EBBD22] ">ملاحظة:</span>
                        طاقم الكلية سوف يعود للتواصل معك لتأكيد عملية تسجيلك.
                    </p> --}}
                </form>
            </div>
        </div>
    </section>
    <!-- End register form -->

    <!--logos -->
    <section class="mb-20">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <div class="flex items-center justify-center mb-3 gap-x-3">
                    <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect width="9.61218" height="9.61218" transform="matrix(0.719705 -0.69428 0.719705 0.69428 7.59619 6.67352)" fill="#115A48"></rect>
                        <rect width="9.61218" height="9.61218" transform="matrix(0.719705 -0.69428 0.719705 0.69428 7.59619 21.1775)" fill="#115A48"></rect>
                        <rect width="9.61218" height="9.61218" transform="matrix(0.719705 -0.69428 0.719705 0.69428 15.0093 13.8494)" fill="#115A48"></rect>
                        <rect width="9.61218" height="9.61218" transform="matrix(0.719705 -0.69428 0.719705 0.69428 0 13.8494)" fill="#115A48"></rect>
                    </svg>

                    <h3 class="text-[32px] text-[#115A48]">بمشاركة</h3>
                </div>
                <div class="flex flex-wrap items-center gap-x-10 justify-center">
                    <div>
                        <img class="max-w-[150px]" src="{{asset('assets/images/lpage-2/logo-org.svg')}}" alt="">
                    </div>
                    <div>
                        <img class="max-w-[150px]" src="{{asset('assets/images/lpage-2/logo-org.svg')}}" alt="">
                    </div>
                    <div>
                        <img class="max-w-[150px]" src="{{asset('assets/images/lpage-2/logo-org.svg')}}" alt="">
                    </div>
                    <div>
                        <img class="max-w-[150px]" src="{{asset('assets/images/lpage-2/logo-org.svg')}}" alt="">
                    </div>
                    <div>
                        <img class="max-w-[150px]" src="{{asset('assets/images/lpage-2/logo-org.svg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /logos -->

    <!-- footer -->
    <footer class="py-20 pb-16" style="background-image: url({{asset('assets/images/lpage-2/footer-bg.jpg')}})">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl text-center">
                <img class="mx-auto" src="{{asset('assets/images/lpage-2/footer-logo.svg')}}" alt="logo footer">
                <p class="my-5 text-[20px] sm:text-[24px] text-white">
                    هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل
                </p>
                <div class="flex gap-x-3 items-center justify-center text-white ">
                    <svg width="40" height="40" viewBox="0 0 49 49" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <g clip-path="url(#clip0_80_38)">
                        <path d="M38.0741 28.9722C38.0663 28.9643 38.0588 28.9565 38.0509 28.9486C38.0476 28.9453 38.0435 28.9412 38.0393 28.9374L35.2954 26.1934C34.5241 25.4218 33.4987 24.9971 32.4078 24.9971C31.3237 24.9971 30.3035 25.417 29.5337 26.1796C29.5281 26.1848 29.5229 26.1904 29.5173 26.1957L28.0589 27.6544L21.3429 20.938L22.8009 19.4796C22.8065 19.4744 22.8117 19.4688 22.8169 19.4636C24.3957 17.8703 24.3916 15.2896 22.8035 13.7016L20.0636 10.9613C20.0584 10.9561 20.0535 10.9512 20.0487 10.9464C19.2774 10.1766 18.2527 9.75269 17.1634 9.75269C16.0773 9.75269 15.056 10.174 14.2859 10.9385C14.2754 10.949 14.265 10.9594 14.2549 10.9703L12.9965 12.2283C12.3345 12.8903 11.8264 13.3984 11.8066 13.4186C9.86337 15.3614 9.40916 18.4587 10.5277 22.1399C11.552 25.5116 13.8059 29.0582 16.8736 32.1263C21.1563 36.409 26.4013 39.0692 30.561 39.0692C32.6183 39.0692 34.3548 38.4206 35.5757 37.1993C35.6012 37.1742 36.3036 36.4718 37.1376 35.6378L38.0509 34.7245C38.0524 34.723 38.0539 34.7215 38.0558 34.7196C39.6248 33.1454 39.6398 30.5924 38.0984 28.9991C38.0906 28.9898 38.082 28.9804 38.0741 28.9722ZM36.0311 32.6837C36.0225 32.6923 36.0139 32.7009 36.0053 32.7098L35.1077 33.6074C34.2879 34.4273 33.5955 35.1196 33.551 35.1637C32.8646 35.8501 31.8586 36.1982 30.561 36.1982C27.1864 36.1982 22.611 33.803 18.904 30.0963C16.1633 27.3557 14.1644 24.2338 13.2747 21.3051C12.4903 18.7245 12.6952 16.5899 13.8377 15.4474L15.0265 14.2586L16.3046 12.9804C16.3095 12.9756 16.314 12.9711 16.3185 12.9662C16.5461 12.7453 16.8452 12.6238 17.1634 12.6238C17.483 12.6238 17.7839 12.7468 18.0123 12.9703C18.0153 12.9737 18.0187 12.9771 18.0224 12.9804L20.7732 15.7315C21.2461 16.2044 21.2461 16.9738 20.7732 17.4467C20.7724 17.4474 20.7717 17.4486 20.7705 17.4493V17.4497L18.2972 19.923C17.7368 20.4838 17.7368 21.3926 18.2972 21.9533L27.044 30.6997C27.3131 30.9692 27.6784 31.1203 28.0589 31.1203C28.4399 31.1203 28.8051 30.9689 29.0743 30.6997L31.5319 28.2413C31.5409 28.2331 31.5495 28.2241 31.5581 28.2155C31.7865 27.9916 32.0878 27.8682 32.4078 27.8682C32.7316 27.8682 33.0359 27.9946 33.265 28.2234L36.0086 30.9666L36.0146 30.973C36.0176 30.976 36.0206 30.979 36.0232 30.982C36.4898 31.4511 36.492 32.2111 36.0311 32.6837Z" fill="#fff"/>
                        <path d="M41.8241 7.17587C37.1967 2.54847 31.0444 0 24.5 0C17.9556 0 11.8033 2.54847 7.17587 7.17587C2.54847 11.8036 0 17.9559 0 24.5C0 31.0441 2.54847 37.1967 7.17587 41.8241C11.8033 46.4515 17.9559 49 24.5 49C31.0441 49 37.1964 46.4515 41.8241 41.8241C46.4515 37.1967 49 31.0444 49 24.5C49 17.9559 46.4515 11.8036 41.8241 7.17587ZM24.5 46.1289C12.5737 46.1289 2.87109 36.4259 2.87109 24.5C2.87109 12.5741 12.5737 2.87147 24.5 2.87109C36.4263 2.87147 46.1289 12.5741 46.1289 24.5C46.1285 36.4263 36.4259 46.1289 24.5 46.1289Z" fill="#fff"/>
                        </g>
                        <defs>
                        <clipPath id="clip0_80_38">
                        <rect width="49" height="49" fill="white"/>
                        </clipPath>
                        </defs>
                    </svg>
                    <a class="text-[20px]" href="tel: +2614516161203266">
                        2614516161203266
                    </a>
                </div>
                <div class="sm:flex justify-between mt-20">
                    <ul class="flex justify-center sm:justify-start gap-x-4 mb-4 sm:mb-0">
                        <li>
                            <a class="text-white TheSansArabic-regular hover:text-[#E3BD2F]" href="#">السياسة والخصوصية</a>
                        </li>
                        <li>
                            <a class="text-white TheSansArabic-regular hover:text-[#E3BD2F]" href="#">السياسة والخصوصية</a>
                        </li>
                    </ul>
                    <a class="text-white TheSansArabic-regular hover:text-[#E3BD2F]" href="#">
                        سديم جروب
                        <span>2023</span>
                    </a>
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
