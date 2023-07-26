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

<body dir="rtl">
    <section>
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <div>
                    <img class="max-w-[220px] w-full mx-auto" src="https://sajilne.com/assets/images/header-logos/rt-logo.svg" alt="logo">
                </div>
                <div class="py-5 mb-20">
                    <div class="tabs-container flex gap-x-3">

                        <button class="login-btn border w-1/2 py-4 hover:text-white text-white bg-[#115A48] hover:bg-[#115A48] duration-300">تسجيل دخول</button>
                        <button class="register-btn border w-1/2 py-4 hover:text-white hover:bg-[#115A48] duration-300">
                            انشاء حساب
                        </button>
                    </div>
                    <div class="register-form mt-5">
                        <div class="hidden register-form-1">
                            <form action="">
                                <div class="flex flex-wrap mb-5">
                                    <div class="w-full">
                                        <input name="name" class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]" id="" type="text" placeholder="الاسم">
                                    </div>
                                </div>
                                <div class="flex flex-wrap mb-5">
                                    <div class="w-full">
                                        <input name="email" class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]" id="" type="email" placeholder="البريد الالكتروني">
                                    </div>
                                </div>
                                <div class="flex flex-wrap mb-5">
                                    <div class="w-full">
                                        <input name="phone" class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]" id="" type="text" placeholder=" رقم الهاتف">
                                    </div>
                                </div>
                                <div class="flex flex-wrap mb-5">
                                    <div class="w-full">
                                        <input name="password" class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]" id="" type="text" placeholder="كلمة المرور">
                                    </div>
                                </div>
                                <button class="border w-full py-4 hover:text-white text-white bg-[#115A48] hover:bg-[#207661] duration-300">
                                    انشاء حساب
                                </button>
                            </form>
                        </div>
                        <div class="login-form">
                            <form action="">
                                <div class="flex flex-wrap mb-5">
                                    <div class="w-full">
                                        <input name="email" class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]" id="" type="email" placeholder="البريد الالكتروني">
                                    </div>
                                </div>
                                <div class="flex flex-wrap">
                                    <div class="w-full">
                                        <input name="password" class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]" id="" type="text" placeholder="كلمة المرور">
                                    </div>
                                </div>
                                <a href="#"class="my-2 inline-block hover:text-[#EBBD22] duration-300 text-[15px]">هل نسيت كلمة المرور؟</a>
                                <button class="border w-full py-4 hover:text-white text-white bg-[#115A48] hover:bg-[#207661] duration-300">
                                    تسجيل الدخول
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $( document ).ready(function() {
            $('.register-btn').click(function() {
                $('.register-form-1').fadeIn();
                $('.login-form').hide();
                $(this).addClass('text-white bg-[#115A48]').siblings('button').removeClass('text-white bg-[#115A48]');
            });
            $('.login-btn').click(function() {
                $('.login-form').fadeIn();
                $('.register-form-1').hide();
                $(this).addClass('text-white bg-[#115A48]').siblings('button').removeClass('text-white bg-[#115A48]');
            })
        })
    </script>

</body>

</html>
