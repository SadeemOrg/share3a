<template>
    <div class="mx-auto max-w-6xl  px-6 lg:px-8 py-8">
        <div class="flex flex-col items-center justify-center">
            <img src="https://i.postimg.cc/pdnRmpPj/image-1-removebg-preview-1.png"
                class="max-w-[420px] w-64 md:w-72 max-h-48" alt="MSF Logo" />
            <p v-if="!showForm && !SuccessSubmitedForm"
                class="font-Tijawal-Bold mt-12 text-center text-xl md:text-3xl text-[#42542A]">
                {{ mainParagraphText }}
            </p>
        </div>
        <div v-if="!showForm && !SuccessSubmitedForm" class="flex flex-col items-start justify-start mt-8">
            <p class="font-Tijawal-Bold mt-12 text-center text-lg md:text-2xl text-[#42542A]">
                هذه الاستمارة مخصّصة للفئات التالية:
            </p>
            <div
                class="font-Tijawal flex flex-col items-start justify-start text-lg md:text-xl  text-[#42542A] mt-2 gap-y-1">
                <!-- List of categories -->
                <p v-for="(category, index) in categoriesList" :key="index">{{ category }}</p>
                <button type="button"
                    class="font-Tijawal-Bold rounded-md bg-[#42542A] mt-3 w-60 h-12 px-2.5 py-1.5 font-bold text-lg text-white shadow-sm hover:bg-[#B0C277]"
                    @click="navigateToFormQuestions">
                    قم بتعبئة الاستمارة
                </button>
            </div>
            <div type="button"
                class="font-Tijawal-Bold rounded-md bg-[#B0C277] w-full mt-5 h-auto md:h-12 px-2.5 py-1.5 font-bold text-base md:text-lg text-white shadow-sm hover:bg-[#42542A]">
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
            </div>
        </div>
        <!-- Form Page-->
        <form @submit.prevent="handleSubmit" enctype="multipart/form-data">
            <input type="hidden" name='formid' :value="formId">
            <div v-if="showForm && !SuccessSubmitedForm">
                <div v-if="counter == 1">
                    <div
                        class="flex flex-col-reverse gap-y-6 md:gap-y-0 md:flex-row items-center md:items-start justify-between mt-24">
                        <div class="flex flex-row items-start justify-start gap-x-2">
                            <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 -1.31134e-06L25.9904 22.5L0.00962073 22.5L13 -1.31134e-06Z" fill="#B1C376" />
                            </svg>
                            <p class="font-Tijawal-Bold text-right md:text-center text-2xl text-[#42542A]">قم بتعبئة استمارة
                                تقديم العائلات
                                المحتاجة</p>
                        </div>
                        <div class="flex flex-row items-center justify-center rounded-full w-14 h-14 bg-[#B1C376] ">
                            <p class="pt-4 text-xl text-white font-Tijawal">{{ counter }}</p>
                        </div>
                    </div>
                    <div v-for="section in firstPage" class="my-4 border-b border-[#B1C376] py-4">
                        <div class=" flex flex-row items-start justify-start gap-x-2">
                            <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <circle cx="8.5" cy="8.5" r="8.5" fill="#B1C376" />
                            </svg>
                            <p class="font-Tijawal-Bold text-center text-xl text-[#42542A]">{{
                                section.attributes.section_name
                            }}
                            </p>
                        </div>
                        <div class="flex flex-row items-center justify-center md:justify-start flex-wrap mt-4 ">

                            <div :class="{ 'w-full': question.layout === 'radio_select_depend', 'w-[90%] md:w-1/2': question.layout !== 'radio_select_depend' }"
                                v-for="(question, index) in section.attributes.questions" :key="index">
                                <div v-if="question.layout !== 'radio_select' && question.layout !== 'radio_select_depend'"
                                    class="w-full">
                                    <label :for="question.key"
                                        class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                        <p class="p-0 m-0">{{ question.attributes.text }}</p>
                                        <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                                    </label>
                                    <input
                                        v-if="question.layout === 'text' || question.layout === 'date' || question.layout === 'email'"
                                        :type="question.layout" :name="question.attributes.text" :id="question.key"
                                        :required="question.attributes.required"
                                        v-model="formDataFields[question.attributes.text]"
                                        @input="clearError(question.attributes.text)"
                                        class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />

                                    <input v-else-if="question.layout == 'phone'" type="number"
                                        :name="question.attributes.text" :id="question.key"
                                        :required="question.attributes.required"
                                        v-model="formDataFields[question.attributes.text]"
                                        @input="clearError(question.attributes.text)"
                                        class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />

                                    <input dir="ltr" v-else-if="question.layout === 'file'" :type="question.layout"
                                        :name="question.attributes.text" :id="question.key"
                                        @change="handleFileInput(question)" @input="clearError(question.attributes.text)"
                                        class="file_input block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376]" />
                                    <p v-if="validationErrors[question.attributes.text]" class="text-red-500">{{
                                        validationErrors[question.attributes.text] }}</p>
                                </div>
                                <div v-else-if="question.layout == 'radio_select'">
                                    <label :for="question.key"
                                        class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                        <p class="p-0 m-0 "> {{ question.attributes.name }}</p>
                                        <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                                    </label>
                                    <div class="flex flex-row items-start mt-2 "
                                        v-for="choice in question.attributes.selectform" :key="choice.key">
                                        <input type="radio" :name="question.attributes.text" :id="choice.key"
                                            :required="question.attributes.required"
                                            v-model="formDataFields[question.attributes.text]"
                                            @input="clearError(question.attributes.text)" :value="choice.attributes.text"
                                            :class="question.layout === 'file' ? 'file_input' : ''"
                                            class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                                        <label class="mx-1 -pt-1" :for="choice.key">{{ choice.attributes.text }}</label>
                                    </div>
                                    <p v-if="validationErrors[question.attributes.text]" class="text-red-500">{{
                                        validationErrors[question.attributes.text] }}</p>
                                </div>
                                <div v-else-if="question.layout == 'radio_select_depend'" class="w-full flex flex-col">
                                    <label :for="question.key"
                                        class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                        <p class="p-0 m-0 "> {{ question.attributes.text }}</p>
                                        <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                                    </label>
                                    <div class="flex flex-col w-full items-start mt-2 ">
                                        <div class="flex flex-row items-start justify-start ">
                                            <input type="radio" :name="question.attributes.text" :id="question.key"
                                                v-model="formDataFields[question.attributes.text]"
                                                @input="clearError(question.attributes.text)"
                                                :value="question.attributes.yes"
                                                :class="question.layout === 'file' ? 'file_input' : ''"
                                                class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                                            <label class="mx-1 -pt-1" :for="question.key">{{ question.attributes.yes
                                            }}</label>
                                        </div>
                                        <div class="flex flex-row items-start justify-start">
                                            <input type="radio" :name="question.attributes.text" :id="question.key"
                                                v-model="formDataFields[question.attributes.text]"
                                                @input="clearError(question.attributes.text)"
                                                :value="question.attributes.no"
                                                :class="question.layout === 'file' ? 'file_input' : ''"
                                                class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                                            <label class="mx-1 -pt-1" :for="question.key">{{ question.attributes.no
                                            }}</label>
                                        </div>
                                        <div v-if="question.layout == 'radio_select_depend'" class="w-full  my-4">
                                            <div class="w-full"
                                                v-if="formDataFields[question.attributes.text] == question.attributes.yes">
                                                <div class="w-full  "
                                                    v-for=" (question, index) in question.attributes.questions">
                                                    <div v-if="question.layout !== 'radio_select' && question.layout !== 'radio_select_depend'"
                                                        class="w-full">
                                                        <label :for="question.key"
                                                            class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                                            <p class="p-0 m-0">{{ question.attributes.text }}</p>
                                                            <p v-if="question.attributes.required"
                                                                class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                                                        </label>
                                                        <input
                                                            v-if="question.layout === 'text' || question.layout === 'date' || question.layout === 'email'"
                                                            :type="question.layout" :name="question.attributes.text"
                                                            :id="question.key" :required="question.attributes.required"
                                                            v-model="formDataFields[question.attributes.text]"
                                                            @input="clearError(question.attributes.text)"
                                                            class="block gap-y-4 w-[45%] my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />

                                                        <input v-else-if="question.layout == 'phone'" type="number"
                                                            :name="question.attributes.text" :id="question.key"
                                                            :required="question.attributes.required"
                                                            v-model="formDataFields[question.attributes.text]"
                                                            @input="clearError(question.attributes.text)"
                                                            class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />

                                                        <input dir="ltr" v-else-if="question.layout === 'file'"
                                                            :type="question.layout" :name="question.attributes.text"
                                                            :id="question.key" @change="handleFileInput(question)"
                                                            @input="clearError(question.attributes.text)"
                                                            class="file_input block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376]" />
                                                        <p v-if="validationErrors[question.attributes.text]"
                                                            class="text-red-500">{{
                                                                validationErrors[question.attributes.text] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="counter == 2">
                    <div
                        class="flex flex-col-reverse gap-y-6 md:gap-y-0 md:flex-row items-center md:items-start justify-between mt-24">
                        <div class="flex flex-row items-start justify-start gap-x-2">
                            <svg width="26" height="23" viewBox="0 0 26 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 -1.31134e-06L25.9904 22.5L0.00962073 22.5L13 -1.31134e-06Z" fill="#B1C376" />
                            </svg>
                            <p class="font-Tijawal-Bold text-right md:text-center text-2xl text-[#42542A]">قم بتعبئة استمارة
                                حالة الاحتياج</p>
                        </div>
                        <div class="flex flex-row items-center justify-center rounded-full w-14 h-14 bg-[#B1C376] ">
                            <p class="pt-4 text-xl text-white font-Tijawal">{{ counter }}</p>
                        </div>
                    </div>
                    <div v-for="section in secondPage" class="my-4 border-b border-[#B1C376] py-4">
                        <div v-if="section.layout == 'section'">
                            <div class=" flex flex-row items-start justify-start gap-x-2">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8.5" cy="8.5" r="8.5" fill="#B1C376" />
                                </svg>
                                <p class="font-Tijawal-Bold text-center text-xl text-[#42542A]">{{
                                    section.attributes.section_name
                                }}
                                </p>
                            </div>
                            <div class="flex flex-row items-center justify-center md:justify-start flex-wrap mt-4 ">
                                <div class="w-[90%] md:w-1/2 " v-for="(question, index) in section.attributes.questions"
                                    :key="index">
                                    <div v-if="question.layout !== 'radio_select'" class="w-full">
                                        <label :for="question.key"
                                            class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                            <p class="p-0 m-0">{{ question.attributes.text }}</p>
                                            <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*
                                            </p>
                                        </label>
                                        <input v-if="question.layout !== 'file'" :type="question.layout"
                                            :name="question.attributes.text" :id="question.key"
                                            v-model="formDataFields[question.attributes.text]"
                                            @input="clearError(question.attributes.text)"
                                            class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />

                                        <input dir="ltr" v-if="question.layout === 'file'" :type="question.layout"
                                            :name="question.attributes.text" :id="question.key"
                                            @input="clearError(question.attributes.text)"
                                            @change="handleFileInput(question)"
                                            class="file_input block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376]" />

                                        <p v-if="validationSecondPageErrors[question.attributes.text]" class="text-red-500">
                                            {{
                                                validationSecondPageErrors[question.attributes.text] }}</p>
                                    </div>
                                    <div v-else-if="question.layout == 'radio_select'">
                                        <label :for="question.key"
                                            class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                            <p class="p-0 m-0 "> {{ question.attributes.name }}</p>
                                            <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*
                                            </p>
                                        </label>
                                        <div class="flex flex-row items-start mt-2 "
                                            v-for="choice in question.attributes.selectform" :key="choice.key">
                                            <input type="radio" :name="question.attributes.text" :id="choice.key"
                                                @input="clearError(question.attributes.text)"
                                                v-model="formDataFields[question.attributes.text]"
                                                :value="choice.attributes.text"
                                                :class="question.layout === 'file' ? 'file_input' : ''"
                                                class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                                            <label class="mx-1 -pt-1" :for="choice.key">{{ choice.attributes.text }}</label>
                                        </div>
                                        <p v-if="validationSecondPageErrors[question.attributes.text]" class="text-red-500">
                                            {{
                                                validationSecondPageErrors[question.attributes.text] }}</p>
                                    </div>
                                </div>
                                <div v-if="section.layout == 'Flexible_section'" class="w-1/2 mt-4">
                                    <button v-if="counter == 2" type="button"
                                        class="font-Tijawal-Bold bg-[#B1C376] block w-[95%] gap-y-4 my-2 text-white h-14 rounded-md mt-4 shadow-sm ring-1 hover:bg-[#42542A]"
                                        @click="addNewChild">
                                        اضافة طفل آخر
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div v-else-if="section.layout == 'multi_section'">
                            <div class=" flex flex-row items-start justify-start gap-x-2">
                                <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="8.5" cy="8.5" r="8.5" fill="#B1C376" />
                                </svg>
                                <p class="font-Tijawal-Bold text-center text-xl text-[#42542A]">{{ section.attributes.text
                                }}
                                </p>
                            </div>
                            <div class="flex flex-row items-start mt-2 "
                                v-for="(choice, index) in section.attributes.select" :key="index">
                                <input type="radio" :name="section.text" :id="choice.key" @input="clearError(section.text)"
                                    v-model="formDataFields[section.attributes.text]" :value="choice.attributes.text"
                                    class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                                <label class="mx-1 -pt-1" :for="section.key">{{ choice.attributes.text }}</label>
                            </div>
                            <div v-for="(choice, index) in section.attributes.select" :key="index">
                                <div class="" v-if="formDataFields[section.attributes.text] == choice.attributes.text">
                                    <div class="border-t mt-8 pt-8 border-[#B1C376] mb-8 pb-8"
                                        v-for="(subsection, index) in choice.attributes.select" :key="index">
                                        <p class="font-Tijawal-Bold text-right text-xl text-[#42542A]">{{
                                            subsection.attributes.section_name }} </p>
                                        <!-- basedon section-->
                                        <div v-if="subsection.layout !== 'multi_section'" class="w-[90%] md:w-1/2 "
                                            v-for="(question, index) in subsection.attributes.questions" :key="index">

                                            <div v-if="question.layout !== 'radio_select'" class="w-full">
                                                <label :for="question.key"
                                                    class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                                    <p class="p-0 m-0">{{ question.attributes.text }}</p>
                                                    <p v-if="question.attributes.required"
                                                        class="text-[#FF0000] p-0 m-0 text-2xl">*
                                                    </p>
                                                </label>
                                                <input v-if="question.layout !== 'file'" :type="question.layout"
                                                    :name="question.attributes.text" :id="question.key"
                                                    v-model="formDataFields[question.attributes.text]"
                                                    @input="clearError(question.attributes.text)"
                                                    class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />

                                                <input dir="ltr" v-if="question.layout === 'file'" :type="question.layout"
                                                    :name="question.attributes.text" :id="question.key"
                                                    @input="clearError(question.attributes.text)"
                                                    @change="handleFileInput(question)"
                                                    class="file_input block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376]" />

                                                <p v-if="validationSecondPageErrors[question.attributes.text]"
                                                    class="text-red-500">
                                                    {{
                                                        validationSecondPageErrors[question.attributes.text] }}</p>
                                            </div>
                                            <div v-else-if="question.layout == 'radio_select'">
                                                <label :for="question.key"
                                                    class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                                    <p class="p-0 m-0 "> {{ question.attributes.name }}</p>
                                                    <p v-if="question.attributes.required"
                                                        class="text-[#FF0000] p-0 m-0 text-2xl">*
                                                    </p>
                                                </label>
                                                <div class="flex flex-row items-start mt-2 "
                                                    v-for="choice in question.attributes.selectform" :key="choice.key">
                                                    <input type="radio" :name="question.attributes.text" :id="choice.key"
                                                        @input="clearError(question.attributes.text)"
                                                        v-model="formDataFields[question.attributes.text]"
                                                        :value="choice.attributes.text"
                                                        :class="question.layout === 'file' ? 'file_input' : ''"
                                                        class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                                                    <label class="mx-1 -pt-1" :for="choice.key">{{ choice.attributes.text
                                                    }}</label>
                                                </div>
                                                <p v-if="validationSecondPageErrors[question.attributes.text]"
                                                    class="text-red-500">
                                                    {{
                                                        validationSecondPageErrors[question.attributes.text] }}</p>
                                            </div>
                                        </div>
                                        <div v-else-if="subsection.layout == 'multi_section'">
                                            <!-- tryyyyyy11111-->
                                            <!-- <div class="flex flex-row items-start mt-2 "
                                                v-for="(choice, index) in subsection.attributes.select" :key="index">
                                                <input type="radio" :name="subsection.attributes.text" :id="choice.key"
                                                    @input="clearError(subsection.attributes.text)"
                                                    v-model="formDataFields[subsection.attributes.text]"
                                                    :value="choice.attributes.text"
                                                    class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                                                <label class="mx-1 -pt-1" :for="choice.key">{{ choice.attributes.text
                                                }}</label>
                                                <div v-for="(insideSection, index) in choice.attributes.select"
                                                    :key="index">
                                                    <div v-for="(question, index) in insideSection.attributes.questions">
                                                        <div v-if="question.layout !== 'radio_select'" class="w-full">
                                                            <label :for="question.key"
                                                                class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                                                <p class="p-0 m-0">{{ question.attributes.text }}</p>
                                                                <p v-if="question.attributes.required"
                                                                    class="text-[#FF0000] p-0 m-0 text-2xl">*
                                                                </p>
                                                            </label>
                                                            <input v-if="question.layout !== 'file'" :type="question.layout"
                                                                :name="question.attributes.text" :id="question.key"
                                                                v-model="formDataFields[question.attributes.text]"
                                                                @input="clearError(question.attributes.text)"
                                                                class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />

                                                            <input dir="ltr" v-if="question.layout === 'file'"
                                                                :type="question.layout" :name="question.attributes.text"
                                                                :id="question.key"
                                                                @input="clearError(question.attributes.text)"
                                                                @change="handleFileInput(question)"
                                                                class="file_input block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376]" />

                                                            <p v-if="validationSecondPageErrors[question.attributes.text]"
                                                                class="text-red-500">
                                                                {{
                                                                    validationSecondPageErrors[question.attributes.text] }}</p>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div> -->


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col items-start">
                        <NewChildrenForm v-for="(children, index) in newChildren" :key="index" :children="children"
                            :index="index" ltr="ltr" rtl="rtl" @confirmAddChild="onConfirmAddChild"
                            @updateFormData="handleUpdateFormData" />
                    </div>
                </div>
                <div class="flex flex-row items-center md:justify-start justify-center gap-x-2 w-full ">
                    <button type="button"
                        class="font-Tijawal-Bold rounded-md bg-[#42542A] mt-3 w-60 h-12 px-2.5 py-1.5 font-bold text-lg text-white shadow-sm hover:bg-[#B0C277]"
                        @click="navigateToNextPage">
                        {{ counter == 1 ? 'التالي' : 'انهاء الطلب' }}
                    </button>
                    <button v-if="counter == 2" type="button"
                        class="font-Tijawal-Bold rounded-md bg-[#FBFDF5]  mt-3 w-60 h-12 px-2.5 py-1.5 font-bold text-lg text-[#42542A] shadow-sm hover:bg-[#B0C277]"
                        @click="navigateToPreviousPage">
                        السابق
                    </button>
                </div>
            </div>
        </form>
        <!-- <p>{{ formDataFields }}</p> -->
        <div v-if="SuccessSubmitedForm" class="my-20">
            <p class="font-Tijawal-Bold text-center text-4xl  text-[#42542A] ">لقد تم تسجيل طلبك بنجاح شكرا لتعاملك مع مؤسسة
                إعمار الدارين للصدقات</p>
        </div>
        <footer>
            <div class="mt-16 rounded-tl-3xl h-32  md:h-52 bg-white">
                <img class="w-[80%] mx-auto pt-4" src="https://i.postimg.cc/h4YGG2Db/Group-1000004132.png" alt="">

            </div>
        </footer>
    </div>
</template>
<script>
import { ref, reactive, watch } from 'vue';
import axios from 'axios';
import NewChildrenForm from './NewChildrenForm.vue';
import { mainParagraphText, categoriesList } from '../data';
export default {
    components: { NewChildrenForm },
    setup() {
        const data = reactive([]);
        const showForm = ref(false);
        const counter = ref(1);
        const totalPages = ref(null);
        const currentPage = ref({});
        const formDataFields = reactive({});
        const firstPage = ref({});
        const secondPage = ref({});
        const secondPageAddchild = ref({});
        const newChildren = ref([]);
        const childrenCounter = ref([100]);
        const firstPageValidation = ref({});
        const validationErrors = reactive({});
        const secondPageValidation = ref({});
        const validationSecondPageErrors = reactive({});
        const addNewChildValidation = ref([])
        const SuccessSubmitedForm = ref(false)
        const formId = ref(null)

        const fetchFormId = async () => {
            try {
                const response = await axios.get(`${window.location.origin}/form_id`, {
                    params: {
                        id: window.location.pathname.replace(/^\/+|\/+$/g, ''),
                        // id:'data1'
                    },

                });
                formId.value = response.data;
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };
        const fetchFormData = async () => {
            try {
                const response = await axios.get(`${window.location.origin}/form_questions`, {
                    params: {
                        // id: window.location.pathname.replace(/^\/+|\/+$/g, ''),
                        id: 'data1'
                    },
                });
                data.value = Object.freeze([...response.data]);
                firstPage.value = Object.freeze(response.data[0].attributes.questions);
                firstPageValidation.value = response.data[0].validation;
                secondPageValidation.value = response.data[1].validation;
                currentPage.value = firstPage.value;
                secondPage.value = Object.freeze(response.data[1].attributes.questions);
                secondPageAddchild.value = Object.freeze(secondPage.value[3]?.attributes?.questions || []);
                addNewChildValidation.value = Object.freeze(secondPage.value[3]?.attributes || {});
                totalPages.value = response.data.length;

                // console.log("🚀 ~ file: emar.vue:92 ~ fetchFormData ~ data:", response.data, addNewChildValidation.value, secondPageAddchild.value);
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };
        const validateCurrentPage = () => {
            if (counter.value === 1) {
                Object.values(firstPageValidation.value).forEach(fieldName => {
                    const validationRule = fieldName;
                    const fieldValue = formDataFields[fieldName];
                    if (validationRule && !fieldValue) {
                        validationErrors[fieldName] = `${fieldName} is required.`;
                        console.error(`${fieldName} is required.`);
                    } else {
                        validationErrors[fieldName] = null;
                    }
                });
            } else if (counter.value === 2) {
                Object.values(secondPageValidation.value).forEach(fieldName => {
                    const validationSecondPageRule = fieldName;
                    const fieldSecondValue = formDataFields[fieldName];

                    if (validationSecondPageRule && !fieldSecondValue) {
                        validationSecondPageErrors[fieldName] = `${fieldName} is required.`;
                        console.error(`${fieldName} is required.`);
                    } else {
                        validationSecondPageErrors[fieldName] = null;
                    }
                });
            }
        };
        const clearError = (fieldName) => {
            // Clear the error for the specified field
            validationErrors[fieldName] = null;
            validationSecondPageErrors[fieldName] = null;
        };

        const handleFileInput = (question) => {
            const inputElement = document.getElementById(question.key);
            const file = inputElement.files[0];
            formDataFields[question.attributes.text] = file;

        }

        const handleSubmit = () => {
            const endpointUrl = `${window.location.origin}/sendform`;
            // Create a FormData object
            const formData = new FormData();

            // Append each field to formData
            for (const [key, value] of Object.entries(formDataFields)) {
                formData.append(key, value);
            }
            // Append files to formData
            for (const [key, file] of Object.entries(formDataFields)) {
                formData.append(key, file);
            }
            formData.append('id', formId.value);
            // Send the POST request using Axios
            const csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;

            axios.post(endpointUrl, formData, {
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'Content-Type': 'multipart/form-data', // Use 'multipart/form-data' for FormData
                },
            })
                .then(response => {
                    // Handle the response data as needed
                    SuccessSubmitedForm.value = true;

                    // Increment the counter or perform any other navigation logic
                    counter.value = Math.min(counter.value + 1, totalPages.value);
                }).catch(error => {
                    // Handle errors
                    console.error('Error:', error);
                });
        };
        watch(counter, () => {
            currentPage.value = counter.value === 1 ? firstPage.value : secondPage.value;
        });
        const navigateToFormQuestions = () => {
            showForm.value = !showForm.value;
        };
        const navigateToNextPage = () => {
            // Validate the current page before navigating to the next page
            validateCurrentPage();
            if (counter.value == 1) {
                // Check if there are any validation errors
                if (Object.values(validationErrors).some(error => error !== null)) {
                    // If there are validation errors, do not proceed to the next page
                    console.log('Validation errors. Cannot proceed to the next page.');
                    return;
                }
                counter.value = Math.min(counter.value + 1, totalPages.value);
            }
            else if (counter.value == 2) {

                if (Object.values(validationSecondPageErrors).some(error => error !== null)) {
                    console.log('Validation errors. Cannot proceed to the next page.');
                    return;
                }
                counter.value = Math.min(counter.value + 1, totalPages.value);
                handleSubmit()
            }
            // counter.value == 1 ? counter.value = counter.value + 1 : counter.value = counter.value;
        };
        const navigateToPreviousPage = () => {
            // counter.value = counter.value - 1;
            counter.value = Math.max(counter.value - 1, 1);
        }
        const addNewChild = () => {
            const newItem = {
                id: childrenCounter.value[0],
                data: secondPageAddchild.value,
                validation: addNewChildValidation.value['validation'],
            };
            childrenCounter.value[0]++;
            newItem.validation = newItem.validation.map(item => `${item}_${newItem.id}`);

            newChildren.value.push(newItem);
        }

        const onConfirmAddChild = (index, formDataFields) => {
        };
        const handleUpdateFormData = (index, formData) => {
            formDataFields.value = { ...formDataFields.value, ...formData };
        };

        fetchFormId();
        fetchFormData(); // Fetch data when the component is mounted
        return {
            data,
            showForm,
            navigateToFormQuestions,
            navigateToNextPage,
            navigateToPreviousPage,
            addNewChild,
            counter,
            totalPages,
            currentPage,
            firstPage,
            secondPage,
            secondPageAddchild,
            formDataFields,
            onConfirmAddChild,
            handleUpdateFormData,
            newChildren,
            childrenCounter,
            validationErrors,
            secondPageValidation,
            validationSecondPageErrors,
            addNewChildValidation,
            clearError,
            SuccessSubmitedForm,
            handleFileInput,
            formId,
            categoriesList,
            mainParagraphText
        };
    },
};
</script>

<style scoped>
.file_input {
    padding-left: 10px;
    max-height: 58px;
    border: 1px solid #42542A;
}

input[type="radio"] {
    /* Your default styles for radio buttons here */
    background-color: #FBFDF5;
    border: 1px solid #42542A;
    border-radius: 0.25rem;
    padding: 0.5rem;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
}

input[type="radio"]:checked {
    /* Your styles for checked radio buttons here */
    background-color: #B1C376;
    /* Add any other styles you want for the checked state */
}

/* Chrome, Safari, Edge, Opera */
input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
}

/* Firefox */
input[type=number] {
    -moz-appearance: textfield;
}
</style>