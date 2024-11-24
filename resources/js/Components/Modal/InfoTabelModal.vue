<script setup>
import { ref, reactive, onMounted } from "vue";

import MainTable from './Tabel/MainTable.vue';
const emit = defineEmits(["close",]);
const isVisible = ref(true);

const props = defineProps({
    columns: { type: Array, required: true },
    row: { type: Array, required: true },
    nameRoute: { type: String, default: null },
    formFeld: { type: Array, default: null },
    allRoles: { type: Array, default: null },


 })
 const closeModal = () => {
    isVisible.value = false;
    emit("close");
};

</script>

<template>
    <MainTable :columns="columns" :formsFeldData="formFeld"  :tableData="row"   />
     <footer class="mt-4 flex justify-end space-x-2">
         <button @click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            Close
        </button>
    </footer>

</template>
