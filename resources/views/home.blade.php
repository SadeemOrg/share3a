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

<body dir="rtl" style="background-image: url({{asset('assets/images/website-bg-img.jpg')}}); background-size: auto 100%;">
    <!-- header -->
    <header>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <img src="{{ asset('assets/logos-header.svg') }}" alt="">
            </div>
        </div>

    </header>
    <!-- /header -->

    <!-- Start page content -->
    <section>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <p class="Hebah-Font text-center text-[#E3BD2F] text-[25px] md:text-[40px] lg:text-[64px] mb-10">{{ nova_get_setting('title', '') }}
                </p>
                <div class="text-white text-center">
                    <p class="text-[25px] md:text-[28px] lg:text-[35px] mb-10">
                        {{ nova_get_setting('subtitle', '') }}
                    </p>
                    <p class="text-[25px] md:text-[40px] lg:text-[59px] bg-[#EBBD22] py-4 px-4 text-sh">
                        {{ nova_get_setting('title_Second', '') }}
                    </p>
                    <p class="text-[23px] md:text-[35px] lg:text-[43px] bg-[#124A85] py-3 px-4">
                        {{ nova_get_setting('subtitle_Second', '') }}
                    </p>
                </div>
                @php
                    $Contents = nova_get_setting('Content', '');
                    $Contents = json_decode($Contents);

                @endphp
                <ul class="text-white features-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                    @foreach ($Contents as $Content)
                        <li class="mb-5">
                            <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                {{ $Content->attributes->title }}
                            </p>
                        </li>
                    @endforeach


                </ul>

                <form class="w-full " method="post" action="{{ route('contact.store') }}">
                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="name"
                                class="block w-full bg-transparent text-white border border-white rounded-sm py-4  px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                id="grid-password" type="text" placeholder="الاسم">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="phone_number"
                                class="block w-full bg-transparent text-white border border-white rounded-sm py-4  px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                id="grid-password" type="text" placeholder="رقم الهاتف ">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="country"
                                class="block w-full bg-transparent text-white border border-white rounded-sm py-4 px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                id="grid-password" type="text" placeholder="البلد">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
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
                                    class="bg-transparent w-full border border-gray-200 text-white py-4 px-4 pr-8 rounded-sm leading-tight focus:outline-none focus:bg-transparent focus:border-gray-500"
                                    id="grid-state">
                                    <option class="text-[#000]">المنطقة التي تريد التعلم فيها</option>
                                    @foreach ($areas as $area)
                                        <option  class="text-[#000]">    {{ $area->attributes->area }}</option>
                                    @endforeach
                                </select>

                            </div>
                        </div>

                    </div>
                    <div class="sm:flex gap-x-5 mt-10">
                        <button class="mb-4 mx-auto block bg-[#124A85] w-full sm:w-1/2 py-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-sm">
                            تسجيل الان
                        </button>
                        <a href="#" class="mb-4 mx-auto block bg-transparent sm:w-1/2 py-4 text-center border hover:bg-transparent hover:text-[#EBBD22] hover:border-[#EBBD22] text-white font-bold py-2 px-4 rounded-sm">
                            للمزيد من المعلومات
                        </a>
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
                    <img class="mx-auto md:mx-0 md:mb-0 mb-5 max-w-[300px]" src="{{asset('assets/images/footer-books.png')}}" alt="footer books image">
                    <p class="text-[25px] md:text-[27px] lg:text-[32px] text-white">
                        <span class="text-[#EBBD22]">{{ nova_get_setting('Title_Footer', '') }} - </span>
                        {{ nova_get_setting('sub_Title_Footer', '') }}                    </p>
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
        @if ($errors->any())
        @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
</body>

</html>
