@extends('layouts.app_bale_layout')

@section('header')
    <div class="mx-auto max-w-5xl  ">
        <div class="flex flex-row items-center justify-center my-8 gap-x-8">
            <div class="flex flex-col items-center">
                <img class="max-w-[180px] w-full mx-auto" src="{{ asset('assets/images/onf/onf_logo.png') }}" alt="onf logo">
            </div>
            <div class="flex flex-col items-center">
                <img class="max-w-[180px] w-full mx-auto" src="{{ asset('assets/images/onf/Qatar_onf.png') }}"
                    alt="Qatar onf logo">
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="flex flex-col items-center w-full min-h-screen  pt-2 pb-8  ">
        <!-- Logos Row -->
        <!-- Already in header -->

        <!-- Main Title -->
        <div class="text-center mt-2">
            <div class="font-tajawal text-[26px] font-normal text-gray-800 leading-tight">مؤتمر تنظيم القدرات البشرية</div>
            <div class="font-tajawal text-[36px] md:text-[38px] font-black text-black leading-snug mt-2">
                المشروع الاستراتيجي لمكافحة العنف<br>والجريمة في المجتمع العربي
            </div>
            <div class="font-tajawal text-[26px] font-normal text-gray-700 mt-2 leading-tight">
                بالتعاون مع بلدية سخنين<br>
                يدعوكم/ن لحضور المؤتمر القطري تحت عنوان:
            </div>
        </div>

        <!-- Green Section Title -->
        <div class="text-center mt-4">
            <div class="font-tajawal text-[6px] md:text-[36px] font-black text-[#009966]  ">
                تعزيز الحصانة<br>المجتمعية
            </div>
        </div>

        <!-- Handshake Image -->
        <div class="flex justify-center my-4">
            <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80"
                alt="handshake" class="w-80 h-32 object-cover rounded shadow border border-gray-200 grayscale">
        </div>

        <!-- Cyan Section Title -->
        <div class="text-center mt-2 ">
            <div class="font-tajawal text-[30px] md:text-[30px] font-black text-[#00bcd4] leading-tight text-center">
                دور مؤسسات مجتمعنا<br>في مكافحة العنف والجريمة
            </div>
        </div>

        <!-- Info Box -->
        <div class="w-full flex justify-center mt-6">
            <div
                class="bg-gray-50 border border-gray-300 rounded-xl p-6 flex flex-col md:flex-row items-center justify-between gap-6 shadow max-w-2xl w-full">
                <div class="flex flex-col items-center md:items-start text-right">
                    <div class="flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6l4 2" />
                        </svg>
                        <span class="font-tajawal text-[18px] font-bold text-gray-800">يوم السبت</span>
                    </div>
                    <span class="font-cairo text-[15px] text-gray-600">21 حزيران/يونيو 2025</span>
                    <span class="font-cairo text-[15px] text-gray-600">بين العاشرة والنصف صباحاً وحتى السابعة والنصف</span>
                </div>
                <div class="flex flex-col items-center md:items-start text-right">
                    <div class="flex items-center gap-2 mb-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-red-600">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 3.75v16.5m0 0H7.5m9 0l-9-9" />
                        </svg>
                        <span class="font-tajawal text-[18px] font-bold text-gray-800">
                            مدينة سخنين - مدرسة ابن خلدون الإعدادية - شارع جمال عبد الناصر
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- Conference Program Section -->
        <div class="w-full flex justify-center mt-8">
            <div
                class="bg-white border border-[#bdbdbd] rounded-[12px] shadow max-w-4xl w-full px-4 py-6 relative overflow-hidden">
                <!-- Blue header -->
                <div class="flex items-center justify-center max-w-[200px] mx-auto">
                    <div
                        class="flex items-center justify-center bg-[#00bcd4] text-white font-tajawal font-bold text-[22px] w-full py-2 rounded-md">
                        <p class="w-full text-center m-0">برنامج المؤتمر</p>
                    </div>
                </div>
                <div class="text-right font-tajawal text-[17px] leading-[2.1] mt-8">
                    <div class="mb-2"><span class="text-[#e53935] font-bold">10:30-11:00</span> تسجيل</div>
                    <div class="mb-2"><span class="text-[#e53935] font-bold">11:00-11:40</span> جلسة افتتاحية</div>
                    <ul class="list-none space-y-1 mt-2">
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-xl mt-1">■</span> <span
                                class="font-bold">محمّد بركة</span>، رئيس لجنة المتابعة العليا لشؤون الجماهير العربية</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-xl mt-1">■</span> <span
                                class="font-bold">مازن غنايم</span>، رئيس اللجنة القطريّة للسلطات المحليّة العربيّة</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-xl mt-1">■</span> <span
                                class="font-bold">أ.د. أسعد غانم</span>، "لماذا هذا المؤتمر، وماذا نعني بالحصانة المجتمعية؟"
                        </li>
                    </ul>
                    <div class="mb-2 mt-2"><span class="text-[#e53935] font-bold">11:40-12:30</span> محاضرة افتتاحية <span
                            class="font-bold">د. أريج صباغ-خوري</span>، أستاذة العلوم الاجتماعية في الجامعة العبرية وجامعة
                        بيركلي، "تداعيات العنف والجريمة ومواجهتها"</div>
                    <div class="mb-2"><span class="text-[#e53935] font-bold">12:30-13:00</span> استراحة قهوة وتوزيع على
                        الورشات</div>
                    <div class="mb-2"><span class="text-[#e53935] font-bold">13:00-15:30</span> ورشات منفصلة لنقاش دور
                        القطاعات المهنية والشعبية في مكافحة العنف والجريمة</div>
                    <div class="text-[15px] text-gray-700">ممكن التسجيل مسبقا للورشات المختلفة، وهي كالتالي:</div>
                    <ul class="list-none space-y-1 mt-2 text-[15px] text-gray-700">
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">طلب الصانع</span> – دور القوى المجتمعية في النقب</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">اياد البرغوثي</span> – المؤسسات والنشاطات الثقافية</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">د. محمد خلايلة</span> - قطاع العمل الأهلي والسياسي</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">خلود مصالحة</span> – دور الإعلام والتوعية العامة</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">فتحي ابو يونس</span> - أقسام الرفاه الاجتماعي</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">د. شرف حسان</span> – قطاع التربية والتعليم</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">ضرغام صالح</span> - دور لجان الصلح المحلية</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">نائلة عواد</span> - مكافحة العنف ضد المرأة</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">د. أسماء نادر غنايم</span> – الشبكات الاجتماعية ومكافحة العنف</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">د. رغدة مصالحة</span> - دور العائلة والأهل</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">علي ايوب</span> – دور المراكز جماهيرية</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">إبراهيم حجازي</span> - دور التنظيم المجتمعي والشعبي</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">حسام ابو بكر</span> – دور مكافحة البطالة لدى الشباب</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">صالح لطفي</span> – دور الائمة ورجال الدين</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">رضا جابر</span> – دور السلطات المحلية في إنفاذ القانون</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">محمود شاهين</span> – مراكز التجسير ومعالجة الخلافات</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">بسام سيد احمد</span> – التنمية وتطوير الاقتصاد المحلي</li>
                    </ul>
                    <div class="mb-2 mt-4"><span class="text-[#e53935] font-bold">15:30-17:00</span> وجبة غداء</div>
                    <div class="mb-2 mt-2"><span class="text-[#e53935] font-bold">17:00-18:00</span> جلسات متوازية لعرض
                        توصيات الورشات حول دور القطاعات المهنية والشعبية في مكافحة العنف والجريمة</div>
                    <ul class="list-none space-y-1 mt-2 text-[15px] text-gray-700">
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> المجال
                            الاقتصادي</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> المجال
                            الاجتماعي</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> المجال
                            الإداري والسياسي</li>
                    </ul>
                    <div class="mb-2 mt-4"><span class="text-[#e53935] font-bold">18:00-19:00</span> جلسة خاصة: <span
                            class="font-bold">د. رفيق الحاج</span> – مخطط استراتيجي ومدير مشاريع، "تصور لخطة استراتيجية
                        لمكافحة العنف والجريمة في البلدات العربية"</div>
                    <div class="mb-2 mt-2"><span class="text-[#e53935] font-bold">19:00-19:30</span> ملاحظات ختامية</div>
                    <ul class="list-none space-y-1 mt-2 text-[15px] text-gray-700">
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">الشيخ رائد صلاح</span> – عن تجربة لجنة افشاء السلام المحظورة</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">رائد دقة</span> – رئيس لجنة مكافحة العنف والجريمة في اللجنة القطرية</li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">منصور دهامشة</span> – رئيس لجنة مكافحة العنف والجريمة في لجنة المتابعة
                        </li>
                        <li class="flex items-start gap-x-2"><span class="text-[#e53935] text-lg mt-1">■</span> <span
                                class="font-bold">أ.د. أسعد غانم</span> – مركز المؤتمر</li>
                    </ul>
                </div>
            </div>
        </div>

        @php
        $questions = $forms->questions;
        $questions = json_decode($questions);
    @endphp

    <!-- Modern Registration Form -->
    <form class="w-full max-w-4xl mx-auto my-12" method="post" action="{{ route('form.store') }}">
        <input type="hidden" name='formid' value="{{ $forms->id }}">
        @csrf
        <div class="bg-white rounded-2xl shadow-lg p-8 space-y-6">
            @foreach ($questions as $question)
                @if ($question->layout == 'select')
                    <div>
                        <label class="block mb-2 text-right font-tajawal font-bold text-gray-700 text-[18px]">
                            {{ $question->attributes->name }}
                        </label>
                        <select name='{{ $question->attributes->name }}'
                            class="block w-full border border-gray-300 rounded-lg py-3 px-8 text-gray-800 bg-white focus:border-[#00bcd4] focus:ring-2 focus:ring-[#00bcd4] font-tajawal text-[16px]">
                            <option disabled selected>اختر...</option>
                            @foreach ($question->attributes->selectform as $selectform)
                                <option value="{{ $selectform->attributes->text }}">
                                    {{ $selectform->attributes->text }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                @endif
                @if ($question->layout == 'text')
                    <div>
                        <label class="block mb-2 text-right font-tajawal font-bold text-gray-700 text-[18px]">
                            {{ $question->attributes->text }}
                        </label>
                        <input required name="{{ $question->attributes->text }}"
                            class="block w-full border border-gray-300 rounded-lg py-3 px-4 text-gray-800 bg-white focus:border-[#00bcd4] focus:ring-2 focus:ring-[#00bcd4] font-tajawal text-[16px]"
                            type="text"
                            placeholder="{{ $question->attributes->text }}">
                    </div>
                @endif
                @if ($question->layout == 'boolean')
                    <div class="flex items-center gap-x-2">
                        <input id="remember" type="checkbox" name="{{ $question->attributes->text }}"
                            class="w-5 h-5 border border-gray-300 rounded focus:ring-2 focus:ring-[#00bcd4]">
                        <label for="remember" class="font-tajawal text-gray-700 text-[16px]">
                            {{ $question->attributes->text }}
                        </label>
                    </div>
                @endif
                @if ($question->layout == 'Note')
                    <div>
                        <label class="block mb-2 text-right font-tajawal font-bold text-gray-700 text-[18px]">
                            {{ $question->attributes->text }}
                        </label>
                        <textarea name="{{ $question->attributes->text }}"
                            class="block w-full border border-gray-300 rounded-lg py-3 px-4 text-gray-800 bg-white focus:border-[#00bcd4] focus:ring-2 focus:ring-[#00bcd4] font-tajawal text-[16px]"
                            rows="5"
                            placeholder="{{ $question->attributes->text }}"></textarea>
                    </div>
                @endif
            @endforeach
            <button
                class="w-full bg-[#00bcd4] hover:bg-[#0097a7] text-white font-bold font-tajawal text-[18px] py-3 rounded-lg transition">
                اضغط لإكمال عملية التسجيل
            </button>
        </div>
    </form>

    <!-- Email -->

        <div class=" text-[22px] text-center mt-4 font-bold text-black">
            للاستفسار، نرجو التواصل معنا على:
            arabhumancapital@gmail.com
        </div>
    </div>
 
@endsection
