<script setup>
import { computed } from "vue";
import InfoIcon from "@/Components/IconSvg/InfoIcon.vue";
import EditIcon from "@/Components/IconSvg/EditIcon.vue";
import DeleteIcon from "@/Components/IconSvg/DeleteIcon.vue";

// استيراد الـ props
const props = defineProps({
  typeButton: {
    type: String,
    required: true,
  },
});

// تعريف الأنماط
const buttonStyles = {
  info: "bg-blue-600 rounded hover:bg-blue-700",
  edit: "bg-yellow-600 rounded hover:bg-yellow-700",
  delete: "bg-red-600 rounded hover:bg-red-700",
};

// اختيار الأيقونات
const buttonIcons = {
  info: InfoIcon,
  edit: EditIcon,
  delete: DeleteIcon,
};

// استرداد القيم بناءً على `props.typeButton` باستخدام `computed`
const style = computed(() => buttonStyles[props.typeButton] || "");
const Icon = computed(() => buttonIcons[props.typeButton] || null);
</script>

<template>
  <button
    class="mx-1 px-2 py-1 text-sm font-medium text-white"
    :class="style"
  >
    <!-- عرض الأيقونة باستخدام v-if -->
    <component :is="Icon" v-if="Icon" />
  </button>
</template>
