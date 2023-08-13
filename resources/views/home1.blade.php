<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> {{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}?v={{ rand(0, 99) }}">
</head>

<body dir="rtl">
    <!-- Start header -->
    <header>
        <div class="text-center bg-[#115A48] py-4">
            <a class="text-white text-[20px]" href="/register_2_lpage">سجلني</a>
        </div>
    </header>
    <!-- End header -->
    <section class="mt-28">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mx-auto max-w-4xl">
                <div class="py-5 mb-20 reg-log-box">
                    <div class="tabs-container flex gap-x-3">
                        <button
                            class="login-btn border w-1/2 py-4 hover:text-white text-white bg-[#115A48] hover:bg-[#115A48] duration-300">تسجيل
                            دخول</button>
                        <button class="register-btn border w-1/2 py-4 hover:text-white hover:bg-[#115A48] duration-300">
                            انشاء حساب
                        </button>
                    </div>
                    <div class="register-form mt-5">
                        <div class="hidden register-form-1">
                            <form target="_self" class="RegisterForm" name="add-blog-post-form" id="add-blog-post-form"
                                method="post" action="{{ url('store-form') }}">
                                @csrf

                                <div class="flex flex-wrap mb-5">
                                    <div class="w-full">
                                        <input name="name"
                                            class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                            id="" type="text" placeholder="الاسم">
                                    </div>
                                </div>
                                <div class="flex flex-wrap mb-5">
                                    <div class="w-full">
                                        <input name="email"
                                            class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                            id="" type="email" placeholder="البريد الالكتروني">
                                    </div>
                                </div>
                                <div class="flex flex-wrap mb-5">
                                    <div class="w-full">
                                        <input name="phone"
                                            class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                            id="phone" type="text" placeholder=" رقم الهاتف" required>
                                    </div>
                                </div>

                                <button
                                    class="border mb-4 w-full py-4 hover:text-white text-white bg-[#115A48] hover:bg-[#207661] duration-300">
                                    انشاء حساب
                                </button>
                                <p class="text-black TheSansArabic-regular text-[14px]">
                                    <span class="text-[#115a48] ">ملاحظة:</span>
                                    الرجاء إدخال رقم الهاتف بشكل صحيح حتى يتم التواصل معك.
                                </p>
                            </form>
                        </div>
                        <div class="login-form">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="flex flex-wrap mb-5">
                                    <div class="w-full">
                                        <input name="email"
                                            class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                            id="" type="email" placeholder="البريد الالكتروني">
                                    </div>
                                </div>
                                <div class="flex flex-wrap">
                                    <div class="w-full">
                                        <input name="password"
                                            class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                            id="" type="password" placeholder="كلمة المرور">
                                    </div>
                                </div>
                                <a href="#" id="open-reset-pass"
                                    class="my-2 inline-block hover:text-[#EBBD22] duration-300 text-[14px]">هل نسيت كلمة
                                    المرور؟</a>
                                <button
                                    class="border w-full py-4 hover:text-white text-white bg-[#115A48] hover:bg-[#207661] duration-300">
                                    تسجيل الدخول
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Start reset password -->
                <div class="mb-20 reset-pass-box hidden">
                    <form action="">
                        <h2 class="text-center text-25 md:text-[30px] mb-5">أدخل بريدك الالكتروني لإستعادة كلمة المرور
                        </h2>
                        <div class="flex flex-wrap">
                            <div class="w-full">
                                <input name="email"
                                    class="block w-full bg-transparent text-[#115A48] border border-[#115A48] rounded-sm py-4  px-4 leading-tight focus:ring-0 focus:outline-transparent focus:border-[#EBBD22]"
                                    id="" type="email" placeholder="البريد الالكتروني">
                            </div>
                        </div>
                        <a href="#" id="back-to-login"
                            class="my-2 flex items-center hover:text-[#EBBD22] duration-300 text-[14px]">
                            <svg xmlns="http://www.w3.org/2000/svg" class="svg-icon"
                                style="width: 1.2em; height: 1.2em;vertical-align: middle;fill: currentColor;overflow: hidden;"
                                viewBox="0 0 1024 1024" version="1.1">
                                <path
                                    d="M927.2 610.5c0 143-116.3 259.4-259.3 259.4H196.1c-12.9 0-23.4-10.4-23.4-23.4 0-12.9 10.4-23.4 23.4-23.4h471.7c117.2 0 212.6-95.4 212.6-212.6S785 397.8 667.8 397.8h-458l199.6 199.6c9.1 9.1 9.1 23.9 0 33-4.6 4.6-10.5 6.8-16.5 6.8s-11.9-2.3-16.5-6.8L137 391.1c-9.1-9.1-9.1-23.9 0-33l239.6-239.5c9.1-9.1 23.9-9.1 33 0s9.1 23.9 0 33L210 351.2h457.9c143 0 259.3 116.3 259.3 259.3z" />
                            </svg>
                            <span class="mr-1">
                                العودة لتسجيل الدخول
                            </span>
                        </a>
                        <button
                            class="border w-full py-4 hover:text-white text-white bg-[#115A48] hover:bg-[#207661] duration-300">
                            أرسل
                        </button>
                    </form>
                </div>
                <!--End reset password -->
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/additional-methods.min.js"></script>
    <script>
        $(document).ready(function() {
            // validation form



            $('.register-btn').click(function() {
                $('.register-form-1').fadeIn();
                $('.login-form').hide();
                $(this).addClass('text-white bg-[#115A48]').siblings('button').removeClass(
                    'text-white bg-[#115A48]');
            });
            $('.login-btn').click(function() {
                $('.login-form').fadeIn();
                $('.register-form-1').hide();
                $(this).addClass('text-white bg-[#115A48]').siblings('button').removeClass(
                    'text-white bg-[#115A48]');
            });
            $('#open-reset-pass').click(function(event) {
                event.preventDefault();
                $('.reset-pass-box').fadeIn();
                $('.reg-log-box').hide();
            });
            $('#back-to-login').click(function(event) {
                event.preventDefault();
                $('.reset-pass-box').hide();
                $('.reg-log-box').fadeIn();
            })
        })
    </script>
    <script>
        $(".RegisterForm").submit(function(e) {
            e.preventDefault()
            var form_data1 = $('#RegisterForm').serialize();
            var $name = $('input[name="name"]').val();
            var $phone = $('input[name="phone"]').val();
            var $email = $('input[name="email"]').val();
            $.ajax({
                type: "get",
                url: "/store-form",
                data: {
                    name: $name,
                    phone: $phone,
                    email: $email
                },
                success: function(data) {
                    if ($.isEmptyObject(data.error)) {
                        toastr.success('تمت عمليةالتسجيل بنجاح')
                        window.location.href = "{{ route('register_thanks')}}";
                    } else {
                        toastr.options = {
                            "closeButton": true,
                            "debug": false,
                            "positionClass": "toast-bottom-right",
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "2000",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        };
                        toastr.error(data.error[0]);
                    }
                },
                error: function() {
                    console.log("err");
                    console.log(data.error[0]);
                }
            })
        })
    </script>

</body>

</html>
