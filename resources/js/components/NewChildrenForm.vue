<template>
    <p v-if="showAddCildComponent" class="font-Tijawal-Bold text-center text-xl pt-4 text-[#42542A]">اضافة طفل جديد رقم {{
        index + 1 }}</p>
    <div v-if="showAddCildComponent" class=" border-b border-[#B1C376] pb-4">
        <div class="flex flex-row items-center justify-center md:justify-start flex-wrap mt-4 ">
            <div :class="children.data.layout !== 'radio_select' ? 'w-[90%] md:w-1/2' : 'w-[90%]'"
                v-for="(question, index) in children.data" :key="index">
                <div v-if="question.layout !== 'radio_select'" class="w-full">
                    <label :for="`${question.key}_${children.id}`"
                        class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                        <p class="p-0 m-0 "> {{ question.attributes.text }}</p>
                        <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                    </label>
                    <input v-if="question.layout !== 'file'" :type="question.layout"
                        :name="`${question.attributes.text}_${children.id}`" :id="`${question.key}_${children.id}`"
                        v-model="formDataFields[`${question.attributes.text}_${children.id}`]"
                        @input="clearError(question.attributes.text)"
                        class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />

                    <input dir="ltr" v-if="question.layout === 'file'" :type="question.layout"
                        :name="`${question.attributes.text}_${children.id}`" :id="`${question.key}_${children.id}`"
                        @change="handleFileInput(question,children)" @input="clearError(question.attributes.text)"
                        class="file_input block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376]" />
                    <p v-if="validationErrors[`${question.attributes.text}_${children.id}`]" class="text-red-500">{{
                        validationErrors[`${question.attributes.text}_${children.id}`] }}</p>
                </div>
                <div v-else-if="question.layout == 'radio_select'" class="">
                    <label :for="question.key"
                        class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                        <p class="p-0 m-0 "> {{ question.attributes.name }}</p>
                        <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                    </label>
                    <div class="flex flex-row items-start mt-2" v-for="choice in question.attributes.selectform"
                        :key="choice.key">
                        <input type="radio" :name="`${question.attributes.text}_${children.id}`"
                            :id="`${choice.key}_${children.id}`"
                            v-model="formDataFields[`${question.attributes.text}_${children.id}`]"
                            :value="choice.attributes.text" :class="question.layout === 'file' ? 'file_input' : ''"
                            class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                        <label :for="`${choice.key}_${children.id}`"
                            class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                            <p class="mx-1 -pt-1 -mt-0.5"> {{ choice.attributes.text }}</p>
                        </label>
                    </div>
                    <p v-if="validationErrors[`${question.attributes.text}_${children.id}`]" class="text-red-500">{{
                        validationErrors[`${question.attributes.text}_${children.id}`] }}</p>
                </div>
            </div>
        </div>
        <div class="w-full mt-6">
            <button type="button"
                class="font-Tijawal-Bold bg-[#B1C376] block w-[98%] gap-y-4 my-2 text-white h-14 rounded-md mt-4 shadow-sm ring-1 hover:bg-[#42542A]"
                @click="confirmAddChild">
                تاكيد الآضافه
            </button>
        </div>
    </div>
    <div v-else class="h-14 flex flex-row items-center justify-center w-full bg-[#B1C376] gap-y-4 my-2">
        <p class="font-Tijawal-Bold text-lg pt-4 text-white">تم اضافة الطفل رقم {{ index + 1 }} بنجاح</p>
    </div>
</template>
<script>
import { ref, reactive } from 'vue';

export default {
    props: ['children', 'index', 'rtl', 'ltr'],
    emits: ['updateFormData', 'confirmAddChild'],
    setup(props, { emit }) {
        // Define reactive data using ref
        const formDataFields = ref({});
        const showAddCildComponent = ref(true);
        const validationErrors = reactive({})


        const validateFlexibleComponent = () => {
            Object.values(props.children.validation).forEach(fieldName => {
                const validationRule = fieldName;
                const fieldValue = formDataFields.value[fieldName];
                if (validationRule && !fieldValue) {
                    validationErrors[fieldName] = `${fieldName.split('_')[0]} is required.`;
                    console.error(`${`${fieldName.split('_')[0]}`} is required.`);
                } else {
                    validationErrors[fieldName] = null;
                }

            })
        }

        const clearError = (fieldName) => {
            // Clear the error for the specified field
            validationErrors[`${fieldName}_${props.children.id}`] = null;
        };

        const handleFileInput = (question,children) => {
            const inputElement = document.getElementById(`${question.key}_${children.id}`);
            const file = inputElement.files[0];            
            formDataFields.value[`${question.attributes.text}_${children.id}`] = file;
        }
        // Define methods
        const confirmAddChild = () => {
            validateFlexibleComponent()
            if (Object.values(validationErrors).some(error => error !== null)) {
                // If there are validation errors, do not proceed to the next page
                console.log('Validation errors. Cannot proceed to the next page.');
                return;
            }
            showAddCildComponent.value = false;
            // Emit an event to update the parent's formDataFields
            emit('updateFormData', props.index, { ...formDataFields.value });
        };

        // Return properties and methods
        return {
            formDataFields,
            confirmAddChild,
            showAddCildComponent,
            validationErrors,
            clearError,
            handleFileInput

        };
    },
};
</script>

