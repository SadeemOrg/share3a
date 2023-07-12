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
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{rand(0, 99)}}">

</head>

<body dir="rtl" class="" style="background-image: url({{asset('assets/images/bg-img.jpg')}}); background-size: auto 100%;">
    <!-- header -->
    <header>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <img src="{{asset('assets/logos-header.svg')}}" alt="">
            </div>
        </div>

    </header>
    <!-- /header -->

    <!-- Start page content -->
    <section>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <p class="Hebah-Font text-center text-[#E3BD2F] text-[64px] mb-10">التعليم اليوم متاح أكثر من أي وقت مضى , لا حاجة للسفر بعيدا</p>
                <div class="text-white text-center">
                    <p class="text-[35px] mb-10">
                        جمعية الامام علي شفاعمرو , وجمعية مركز الهدى نحف بالتعاون مع كلية كفر برا للعلوم الشرعية تعلنان عن افتتاح التسجيل ل
                    </p>
                    <p class="text-[59px] bg-[#EBBD22] py-4 px-4 text-sh">
                        مساقات متفرقة في دبلوم
                        الشريعة والعلوم الاسلامية
                    </p>
                    <p class="text-[43px] bg-[#124A85] py-3 px-4">
                        افتتاح العام الدراسي في شهر <span>10/2023</span>
                    </p>
                </div>
                <ul class="text-white features-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                    <li class="mb-5">
                        <p class="text-[27px] relative pr-10">
                            الدبلوم عبارة عن 24 مساق ومن يتمها يحصل على دبلوم في الشريعة والعلوم الااسامية من كلية كفر برا
                        </p>
                    </li>
                    <li class="mb-5">
                        <p class="text-[27px] relative pr-10">
                            هناك امكانية للحاصلين على الدبلوم اكمال اللقب الاول في كلية اونو
                        </p>
                    </li>
                    <li class="">
                        <p class="text-[27px] relative pr-10">
                            التعليم في شفاعمرو ونحف , وهناك امكانية للانضمام للمسار المكثف في كفر برا
                        </p>
                    </li>
                </ul>

                @if(Session::has('success'))
                    {{Session::get('success')}}
                @endif
                <form class="w-full "  method="post" action="{{ route('contact.store') }}">
                    <!-- CROSS Site Request Forgery Protection -->
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full px-3">
                            <input name="name" class="block w-full bg-transparent text-white border border-white rounded-sm py-4 px-4 mb-3 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
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
                            <div class="relative">
                                <select name="area"
                                    class="bg-transparent w-full border border-gray-200 text-white py-4 px-4 pr-8 rounded-sm leading-tight focus:outline-none focus:bg-transparent focus:border-gray-500"
                                    id="grid-state">
                                    <option class="text-[#000]">المنطقة التي تريد التعلم فيها</option>
                                    <option class="text-[#000]">فلسطين</option>
                                    <option class="text-[#000]">فلسطين</option>
                                    <option class="text-[#000]">فلسطين</option>
                                </select>

                            </div>
                        </div>

                    </div>
                    <div class="flex gap-x-5 mt-10">
                        <button class="bg-[#124A85] w-1/2 py-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-sm">
                            تسجيل الان
                        </button>
                        <a href="#" class="bg-transparent w-1/2 py-4 text-center border hover:bg-transparent hover:text-[#EBBD22] hover:border-[#EBBD22] text-white font-bold py-2 px-4 rounded-sm">
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
                <div class="flex items-center">
                    <img class="max-w-[300px]" src="{{asset('assets/images/footer-books.png')}}" alt="footer books image">
                    <p class="text-[32px] text-white">
                        <span class="text-[#EBBD22]">مجانا - </span>
                        يمكنكم الالتحاق مجانا بدورات تعليم أحكام التجويد عبر تطبيق الزوم.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- /footer -->

</body>

</html>
