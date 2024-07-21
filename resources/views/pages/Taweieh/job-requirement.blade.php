@extends('layouts.app_layout')

@section('content')
    <section class="w-full">
        <div class="max-h-[150px]">
            <img src="{{ asset('assets/images/green_full.png') }}" alt="blue" style="max-height: 250px; height: 250px; "
                class=" w-full">
        </div>
        <div class="flex flex-col justify-end items-end w-full -mt-16 ">
            <img class="max-h-[210px] ml-32" src="{{ asset('assets/images/Tawhedlogo.jpeg') }}" alt="Tawhedlogo">
            <div class="border-b-8 w-[50%] border-b-[#207ec6]">
            </div>
        </div>
        <div class="mx-auto max-w-[1250px] sm:px-6 lg:px-8 mt-16">
            <div class="flex flex-col items-center justify-start max-w-3xl mt-8 gap-y-5">
                <h1 class="text-4xl font-bold text-black" style="font-weight: 1000;">مطلوب لمؤسسة الحياة للتوعية والتثقيف
                    الصحي</h1>
                <h2 class="text-4xl font-bold text-black mt-1 text-center" style="font-weight: 1000;">منسق/برويكتور</h2>
            </div>
            <div class="flex flex-col items-start justify-start w-full mt-12">
                <div class="bg-[#c8e0a3] px-4 py-3 rounded-lg ">
                    <h3 class="text-2xl text-[#5d9675] font-bold ">التوصيف الوظيفي</h3>
                </div>
            </div>
        </div>

    </section>
@endsection
