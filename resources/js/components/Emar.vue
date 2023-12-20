<template>
    <div class="mx-auto max-w-6xl sm:px-6 lg:px-8">
        <div class="flex flex-col items-center justify-center">
            <img src="https://i.postimg.cc/pdnRmpPj/image-1-removebg-preview-1.png" class="max-w-[420px] max-h-48"
                alt="MSF Logo" />
            <p class="font-Tijawal-Bold mt-12 text-center text-3xl text-[#42542A]">
                تعمل المؤسّسة في القطاع الإغاثي الإنساني على دعم ورعاية وتمكين
                العائلات من الفقراء والأيتام والمحتاجين في المجتمع العربي، والتي
                تعاني من أوضاع اقتصادية اجتماعية صعبة، خصوصا في السنوات الأخيرة
                في ظل غلاء المعيشة وتفشّي البطالة واتساع الفجوة الاقتصاديّة
            </p>
        </div>
        <div class="flex flex-col items-start justify-start mt-8">
            <p class="font-Tijawal-Bold mt-12 text-center text-2xl text-[#42542A]">
                هذه الاستمارة مخصّصة للفئات التالية:
            </p>
            <div
                class="font-Tijawal flex flex-col items-start justify-start text-xl font-medium text-[#42542A] mt-2 gap-y-1">
                <!-- List of categories -->
                <p>1. عائلة محتاجة ذات دخل أقل من 6000 ش.ج</p>
                <p>2. أيتام</p>
                <p>3. عائلات أحادية الوالدين (حالات طلاق)</p>
                <p>4. مساعدة طارئة لمرة واحدة</p>
                <p>5. محتاج غير قادر على سد احتياجات معيشية أساسية مثل: إيجار بيت وديون في دفعات الكهرباء وغيرها....</p>
                <button type="button"
                    class="font-Tijawal-Bold rounded-md bg-[#42542A] mt-3 w-60 h-12 px-2.5 py-1.5 font-bold text-lg text-white shadow-sm hover:bg-[#B0C277]">
                    قم بتعبئة الاستمارة
                </button>
            </div>
            <button type="button"
                class="font-Tijawal-Bold rounded-md bg-[#B0C277] w-full mt-5 h-12 px-2.5 py-1.5 font-bold text-lg text-white shadow-sm hover:bg-[#42542A]">
                <!-- Support conditions -->
                <div class="flex flex-row items-start mt-1 justify-center gap-x-1">
                    <svg width="47" height="30" viewBox="0 0 47 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M24.9688 21.5417C24.9688 20.7305 24.3111 20.0729 23.5 20.0729C22.6889 20.0729 22.0312 20.7305 22.0312 21.5417V33.2917C22.0312 34.1028 22.6889 34.7604 23.5 34.7604C24.3111 34.7604 24.9688 34.1028 24.9688 33.2917V21.5417Z"
                            fill="white" />
                        <path fill-rule="evenodd" clip-rule="evenodd"
                            d="M23.5 2.44791C11.8732 2.44791 2.44788 11.8733 2.44788 23.5C2.44788 35.1268 11.8732 44.5521 23.5 44.5521C35.1268 44.5521 44.5521 35.1268 44.5521 23.5C44.5521 11.8733 35.1268 2.44791 23.5 2.44791ZM5.38538 23.5C5.38538 13.4956 13.4956 5.38541 23.5 5.38541C33.5043 5.38541 41.6146 13.4956 41.6146 23.5C41.6146 33.5044 33.5043 41.6146 23.5 41.6146C13.4956 41.6146 5.38538 33.5044 5.38538 23.5Z"
                            fill="white" />
                        <path
                            d="M25.4583 15.6666C25.4583 16.7482 24.5815 17.625 23.5 17.625C22.4184 17.625 21.5416 16.7482 21.5416 15.6666C21.5416 14.5851 22.4184 13.7083 23.5 13.7083C24.5815 13.7083 25.4583 14.5851 25.4583 15.6666Z"
                            fill="white" />
                    </svg>
                    <p class="pt-1">
                        تقديم الدعم مشروط بتوفر المعايير المطلوبة والموارد اللازمة
                    </p>
                </div>
            </button>
        </div>
        <footer>
            <div class="mt-16 rounded-tl-md h-52 bg-white">
                <img class="w-[80%] mx-auto" src="https://i.postimg.cc/h4YGG2Db/Group-1000004132.png" alt="">

            </div>
        </footer>
    </div>
</template>

<script>
export default {
    // Your component logic here
};
</script>

