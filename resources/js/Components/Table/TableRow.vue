<script setup>
import BouttonSvg from "@/Components/BouttonSvg.vue"; // استيراد مكون الأزرار
import tRow from "./tRow.vue"; // استيراد مكون الخلية (td)

defineProps({
  row: {
    type: Object,
    required: true,
  },
  columns: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
    <!-- تكرار الأعمدة بناءً على الحقول المعطاة -->
    <tRow
      v-for="(column, index) in columns"
      :key="index"
    >
      <!-- إذا كان الحقل هو "إجراء"، أضف الأزرار -->
      <template v-if="column.isAction">
        <BouttonSvg typeButton="info" />
        <BouttonSvg typeButton="edit" />
        <BouttonSvg typeButton="delete" />
      </template>

      <!-- خلاف ذلك، اعرض القيمة الديناميكية -->
      <template v-else>
        {{ row[column.field] }}
      </template>
    </tRow>
  </tr>
</template>
