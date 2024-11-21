<script setup>
import { ref } from "vue";

const props = defineProps({
    row: {
        type: Object,
        required: true,
    },
    columns: {
        type: Array,
        required: true,
    },
    type:{
        type:String,
        default:null
    }
});
const emit = defineEmits(["close", "deleteRow"]);

const isVisible = ref(true);
const sendDeleteRow = () => {
    const rowId = ref(props.row.id);
     emit("deleteRow",rowId);
};
const closeModal = () => {
    isVisible.value = false;
    emit("close");
};
 </script>
<template>
    <div class="mb-6">
        <p class="text-lg text-gray-600 dark:text-gray-400">
            Are you sure you want to delete this {{ type }}
            <span class="text-red-500 font-bold"> {{ row.name }}</span>
            ?
        </p>
    </div>
    <footer class="mt-4 flex justify-end space-x-2">
        <button @click="sendDeleteRow" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
            Delete
        </button>
        <button @click="closeModal" class="bg-gray-500 text-white px-4 py-2 rounded-lg hover:bg-gray-600">
            Close
        </button>
    </footer>
</template>
