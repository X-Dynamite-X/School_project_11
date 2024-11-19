<script setup>
import { defineProps, defineEmits, ref, watch } from "vue";

// تعريف الخصائص
const props = defineProps({
    value: { type: [String, Number], required: true },
    column: { type: Object, required: true }
});

// إعداد القيم
const type_input = ref(props.column.type || 'text');
const name_input = ref(props.column.name);
const label_input = ref(props.column.label);
const field_input = ref(props.column.field);
const value_input = ref(props.value);

// تعريف الـ emit
const emit = defineEmits(["update"]);

// دالة لإرسال البيانات عند التغيير
const sendData = (event) => {
    emit("update", { field: field_input.value, value: event.target.value });
};
</script>

<template>
  <label :for="name_input" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ label_input }}</label>
  <input
    :type="type_input"
    :id="name_input"
    :placeholder="'Please Edit ' + label_input + ' data'"
    v-bind="{ name: name_input, value: value_input }"
    v-model="value_input"
    @input="sendData"
    class="block w-full px-3 py-2 border rounded-md text-gray-900 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 focus:outline-none"
  />
</template>
