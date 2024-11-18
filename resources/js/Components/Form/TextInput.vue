<script setup>
import { defineProps, defineEmits } from "vue";

defineProps({
  typeInput: { type: String, default: "text" },
  label: { type: String, required: true },
  value: { type: [String, Number], required: true },
  field: { type: String, required: true },
});

const emit = defineEmits(["update"]);

const sendData = (event) => {
    console.log(event.target.value);

  emit("update", { field, value: event.target.value });
};
</script>

<template>
  <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ label }}</label>
  <input
    :type="typeInput"
    :placeholder="'Please Edit ' + label + ' data'"
    :value="value"
    @input="sendData"
    class="block w-full px-3 py-2 border rounded-md text-gray-900 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 focus:outline-none"
  />
</template>
