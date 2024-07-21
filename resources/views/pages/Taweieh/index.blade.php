@extends('layouts.app_layout')

@section('content')
    <section>
        <img src="{{ asset('assets/images/blue.png') }}" alt="blue" class="absolute left-0 top-0 xl:block hidden">
        <div class="xl:hidden  block h-24 bg-[#207ec6]"></div>
        <div class="mx-auto max-w-[1250px] sm:px-6 lg:px-8 mt-4 xl:mt-20">
            <div class="hidden xl:flex flex-row  items-start gap-x-4">
                <div class="basis-1/4 border-l-4 flex items-center justify-center pr-8">
                    <img class="" src="{{ asset('assets/images/Tawhedlogo.jpeg') }}" alt="Tawhedlogo">
                </div>
                <div class="basis-3/4 flex flex-row items-center justify-start gap-x-24">
                    <div class=" flex flex-row items-center justify-start">
                        <div class="flex flex-col items-start justify-start gap-y-2 mt-4">
                            <h2 class="text-4xl  " style="font-weight: 1100;">
                                <span class="text-[#82c746]">
                                    مطلوب
                                </span>
                                لمؤسسة الحياة
                            </h2>
                            <h2 class="text-4xl  " style="font-weight: 1100;">
                                للتوعية والتثقيف الصحي
                            </h2>
                            <div class="flex flex-row items-center justify-center w-full mt-2">
                                <div class="bg-[#207ec6] rounded-lg px-3 py-2">
                                    <h2 class="text-4xl  font-black text-white text-center">منسق/برويكتور</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" flex flex-col items-center justify-center gap-y-3 z-10">
                        <p class="text-2xl font-black"> لتفاصيل أخرى عن الوظيفة</p>
                        <a target="_black"  href="{{ asset('assets/file/Doc11.pdf') }}"
                            class="text-[#207ec6] text-4xl font-black cursor-pointer border-b-2 ">إضغط الان</a>
                    </div>
                </div>
            </div>
            {{-- for Less than xl screen --}}
            <div class="xl:hidden flex flex-col items-center justify-center">
                <div>
                    <img class="max-h-72 w-auto" src="{{ asset('assets/images/Tawhedlogo.jpeg') }}" alt="Tawhedlogo">
                </div>
                <div class="flex flex-col items-start justify-start gap-y-2 mt-4">
                    <h2 class="text-3xl sm:text-4xl  " style="font-weight: 1100;">
                        <span class="text-[#82c746]">
                            مطلوب
                        </span>
                        لمؤسسة الحياة
                    </h2>
                    <h2 class="text-3xl sm:text-4xl " style="font-weight: 1100;">
                        للتوعية والتثقيف الصحي
                    </h2>
                    <div class="flex flex-row items-center justify-center w-full mt-2">
                        <div class="bg-[#207ec6] rounded-lg px-3 py-2">
                            <h2 class="text-3xl sm:text-4xl  font-black text-white text-center">منسق/برويكتور</h2>
                        </div>
                    </div>
                </div>
                <div class=" flex flex-col items-center justify-center gap-y-3 z-10 mt-12">
                    <p class="text-2xl font-black"> لتفاصيل أخرى عن الوظيفة</p>
                    <a target="_black"  href="{{ asset('assets/file/Doc11.pdf') }}"
                        class="text-[#207ec6] text-5xl font-black cursor-pointer border-b-2">إضغط الان</a>
                </div>
            </div>
            <div class="w-full mt-16 xl:mt-4 2xl:mt-36 flex gap-x-2">
                <form id="submission-form"
                    class="flex flex-col items-center max-w-2xl 2xl:max-w-3xl lg:mx-auto gap-y-2 md:gap-y-4 lg:basis-5/6 mx-6 w-full">
                    @csrf
                    <input type="hidden" name='formid' value="{{ $forms->id }}">
                    <div class="flex md:flex-row flex-col items-start gap-x-4 w-full form-containers">
                        <div class="md:basis-1/2 w-full">
                            <input type="text" id="full-name" name="الاسم الكامل" placeholder="الإسم كامل"
                                class="mt-1 block w-full border-[#207ec6] py-3 font-black placeholder-black text-black rounded-md shadow-sm focus:border-none focus:ring-2 focus:ring-opacity-50"
                                required>
                        </div>
                        <div class="md:basis-1/2 w-full mt-2 md:mt-0">
                            <input type="tel" id="phone" name="الهاتف" placeholder="الهاتف"
                                class="mt-1 block w-full border-[#207ec6] py-3 font-black text-right placeholder-black text-black rounded-md shadow-sm focus:border-none focus:ring-2 focus:ring-opacity-50"
                                required>
                        </div>
                    </div>
                    <div class="w-full form-containers">
                        <textarea id="note" name="note" placeholder="ملاحظات" rows="10" required
                            class="mt-1 block w-full border-[#207ec6] placeholder-black text-black rounded-md shadow-sm focus:border-none focus:ring-2 focus:ring-opacity-50"></textarea>
                    </div>
                    <div
                        class="flex md:flex-row flex-col gap-y-2 my-8 md:my-0 items-center justify-between w-full form-containers">
                        <p class="text-[#207ec6] text-lg">
                            لمزيد من المعلومات يمكن التواصل :0507274834
                        </p>
                        <button type="submit"
                            class="bg-[#207ec6] text-white px-10 py-2 rounded-3xl hover:bg-blue-500 text-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">ارسال</button>
                    </div>
                </form>
                <img src="{{ asset('assets/images/man.png') }}" alt="blue"
                    class="absolute left-[10%] top-[25%] h-[510px] 2xl:h-auto 2xl:left-[13%] 2xl:top-[14%] max-h-[700px] hidden xl:block">
            </div>
            <div id="thank-you-message" class="hidden text-center w-full  mt-8 mb-12 xl:mt-36 xl:mb-20">
                <div class="flex flex-col items-center justify-center gap-y-3">
                    <h1 class="text-2xl font-bold text-gray-800">تم إرسال طلبك بنجاح!</h1>
                    <p class="mt-4 text-lg text-gray-600">شكراً لك على تقديم طلبك. سنتواصل معك قريباً.</p>
                    <p class="text-[#207ec6] text-lg mt-4">
                        لمزيد من المعلومات يمكن التواصل :0507274834
                    </p>
                </div>
            </div>
        </div>
        <img src="{{ asset('assets/images/green.png') }}" alt="blue" class="absolute bottom-0 xl:block hidden">
        <div class="xl:hidden  block h-24 bg-[#82c746]"></div>


    </section>
@endsection
@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('submission-form');
            const formContainers = document.querySelectorAll('.form-containers');
            const thankYouMessage = document.getElementById('thank-you-message');
            if (form) {
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    const formData = new FormData(this);
                    const data = {};
                    formData.forEach((value, key) => {
                        data[key] = value;
                    });

                    axios.post('/form-store-taweieh', data)
                        .then(response => {
                            console.log("🚀 ~ form.addEventListener ~ response:", response)
                            if (response.status == 200) {
                                console.log("xxx")
                            }
                            formContainers.forEach(container => container.style.display = 'none');
                            thankYouMessage.style.display = 'block';
                        })
                        .catch(err => {
                            if (err.response && err.response.data && err.response.data.errors) {
                                const errors = err.response.data.errors;
                                for (const [field, messages] of Object.entries(errors)) {
                                    messages.forEach(message => {
                                        toastr.options={
                                            "positionClass": "toast-bottom-right",
                                        }
                                        toastr.error(message);
                                    });
                                }
                            } else {
                                toastr.error('An error occurred while submitting the form.');
                            }
                        });
                });
            }
        });
    </script>
@endsection
