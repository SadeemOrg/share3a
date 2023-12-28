<template>
    <div
    dir="rtl" class="bg-[#FBFDF5] font-Tijawal">
      <Emar />
    </div>
  </template>

  <script>
  import Emar from './components/Emar.vue';
  export default {
    components:{Emar}
  }
  </script>

<style >
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