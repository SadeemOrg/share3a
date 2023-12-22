<template>
    <p class="font-Tijawal-Bold text-center text-xl pt-4 text-[#42542A]">اضافة طفل جديد رقم {{ index + 1 }}</p>
    <div class=" border-b border-[#B1C376] pb-4">
        <div class="flex flex-row items-center justify-center md:justify-start flex-wrap mt-4 ">
            <div :class="children.data.layout !== 'radio_select' ? 'w-[90%] md:w-1/2' : 'w-[90%]'"
                v-for="(question, index) in children.data" :key="index">
                <div v-if="question.layout !== 'radio_select'" class="w-full">
                    <label :for="question.key" class="block text-base -pt-2 mt-3 font-Tijawal-Bold  text-[#42542A]">{{
                        question.attributes.text }}</label>
                    <input :dir="question.layout === 'file' ? ltr : rtl" :type="question.layout"
                        :name="question.attributes.text+children.id" :id="question.key + children.id"
                        :class="question.layout == 'file' ? 'file_input' : ''"
                        class="block w-[95%] gap-y-4 my-2 py-3 rounded-md bg-[#FBFDF5] border-[#42542A]  shadow-sm ring-1 focus:border-[#B1C376] " />
                </div>
                <div v-else-if="question.layout == 'radio_select'" class="">
                    <label :for="question.key" class="block text-base -pt-2 mt-3 font-Tijawal-Bold  text-[#42542A]">{{
                        question.attributes.name }}</label>
                    <div class="flex flex-row items-start justify-start  mt-2 "
                        v-for="choice in question.attributes.selectform" :key="choice.key">
                        <input type="radio" :name="question.key+children.id" :id="choice.key+children.id" :value="choice.attributes.text"
                            :class="question.layout === 'file' ? 'file_input' : ''"
                            class="block  rounded-md bg-[#FBFDF5] border-[#42542A] shadow-sm ring-1 focus:border-[#B1C376]" />
                        <label class="mx-1 -pt-1" :for="choice.key+children.id">{{ choice.attributes.text }}</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ['children', 'index', 'rtl', 'ltr', 'addNewChild'],
}
</script>