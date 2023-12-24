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
                    <input :dir="question.layout === 'file' ? ltr : rtl" :type="question.layout"
                        :name="`${question.attributes.text}_${children.id}`" :id="`${question.key}_${children.id}`"
                        v-model="formDataFields[`${question.attributes.text}_${children.id}`]"
                        :class="question.layout == 'file' ? 'file_input' : ''"
                        class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />
                </div>
                <div v-else-if="question.layout == 'radio_select'" class="">
                    <label :for="question.key" class="block text-base -pt-2 mt-3 font-Tijawal-Bold  text-[#42542A]">{{
                        question.attributes.name }}</label>
                    <div class="flex flex-row items-start justify-start  mt-2 "
                        v-for="choice in question.attributes.selectform" :key="choice.key">
                        <input type="radio" :name="`${question.key}_${children.id}`" :id="`${choice.key}_${children.id}`"
                            v-model="formDataFields[`${question.key}_${children.id}`]" :value="choice.attributes.text"
                            :class="question.layout === 'file' ? 'file_input' : ''"
                            class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                        <!-- <label class="mx-1 -pt-1" :for="`${choice.key}_${children.id}`">{{ choice.attributes.text
                        }}</label> -->

                        <label :for="`${choice.key}_${children.id}`"
                            class="flex flex-row gap-x-3 text-base -pt-2 py-0.5 font-Tijawal-Bold  text-[#42542A]">
                            <p class="p-0 m-0 "> {{ choice.attributes.text }}</p>
                            <p v-if="choice.attributes.required" class="text-[#FF0000] p-0 m-0 text-2xl">*</p>
                        </label>
                    </div>
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
import { ref } from 'vue';

export default {
    props: ['children', 'index', 'rtl', 'ltr'],
    emits: ['updateFormData', 'confirmAddChild'],
    setup(props, { emit }) {
        // Define reactive data using ref
        const formDataFields = ref({});
        const showAddCildComponent = ref(true);
        const formErrors = ref({});

    // Define methods
    const validateForm = () => {
      formErrors.value = {}; // Clear previous errors
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
            formErrors
        };
    },
};
</script>