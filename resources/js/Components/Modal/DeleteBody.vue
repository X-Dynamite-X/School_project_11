<script setup>
defineProps({
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
// const type = "user";
</script>
<template>
    <div class="mb-6">
        <p class="text-lg text-gray-600 dark:text-gray-400">
            Are you sure you want to delete this {{ type }}
            <span class="text-red-500 font-bold"> {{ row.name }}</span>
            ?
        </p>
    </div>
</template>
