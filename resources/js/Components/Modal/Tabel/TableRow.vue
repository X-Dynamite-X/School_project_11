<script setup>
import { defineProps, defineEmits , ref} from 'vue';
import BouttonSvg from "@/Components/BouttonSvg.vue"; // استيراد مكون الأزرار
import tRow from "./tRow.vue"; // استيراد مكون الخلية (td)

// Props لتلقي البيانات
const props = defineProps({
  rowName: {
    type: String,
    required: true,
  },
  row:{
    type: Object,
    required: true,
  },
  columns: {
    type: Array,
    required: true,
  },
});



// Emits لإرسال الأحداث إلى المكون الأب
const emit = defineEmits(["action-click"]);

// وظيفة لاستدعاء الحدث مع نوع الإجراء
const handleActionClick = (actionType,data,columns) => {
  emit("action-click", { actionType, row:data ,columns:columns});
};
</script>

<template>
    <tr class="hover:bg-gray-100 dark:hover:bg-gray-700">
      <tRow
        v-for="(column, index) in columns"
        :key="index"
      >
        <template v-if="column.isAction">
          <!-- أزرار الإجراء -->
          <BouttonSvg typeButton="info" @click="handleActionClick('info', row, columns)" />
          <BouttonSvg typeButton="edit" @click="handleActionClick('edit', row, columns)" />
          <BouttonSvg typeButton="delete" @click="handleActionClick('delete', row, columns)" />
        </template>
        <template v-else-if="column.name === 'mark'">
            {{ row.pivot.mark }}
        </template>
        <template v-else-if="column.name === 'subject_id'">
            {{ rowName}}
        </template>
        <template v-else>
          {{ row[column.field] }}
        </template>
      </tRow>
    </tr>
  </template>
