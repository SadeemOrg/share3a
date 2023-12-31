<template>
    <p v-if="showAddCildComponent" class="font-Tijawal-Bold text-center text-xl pt-4 text-[#42542A]">اضافة طفل جديد رقم {{ index + 1 }}</p>
    <div v-if="showAddCildComponent" class=" border-b  border-[#B1C376] pb-4">
        <div class="flex flex-row items-center justify-center md:justify-start flex-wrap mt-4 ">
            <div :class="children.data.layout !== 'radio_select' ? 'w-[90%] md:w-1/2' : 'w-[90%]'"
                v-for="(question, index) in children.data" :key="index">
                <div v-if="question.layout !== 'radio_select'" class="w-full">
                    <label :for="`${question.key}_${index+1}`"
                        class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                        <p class="p-0 m-0 "> {{ question.attributes.text }}</p>
                        <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                    </label>
                    <input v-if="question.layout !== 'file'" :type="question.layout"
                        :name="`${question.attributes.text}_${index+1}`" :id="`${question.key}_${index+1}`"
                        v-model="formDataFields[`${question.attributes.text}_${index+1}`]"
                        @input="clearError(question.attributes.text)"
                        class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />

                    <input dir="ltr" v-if="question.layout === 'file'" :type="question.layout"
                        :name="`${question.attributes.text}_${index+1}`" :id="`${question.key}_${index+1}`"
                        @change="handleFileInput(question,children)" @input="clearError(question.attributes.text)"
                        class="file_input block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376]" />
                    <p v-if="validationErrors[`${question.attributes.text}_${index+1}`]" class="text-red-500">{{
                        validationErrors[`${question.attributes.text}_${index+1}`] }}</p>
                </div>
                <div v-else-if="question.layout == 'radio_select'" class="">
                    <label :for="question.key"
                        class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                        <p class="p-0 m-0 "> {{ question.attributes.text }}</p>
                        <p v-if="question.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                    </label>
                    <div class="flex flex-row items-start mt-2" v-for="choice in question.attributes.selectform"
                        :key="choice.key">
                        <input type="radio" :name="`${question.attributes.text}_${index+1}`"
                            :id="`${choice.key}_${index+1}`"
                            v-model="formDataFields[`${question.attributes.text}_${index+1}`]"
                            :value="choice.attributes.text" :class="question.layout === 'file' ? 'file_input' : ''"
                            class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                        <label :for="`${choice.key}_${index+1}`"
                            class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                            <p class="mx-1 -pt-1 -mt-0.5"> {{ choice.attributes.text }}</p>
                        </label>
                    </div>
                    <p v-if="validationErrors[`${question.attributes.text}_${index+1}`]" class="text-red-500">{{
                        validationErrors[`${question.attributes.text}_${index+1}`] }}</p>
                </div>
            </div>
        </div>
        <div class="w-full mt-6">
            <button type="button"
                class="font-Tijawal-Bold bg-[#B1C376] block w-[95%] gap-y-4 my-2 text-white h-14 rounded-md mt-4 shadow-sm ring-1 hover:bg-[#42542A]"
                @click="confirmAddChild">
                تاكيد الآضافه
            </button>
        </div>
    </div>
    <div v-else class="h-14 flex flex-row items-center justify-center w-[95%] hover:bg-[#B0C277] bg-[#B1C376] gap-y-4 my-2">
        <button @click="EditForm" class="font-Tijawal-Bold text-lg  pt-4 mx-12 text-white pb-4  edit-button"></button>
    </div> 
    <!-- <div>{{ children }}</div> -->
</template>
<script>
import { ref, reactive } from 'vue';

export default {
    props: ['children', 'index'],
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
        const EditForm = ()=>{
            showAddCildComponent.value = true;
        }
        // Define methods
        const confirmAddChild = () => {

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
            handleFileInput,
            EditForm

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
.edit-button::after {
    content: "تم اضافة الطفل بنجاح";
    padding-bottom: 16px;
  }

  .edit-button:hover::after {
    opacity: 100;
    content: "اضغط هنا للتعديل";
  }
</style>

