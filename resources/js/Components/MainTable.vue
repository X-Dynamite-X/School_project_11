<script setup>
import TableHeader from "@/Components/Table/TableHeader.vue";
import TableRow from "@/Components/Table/TableRow.vue"; // الصف

defineProps({
  tableData: {
    type: Array,
    required: true,
  },
  columns: {
    type: Array,
    required: true,
  },
});
</script>

<template>
  <table class="table-auto w-full border border-gray-300 rounded-lg overflow-hidden">
    <TableHeader :columns="columns" />
    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-600">
      <TableRow v-for="(row, index) in tableData" :key="index" :row="row" :columns="columns" />
    </tbody>
  </table>
</template>
