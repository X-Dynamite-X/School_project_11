<script setup>
import { defineProps, defineEmits } from "vue";

const props  = defineProps({
    label: { type: String, required: true },
    options: { type: Array, default: () => [] },
    field: { type: String, required: true },
    value: { type: [String, Number], required: true },
});

const emit = defineEmits(["update"]);

const sendData = (event) => {
    const selectedOption = props.options.find(option => option.id === parseInt(event.target.value));
    console.log(selectedOption);

    emit("update", { id: selectedOption?.id || null, name: selectedOption?.name || "" });
};
</script>

<template>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
        {{ label }}
    </label>
    <select
        :value="value"
        @change="sendData"
        
        :name="field"
        class="block w-full px-3 py-2 border rounded-md text-gray-900 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 focus:outline-none"
    >
        <option value="" disabled>Select an option</option>
        <option v-for="option in options" :key="option.id" :value="option.id">
            {{ option.name }}
        </option>
    </select>
</template>
