<script setup>
import { defineProps, defineEmits, ref, watch } from "vue";

// تعريف الخصائص
const props = defineProps({
    value: { type: [String, Number], required: true },
    column:{ type:Object , required:true  }
});

// متغير لإعداد نوع الإدخال بشكل ديناميكي
const type_input = ref(props.column.type);
const name_input = ref(props.column.name);
const label_input = ref(props.column.label);
const field_input = ref(props.column.field);
const value_input = ref(props.value);



const emit = defineEmits(["update"]);

// دالة لإرسال البيانات عند التغيير
const sendData = (event) => {
  emit("update", { field: field_input, value: event.target.value });
};
</script>

<template>
  <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ label_input }}</label>
  <input
    :type="type_input"
    :placeholder="'Please Edit ' + label + ' data'"
    :value="value"
    :name="name_input"
     @input="sendData"
    class="block w-full px-3 py-2 border rounded-md text-gray-900 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 focus:outline-none"
  />
</template>
