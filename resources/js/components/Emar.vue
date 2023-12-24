<template>
    <div class="mx-auto max-w-6xl  px-6 lg:px-8 py-8">
        <div class="flex flex-col items-center justify-center">
            <img src="https://i.postimg.cc/pdnRmpPj/image-1-removebg-preview-1.png"
                class="max-w-[420px] w-64 md:w-72 max-h-48" alt="MSF Logo" />
            <p v-if="!showForm" class="font-Tijawal-Bold mt-12 text-center text-xl md:text-3xl text-[#42542A]">
                تعمل المؤسّسة في القطاع الإغاثي الإنساني على دعم ورعاية وتمكين
                العائلات من الفقراء والأيتام والمحتاجين في المجتمع العربي، والتي
                تعاني من أوضاع اقتصادية اجتماعية صعبة، خصوصا في السنوات الأخيرة
                في ظل غلاء المعيشة وتفشّي البطالة واتساع الفجوة الاقتصاديّة
            </p>
        </div>
        <div v-if="!showForm" class="flex flex-col items-start justify-start mt-8">
            <p class="font-Tijawal-Bold mt-12 text-center text-lg md:text-2xl text-[#42542A]">
                هذه الاستمارة مخصّصة للفئات التالية:
            </p>
            <div
                class="font-Tijawal flex flex-col items-start justify-start text-lg md:text-xl  text-[#42542A] mt-2 gap-y-1">
                <!-- List of categories -->
                <p>1. عائلة محتاجة ذات دخل أقل من 6000 ش.ج</p>
                <p>2. أيتام</p>
                <p>3. عائلات أحادية الوالدين (حالات طلاق)</p>
                <p>4. مساعدة طارئة لمرة واحدة</p>
                <p>5. محتاج غير قادر على سد احتياجات معيشية أساسية مثل: إيجار بيت وديون في دفعات الكهرباء وغيرها....</p>
                <button type="button"
                    class="font-Tijawal-Bold rounded-md bg-[#42542A] mt-3 w-60 h-12 px-2.5 py-1.5 font-bold text-lg text-white shadow-sm hover:bg-[#B0C277]"
                    @click="navigateToFormQuestions">
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
        <!-- Form Page-->
        <div v-if="showForm">
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
                        <p class="font-Tijawal-Bold text-center text-xl text-[#42542A]">{{ section.attributes.section_name
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
                                    <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                                </label>
                                <input :dir="question.layout === 'file' ? ltr : rtl" :type="question.layout"
                                    :name="question.attributes.text" :id="question.key"
                                    :required="question.attributes.required"
                                    v-model="formDataFields[question.attributes.text]"
                                    @input="clearError(question.attributes.text)"
                                    :class="question.layout == 'file' ? 'file_input' : ''"
                                    class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />
                                <p v-if="validationErrors[question.attributes.text]" class="text-red-500">{{
                                    validationErrors[question.attributes.text] }}</p>
                            </div>
                            <div v-else-if="question.layout == 'radio_select'">
                                <label :for="question.key"
                                    class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                                    <p class="p-0 m-0 "> {{ question.attributes.name }}</p>
                                    <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                                </label>
                                {{ question.attributes.text }}
                                <div class="flex flex-row items-start mt-2 "
                                    v-for="choice in question.attributes.selectform" :key="choice.key">
                                    <input type="radio" :name="question.attributes.text " :id="choice.key"
                                        :required="question.attributes.required" v-model="formDataFields[question.attributes.text ]"
                                        @input="clearError(question.attributes.text)"
                                        :value="choice.attributes.text"
                                        :class="question.layout === 'file' ? 'file_input' : ''"
                                        class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                                    <label class="mx-1 -pt-1" :for="choice.key">{{ choice.attributes.text }}</label>
                                </div>
                                <p v-if="validationErrors[question.attributes.text]" class="text-red-500">{{
                                    validationErrors[question.attributes.text] }}</p>
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
                    <div class=" flex flex-row items-start justify-start gap-x-2">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="8.5" cy="8.5" r="8.5" fill="#B1C376" />
                        </svg>
                        <p class="font-Tijawal-Bold text-center text-xl text-[#42542A]">{{ section.attributes.section_name
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
                                    <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                                </label>
                                <input :dir="question.layout === 'file' ? ltr : rtl" :type="question.layout"
                                    :name="question.attributes.text" :id="question.key"
                                    v-model="formDataFields[question.attributes.text]"
                                    @input="clearError(question.attributes.text)"
                                    :class="question.layout == 'file' ? 'file_input' : ''"
                                    class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />
                                <!-- Example of displaying validation errors in the template -->
                                <p v-if="validationSecondPageErrors[question.attributes.text]" class="text-red-500">{{
                                    validationSecondPageErrors[question.attributes.text] }}</p>

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
                                    @input="clearError(question.attributes.text)"
                                        v-model="formDataFields[question.attributes.text]" :value="choice.attributes.text"
                                        :class="question.layout === 'file' ? 'file_input' : ''"
                                        class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                                    <label class="mx-1 -pt-1" :for="choice.key">{{ choice.attributes.text }}</label>
                                </div>
                            </div>
                            <p v-if="validationSecondPageErrors[question.attributes.text]" class="text-red-500">{{
                                    validationSecondPageErrors[question.attributes.text] }}</p>
                        </div>
                        <div v-if="section.layout =='Flexible_section'"
                            class="w-1/2 mt-4">
                            <button v-if="counter == 2" type="button"
                                class="font-Tijawal-Bold bg-[#B1C376] block w-[95%] gap-y-4 my-2 text-white h-14 rounded-md mt-4 shadow-sm ring-1 hover:bg-[#42542A]"
                                @click="addNewChild">
                                اضافة طفل آخر
                            </button>
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
            <!-- <p>{{ formDataFields }}</p> -->
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
        const rtl = ref('rtl');
        const ltr = ref('ltr');
        const firstPageValidation = ref({});
        const validationErrors = reactive({});
        const secondPageValidation = ref({});
        const validationSecondPageErrors = reactive({});




        const fetchFormData = async () => {
            try {
                const response = await axios.get(`${window.location.origin}/form_questions`, {
                    params: {
                        id: 13,
                    },
                });
                data.value = Object.freeze([...response.data]);
                firstPage.value = Object.freeze(response.data[0].attributes.questions);
                firstPageValidation.value = response.data[0].validation;
                secondPageValidation.value = response.data[1].validation;
                currentPage.value = firstPage.value;
                secondPage.value = Object.freeze(response.data[1].attributes.questions);
                secondPageAddchild.value = Object.freeze(secondPage.value[3]['attributes']['questions']);
                totalPages.value = response.data.length;

                console.log("🚀 ~ file: emar.vue:92 ~ fetchFormData ~ data:", response.data, firstPageValidation.value);
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
            if (counter.value == 2) {
                validationErrors.value = { /* ... */ };
                validationSecondPageErrors.value = { /* ... */ };
                if (Object.values(validationSecondPageErrors).some(error => error !== null)) {
                    // If there are validation errors, do not proceed to the next page
                    console.log('Validation errors. Cannot proceed to the next page.');
                    return;
                }
                counter.value = Math.min(counter.value + 1, totalPages.value);
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
            };
            childrenCounter.value[0]++;
            newChildren.value.push(newItem);
            console.log(',,,,,', newChildren.value[0])
        }

        const onConfirmAddChild = (index, formDataFields) => {
        };
        const handleUpdateFormData = (index, formData) => {
            formDataFields.value = { ...formDataFields.value, ...formData };
            // console.log("ssss",formDataFields.value)
        };

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
            clearError,
            rtl,
            ltr,
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
</style>
