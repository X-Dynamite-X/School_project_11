<script setup>
import { defineProps, defineEmits } from "vue";

defineProps({
  label: { type: String, required: true },
  options: { type: Array, default: () => [] },
  field: { type: String, required: true },
  value: { type: [String, Number], required: true },
});

const emit = defineEmits(["update"]);

// تعديل دالة sendData لاستخدام props.field بشكل صحيح
const sendData = (event) => {
  emit("update", { field: event.target.name, value: event.target.value });
};
</script>

<template>
    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
        {{ label }}
    </label>
    <select
        :value="value"
        @change="sendData"
        :name="label"
        class="block w-full px-3 py-2 border rounded-md text-gray-900 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 focus:outline-none"
    >
        <option v-for="option in options" :key="option.id" :value="option.name"  >
        {{ option.name }}
        </option>
    </select>
</template>

