@extends('layouts.appvue')
@section('content')
    <div class="min-h-screen igatha48"
        style="background-image: url({{ asset('assets/images/website-bg-img.webp') }}); background-size: auto 100%;">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col items-center justify-center h-screen">
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 ">
                    <div class="mx-auto max-w-4xl">

                        <div class="flex flex-row  items-start justify-center ">

                            <div class="col-span-1 flex justify-center items-center">
                                <img class="max-w-sm max-h-96 mx-auto my-14"
                                    src="{{ asset('assets/images/header-logos/igatheh48.png') }}" alt="left logo">
                            </div>

                        </div>
                    </div>
                </div>
                <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                    <div class="mx-auto max-w-4xl">
                        <p class=" text-center text-[#E3BD2F] text-[25px] md:text-[40px] lg:text-[64px] mb-10">
                            شكرا لك للتسجيل معنا
                        </p>
                        <p class="text-[25px] md:text-[28px] lg:text-[35px] mb-10 text-white text-center">
                            سيتم التواصل معكم قريبا
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




{{-- <section class="flex flex-col items-center justify-center h-screen">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 ">
        <div class="mx-auto max-w-4xl">

            <div class="flex flex-row  items-start justify-center ">

                <div class="col-span-1 flex justify-center items-center">
                    <img class="max-w-xl w-full mx-auto" src="/storage/{{ $logo }}" alt="logo">
                </div>

            </div>
        </div>
    </div>
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl">
            <p class=" text-center text-[#E3BD2F] text-[25px] md:text-[40px] lg:text-[64px] mb-10">
                شكرا لك للتسجيل معنا
            </p>
            <p class="text-[25px] md:text-[28px] lg:text-[35px] mb-10 text-white text-center">
                سيتم التواصل معكم قريبا
            </p>
        </div>
    </div>
</section> --}}
