<script setup>
import { ref, reactive, onMounted } from "vue";

import MainTable from './Tabel/MainTable.vue';
const emit = defineEmits(["close",]);
const isVisible = ref(true);

const props = defineProps({
    nameRoute: { type: String, default: null },
    allRoles: { type: Array, default: null },
    listData: { type: Array, default: null },
    formFeld: { type: Array, default: null },
    columns: { type: Array, required: true },
    row: { type: Array, required: true },


 })
 const closeModal = () => {
    isVisible.value = false;
    emit("close");
};

console.log(props.listData);

</script>

<template>
    <MainTable :columns="columns" :listData="listData" :nameRoute="nameRoute"   :formsFeldData="formFeld"  :tableData="row"   />
    {{  formFeld}}
     <footer class="mt-4 flex justify-end space-x-2">
         <button @click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            Close
        </button>
    </footer>

</template>
