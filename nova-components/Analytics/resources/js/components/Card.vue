<template>
    <Card class=" py-5 pl-5 pr-5 text-right">
        <model-select class="mb-5" :options="options" v-model="item" placeholder="الرجاء الاختيار"></model-select>
        <button @click="getSelectedValue()" size="lg" align="center" component="button" type="button" class="shadow mt-5 px-6 relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900 cursor-pointer rounded text-sm font-bold focus:outline-none focus:ring ring-primary-200 dark:ring-gray-600 inline-flex items-center justify-center h-9 px-3 shadow relative bg-primary-500 hover:bg-primary-400 text-white dark:text-gray-900"><span>أرسل</span></button>
    </Card>
</template>

<script>

import { ModelSelect } from 'vue-search-select'
import 'vue-search-select/dist/VueSearchSelect.css'
export default {
    props: [
        'card',

        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],
    components: {ModelSelect},
    data () {
      return {
        options: [
          { value: '1', text: 'الخيار الاول' },
          { value: '2', text: 'الخيار الثاني' },
          { value: '3', text: 'الخيار الثالث' },
          { value: '4', text: 'الخيار الرابع' },
          { value: '5', text: 'الخيار الخامس' }
        ],
        item: {
          value: '',
          text: ''
        },

      }
    },
    methods: {
      reset () {
        this.item = {}
      },
      selectFromParentComponent1 () {
        // select option from parent component
        this.item = this.options[0]
      },
      getSelectedValue () {

      },

    },

    mounted() {
        //
    },
}
</script>
<style>
    .ui.selection.dropdown>.search.icon, .ui.selection.dropdown>.delete.icon, .ui.selection.dropdown>.dropdown.icon {right: auto; left: 1rem;}
    .ui.selection.dropdown {text-align: right; padding: .78571429em 1.1em .78571429em 2em}
    .ui.selection.dropdown .menu>.item {text-align: right;}
    .ui.search.selection.dropdown>input.search {text-align: right; padding: .78571429em 1.1em .78571429em 2em}
</style>
