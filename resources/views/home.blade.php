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
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ rand(0, 99) }}">

</head>

<body dir="rtl" class="" style="background-image: url({{ asset('assets/images/bg-img.jpg') }})">
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
                <p class="Hebah-Font text-center text-[#E3BD2F] text-[64px] mb-10">{{ nova_get_setting('title', '') }}
                </p>
                <div class="text-white text-center">
                    <p class="text-[35px] mb-10">
                        {{ nova_get_setting('subtitle', '') }}
                    </p>
                    <p class="text-[59px] bg-[#EBBD22] py-4 px-4 text-sh">
                        {{ nova_get_setting('title_Second', '') }}
                    </p>
                    <p class="text-[43px] bg-[#124A85] py-3 px-4">
                        {{ nova_get_setting('subtitle_Second', '') }}
                    </p>
                </div>
                @php
$Contents=nova_get_setting('Content', '');
$Contents = json_decode($Contents);

                @endphp
                <ul class="text-white features-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                    @foreach ($Contents  as $Content )
                    <li class="mb-5">
                        <p class="text-[27px] relative pr-10">
                            {{ $Content->attributes->title }}
                        </p>
                    </li>
                    @endforeach


                </ul>

                @if (Session::has('success'))
                    {{ Session::get('success') }}
                @endif
                <form class="w-full " method="post" action="{{ route('contact.store') }}">
                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="name"
                                class="block w-full bg-transparent text-white border border-white rounded py-3 px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                id="grid-password" type="text" placeholder="الاسم">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="phone_number"
                                class="block w-full bg-transparent text-white border border-white rounded py-3 px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                id="grid-password" type="text" placeholder="رقم الهاتف ">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="country"
                                class="block w-full bg-transparent text-white border border-white rounded py-3 px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                id="grid-password" type="text" placeholder="البلد">
                        </div>
                    </div>
                    <div class="flex flex-wrap -mx-3 mb-2">
                        <div class="w-full px-3">
                            {{-- <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
                                area
                            </label> --}}
                            <div class="relative">
                                <select name="area"
                                    class="bg-transparent w-full border border-gray-200 text-white py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                                    id="grid-state">
                                    <option>المنطقة التي تريد التعلم فيها</option>
                                    <option>فلسطين</option>
                                    <option>فلسطين</option>
                                    <option>فلسطين</option>
                                </select>

                            </div>
                        </div>

                    </div>
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Button
                    </button>
                </form>
            </div>
        </div>



    </section>
    <!-- End page content -->

    <!-- footer -->
    <footer class="container max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
        footer
    </footer>
    <!-- /footer -->

</body>

</html>
