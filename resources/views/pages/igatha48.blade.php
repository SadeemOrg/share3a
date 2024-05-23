@extends('layouts.appvue')
@section('content')
    <div class="min-h-screen igatha48"
        style="background-image: url({{ asset('assets/images/website-bg-img.webp') }}); background-size: auto 100%;">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-row items-center justify-center ">
                <div class="col-span-1 flex justify-center items-center">
                    <img class="max-w-sm max-h-96 mx-auto my-14" src="{{ asset('assets/images/header-logos/igatheh48.png') }}"
                        alt="left logo">
                </div>
            </div>
            <section dir="rtl">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto max-w-4xl">
                        <div class="text-white text-center">
                            <p class="text-[25px] md:text-[40px] lg:text-[59px] bg-[#EBBD22] py-4 px-4 text-sh -mb-1">
                                إعلان للعائلات المتعففة
                            </p>
                            <p class="text-[23px] md:text-[35px] lg:text-[43px] bg-[#124A85] py-3 px-4">
                                التي تستصعب شراء لحمة العيد
                            </p>
                        </div>
                        @php
                            $Contents = nova_get_setting('Content', '');
                            $Contents = json_decode($Contents);
                            $questions = $forms->questions;
                            $questions = json_decode($questions);
                        @endphp
                        <ul class="text-white features-list mt-10 pb-8 mb-8 border-b border-[#EBBD22] ">
                            <li class="mb-5">
                                <p class="text-[20px] md:text-[24px] lg:text-[27px] relative pr-10">
                                    سجّلوا تفاصيلكم هنا وسنعمل كل جهدنا لنوصل إليكم لحوم أضاحي العيد من المتبرّعين خلال أولى
                                    أيام العيد.
                                </p>
                            </li>
                        </ul>
                        <div class="pt-10 md:pt-20 lg:pt-28 flex flex-col items-center justify-start relative ">
                            <div
                                class="block1 block absolute left-[50%] translate-x-[-50%] top-[20px] md:top-[40px] lg:top-[45px] w-[85%] sm:w-[75%] md:w-[70%] lg:w-[795px]">
                                <div class="relative ">
                                    <h3
                                        class=" text-white  text-[24px] sm:text-[40px] md:text-[50px] lg:text-[62px] text-center z-10 relative italic">
                                        جمعية الأغاثة 48</h1>
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
                                        للمشاركة وتسجبل التفاصيل في لحوم أضاحي العيد من هنا </p>
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
                                                        class="w-full md:h-[65px] bg-transparent border-transparent text-white font-medium border border-white rounded-md focus:ring-white focus:border-white sm:text-sm p-4"
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
                                                            class=" block w-full  md:h-[65px] text-white bg-transparent border-transparent border py-1 border-white rounded-md focus:ring-white focus:border-white text-[14px] sm:text-sm p-4"
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
                    </div>
                </div>
            </section>
        </div>
    </div>

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
@endsection
