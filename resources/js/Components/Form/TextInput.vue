<script setup>
import { defineProps, defineEmits, ref, watch } from "vue";

// تعريف الخصائص
const props = defineProps({
  typeInput: { type: String, default: "text" },
  label: { type: String, required: true },
  value: { type: [String, Number], required: true },
  field: { type: String, required: true },
});

// متغير لإعداد نوع الإدخال بشكل ديناميكي
const type_input = ref(props.typeInput);

// مراقبة التغييرات في label وتغيير نوع الإدخال بناءً على القيمة
watch(() => props.label, (newLabel) => {
  // تحويل newLabel إلى حروف صغيرة لمقارنة غير حساسة لحالة الأحرف
  const labelLowerCase = newLabel.toLowerCase();

  if (labelLowerCase === "email") {
    type_input.value = "email";
  } else if (labelLowerCase === "phone") {
    type_input.value = "phone";
  } else if (labelLowerCase === "img") {
    type_input.value = "file";
  } else {
    type_input.value = "text"; // القيمة الافتراضية
  }
}, { immediate: true }); // استخدام { immediate: true} لمراقبة التغيير عند أول تحميل أيضًا

// تعريف الإشارة للإرسال
const emit = defineEmits(["update"]);

// دالة لإرسال البيانات عند التغيير
const sendData = (event) => {
  emit("update", { field: props.field, value: event.target.value });
};
</script>

<template>
  <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">{{ label }}</label>
  <input
    :type="type_input"
    :placeholder="'Please Edit ' + label + ' data'"
    :value="value"
    :name="field"
    @input="sendData"
    class="block w-full px-3 py-2 border rounded-md text-gray-900 dark:bg-gray-800 dark:text-gray-200 dark:border-gray-700 focus:outline-none"
  />
</template>
